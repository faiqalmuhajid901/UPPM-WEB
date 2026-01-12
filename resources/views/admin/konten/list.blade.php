@extends('layouts.admin')
@section('title', 'Kelola Konten')
@section('page_title', 'Kelola Konten')

@section('admin_content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        
        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="{{ route('admin.konten.index') }}" class="text-slate-500 hover:text-slate-700 flex items-center text-sm">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7l18-18-7 7-7-7 7"></path></svg>
                Kembali ke Menu Utama
            </a>
        </div>

        <!-- Judul & Tombol Tambah (Menggunakan variable $title dan $color) -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-slate-800">{{ $title }}</h3>
            
            {{-- TOMBOL TAMBAH --}}
            {{-- route('admin.konten.create', ['section' => $category]) --}}
            {{-- Ini akan otomatis mengarah ke form create dengan pre-select section --}}
            <a href="{{ route('admin.konten.create', ['section' => $category]) }}" class="bg-{{ $color ?? 'blue' }}-600 hover:bg-{{ $color ?? 'blue' }}-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Tambah Konten
            </a>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Kunci (Section)</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-slate-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @if($contents->count() > 0)
                        @foreach($contents as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-700">{{ $item->title }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs bg-{{ $color ?? 'blue' }}-100 text-{{ $color ?? 'blue' }}-700 rounded px-2 py-1 inline-block w-32 text-center">{{ $item->section_key }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="{{ route('admin.konten.edit', $item->id) }}" class="text-indigo-600 hover:text-indigo-800 mr-3">Edit</a>
                                <form method="POST" action="{{ route('admin.konten.destroy', $item->id) }}" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-slate-400">Belum ada data di bagian ini.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection