<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    {{-- ============================================
         META TAGS
         ============================================ --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {{-- SEO Meta Tags --}}
    <meta name="description" content="@yield('meta_description', 'Unit Penelitian dan Pengabdian Masyarakat - Politeknik ATK Yogyakarta')">
    <meta name="keywords" content="@yield('meta_keywords', 'UPPM, Politeknik ATK, Penelitian, Pengabdian Masyarakat, Yogyakarta')">
    <meta name="author" content="UPPM Poltek ATK">
    <meta name="robots" content="index, follow">
    
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', 'UPPM Poltek ATK - Unit Penelitian dan Pengabdian Masyarakat')">
    <meta property="og:description" content="@yield('og_description', 'Unit Penelitian dan Pengabdian Masyarakat - Politeknik ATK Yogyakarta')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo-uppm.png'))">
    
    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="@yield('title', 'UPPM Poltek ATK')">
    <meta name="twitter:description" content="@yield('meta_description', 'Unit Penelitian dan Pengabdian Masyarakat')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/logo-uppm.png'))">
    
    {{-- ============================================
         TITLE
         ============================================ --}}
    <title>@yield('title', 'Beranda') | UPPM Poltek ATK - Unit Penelitian dan Pengabdian Masyarakat</title>
    
    {{-- ============================================
         FAVICONS (Simplified - uncomment when files exist)
         ============================================ --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    {{-- 
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icons/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/navbar_ATK.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    --}}
    
    {{-- ============================================
         STYLESHEETS
         ============================================ --}}
    
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
          crossorigin="anonymous" 
          referrerpolicy="no-referrer" />
    
    {{-- ============================================
         VITE ASSETS (CSS + JS) - SATU-SATUNYA TEMPAT!
         ============================================ --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Page-specific CSS --}}
    @stack('styles')
</head>

<body>
    
    {{-- ============================================
         ACCESSIBILITY: Skip to Main Content
         ============================================ --}}
    <a href="#main-content" class="skip-link">
        {{ __('ui.skip_content') }}
    </a>
    
    {{-- ============================================
         HEADER / NAVIGATION
         ============================================ --}}
    @include('partials.header')
    
    {{-- ============================================
         ALERT CONTAINER (Toast Notifications)
         ============================================ --}}
    <div id="alert-container" class="alert-container" role="alert" aria-live="polite">
        {{-- Alerts will be injected here by JavaScript --}}
    </div>
    
    {{-- ============================================
         MAIN CONTENT AREA
         ============================================ --}}
    <main id="main-content" class="main-content" role="main" aria-label="Main content">
        
        {{-- Breadcrumb (Optional per page) --}}
        @hasSection('breadcrumb')
            <nav class="breadcrumb-nav" aria-label="Breadcrumb">
                <div class="container">
                    <ol class="breadcrumb">
                        @yield('breadcrumb')
                    </ol>
                </div>
            </nav>
        @endif
        
        {{-- Page Content --}}
        @yield('content')
        
    </main>
    
    {{-- ============================================
         FOOTER
         ============================================ --}}
    @include('partials.footer')
    
    {{-- ============================================
         BACK TO TOP BUTTON
         ============================================ --}}
    <button id="back-to-top" class="back-to-top" aria-label="Back to top" title="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    {{-- ============================================
         LOADING OVERLAY
         ============================================ --}}
    <div id="loading-overlay" class="loading-overlay hidden" role="status" aria-live="assertive" aria-label="Loading">
        <div class="loading-overlay-content">
            <div class="loading loading-lg loading-primary"></div>
            <div class="loading-text">
                <span>{{ __('ui.loading') }}</span>
                <p>{{ __('ui.please_wait') }}</p>
            </div>
        </div>
    </div>
    
    {{-- ============================================
         PAGE-SPECIFIC SCRIPTS
         ============================================ --}}
    @stack('scripts')
    
    
</body>
</html>
