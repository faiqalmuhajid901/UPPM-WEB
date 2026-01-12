
<?php $__env->startSection('title', 'Kelola Konten'); ?>
<?php $__env->startSection('page_title', 'Kelola Konten'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        
        <!-- Tombol Kembali -->
        <div class="mb-6">
            <a href="<?php echo e(route('admin.konten.index')); ?>" class="text-slate-500 hover:text-slate-700 flex items-center text-sm">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7l18-18-7 7-7-7 7"></path></svg>
                Kembali ke Menu Utama
            </a>
        </div>

        <!-- Judul & Tombol Tambah (Menggunakan variable $title dan $color) -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-bold text-slate-800"><?php echo e($title); ?></h3>
            
            
            
            
            <a href="<?php echo e(route('admin.konten.create', ['section' => $category])); ?>" class="bg-<?php echo e($color ?? 'blue'); ?>-600 hover:bg-<?php echo e($color ?? 'blue'); ?>-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Tambah Konten
            </a>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Judul</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase">Kunci (Section)</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-slate-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <?php if($contents->count() > 0): ?>
                        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-700"><?php echo e($item->title); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-xs bg-<?php echo e($color ?? 'blue'); ?>-100 text-<?php echo e($color ?? 'blue'); ?>-700 rounded px-2 py-1 inline-block w-32 text-center"><?php echo e($item->section_key); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                <a href="<?php echo e(route('admin.konten.edit', $item->id)); ?>" class="text-indigo-600 hover:text-indigo-800 mr-3">Edit</a>
                                <form method="POST" action="<?php echo e(route('admin.konten.destroy', $item->id)); ?>" class="inline-block">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-slate-400">Belum ada data di bagian ini.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/admin/konten/list.blade.php ENDPATH**/ ?>