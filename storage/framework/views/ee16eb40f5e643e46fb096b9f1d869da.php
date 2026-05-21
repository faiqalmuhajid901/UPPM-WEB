


<?php $__env->startSection('title', __('navbar.jurnal_ojs')); ?>

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
                <i class="fas fa-newspaper"></i>
                <span><?php echo e(__('ui.publikasi_label')); ?></span>
            </div>
            <h1 class="hero-title"><?php echo e($header->title ?? __('navbar.jurnal_ojs')); ?></h1>
            <p class="hero-subtitle">
                <?php echo e($header->excerpt ?? __('navbar.jurnal_ojs_desc')); ?>

            </p>
            <div class="hero-buttons">
                <a href="<?php echo e(route('publikasi')); ?>" class="btn-hero-primary">
                    <i class="fas fa-arrow-left"></i>
                    <?php echo e(__('ui.kembali_publikasi')); ?>

                </a>
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

            
            <div class="pelatihan-section">
                <div class="section-header text-center">
                    <span class="section-badge"><?php echo e(__('navbar.jurnal_ojs')); ?></span>
                    <h3 class="section-title text-center"><?php echo e(__('navbar.jurnal_ojs')); ?></h3>
                    <p class="section-subtitle text-center"><?php echo e(__('navbar.jurnal_ojs_desc')); ?></p>
                </div>

                <?php if($publikasis->count() > 0): ?>
                <div class="pelatihan-grid">
                    <?php $__currentLoopData = $publikasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="pelatihan-card">
                        <div class="pelatihan-card__icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="pelatihan-card__content">
                            <span class="section-badge section-badge--sm"><?php echo e(__('navbar.jurnal_ojs')); ?> - <?php echo e($item->created_at->format('Y')); ?></span>
                            <h4 class="pelatihan-card__title"><?php echo e($item->title); ?></h4>
                            <p class="pelatihan-card__desc"><?php echo e($item->excerpt ?? Str::limit(strip_tags($item->content), 150) ?? __('ui.tidak_ada_deskripsi')); ?></p>
                            <?php if($item->file_url): ?>
                            <a href="<?php echo e($item->file_url); ?>" class="pelatihan-card__link" target="_blank" rel="noopener noreferrer">
                                <?php echo e(__('ui.download_file')); ?> <i class="fas fa-download"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
                <div class="pagination-wrapper">
                    <?php echo e($publikasis->links()); ?>

                </div>
                <?php else: ?>
                
                <div class="empty-state">
                    <h3 class="empty-state__title"><?php echo e(__('ui.empty_publikasi')); ?></h3>
                    <p class="empty-state__text"><?php echo e(__('navbar.jurnal_ojs_desc')); ?></p>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\frontend\publikasi\jurnal-ojs.blade.php ENDPATH**/ ?>