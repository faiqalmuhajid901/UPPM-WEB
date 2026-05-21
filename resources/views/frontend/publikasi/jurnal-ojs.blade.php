{{-- FILE: resources/views/frontend/publikasi/jurnal-ojs.blade.php --}}
@extends('layouts.frontend')

@section('title', __('navbar.jurnal_ojs'))

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
                <i class="fas fa-newspaper"></i>
                <span>{{ __('ui.publikasi_label') }}</span>
            </div>
            <h1 class="hero-title">{{ $header->title ?? __('navbar.jurnal_ojs') }}</h1>
            <p class="hero-subtitle">
                {{ $header->excerpt ?? __('navbar.jurnal_ojs_desc') }}
            </p>
            <div class="hero-buttons">
                <a href="{{ route('publikasi') }}" class="btn-hero-primary">
                    <i class="fas fa-arrow-left"></i>
                    {{ __('ui.kembali_publikasi') }}
                </a>
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

            {{-- Section Header --}}
            <div class="pelatihan-section">
                <div class="section-header text-center">
                    <span class="section-badge">{{ __('navbar.jurnal_ojs') }}</span>
                    <h3 class="section-title text-center">{{ __('navbar.jurnal_ojs') }}</h3>
                    <p class="section-subtitle text-center">{{ __('navbar.jurnal_ojs_desc') }}</p>
                </div>

                @if($publikasis->count() > 0)
                <div class="pelatihan-grid">
                    @foreach($publikasis as $item)
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <span class="section-badge section-badge--sm">{{ __('navbar.jurnal_ojs') }} - {{ $item->created_at->format('Y') }}</span>
                            <h4 class="pelatihan-card__title">{{ $item->title }}</h4>
                            <p class="pelatihan-card__desc">{{ $item->excerpt ?? Str::limit(strip_tags($item->content), 150) ?? __('ui.tidak_ada_deskripsi') }}</p>
                            @if($item->file_url)
                            <a href="{{ $item->file_url }}" class="pelatihan-card__link" target="_blank" rel="noopener noreferrer">
                                {{ __('ui.download_file') }} <i class="fas fa-download"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="pagination-wrapper">
                    {{ $publikasis->links() }}
                </div>
                @else
                {{-- Empty State --}}
                <div class="empty-state">
                    <h3 class="empty-state__title">{{ __('ui.empty_publikasi') }}</h3>
                    <p class="empty-state__text">{{ __('navbar.jurnal_ojs_desc') }}</p>
                </div>
                @endif
            </div>

        </div>
    </section>

</div>
@endsection
