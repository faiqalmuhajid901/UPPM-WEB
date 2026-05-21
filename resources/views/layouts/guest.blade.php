<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    
    <title>@yield('title', 'Login') | Admin UPPM</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    {{-- AUTH CSS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])    @stack('styles')
</head>

<body class="auth-body" 
      data-success="{{ session('success') }}" 
      data-error="{{ session('error') }}" 
      data-warning="{{ session('warning') }}" 
      data-info="{{ session('info') }}"
      data-status="{{ session('status') }}"
      data-errors='@json($errors->all())'>
    
    <div class="auth-background"></div>
    
    <a href="{{ route('home') }}" class="back-to-home">
        <i class="fas fa-arrow-left"></i>
        <span>Kembali ke Website</span>
    </a>
    
    <div class="auth-container">
        <div class="auth-card">
            
            <div class="auth-header">
                <a href="{{ route('home') }}" class="auth-logo">
                    <img src="{{ asset('images/navbar_ATK.png') }}" alt="UPPM Logo" class="logo-img">
                </a>
                <h1 class="auth-title">@yield('heading', 'Selamat Datang')</h1>
                <p class="auth-subtitle">@yield('subheading', 'Masuk ke Admin Panel UPPM')</p>
            </div>
            
            <div id="alert-container" class="alert-container-local"></div>
            
            <div class="auth-content">
                @yield('content')
            </div>
            
            <div class="auth-footer">
                <div class="auth-footer-text">
                    <p>&copy; {{ date('Y') }} UPPM Poltek ATK. All rights reserved.</p>
                </div>
            </div>
            
        </div>
    </div>
    
        
    @stack('scripts')
    
</body>
</html>
