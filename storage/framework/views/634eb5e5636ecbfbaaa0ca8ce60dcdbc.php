<footer class="relative bg-[#1a222d] text-gray-300 py-12 px-6 font-sans border-t border-gray-700 overflow-hidden">
    
    <div class="absolute inset-0 z-0">
        <img src="<?php echo e(asset('images/UNIV_ATK.webp')); ?>" 
             alt="Footer Background" 
             class="w-full h-full object-contain object-right opacity-20 blur-[2px] scale-100 transition-transform duration-700"> 
        
        <div class="absolute inset-0 bg-gradient-to-r from-[#1a222d] via-[#1a222d]/80 to-[#1a222d]/40"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 border-b border-gray-700/50 pb-8">
            <div class="mb-6 md:mb-0">
                <h2 class="text-2xl font-bold text-[#4fd1c5]">UPPM <span class="text-white">Poltek ATK</span></h2>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-xs font-semibold tracking-wider uppercase text-gray-400">Dapatkan Informasi Terbaru</span>
                <button class="bg-[#4fd1c5] hover:bg-[#38b2ac] text-[#1a222d] px-5 py-2 rounded-lg font-bold text-sm transition-all shadow-lg">
                    Subscribe
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-8 border-b border-gray-700/50 pb-12">
            <div class="space-y-4">
                <h4 class="text-[#4fd1c5] font-semibold text-sm uppercase tracking-wider">Profil</h4>
                <ul class="text-sm space-y-3">
                    <li><a href="#" class="hover:text-white transition-colors">Tentang UPPM</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Visi & Misi</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Struktur Organisasi</a></li>
                </ul>
            </div>

            <div class="space-y-4">
                <h4 class="text-[#4fd1c5] font-semibold text-sm uppercase tracking-wider">Penelitian</h4>
                <ul class="text-sm space-y-3">
                    <li><a href="#" class="hover:text-white transition-colors">Panduan</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Jurnal Penelitian</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">HAKI</a></li>
                </ul>
            </div>

            <div class="space-y-4">
                <h4 class="text-[#4fd1c5] font-semibold text-sm uppercase tracking-wider">Pengabdian</h4>
                <ul class="text-sm space-y-3">
                    <li><a href="#" class="hover:text-white transition-colors">Skema Pengabdian</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Mitra Kerjasama</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Berita Kegiatan</a></li>
                </ul>
            </div>

            <div class="space-y-4">
                <h4 class="text-[#4fd1c5] font-semibold text-sm uppercase tracking-wider">Hubungi Kami</h4>
                <ul class="text-sm space-y-3 text-xs leading-relaxed">
                    <li>Jl. Ring Road Utara, Depok, Sleman, Yogyakarta</li>
                    <li><a href="mailto:uppm@atk.ac.id" class="hover:text-white">uppm@atk.ac.id</a></li>
                </ul>
            </div>

            <div class="flex justify-center md:justify-end items-center border-l border-gray-700/50 md:pl-8">
                <div class="relative bg-white/5 backdrop-blur-lg rounded-full p-4 border border-white/10 shadow-2xl overflow-hidden group">
                     <img src="<?php echo e(asset('images/UNIV_ATK.webp')); ?>" 
                         alt="Logo ATK" 
                         class="w-20 h-20 object-contain rounded-full relative z-10">
                     <div class="absolute inset-0 bg-gradient-to-tr from-[#4fd1c5]/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                </div>
            </div>
        </div>

        <div class="pt-8 flex flex-col md:flex-row justify-between items-center text-[10px] md:text-xs">
            <div class="flex flex-wrap justify-center md:justify-start gap-4 md:gap-6 mb-4 md:mb-0 text-gray-500">
                <span>© 2025 UPPM Politeknik ATK Yogyakarta.</span>
                <a href="#" class="hover:text-[#4fd1c5] transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-[#4fd1c5] transition-colors">Terms of Service</a>
                
                <span class="text-gray-700">|</span>
                <a href="/admin/dashboard" class="text-gray-500 hover:text-teal-400 transition border-b border-transparent hover:border-teal-400">
                    Admin Login
                </a>
            </div>
            
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-[#4fd1c5] transition-colors"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-gray-400 hover:text-[#4fd1c5] transition-colors"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-gray-400 hover:text-[#4fd1c5] transition-colors"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
    </div>
</footer><?php /**PATH E:\laragon\uppm-web\resources\views/partials/footer.blade.php ENDPATH**/ ?>