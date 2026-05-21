<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PublikasiController extends Controller
{
    /**
     * Tampilkan daftar semua publikasi
     */
    public function index(): View
    {
        $publikasi = Publikasi::latest()->paginate(10);
        return view('admin.publikasi.index', compact('publikasi'));
    }

    /**
     * Tampilkan form tambah publikasi
     */
    public function create(): View
    {
        return view('admin.publikasi.create');
    }

    /**
     * Simpan publikasi baru
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'abstrak' => 'nullable|string',
            'penulis' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'jenis' => 'required|in:jurnal,konferensi,buku,lainnya',
            'nama_jurnal' => 'nullable|string|max:255',
            'volume' => 'nullable|string|max:50',
            'halaman' => 'nullable|string|max:50',
            'doi' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Upload file PDF jika ada
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('publikasi', 'public');
        }

        Publikasi::create($validated);

        return redirect()
            ->route('admin.publikasi.index')
            ->with('success', 'Publikasi berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail publikasi
     */
    public function show(Publikasi $publikasi): View
    {
        return view('admin.publikasi.show', compact('publikasi'));
    }

    /**
     * Tampilkan form edit publikasi
     */
    public function edit(Publikasi $publikasi): View
    {
        return view('admin.publikasi.edit', compact('publikasi'));
    }

    /**
     * Update data publikasi
     */
    public function update(Request $request, Publikasi $publikasi): RedirectResponse
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'abstrak' => 'nullable|string',
            'penulis' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'jenis' => 'required|in:jurnal,konferensi,buku,lainnya',
            'nama_jurnal' => 'nullable|string|max:255',
            'volume' => 'nullable|string|max:50',
            'halaman' => 'nullable|string|max:50',
            'doi' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Upload file baru jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($publikasi->file) {
                Storage::disk('public')->delete($publikasi->file);
            }
            $validated['file'] = $request->file('file')->store('publikasi', 'public');
        }

        $publikasi->update($validated);

        return redirect()
            ->route('admin.publikasi.index')
            ->with('success', 'Publikasi berhasil diupdate!');
    }

    /**
     * Hapus publikasi
     */
    public function destroy(Publikasi $publikasi): RedirectResponse
    {
        // Hapus file jika ada
        if ($publikasi->file) {
            Storage::disk('public')->delete($publikasi->file);
        }

        $publikasi->delete();

        return redirect()
            ->route('admin.publikasi.index')
            ->with('success', 'Publikasi berhasil dihapus!');
    }
}
