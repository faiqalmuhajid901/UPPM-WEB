

<footer class="relative bg-slate-900 text-gray-200 overflow-hidden">
    
    
    <div class="absolute inset-0 z-0">
        <img src="<?php echo e(asset('images/UNIV_ATK.webp')); ?>" 
             alt="" 
             class="w-full h-full object-cover opacity-10"
             aria-hidden="true">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/95 to-slate-900/98"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-12 pb-6">
        
        
        <div class="pb-8 mb-8 border-b border-white/10">
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold">
                    <span class="text-teal-400">UPPM</span>
                    <span class="text-white">Poltek ATK</span>
                </h2>
                <p class="text-gray-400 text-sm mt-1"><?php echo e(__('ui.uppm_subtitle')); ?></p>
            </div>
        </div>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8 pb-8 mb-8 border-b border-white/10">
            
            
            <div>
                <h4 class="text-teal-400 font-bold text-sm uppercase tracking-wider mb-4"><?php echo e(__('navbar.profil')); ?></h4>
                <ul class="space-y-3">
                    <li>
                        <a href="<?php echo e(route('profil-kampus')); ?>#tentang" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <?php echo e(__('navbar.profil_kampus')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('profil-kampus')); ?>#visi-misi" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <?php echo e(__('navbar.visi_misi')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('struktur-organisasi')); ?>" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <?php echo e(__('ui.tim_kami')); ?>

                        </a>
                    </li>
                </ul>
            </div>

            
            <div>
                <h4 class="text-teal-400 font-bold text-sm uppercase tracking-wider mb-4"><?php echo e(__('navbar.penelitian')); ?></h4>
                <ul class="space-y-3">
                    <li>
                        <a href="<?php echo e(route('penelitian')); ?>" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <?php echo e(__('ui.daftar_penelitian')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('publikasi')); ?>" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <?php echo e(__('navbar.publikasi')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('kemitraan')); ?>" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <?php echo e(__('navbar.kemitraan')); ?>

                        </a>
                    </li>
                </ul>
            </div>

            
            <div>
                <h4 class="text-teal-400 font-bold text-sm uppercase tracking-wider mb-4"><?php echo e(__('navbar.pengabdian')); ?></h4>
                <ul class="space-y-3">
                    <li>
                        <a href="<?php echo e(route('pengabdian')); ?>" class="footer-link">
                            <i class="fas fa-chevron-right"></i>
                            <?php echo e(__('ui.program_pengabdian_footer')); ?>

                        </a>
                    </li>
                </ul>
            </div>

            
            <div>
                <h4 class="text-teal-400 font-bold text-sm uppercase tracking-wider mb-4"><?php echo e(__('ui.kontak')); ?></h4>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-map-marker-alt text-teal-400 mt-1 flex-shrink-0"></i>
                        <a href="https://maps.app.goo.gl/CWLazyMp7iEhNU6G7"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="text-sm text-gray-400 hover:text-teal-400 transition-colors leading-relaxed">
                            Jl. Prof. DR. Wirjono Projodikoro, Glugo, Panggungharjo, Prodjodikoro, Kabupaten Bantul, Daerah Istimewa Yogyakarta 55188
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-phone text-teal-400 flex-shrink-0"></i>
                        <a href="https://api.whatsapp.com/send/?phone=628112671919&text&type=phone_number&app_absent=0" class="text-sm text-gray-400 hover:text-teal-400 transition-colors">
                            (+62) 8112671919
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-envelope text-teal-400 flex-shrink-0"></i>
                        <a href="mailto:uppm@atk.ac.id" class="text-sm text-gray-400 hover:text-teal-400 transition-colors">
                            uppm@atk.ac.id
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fas fa-clock text-teal-400 flex-shrink-0"></i>
                        <span class="text-sm text-gray-400">
                            <?php echo e(__('ui.mon_fri')); ?>

                        </span>
                    </li>
                </ul>
            </div>

            
            <div class="flex flex-col items-center justify-start text-center">
                <div class="w-28 h-28 bg-white/5 rounded-2xl p-4 flex items-center justify-center 
                            transition-all duration-300 hover:bg-white/10 hover:scale-105 mb-3">
                    <img src="<?php echo e(asset('images/logobaruCMYK.png')); ?>" 
                         alt="Logo Politeknik ATK" 
                         class="max-w-full max-h-full object-contain">
                </div>
                <p class="max-w-[220px] text-xs text-gray-500 italic text-center mx-auto leading-relaxed">
                    <?php echo e(__('ui.footer_tagline')); ?>

                </p>
            </div>
        </div>

        
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex flex-col sm:flex-row items-center gap-2 text-xs text-gray-500">
                <span>&copy; <?php echo e(date('Y')); ?> UPPM Politeknik ATK Yogyakarta.</span>
                <div class="flex items-center gap-3">
                    <a href="<?php echo e(route('kontak')); ?>" class="hover:text-teal-400 transition-colors"><?php echo e(__('ui.kontak')); ?></a>
                    <span class="text-gray-700">|</span>
                    <a href="<?php echo e(route('login')); ?>" class="hover:text-amber-400 transition-colors">
                        <i class="fas fa-lock mr-1"></i><?php echo e(__('ui.admin')); ?>

                    </a>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <a href="https://www.facebook.com/people/Politeknik-ATK-Yogyakarta/61552881957904/?ref=NONE_xav_ig_profile_page_web#"
                   target="_blank" rel="noopener noreferrer" 
                   class="social-link facebook" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/politeknikatk?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                   target="_blank" rel="noopener noreferrer" 
                   class="social-link instagram" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://www.youtube.com/watch?v=xo0crNmzJDE"
                   target="_blank" rel="noopener noreferrer" 
                   class="social-link youtube" aria-label="YouTube">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/partials/footer.blade.php ENDPATH**/ ?>