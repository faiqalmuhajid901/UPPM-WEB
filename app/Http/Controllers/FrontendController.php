<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Content;
use App\Models\Penelitian;
use App\Models\Publikasi;
use App\Models\Team;

class FrontendController extends Controller
{
    /**
     * Cache hint subkategori arsip dari laravel.log (per request).
     *
     * @var array<string, string>|null
     */
    private ?array $arsipKategoriLogHints = null;

    /**
     * Helper: Ambil konten berdasarkan section & category
     */
    private function getContent(string $section, ?string $category = null, bool $single = false)
    {
        $query = Content::where('section', $section)
            ->where('is_published', true);

        if ($category) {
            $query->where('category', $category);
        }

        if ($single) {
            return $query
                ->orderByDesc('updated_at')
                ->orderByDesc('id')
                ->first();
        }

        return $query
            ->orderBy('order')
            ->orderByDesc('updated_at')
            ->orderByDesc('id')
            ->get();
    }

    /**
     * Helper: Ambil konten dari beberapa source (fallback)
     */
    private function getContentFromSources(array $sources, bool $single = false)
    {
        foreach ($sources as $source) {
            [$section, $category] = array_pad($source, 2, null);
            if (!$section || !$category) {
                continue;
            }

            $result = $this->getContent($section, $category, $single);

            if ($single && $result) {
                return $result;
            }

            if (!$single && $result->isNotEmpty()) {
                return $result;
            }
        }

        return $single ? null : collect();
    }

    /**
     * Helper: Ambil semua konten section, grouped by category
     */
    private function getSectionContents(string $section)
    {
        return Content::where('section', $section)
            ->where('is_published', true)
            ->orderBy('order')
            ->get()
            ->groupBy('category');
    }

    /**
     * Normalisasi kategori arsip dokumen dari berbagai format data.
     */
    private function normalizeArsipKategori(?string $value): ?string
    {
        if (!$value) {
            return null;
        }

        $normalized = Str::of($value)
            ->lower()
            ->replace([' ', '-'], '_')
            ->value();

        return match ($normalized) {
            'sk',
            'sk_peraturan',
            'sk_dan_peraturan',
            'surat_keputusan',
            'peraturan' => 'sk',
            'panduan',
            'pedoman',
            'guide',
            'guideline' => 'panduan',
            'template',
            'templates',
            'format',
            'formulir' => 'template',
            'laporan',
            'report',
            'reports' => 'laporan',
            default => null,
        };
    }

    /**
     * Ambil kategori arsip dari marker tersembunyi pada content.
     */
    private function arsipKategoriFromMarker(?string $content): ?string
    {
        if (!$content) {
            return null;
        }

        if (preg_match('/arsip_kategori\s*:\s*([a-z_\-]+)/i', $content, $matches) !== 1) {
            return null;
        }

        return $this->normalizeArsipKategori($matches[1] ?? null);
    }

    /**
     * Fallback terakhir saat metadata subkategori belum tersimpan di DB:
     * baca hint dari log request upload berdasarkan judul konten.
     */
    private function arsipKategoriFromLogHint(?string $title): ?string
    {
        $normalizedTitle = Str::lower(trim((string) $title));
        if ($normalizedTitle === '') {
            return null;
        }

        if ($this->arsipKategoriLogHints === null) {
            $this->arsipKategoriLogHints = [];
            $logPath = storage_path('logs/laravel.log');

            if (is_file($logPath)) {
                try {
                    $file = new \SplFileObject($logPath, 'r');
                    $file->seek(PHP_INT_MAX);
                    $lastLineIndex = $file->key();
                    $startIndex = max(0, $lastLineIndex - 4000);

                    for ($i = $startIndex; $i <= $lastLineIndex; $i++) {
                        $file->seek($i);
                        $line = (string) $file->current();

                        if (
                            !Str::contains($line, 'Content store attempt') ||
                            !Str::contains($line, '"section":"dokumen"') ||
                            !Str::contains($line, '"category":"arsip"')
                        ) {
                            continue;
                        }

                        if (
                            preg_match('/"meta_kategori":"([^"]+)"/', $line, $metaMatches) !== 1 ||
                            preg_match('/"title":"([^"]+)"/', $line, $titleMatches) !== 1
                        ) {
                            continue;
                        }

                        $hintKategori = $this->normalizeArsipKategori(stripslashes($metaMatches[1] ?? ''));
                        $hintTitle = Str::lower(trim(stripslashes($titleMatches[1] ?? '')));

                        if ($hintKategori && $hintTitle !== '') {
                            $this->arsipKategoriLogHints[$hintTitle] = $hintKategori;
                        }
                    }
                } catch (\Throwable $e) {
                    // Abaikan fallback log jika gagal dibaca.
                }
            }
        }

        return $this->arsipKategoriLogHints[$normalizedTitle] ?? null;
    }

