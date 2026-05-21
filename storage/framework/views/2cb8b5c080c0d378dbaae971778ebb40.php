
<?php
    $description = $item->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($item->content ?? ''), 120);
    $publishedDate = optional($item->created_at)->format('d M Y');
    $fileUrl = $item->file_url ?? null;
?>

<article class="research-card <?php echo e($type); ?>" data-category="<?php echo e($type); ?>" data-animation-delay="<?php echo e($index * 100); ?>">
    <div class="card-image-wrapper">
        <?php if($item->image): ?>
            <img
                src="<?php echo e($item->image_url); ?>"
                alt="<?php echo e($item->title); ?>"
                class="card-image"
                loading="lazy"
            >
        <?php else: ?>
            <div class="card-image-placeholder <?php echo e($type); ?>">
                <i class="fas fa-file-alt text-4xl"></i>
            </div>
        <?php endif; ?>

        <div class="card-overlay"></div>
        <span class="card-badge <?php echo e($type); ?>"><?php echo e(ucfirst($type)); ?></span>

        <?php if($fileUrl): ?>
            <div class="card-actions">
                <a
                    href="<?php echo e($fileUrl); ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="action-btn download"
                    title="Unduh Dokumen"
                >
                    <i class="fas fa-download"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div class="card-content">
        <h3 class="card-title"><?php echo e($item->title); ?></h3>
        <?php if($description): ?>
            <p class="card-description"><?php echo e($description); ?></p>
        <?php endif; ?>

        <div class="card-meta">
            <?php if($publishedDate): ?>
                <div class="meta-item">
                    <i class="fas fa-calendar-alt"></i>
                    <span><?php echo e($publishedDate); ?></span>
                </div>
            <?php endif; ?>
            <?php if($fileUrl): ?>
                <div class="meta-item">
                    <i class="fas fa-file-download"></i>
                    <span>Dokumen tersedia</span>
                </div>
            <?php endif; ?>
        </div>

        <?php if($fileUrl): ?>
            <div class="card-footer">
                <a href="<?php echo e($fileUrl); ?>" target="_blank" rel="noopener noreferrer" class="card-link <?php echo e($type); ?>">
                    <span>Unduh Dokumen</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    </div>
</article>
<?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\frontend\penelitian\card.blade.php ENDPATH**/ ?>