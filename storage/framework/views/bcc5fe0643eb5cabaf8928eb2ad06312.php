<?php $__env->startSection('title', 'Edit Konten'); ?>
<?php $__env->startSection('page-title', 'Edit Konten'); ?>

<?php $__env->startSection('content'); ?>
<div class="form-page">
    
    
    <div class="breadcrumb-nav">
        <a href="<?php echo e(route('admin.content.index')); ?>">
            <i class="fas fa-folder-open"></i> Kelola Konten
        </a>
        <i class="fas fa-chevron-right"></i>
        <a href="<?php echo e(route('admin.content.category', [$section, $category])); ?>">
            <?php echo e($categoryInfo['name']); ?>

        </a>
        <i class="fas fa-chevron-right"></i>
        <span class="current">Edit Konten</span>
    </div>

    
    <div class="form-card">
        <div class="form-card-header">
            <h2><i class="fas fa-edit"></i> Edit Konten</h2>
            <p>Kategori: <strong><?php echo e($categoryInfo['name']); ?></strong></p>
        </div>

        <form action="<?php echo e(route('admin.content.update', $content->id)); ?>" 
              method="POST" 
              enctype="multipart/form-data"
              class="form-card-body">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <div class="form-group">
                <label for="title">Judul <span class="required">*</span></label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="<?php echo e(old('title', $content->title)); ?>"
                       class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       required>
                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="form-group">
                <label for="excerpt">Ringkasan</label>
                <textarea name="excerpt" 
                          id="excerpt" 
                          rows="2"
                          class="form-control <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e(old('excerpt', $content->excerpt)); ?></textarea>
                <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="form-group">
                <label for="content">Konten <span class="required">*</span></label>
                <textarea name="content" 
                          id="content" 
                          rows="10"
                          class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                          required><?php echo e(old('content', $content->content)); ?></textarea>
                <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="error-message"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <?php if($content->image): ?>
            <div class="form-group">
                <label>Gambar Saat Ini</label>
                <div class="current-file">
                    <img src="<?php echo e($content->image_url); ?>" alt="" class="preview-image">
                    <span><?php echo e(basename($content->image)); ?></span>
                </div>
            </div>
            <?php endif; ?>

            
            <div class="form-row">
                <div class="form-group">
                    <label for="image"><?php echo e($content->image ? 'Ganti Gambar' : 'Upload Gambar'); ?></label>
                    <div class="file-upload">
                        <input type="file" name="image" id="image" accept="image/*">
                        <div class="file-upload-label">
                            <i class="fas fa-image"></i>
                            <span>Pilih Gambar</span>
                            <small>JPG, PNG, GIF, WEBP (max 2MB)</small>
                        </div>
                    </div>
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="file"><?php echo e($content->file ? 'Ganti Dokumen' : 'Upload Dokumen'); ?></label>
                    <?php if($content->file): ?>
                    <div class="current-file">
                        <i class="fas fa-file-pdf"></i>
                        <span><?php echo e(basename($content->file)); ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="file-upload">
                        <input type="file" name="file" id="file" accept=".pdf,.doc,.docx,.xls,.xlsx">
                        <div class="file-upload-label">
                            <i class="fas fa-file-pdf"></i>
                            <span>Pilih Dokumen</span>
                            <small>PDF, DOC, XLS (max 10MB)</small>
                        </div>
                    </div>
                    <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            
            <div class="form-row">
                <div class="form-group">
                    <label for="order">Urutan</label>
                    <input type="number" 
                           name="order" 
                           id="order" 
                           value="<?php echo e(old('order', $content->order)); ?>"
                           class="form-control" 
                           min="0">
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <div class="form-switch">
                        <input type="hidden" name="is_published" value="0">
                        <input type="checkbox" 
                               name="is_published" 
                               id="is_published" 
                               value="1"
                               <?php echo e(old('is_published', $content->is_published) ? 'checked' : ''); ?>>
                        <label for="is_published">Publish</label>
                    </div>
                </div>
            </div>

            
            <div class="form-actions">
                <a href="<?php echo e(route('admin.content.category', [$section, $category])); ?>" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i>
                    Update Konten
                </button>
            </div>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\admin\konten\edit.blade.php ENDPATH**/ ?>