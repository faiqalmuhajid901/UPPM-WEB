@extends('layouts.frontend')
@section('title', __('ui.profil_page_title'))

@push('styles')
@vite('resources/css/pages/profil-kampus.css')
@endpush

@section('content')

{{-- ========================================== --}}
{{-- HERO SECTION --}}
{{-- ========================================== --}}
<section class="pengabdian-hero @if($profileHeader && $profileHeader->image_url) has-dynamic-bg @endif" @if($profileHeader && $profileHeader->image_url) data-bg-image="{{ $profileHeader->image_url }}" @endif>
    @if($profileHeader && $profileHeader->image_url)
        <div class="hero-overlay hero-overlay--dark"></div>
    @else
        <div class="hero-overlay"></div>
        <div class="hero-pattern"></div>
    @endif

    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-building"></i>
            <span>{{ __('ui.profil_uppm') }}</span>
        </div>
        <h1 class="hero-title animate-fade-down">
            {{ $profileHeader?->title ?? __('ui.home_default_hero') }}
        </h1>
        <p class="hero-subtitle animate-fade-up">
            {{ $profileHeader?->excerpt ?? __('ui.home_default_sub') }}
        </p>
        <div class="hero-buttons animate-fade-up">
            <a href="#tentang" class="btn-hero-primary">
                <i class="fas fa-book-open"></i>
                {{ __('ui.learn_more') }}
            </a>
            <a href="#visi-misi" class="btn-hero-secondary">
                <i class="fas fa-bullseye"></i>
                {{ __('navbar.visi_misi') }}
            </a>
        </div>
    </div>

    <div class="hero-scroll-indicator">
        <span>{{ __('ui.scroll') }}</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    {{-- ========================================== --}}
    {{-- SECTION 1: TENTANG UPPM --}}
    {{-- ========================================== --}}
    <section id="tentang" class="mb-32 scroll-mt-24">
        @if($tentang)
            <div class="relative">
                <div class="absolute -inset-3 -z-10 rounded-[36px] bg-gradient-to-br from-teal-50 via-white to-blue-50"></div>
                <div class="bg-white/90 backdrop-blur rounded-[32px] shadow-xl ring-1 ring-gray-100/70 overflow-hidden hover-lift">
                    <div class="profil-about-grid {{ $tentang->image ? 'has-media' : 'no-media' }}">
                    
                    {{-- GAMBAR --}}
                    @if($tentang->image)
                        <div class="profil-about-media image-zoom-container">
                            <img src="{{ $tentang->image_url }}" 
                                 alt="{{ $tentang->title }}" 
                                 class="profil-about-image">
                            <div class="profil-about-overlay"></div>
                        </div>
                    @endif
                    
                    {{-- KONTEN TEKS --}}
                    <div class="profil-about-content p-10 lg:p-14 xl:p-16 flex flex-col justify-center bg-white">
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-teal-100 text-teal-700 font-semibold text-sm rounded-full mb-5 w-fit">
                            <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            {{ __('ui.profil_kami') }}
                        </span>
                        
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-5">
                            {{ $tentang->title }}
                        </h2>
                        
                        <div class="w-24 h-1.5 bg-gradient-to-r from-teal-500 to-blue-500 rounded-full mb-6"></div>
                        
                        <div class="prose prose-lg prose-slate max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($tentang->content ?: $tentang->excerpt)) !!}
                        </div>
                        
                        {{-- Features --}}
                        <div class="mt-8 grid gap-4 sm:grid-cols-2">
                            <div class="flex items-start gap-3 rounded-2xl border border-teal-100/60 bg-teal-50/60 p-4">
                                <div class="bg-white p-3 rounded-xl shadow-sm flex-shrink-0">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">{{ __('ui.penelitian_berkualitas') }}</h3>
                                    <p class="text-gray-600 text-sm">{{ __('ui.penelitian_berkualitas_desc') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 rounded-2xl border border-teal-100/60 bg-teal-50/60 p-4">
                                <div class="bg-white p-3 rounded-xl shadow-sm flex-shrink-0">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">{{ __('ui.pengabdian_masyarakat') }}</h3>
                                    <p class="text-gray-600 text-sm">{{ __('ui.pengabdian_masyarakat_desc') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 rounded-2xl border border-teal-100/60 bg-teal-50/60 p-4 sm:col-span-2">
                                <div class="bg-white p-3 rounded-xl shadow-sm flex-shrink-0">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1">{{ __('ui.publikasi_ilmiah') }}</h3>
                                    <p class="text-gray-600 text-sm">{{ __('ui.publikasi_ilmiah_desc') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        @else
            {{-- Empty State --}}
            <div class="relative overflow-hidden rounded-3xl border border-gray-200 bg-gradient-to-br from-white via-gray-50 to-teal-50 p-12 text-center shadow-sm">
                <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full bg-teal-100/70 blur-2xl"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 rounded-full bg-blue-100/70 blur-2xl"></div>
                <div class="relative max-w-3xl mx-auto">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-md ring-1 ring-teal-100">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-lg text-gray-700 font-semibold">{{ __('ui.empty_tentang') }}</p>
                    <p class="text-sm text-gray-500 mt-2">{{ __('ui.empty_tentang_desc') }}</p>
                </div>
            </div>
        @endif
    </section>

    {{-- ========================================== --}}
    {{-- SECTION 2: VISI & MISI - TAB DESIGN --}}
    {{-- ========================================== --}}
    <section id="visi-misi" class="mb-32 scroll-mt-24 relative">
        <div class="absolute -z-10 inset-0">
            <div class="absolute -top-12 left-1/2 h-40 w-40 -translate-x-1/2 rounded-full bg-teal-100/60 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-32 w-32 rounded-full bg-blue-100/60 blur-3xl"></div>
        </div>

        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-gradient-to-r from-teal-500 to-blue-500 text-white font-semibold text-sm rounded-full mb-4 shadow-md">
                {{ __('ui.tujuan_utama') }}
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 tracking-tight">
                {{ __('ui.visi_misi_uppm') }}
            </h2>
            <div class="w-32 h-1.5 bg-gradient-to-r from-teal-500 to-blue-500 rounded-full mx-auto mt-4"></div>
        </div>

        @php
            $misiItems = [];
            if ($misi && ($misi->content || $misi->excerpt)) {
                $rawMisi = $misi->content ?: $misi->excerpt;
                $misiItems = array_values(array_filter(preg_split('/\r\n|\r|\n/', $rawMisi)));
            }
        @endphp

        <div class="vm-tabs-wrapper">
            <div class="vm-tabs" role="tablist" aria-label="Tab Visi dan Misi">
                <button type="button" class="vm-tab is-active" role="tab" aria-selected="true" aria-controls="vm-panel-visi" id="vm-tab-visi" data-vm-tab="visi">
                    {{ __('ui.visi') }}
                </button>
                <button type="button" class="vm-tab" role="tab" aria-selected="false" aria-controls="vm-panel-misi" id="vm-tab-misi" data-vm-tab="misi">
                    {{ __('ui.misi') }}
                </button>
            </div>
        </div>

        <div class="vm-panels">
            {{-- PANEL: VISI --}}
            <div id="vm-panel-visi" class="vm-panel is-active" role="tabpanel" aria-hidden="false" aria-labelledby="vm-tab-visi" data-vm-panel="visi">
                <div class="vm-panel-card">
                    <div class="vm-panel-content">
                        <h3 class="vm-panel-title">{{ $visi->title ?? __('ui.visi') }}</h3>
                        <div class="vm-panel-text">
                            @if($visi && ($visi->content || $visi->excerpt))
                                <p class="whitespace-pre-line">{{ $visi->content ?: $visi->excerpt }}</p>
                            @else
                                <p>{{ __('ui.default_visi') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- PANEL: MISI --}}
            <div id="vm-panel-misi" class="vm-panel" role="tabpanel" aria-hidden="true" aria-labelledby="vm-tab-misi" data-vm-panel="misi" hidden>
                <div class="vm-panel-card">
                    <div class="vm-panel-content">
                        <h3 class="vm-panel-title">{{ $misi->title ?? __('ui.misi') }}</h3>
                        <div class="vm-panel-text">
                            @if(count($misiItems) > 1)
                                <ol class="vm-list">
                                    @foreach($misiItems as $index => $item)
                                        @php
                                            $cleanItem = preg_replace('/^\\d+\\.\\s*/', '', trim($item));
                                        @endphp
                                        <li class="vm-list-item">
                                            <span class="vm-list-index">{{ $index + 1 }}</span>
                                            <span class="vm-list-text">{{ $cleanItem }}</span>
                                        </li>
                                    @endforeach
                                </ol>
                            @elseif(count($misiItems) === 1)
                                <p>{{ $misiItems[0] }}</p>
                            @else
                                <ol class="vm-list">
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">1</span>
                                        <span class="vm-list-text">{{ __('ui.default_misi_1') }}</span>
                                    </li>
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">2</span>
                                        <span class="vm-list-text">{{ __('ui.default_misi_2') }}</span>
                                    </li>
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">3</span>
                                        <span class="vm-list-text">{{ __('ui.default_misi_3') }}</span>
                                    </li>
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">4</span>
                                        <span class="vm-list-text">{{ __('ui.default_misi_4') }}</span>
                                    </li>
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">5</span>
                                        <span class="vm-list-text">{{ __('ui.default_misi_5') }}</span>
                                    </li>
                                </ol>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Link to Struktur Organisasi --}}
        <div class="mt-12 text-center">
            <a href="{{ route('struktur-organisasi') }}" class="inline-flex items-center gap-2 text-teal-600 font-semibold hover:text-teal-700 transition-colors">
                <span>{{ __('ui.view_org_structure') }}</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

</div>

@endsection


