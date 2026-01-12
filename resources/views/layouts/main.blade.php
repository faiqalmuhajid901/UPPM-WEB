<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Politeknik ATK Yogyakarta')</title>
    
    {{-- CSS Framework (Tailwind CSS) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Tambahan (Opsional) --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    {{-- Kustom CSS Tambahan --}}
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased flex flex-col min-h-screen">

    {{-- 1. NAVBAR --}}
    {{-- Memanggil komponen navbar dari resources/views/components/navbar.blade.php --}}
    <x-navbar />

    {{-- 2. KONTEN UTAMA --}}
    {{-- Kelas 'pt-16' penting agar konten tidak tertutup Navbar yang fixed --}}
    <main class="flex-grow pt-16">
        @yield('content')
    </main>

    {{-- 3. FOOTER --}}
    {{-- Memanggil komponen footer dari resources/views/components/footer.blade.php --}}
    <x-footer />

    {{-- Script Tambahan (JavaScript) --}}
    @stack('scripts')
</body>
</html>