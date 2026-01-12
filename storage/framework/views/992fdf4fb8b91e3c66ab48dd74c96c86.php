
<?php $__env->startSection('title', 'Pilih Kategori'); ?>
<?php $__env->startSection('page_title', 'Kelola Konten Website'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="max-w-7xl mx-auto">
    
    <!-- MAPPING ROUTE: Agar tombol kartu mengarah ke route yang benar -->
    <?php
        $routeMap = [
            'profil' => 'admin.konten.manage.profile',
            'penelitian' => 'admin.konten.manage.penelitian',
            'pengabdian' => 'admin.konten.manage.pengabdian',
            'publikasi' => 'admin.konten.manage.publikasi',
            'kkn' => 'admin.konten.manage.kkn',
        ];
    ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            
            <?php if(in_array($key, ['profil', 'penelitian', 'pengabdian', 'publikasi', 'kkn'])): ?>
            
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex flex-col items-center justify-center text-center hover:shadow-xl hover:border-indigo-400 transition-all group">
                    
                    <div class="w-16 h-16 <?php echo e(in_array($key, ['profil']) ? 'bg-blue-50 text-blue-600' : ($key == 'penelitian' ? 'bg-teal-50 text-teal-600' : ($key == 'pengabdian' ? 'bg-orange-50 text-orange-600' : ($key == 'publikasi' ? 'bg-purple-50 text-purple-600' : 'bg-pink-50 text-pink-600')))); ?> rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    
                    <h3 class="text-xl font-bold text-slate-800 mb-2"><?php echo e($label); ?></h3>
                    <p class="text-sm text-slate-500 mb-6">Kelola data di bagian <?php echo e($label); ?></p>
                    
                    
                    <a href="<?php echo e(route($routeMap[$key])); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg text-sm font-medium w-full">
                        Masuk Folder
                    </a>
                </div>
            
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/admin/konten/index.blade.php ENDPATH**/ ?>