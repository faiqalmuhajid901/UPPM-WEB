{{-- FILE: resources/views/frontend/dokumen/arsip.blade.php --}}
@extends('layouts.frontend')

@section('title', __('ui.arsip_dokumen'))

@push('styles')
@vite('resources/css/pengabdian.css')
@vite('resources/css/pages/arsip.css')
@endpush

@section('content')
<div class="pelayanan-page">

    @php
        $kategoriLabels = [
            'sk' => 'SK & Peraturan',
            'panduan' => 'Panduan',
            'template' => 'Template',
            'laporan' => 'Laporan',
        ];
        $dokumenGroups = $dokumens->groupBy(function ($doc) use ($kategoriLabels) {
            $key = $doc->arsip_category ?? ($doc->meta['kategori'] ?? ($doc->category ?? 'sk'));
            return array_key_exists($key, $kategoriLabels) ? $key : 'sk';
        });
        $dokumenByKategori = [];
        foreach ($kategoriLabels as $key => $label) {
            $dokumenByKategori[$key] = ($dokumenGroups->get($key) ?? collect())->take(10);
        }
    @endphp

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
                <i class="fas fa-archive"></i>
                <span>{{ __('navbar.dokumen') }}</span>
            </div>
            <h1 class="hero-title">{{ $header->title ?? __('ui.arsip_dokumen') }}</h1>
            <p class="hero-subtitle">
                {{ $header->excerpt ?? __('ui.arsip_dokumen_desc') }}
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

    {{-- Filter & Search --}}
    <section class="arsip-filter">
        <div class="container">
            <div class="arsip-filter__wrapper">
                <div class="arsip-filter__search">
                    <input type="text" id="search-dokumen" placeholder="{{ __('ui.cari_dokumen') }}" class="arsip-filter__input">
                    <svg class="arsip-filter__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    {{-- Panduan Cards (di atas tabs) --}}
    <section class="arsip-panduan-section">
        <div class="container">
            <div class="arsip-panduan" id="panduan-section">
                <div class="arsip-grid arsip-grid--panduan">
                    @forelse($dokumenByKategori['panduan'] as $doc)
                        <article class="panduan-card" data-doc-card="true" data-category="panduan">
                            <div class="panduan-card__header">
                                <span class="panduan-card__badge">Panduan</span>
                                <span class="panduan-card__meta">{{ $doc->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="panduan-card__title">{{ $doc->title }}</h3>
                            <p class="panduan-card__desc">
                                {{ Str::limit($doc->excerpt ?: strip_tags($doc->content ?? ''), 120) }}
                            </p>
                            <div class="panduan-card__footer">
                                <span class="panduan-card__file">{{ $doc->file ? strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) : 'PDF' }}</span>
                                <a href="{{ $doc->file_url ?? '#' }}" class="panduan-card__action" target="_blank" download>
                                    {{ __('ui.unduh') }}
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="arsip-empty">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3>{{ __('ui.belum_ada_panduan') }}</h3>
                            <p>{{ __('ui.panduan_segera_ditambahkan') }}</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    {{-- Document List --}}
    <section class="section-content">
        <div class="container">
            <div class="arsip-tabs" role="tablist" aria-label="{{ __('ui.arsip_dokumen') }}">
                <button class="arsip-tab active" role="tab" aria-selected="true" data-filter="sk">{{ __('ui.sk_peraturan') }}</button>
                <button class="arsip-tab" role="tab" aria-selected="false" data-filter="template">{{ __('ui.template') }}</button>
                <button class="arsip-tab" role="tab" aria-selected="false" data-filter="laporan">{{ __('ui.laporan') }}</button>
            </div>
            <div class="arsip-tab-panels" id="dokumen-grid">
                {{-- Panel: SK & Peraturan --}}
                <div class="arsip-tab-panel is-active" role="tabpanel" aria-hidden="false" data-panel="sk">
                    <div class="arsip-grid">
                        @forelse($dokumenByKategori['sk'] as $doc)
                            <div class="arsip-card" data-doc-card="true" data-category="sk">
                                <div class="arsip-card__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="arsip-card__content">
                                    <span class="arsip-card__category">{{ __('ui.sk_peraturan') }}</span>
                                    <h3 class="arsip-card__title">{{ $doc->title }}</h3>
                                    <p class="arsip-card__desc">{{ Str::limit($doc->excerpt ?: strip_tags($doc->content ?? ''), 100) }}</p>
                                    <div class="arsip-card__meta">
                                        <span class="arsip-card__date">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $doc->created_at->format('d M Y') }}
                                        </span>
                                        <span class="arsip-card__size">{{ $doc->file ? strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) : '-' }}</span>
                                    </div>
                                </div>
                                <a href="{{ $doc->file_url ?? '#' }}" class="arsip-card__download" target="_blank" download>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    {{ __('ui.unduh') }}
                                </a>
                            </div>
                        @empty
                            <div class="arsip-empty">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3>{{ __('ui.belum_ada_dokumen') }}</h3>
                                <p>{{ __('ui.dokumen_segera_ditambahkan') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Panel: Template --}}
                <div class="arsip-tab-panel" role="tabpanel" aria-hidden="true" data-panel="template">
                    <div class="arsip-grid">
                        @forelse($dokumenByKategori['template'] as $doc)
                            <div class="arsip-card" data-doc-card="true" data-category="template">
                                <div class="arsip-card__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="arsip-card__content">
                                    <span class="arsip-card__category">{{ __('ui.template') }}</span>
                                    <h3 class="arsip-card__title">{{ $doc->title }}</h3>
                                    <p class="arsip-card__desc">{{ Str::limit($doc->excerpt ?: strip_tags($doc->content ?? ''), 100) }}</p>
                                    <div class="arsip-card__meta">
                                        <span class="arsip-card__date">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $doc->created_at->format('d M Y') }}
                                        </span>
                                        <span class="arsip-card__size">{{ $doc->file ? strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) : '-' }}</span>
                                    </div>
                                </div>
                                <a href="{{ $doc->file_url ?? '#' }}" class="arsip-card__download" target="_blank" download>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    {{ __('ui.unduh') }}
                                </a>
                            </div>
                        @empty
                            <div class="arsip-empty">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3>{{ __('ui.belum_ada_template') }}</h3>
                                <p>{{ __('ui.template_segera_ditambahkan') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Panel: Laporan --}}
                <div class="arsip-tab-panel" role="tabpanel" aria-hidden="true" data-panel="laporan">
                    <div class="arsip-grid">
                        @forelse($dokumenByKategori['laporan'] as $doc)
                            <div class="arsip-card" data-doc-card="true" data-category="laporan">
                                <div class="arsip-card__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="arsip-card__content">
                                    <span class="arsip-card__category">{{ __('ui.laporan') }}</span>
                                    <h3 class="arsip-card__title">{{ $doc->title }}</h3>
                                    <p class="arsip-card__desc">{{ Str::limit($doc->excerpt ?: strip_tags($doc->content ?? ''), 100) }}</p>
                                    <div class="arsip-card__meta">
                                        <span class="arsip-card__date">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            {{ $doc->created_at->format('d M Y') }}
                                        </span>
                                        <span class="arsip-card__size">{{ $doc->file ? strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) : '-' }}</span>
                                    </div>
                                </div>
                                <a href="{{ $doc->file_url ?? '#' }}" class="arsip-card__download" target="_blank" download>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    {{ __('ui.unduh') }}
                                </a>
                            </div>
                        @empty
                            <div class="arsip-empty">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3>{{ __('ui.belum_ada_laporan') }}</h3>
                                <p>{{ __('ui.laporan_segera_ditambahkan') }}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
@vite('resources/js/pages/arsip.js')
@endpush

