{{-- FILE: resources/views/frontend/dokumen/berita.blade.php --}}
@extends('layouts.frontend')

@section('title', __('ui.liputan_berita') . ' - UPPM Politeknik ATK')

@push('styles')
@vite('resources/css/pengabdian.css')
@vite('resources/css/pages/berita.css')
@endpush

@section('content')
<div class="pelayanan-page">

    {{-- Hero Section --}}
    <section class="pengabdian-hero @if($header && $header->image_url) has-dynamic-bg @endif" @if($header && $header->image_url) data-bg-image="{{ $header->image_url }}" @endif>
        @if($header && $header->image_url)
        <div class="hero-overlay hero-overlay--dark"></div>
        @else
        <div class="hero-overlay"></div>
        @endif
        @unless($header && $header->image_url)
        <div class="hero-pattern"></div>
        @endunless
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-newspaper"></i>
                <span>{{ __('ui.liputan_media') }}</span>
            </div>
            <h1 class="hero-title">{{ $header->title ?? __('ui.liputan_berita') }}</h1>
            <p class="hero-subtitle">
                {{ $header->excerpt ?? __('ui.liputan_berita_desc') }}
            </p>
            <div class="hero-buttons">
                <a href="{{ route('kontak') }}" class="btn-hero-primary">
                    <i class="fas fa-envelope"></i>
                    {{ __('ui.contact_us') }}
                </a>
            </div>
        </div>
        <div class="hero-scroll-indicator">
            <span>{{ __('ui.scroll') }}</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    {{-- Berita Content --}}
    <section class="section-content">
        <div class="container">

            {{-- Featured News (Berita Utama) --}}
            @if($beritas->count() > 0)
            <div class="berita-featured">
                @php $featured = $beritas->first(); @endphp
                <div class="berita-featured__image">
                    <img src="{{ $featured->image_url ?? asset('images/placeholder-news.jpg') }}" alt="{{ $featured->title }}">
                    <span class="berita-featured__badge">{{ __('ui.terbaru') }}</span>
                </div>
                <div class="berita-featured__content">
                    <span class="berita-featured__date">{{ $featured->created_at->format('d F Y') }}</span>
                    <h2 class="berita-featured__title">{{ $featured->title }}</h2>
                    <p class="berita-featured__excerpt">{{ Str::limit(strip_tags($featured->content), 200) }}</p>
                    <a href="{{ route('dokumen.berita.detail', $featured->slug) }}" class="berita-featured__link">
                        {{ __('ui.baca_selengkapnya') }}
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endif

            {{-- News Grid --}}
            <div class="berita-grid">
                @foreach($beritas->skip(1) as $berita)
                <article class="berita-card">
                    <div class="berita-card__image">
                        <img src="{{ $berita->image_url ?? asset('images/placeholder-news.jpg') }}" alt="{{ $berita->title }}">
                    </div>
                    <div class="berita-card__content">
                        <span class="berita-card__date">{{ $berita->created_at->format('d M Y') }}</span>
                        <h3 class="berita-card__title">{{ Str::limit($berita->title, 60) }}</h3>
                        <p class="berita-card__excerpt">{{ Str::limit(strip_tags($berita->content), 100) }}</p>
                        <a href="{{ route('dokumen.berita.detail', $berita->slug) }}" class="berita-card__link">
                            {{ __('ui.baca_selengkapnya') }} â†’
                        </a>
                    </div>
                </article>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($beritas->hasPages())
            <div class="berita-pagination">
                {{ $beritas->links() }}
            </div>
            @endif

            {{-- Empty State --}}
            @if($beritas->count() == 0)
            <div class="berita-empty">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <h3>{{ __('ui.belum_ada_berita') }}</h3>
                <p>{{ __('ui.berita_segera_ditambahkan') }}</p>
            </div>
            @endif

        </div>
    </section>

</div>
@endsection

