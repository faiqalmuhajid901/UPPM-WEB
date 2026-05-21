
<?php $__env->startSection('title', __('ui.profil_page_title')); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pages/profil-kampus.css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>




<section class="pengabdian-hero <?php if($profileHeader && $profileHeader->image_url): ?> has-dynamic-bg <?php endif; ?>" <?php if($profileHeader && $profileHeader->image_url): ?> data-bg-image="<?php echo e($profileHeader->image_url); ?>" <?php endif; ?>>
    <?php if($profileHeader && $profileHeader->image_url): ?>
        <div class="hero-overlay hero-overlay--dark"></div>
    <?php else: ?>
        <div class="hero-overlay"></div>
        <div class="hero-pattern"></div>
    <?php endif; ?>

    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-building"></i>
            <span><?php echo e(__('ui.profil_uppm')); ?></span>
        </div>
        <h1 class="hero-title animate-fade-down">
            <?php echo e($profileHeader?->title ?? __('ui.home_default_hero')); ?>

        </h1>
        <p class="hero-subtitle animate-fade-up">
            <?php echo e($profileHeader?->excerpt ?? __('ui.home_default_sub')); ?>

        </p>
        <div class="hero-buttons animate-fade-up">
            <a href="#tentang" class="btn-hero-primary">
                <i class="fas fa-book-open"></i>
                <?php echo e(__('ui.learn_more')); ?>

            </a>
            <a href="#visi-misi" class="btn-hero-secondary">
                <i class="fas fa-bullseye"></i>
                <?php echo e(__('navbar.visi_misi')); ?>

            </a>
        </div>
    </div>

    <div class="hero-scroll-indicator">
        <span><?php echo e(__('ui.scroll')); ?></span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">

    
    
    
    <section id="tentang" class="mb-32 scroll-mt-24">
        <?php if($tentang): ?>
            <div class="relative">
                <div class="absolute -inset-3 -z-10 rounded-[36px] bg-gradient-to-br from-teal-50 via-white to-blue-50"></div>
                <div class="bg-white/90 backdrop-blur rounded-[32px] shadow-xl ring-1 ring-gray-100/70 overflow-hidden hover-lift">
                    <div class="grid grid-cols-1 lg:grid-cols-[1.05fr_0.95fr] gap-0">
                    
                    
                    <?php if($tentang->image): ?>
                        <div class="relative h-80 lg:h-full min-h-[360px] bg-gray-100 order-2 lg:order-1 image-zoom-container">
                            <img src="<?php echo e($tentang->image_url); ?>" 
                                 alt="<?php echo e($tentang->title); ?>" 
                                 class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-black/25 via-black/10 to-transparent"></div>
                        </div>
                    <?php endif; ?>
                    
                    
                    <div class="p-10 lg:p-14 xl:p-16 flex flex-col justify-center bg-white order-1 lg:order-2">
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-teal-100 text-teal-700 font-semibold text-sm rounded-full mb-5 w-fit">
                            <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            <?php echo e(__('ui.profil_kami')); ?>

                        </span>
                        
                        <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-5">
                            <?php echo e($tentang->title); ?>

                        </h2>
                        
                        <div class="w-24 h-1.5 bg-gradient-to-r from-teal-500 to-blue-500 rounded-full mb-6"></div>
                        
                        <div class="prose prose-lg prose-slate max-w-none text-gray-700 leading-relaxed">
                            <?php echo nl2br(e($tentang->content ?: $tentang->excerpt)); ?>

                        </div>
                        
                        
                        <div class="mt-8 grid gap-4 sm:grid-cols-2">
                            <div class="flex items-start gap-3 rounded-2xl border border-teal-100/60 bg-teal-50/60 p-4">
                                <div class="bg-white p-3 rounded-xl shadow-sm flex-shrink-0">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1"><?php echo e(__('ui.penelitian_berkualitas')); ?></h3>
                                    <p class="text-gray-600 text-sm"><?php echo e(__('ui.penelitian_berkualitas_desc')); ?></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 rounded-2xl border border-teal-100/60 bg-teal-50/60 p-4">
                                <div class="bg-white p-3 rounded-xl shadow-sm flex-shrink-0">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1"><?php echo e(__('ui.pengabdian_masyarakat')); ?></h3>
                                    <p class="text-gray-600 text-sm"><?php echo e(__('ui.pengabdian_masyarakat_desc')); ?></p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3 rounded-2xl border border-teal-100/60 bg-teal-50/60 p-4 sm:col-span-2">
                                <div class="bg-white p-3 rounded-xl shadow-sm flex-shrink-0">
                                    <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-1"><?php echo e(__('ui.publikasi_ilmiah')); ?></h3>
                                    <p class="text-gray-600 text-sm"><?php echo e(__('ui.publikasi_ilmiah_desc')); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        <?php else: ?>
            
            <div class="relative overflow-hidden rounded-3xl border border-gray-200 bg-gradient-to-br from-white via-gray-50 to-teal-50 p-12 text-center shadow-sm">
                <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full bg-teal-100/70 blur-2xl"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 rounded-full bg-blue-100/70 blur-2xl"></div>
                <div class="relative max-w-3xl mx-auto">
                    <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-white shadow-md ring-1 ring-teal-100">
                        <svg class="w-8 h-8 text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-lg text-gray-700 font-semibold"><?php echo e(__('ui.empty_tentang')); ?></p>
                    <p class="text-sm text-gray-500 mt-2"><?php echo e(__('ui.empty_tentang_desc')); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </section>

    
    
    
    <section id="visi-misi" class="mb-32 scroll-mt-24 relative">
        <div class="absolute -z-10 inset-0">
            <div class="absolute -top-12 left-1/2 h-40 w-40 -translate-x-1/2 rounded-full bg-teal-100/60 blur-3xl"></div>
            <div class="absolute bottom-0 right-0 h-32 w-32 rounded-full bg-blue-100/60 blur-3xl"></div>
        </div>

        <div class="text-center mb-12">
            <span class="inline-block px-4 py-2 bg-gradient-to-r from-teal-500 to-blue-500 text-white font-semibold text-sm rounded-full mb-4 shadow-md">
                <?php echo e(__('ui.tujuan_utama')); ?>

            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 tracking-tight">
                <?php echo e(__('ui.visi_misi_uppm')); ?>

            </h2>
            <div class="w-32 h-1.5 bg-gradient-to-r from-teal-500 to-blue-500 rounded-full mx-auto mt-4"></div>
        </div>

        <?php
            $misiItems = [];
            if ($misi && ($misi->content || $misi->excerpt)) {
                $rawMisi = $misi->content ?: $misi->excerpt;
                $misiItems = array_values(array_filter(preg_split('/\r\n|\r|\n/', $rawMisi)));
            }
        ?>

        <div class="vm-tabs-wrapper">
            <div class="vm-tabs" role="tablist" aria-label="Tab Visi dan Misi">
                <button type="button" class="vm-tab is-active" role="tab" aria-selected="true" aria-controls="vm-panel-visi" id="vm-tab-visi" data-vm-tab="visi">
                    <?php echo e(__('ui.visi')); ?>

                </button>
                <button type="button" class="vm-tab" role="tab" aria-selected="false" aria-controls="vm-panel-misi" id="vm-tab-misi" data-vm-tab="misi">
                    <?php echo e(__('ui.misi')); ?>

                </button>
            </div>
        </div>

        <div class="vm-panels">
            
            <div id="vm-panel-visi" class="vm-panel is-active" role="tabpanel" aria-hidden="false" aria-labelledby="vm-tab-visi" data-vm-panel="visi">
                <div class="vm-panel-card">
                    <div class="vm-panel-content">
                        <h3 class="vm-panel-title"><?php echo e($visi->title ?? __('ui.visi')); ?></h3>
                        <div class="vm-panel-text">
                            <?php if($visi && ($visi->content || $visi->excerpt)): ?>
                                <p class="whitespace-pre-line"><?php echo e($visi->content ?: $visi->excerpt); ?></p>
                            <?php else: ?>
                                <p><?php echo e(__('ui.default_visi')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            
            <div id="vm-panel-misi" class="vm-panel" role="tabpanel" aria-hidden="true" aria-labelledby="vm-tab-misi" data-vm-panel="misi" hidden>
                <div class="vm-panel-card">
                    <div class="vm-panel-content">
                        <h3 class="vm-panel-title"><?php echo e($misi->title ?? __('ui.misi')); ?></h3>
                        <div class="vm-panel-text">
                            <?php if(count($misiItems) > 1): ?>
                                <ol class="vm-list">
                                    <?php $__currentLoopData = $misiItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $cleanItem = preg_replace('/^\\d+\\.\\s*/', '', trim($item));
                                        ?>
                                        <li class="vm-list-item">
                                            <span class="vm-list-index"><?php echo e($index + 1); ?></span>
                                            <span class="vm-list-text"><?php echo e($cleanItem); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ol>
                            <?php elseif(count($misiItems) === 1): ?>
                                <p><?php echo e($misiItems[0]); ?></p>
                            <?php else: ?>
                                <ol class="vm-list">
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">1</span>
                                        <span class="vm-list-text"><?php echo e(__('ui.default_misi_1')); ?></span>
                                    </li>
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">2</span>
                                        <span class="vm-list-text"><?php echo e(__('ui.default_misi_2')); ?></span>
                                    </li>
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">3</span>
                                        <span class="vm-list-text"><?php echo e(__('ui.default_misi_3')); ?></span>
                                    </li>
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">4</span>
                                        <span class="vm-list-text"><?php echo e(__('ui.default_misi_4')); ?></span>
                                    </li>
                                    <li class="vm-list-item">
                                        <span class="vm-list-index">5</span>
                                        <span class="vm-list-text"><?php echo e(__('ui.default_misi_5')); ?></span>
                                    </li>
                                </ol>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="mt-12 text-center">
            <a href="<?php echo e(route('struktur-organisasi')); ?>" class="inline-flex items-center gap-2 text-teal-600 font-semibold hover:text-teal-700 transition-colors">
                <span><?php echo e(__('ui.view_org_structure')); ?></span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\frontend\profil-kampus.blade.php ENDPATH**/ ?>