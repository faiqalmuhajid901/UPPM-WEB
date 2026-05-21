


<?php $__env->startSection('title', 'Kelola ' . ($sectionConfig['name'] ?? $section)); ?>

<?php $__env->startSection('content'); ?>
<div class="content-section-page">
    <!-- Breadcrumb -->
    <nav class="breadcrumb">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
            <i class="fas fa-home"></i>
        </a>
        <span>/</span>
        <a href="<?php echo e(route('admin.content.index')); ?>">Konten</a>
        <span>/</span>
        <span class="current"><?php echo e($sectionConfig['name'] ?? $section); ?></span>
    </nav>

    <!-- Section Header -->
    <div class="section-header">
        <div class="section-info">
            <div class="section-icon <?php echo e($sectionConfig['color'] ?? 'blue'); ?>">
                <i class="fas <?php echo e($sectionConfig['icon'] ?? 'fa-file'); ?>"></i>
            </div>
            <div>
                <h1 class="section-title"><?php echo e($sectionConfig['name'] ?? $section); ?></h1>
                <p class="section-subtitle"><?php echo e($sectionConfig['description'] ?? ''); ?></p>
            </div>
        </div>
        <button type="button" id="btn-tambah" class="btn-tambah">
            <i class="fas fa-plus"></i>
            Tambah Konten
        </button>
    </div>

    <!-- Category Tabs -->
    <div class="category-tabs">
        <button type="button" class="category-tab active" data-category="all">
            Semua <span class="count">(<?php echo e($contents->count()); ?>)</span>
        </button>
        <?php $__currentLoopData = ($sectionConfig['categories'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catKey => $catConfig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $catName = is_array($catConfig) ? ($catConfig['name'] ?? $catKey) : $catConfig;
                $catCount = $contents->where('category', $catKey)->count();
            ?>
            <button type="button" class="category-tab" data-category="<?php echo e($catKey); ?>">
                <?php echo e($catName); ?> <span class="count">(<?php echo e($catCount); ?>)</span>
            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Content Area -->
    <div class="content-area">
        <div class="content-header">
            <div>
                <span class="content-title">Daftar Konten</span>
                <span class="content-count" id="content-count">(<?php echo e($contents->count()); ?> item)</span>
            </div>
            <div class="content-actions">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="search-input" placeholder="Cari konten...">
                </div>
            </div>
        </div>

        <div class="content-body">
            <?php if($contents->isEmpty()): ?>
                <?php echo $__env->make('admin.konten.partials.empty', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php else: ?>
                <?php echo $__env->make('admin.konten.partials.table', ['contents' => $contents], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Modal Form - DI LUAR content-section-page -->
<?php echo $__env->make('admin.konten.partials.modal-form', ['sectionConfig' => $sectionConfig], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- Modal Delete - DI LUAR content-section-page -->
<?php echo $__env->make('admin.konten.partials.modal-delete', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php
    $categoriesData = [];
    foreach (($sectionConfig['categories'] ?? []) as $catKey => $catConfig) {
        if (is_array($catConfig)) {
            $categoriesData[] = [
                'key' => $catKey,
                'name' => $catConfig['name'] ?? $catKey,
                'has_image' => $catConfig['has_image'] ?? true,
                'has_file' => $catConfig['has_file'] ?? true,
                'has_icon' => $catConfig['has_icon'] ?? false,
                'subcategories' => $catConfig['subcategories'] ?? null,
            ];
        } else {
            $categoriesData[] = [
                'key' => $catKey,
                'name' => $catConfig,
                'has_image' => true,
                'has_file' => true,
                'has_icon' => false,
                'subcategories' => null,
            ];
        }
    }
?>

<div
    id="section-data"
    hidden
    data-section="<?php echo e($section); ?>"
    data-categories='<?php echo json_encode($categoriesData, 15, 512) ?>'
    data-csrf-token="<?php echo e(csrf_token()); ?>"
    data-admin-content-base-url="<?php echo e(url('admin/content')); ?>"
    data-storage-base-url="<?php echo e(asset('storage')); ?>"
></div>

<script>
    window.sectionData = {
        section: <?php echo json_encode($section, 15, 512) ?>,
        categories: <?php echo json_encode($categoriesData, 15, 512) ?>,
        csrfToken: <?php echo json_encode(csrf_token(), 15, 512) ?>,
        adminContentBaseUrl: <?php echo json_encode(url('admin/content'), 15, 512) ?>,
        storageBaseUrl: <?php echo json_encode(asset('storage'), 15, 512) ?>,
    };
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/modules/section-modal.css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/section-config.js'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/admin/content-section.js'); ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\admin\konten\section.blade.php ENDPATH**/ ?>