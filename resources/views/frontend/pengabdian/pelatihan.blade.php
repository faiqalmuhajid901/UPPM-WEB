{{-- FILE: resources/views/frontend/pengabdian/pelatihan.blade.php --}}
@extends('layouts.frontend')

@section('title', __('ui.pelatihan_page_title'))

@push('styles')
@vite('resources/css/pengabdian.css')
@endpush

@section('content')
<div class="pelatihan-page">
    
    {{-- Hero Section - Same style as main pengabdian page --}}
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
                <i class="fas fa-graduation-cap"></i>
                <span>{{ __('ui.program_pelatihan') }}</span>
            </div>
            <h1 class="hero-title">{{ $header->title ?? __('ui.program_pelatihan') }}</h1>
            <p class="hero-subtitle">
                {{ $header->excerpt ?? 'Program pelatihan untuk masyarakat dan industri di bidang kulit, karet, dan plastik' }}
            </p>
            <div class="hero-buttons">
                <a href="{{ route('kontak') }}" class="btn-hero-secondary">
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

    {{-- Main Content --}}
    <section class="section-content">
        <div class="container">
            
            {{-- Introduction --}}
            <div class="content-intro">
                <div class="content-intro__icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="content-intro__text">
                    <h2>{{ __('ui.tentang_pelatihan') }}</h2>
                    <p>{{ $header->content ?? 'UPPM Politeknik ATK Yogyakarta menyelenggarakan berbagai program pelatihan untuk meningkatkan kompetensi masyarakat dan pelaku industri di bidang kulit, karet, dan plastik. Program ini dirancang untuk memenuhi kebutuhan industri dan mendukung pengembangan UMKM.' }}</p>
                </div>
            </div>

            {{-- Jenis Pelatihan --}}
            <div class="pelatihan-section">
                <div class="section-header text-center">
                    <span class="section-badge">{{ __('ui.jenis_pelatihan') }}</span>
                    <h3 class="section-title text-center">{{ __('ui.jenis_pelatihan') }}</h3>
                    <p class="section-subtitle text-center">{{ __('ui.jenis_pelatihan_desc') }}</p>
                </div>
                <div class="pelatihan-grid">
                    @forelse($pelatihan ?? [] as $item)
                        <div class="pelatihan-card">
                            @if($item->image_url)
                                <div class="pelatihan-card__image">
                                    <img src="{{ $item->image_url }}" alt="{{ $item->title }}" loading="lazy">
                                </div>
                            @endif
                            <div class="pelatihan-card__icon">
                                <i class="fas fa-{{ $item->icon ?? 'graduation-cap' }}"></i>
                            </div>
                            <div class="pelatihan-card__content">
                                <h4 class="pelatihan-card__title">{{ $item->title }}</h4>
                                <p class="pelatihan-card__desc">{{ $item->excerpt ?? 'Deskripsi pelatihan akan ditampilkan di sini.' }}</p>
                                <a href="{{ $item->file_url ?? '#' }}" class="pelatihan-card__link" target="_blank" rel="noopener noreferrer">
                                    {{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @empty
                        {{-- Placeholder Cards --}}
                        <div class="pelatihan-card">
                            <div class="pelatihan-card__icon">
                                <i class="fas fa-cut"></i>
                            </div>
                            <div class="pelatihan-card__content">
                                <h4 class="pelatihan-card__title">Pelatihan Pengolahan Kulit</h4>
                                <p class="pelatihan-card__desc">Teknik pengolahan kulit dari bahan baku hingga produk jadi.</p>
                                <a href="#" class="pelatihan-card__link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="pelatihan-card">
                            <div class="pelatihan-card__icon">
                                <i class="fas fa-industry"></i>
                            </div>
                            <div class="pelatihan-card__content">
                                <h4 class="pelatihan-card__title">Pelatihan Teknologi Karet</h4>
                                <p class="pelatihan-card__desc">Pengolahan dan pemanfaatan karet untuk berbagai produk industri.</p>
                                <a href="#" class="pelatihan-card__link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="pelatihan-card">
                            <div class="pelatihan-card__icon">
                                <i class="fas fa-flask"></i>
                            </div>
                            <div class="pelatihan-card__content">
                                <h4 class="pelatihan-card__title">Pelatihan Quality Control</h4>
                                <p class="pelatihan-card__desc">Pengendalian mutu dan standar kualitas produk.</p>
                                <a href="#" class="pelatihan-card__link">{{ __('ui.pelajari_lanjut') }} <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

</div>
@endsection


