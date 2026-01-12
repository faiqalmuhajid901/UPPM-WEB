<nav class="bg-gray-900 shadow fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between h-16">
            
            <!-- LOGO AREA -->
            <div class="flex items-center">
                <a href="/" class="font-bold text-xl text-teal-600">
                    <img src="<?php echo e(asset('images/navbar _ATK.png')); ?>" alt="Logo UPPM" class="h-10 w-auto mr-2" />
                </a>
            </div>
            
            <!-- MENU AREA -->
            <div class="flex items-center space-x-4">
                
                
                
                <div class="relative group nav-item pb-2">
                    <button class="text-white hover:text-teal-600 flex items-center focus:outline-none">
                        Profile
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    
                    <div class="js-dropdown absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-50">
                        <a href="<?php echo e(route('profil-kampus')); ?>#tentang" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">Tentang UPPM</a>
                        <a href="<?php echo e(route('profil-kampus')); ?>#visi-misi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">Visi & Misi</a>
                        <a href="<?php echo e(route('profil-kampus')); ?>#struktur" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">Struktur Organisasi</a>
                    </div>
                </div>

                
                <div class="relative group nav-item pb-2">
                    <button class="text-white hover:text-teal-600 flex items-center focus:outline-none">
                        Penelitian
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <div class="js-dropdown absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-50">
                        <a href="<?php echo e(route('penelitian')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">Panduan</a>
                        <a href="<?php echo e(route('penelitian')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">Jurnal Penelitian</a>
                        <a href="<?php echo e(route('penelitian')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">HAKI</a>
                    </div>
                </div>

                
                <div class="relative group nav-item pb-2">
                    <button class="text-white hover:text-teal-600 flex items-center focus:outline-none">
                        Pengabdian
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    
                    <div class="js-dropdown absolute top-full left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden z-50">
                        <a href="<?php echo e(route('pengabdian')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">Skema Pengabdian</a>
                        <a href="<?php echo e(route('pengabdian')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">Mitra Kerjasama</a>
                        <a href="<?php echo e(route('pengabdian')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-teal-600">Berita Kegiatan</a>
                    </div>
                </div>

                
                <a href="<?php echo e(route('publikasi')); ?>" class="text-white hover:text-teal-600">Publikasi</a>
                <a href="<?php echo e(route('kkn')); ?>" class="text-white hover:text-teal-600">KKN</a>

                
                <?php if(auth()->guard()->guest()): ?>
                    
                <?php else: ?>
                    
                    <div class="flex items-center space-x-3">
                        <?php if(in_array(auth()->user()->role, ['admin', 'super_admin'])): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-teal-400 font-bold border border-teal-400 px-3 py-1 rounded hover:bg-teal-400 hover:text-gray-900 transition-colors">
                                Admin Panel
                            </a>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline-block">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-semibold transition-colors">
                                Logout
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- SCRIPT AGAR DROPDOWN USER FRIENDLY (TIDAK CEPAT HILANG) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navItems = document.querySelectorAll('.nav-item');
            
            navItems.forEach(item => {
                const dropdown = item.querySelector('.js-dropdown');
                if (!dropdown) return;

                let timer;

                // Saat mouse masuk area (Tombol atau Dropdown)
                item.addEventListener('mouseenter', () => {
                    clearTimeout(timer); // Batalkan timer jika ada
                    dropdown.classList.remove('hidden');
                });

                // Saat mouse keluar area
                item.addEventListener('mouseleave', () => {
                    // Tunggu 300ms sebelum menutup (Supaya tidak kecepatan)
                    timer = setTimeout(() => {
                        dropdown.classList.add('hidden');
                    }, 300); 
                });
            });
        });
    </script>
</nav><?php /**PATH E:\laragon\uppm-web\resources\views/partials/header.blade.php ENDPATH**/ ?>