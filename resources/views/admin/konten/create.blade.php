@extends('layouts.admin')
@section('title', 'Tambah Konten')
@section('page_title', 'Tambah Konten Baru')

@section('admin_content')
<div class="max-w-4xl mx-auto py-8">
    <div class="bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden">
        <div class="px-8 py-6 border-b border-slate-100">
            <h2 class="text-2xl font-bold text-slate-800">Buat Konten Baru</h2>
        </div>

        <form method="POST" action="{{ route('admin.konten.store') }}" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf

            <!-- Judul -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Judul Konten</label>
                <input type="text" name="title" required class="w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contoh: Pedoman Penelitian 2024">
                @error('title')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Pilih Kategori (DROPDOWN GROUP) -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Kategori / Lokasi</label>
                <div class="relative">
                    <select name="section_key" id="section_key" required class="block w-full pl-3 pr-10 py-2.5 text-base border-slate-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md appearance-none">
                        <option value="">-- Pilih Kategori --</option>

                        <!-- GROUP PROFILE -->
                        <optgroup label="1. Profil">
                            <option value="profil">Profile (Home Slider)</option>
                            <option value="profil_tentang">Tentang UPPM</option>
                            <option value="profil_visi">Visi & Misi</option>
                            <option value="profil_struktur">Struktur Organisasi</option>
                        </optgroup>

                        <!-- GROUP PENELITIAN -->
                        <optgroup label="2. Penelitian">
                            <option value="penelitian">Umum</option>
                            <option value="penelitian_panduan">Panduan</option>
                            <option value="penelitian_jurnal">Jurnal Penelitian</option>
                            <option value="penelitian_haki">HAKI</option>
                        </optgroup>

                        <!-- GROUP PENGABDIAN -->
                        <optgroup label="3. Pengabdian">
                            <option value="pengabdian">Umum</option>
                            <option value="pengabdian_skema">Skema Pengabdian</option>
                            <option value="pengabdian_mitra">Mitra Kerjasama</option>
                            <option value="pengabdian_berita">Berita Kegiatan</option>
                        </optgroup>

                        <!-- GROUP LAINNYA -->
                        <optgroup label="4. Lainnya">
                            <option value="publikasi">Publikasi</option>
                            <option value="kkn">KKN</option>
                        </optgroup>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-700">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
                @error('section_key')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-slate-500">Pilih kategori agar konten muncul di menu yang sesuai.</p>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Isi Konten</label>
                <textarea name="description" rows="5" class="block w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Gambar -->
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Gambar (Opsional)</label>
                <input type="file" name="image" accept="image/*" class="block w-full text-sm text-slate-500 file:mr-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            <!-- Tombol Simpan -->
            <div class="flex items-center justify-end pt-4 border-t border-slate-200">
                <a href="{{ request()->headers->get('referer') }}" class="bg-white text-slate-700 hover:bg-slate-50 border border-slate-300 font-medium py-2.5 px-5 rounded-lg mr-3">Batal</a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-5 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Simpan Konten
                </button>
            </div>
        </form>
    </div>
</div>
@endsection