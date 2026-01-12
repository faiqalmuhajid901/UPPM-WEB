
<?php $__env->startSection('title', 'Kuliah Kerja Nyata'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Kuliah Kerja Nyata (KKN)</h1>
        <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
    </div>

    <?php if($contents->count() > 0): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <?php if($item->image): ?>
                        <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-full h-48 object-cover">
                    <?php else: ?>
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">Tidak ada gambar</div>
                    <?php endif; ?>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3"><?php echo e($item->title); ?></h3>
                        <p class="text-gray-600 text-sm"><?php echo e(\Illuminate\Support\Str::limit($item->description, 150)); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <div class="text-center py-12 bg-gray-100 rounded-lg">
            <p class="text-gray-500 italic">Belum ada data KKN yang ditampilkan.</p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/frontend/kkn.blade.php ENDPATH**/ ?>