


<?php $__env->startSection('title', __('ui.pelayanan_page_title')); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pengabdian.css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="pelayanan-page">
    
    
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
                <i class="fas fa-headset"></i>
                <span><?php echo e(__('ui.layanan_konsultasi')); ?></span>
            </div>
            <h1 class="hero-title"><?php echo e($header->title ?? __('ui.layanan_konsultasi')); ?></h1>
            <p class="hero-subtitle">
                <?php echo e($header->excerpt ?? __('ui.layanan_konsultasi_desc')); ?>

            </p>
            <div class="hero-buttons">
                <a href="#layanan" class="btn-hero-primary">
                    <i class="fas fa-list"></i>
                    <?php echo e(__('ui.lihat_layanan')); ?>

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
            
            
            <div class="content-intro">
                <div class="content-intro__icon">
                    <i class="fas fa-headset"></i>
                </div>
                <div class="content-intro__text">
                    <h2><?php echo e(__('ui.tentang_layanan')); ?></h2>
                    <p><?php echo e($header->content ?? 'UPPM Politeknik ATK Yogyakarta menyediakan berbagai layanan konsultasi dan pendampingan teknis untuk membantu industri dan UMKM dalam pengembangan produk, peningkatan kualitas, dan pemecahan masalah teknis di bidang kulit, karet, dan plastik.'); ?></p>
                </div>
            </div>

            
            <div id="layanan" class="layanan-section">
                <div class="section-header text-center">
                    <span class="section-badge"><?php echo e(__('ui.jenis_layanan')); ?></span>
                    <h3 class="section-title text-center"><?php echo e(__('ui.jenis_layanan')); ?></h3>
                    <p class="section-subtitle text-center"><?php echo e(__('ui.berbagai_layanan')); ?></p>
                </div>
                <div class="layanan-grid">
                    <?php $__empty_1 = true; $__currentLoopData = $layanans ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="layanan-card">
                            <?php if($layanan->image): ?>
                                <div class="layanan-card__image">
                                    <img src="<?php echo e($layanan->image_url ?? Storage::url($layanan->image)); ?>" alt="<?php echo e($layanan->title); ?>">
                                </div>
                            <?php endif; ?>
                            <div class="layanan-card__icon">
                                <i class="fas fa-<?php echo e($layanan->icon ?? 'hands-helping'); ?>"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title"><?php echo e($layanan->title); ?></h4>
                                <p class="layanan-card__desc"><?php echo e($layanan->description ?? 'Deskripsi layanan akan ditampilkan di sini.'); ?></p>
                                <a href="#" class="layanan-card__link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        
                        <div class="layanan-card">
                            <div class="layanan-card__icon">
                                <i class="fas fa-flask"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title"><?php echo e(__('ui.konsultasi_teknis')); ?></h4>
                                <p class="layanan-card__desc"><?php echo e(__('ui.konsultasi_teknis_desc')); ?></p>
                                <a href="#" class="layanan-card__link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="layanan-card">
                            <div class="layanan-card__icon">
                                <i class="fas fa-vial"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title"><?php echo e(__('ui.pengujian_lab')); ?></h4>
                                <p class="layanan-card__desc"><?php echo e(__('ui.pengujian_lab_desc')); ?></p>
                                <a href="#" class="layanan-card__link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="layanan-card">
                            <div class="layanan-card__icon">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title"><?php echo e(__('ui.pendampingan_umkm')); ?></h4>
                                <p class="layanan-card__desc"><?php echo e(__('ui.pendampingan_umkm_desc')); ?></p>
                                <a href="#" class="layanan-card__link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="layanan-card">
                            <div class="layanan-card__icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="layanan-card__content">
                                <h4 class="layanan-card__title"><?php echo e(__('ui.pengembangan_produk')); ?></h4>
                                <p class="layanan-card__desc"><?php echo e(__('ui.pengembangan_produk_desc')); ?></p>
                                <a href="#" class="layanan-card__link">Pelajari Lebih Lanjut <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            
            <div class="prosedur-section">
                <div class="section-header text-center">
                    <span class="section-badge"><?php echo e(__('ui.prosedur_layanan')); ?></span>
                    <h3 class="section-title text-center"><?php echo e(__('ui.prosedur_layanan')); ?></h3>
                    <p class="section-subtitle text-center"><?php echo e(__('ui.tahapan_mengajukan')); ?></p>
                </div>
                <div class="prosedur-steps">
                    <div class="prosedur-step">
                        <div class="prosedur-step__number">1</div>
                        <div class="prosedur-step__content">
                            <h4><?php echo e(__('ui.konsultasi_awal')); ?></h4>
                            <p><?php echo e(__('ui.konsultasi_awal_desc')); ?></p>
                        </div>
                    </div>
                    <div class="prosedur-step">
                        <div class="prosedur-step__number">2</div>
                        <div class="prosedur-step__content">
                            <h4><?php echo e(__('ui.penjadwalan')); ?></h4>
                            <p><?php echo e(__('ui.penjadwalan_desc')); ?></p>
                        </div>
                    </div>
                    <div class="prosedur-step">
                        <div class="prosedur-step__number">3</div>
                        <div class="prosedur-step__content">
                            <h4><?php echo e(__('ui.pelaksanaan')); ?></h4>
                            <p><?php echo e(__('ui.pelaksanaan_desc')); ?></p>
                        </div>
                    </div>
                    <div class="prosedur-step">
                        <div class="prosedur-step__number">4</div>
                        <div class="prosedur-step__content">
                            <h4><?php echo e(__('ui.laporan_tindak_lanjut')); ?></h4>
                            <p><?php echo e(__('ui.laporan_tindak_lanjut_desc')); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="tarif-section">
                <div class="section-header text-center">
                    <span class="section-badge"><?php echo e(__('ui.tarif_layanan')); ?></span>
                    <h3 class="section-title text-center"><?php echo e(__('ui.tarif_layanan')); ?></h3>
                    <p class="section-subtitle text-center"><?php echo e(__('ui.informasi_tarif')); ?></p>
                </div>
                <div class="tarif-table-wrapper">
                    <table class="jadwal-table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('ui.jenis_layanan')); ?></th>
                                <th><?php echo e(__('ui.satuan')); ?></th>
                                <th><?php echo e(__('ui.estimasi_waktu')); ?></th>
                                <th><?php echo e(__('ui.tarif')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong><?php echo e(__('ui.konsultasi_teknis')); ?></strong></td>
                                <td><?php echo e(__('ui.per_sesi')); ?></td>
                                <td><?php echo e(__('ui.jam_1_2')); ?></td>
                                <td><?php echo e(__('ui.gratia_konsultasi')); ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo e(__('ui.pengujian_lab')); ?></strong></td>
                                <td><?php echo e(__('ui.per_sampel')); ?></td>
                                <td><?php echo e(__('ui.hari_3_7')); ?></td>
                                <td><?php echo e(__('ui.sesuai_jenis')); ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo e(__('ui.pendampingan_umkm')); ?></strong></td>
                                <td><?php echo e(__('ui.per_paket')); ?></td>
                                <td><?php echo e(__('ui.bulan_1_3')); ?></td>
                                <td><?php echo e(__('ui.termasuk_kunjungan')); ?></td>
                            </tr>
                            <tr>
                                <td><strong><?php echo e(__('ui.pengembangan_produk')); ?></strong></td>
                                <td><?php echo e(__('ui.per_proyek')); ?></td>
                                <td><?php echo e(__('ui.sesuai_kebutuhan')); ?></td>
                                <td><?php echo e(__('ui.proposal_khusus')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="tarif-note">
                    <i class="fas fa-info-circle"></i>
                    <?php echo e(__('ui.tarif_note')); ?>

                </p>
            </div>

        </div>
    </section>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.frontend', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\frontend\pengabdian\pelayanan.blade.php ENDPATH**/ ?>