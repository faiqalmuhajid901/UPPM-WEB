

<?php $__env->startSection('title', $categoryInfo['name']); ?>
<?php $__env->startSection('page-title', $categoryInfo['name']); ?>

<?php $__env->startSection('content'); ?>
<div class="category-management">
    
    
    <div class="breadcrumb-nav">
        <a href="<?php echo e(route('admin.content.index')); ?>">
            <i class="fas fa-folder-open"></i> Kelola Konten
        </a>
        <i class="fas fa-chevron-right"></i>
        <span><?php echo e($sectionInfo['name']); ?></span>
        <i class="fas fa-chevron-right"></i>
        <span class="current"><?php echo e($categoryInfo['name']); ?></span>
    </div>

    
    <div class="category-header">
        <div class="category-header-info">
            <h2><?php echo e($categoryInfo['name']); ?></h2>
            <p>Section: <?php echo e($sectionInfo['name']); ?> â€¢ Total <?php echo e($contents->total()); ?> konten</p>
        </div>
        <a href="<?php echo e(route('admin.content.create', [$section, $category])); ?>" class="btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Konten
        </a>
    </div>

    
    <?php if(session('success')): ?>
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>

    
    <div class="content-table-wrapper">
        <?php if($contents->count() > 0): ?>
        <table class="content-table">
            <thead>
                <tr>
                    <th width="50">#</th>
                    <th>Judul</th>
                    <th width="120">Status</th>
                    <th width="150">Tanggal</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center" data-label="No"><?php echo e($contents->firstItem() + $index); ?></td>
                    <td data-label="Judul">
                        <div class="content-title-cell">
                            <?php if($content->image): ?>
                            <img src="<?php echo e($content->image_url); ?>" alt="" class="content-thumb">
                            <?php else: ?>
                            <div class="content-thumb-placeholder">
                                <i class="fas fa-image"></i>
                            </div>
                            <?php endif; ?>
                            <div>
                                <p class="content-title"><?php echo e($content->title); ?></p>
                                <?php if($content->excerpt): ?>
                                <p class="content-excerpt"><?php echo e(Str::limit($content->excerpt, 60)); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                    <td data-label="Status">
                        <?php if($content->is_published): ?>
                        <span class="badge badge-success">
                            <i class="fas fa-check"></i> Published
                        </span>
                        <?php else: ?>
                        <span class="badge badge-warning">
                            <i class="fas fa-eye-slash"></i> Draft
                        </span>
                        <?php endif; ?>
                    </td>
                    <td data-label="Tanggal">
                        <span class="text-muted"><?php echo e($content->created_at->format('d M Y')); ?></span>
                    </td>
                    <td data-label="Aksi">
                        <div class="action-buttons">
                            <a href="<?php echo e(route('admin.content.edit', $content->id)); ?>" 
                               class="btn-icon btn-edit" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('admin.content.destroy', $content->id)); ?>" 
                                  method="POST" 
                                  data-confirm-message="Yakin ingin menghapus konten ini?">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn-icon btn-delete" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        
        <div class="pagination-wrapper">
            <?php echo e($contents->links()); ?>

        </div>

        <?php else: ?>
        
        <div class="empty-state">
            <div class="empty-icon">
                <i class="fas fa-folder-open"></i>
            </div>
            <h3>Belum ada konten</h3>
            <p>Mulai tambahkan konten untuk kategori <?php echo e($categoryInfo['name']); ?></p>
            <a href="<?php echo e(route('admin.content.create', [$section, $category])); ?>" class="btn-primary">
                <i class="fas fa-plus"></i>
                Tambah Konten Pertama
            </a>
        </div>
        <?php endif; ?>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\admin\konten\category.blade.php ENDPATH**/ ?>