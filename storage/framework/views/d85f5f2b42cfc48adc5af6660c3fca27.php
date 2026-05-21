


<?php $__env->startSection('title', __('ui.arsip_dokumen')); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pengabdian.css'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pages/arsip.css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="pelayanan-page">

    <?php
        $kategoriLabels = [
            'sk' => 'SK & Peraturan',
            'panduan' => 'Panduan',
            'template' => 'Template',
            'laporan' => 'Laporan',
        ];
        $dokumenGroups = $dokumens->groupBy(function ($doc) use ($kategoriLabels) {
            $key = $doc->arsip_category ?? ($doc->meta['kategori'] ?? ($doc->category ?? 'sk'));
            return array_key_exists($key, $kategoriLabels) ? $key : 'sk';
        });
        $dokumenByKategori = [];
        foreach ($kategoriLabels as $key => $label) {
            $dokumenByKategori[$key] = ($dokumenGroups->get($key) ?? collect())->take(10);
        }
    ?>

    
    <section class="pengabdian-hero <?php if($header && $header->image_url): ?> has-dynamic-bg <?php endif; ?>" <?php if($header && $header->image_url): ?> data-bg-image="<?php echo e($header->image_url); ?>" <?php endif; ?>>
        <?php if($header && $header->image_url): ?>
        <div class="hero-overlay hero-overlay--dark"></div>
        <?php else: ?>
        <div class="hero-overlay"></div>
        <?php endif; ?>
        <?php if (! ($header && $header->image_url)): ?>
        <div class="hero-pattern"></div>
        <?php endif; ?>
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-archive"></i>
                <span><?php echo e(__('navbar.dokumen')); ?></span>
            </div>
            <h1 class="hero-title"><?php echo e($header->title ?? __('ui.arsip_dokumen')); ?></h1>
            <p class="hero-subtitle">
                <?php echo e($header->excerpt ?? __('ui.arsip_dokumen_desc')); ?>

            </p>
            <div class="hero-buttons">
                <a href="<?php echo e(route('kontak')); ?>" class="btn-hero-primary">
                    <i class="fas fa-envelope"></i>
                    <?php echo e(__('ui.contact_us')); ?>

                </a>
            </div>
        </div>
        <div class="hero-scroll-indicator">
            <span><?php echo e(__('ui.scroll')); ?></span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    
    <section class="arsip-filter">
        <div class="container">
            <div class="arsip-filter__wrapper">
                <div class="arsip-filter__search">
                    <input type="text" id="search-dokumen" placeholder="<?php echo e(__('ui.cari_dokumen')); ?>" class="arsip-filter__input">
                    <svg class="arsip-filter__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    
    <section class="arsip-panduan-section">
        <div class="container">
            <div class="arsip-panduan" id="panduan-section">
                <div class="arsip-grid arsip-grid--panduan">
                    <?php $__empty_1 = true; $__currentLoopData = $dokumenByKategori['panduan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <article class="panduan-card" data-doc-card="true" data-category="panduan">
                            <div class="panduan-card__header">
                                <span class="panduan-card__badge">Panduan</span>
                                <span class="panduan-card__meta"><?php echo e($doc->created_at->format('d M Y')); ?></span>
                            </div>
                            <h3 class="panduan-card__title"><?php echo e($doc->title); ?></h3>
                            <p class="panduan-card__desc">
                                <?php echo e(Str::limit($doc->excerpt ?: strip_tags($doc->content ?? ''), 120)); ?>

                            </p>
                            <div class="panduan-card__footer">
                                <span class="panduan-card__file"><?php echo e($doc->file ? strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) : 'PDF'); ?></span>
                                <a href="<?php echo e($doc->file_url ?? '#'); ?>" class="panduan-card__action" target="_blank" download>
                                    <?php echo e(__('ui.unduh')); ?>

                                </a>
                            </div>
                        </article>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="arsip-empty">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3><?php echo e(__('ui.belum_ada_panduan')); ?></h3>
                            <p><?php echo e(__('ui.panduan_segera_ditambahkan')); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    
    <section class="section-content">
        <div class="container">
            <div class="arsip-tabs" role="tablist" aria-label="<?php echo e(__('ui.arsip_dokumen')); ?>">
                <button class="arsip-tab active" role="tab" aria-selected="true" data-filter="sk"><?php echo e(__('ui.sk_peraturan')); ?></button>
                <button class="arsip-tab" role="tab" aria-selected="false" data-filter="template"><?php echo e(__('ui.template')); ?></button>
                <button class="arsip-tab" role="tab" aria-selected="false" data-filter="laporan"><?php echo e(__('ui.laporan')); ?></button>
            </div>
            <div class="arsip-tab-panels" id="dokumen-grid">
                
                <div class="arsip-tab-panel is-active" role="tabpanel" aria-hidden="false" data-panel="sk">
                    <div class="arsip-grid">
                        <?php $__empty_1 = true; $__currentLoopData = $dokumenByKategori['sk']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="arsip-card" data-doc-card="true" data-category="sk">
                                <div class="arsip-card__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="arsip-card__content">
                                    <span class="arsip-card__category"><?php echo e(__('ui.sk_peraturan')); ?></span>
                                    <h3 class="arsip-card__title"><?php echo e($doc->title); ?></h3>
                                    <p class="arsip-card__desc"><?php echo e(Str::limit($doc->excerpt ?: strip_tags($doc->content ?? ''), 100)); ?></p>
                                    <div class="arsip-card__meta">
                                        <span class="arsip-card__date">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <?php echo e($doc->created_at->format('d M Y')); ?>

                                        </span>
                                        <span class="arsip-card__size"><?php echo e($doc->file ? strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) : '-'); ?></span>
                                    </div>
                                </div>
                                <a href="<?php echo e($doc->file_url ?? '#'); ?>" class="arsip-card__download" target="_blank" download>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    <?php echo e(__('ui.unduh')); ?>

                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="arsip-empty">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3><?php echo e(__('ui.belum_ada_dokumen')); ?></h3>
                                <p><?php echo e(__('ui.dokumen_segera_ditambahkan')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="arsip-tab-panel" role="tabpanel" aria-hidden="true" data-panel="template">
                    <div class="arsip-grid">
                        <?php $__empty_1 = true; $__currentLoopData = $dokumenByKategori['template']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="arsip-card" data-doc-card="true" data-category="template">
                                <div class="arsip-card__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="arsip-card__content">
                                    <span class="arsip-card__category"><?php echo e(__('ui.template')); ?></span>
                                    <h3 class="arsip-card__title"><?php echo e($doc->title); ?></h3>
                                    <p class="arsip-card__desc"><?php echo e(Str::limit($doc->excerpt ?: strip_tags($doc->content ?? ''), 100)); ?></p>
                                    <div class="arsip-card__meta">
                                        <span class="arsip-card__date">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <?php echo e($doc->created_at->format('d M Y')); ?>

                                        </span>
                                        <span class="arsip-card__size"><?php echo e($doc->file ? strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) : '-'); ?></span>
                                    </div>
                                </div>
                                <a href="<?php echo e($doc->file_url ?? '#'); ?>" class="arsip-card__download" target="_blank" download>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    <?php echo e(__('ui.unduh')); ?>

                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="arsip-empty">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3><?php echo e(__('ui.belum_ada_template')); ?></h3>
                                <p><?php echo e(__('ui.template_segera_ditambahkan')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                
                <div class="arsip-tab-panel" role="tabpanel" aria-hidden="true" data-panel="laporan">
                    <div class="arsip-grid">
                        <?php $__empty_1 = true; $__currentLoopData = $dokumenByKategori['laporan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="arsip-card" data-doc-card="true" data-category="laporan">
                                <div class="arsip-card__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="arsip-card__content">
                                    <span class="arsip-card__category"><?php echo e(__('ui.laporan')); ?></span>
                                    <h3 class="arsip-card__title"><?php echo e($doc->title); ?></h3>
                                    <p class="arsip-card__desc"><?php echo e(Str::limit($doc->excerpt ?: strip_tags($doc->content ?? ''), 100)); ?></p>
                                    <div class="arsip-card__meta">
                                        <span class="arsip-card__date">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <?php echo e($doc->created_at->format('d M Y')); ?>

                                        </span>
                                        <span class="arsip-card__size"><?php echo e($doc->file ? strtoupper(pathinfo($doc->file, PATHINFO_EXTENSION)) : '-'); ?></span>
                                    </div>
                                </div>
                                <a href="<?php echo e($doc->file_url ?? '#'); ?>" class="arsip-card__download" target="_blank" download>
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    <?php echo e(__('ui.unduh')); ?>

                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="arsip-empty">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3><?php echo e(__('ui.belum_ada_laporan')); ?></h3>
                                <p><?php echo e(__('ui.laporan_segera_ditambahkan')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/js/pages/arsip.js'); ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/frontend/dokumen/arsip.blade.php ENDPATH**/ ?>