

<?php $__env->startSection('title', 'Dashboard Admin'); ?>
<?php $__env->startSection('page_title', 'Dashboard Admin'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="max-w-7xl mx-auto">
    
    <!-- Banner Sambutan -->
    <div class="bg-gradient-to-r from-slate-800 to-slate-900 rounded-xl p-6 text-white mb-8 shadow-lg">
        <h1 class="text-2xl font-bold">Halo, <?php echo e(auth()->user()->name); ?>!</h1>
        <p class="text-slate-300 mt-1">Anda login sebagai <span class="font-semibold text-indigo-400"><?php echo e(\Illuminate\Support\Str::title(auth()->user()->role)); ?></span>.</p>
    </div>

    <!-- Statistik Singkat -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card 1: User -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center hover:shadow-md transition-shadow">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Total User</p>
                <h3 class="text-2xl font-bold text-slate-800"><?php echo e(\App\Models\User::count()); ?></h3>
            </div>
        </div>

        <!-- Card 2: Konten -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center hover:shadow-md transition-shadow">
            <div class="p-3 rounded-full bg-teal-100 text-teal-600 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Total Konten</p>
                <h3 class="text-2xl font-bold text-slate-800"><?php echo e(\App\Models\WebContent::count()); ?></h3>
            </div>
        </div>

        <!-- Card 3: Status -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 flex items-center hover:shadow-md transition-shadow">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Status Server</p>
                <h3 class="text-2xl font-bold text-slate-800">Online</h3>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
            <h3 class="text-lg font-bold text-slate-800 mb-2">Selamat Datang di Admin Panel UPPM</h3>
            <p class="text-slate-500">Gunakan menu di sebelah kiri untuk mengelola konten website atau data pengguna.</p>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>