    /**
     * Tentukan kategori arsip final untuk render tab di frontend.
     */
    private function resolveArsipKategori(Content $content): string
    {
        $fromMeta = $this->normalizeArsipKategori(data_get($content->meta, 'kategori'));
        if ($fromMeta) {
            return $fromMeta;
        }

        $fromMarker = $this->arsipKategoriFromMarker($content->content);
        if ($fromMarker) {
            return $fromMarker;
        }

        $fromCategory = $this->normalizeArsipKategori($content->category);
        if ($fromCategory) {
            return $fromCategory;
        }

        $fromLogHint = $this->arsipKategoriFromLogHint($content->title);
        if ($fromLogHint) {
            return $fromLogHint;
        }

        $text = Str::lower(trim(
            ($content->title ?? '') . ' ' .
            ($content->excerpt ?? '') . ' ' .
            strip_tags($content->content ?? '')
        ));

        if (Str::contains($text, ['panduan', 'pedoman', 'guide', 'guideline'])) {
            return 'panduan';
        }

        if (Str::contains($text, ['template', 'formulir', 'format'])) {
            return 'template';
        }

        if (Str::contains($text, ['laporan', 'report'])) {
            return 'laporan';
        }

        return 'sk';
    }

    // ================================================================
    // HOMEPAGE
    // ================================================================

    /**
     * Homepage
     */
    public function index()
    {
        $homeHeader = $this->getContentFromSources([
            ['home', 'header'],
            ['profil', 'header'],
            ['profil', 'header-home'],
        ], true);

        $sliders = $this->getContentFromSources([
            ['home', 'slider'],
            ['profil', 'slider'],
        ]);

        $welcome = $this->getContentFromSources([
            ['home', 'welcome'],
            ['profil', 'welcome'],
        ], true);

        $programKerja = $this->getContentFromSources([
            ['home', 'program-kerja'],
            ['profil', 'program-kerja'],
            ['profil', 'fitur'],
        ]);

        $cta = $this->getContentFromSources([
            ['home', 'cta'],
            ['profil', 'cta'],
        ], true);

        $penelitians = Penelitian::latest()->take(3)->get();
        $publikasis = Publikasi::latest()->take(4)->get();

        return view('frontend.home', compact(
            'homeHeader',
            'sliders',
            'welcome',
            'programKerja',
            'cta',
            'penelitians',
            'publikasis'
        ));
    }

    // ================================================================
    // PROFIL
    // ================================================================

    /**
     * Profil Kampus / Tentang
     */
    public function profilKampus()
    {
        $profileHeader = $this->getContentFromSources([
            ['profil', 'header'],
            ['profil', 'header-profile'],
        ], true);

        $tentang = $this->getContent('profil', 'tentang', true);
        $sejarah = $this->getContent('profil', 'sejarah', true);
        $visi = $this->getContent('profil', 'visi', true);
        $misi = $this->getContent('profil', 'misi', true);

        return view('frontend.profil-kampus', compact(
            'profileHeader',
            'tentang',
            'sejarah',
            'visi',
            'misi'
        ));
    }

