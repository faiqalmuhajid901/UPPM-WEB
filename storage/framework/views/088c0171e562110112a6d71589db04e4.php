<?php $__env->startSection('title', __('ui.publikasi_page_title')); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4"><?php echo e(__('ui.publikasi_page_title')); ?></h1>
        <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
    </div>

    <?php
        $items = $publikasis ?? $contents ?? collect();
    ?>

    <?php if($items->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title = $item->judul ?? $item->title ?? __('ui.publikasi_page_title');
                    $summary = $item->abstrak ?? $item->excerpt ?? $item->description ?? '';
                    $image = $item->image ?? null;
                    $imageUrl = $item->image_url ?? (!empty($image) ? asset('storage/' . $image) : null);
                    $fileUrl = $item->file_url ?? (!empty($item->file) ? asset('storage/' . $item->file) : null);
                    $externalUrl = $item->url ?? null;
                    $actionUrl = $externalUrl ?: $fileUrl ?: '#';
                ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                    <?php if($imageUrl): ?>
                        <div class="relative h-48 overflow-hidden">
                            <img src="<?php echo e($imageUrl); ?>" alt="<?php echo e($title); ?>" class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                        </div>
                    <?php else: ?>
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400"><?php echo e(__('ui.no_image')); ?></div>
                    <?php endif; ?>
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-xl font-bold text-gray-800 mb-3"><?php echo e($title); ?></h3>
                        <p class="text-gray-600 text-sm mb-4 flex-1"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($summary), 100)); ?></p>
                        <a href="<?php echo e($actionUrl); ?>" class="text-teal-600 font-semibold text-sm hover:text-teal-800 mt-auto" <?php if($actionUrl !== '#'): ?> target="_blank" rel="noopener" <?php endif; ?>>
                            <?php echo e(__('ui.view_publication')); ?> &rarr;
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center py-12 bg-gray-50 rounded-lg border border-dashed border-gray-300">
            <p class="text-gray-500 italic"><?php echo e(__('ui.empty_publikasi')); ?></p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\frontend\publikasi.blade.php ENDPATH**/ ?>