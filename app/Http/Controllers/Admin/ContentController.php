<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    // --- 1. METHOD HUB ---
    public function index()
    {
        $contents = WebContent::all()->groupBy('section_key');
        $categories = [
            'profil' => 'Profile Umum (Home)',
            'penelitian' => 'Penelitian',
            'pengabdian' => 'Pengabdian',
            'publikasi' => 'Publikasi',
            'kkn' => 'KKN',
            'profil_tentang' => 'Profil - Tentang UPPM',
            'profil_visi' => 'Profil - Visi & Misi',
            'profil_struktur' => 'Profil - Struktur Organisasi',
            'penelitian_panduan' => 'Panduan Penelitian',
            'penelitian_jurnal' => 'Jurnal Penelitian',
            'penelitian_haki' => 'HAKI Penelitian',
            'pengabdian_skema' => 'Skema Pengabdian',
            'pengabdian_mitra' => 'Mitra Kerjasama',
            'pengabdian_berita' => 'Berita Kegiatan',
        ];

        return view('admin.konten.index', compact('contents', 'categories'));
    }

    // --- 2. METHOD LIST ---
    public function profileIndex()
    {
        $contents = WebContent::where('section_key', 'like', 'profil%')->latest()->get();
        return view('admin.konten.list', [
            'title' => 'Kelola Profile',
            'category' => 'profil', 
            'contents' => $contents,
            'color' => 'blue'
        ]);
    }

    public function penelitianIndex()
    {
        $contents = WebContent::where('section_key', 'penelitian')->latest()->get();
        return view('admin.konten.list', [
            'title' => 'Kelola Penelitian',
            'category' => 'penelitian',
            'contents' => $contents,
            'color' => 'teal'
        ]);
    }

    public function pengabdianIndex()
    {
        $contents = WebContent::where('section_key', 'pengabdian')->latest()->get();
        return view('admin.konten.list', [
            'title' => 'Kelola Pengabdian',
            'category' => 'pengabdian',
            'contents' => $contents,
            'color' => 'orange'
        ]);
    }

    public function publikasiIndex()
    {
        $contents = WebContent::where('section_key', 'publikasi')->latest()->get();
        return view('admin.konten.list', [
            'title' => 'Kelola Publikasi',
            'category' => 'publikasi',
            'contents' => $contents,
            'color' => 'purple'
        ]);
    }

    public function kknIndex()
    {
        $contents = WebContent::where('section_key', 'kkn')->latest()->get();
        return view('admin.konten.list', [
            'title' => 'Kelola KKN',
            'category' => 'kkn',
            'contents' => $contents,
            'color' => 'pink'
        ]);
    }

    // --- 3. HELPER REDIRECT ---
    private function getRedirectRoute($section_key)
    {
        $map = [
            'profil' => 'admin.konten.manage.profile',
            'penelitian' => 'admin.konten.manage.penelitian',
            'pengabdian' => 'admin.konten.manage.pengabdian',
            'publikasi' => 'admin.konten.manage.publikasi',
            'kkn' => 'admin.konten.manage.kkn',
        ];

        if (str_starts_with($section_key, 'profil_')) return 'admin.konten.manage.profile';
        if (str_starts_with($section_key, 'penelitian_')) return 'admin.konten.manage.penelitian';
        if (str_starts_with($section_key, 'pengabdian_')) return 'admin.konten.manage.pengabdian';

        return $map[$section_key] ?? "admin.konten.manage.{$section_key}";
    }

    // --- 4. CRUD METHODS ---
    public function create()
    {
        return view('admin.konten.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'section_key' => 'required|in:profil,penelitian,pengabdian,publikasi,kkn,profil_tentang,profil_visi,profil_struktur,penelitian_panduan,penelitian_jurnal,penelitian_haki,pengabdian_skema,pengabdian_mitra,pengabdian_berita',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/web_content', 'public');
        }

        WebContent::create($data);

        return redirect()->route($this->getRedirectRoute($data['section_key']))->with('success', 'Konten berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $content = WebContent::findOrFail($id);
        return view('admin.konten.edit', compact('content'));
    }

    public function update(Request $request, $id)
    {
        $content = WebContent::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'section_key' => 'required|in:profil,penelitian,pengabdian,publikasi,kkn,profil_tentang,profil_visi,profil_struktur,penelitian_panduan,penelitian_jurnal,penelitian_haki,pengabdian_skema,pengabdian_mitra,pengabdian_berita',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($content->image && Storage::disk('public')->exists($content->image)) {
                Storage::disk('public')->delete($content->image);
            }
            $data['image'] = $request->file('image')->store('uploads/web_content', 'public');
        }

        $content->update($data);

        return redirect()->route($this->getRedirectRoute($data['section_key']))->with('success', 'Konten berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $content = WebContent::findOrFail($id);

        if ($content->image && Storage::disk('public')->exists($content->image)) {
            Storage::disk('public')->delete($content->image);
        }

        $content->delete();

        return back()->with('success', 'Konten berhasil dihapus.');
    }
}