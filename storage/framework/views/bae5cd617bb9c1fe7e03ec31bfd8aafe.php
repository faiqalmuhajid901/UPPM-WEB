<header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shadow-sm z-10">
    
    <!-- Kiri: Tombol Toggle & Judul Halaman -->
    <div class="flex items-center gap-4">
        <!-- TOMBOL HAMBURGER (NEW) -->
        <button onclick="toggleSidebar()" class="text-slate-500 hover:text-slate-700 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <h2 class="text-xl font-bold text-slate-800 hidden sm:block"><?php echo $__env->yieldContent('page_title', 'Dashboard'); ?></h2>
    </div>

    <!-- Kanan: Profil & Notifikasi -->
    <div class="flex items-center space-x-4">
        
        <!-- Notifikasi -->
        <button class="p-2 text-slate-400 hover:text-indigo-600 transition-colors relative">
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border border-white"></span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
        </button>

        <!-- Profil User -->
        <div class="flex items-center space-x-3 border-l pl-4 border-slate-200">
            <div class="text-right hidden md:block">
                <p class="text-sm font-bold text-slate-700"><?php echo e(auth()->user()->name); ?></p>
                <p class="text-xs text-slate-500"><?php echo e(Str::title(auth()->user()->role)); ?></p>
            </div>
            <!-- Avatar Placeholder -->
            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold border border-indigo-200">
                <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

            </div>
        </div>

    </div>
</header><?php /**PATH E:\laragon\uppm-web\resources\views/admin/partials/header.blade.php ENDPATH**/ ?>