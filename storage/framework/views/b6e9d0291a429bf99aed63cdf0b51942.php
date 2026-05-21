<?php $__env->startSection('title', 'Dashboard User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-12 max-w-4xl">
    
    <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
        <div class="bg-teal-600 px-6 py-4">
            <h1 class="text-2xl font-bold text-white">Dashboard User</h1>
        </div>
        
        <div class="p-8 text-center">
            <div class="mb-6">
                <p class="text-lg text-gray-600">Selamat datang,</p>
                <h2 class="text-3xl font-bold text-gray-900 mt-2"><?php echo e(auth()->user()->name); ?></h2>
                <p class="text-teal-600 font-semibold mt-1"><?php echo e(\Illuminate\Support\Str::title(auth()->user()->role)); ?></p>
            </div>

            <p class="text-gray-500 mb-8">
                Anda berhasil masuk ke sistem UPPM.
            </p>

            
            <?php if(auth()->user()->role === 'super_admin' || auth()->user()->role === 'admin'): ?>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="inline-block px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg shadow-md">
                    Masuk ke Admin Panel
                </a>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\_backup\dashboard.blade.php ENDPATH**/ ?>