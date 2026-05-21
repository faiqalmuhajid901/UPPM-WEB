@extends('layouts.app')

@section('title', __('ui.home_title'))

@section('content')

{{-- ========================================== --}}
{{-- HERO SECTION WITH SLIDER --}}
{{-- ========================================== --}}
<section class="relative w-full bg-gradient-to-br from-teal-600 via-teal-700 to-teal-900 overflow-hidden">
    
    {{-- Hero Content Overlay --}}
    <div class="absolute inset-0 z-10 flex items-center justify-center pointer-events-none">
        <div class="text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-8 md:p-12 shadow-2xl">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-4 drop-shadow-lg animate-fade-down">
                    {{ $homeHeader?->title ?? __('ui.home_default_hero') }}
                </h1>
                <p class="text-xl md:text-3xl text-teal-100 mb-8 font-medium drop-shadow-md animate-fade-up">
                    {{ $homeHeader?->excerpt ?? __('ui.home_default_sub') }}
                </p>
                <div class="flex flex-wrap gap-4 justify-center pointer-events-auto animate-fade-up">
                    <a href="{{ route('profil-kampus') }}" 
                       class="bg-white text-teal-600 px-8 py-4 rounded-full font-semibold hover:bg-teal-50 transition-all shadow-lg hover:shadow-xl hover:scale-105 inline-flex items-center gap-2">
                        <span>{{ __('ui.learn_more') }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="{{ route('profil-kampus') }}#visi-misi" 
                       class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-teal-600 transition-all inline-flex items-center gap-2">
                        <span>{{ __('navbar.visi_misi') }}</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Background Slider --}}
<div class="swiper hero-swiper relative w-full h-[600px] md:h-[700px] lg:h-[800px]">
    <div class="swiper-wrapper">
        @forelse($sliders as $slide)
            <div class="swiper-slide">
                <div class="relative w-full h-full">
                    <img src="{{ $slide->image_url ?? Storage::url($slide->image) }}" 
                         alt="{{ $slide->title }}" 
                         class="w-full h-full object-cover js-image-fallback"
                         data-fallback-parent-classes="bg-gradient-to-br from-teal-600 to-teal-800">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/60"></div>
                </div>
            </div>
        @empty
            {{-- Fallback: Gradient saja tanpa gambar --}}
            <div class="swiper-slide">
                <div class="relative w-full h-full bg-gradient-to-br from-teal-600 via-teal-700 to-teal-800">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="relative w-full h-full bg-gradient-to-br from-teal-700 via-blue-700 to-teal-900">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="relative w-full h-full bg-gradient-to-br from-blue-600 via-teal-700 to-blue-900">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Navigation Buttons --}}
    <div class="swiper-button-next !text-white hover:!text-teal-400 transition-colors"></div>
    <div class="swiper-button-prev !text-white hover:!text-teal-400 transition-colors"></div>

    {{-- Pagination --}}
    <div class="swiper-pagination !bottom-8"></div>
</div>


    {{-- Wave Divider --}}
    <div class="absolute bottom-0 left-0 right-0 z-20">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>

