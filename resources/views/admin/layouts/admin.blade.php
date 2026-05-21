<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    {{-- Meta Tags untuk SEO --}}
    <meta name="description" content="@yield('meta_description', 'Unit Penelitian dan Pengabdian Masyarakat - Politeknik ATK Yogyakarta')">
    <meta name="keywords" content="UPPM, Penelitian, Pengabdian Masyarakat, Politeknik ATK, Yogyakarta">
    <meta name="author" content="UPPM Politeknik ATK">
    
    {{-- Open Graph untuk Social Media --}}
    <meta property="og:title" content="@yield('title', 'UPPM Politeknik ATK Yogyakarta')">
    <meta property="og:description" content="@yield('meta_description', 'Unit Penelitian dan Pengabdian Masyarakat')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/UNIV_ATK.webp') }}">
    
    {{-- Title --}}
    <title>@yield('title', 'UPPM Politeknik ATK Yogyakarta')</title>
    
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/navbar_ ATK.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/navbar_ ATK.png') }}">
    
    {{-- ========================================== --}}
    {{-- CSS ASSETS --}}
    {{-- ========================================== --}}
    
    {{-- Tailwind CSS via Vite --}}
    @vite(['resources/css/app.css'])
    
    {{-- Swiper CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css">
    
    {{-- Custom Global CSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    {{-- Custom Page CSS --}}
    <link rel="stylesheet" href="{{ asset('css/profil.css') }}">
    
    {{-- Additional Page-Specific Styles --}}
    @stack('styles')
</head>

<body class="bg-gray-50 flex flex-col min-h-screen font-sans antialiased">

    {{-- PAGE LOADER --}}
    <div id="page-loader" class="page-loader">
        <div class="flex flex-col items-center">
            <svg class="animate-spin h-12 w-12 text-teal-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p class="text-gray-600 font-medium">Memuat Halaman...</p>
        </div>
    </div>

    {{-- HEADER NAVIGATION --}}
    @include('partials.header')

    {{-- MAIN CONTENT AREA --}}
    <main id="main-content" class="flex-grow">
        
        {{-- Alert Messages --}}
        @include('partials.alerts')

        {{-- Page Content --}}
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('partials.footer')

    {{-- BACK TO TOP BUTTON --}}
    <button id="back-to-top" 
            class="hidden fixed bottom-8 right-8 bg-teal-600 hover:bg-teal-700 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 z-50 group"
            aria-label="Kembali ke atas"
            title="Kembali ke atas">
        <svg class="w-6 h-6 transform group-hover:-translate-y-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    {{-- ========================================== --}}
    {{-- JAVASCRIPT ASSETS --}}
    {{-- ========================================== --}}
    
    {{-- Swiper JS (Load pertama) --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    {{-- Custom Global JS --}}
    <script src="{{ asset('js/app.js') }}"></script>
    
    {{-- Additional Page-Specific Scripts --}}
    @stack('scripts')

</body>
</html>
