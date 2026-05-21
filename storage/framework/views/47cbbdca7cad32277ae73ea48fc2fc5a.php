
<?php $__env->startSection('title', __('ui.struktur_page_title')); ?>

<?php $__env->startSection('content'); ?>
<section class="pengabdian-hero <?php if($header && $header->image_url): ?> has-dynamic-bg <?php endif; ?>" <?php if($header && $header->image_url): ?> data-bg-image="<?php echo e($header->image_url); ?>" <?php endif; ?>>
    <?php if($header && $header->image_url): ?>
        <div class="hero-overlay hero-overlay--dark"></div>
    <?php else: ?>
        <div class="hero-overlay"></div>
        <div class="hero-pattern"></div>
    <?php endif; ?>

    <div class="hero-content">
        <div class="hero-badge">
            <i class="fas fa-sitemap"></i>
            <span><?php echo e(__('ui.tim_uppm')); ?></span>
        </div>
        <h1 class="hero-title"><?php echo e($header?->title ?? __('navbar.struktur_organisasi')); ?></h1>
        <p class="hero-subtitle">
            <?php echo e($header?->excerpt ?? __('ui.struktur_default_desc')); ?>

        </p>
    </div>

    <div class="hero-scroll-indicator">
        <span><?php echo e(__('ui.scroll')); ?></span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<section class="bg-slate-50 py-16">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <?php if($strukturItems->isNotEmpty()): ?>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                <?php $__currentLoopData = $strukturItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="rounded-2xl border border-slate-100 bg-white p-6 text-center shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
                        <?php if($item->image): ?>
                            <img src="<?php echo e($item->image_url); ?>" alt="<?php echo e($item->title); ?>" class="mx-auto h-28 w-28 rounded-full object-cover ring-4 ring-teal-100 md:h-32 md:w-32">
                        <?php else: ?>
                            <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-gradient-to-br from-teal-100 to-blue-100 ring-4 ring-teal-50 md:h-32 md:w-32">
                                <span class="text-3xl font-bold text-teal-700"><?php echo e(strtoupper(substr($item->title, 0, 1))); ?></span>
                            </div>
                        <?php endif; ?>

                        <h2 class="mt-5 text-lg font-bold text-slate-900"><?php echo e($item->title); ?></h2>

                        <?php if($item->excerpt): ?>
                            <p class="mt-1 font-medium text-teal-600"><?php echo e($item->excerpt); ?></p>
                        <?php endif; ?>

                        <?php if($item->content): ?>
                            <p class="mt-3 text-sm leading-relaxed text-slate-600">
                                <?php echo e(\Illuminate\Support\Str::limit(strip_tags($item->content), 110)); ?>

                            </p>
                        <?php endif; ?>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="rounded-2xl border-2 border-dashed border-slate-300 bg-white px-6 py-14 text-center">
                <p class="text-lg font-semibold text-slate-700"><?php echo e(__('ui.empty_struktur')); ?></p>
                <p class="mt-2 text-slate-500"><?php echo e(__('ui.empty_struktur_desc')); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\frontend\struktur-organisasi.blade.php ENDPATH**/ ?>