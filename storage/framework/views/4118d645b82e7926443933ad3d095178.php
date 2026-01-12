
<?php $__env->startSection('title', 'Profil Kampus'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-gray-900 mb-4">Profil Kampus</h1>
        <div class="w-24 h-1 bg-teal-500 mx-auto"></div>
    </div>

    
    <section id="tentang" class="mb-20 scroll-mt-20">
        <?php if(isset($contents['profil_tentang'])): ?>
            <?php $__currentLoopData = $contents['profil_tentang']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col md:flex-row">
                    <?php if($item->image): ?>
                        <div class="md:w-1/3">
                            <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->title); ?>" class="w-full h-64 md:h-auto object-cover">
                        </div>
                    <?php endif; ?>
                    <div class="p-8 md:w-2/3">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2 border-gray-100"><?php echo e($item->title); ?></h2>
                        <div class="prose text-gray-600 break-all">
                            <?php echo $item->description; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="bg-white p-12 rounded-xl shadow-sm border border-dashed border-gray-300 text-center">
                <p class="text-gray-400 italic">Belum ada konten untuk "Tentang UPPM".</p>
            </div>
        <?php endif; ?>
    </section>

    
    <section id="visi-misi" class="mb-20 scroll-mt-20">
        <?php if(isset($contents['profil_visi'])): ?>
            <?php $__currentLoopData = $contents['profil_visi']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-md p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2 border-gray-100 flex items-center">
                        <svg class="w-6 h-6 text-teal-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        <?php echo e($item->title); ?>

                    </h2>
                    <div class="prose max-w-none text-gray-600 break-all white-pre-wrap">
                        <?php echo $item->description; ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="bg-white p-12 rounded-xl shadow-sm border border-dashed border-gray-300 text-center">
                <p class="text-gray-400 italic">Belum ada konten untuk "Visi & Misi".</p>
            </div>
        <?php endif; ?>
    </section>

    
    <section id="struktur" class="scroll-mt-20">
        <?php if(isset($contents['profil_struktur'])): ?>
            <?php $__currentLoopData = $contents['profil_struktur']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-xl shadow-md p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2 border-gray-100 flex items-center">
                        <svg class="w-6 h-6 text-teal-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1"></path></svg>
                        <?php echo e($item->title); ?>

                    </h2>
                    <?php if($item->image): ?>
                        <div class="my-6">
                            <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="Struktur" class="mx-auto rounded-lg shadow-sm">
                        </div>
                    <?php endif; ?>
                    <div class="prose max-w-none text-gray-600 break-all white-pre-wrap">
                        <?php echo $item->description; ?>

                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="bg-white p-12 rounded-xl shadow-sm border border-dashed border-gray-300 text-center">
                <p class="text-gray-400 italic">Belum ada konten untuk "Struktur Organisasi".</p>
            </div>
        <?php endif; ?>
    </section>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/frontend/profil-kampus.blade.php ENDPATH**/ ?>