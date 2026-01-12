@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
<div class="w-full bg-white">
    <div class="w-full bg-gray-50 border-b">
        <div class="max-w-[1920px] mx-auto px-4 py-4 md:py-6">
            {{-- BAGIAN HERO SWIPER --}}
            <div class="swiper hero-swiper relative w-full rounded-2xl overflow-hidden shadow-2xl border border-gray-100 group w-full aspect-[16/9] md:aspect-[21/9]">
                <div class="swiper-wrapper">
                    {{-- SLIDE 1: Dinamis (Ambil dari Database) --}}
                    <div class="swiper-slide bg-white">
                        @if($heroContent)
                            {{-- Jika ada konten di DB, pakai gambar dari DB --}}
                            <img src="{{ asset('storage/' . $heroContent->image) }}" alt="{{ $heroContent->title }}" class="w-full h-auto object-cover block">
                        @else
                            {{-- Fallback jika belum ada konten di DB --}}
                            <img src="{{ asset('images/bg 1.webp') }}" alt="Banner Default" class="w-full h-auto object-cover block">
                        @endif
                    </div>
                    
                    {{-- SLIDE 2: Hardcoded (Tetap ada) --}}
                    <div class="swiper-slide bg-white">
                        <img src="{{ asset('images/bg 2.webp') }}" alt="Banner UPPM 2" class="w-full h-auto object-cover block">
                    </div>

                    {{-- SLIDE 3: Hardcoded --}}
                    <div class="swiper-slide bg-white">
                        <img src="{{ asset('images/bg 3.webp') }}" alt="Banner UPPM 3" class="w-full h-auto object-cover block">
                    </div>
                </div>

                <div class="swiper-button-next !text-[#4fd1c5] opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-75 md:scale-100"></div>
                <div class="swiper-button-prev !text-[#4fd1c5] opacity-0 group-hover:opacity-100 transition-opacity duration-300 transform scale-75 md:scale-100"></div>

                <div class="swiper-pagination"></div>
            </div>
            
            {{-- BAGIAN WELCOME CONTENT (Contoh menampilkan teks dinamis) --}}
            @if($welcomeContent)
            <div class="mt-8 text-center">
                <h2 class="text-3xl font-bold text-gray-800">{{ $welcomeContent->title }}</h2>
                <p class="mt-2 text-gray-600">{{ $welcomeContent->description }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection