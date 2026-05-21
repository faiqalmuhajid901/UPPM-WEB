<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * Tampilkan daftar semua anggota tim
     */
    public function index(): View
    {
        $team = Team::orderBy('urutan')->paginate(10);
        return view('admin.team.index', compact('team'));
    }

    /**
     * Tampilkan form tambah anggota
     */
    public function create(): View
    {
        return view('admin.team.create');
    }

    /**
     * Simpan anggota baru
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:dosen,mahasiswa,alumni,staff',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'linkedin' => 'nullable|url|max:255',
            'google_scholar' => 'nullable|url|max:255',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Set default values
        $validated['urutan'] = $validated['urutan'] ?? 0;
        $validated['is_active'] = $request->has('is_active');

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('team', 'public');
        }

        Team::create($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    /**
     * Tampilkan detail anggota
     */
    public function show(Team $team): View
    {
        return view('admin.team.show', compact('team'));
    }

    /**
     * Tampilkan form edit anggota
     */
    public function edit(Team $team): View
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update data anggota
     */
    public function update(Request $request, Team $team): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|in:dosen,mahasiswa,alumni,staff',
            'bio' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'linkedin' => 'nullable|url|max:255',
            'google_scholar' => 'nullable|url|max:255',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        // Upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($team->foto) {
                Storage::disk('public')->delete($team->foto);
            }
            $validated['foto'] = $request->file('foto')->store('team', 'public');
        }

        $team->update($validated);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Data anggota berhasil diupdate!');
    }

    /**
     * Hapus anggota
     */
    public function destroy(Team $team): RedirectResponse
    {
        // Hapus foto jika ada
        if ($team->foto) {
            Storage::disk('public')->delete($team->foto);
        }

        $team->delete();

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Anggota tim berhasil dihapus!');
    }
}
