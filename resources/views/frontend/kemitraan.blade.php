{{-- FILE: resources/views/frontend/kemitraan.blade.php --}}
@extends('layouts.frontend')

@section('title', __('ui.kemitraan_page_title'))

@push('styles')
@vite('resources/css/pengabdian.css')
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
                <i class="fas fa-handshake"></i>
                <span>{{ __('ui.kerja_sama') }}</span>
            </div>
            <h1 class="hero-title">{{ $header->title ?? __('ui.kemitraan_page_title') }}</h1>
            <p class="hero-subtitle">
                {{ $header->excerpt ?? __('ui.kemitraan_default_desc') }}
            </p>
            <div class="hero-buttons">
                <a href="{{ route('kontak') }}" class="btn-hero-primary">
                    <i class="fas fa-envelope"></i>
                    {{ __('ui.contact_us') }}
                </a>
                <a href="#mitra" class="btn-hero-secondary">
                    <i class="fas fa-building"></i>
                    {{ __('ui.lihat_mitra') }}
                </a>
            </div>
        </div>
        <div class="hero-scroll-indicator">
            <span>{{ __('ui.scroll') }}</span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    {{-- Main Content --}}
    <section id="mitra" class="section-content">
        <div class="container">

            {{-- Introduction --}}
            <div class="content-intro">
                <div class="content-intro__icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="content-intro__text">
                    <h2>{{ __('ui.mitra_kerja_sama') }}</h2>
                    <p>{{ $header->content ?? __('ui.mitra_kerja_sama_desc') }}</p>
                </div>
            </div>

            {{-- Partners Grid --}}
            <div class="pelatihan-section">
                <div class="section-header text-center">
                    <span class="section-badge">{{ __('ui.lihat_mitra') }}</span>
                    <h3 class="section-title text-center">{{ __('ui.daftar_mitra') }}</h3>
                    <p class="section-subtitle text-center">{{ __('ui.daftar_mitra_desc') }}</p>
                </div>

                @if($partners->count() > 0)
                <div class="pelatihan-grid">
                    @foreach($partners as $partner)
                    <div class="pelatihan-card">
                        @if($partner->image_url)
                        <div class="pelatihan-card__image">
                            <img src="{{ $partner->image_url }}" alt="{{ $partner->title }}" loading="lazy">
                        </div>
                        @endif
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">{{ $partner->title }}</h4>
                            @if($partner->content)
                            <p class="pelatihan-card__desc">{{ Str::limit(strip_tags($partner->content), 150) }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                {{-- Default Partners (Sample Data) --}}
                <div class="pelatihan-grid">
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">PT. Industri Tekstil Indonesia</h4>
                            <p class="pelatihan-card__desc">Kerja sama dalam bidang riset dan pengembangan material tekstil berkelanjutan.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">Yayasan Pendidikan Teknologi</h4>
                            <p class="pelatihan-card__desc">Kemitraan dalam program pengabdian masyarakat dan pelatihan vokasi.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">PT. Inovasi Digital Nusantara</h4>
                            <p class="pelatihan-card__desc">Kolaborasi dalam pengembangan teknologi digital dan sistem informasi.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">Kementerian Perindustrian RI</h4>
                            <p class="pelatihan-card__desc">Kerja sama dalam program hilirisasi hasil penelitian untuk industri.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">Asosiasi Industri Kreatif Yogyakarta</h4>
                            <p class="pelatihan-card__desc">Kemitraan dalam pengembangan desain dan industri kreatif berbasis teknologi.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">PT. Manufaktur Teknologi Tepat Guna</h4>
                            <p class="pelatihan-card__desc">Kolaborasi dalam pengembangan produk teknologi tepat guna untuk masyarakat.</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            {{-- Dokumen Kerja Sama --}}
            <div class="pelatihan-section" id="dokumen-kerjasama">
                <div class="section-header text-center">
                    <span class="section-badge">{{ __('ui.kerja_sama') }}</span>
                    <h3 class="section-title text-center">{{ __('ui.dokumen_kerja_sama') }}</h3>
                    <p class="section-subtitle text-center">{{ __('ui.dokumen_kerja_sama_desc') }}</p>
                </div>

                @if(($kerjasamaDocs ?? collect())->count() > 0)
                <div class="pelatihan-grid">
                    @foreach($kerjasamaDocs as $doc)
                    @php
                        $iconClass = $doc->icon
                            ? (Str::startsWith($doc->icon, 'fa-') ? $doc->icon : 'fa-' . $doc->icon)
                            : 'fa-file-contract';
                    @endphp
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas {{ $iconClass }}"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">{{ $doc->title }}</h4>
                            @if($doc->excerpt || $doc->content)
                            <p class="pelatihan-card__desc">{{ Str::limit(strip_tags($doc->excerpt ?: $doc->content), 150) }}</p>
                            @endif
                            @if($doc->file_url)
                            <a href="{{ $doc->file_url }}" class="pelatihan-card__link" target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-download"></i> {{ __('ui.unduh') }}
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="content-intro">
                    <div class="content-intro__icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <div class="content-intro__text">
                        <h2>{{ __('ui.belum_ada_dokumen_kerja_sama') }}</h2>
                        <p>{{ __('ui.dokumen_kerja_sama_segera') }}</p>
                    </div>
                </div>
                @endif
            </div>

        </div>
    </section>

</div>
@endsection