{{-- ========================================== --}}
{{-- WELCOME SECTION --}}
{{-- ========================================== --}}
{{-- âœ… FIXED: Gunakan $welcome dari controller --}}
@if($welcome)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Image --}}
            @if($welcome->image)
            <div class="order-2 lg:order-1">
                <img src="{{ $welcome->image_url ?? Storage::url($welcome->image) }}" 
                     alt="{{ $welcome->title }}" 
                     class="rounded-2xl shadow-xl w-full h-auto">
            </div>
            @endif
            
            {{-- Content --}}
            <div class="order-1 lg:order-2 {{ $welcome->image ? '' : 'lg:col-span-2 text-center max-w-4xl mx-auto' }}">
                <span class="inline-block px-4 py-2 bg-teal-100 text-teal-700 font-semibold text-sm rounded-full mb-4">
                    {{ __('ui.welcome') }}
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    {{ $welcome->title }}
                </h2>
                <div class="w-24 h-1 bg-teal-500 rounded-full {{ $welcome->image ? '' : 'mx-auto' }} mb-6"></div>
                
                {{-- âœ… FIXED: Gunakan excerpt atau content --}}
                @if($welcome->excerpt)
                    <p class="text-xl text-gray-600 leading-relaxed mb-4">
                        {{ $welcome->excerpt }}
                    </p>
                @endif
                
                @if($welcome->content)
                    <div class="prose prose-lg text-gray-600 leading-relaxed">
                        {!! $welcome->content !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

{{-- ========================================== --}}
{{-- FEATURES / LAYANAN SECTION - ACCORDION --}}
{{-- ========================================== --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                {{ __('ui.program_kerja') }}
            </h2>
            <div class="w-24 h-1 bg-blue-500 rounded-full mx-auto mt-4"></div>
        </div>

        {{-- Accordion Container --}}
        <div class="max-w-4xl mx-auto space-y-4">
            {{-- âœ… DYNAMIC: Jika ada program kerja dari admin --}}
            @if(isset($programKerja) && $programKerja->count() > 0)
                @foreach($programKerja as $index => $feature)
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-teal-600">{{ $index + 1 }}</span>
                            <h3 class="text-xl font-bold text-gray-900">{{ $feature->title }}</h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">
                                {{ $feature->excerpt ?? Str::limit(strip_tags($feature->content), 200) }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                {{-- DEFAULT: Static accordion items --}}
                
                {{-- Accordion 1 --}}
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-teal-600">1</span>
                            <h3 class="text-xl font-bold text-gray-900">{{ __('ui.penelitian_dosen') }}</h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('ui.penelitian_dosen_desc') }} <br><strong class="text-teal-600">{{ __('ui.penelitian_dosen_target') }}</strong></p>
                        </div>
                    </div>
                </div>

                {{-- Accordion 2 --}}
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-blue-600">2</span>
                            <h3 class="text-xl font-bold text-gray-900">{{ __('ui.penelitian_terapan') }}</h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('ui.penelitian_terapan_desc') }} <br><strong class="text-blue-600">{{ __('ui.penelitian_terapan_target') }}</strong></p>
                        </div>
                    </div>
                </div>

                {{-- Accordion 3 --}}
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-purple-600">3</span>
                            <h3 class="text-xl font-bold text-gray-900">{{ __('ui.penelitian_mhs') }}</h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('ui.penelitian_mhs_desc') }} <br><strong class="text-purple-600">{{ __('ui.penelitian_mhs_target') }}</strong></p>
                        </div>
                    </div>
                </div>

                {{-- Accordion 4 --}}
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-teal-600">4</span>
                            <h3 class="text-xl font-bold text-gray-900">{{ __('ui.layanan_industri') }}</h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('ui.layanan_industri_desc') }} <br><strong class="text-teal-600">{{ __('ui.layanan_industri_target') }}</strong></p>
                        </div>
                    </div>
                </div>

                {{-- Accordion 5 --}}
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-blue-600">5</span>
                            <h3 class="text-xl font-bold text-gray-900">{{ __('ui.penelitian_tema40') }}</h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('ui.penelitian_tema40_desc') }} <br><strong class="text-blue-600">{{ __('ui.penelitian_tema40_target') }}</strong></p>
                        </div>
                    </div>
                </div>

                {{-- Accordion 6 --}}
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-purple-600">6</span>
                            <h3 class="text-xl font-bold text-gray-900">{{ __('ui.pkm_tema40') }}</h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('ui.pkm_tema40_desc') }} <br><strong class="text-purple-600">{{ __('ui.pkm_tema40_target') }}</strong></p>
                        </div>
                    </div>
                </div>

                {{-- Accordion 7 --}}
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-teal-600">7</span>
                            <h3 class="text-xl font-bold text-gray-900">{{ __('ui.luaran_hki') }}</h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">{{ __('ui.luaran_hki_desc') }} <br><strong class="text-teal-600">{{ __('ui.luaran_hki_target') }}</strong></p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>


{{-- ========================================== --}}
{{-- STATISTICS SECTION --}}
{{-- ========================================== --}}
<section class="py-20 bg-gradient-to-br from-teal-600 via-teal-700 to-teal-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 stats-pattern"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">{{ __('ui.our_achievements') }}</h2>
            <p class="text-xl text-teal-100">{{ __('ui.achievements_desc') }}</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold mb-2">{{ $penelitians->count() > 0 ? $penelitians->count() . '+' : '150+' }}</div>
                <p class="text-teal-100 text-lg">{{ __('ui.penelitian') }}</p>
            </div>
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold mb-2">200+</div>
                <p class="text-teal-100 text-lg">{{ __('ui.pengabdian') }}</p>
            </div>
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold mb-2">{{ $publikasis->count() > 0 ? $publikasis->count() . '+' : '100+' }}</div>
                <p class="text-teal-100 text-lg">{{ __('ui.publikasi_label') }}</p>
            </div>
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold mb-2">50+</div>
                <p class="text-teal-100 text-lg">{{ __('ui.kerjasama') }}</p>
            </div>
        </div>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-teal-100 text-teal-700 font-semibold text-sm rounded-full mb-4">
                {{ __('ui.latest') }}
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900">{{ __('ui.latest_research') }}</h2>
            <div class="w-24 h-1 bg-teal-500 rounded-full mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($penelitians as $penelitian)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                @if($penelitian->gambar)
                <img src="{{ $penelitian->gambar_url ?? Storage::url($penelitian->gambar) }}" 
                     alt="{{ $penelitian->judul }}"
                     class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                @endif
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $penelitian->judul }}</h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">{{ Str::limit($penelitian->abstrak, 100) }}</p>
                    <a href="{{ route('penelitian.detail', $penelitian) }}" 
                       class="inline-flex items-center text-teal-600 font-semibold hover:text-teal-700">
                        {{ __('ui.read_more') }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('penelitian') }}" 
               class="inline-flex items-center bg-teal-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-teal-700 transition-colors">
                {{ __('ui.view_all_research') }}
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection


