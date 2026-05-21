


<?php $__env->startSection('title', __('ui.pelatihan_page_title')); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pengabdian.css'); ?>
<style>
    @media (max-width: 1024px) {
        .pelatihan-page .content-intro {
            flex-direction: column !important;
            align-items: center !important;
            text-align: center !important;
        }

        .pelatihan-page .content-intro__icon {
            margin: 0 auto !important;
        }

        .pelatihan-page .content-intro__text,
        .pelatihan-page .content-intro__text h2,
        .pelatihan-page .content-intro__text p {
            width: 100% !important;
            text-align: center !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="pelatihan-page">
    
    
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
                <i class="fas fa-graduation-cap"></i>
                <span><?php echo e(__('ui.program_pelatihan')); ?></span>
            </div>
            <h1 class="hero-title"><?php echo e($header->title ?? __('ui.program_pelatihan')); ?></h1>
            <p class="hero-subtitle">
                <?php echo e($header->excerpt ?? 'Program pelatihan untuk masyarakat dan industri di bidang kulit, karet, dan plastik'); ?>

            </p>
            <div class="hero-buttons">
                <a href="<?php echo e(route('kontak')); ?>" class="btn-hero-secondary">
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

    
    <section class="section-content">
        <div class="container">
            
            
            <div class="content-intro">
                <div class="content-intro__icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="content-intro__text">
                    <h2><?php echo e(__('ui.tentang_pelatihan')); ?></h2>
                    <p><?php echo e($header->content ?? 'UPPM Politeknik ATK Yogyakarta menyelenggarakan berbagai program pelatihan untuk meningkatkan kompetensi masyarakat dan pelaku industri di bidang kulit, karet, dan plastik. Program ini dirancang untuk memenuhi kebutuhan industri dan mendukung pengembangan UMKM.'); ?></p>
                </div>
            </div>

            
            <div class="pelatihan-section">
                <div class="section-header text-center">
                    <span class="section-badge"><?php echo e(__('ui.jenis_pelatihan')); ?></span>
                    <h3 class="section-title text-center"><?php echo e(__('ui.jenis_pelatihan')); ?></h3>
                    <p class="section-subtitle text-center"><?php echo e(__('ui.jenis_pelatihan_desc')); ?></p>
                </div>
                <div class="pelatihan-grid">
                    <?php $__empty_1 = true; $__currentLoopData = $pelatihan ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="pelatihan-card">
                            <?php if($item->image_url): ?>
                                <div class="pelatihan-card__image">
                                    <img src="<?php echo e($item->image_url); ?>" alt="<?php echo e($item->title); ?>" loading="lazy">
                                </div>
                            <?php endif; ?>
                            <div class="pelatihan-card__icon">
                                <i class="fas fa-<?php echo e($item->icon ?? 'graduation-cap'); ?>"></i>
                            </div>
                            <div class="pelatihan-card__content">
                                <h4 class="pelatihan-card__title"><?php echo e($item->title); ?></h4>
                                <p class="pelatihan-card__desc"><?php echo e($item->excerpt ?? 'Deskripsi pelatihan akan ditampilkan di sini.'); ?></p>
                                <a href="<?php echo e($item->file_url ?? '#'); ?>" class="pelatihan-card__link" target="_blank" rel="noopener noreferrer">
                                    <?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <div class="pelatihan-card">
                            <div class="pelatihan-card__icon">
                                <i class="fas fa-cut"></i>
                            </div>
                            <div class="pelatihan-card__content">
                                <h4 class="pelatihan-card__title">Pelatihan Pengolahan Kulit</h4>
                                <p class="pelatihan-card__desc">Teknik pengolahan kulit dari bahan baku hingga produk jadi.</p>
                                <a href="#" class="pelatihan-card__link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="pelatihan-card">
                            <div class="pelatihan-card__icon">
                                <i class="fas fa-industry"></i>
                            </div>
                            <div class="pelatihan-card__content">
                                <h4 class="pelatihan-card__title">Pelatihan Teknologi Karet</h4>
                                <p class="pelatihan-card__desc">Pengolahan dan pemanfaatan karet untuk berbagai produk industri.</p>
                                <a href="#" class="pelatihan-card__link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="pelatihan-card">
                            <div class="pelatihan-card__icon">
                                <i class="fas fa-flask"></i>
                            </div>
                            <div class="pelatihan-card__content">
                                <h4 class="pelatihan-card__title">Pelatihan Quality Control</h4>
                                <p class="pelatihan-card__desc">Pengendalian mutu dan standar kualitas produk.</p>
                                <a href="#" class="pelatihan-card__link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/frontend/pengabdian/pelatihan.blade.php ENDPATH**/ ?>