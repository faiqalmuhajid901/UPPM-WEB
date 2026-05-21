
<table class="content-table">
    <thead>
        <tr>
            <th>KONTEN</th>
            <th>KATEGORI</th>
            <th>STATUS</th>
            <th>TANGGAL</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody id="content-tbody">
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr data-id="<?php echo e($content->id); ?>" data-category="<?php echo e($content->category); ?>">
            <td data-label="Konten">
                <div class="content-info">
                    <?php if($content->image): ?>
                        <img src="<?php echo e($content->image_url); ?>" 
                             alt="<?php echo e($content->title); ?>" 
                             class="content-thumb">
                    <?php else: ?>
                        <div class="content-thumb-placeholder">
                            <i class="fas fa-image"></i>
                        </div>
                    <?php endif; ?>
                    <div class="content-details">
                        <h4 class="content-title-cell"><?php echo e($content->title); ?></h4>
                        <?php if($content->excerpt): ?>
                            <p><?php echo e(Str::limit($content->excerpt, 50)); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </td>
            <td data-label="Kategori">
                <?php
                    $categoryName = $content->category;
                    if (isset($sectionConfig['categories'][$content->category])) {
                        $catConfig = $sectionConfig['categories'][$content->category];
                        $categoryName = is_array($catConfig) ? ($catConfig['name'] ?? $content->category) : $catConfig;
                    }
                ?>
                <span class="badge badge-category"><?php echo e($categoryName); ?></span>
            </td>
            <td data-label="Status">
                <?php if($content->is_published): ?>
                    <span class="badge badge-published">
                        <i class="fas fa-check-circle"></i> Published
                    </span>
                <?php else: ?>
                    <span class="badge badge-draft">
                        <i class="fas fa-clock"></i> Draft
                    </span>
                <?php endif; ?>
            </td>
            <td data-label="Tanggal"><?php echo e($content->created_at->format('d M Y')); ?></td>
            <td data-label="Aksi">
                <div class="action-buttons">
                    
                    <button type="button" 
                            class="btn-action btn-edit" 
                            data-id="<?php echo e($content->id); ?>"
                            data-title="<?php echo e($content->title); ?>"
                            title="Edit">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button type="button" 
                            class="btn-action btn-delete" 
                            data-id="<?php echo e($content->id); ?>"
                            data-title="<?php echo e($content->title); ?>"
                            title="Hapus">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/admin/konten/partials/table.blade.php ENDPATH**/ ?>