@extends('layouts.frontend')
@section('title', __('ui.penelitian_page_title'))

@section('content')

{{-- ============================================= --}}
{{-- Data Processing                              --}}
{{-- ============================================= --}}
@php
    $contents = $contents ?? collect();
    $header = $header ?? $contents->firstWhere('category', 'header');
    
    // Show all penelitian contents except header
    $allItems = $contents->reject(function($item) {
        return $item->category === 'header';
    });
    
    // Keywords for classification
    $panduanKeywords = ['panduan', 'pedoman', 'guide', 'manual'];
    $jurnalKeywords = ['jurnal', 'journal', 'paper', 'publikasi'];

    $isPanduan = function($item) use ($panduanKeywords) {
        $category = strtolower($item->category ?? '');
        $title = strtolower($item->title ?? '');
        foreach ($panduanKeywords as $keyword) {
            if (str_contains($category, $keyword) || str_contains($title, $keyword)) {
                return true;
            }
        }
        return false;
    };

    $isJurnal = function($item) use ($jurnalKeywords) {
        $category = strtolower($item->category ?? '');
        $title = strtolower($item->title ?? '');
        foreach ($jurnalKeywords as $keyword) {
            if (str_contains($category, $keyword) || str_contains($title, $keyword)) {
                return true;
            }
        }
        return false;
    };

    // Counts for hero stats
    $totalItems = $allItems->count();
    
    $panduanCount = $allItems->filter(function($item) use ($isPanduan) {
        return $isPanduan($item);
    })->count();
    
    $jurnalCount = $allItems->filter(function($item) use ($isJurnal) {
        return $isJurnal($item);
    })->count();

    // Sorting for list items
    $sort = request()->get('sort', 'new');
    $sort = $sort === 'old' ? 'old' : 'new';

    $sortedItems = $sort === 'old'
        ? $allItems->sortBy('created_at')->values()
        : $allItems->sortByDesc('created_at')->values();
    $featuredPanduan = $sortedItems->first(function($item) use ($isPanduan) {
        return $isPanduan($item);
    });

    $listItems = $sortedItems->reject(function($item) use ($featuredPanduan) {
        return $featuredPanduan && $item->id === $featuredPanduan->id;
    })->values();

    // Pagination for list columns
    $perPage = 6;
    $currentPage = request()->get('page', 1);
    $totalListItems = $listItems->count();
    $totalPages = ceil($totalListItems / $perPage);
    $currentPage = min(max(1, $currentPage), $totalPages ?: 1);

    $offset = ($currentPage - 1) * $perPage;
    $paginatedItems = $listItems->slice($offset, $perPage)->values();

    $splitIndex = (int) ceil($paginatedItems->count() / 2);
    $leftItems = $paginatedItems->slice(0, $splitIndex)->values();
    $rightItems = $paginatedItems->slice($splitIndex)->values();
@endphp

{{-- ============================================= --}}
{{-- HERO SECTION                                 --}}
{{-- ============================================= --}}
<section class="pengabdian-hero penelitian-hero @if($header && $header->image_url) has-dynamic-bg @endif" @if($header && $header->image_url) data-bg-image="{{ $header->image_url }}" @endif>
    @if($header && $header->image_url)
        <div class="hero-overlay hero-overlay--dark"></div>
    @else
        <div class="hero-overlay"></div>
        <div class="hero-pattern"></div>
    @endif

    <div class="hero-content">
        {{-- Badge --}}
        <div class="hero-badge">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
            </svg>
            <span>{{ __('ui.pusat_riset') }}</span>
        </div>

        {{-- Title --}}
        <h1 class="hero-title animate-fade-in-up">
            {{ $header->title ?? __('ui.penelitian_page_title') }}
        </h1>

        {{-- Description --}}
        <p class="hero-subtitle animate-fade-in-up animation-delay-100">
            {{ $header->excerpt ?? __('ui.penelitian_default_desc') }}
        </p>

        {{-- Statistics Cards --}}
        <div class="grid grid-cols-3 gap-4 max-w-2xl mx-auto animate-fade-in-up animation-delay-200">
            <div class="stat-card">
                <div class="stat-number">{{ $totalItems }}</div>
                <div class="stat-label">{{ __('ui.total_publikasi') }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $panduanCount }}</div>
                <div class="stat-label">{{ __('ui.panduan_label') }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $jurnalCount }}</div>
                <div class="stat-label">{{ __('ui.jurnal_label') }}</div>
            </div>
        </div>
    </div>

    <div class="hero-scroll-indicator">
        <span>{{ __('ui.scroll') }}</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

