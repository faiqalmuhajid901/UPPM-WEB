<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $__env->yieldContent('title', 'Admin Panel - UPPM'); ?></title>
    
    <!-- Asset Tailwind -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased h-screen overflow-hidden flex">
    
    <!-- 1. SIDEBAR -->
    <?php echo $__env->make('admin.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- BACKDROP (Overlay Hitam Mobile) -->
    <!-- Muncul hanya di mobile ketika sidebar terbuka -->
    <div id="sidebarBackdrop" onclick="toggleSidebar()" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden transition-opacity"></div>

    <!-- 2. Main Content Wrapper -->
    <div class="flex-1 flex flex-col h-full overflow-hidden relative z-0">
        
        <!-- Header -->
        <?php echo $__env->make('admin.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- 3. Area Konten (Scrollable) -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            <?php echo $__env->yieldContent('admin_content'); ?>
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
</html><?php /**PATH E:\laragon\uppm-web\resources\views/layouts/admin.blade.php ENDPATH**/ ?>