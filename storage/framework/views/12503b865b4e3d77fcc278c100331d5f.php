


<?php $__env->startSection('title', __('ui.kemitraan_page_title')); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pengabdian.css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="pelayanan-page">

    
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
                <i class="fas fa-handshake"></i>
                <span><?php echo e(__('ui.kerja_sama')); ?></span>
            </div>
            <h1 class="hero-title"><?php echo e($header->title ?? __('ui.kemitraan_page_title')); ?></h1>
            <p class="hero-subtitle">
                <?php echo e($header->excerpt ?? __('ui.kemitraan_default_desc')); ?>

            </p>
            <div class="hero-buttons">
                <a href="<?php echo e(route('kontak')); ?>" class="btn-hero-primary">
                    <i class="fas fa-envelope"></i>
                    <?php echo e(__('ui.contact_us')); ?>

                </a>
                <a href="#mitra" class="btn-hero-secondary">
                    <i class="fas fa-building"></i>
                    <?php echo e(__('ui.lihat_mitra')); ?>

                </a>
            </div>
        </div>
        <div class="hero-scroll-indicator">
            <span><?php echo e(__('ui.scroll')); ?></span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    
    <section id="mitra" class="section-content">
        <div class="container">

            
            <div class="content-intro">
                <div class="content-intro__icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="content-intro__text">
                    <h2><?php echo e(__('ui.mitra_kerja_sama')); ?></h2>
                    <p><?php echo e($header->content ?? __('ui.mitra_kerja_sama_desc')); ?></p>
                </div>
            </div>

            
            <div class="pelatihan-section">
                <div class="section-header text-center">
                    <span class="section-badge"><?php echo e(__('ui.lihat_mitra')); ?></span>
                    <h3 class="section-title text-center"><?php echo e(__('ui.daftar_mitra')); ?></h3>
                    <p class="section-subtitle text-center"><?php echo e(__('ui.daftar_mitra_desc')); ?></p>
                </div>

                <?php if($partners->count() > 0): ?>
                <div class="pelatihan-grid">
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pelatihan-card">
                        <?php if($partner->image_url): ?>
                        <div class="pelatihan-card__image">
                            <img src="<?php echo e($partner->image_url); ?>" alt="<?php echo e($partner->title); ?>" loading="lazy">
                        </div>
                        <?php endif; ?>
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title"><?php echo e($partner->title); ?></h4>
                            <?php if($partner->content): ?>
                            <p class="pelatihan-card__desc"><?php echo e(Str::limit(strip_tags($partner->content), 150)); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                
                <div class="pelatihan-grid">
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">PT. Industri Tekstil Indonesia</h4>
                            <p class="pelatihan-card__desc">Kerja sama dalam bidang riset dan pengembangan material tekstil berkelanjutan.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">Yayasan Pendidikan Teknologi</h4>
                            <p class="pelatihan-card__desc">Kemitraan dalam program pengabdian masyarakat dan pelatihan vokasi.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">PT. Inovasi Digital Nusantara</h4>
                            <p class="pelatihan-card__desc">Kolaborasi dalam pengembangan teknologi digital dan sistem informasi.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">Kementerian Perindustrian RI</h4>
                            <p class="pelatihan-card__desc">Kerja sama dalam program hilirisasi hasil penelitian untuk industri.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">Asosiasi Industri Kreatif Yogyakarta</h4>
                            <p class="pelatihan-card__desc">Kemitraan dalam pengembangan desain dan industri kreatif berbasis teknologi.</p>
                        </div>
                    </div>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title">PT. Manufaktur Teknologi Tepat Guna</h4>
                            <p class="pelatihan-card__desc">Kolaborasi dalam pengembangan produk teknologi tepat guna untuk masyarakat.</p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            
            <div class="pelatihan-section" id="dokumen-kerjasama">
                <div class="section-header text-center">
                    <span class="section-badge"><?php echo e(__('ui.kerja_sama')); ?></span>
                    <h3 class="section-title text-center"><?php echo e(__('ui.dokumen_kerja_sama')); ?></h3>
                    <p class="section-subtitle text-center"><?php echo e(__('ui.dokumen_kerja_sama_desc')); ?></p>
                </div>

                <?php if(($kerjasamaDocs ?? collect())->count() > 0): ?>
                <div class="pelatihan-grid">
                    <?php $__currentLoopData = $kerjasamaDocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $iconClass = $doc->icon
                            ? (Str::startsWith($doc->icon, 'fa-') ? $doc->icon : 'fa-' . $doc->icon)
                            : 'fa-file-contract';
                    ?>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas <?php echo e($iconClass); ?>"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <h4 class="pelatihan-card__title"><?php echo e($doc->title); ?></h4>
                            <?php if($doc->excerpt || $doc->content): ?>
                            <p class="pelatihan-card__desc"><?php echo e(Str::limit(strip_tags($doc->excerpt ?: $doc->content), 150)); ?></p>
                            <?php endif; ?>
                            <?php if($doc->file_url): ?>
                            <a href="<?php echo e($doc->file_url); ?>" class="pelatihan-card__link" target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-download"></i> <?php echo e(__('ui.unduh')); ?>

                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <div class="content-intro">
                    <div class="content-intro__icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <div class="content-intro__text">
                        <h2><?php echo e(__('ui.belum_ada_dokumen_kerja_sama')); ?></h2>
                        <p><?php echo e(__('ui.dokumen_kerja_sama_segera')); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/frontend/kemitraan.blade.php ENDPATH**/ ?>