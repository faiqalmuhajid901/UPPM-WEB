

<?php $__env->startSection('title', __('ui.home_title')); ?>

<?php $__env->startSection('content'); ?>




<section class="relative w-full bg-gradient-to-br from-teal-600 via-teal-700 to-teal-900 overflow-hidden">
    
    
    <div class="absolute inset-0 z-10 flex items-center justify-center pointer-events-none">
        <div class="text-center px-4 sm:px-6 lg:px-8 max-w-5xl mx-auto">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-8 md:p-12 shadow-2xl">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-4 drop-shadow-lg animate-fade-down">
                    <?php echo e($homeHeader?->title ?? __('ui.home_default_hero')); ?>

                </h1>
                <p class="text-xl md:text-3xl text-teal-100 mb-8 font-medium drop-shadow-md animate-fade-up">
                    <?php echo e($homeHeader?->excerpt ?? __('ui.home_default_sub')); ?>

                </p>
                <div class="flex flex-wrap gap-4 justify-center pointer-events-auto animate-fade-up">
                    <a href="<?php echo e(route('profil-kampus')); ?>" 
                       class="bg-white text-teal-600 px-8 py-4 rounded-full font-semibold hover:bg-teal-50 transition-all shadow-lg hover:shadow-xl hover:scale-105 inline-flex items-center gap-2">
                        <span><?php echo e(__('ui.learn_more')); ?></span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                    <a href="<?php echo e(route('profil-kampus')); ?>#visi-misi" 
                       class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold hover:bg-white hover:text-teal-600 transition-all inline-flex items-center gap-2">
                        <span><?php echo e(__('navbar.visi_misi')); ?></span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    
<div class="swiper hero-swiper relative w-full h-[600px] md:h-[700px] lg:h-[800px]">
    <div class="swiper-wrapper">
        <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="swiper-slide">
                <div class="relative w-full h-full">
                    <img src="<?php echo e($slide->image_url ?? Storage::url($slide->image)); ?>" 
                         alt="<?php echo e($slide->title); ?>" 
                         class="w-full h-full object-cover js-image-fallback"
                         data-fallback-parent-classes="bg-gradient-to-br from-teal-600 to-teal-800">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/40 to-black/60"></div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            
            <div class="swiper-slide">
                <div class="relative w-full h-full bg-gradient-to-br from-teal-600 via-teal-700 to-teal-800">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="relative w-full h-full bg-gradient-to-br from-teal-700 via-blue-700 to-teal-900">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="relative w-full h-full bg-gradient-to-br from-blue-600 via-teal-700 to-blue-900">
                    <div class="absolute inset-0 bg-gradient-to-b from-black/30 via-transparent to-black/50"></div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    
    <div class="swiper-button-next !text-white hover:!text-teal-400 transition-colors"></div>
    <div class="swiper-button-prev !text-white hover:!text-teal-400 transition-colors"></div>

    
    <div class="swiper-pagination !bottom-8"></div>
</div>


    
    <div class="absolute bottom-0 left-0 right-0 z-20">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>





<?php if($welcome): ?>
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <?php if($welcome->image): ?>
            <div class="order-2 lg:order-1">
                <img src="<?php echo e($welcome->image_url ?? Storage::url($welcome->image)); ?>" 
                     alt="<?php echo e($welcome->title); ?>" 
                     class="rounded-2xl shadow-xl w-full h-auto">
            </div>
            <?php endif; ?>
            
            
            <div class="order-1 lg:order-2 <?php echo e($welcome->image ? '' : 'lg:col-span-2 text-center max-w-4xl mx-auto'); ?>">
                <span class="inline-block px-4 py-2 bg-teal-100 text-teal-700 font-semibold text-sm rounded-full mb-4">
                    <?php echo e(__('ui.welcome')); ?>

                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    <?php echo e($welcome->title); ?>

                </h2>
                <div class="w-24 h-1 bg-teal-500 rounded-full <?php echo e($welcome->image ? '' : 'mx-auto'); ?> mb-6"></div>
                
                
                <?php if($welcome->excerpt): ?>
                    <p class="text-xl text-gray-600 leading-relaxed mb-4">
                        <?php echo e($welcome->excerpt); ?>

                    </p>
                <?php endif; ?>
                
                <?php if($welcome->content): ?>
                    <div class="prose prose-lg text-gray-600 leading-relaxed">
                        <?php echo $welcome->content; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>




