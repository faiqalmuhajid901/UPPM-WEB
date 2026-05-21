<?php $__env->startSection('title', 'Kelola Konten'); ?>

<?php $__env->startPush('styles'); ?>
    
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 py-6">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Kelola Konten</h1>
            <p class="page-subtitle">Pilih section untuk mengelola konten</p>
        </div>
    </div>

    <!-- Stats Bar -->
    <div class="stats-bar">
        <div class="stat-item">
            <div class="stat-value"><?php echo e(collect($sections)->sum('count')); ?></div>
            <div class="stat-label">Total Konten</div>
        </div>
        <div class="stat-item">
            <div class="stat-value"><?php echo e(count($sections)); ?></div>
            <div class="stat-label">Section</div>
        </div>
        <div class="stat-item">
            <div class="stat-value"><?php echo e(collect($sections)->sum(fn($s) => count($s['categories'] ?? []))); ?></div>
            <div class="stat-label">Kategori</div>
        </div>
    </div>

    <!-- Section Cards -->
    <div class="section-cards">
        <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('admin.content.section', $section['slug'] ?? $key)); ?>" class="section-card <?php echo e($section['color'] ?? 'blue'); ?>">
            <div class="card-header">
                <div class="card-icon <?php echo e($section['color'] ?? 'blue'); ?>">
                    <i class="fas <?php echo e($section['icon'] ?? 'fa-file'); ?>"></i>
                </div>
                <div class="card-count"><?php echo e($section['count'] ?? 0); ?></div>
            </div>
            
            <h3 class="card-title"><?php echo e($section['name'] ?? $key); ?></h3>
            <p class="card-description"><?php echo e($section['description'] ?? ''); ?></p>
            
            <div class="card-tags">
                <?php $__currentLoopData = ($section['categories'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catKey => $catConfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        // Handle both array and string format
                        $catName = is_array($catConfig) ? ($catConfig['name'] ?? $catKey) : $catConfig;
                    ?>
                    <span class="card-tag"><?php echo e($catName); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php
                    $sectionSlug = $section['slug'] ?? $key;
                ?>

                <?php if($sectionSlug === 'dokumen'): ?>
                    
                    <span class="card-tag">SK &amp; Peraturan</span>
                    <span class="card-tag">Panduan</span>
                    <span class="card-tag">Template</span>
                    <span class="card-tag">Laporan</span>
                <?php endif; ?>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\uppm-web\resources\views/admin/konten/index.blade.php ENDPATH**/ ?>