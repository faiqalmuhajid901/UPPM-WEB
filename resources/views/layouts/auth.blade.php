<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Login') - Admin UPPM</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="auth-page">
        
        {{-- Back Link --}}
        <a href="{{ route('home') }}" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"/>
            </svg>
            Kembali
        </a>
        
        {{-- Auth Card --}}
        <div class="auth-card">
            
            {{-- Logo --}}
            <div class="auth-logo">
                <span class="auth-logo-text">U</span>
            </div>
            
            {{-- Title --}}
            <h1 class="auth-title">@yield('heading', 'Selamat Datang')</h1>
            <p class="auth-subtitle">@yield('subheading', 'Masuk ke Admin Panel UPPM')</p>
            
            {{-- Content --}}
            @yield('content')
            
            {{-- Footer --}}
            <div class="auth-footer">
                <p>
                    © {{ date('Y') }} UPPM Poltek ATK
                </p>
            </div>
            
        </div>
    </div>
</body>
</html>