<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                <?php echo e(__('ui.program_kerja')); ?>

            </h2>
            <div class="w-24 h-1 bg-blue-500 rounded-full mx-auto mt-4"></div>
        </div>

        
        <div class="max-w-4xl mx-auto space-y-4">
            
            <?php if(isset($programKerja) && $programKerja->count() > 0): ?>
                <?php $__currentLoopData = $programKerja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-teal-600"><?php echo e($index + 1); ?></span>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e($feature->title); ?></h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed">
                                <?php echo e($feature->excerpt ?? Str::limit(strip_tags($feature->content), 200)); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                
                
                
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-teal-600">1</span>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e(__('ui.penelitian_dosen')); ?></h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed"><?php echo e(__('ui.penelitian_dosen_desc')); ?> <br><strong class="text-teal-600"><?php echo e(__('ui.penelitian_dosen_target')); ?></strong></p>
                        </div>
                    </div>
                </div>

                
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-blue-600">2</span>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e(__('ui.penelitian_terapan')); ?></h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed"><?php echo e(__('ui.penelitian_terapan_desc')); ?> <br><strong class="text-blue-600"><?php echo e(__('ui.penelitian_terapan_target')); ?></strong></p>
                        </div>
                    </div>
                </div>

                
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-purple-600">3</span>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e(__('ui.penelitian_mhs')); ?></h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed"><?php echo e(__('ui.penelitian_mhs_desc')); ?> <br><strong class="text-purple-600"><?php echo e(__('ui.penelitian_mhs_target')); ?></strong></p>
                        </div>
                    </div>
                </div>

                
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-teal-600">4</span>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e(__('ui.layanan_industri')); ?></h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed"><?php echo e(__('ui.layanan_industri_desc')); ?> <br><strong class="text-teal-600"><?php echo e(__('ui.layanan_industri_target')); ?></strong></p>
                        </div>
                    </div>
                </div>

                
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-blue-600">5</span>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e(__('ui.penelitian_tema40')); ?></h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed"><?php echo e(__('ui.penelitian_tema40_desc')); ?> <br><strong class="text-blue-600"><?php echo e(__('ui.penelitian_tema40_target')); ?></strong></p>
                        </div>
                    </div>
                </div>

                
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-purple-600">6</span>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e(__('ui.pkm_tema40')); ?></h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed"><?php echo e(__('ui.pkm_tema40_desc')); ?> <br><strong class="text-purple-600"><?php echo e(__('ui.pkm_tema40_target')); ?></strong></p>
                        </div>
                    </div>
                </div>

                
                <div class="accordion-item bg-white rounded-2xl shadow-lg overflow-hidden" data-accordion>
                    <button class="accordion-button w-full px-8 py-5 flex items-center justify-between text-left hover:bg-gray-50 transition-colors">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl font-bold text-teal-600">7</span>
                            <h3 class="text-xl font-bold text-gray-900"><?php echo e(__('ui.luaran_hki')); ?></h3>
                        </div>
                        <svg class="accordion-icon w-6 h-6 text-gray-400 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content px-8 overflow-hidden transition-all duration-300 ease-in-out max-h-0 opacity-0">
                        <div class="pl-12 pb-6">
                            <p class="text-gray-600 leading-relaxed"><?php echo e(__('ui.luaran_hki_desc')); ?> <br><strong class="text-teal-600"><?php echo e(__('ui.luaran_hki_target')); ?></strong></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>





<section class="py-20 bg-gradient-to-br from-teal-600 via-teal-700 to-teal-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 stats-pattern"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold mb-4"><?php echo e(__('ui.our_achievements')); ?></h2>
            <p class="text-xl text-teal-100"><?php echo e(__('ui.achievements_desc')); ?></p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold mb-2"><?php echo e($penelitians->count() > 0 ? $penelitians->count() . '+' : '150+'); ?></div>
                <p class="text-teal-100 text-lg"><?php echo e(__('ui.penelitian')); ?></p>
            </div>
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold mb-2">200+</div>
                <p class="text-teal-100 text-lg"><?php echo e(__('ui.pengabdian')); ?></p>
            </div>
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold mb-2"><?php echo e($publikasis->count() > 0 ? $publikasis->count() . '+' : '100+'); ?></div>
                <p class="text-teal-100 text-lg"><?php echo e(__('ui.publikasi_label')); ?></p>
            </div>
            <div class="text-center">
                <div class="text-5xl md:text-6xl font-bold mb-2">50+</div>
                <p class="text-teal-100 text-lg"><?php echo e(__('ui.kerjasama')); ?></p>
            </div>
        </div>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-teal-100 text-teal-700 font-semibold text-sm rounded-full mb-4">
                <?php echo e(__('ui.latest')); ?>

            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900"><?php echo e(__('ui.latest_research')); ?></h2>
            <div class="w-24 h-1 bg-teal-500 rounded-full mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $penelitians; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $penelitian): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover-lift">
                <?php if($penelitian->gambar): ?>
                <img src="<?php echo e($penelitian->gambar_url ?? Storage::url($penelitian->gambar)); ?>" 
                     alt="<?php echo e($penelitian->judul); ?>"
                     class="w-full h-48 object-cover">
                <?php else: ?>
                <div class="w-full h-48 bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center">
                    <svg class="w-16 h-16 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                    </svg>
                </div>
                <?php endif; ?>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2"><?php echo e($penelitian->judul); ?></h3>
                    <p class="text-gray-600 mb-4 line-clamp-3"><?php echo e(Str::limit($penelitian->abstrak, 100)); ?></p>
                    <a href="<?php echo e(route('penelitian.detail', $penelitian)); ?>" 
                       class="inline-flex items-center text-teal-600 font-semibold hover:text-teal-700">
                        <?php echo e(__('ui.read_more')); ?>

                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-12">
            <a href="<?php echo e(route('penelitian')); ?>" 
               class="inline-flex items-center bg-teal-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-teal-700 transition-colors">
                <?php echo e(__('ui.view_all_research')); ?>

                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/frontend/home.blade.php ENDPATH**/ ?>