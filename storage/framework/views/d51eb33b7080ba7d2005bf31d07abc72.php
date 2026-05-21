

<?php $__env->startSection('title', __('ui.pengabdian_page_title')); ?>

<?php $__env->startPush('styles'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/css/pengabdian.css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


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
            <i class="fas fa-hands-helping"></i>
            <span><?php echo e(__('ui.uppm_politeknik')); ?></span>
        </div>
        <h1 class="hero-title"><?php echo e($header->title ?? __('ui.pengabdian_page_title')); ?></h1>
        <p class="hero-subtitle">
            <?php echo e($header->excerpt ?? __('ui.pengabdian_default_desc')); ?>

        </p>
        <div class="hero-buttons">
            <a href="<?php echo e(route('pengabdian.panduan')); ?>" class="btn-hero-primary">
                <i class="fas fa-book-open"></i>
                <?php echo e(__('ui.lihat_panduan')); ?>

            </a>
            <a href="#kegiatan" class="btn-hero-secondary">
                <i class="fas fa-calendar-alt"></i>
                <?php echo e(__('ui.kegiatan_terbaru')); ?>

            </a>
        </div>
    </div>
    <div class="hero-scroll-indicator">
        <span><?php echo e(__('ui.scroll')); ?></span>
        <i class="fas fa-chevron-down"></i>
    </div>
</section>


<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card" data-aos="fade-up" data-aos-delay="0">
                <div class="stat-icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-number" data-count="<?php echo e($stats['program'] ?? 15); ?>">0</div>
                <div class="stat-label"><?php echo e(__('ui.program_aktif')); ?></div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <div class="stat-number" data-count="<?php echo e($stats['pelatihan'] ?? 25); ?>">0</div>
                <div class="stat-label"><?php echo e(__('ui.pelatihan')); ?></div>
            </div>
            <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="stat-number" data-count="<?php echo e($stats['kegiatan'] ?? 50); ?>">0</div>
                <div class="stat-label"><?php echo e(__('ui.kegiatan')); ?></div>
            </div>
        </div>
    </div>
</section>


<section id="skema" class="skema-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><?php echo e(__('navbar.skema')); ?></span>
            <h2 class="section-title"><?php echo e(__('ui.skema_pengabdian')); ?></h2>
            <p class="section-subtitle"><?php echo e(__('ui.skema_pengabdian_desc')); ?></p>
        </div>

        <?php if($skema->count() > 0): ?>
            <div class="skema-grid">
                <?php $__currentLoopData = $skema; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="skema-card" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                        <div class="skema-icon">
                            <i class="fas fa-<?php echo e($item->icon ?? 'file-alt'); ?>"></i>
                        </div>
                        <h3 class="skema-title"><?php echo e($item->title); ?></h3>
                        <p class="skema-desc"><?php echo e($item->excerpt ?? 'Deskripsi skema pengabdian akan ditampilkan di sini.'); ?></p>
                        <a href="<?php echo e($item->file_url ?? '#'); ?>" class="skema-link" target="_blank" rel="noopener noreferrer">
                            <?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            
            <div class="skema-grid">
                <div class="skema-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="skema-icon"><i class="fas fa-users"></i></div>
                    <h3 class="skema-title">Pengabdian Reguler</h3>
                    <p class="skema-desc">Program pengabdian rutin yang dilaksanakan setiap semester untuk dosen dan mahasiswa.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="skema-icon"><i class="fas fa-hands-helping"></i></div>
                    <h3 class="skema-title">Pengabdian Mandiri</h3>
                    <p class="skema-desc">Program pengabdian yang diinisiasi secara mandiri oleh dosen dengan pendanaan internal.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="skema-icon"><i class="fas fa-building"></i></div>
                    <h3 class="skema-title">Kerjasama Industri</h3>
                    <p class="skema-desc">Program pengabdian yang bekerjasama dengan pihak industri dan mitra eksternal.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


<section id="program" class="program-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><?php echo e(__('ui.program_pengabdian')); ?></span>
            <h2 class="section-title"><?php echo e(__('ui.program_pengabdian')); ?></h2>
            <p class="section-subtitle"><?php echo e(__('ui.program_pengabdian_desc')); ?></p>
        </div>

        <?php if($program->count() > 0): ?>
            <div class="skema-grid section-card-grid">
                <?php $__currentLoopData = $program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $programDesc = Str::limit($item->excerpt ?: strip_tags($item->content ?? ''), 120);
                        $programLink = $item->file_url ?: '#';
                    ?>
                    <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                        <div class="skema-icon">
                            <i class="fas fa-<?php echo e($item->icon ?? 'project-diagram'); ?>"></i>
                        </div>
                        <h3 class="skema-title"><?php echo e($item->title); ?></h3>
                        <p class="skema-desc"><?php echo e($programDesc ?: 'Deskripsi program pengabdian akan ditampilkan di sini.'); ?></p>
                        <a href="<?php echo e($programLink); ?>" class="skema-link" <?php if($item->file_url): ?> target="_blank" rel="noopener noreferrer" <?php endif; ?>>
                            <?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            
            <div class="skema-grid section-card-grid">
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="skema-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3 class="skema-title">Program Pemberdayaan UMKM</h3>
                    <p class="skema-desc">Pendampingan usaha kecil melalui pelatihan produksi, manajemen, dan pemasaran digital.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="skema-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="skema-title">Program Teknologi Tepat Guna</h3>
                    <p class="skema-desc">Penerapan teknologi sederhana yang relevan untuk meningkatkan produktivitas masyarakat.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="skema-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="skema-title">Program Edukasi Komunitas</h3>
                    <p class="skema-desc">Kegiatan edukatif berbasis komunitas untuk mendorong peningkatan kapasitas masyarakat.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>


<section id="pelatihan" class="pelatihan-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><?php echo e(__('ui.pelatihan')); ?></span>
            <h2 class="section-title"><?php echo e(__('ui.program_pelatihan')); ?></h2>
            <p class="section-subtitle"><?php echo e(__('ui.program_pelatihan_desc')); ?></p>
        </div>

        <?php if($pelatihan->count() > 0): ?>
            <div class="skema-grid section-card-grid">
                <?php $__currentLoopData = $pelatihan->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $pelatihanDesc = Str::limit($item->excerpt ?: strip_tags($item->content ?? ''), 120);
                        $pelatihanLink = $item->file_url ?: route('pengabdian.pelatihan');
                    ?>
                    <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                        <div class="skema-icon">
                            <i class="fas fa-<?php echo e($item->icon ?? 'graduation-cap'); ?>"></i>
                        </div>
                        <h3 class="skema-title"><?php echo e($item->title); ?></h3>
                        <p class="skema-desc"><?php echo e($pelatihanDesc ?: 'Deskripsi pelatihan akan ditampilkan di sini.'); ?></p>
                        <a href="<?php echo e($pelatihanLink); ?>" class="skema-link" <?php if($item->file_url): ?> target="_blank" rel="noopener noreferrer" <?php endif; ?>>
                            <?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="skema-grid section-card-grid">
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="0">
                    <div class="skema-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="skema-title">Pelatihan IT & Digital</h3>
                    <p class="skema-desc">Pelatihan teknologi informasi untuk masyarakat dan pelaku usaha.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="skema-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="skema-title">Pelatihan Kewirausahaan</h3>
                    <p class="skema-desc">Peningkatan kemampuan bisnis, branding, dan pemasaran untuk UMKM.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="skema-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3 class="skema-title">Pelatihan Vokasi</h3>
                    <p class="skema-desc">Program vokasi berbasis praktik untuk keterampilan teknis yang siap pakai.</p>
                    <a href="#" class="skema-link"><?php echo e(__('ui.pelajari_lanjut')); ?> <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        <?php endif; ?>

        <div class="section-more" data-aos="fade-up">
            <a href="<?php echo e(route('pengabdian.pelatihan')); ?>" class="section-more-link">
                <?php echo e(__('ui.lihat_semua_pelatihan')); ?>

                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>


<section id="kegiatan" class="kegiatan-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge"><?php echo e(__('ui.kegiatan')); ?></span>
            <h2 class="section-title"><?php echo e(__('ui.kegiatan_terbaru_section')); ?></h2>
            <p class="section-subtitle"><?php echo e(__('ui.kegiatan_terbaru_desc')); ?></p>
        </div>

        <?php if($kegiatan->count() > 0): ?>
            <div class="skema-grid section-card-grid">
                <?php $__currentLoopData = $kegiatan->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $kegiatanDesc = Str::limit($item->excerpt ?: strip_tags($item->content ?? ''), 120);
                        $kegiatanLink = $item->file_url ?: '#';
                    ?>
                    <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="<?php echo e($index * 100); ?>">
                        <div class="skema-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h3 class="skema-title"><?php echo e($item->title); ?></h3>
                        <p class="section-meta"><?php echo e($item->created_at->format('d M Y')); ?></p>
                        <p class="skema-desc"><?php echo e($kegiatanDesc ?: 'Deskripsi kegiatan pengabdian akan ditampilkan di sini.'); ?></p>
                        <a href="<?php echo e($kegiatanLink); ?>" class="skema-link" <?php if($item->file_url): ?> target="_blank" rel="noopener noreferrer" <?php endif; ?>>
                            <?php echo e(__('ui.lihat_dokumentasi')); ?> <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            
            <div class="skema-grid section-card-grid">
                <?php for($i = 1; $i <= 3; $i++): ?>
                    <div class="skema-card section-card" data-aos="fade-up" data-aos-delay="<?php echo e(($i - 1) * 100); ?>">
                        <div class="skema-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <h3 class="skema-title">Kegiatan Pengabdian <?php echo e($i); ?></h3>
                        <p class="section-meta"><?php echo e(str_pad($i * 5, 2, '0', STR_PAD_LEFT)); ?> Feb 2026</p>
                        <p class="skema-desc">Dokumentasi kegiatan pengabdian masyarakat yang telah dilaksanakan bersama mitra.</p>
                        <a href="#" class="skema-link"><?php echo e(__('ui.lihat_dokumentasi')); ?> <i class="fas fa-arrow-right"></i></a>
                    </div>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

        <div class="kegiatan-more" data-aos="fade-up">
            <a href="<?php echo e(route('pengabdian')); ?>#kegiatan" class="section-more-link">
                <?php echo e(__('ui.lihat_semua_kegiatan')); ?>

                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<?php echo app('Illuminate\Foundation\Vite')('resources/js/pages/pengabdian.js'); ?>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp8212\htdocs\uppm-web\resources\views/frontend/pengabdian.blade.php ENDPATH**/ ?>