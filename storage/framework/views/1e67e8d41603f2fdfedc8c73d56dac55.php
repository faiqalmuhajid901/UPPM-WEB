


<?php $__env->startSection('title', $berita->title . ' - UPPM Politeknik ATK'); ?>

<?php $__env->startSection('content'); ?>
<main class="berita-detail-page">
    
    
    
    
    <header class="article-header">
        <div class="container">
            <nav class="article-breadcrumb">
                <a href="<?php echo e(route('home')); ?>"><?php echo e(__('ui.beranda')); ?></a>
                <span>/</span>
                <a href="<?php echo e(route('dokumen.berita')); ?>"><?php echo e(__('ui.liputan_berita')); ?></a>
                <span>/</span>
                <span><?php echo e(Str::limit($berita->title, 30)); ?></span>
            </nav>
            <h1 class="article-title"><?php echo e($berita->title); ?></h1>
            <div class="article-meta">
                <span class="article-meta__date">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <?php echo e($berita->created_at->format('d F Y')); ?>

                </span>
                <?php if($berita->meta['author'] ?? null): ?>
                <span class="article-meta__author">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <?php echo e($berita->meta['author']); ?>

                </span>
                <?php endif; ?>
            </div>
        </div>
    </header>

    
    
    
    <?php if($berita->image): ?>
    <div class="article-image">
        <div class="container">
            <img src="<?php echo e($berita->image_url); ?>" alt="<?php echo e($berita->title); ?>">
        </div>
    </div>
    <?php endif; ?>

    
    
    
    <article class="article-content">
        <div class="container">
            <div class="article-body">
                <?php echo $berita->content; ?>

            </div>

            
            <div class="article-share">
                <span class="article-share__label"><?php echo e(__('ui.bagikan')); ?></span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(request()->url())); ?>" target="_blank" class="article-share__btn article-share__btn--facebook">
                    <svg fill="currentColor" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
                </a>
                <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(request()->url())); ?>&text=<?php echo e(urlencode($berita->title)); ?>" target="_blank" class="article-share__btn article-share__btn--twitter">
                    <svg fill="currentColor" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
                </a>
                <a href="https://wa.me/?text=<?php echo e(urlencode($berita->title . ' ' . request()->url())); ?>" target="_blank" class="article-share__btn article-share__btn--whatsapp">
                    <svg fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </a>
            </div>
        </div>
    </article>

    
    
    
    <?php if($relatedNews->count() > 0): ?>
    <section class="related-news">
        <div class="container">
            <h2 class="related-news__title"><?php echo e(__('ui.berita_terkait')); ?></h2>
            <div class="related-news__grid">
                <?php $__currentLoopData = $relatedNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="berita-card berita-card--small">
                    <div class="berita-card__image">
                        <img src="<?php echo e($news->image_url ?? asset('images/placeholder-news.jpg')); ?>" alt="<?php echo e($news->title); ?>">
                    </div>
                    <div class="berita-card__content">
                        <span class="berita-card__date"><?php echo e($news->created_at->format('d M Y')); ?></span>
                        <h3 class="berita-card__title"><?php echo e(Str::limit($news->title, 50)); ?></h3>
                        <a href="<?php echo e(route('dokumen.berita.detail', $news->slug)); ?>" class="berita-card__link">
                            <?php echo e(__('ui.baca')); ?> →
                        </a>
                    </div>
                </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    
    <div class="article-back">
        <div class="container">
            <a href="<?php echo e(route('dokumen.berita')); ?>" class="btn-back">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <?php echo e(__('ui.kembali_liputan_berita')); ?>

            </a>
        </div>
    </div>

</main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pages/berita-detail.css'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\frontend\dokumen\berita-detail.blade.php ENDPATH**/ ?>