    /**
     * Halaman Struktur Organisasi (terpisah dari profile)
     */
    public function strukturOrganisasi()
    {
        $strukturItems = $this->getContent('profil', 'struktur-organisasi', false);

        $header = $this->getContentFromSources([
            ['profil', 'header'],
            ['profil', 'header-profile'],
        ], true);

        return view('frontend.struktur-organisasi', compact('strukturItems', 'header'));
    }

    /**
     * Visi Misi (halaman terpisah)
     */
    public function visiMisi()
    {
        $visiMisiItems = $this->getContent('profil', 'visi-misi', false);
        $tujuan = $this->getContent('profil', 'tujuan', true);
        $sasaran = $this->getContent('profil', 'sasaran');

        return view('frontend.visi-misi', compact('visiMisiItems', 'tujuan', 'sasaran'));
    }

    // ================================================================
    // PENELITIAN
    // ================================================================

    /**
     * Penelitian - List
     */
    public function penelitian()
    {
        $header = $this->getContent('penelitian', 'header', true);
        $contents = Content::where('section', 'penelitian')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        return view('frontend.penelitian', compact('header', 'contents'));
    }

    /**
     * Penelitian - Detail
     */
    public function penelitianDetail(Penelitian $penelitian)
    {
        $related = Penelitian::where('id', '!=', $penelitian->id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.penelitian-detail', compact('penelitian', 'related'));
    }

    /**
     * Proposal - Redirect ke Google Form atau tampilkan placeholder
     */
    public function proposal()
    {
        $formUrl = config('app.proposal_form_url');
        
        if ($formUrl && $formUrl !== '#') {
            return redirect()->away($formUrl);
        }
        $header = $this->getContentFromSources([
            ['penelitian', 'header'],
            ['penelitian', 'header-proposal'],
        ], true);

        return view('frontend.penelitian.proposal', compact('header'));
    }

    // ================================================================
    // PENGABDIAN
    // ================================================================

    /**
     * Halaman Pengabdian Masyarakat
     */
    public function pengabdian()
    {
        $pelatihanCategories = ['program_pelatihan', 'program-pelatihan', 'pelatihan'];

        // Header section
        $header = $this->getContent('pengabdian', 'header', true);

        // Skema Pengabdian
        $skema = Content::where('section', 'pengabdian')
            ->where('category', 'skema')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        // Program Pengabdian
        $program = Content::where('section', 'pengabdian')
            ->where('category', 'program')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        // Program Pelatihan (updated category name)
        $pelatihan = Content::where('section', 'pengabdian')
            ->whereIn('category', $pelatihanCategories)
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        // Kegiatan
        $kegiatan = Content::where('section', 'pengabdian')
            ->where('category', 'kegiatan')
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->get();

        // Stats - updated to include program pelatihan instead of pelayanan
        $stats = [
            'program' => Content::where('section', 'pengabdian')->where('category', 'program')->where('is_published', true)->count(),
            'pelatihan' => Content::where('section', 'pengabdian')->whereIn('category', $pelatihanCategories)->where('is_published', true)->count(),
            'kegiatan' => Content::where('section', 'pengabdian')->where('category', 'kegiatan')->where('is_published', true)->count(),
        ];

        return view('frontend.pengabdian', compact(
            'header',
            'skema',
            'program',
            'pelatihan',
            'kegiatan',
            'stats'
        ));
    }

    /**
     * Halaman Program Pelatihan (sub-menu)
     */
    public function pelatihan()
    {
        $pelatihanCategories = ['program_pelatihan', 'program-pelatihan', 'pelatihan'];

        $header = $this->getContentFromSources([
            ['pengabdian', 'header'],
            ['pengabdian', 'header-pelatihan'],
        ], true);
        $pelatihan = Content::where('section', 'pengabdian')
            ->whereIn('category', $pelatihanCategories)
            ->where('is_published', true)
            ->orderBy('order')
            ->paginate(12);

        return view('frontend.pengabdian.pelatihan', compact('header', 'pelatihan'));
    }

    /**
     * Halaman Panduan Pengabdian
     */
    public function panduanPengabdian()
    {
        $header = $this->getContent('pengabdian', 'header', true);
        $panduan = Content::where('section', 'pengabdian')
            ->where('category', 'panduan')
            ->where('is_published', true)
            ->orderBy('order')
            ->get();

        return view('frontend.pengabdian.panduan', compact('header', 'panduan'));
    }

    /**
     * Halaman Pelayanan Pengabdian
     */
    public function pelayanan()
    {
        $header = $this->getContentFromSources([
            ['pengabdian', 'header'],
            ['pengabdian', 'header-pelayanan'],
        ], true);
        $layanans = Content::where('section', 'pengabdian')
            ->where('category', 'layanan')
            ->where('is_published', true)
            ->orderBy('order')
            ->paginate(12);

        return view('frontend.pengabdian.pelayanan', compact('header', 'layanans'));
    }

    // ================================================================
    // PUBLIKASI
    // ================================================================

    /**
     * Publikasi - List
     */
    public function publikasi()
    {
        $header = $this->getContent('publikasi', 'header', true);
        $publikasis = Publikasi::latest()->paginate(12);

        return view('frontend.publikasi', compact('header', 'publikasis'));
    }

    /**
     * Publikasi - Detail
     */
    public function publikasiDetail(Publikasi $publikasi)
    {
        $related = Publikasi::where('id', '!=', $publikasi->id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.publikasi-detail', compact('publikasi', 'related'));
    }

    /**
     * Publikasi - Jurnal BPTKSPK
     */
    public function publikasiJurnalBptkspk()
    {
        $header = $this->getContent('publikasi', 'header', true);
        $publikasis = Content::where('section', 'publikasi')
            ->whereIn('category', ['jurnal-bptkspk', 'jurnal'])
            ->where('is_published', true)
            ->orderBy('order')
            ->paginate(12);

        return view('frontend.publikasi.jurnal-bptkspk', compact('header', 'publikasis'));
    }

    /**
     * Publikasi - Jurnal OJS
     */
    public function publikasiJurnalOjs()
    {
        $header = $this->getContent('publikasi', 'header', true);
        $publikasis = Content::where('section', 'publikasi')
            ->whereIn('category', ['jurnal-ojs', 'hak-cipta'])
            ->where('is_published', true)
            ->orderBy('order')
            ->paginate(12);

        return view('frontend.publikasi.jurnal-ojs', compact('header', 'publikasis'));
    }

    /**
     * Publikasi - Prosiding Semnas
     */
    public function publikasiProsidingSemnas()
    {
        $header = $this->getContent('publikasi', 'header', true);
        $publikasis = Content::where('section', 'publikasi')
            ->whereIn('category', ['prosiding-semnas', 'hak-paten'])
            ->where('is_published', true)
            ->orderBy('order')
            ->paginate(12);

        return view('frontend.publikasi.prosiding-semnas', compact('header', 'publikasis'));
    }

    // ================================================================
    // KEMITRAAN
    // ================================================================

    /**
     * Kemitraan - Halaman kerja sama dengan perusahaan dan industri
     */
    public function kemitraan()
    {
        $header = $this->getContent('kemitraan', 'header', true);
        $partners = $this->getContent('kemitraan', 'partner');
        $kerjasamaDocs = Content::where('section', 'kemitraan')
            ->where('is_published', true)
            ->whereIn('category', [
                'kerjasama',
                'kerja-sama',
                'dokumen-kerjasama',
                'dokumen_kerjasama',
                'mou',
                'moa',
            ])
            ->orderBy('order')
            ->orderByDesc('updated_at')
            ->orderByDesc('id')
            ->get();

        return view('frontend.kemitraan', compact('header', 'partners', 'kerjasamaDocs'));
    }

    // ================================================================
    // DOKUMEN
    // ================================================================

    /**
     * Halaman Arsip Dokumen
     */
    public function arsip()
    {
        $header = $this->getContent('dokumen', 'header', true);

        $dokumens = Content::where('section', 'dokumen')
            ->where('is_published', true)
            ->whereIn('category', [
                'arsip',
                'sk',
                'sk-peraturan',
                'sk_peraturan',
                'panduan',
                'template',
                'laporan',
            ])
            ->orderBy('order')
            ->orderByDesc('updated_at')
            ->orderByDesc('id')
            ->get()
            ->map(function (Content $content) {
                $content->arsip_category = $this->resolveArsipKategori($content);
                return $content;
            });

        return view('frontend.dokumen.arsip', compact('header', 'dokumens'));
    }

    /**
     * Halaman Liputan Berita
     */
    public function liputanBerita()
    {
        $header = $this->getContent('dokumen', 'header', true);

        $beritas = Content::where('section', 'dokumen')
            ->where('is_published', true)
            ->where('category', 'liputan')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('frontend.dokumen.berita', compact('header', 'beritas'));
    }

    /**
     * Detail Liputan Berita
     */
    public function liputanBeritaDetail($slug)
    {
        $berita = Content::where('section', 'dokumen')
            ->where('is_published', true)
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedNews = Content::where('section', 'dokumen')
            ->where('is_published', true)
            ->where('category', 'liputan')
            ->where('id', '!=', $berita->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view('frontend.dokumen.berita-detail', compact('berita', 'relatedNews'));
    }

    // ================================================================
    // KONTAK
    // ================================================================

    /**
     * Kontak
     */
    public function kontak()
    {
        $header = $this->getContent('kontak', 'header', true);
        $info = $this->getContent('kontak', 'info', true);
        $alamat = $this->getContent('kontak', 'alamat', true);

        return view('frontend.kontak', compact('header', 'info', 'alamat'));
    }

    /**
     * Kontak - Submit Form
     */
    public function kontakSubmit(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'nullable|string|max:255',
            'pesan' => 'required|string|max:2000',
        ]);

        // TODO: Simpan ke database atau kirim email
        
        return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera merespons.');
    }

    // ================================================================
    // TEAM
    // ================================================================

    /**
     * Team - List
     */
    public function team()
    {
        $header = $this->getContent('team', 'header', true);
        $teams = Team::where('is_active', true)->orderBy('urutan')->get();

        return view('frontend.team', compact('header', 'teams'));
    }

    /**
     * Team - Detail
     */
    public function teamDetail(Team $team)
    {
        if (!$team->is_active) {
            abort(404);
        }

        return view('frontend.team-detail', compact('team'));
    }

    // ================================================================
    // SUBSCRIBE
    // ================================================================

    /**
     * Set Language Locale
     */
    public function setLocale(Request $request, string $locale)
    {
        $locales = config('app.locales', ['id', 'en']);

        if (in_array($locale, $locales, true)) {
            session(['locale' => $locale]);
        } else {
            session(['locale' => config('app.locale', 'id')]);
        }

        $redirectTo = (string) $request->query('redirect', '');
        if ($redirectTo !== '') {
            $parsed = parse_url($redirectTo);
            $path = (string) ($parsed['path'] ?? '');
            $hasExternalHost = isset($parsed['host']) && $parsed['host'] !== $request->getHost();

            // Prevent open redirect and avoid redirecting back to /lang/* routes.
            if (! $hasExternalHost && ! Str::startsWith($path, '/lang/')) {
                if (!isset($parsed['scheme']) && ! Str::startsWith($redirectTo, '/')) {
                    $redirectTo = '/'.$redirectTo;
                }

                return redirect()->to($redirectTo);
            }
        }

        $previousUrl = url()->previous();
        if ($previousUrl && ! str_contains($previousUrl, '/lang/')) {
            return redirect()->to($previousUrl);
        }

        return redirect()->route('home');
    }

    /**
     * Subscribe Newsletter (AJAX)
     */
    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255'
        ]);

        // TODO: Simpan ke database subscriber

        return response()->json([
            'success' => true,
            'message' => 'Berhasil subscribe! Terima kasih.'
        ]);
    }
}
