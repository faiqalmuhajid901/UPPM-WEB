{{-- FILE: resources/views/frontend/penelitian/proposal.blade.php --}}
@extends('layouts.frontend')

@section('title', __('ui.ajukan_proposal_title'))

@section('content')
<div class="proposal-page">
    
    {{-- Hero Section --}}
    <section class="page-hero @if($header && $header->image_url) has-dynamic-bg @endif" @if($header && $header->image_url) data-bg-image="{{ $header->image_url }}" @endif>
        @if($header && $header->image_url)
            <div class="page-hero__overlay hero-overlay--dark"></div>
        @else
            <div class="page-hero__overlay"></div>
        @endif
        <div class="page-hero__content">
            <nav class="page-breadcrumb">
                <a href="{{ route('home') }}">{{ __('ui.beranda') }}</a>
                <span>/</span>
                <a href="{{ route('penelitian') }}">{{ __('ui.penelitian_breadcrumb') }}</a>
                <span>/</span>
                <span>{{ __('ui.ajukan_proposal') }}</span>
            </nav>
            <h1 class="page-hero__title">{{ $header->title ?? __('ui.ajukan_proposal_penelitian') }}</h1>
            <p class="page-hero__subtitle">{{ $header->excerpt ?? __('ui.ajukan_proposal_desc') }}</p>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="section-content">
        <div class="container">
            
            {{-- Placeholder Card --}}
            <div class="proposal-placeholder">
                <div class="proposal-placeholder__icon">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <h2 class="proposal-placeholder__title">{{ __('ui.form_pengajuan_proposal') }}</h2>
                <p class="proposal-placeholder__desc">
                    {{ __('ui.form_pengajuan_desc') }} 
                    {{ __('ui.form_pengajuan_sub_desc') }}
                </p>
                
                <div class="proposal-placeholder__info">
                    <div class="info-item">
                        <div class="info-item__icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="info-item__text">
                            <strong>{{ __('ui.coming_soon') }}</strong>
                            <span>{{ __('ui.sistem_sedang_pengembangan') }}</span>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-item__icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="info-item__text">
                            <strong>{{ __('ui.alternatif') }}</strong>
                            <span>{{ __('ui.hubungi_admin_manual') }}</span>
                        </div>
                    </div>
                </div>

                <div class="proposal-placeholder__actions">
                    <a href="https://forms.gle/fdPhDW4nMZz1Lkei8" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="btn-primary google-form-link">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        {{ __('ui.isi_form_pengajuan') }}
                    </a>

                    <a href="{{ route('penelitian') }}#panduan" class="btn-secondary">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        {{ __('ui.lihat_panduan') }}
                    </a>
                </div>



            </div>

            {{-- Panduan Singkat --}}
            <div class="proposal-guide">
                <h3>{{ __('ui.panduan_pengajuan') }}</h3>
                <div class="guide-steps">
                    <div class="guide-step">
                        <div class="guide-step__number">1</div>
                        <div class="guide-step__content">
                            <h4>{{ __('ui.persiapkan_dokumen') }}</h4>
                            <p>{{ __('ui.persiapkan_dokumen_desc') }}</p>
                        </div>
                    </div>
                    <div class="guide-step">
                        <div class="guide-step__number">2</div>
                        <div class="guide-step__content">
                            <h4>{{ __('ui.isi_form_pengajuan') }}</h4>
                            <p>{{ __('ui.isi_form_desc') }}</p>
                        </div>
                    </div>
                    <div class="guide-step">
                        <div class="guide-step__number">3</div>
                        <div class="guide-step__content">
                            <h4>{{ __('ui.upload_dokumen') }}</h4>
                            <p>{{ __('ui.upload_dokumen_desc') }}</p>
                        </div>
                    </div>
                    <div class="guide-step">
                        <div class="guide-step__number">4</div>
                        <div class="guide-step__content">
                            <h4>{{ __('ui.tunggu_review') }}</h4>
                            <p>{{ __('ui.tunggu_review_desc') }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
@endsection