{{-- ============================================= --}}
{{-- MAIN CONTENT SECTION - CENTERED              --}}
{{-- ============================================= --}}
<section class="bg-slate-50 py-16" id="penelitian-content">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="penelitian-layout">
            <div class="penelitian-toolbar">
                <button class="filter-pill" type="button" aria-label="Filter" aria-expanded="false" aria-controls="penelitian-filter-menu">
                    {{ __('ui.filter') }}
                </button>
                <div class="filter-menu" id="penelitian-filter-menu" role="menu">
                    <button class="filter-menu__item {{ $sort === 'new' ? 'is-active' : '' }}" type="button" data-sort="new" role="menuitem">
                        {{ __('ui.newest') }}
                    </button>
                    <button class="filter-menu__item {{ $sort === 'old' ? 'is-active' : '' }}" type="button" data-sort="old" role="menuitem">
                        {{ __('ui.oldest') }}
                    </button>
                </div>
            </div>

            @if($listItems->count() > 0 || $featuredPanduan)
                <div class="penelitian-board">
                    <div class="penelitian-column penelitian-column--left">
                        <div class="column-cards">
                            @foreach($leftItems as $item)
                                @php
                                    $type = $isPanduan($item) ? 'panduan' : ($isJurnal($item) ? 'jurnal' : 'penelitian');
                                    $badge = $isPanduan($item) ? __('ui.panduan_label') : ($isJurnal($item) ? __('ui.jurnal_label') : __('ui.penelitian_label'));
                                @endphp
                                <article class="research-mini-card {{ $type }}" data-category="{{ $type }}" data-id="{{ $item->id }}">
                                    <div class="research-mini-card__title">{{ $item->title }}</div>
                                    <div class="research-mini-card__meta">
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                        <span class="research-mini-card__badge">{{ $badge }}</span>
                                    </div>
                                    @if($item->file_url)
                                        <a href="{{ $item->file_url }}" target="_blank" class="research-mini-card__link">
                                            {{ __('ui.download') }}
                                        </a>
                                    @endif
                                </article>
                            @endforeach
                            @if($leftItems->count() === 0)
                                <div class="column-empty">{{ __('ui.empty_penelitian') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="penelitian-featured" id="panduan">
                        <div class="research-featured-card">
                            <div class="research-featured-label">{{ __('ui.panduan_label') }}</div>
                            <h3 class="research-featured-title">
                                {{ $featuredPanduan?->title ?? __('ui.panduan_label') }}
                            </h3>
                            <p class="research-featured-desc">
                                @if($featuredPanduan?->excerpt)
                                    {{ Str::limit(strip_tags($featuredPanduan->excerpt), 140) }}
                                @elseif($featuredPanduan?->content)
                                    {{ Str::limit(strip_tags($featuredPanduan->content), 140) }}
                                @else
                                    {{ __('ui.panduan_default_desc') }}
                                @endif
                            </p>
                            @if($featuredPanduan?->file_url)
                                <a href="{{ $featuredPanduan->file_url }}" target="_blank" class="research-featured-link">
                                    {{ __('ui.unduh_panduan') }}
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="penelitian-column penelitian-column--right" id="jurnal">
                        <div class="column-cards">
                            @foreach($rightItems as $item)
                                @php
                                    $type = $isPanduan($item) ? 'panduan' : ($isJurnal($item) ? 'jurnal' : 'penelitian');
                                    $badge = $isPanduan($item) ? __('ui.panduan_label') : ($isJurnal($item) ? __('ui.jurnal_label') : __('ui.penelitian_label'));
                                @endphp
                                <article class="research-mini-card {{ $type }}" data-category="{{ $type }}" data-id="{{ $item->id }}">
                                    <div class="research-mini-card__title">{{ $item->title }}</div>
                                    <div class="research-mini-card__meta">
                                        <span>{{ $item->created_at->format('d M Y') }}</span>
                                        <span class="research-mini-card__badge">{{ $badge }}</span>
                                    </div>
                                    @if($item->file_url)
                                        <a href="{{ $item->file_url }}" target="_blank" class="research-mini-card__link">
                                            {{ __('ui.download') }}
                                        </a>
                                    @endif
                                </article>
                            @endforeach
                            @if($rightItems->count() === 0)
                                <div class="column-empty">{{ __('ui.empty_penelitian_other') }}</div>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- ============================================= --}}
                {{-- PAGINATION                                   --}}
                {{-- ============================================= --}}
                @if($totalPages > 1)
                    <div class="pagination-container">
                        <div class="pagination">
                            {{-- Previous Button --}}
                            @if($currentPage > 1)
                                <a href="?page={{ $currentPage - 1 }}&sort={{ $sort }}" class="pagination-btn prev">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    <span>{{ __('ui.previous') }}</span>
                                </a>
                            @else
                                <span class="pagination-btn prev disabled">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                    </svg>
                                    <span>{{ __('ui.previous') }}</span>
                                </span>
                            @endif

                            {{-- Page Numbers --}}
                            <div class="pagination-numbers">
                                @for($i = 1; $i <= $totalPages; $i++)
                                    @if($i == $currentPage)
                                        <span class="pagination-number active">{{ $i }}</span>
                                    @else
                                        <a href="?page={{ $i }}&sort={{ $sort }}" class="pagination-number">{{ $i }}</a>
                                    @endif
                                @endfor
                            </div>

                            {{-- Next Button --}}
                            @if($currentPage < $totalPages)
                                <a href="?page={{ $currentPage + 1 }}&sort={{ $sort }}" class="pagination-btn next">
                                    <span>{{ __('ui.next') }}</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            @else
                                <span class="pagination-btn next disabled">
                                    <span>{{ __('ui.next') }}</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            @endif
                        </div>

                        <div class="pagination-info">
                            {{ __('ui.showing_items', ['count' => $paginatedItems->count(), 'total' => $totalListItems]) }}
                            {{ __('ui.page_info', ['current' => $currentPage, 'total' => $totalPages]) }}
                        </div>
                    </div>
                @endif
            @else
                {{-- Empty State --}}
                <div class="empty-state">
                    <div class="empty-icon">
                        <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="empty-title">{{ __('ui.empty_data_penelitian') }}</h3>
                    <p class="empty-description">
                        {{ __('ui.empty_data_penelitian_desc') }}
                    </p>
                    <a href="{{ route('home') }}" class="empty-btn">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>{{ __('ui.back_home') }}</span>
                    </a>
                </div>
            @endif
        </div>

    </div>
</section>

@endsection

