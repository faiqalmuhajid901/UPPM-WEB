
<?php $__env->startSection('title', 'Edit Konten'); ?>

<?php $__env->startSection('admin_content'); ?>
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-8">
        <h2 class="text-2xl font-bold text-slate-800 mb-6">Edit Konten</h2>

        <form method="POST" action="<?php echo e(route('admin.konten.update', $content->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Judul Konten</label>
                    <input type="text" name="title" value="<?php echo e(old('title', $content->title)); ?>" class="w-full rounded-md border-slate-300 shadow-sm focus:ring focus:ring-indigo-500 border-slate-300">
                </div>

                <!-- Kategori (Section Key) -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Kategori</label>
                    <select name="section_key" class="w-full rounded-md border-slate-300 shadow-sm focus:ring focus:ring-indigo-500 border-slate-300">
                        <?php $__currentLoopData = [
                            'profil' => 'Profile Umum',
                            'penelitian' => 'Penelitian',
                            'pengabdian' => 'Pengabdian',
                            'publikasi' => 'Publikasi',
                            'kkn' => 'KKN',
                            'profil_tentang' => 'Profil - Tentang',
                            'profil_visi' => 'Profil - Visi Misi',
                            'profil_struktur' => 'Profil - Struktur',
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>" <?php echo e($content->section_key === $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

            </div>

            <!-- Deskripsi -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-slate-700 mb-2">Deskripsi</label>
                <textarea 
                    name="description" 
                    rows="5" 
                    class="block w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                ><?php echo e(old('description', $content->description)); ?></textarea>
                
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-xs"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <!-- Gambar -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-slate-700 mb-2">Gambar</label>
                <?php if($content->image): ?>
                    <div class="mb-2">
                        <img src="<?php echo e(asset('storage/' . $content->image)); ?>" class="h-32 w-auto rounded border">
                        <input type="checkbox" name="remove_image" id="remove_image" class="mr-2">
                        <label for="remove_image" class="text-sm text-red-600">Hapus gambar lama?</label>
                    </div>
                <?php endif; ?>
                <input type="file" name="image" class="w-full text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            <div class="mt-8 flex justify-end">
                <a href="<?php echo e(route('admin.konten.index')); ?>" class="mr-4 px-4 py-2 bg-white text-slate-700 border border-slate-300 rounded-lg text-sm font-medium hover:bg-slate-50">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-lg text-sm shadow-sm transition-colors">
                    Update Konten
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/admin/konten/edit.blade.php ENDPATH**/ ?>