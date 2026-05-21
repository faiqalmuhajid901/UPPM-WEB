    


<?php $__env->startSection('title', __('ui.panduan_pengabdian_title')); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pengabdian.css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="panduan-page">
    
    
    <section class="pengabdian-hero <?php if($header && $header->image_url): ?> has-dynamic-bg <?php endif; ?>" <?php if($header && $header->image_url): ?> data-bg-image="<?php echo e($header->image_url); ?>" <?php endif; ?>>
        <?php if($header && $header->image_url): ?>
        <div class="hero-overlay hero-overlay--dark"></div>
        <?php else: ?>
        <div class="hero-overlay"></div>
        <?php endif; ?>
        <?php if (! ($header && $header->image_url)): ?>
        <div class="hero-pattern"></div>
        <?php endif; ?>
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-book-open"></i>
                <span><?php echo e(__('ui.panduan_pengabdian_badge')); ?></span>
            </div>
            <div class="hero-buttons">
                <a href="#dokumen" class="btn-hero-primary">
                    <i class="fas fa-file-alt"></i>
                    <?php echo e(__('ui.lihat_dokumen')); ?>

                </a>
                <a href="<?php echo e(route('kontak')); ?>" class="btn-hero-secondary">
                    <i class="fas fa-envelope"></i>
                    <?php echo e(__('ui.contact_us')); ?>

                </a>
            </div>
        </div>
        <div class="hero-scroll-indicator">
            <span><?php echo e(__('ui.scroll')); ?></span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    
    <section class="section-content">
        <div class="container">


            
            <div id="dokumen" class="panduan-section">
                <div class="section-header section-header--left">
                    <span class="section-badge"><?php echo e(__('navbar.dokumen')); ?></span>
                    <h3 class="section-title"><?php echo e(__('ui.dokumen_panduan')); ?></h3>
                </div>
                
                <div class="panduan-grid">
                    <?php $__empty_1 = true; $__currentLoopData = $panduan ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-<?php echo e($item->icon ?? 'file-pdf'); ?>"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title"><?php echo e($item->title); ?></h4>
                                <p class="panduan-card__desc"><?php echo e($item->excerpt ?? 'Deskripsi dokumen akan ditampilkan di sini.'); ?></p>
                                <a href="<?php echo e($item->file_url ?? '#'); ?>" class="panduan-card__link" target="_blank" rel="noopener noreferrer">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">Panduan Umum Pengabdian</h4>
                                <p class="panduan-card__desc">Panduan lengkap tentang pelaksanaan pengabdian masyarakat di UPPM.</p>
                                <a href="#" class="panduan-card__link">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-file-word"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">Format Proposal Pengabdian</h4>
                                <p class="panduan-card__desc">Template dan format penulisan proposal pengabdian masyarakat.</p>
                                <a href="#" class="panduan-card__link">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">Pedoman Pelaksanaan</h4>
                                <p class="panduan-card__desc">Pedoman teknis pelaksanaan kegiatan pengabdian masyarakat.</p>
                                <a href="#" class="panduan-card__link">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                        <div class="panduan-card">
                            <div class="panduan-card__icon">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <div class="panduan-card__content">
                                <h4 class="panduan-card__title">Laporan Akhir</h4>
                                <p class="panduan-card__desc">Format dan pedoman penyusunan laporan akhir pengabdian.</p>
                                <a href="#" class="panduan-card__link">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="alur-section">
                <div class="section-header section-header--left">
                    <span class="section-badge"><?php echo e(__('ui.alur_prosedur')); ?></span>
                    <h3 class="section-title"><?php echo e(__('ui.alur_pengabdian')); ?></h3>
                </div>

                
                <div class="alur-timeline">
                    <div class="alur-step">
                        <div class="alur-step__number">1</div>
                        <div class="alur-step__content">
                            <h4>Pengajuan Proposal</h4>
                            <p>Mengajukan proposal pengabdian sesuai format yang telah ditentukan</p>
                        </div>
                    </div>
                    
                    <div class="alur-step">
                        <div class="alur-step__number">2</div>
                        <div class="alur-step__content">
                            <h4>Review & Evaluasi</h4>
                            <p>Proposal direview oleh tim UPPM untuk evaluasi kelayakan</p>
                        </div>
                    </div>
                    
                    <div class="alur-step">
                        <div class="alur-step__number">3</div>
                        <div class="alur-step__content">
                            <h4>Pelaksanaan</h4>
                            <p>Kegiatan pengabdian dilaksanakan sesuai rencana yang disetujui</p>
                        </div>
                    </div>
                    
                    <div class="alur-step">
                        <div class="alur-step__number">4</div>
                        <div class="alur-step__content">
                            <h4>Pelaporan</h4>
                            <p>Penyusunan dan pengumpulan laporan akhir kegiatan</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/frontend/pengabdian/panduan.blade.php ENDPATH**/ ?>