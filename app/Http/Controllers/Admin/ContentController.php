<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class ContentController extends Controller
{
    /**
     * Konfigurasi sections dan categories
     * UPDATED: Sesuai dengan kebutuhan frontend
     */
    protected array $sections = [
        'home' => [
            'name' => 'Home',
            'icon' => 'fa-house',
            'color' => 'blue',
            'description' => 'Header, Slider, Sambutan, Program Kerja',
            'categories' => [
                'header' => [
                    'name' => 'Header Home',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'max_items' => 1,
                    'description' => 'Header utama halaman beranda',
                ],
                'slider' => [
                    'name' => 'Slider Home',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                ],
                'welcome' => [
                    'name' => 'Sambutan Home',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'max_items' => 1,
                ],
                'program-kerja' => [
                    'name' => 'Program Kerja UPPM',
                    'has_image' => false,
                    'has_file' => false,
                    'has_icon' => false,
                    'description' => 'Item accordion Program Kerja di halaman home',
                ],
            ]
        ],
        'profil' => [
            'name' => 'Profile',
            'icon' => 'fa-address-card',
            'color' => 'teal',
            'description' => 'Header Profile, Tentang, Sejarah, Visi Misi, Struktur Organisasi',
            'categories' => [
                'header' => [
                    'name' => 'Header Profile',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'max_items' => 1,
                    'description' => 'Header khusus halaman profile',
                ],
                'tentang' => [
                    'name' => 'Tentang',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                ],
                'sejarah' => [
                    'name' => 'Sejarah',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                ],
                'visi' => [
                    'name' => 'Visi',
                    'has_image' => false,
                    'has_file' => false,
                    'has_icon' => true,
                    'description' => 'Visi UPPM - akan ditampilkan di card pertama',
                ],
                'misi' => [
                    'name' => 'Misi',
                    'has_image' => false,
                    'has_file' => false,
                    'has_icon' => true,
                    'description' => 'Misi UPPM - akan ditampilkan di card kedua',
                ],
                'struktur-organisasi' => [
                    'name' => 'Struktur Organisasi',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'description' => 'Upload anggota struktur organisasi (foto bulat)',
                ],
            ]
        ],
        'penelitian' => [
            'name' => 'Penelitian',
            'icon' => 'fa-flask',
            'color' => 'yellow',
            'description' => 'Header, Panduan dan Pengumuman Penelitian',
            'categories' => [
                'header' => [
                    'name' => 'Header',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'max_items' => 1,
                    'description' => 'Header untuk seluruh halaman penelitian',
                ],
                'panduan' => [
                    'name' => 'Panduan',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => true,
                ],
                'pengumuman_penelitian' => [
                    'name' => 'Pengumuman Penelitian',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => false,
                ],
            ]
        ],
        // ============================================
        // PENGABDIAN - UPDATED sesuai frontend
        // ============================================
        'pengabdian' => [
            'name' => 'Pengabdian Masyarakat',
            'icon' => 'fa-hands-helping',
            'color' => 'pink',
            'description' => 'Header, Panduan, Skema, Program, Pelatihan, Kegiatan',
            'categories' => [
                'header' => [
                    'name' => 'Header',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'max_items' => 1,
                    'description' => 'Header untuk seluruh halaman pengabdian',
                ],
                'panduan' => [
                    'name' => 'Panduan Pengabdian',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => true,
                    'description' => 'Panduan dan prosedur pengabdian masyarakat',
                ],
                'skema' => [
                    'name' => 'Skema Pengabdian',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => true,
                    'description' => 'Skema/panduan pengabdian (dengan file PDF)',
                ],
                'program' => [
                    'name' => 'Program Pengabdian',
                    'has_image' => true,
                    'has_file' => true,
                    'has_icon' => false,
                    'description' => 'Program-program pengabdian masyarakat',
                ],
                'program_pelatihan' => [
                    'name' => 'Program Pelatihan',
                    'has_image' => true,
                    'has_file' => true,
                    'has_icon' => false,
                    'description' => 'Program-program pelatihan untuk masyarakat dan industri',
                ],
                'kegiatan' => [
                    'name' => 'Kegiatan',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'description' => 'Dokumentasi kegiatan pengabdian',
                ],
            ]
        ],
        'publikasi' => [
            'name' => 'Publikasi',
            'icon' => 'fa-book',
            'color' => 'indigo',
            'description' => 'Header, Jurnal BPTKSPK, Jurnal OJS, Prosiding Semnas',
            'categories' => [
                'header' => [
                    'name' => 'Header',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'max_items' => 1,
                    'description' => 'Header untuk seluruh halaman publikasi',
                ],
                'jurnal-bptkspk' => [
                    'name' => 'Jurnal BPTKSPK',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => false,
                ],
                'jurnal-ojs' => [
                    'name' => 'Jurnal OJS',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => false,
                ],
                'prosiding-semnas' => [
                    'name' => 'Prosiding Semnas',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => false,
                ],
            ]
        ],
        // ============================================
        // KEMITRAAN - BARU
        // ============================================
        'kemitraan' => [
            'name' => 'Kemitraan',
            'icon' => 'fa-handshake',
            'color' => 'green',
            // Disesuaikan dengan struktur subjudul di halaman publik kemitraan
            'description' => 'Header, Daftar Mitra & Dokumen Kerja Sama',
            'categories' => [
                'header' => [
                    'name' => 'Header',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'max_items' => 1,
                    'description' => 'Header untuk seluruh halaman kemitraan',
                ],
                'partner' => [
                    // Menyesuaikan dengan subjudul "Daftar Mitra" di halaman publik
                    'name' => 'Daftar Mitra',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'description' => 'Logo dan informasi perusahaan mitra',
                ],
                'kerjasama' => [
                    // Menjelaskan bahwa ini berisi dokumen kerja sama / MoU
                    'name' => 'Dokumen Kerja Sama',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => true,
                    'description' => 'Dokumen kerja sama dan MoU',
                ],
            ]
        ],
        // ============================================
        // DOKUMEN - MERGED (Arsip + Berita)
        // ============================================
        'dokumen' => [
            'name' => 'Dokumen',
            'icon' => 'fa-archive',
            'color' => 'gray',
            // Disesuaikan dengan tampilan halaman dokumen publik (Arsip Dokumen & Liputan Berita)
            'description' => 'Header, Arsip Dokumen & Liputan Berita',
            'categories' => [
                'header' => [
                    'name' => 'Header',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'max_items' => 1,
                    'description' => 'Header untuk seluruh halaman dokumen',
                ],
                'arsip' => [
                    'name' => 'Arsip Dokumen',
                    'has_image' => false,
                    'has_file' => true,
                    'has_icon' => true,
                    // Menyebutkan sub-kategori filter: SK, Panduan, Template, Laporan
                    'description' => 'Arsip dokumen (SK & Peraturan, Panduan, Template, Laporan)',
                    'subcategories' => [
                        'sk' => 'SK & Peraturan',
                        'panduan' => 'Panduan',
                        'template' => 'Template',
                        'laporan' => 'Laporan',
                    ],
                ],
                'liputan' => [
                    // Menyesuaikan dengan judul halaman publik "Liputan Berita"
                    'name' => 'Liputan Berita',
                    'has_image' => true,
                    'has_file' => false,
                    'has_icon' => false,
                    'description' => 'Berita dan liputan kegiatan',
                ],
            ]
        ],
        // KONTAK DIHAPUS - tidak ada lagi di admin panel
    ];

    /**
     * Helper: Get category name (support old & new format)
     */
    protected function getCategoryName($category): string
    {
        if (is_array($category)) {
            return $category['name'] ?? 'Unknown';
        }
        return $category;
    }

    /**
     * Helper: Get category config
     */
    protected function getCategoryConfig($section, $categoryKey): array
    {
        $cat = $this->sections[$section]['categories'][$categoryKey] ?? [];
        
        // Support old format (string only)
        if (is_string($cat)) {
            return [
                'name' => $cat,
                'has_image' => true,
                'has_file' => true,
                'has_icon' => false,
            ];
        }
        
        return $cat;
    }

    /**
     * Simpan fallback marker subkategori arsip di field content jika kolom meta belum tersedia.
     */
    protected function withArsipKategoriMarker(?string $content, ?string $metaKategori, bool $isArsipDokumen): string
    {
        $cleanContent = trim(preg_replace('/<!--\s*arsip_kategori\s*:\s*[a-z_\-]+\s*-->/i', '', (string) $content));

        if (!$isArsipDokumen || !$metaKategori) {
            return $cleanContent;
        }

        $allowed = ['sk', 'panduan', 'template', 'laporan'];
        if (!in_array($metaKategori, $allowed, true)) {
            return $cleanContent;
        }

        $marker = "<!--arsip_kategori:{$metaKategori}-->";
        return $cleanContent === '' ? $marker : $cleanContent . PHP_EOL . $marker;
    }

    /**
     * Halaman utama kelola konten
     */
    public function index()
    {
        $sectionData = [];
        foreach ($this->sections as $key => $section) {
            $count = Content::where('section', $key)->count();
            $sectionData[$key] = array_merge($section, [
                'slug' => $key,
                'count' => $count
            ]);
        }

        return view('admin.konten.index', [
            'sections' => $sectionData
        ]);
    }

    /**
     * Halaman section tertentu
     */
    public function section(string $section)
    {
        if (!array_key_exists($section, $this->sections)) {
            abort(404, 'Section tidak ditemukan');
        }

        $sectionConfig = $this->sections[$section];
        
        $contents = Content::where('section', $section)
            ->orderBy('category')
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();

        $contentsByCategory = $contents->groupBy('category');

        // Build category counts and names
        $categoryCounts = [];
        $categoryNames = [];
        foreach ($sectionConfig['categories'] as $catKey => $catConfig) {
            // Use groupBy result to get accurate counts (more efficient)
            $categoryCounts[$catKey] = $contentsByCategory->get($catKey)?->count() ?? 0;
            $categoryNames[$catKey] = $this->getCategoryName($catConfig);
        }

        return view('admin.konten.section', [
            'section' => $section,
            'sectionConfig' => $sectionConfig,
            'contents' => $contents,
            'contentsByCategory' => $contentsByCategory,
            'categoryCounts' => $categoryCounts,
            'categoryNames' => $categoryNames,
            'totalContents' => $contents->count()
        ]);
    }

    /**
     * Simpan konten baru
     */
    public function store(Request $request, string $section, string $category)
    {
        Log::info('Content store attempt', [
            'section' => $section,
            'category' => $category,
            'user_id' => Auth::id(),
            'request_data' => $request->all()
        ]);

        // Validasi section
        if (!array_key_exists($section, $this->sections)) {
            Log::warning('Invalid section', ['section' => $section]);
            return response()->json([
                'success' => false, 
                'message' => 'Section tidak valid: ' . $section
            ], 400);
        }

        // Validasi category
        if (!array_key_exists($category, $this->sections[$section]['categories'])) {
            Log::warning('Invalid category', ['section' => $section, 'category' => $category]);
            return response()->json([
                'success' => false, 
                'message' => 'Category tidak valid: ' . $category
            ], 400);
        }

        // Validasi request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'excerpt' => 'nullable|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'file' => 'nullable|file|max:10240',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_published' => 'nullable'
        ]);

        $categoryConfig = $this->getCategoryConfig($section, $category);
        $maxItems = $categoryConfig['max_items'] ?? null;
        $existingContent = null;
        if ($maxItems === 1) {
            $existingContent = Content::where('section', $section)
                ->where('category', $category)
                ->orderByDesc('updated_at')
                ->first();
        }
        $metaKategori = $request->input('meta_kategori');
        $allowedSubcategories = array_keys($categoryConfig['subcategories'] ?? []);
        if ($section === 'dokumen' && $category === 'arsip') {
            if (!$metaKategori || (!empty($allowedSubcategories) && !in_array($metaKategori, $allowedSubcategories, true))) {
                return response()->json([
                    'success' => false,
                    'message' => 'Subkategori arsip dokumen wajib dipilih.'
                ], 422);
            }
        }

        try {
            // Check if user is authenticated
            $userId = Auth::id();
            if (!$userId) {
                Log::error('User not authenticated for content creation');
                return response()->json([
                    'success' => false,
                    'message' => 'Anda harus login untuk menyimpan konten'
                ], 401);
            }

            $contentText = $validated['content'] ?? '';
            $excerptText = $validated['excerpt'] ?? '';
            $isArsipDokumen = $section === 'dokumen' && $category === 'arsip';
            $metaColumnExists = Schema::hasColumn('contents', 'meta');
            $contentWithMarker = $this->withArsipKategoriMarker($contentText, $metaKategori, $isArsipDokumen);

            if (empty($excerptText) && !empty($contentText)) {
                $excerptText = Str::limit(strip_tags($contentText), 150);
            }
            $excerptText = $excerptText ?? '';

            $data = [
                'title' => $validated['title'],
                'content' => $contentWithMarker,
                'excerpt' => $excerptText,
                'icon' => $request->icon ?? ($existingContent?->icon ?? null),
                'order' => $request->order ?? ($existingContent?->order ?? 0),
                'is_published' => $request->boolean('is_published', false),
            ];
            if ($isArsipDokumen) {
                $data['meta'] = [
                    'kategori' => $metaKategori,
                ];
            }
            if (array_key_exists('meta', $data) && !$metaColumnExists) {
                unset($data['meta']);
                Log::warning('Meta column missing on contents table; skipping meta payload.');
            }

            if (!$existingContent) {
                $data['slug'] = Str::slug($validated['title']) . '-' . time();
                $data['section'] = $section;
                $data['category'] = $category;
                $data['user_id'] = $userId;
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                try {
                    if ($existingContent && $existingContent->image) {
                        Storage::disk('public')->delete($existingContent->image);
                    }
                    $imagePath = $request->file('image')->store("content/{$section}", 'public');
                    $data['image'] = $imagePath;
                } catch (\Exception $e) {
                    Log::error('Image upload failed', ['error' => $e->getMessage()]);
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal upload gambar: ' . $e->getMessage()
                    ], 500);
                }
            }

            // Handle file upload
            if ($request->hasFile('file')) {
                try {
                    if ($existingContent && $existingContent->file) {
                        Storage::disk('public')->delete($existingContent->file);
                    }
                    $filePath = $request->file('file')->store("content/{$section}/files", 'public');
                    $data['file'] = $filePath;
                } catch (\Exception $e) {
                    Log::error('File upload failed', ['error' => $e->getMessage()]);
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal upload file: ' . $e->getMessage()
                    ], 500);
                }
            }

            if ($existingContent) {
                $existingContent->update($data);

                Log::info('Content updated via store', ['id' => $existingContent->id, 'title' => $existingContent->title]);

                return response()->json([
                    'success' => true,
                    'message' => 'Konten berhasil diperbarui!',
                    'data' => $existingContent->fresh()
                ], 200);
            }

            $content = Content::create($data);

            Log::info('Content created', ['id' => $content->id, 'title' => $content->title]);

            return response()->json([
                'success' => true,
                'message' => 'Konten berhasil ditambahkan!',
                'data' => $content
            ], 201);

        } catch (\Exception $e) {
            Log::error('Content store failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get data konten untuk edit (AJAX)
     */
    public function edit(int $id)
    {
        try {
            $content = Content::find($id);
            
            if (!$content) {
                return response()->json([
                    'success' => false,
                    'message' => 'Konten tidak ditemukan'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'data' => $content
            ]);
            
        } catch (\Exception $e) {
            Log::error('Edit content error', ['id' => $id, 'error' => $e->getMessage()]);
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal memuat data: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update konten
     */
    public function update(Request $request, int $id)
    {
        $content = Content::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'excerpt' => 'nullable|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'file' => 'nullable|file|max:10240',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_published' => 'nullable'
        ]);

        $metaKategori = $request->input('meta_kategori');
        if ($content->section === 'dokumen' && $content->category === 'arsip') {
            $categoryConfig = $this->getCategoryConfig($content->section, $content->category);
            $allowedSubcategories = array_keys($categoryConfig['subcategories'] ?? []);
            if (!$metaKategori || (!empty($allowedSubcategories) && !in_array($metaKategori, $allowedSubcategories, true))) {
                return response()->json([
                    'success' => false,
                    'message' => 'Subkategori arsip dokumen wajib dipilih.'
                ], 422);
            }
        }

        try {
            $contentText = $validated['content'] ?? '';
            $excerptText = $validated['excerpt'] ?? '';
            $isArsipDokumen = $content->section === 'dokumen' && $content->category === 'arsip';
            $metaColumnExists = Schema::hasColumn('contents', 'meta');
            $contentWithMarker = $this->withArsipKategoriMarker($contentText, $metaKategori, $isArsipDokumen);

            if (empty($excerptText) && !empty($contentText)) {
                $excerptText = Str::limit(strip_tags($contentText), 150);
            }
            $excerptText = $excerptText ?? '';

            $data = [
                'title' => $validated['title'],
                'content' => $contentWithMarker,
                'excerpt' => $excerptText,
                'icon' => $request->icon ?? $content->icon,
                'order' => $request->order ?? $content->order,
                'is_published' => $request->boolean('is_published', false),
            ];
            if ($isArsipDokumen) {
                $data['meta'] = [
                    'kategori' => $metaKategori,
                ];
            }
            if (array_key_exists('meta', $data) && !$metaColumnExists) {
                unset($data['meta']);
                Log::warning('Meta column missing on contents table; skipping meta payload.');
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                if ($content->image) {
                    Storage::disk('public')->delete($content->image);
                }
                $data['image'] = $request->file('image')->store("content/{$content->section}", 'public');
            }

            // Handle file upload
            if ($request->hasFile('file')) {
                if ($content->file) {
                    Storage::disk('public')->delete($content->file);
                }
                $data['file'] = $request->file('file')->store("content/{$content->section}/files", 'public');
            }

            $content->update($data);

            Log::info('Content updated', ['id' => $content->id]);

            return response()->json([
                'success' => true,
                'message' => 'Konten berhasil diupdate!',
                'data' => $content->fresh()
            ]);

        } catch (\Exception $e) {
            Log::error('Content update failed', ['error' => $e->getMessage()]);
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal update: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Hapus konten
     */
    public function destroy(int $id)
    {
        try {
            $content = Content::findOrFail($id);

            if ($content->image) {
                Storage::disk('public')->delete($content->image);
            }
            if ($content->file) {
                Storage::disk('public')->delete($content->file);
            }

            $content->delete();

            Log::info('Content deleted', ['id' => $id]);

            return response()->json([
                'success' => true,
                'message' => 'Konten berhasil dihapus!'
            ]);

        } catch (\Exception $e) {
            Log::error('Content delete failed', ['error' => $e->getMessage()]);
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus: ' . $e->getMessage()
            ], 500);
        }
    }
}
