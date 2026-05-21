


<?php $__env->startSection('title', __('ui.liputan_berita') . ' - UPPM Politeknik ATK'); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pengabdian.css'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pages/berita.css'); ?>
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
                <span><?php echo e(__('ui.liputan_media')); ?></span>
            </div>
            <h1 class="hero-title"><?php echo e($header->title ?? __('ui.liputan_berita')); ?></h1>
            <p class="hero-subtitle">
                <?php echo e($header->excerpt ?? __('ui.liputan_berita_desc')); ?>

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

    
    <section class="section-content">
        <div class="container">

            
            <?php if($beritas->count() > 0): ?>
            <div class="berita-featured">
                <?php $featured = $beritas->first(); ?>
                <div class="berita-featured__image">
                    <img src="<?php echo e($featured->image_url ?? asset('images/placeholder-news.jpg')); ?>" alt="<?php echo e($featured->title); ?>">
                    <span class="berita-featured__badge"><?php echo e(__('ui.terbaru')); ?></span>
                </div>
                <div class="berita-featured__content">
                    <span class="berita-featured__date"><?php echo e($featured->created_at->format('d F Y')); ?></span>
                    <h2 class="berita-featured__title"><?php echo e($featured->title); ?></h2>
                    <p class="berita-featured__excerpt"><?php echo e(Str::limit(strip_tags($featured->content), 200)); ?></p>
                    <a href="<?php echo e(route('dokumen.berita.detail', $featured->slug)); ?>" class="berita-featured__link">
                        <?php echo e(__('ui.baca_selengkapnya')); ?>

                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endif; ?>

            
            <div class="berita-grid">
                <?php $__currentLoopData = $beritas->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="berita-card">
                    <div class="berita-card__image">
                        <img src="<?php echo e($berita->image_url ?? asset('images/placeholder-news.jpg')); ?>" alt="<?php echo e($berita->title); ?>">
                    </div>
                    <div class="berita-card__content">
                        <span class="berita-card__date"><?php echo e($berita->created_at->format('d M Y')); ?></span>
                        <h3 class="berita-card__title"><?php echo e(Str::limit($berita->title, 60)); ?></h3>
                        <p class="berita-card__excerpt"><?php echo e(Str::limit(strip_tags($berita->content), 100)); ?></p>
                        <a href="<?php echo e(route('dokumen.berita.detail', $berita->slug)); ?>" class="berita-card__link">
                            <?php echo e(__('ui.baca_selengkapnya')); ?> â†’
                        </a>
                    </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            
            <?php if($beritas->hasPages()): ?>
            <div class="berita-pagination">
                <?php echo e($beritas->links()); ?>

            </div>
            <?php endif; ?>

            
            <?php if($beritas->count() == 0): ?>
            <div class="berita-empty">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <h3><?php echo e(__('ui.belum_ada_berita')); ?></h3>
                <p><?php echo e(__('ui.berita_segera_ditambahkan')); ?></p>
            </div>
            <?php endif; ?>

        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/frontend/dokumen/berita.blade.php ENDPATH**/ ?>