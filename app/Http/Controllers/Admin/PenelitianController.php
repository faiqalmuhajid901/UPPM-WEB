<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penelitian = Penelitian::latest()->paginate(10);
        return view('admin.penelitian.index', compact('penelitian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penelitian.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penulis' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:2099',
            'status' => 'required|in:berlangsung,selesai',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('penelitian/gambar', 'public');
        }

        // Upload file PDF jika ada
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('penelitian/file', 'public');
        }

        Penelitian::create($validated);

        return redirect()->route('admin.penelitian.index')
            ->with('success', 'Penelitian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penelitian $penelitian)
    {
        return view('admin.penelitian.show', compact('penelitian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penelitian $penelitian)
    {
        return view('admin.penelitian.edit', compact('penelitian'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penelitian $penelitian)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'penulis' => 'required|string|max:255',
            'tahun' => 'required|integer|min:2000|max:2099',
            'status' => 'required|in:berlangsung,selesai',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'file' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($penelitian->gambar) {
                Storage::disk('public')->delete($penelitian->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('penelitian/gambar', 'public');
        }

        // Upload file baru jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($penelitian->file) {
                Storage::disk('public')->delete($penelitian->file);
            }
            $validated['file'] = $request->file('file')->store('penelitian/file', 'public');
        }

        $penelitian->update($validated);

        return redirect()->route('admin.penelitian.index')
            ->with('success', 'Penelitian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penelitian $penelitian)
    {
        // Hapus gambar jika ada
        if ($penelitian->gambar) {
            Storage::disk('public')->delete($penelitian->gambar);
        }

        // Hapus file jika ada
        if ($penelitian->file) {
            Storage::disk('public')->delete($penelitian->file);
        }

        $penelitian->delete();

        return redirect()->route('admin.penelitian.index')
            ->with('success', 'Penelitian berhasil dihapus.');
    }
}
