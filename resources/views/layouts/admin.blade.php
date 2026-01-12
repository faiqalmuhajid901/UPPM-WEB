<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel - UPPM')</title>
    
    <!-- Asset Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased h-screen overflow-hidden flex">
    
    <!-- 1. SIDEBAR -->
    @include('admin.partials.sidebar')

    <!-- BACKDROP (Overlay Hitam Mobile) -->
    <!-- Muncul hanya di mobile ketika sidebar terbuka -->
    <div id="sidebarBackdrop" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity"></div>

    <!-- 2. Main Content Wrapper -->
    <div class="flex-1 flex flex-col h-full overflow-hidden relative z-0">
        
        <!-- Header -->
        @include('admin.partials.header')

        <!-- 3. Area Konten (Scrollable) -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            @yield('admin_content')
        </main>

    </div>

    <!-- SCRIPT TOGGLE SIDEBAR -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('admin-sidebar');
            const backdrop = document.getElementById('sidebarBackdrop');

            // Logika Toggle:
            // Jika sidebar tertutup (-translate-x-full), kita buka (hapus class tersebut).
            // Jika sidebar terbuka, kita tutup (tambahkan class tersebut).
            
            // Toggle transform class untuk animasi slide
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('md:translate-x-0');

            // Handle backdrop (Hanya muncul di mobile jika sidebar terbuka)
            if (sidebar.classList.contains('-translate-x-full')) {
                // Sidebar tertutup -> Sembunyikan backdrop
                backdrop.classList.add('hidden');
            } else {
                // Sidebar terbuka -> Tampilkan backdrop
                backdrop.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>