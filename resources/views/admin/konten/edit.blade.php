@extends('layouts.admin')
@section('title', 'Edit Konten')

@section('admin_content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-800 mb-6">Edit Konten</h2>

        <form method="POST" action="{{ route('admin.konten.update', $content->id) }}">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Judul Konten</label>
                    <input type="text" name="title" value="{{ old('title', $content->title) }}" class="w-full rounded-md border-slate-300 shadow-sm focus:ring focus:ring-indigo-500 border-slate-300">
                </div>

                <!-- Kategori (Section Key) -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Kategori</label>
                    <select name="section_key" class="w-full rounded-md border-slate-300 shadow-sm focus:ring focus:ring-indigo-500 border-slate-300">
                        @foreach([
                            'profil' => 'Profile Umum',
                            'penelitian' => 'Penelitian',
                            'pengabdian' => 'Pengabdian',
                            'publikasi' => 'Publikasi',
                            'kkn' => 'KKN',
                            'profil_tentang' => 'Profil - Tentang',
                            'profil_visi' => 'Profil - Visi Misi',
                            'profil_struktur' => 'Profil - Struktur',
                        ] as $key => $label)
                            <option value="{{ $key }}" {{ $content->section_key === $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <!-- Deskripsi -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-slate-700 mb-2">Deskripsi</label>
                <textarea 
                    name="description" 
                    rows="5" 
                    class="block w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                >{{ old('description', $content->description) }}</textarea>
                
                @error('description')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Gambar -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-slate-700 mb-2">Gambar</label>
                @if($content->image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $content->image) }}" class="h-32 w-auto rounded border">
                        <input type="checkbox" name="remove_image" id="remove_image" class="mr-2">
                        <label for="remove_image" class="text-sm text-red-600">Hapus gambar lama?</label>
                    </div>
                @endif
                <input type="file" name="image" class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            <div class="mt-8 flex justify-end">
                <a href="{{ route('admin.konten.index') }}" class="mr-4 px-4 py-2 bg-white text-slate-700 border border-slate-300 rounded-lg text-sm font-medium hover:bg-slate-50">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg text-sm shadow-sm transition-colors">
                    Update Konten
                </button>
            </div>
        </form>
    </div>
</div>
@endsection