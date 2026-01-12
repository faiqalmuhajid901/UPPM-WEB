@extends('layouts.frontend')
@section('title', 'Penelitian')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    
    <!-- Header Halaman -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Penelitian</h1>
        <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
        <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Daftar kegiatan penelitian dan karya ilmiah yang sedang dilakukan oleh civitas akademika Politeknik ATK Yogyakarta.</p>
    </div>

    <!-- Grid Konten Dinamis -->
    @if($contents->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($contents as $item)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- Gambar -->
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                            <span class="text-sm">Tidak ada gambar</span>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $item->title }}</h3>
                        <p class="text-gray-600 text-sm line-clamp-3">{{ \Illuminate\Support\Str::limit($item->description, 150) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12 bg-gray-100 rounded-lg">
            <p class="text-gray-500 italic">Belum ada data penelitian yang ditampilkan.</p>
        </div>
    @endif

</div>
@endsection