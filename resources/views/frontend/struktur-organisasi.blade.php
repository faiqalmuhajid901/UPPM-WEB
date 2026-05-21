@extends('layouts.frontend')
@section('title', __('ui.struktur_page_title'))

@section('content')
<section class="pengabdian-hero @if($header && $header->image_url) has-dynamic-bg @endif" @if($header && $header->image_url) data-bg-image="{{ $header->image_url }}" @endif>
    @if($header && $header->image_url)
        <div class="hero-overlay hero-overlay--dark"></div>
    @else
        <div class="hero-overlay"></div>
        <div class="hero-pattern"></div>
    @endif

    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-sitemap"></i>
            <span>{{ __('ui.tim_uppm') }}</span>
        </div>
        <h1 class="hero-title">{{ $header?->title ?? __('navbar.struktur_organisasi') }}</h1>
        <p class="hero-subtitle">
            {{ $header?->excerpt ?? __('ui.struktur_default_desc') }}
        </p>
    </div>

    <div class="hero-scroll-indicator">
        <span>{{ __('ui.scroll') }}</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<section class="bg-slate-50 py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @if($strukturItems->isNotEmpty())
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($strukturItems as $item)
                    <article class="rounded-2xl border border-slate-100 bg-white p-6 text-center shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
                        @if($item->image)
                            <img src="{{ $item->image_url }}" alt="{{ $item->title }}" class="mx-auto h-28 w-28 rounded-full object-cover ring-4 ring-teal-100 md:h-32 md:w-32">
                        @else
                            <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-gradient-to-br from-teal-100 to-blue-100 ring-4 ring-teal-50 md:h-32 md:w-32">
                                <span class="text-3xl font-bold text-teal-700">{{ strtoupper(substr($item->title, 0, 1)) }}</span>
                            </div>
                        @endif

                        <h2 class="mt-5 text-lg font-bold text-slate-900">{{ $item->title }}</h2>

                        @if($item->excerpt)
                            <p class="mt-1 font-medium text-teal-600">{{ $item->excerpt }}</p>
                        @endif

                        @if($item->content)
                            <p class="mt-3 text-sm leading-relaxed text-slate-600">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 110) }}
                            </p>
                        @endif
                    </article>
                @endforeach
            </div>
        @else
            <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-white px-6 py-14 text-center">
                <p class="text-lg font-semibold text-slate-700">{{ __('ui.empty_struktur') }}</p>
                <p class="mt-2 text-slate-500">{{ __('ui.empty_struktur_desc') }}</p>
            </div>
        @endif
    </div>
</section>
@endsection

