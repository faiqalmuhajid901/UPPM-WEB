


<style id="header-layout-override">
@media (min-width: 768px) {
    #main-header .header-container {
        justify-content: flex-start;
    }

    #main-header .header-logo img {
        height: 2.15rem;
    }

    #main-header .header-desktop-nav {
        margin-left: auto;
        margin-right: 0.65rem;
        justify-content: flex-end;
    }

    #main-header .language-switcher--desktop {
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.2rem;
        margin-left: 0;
        margin-right: 0;
    }

    #main-header .language-switcher--desktop .language-item {
        width: 4.25rem;
        justify-content: flex-start;
        align-items: center;
        gap: 0.3rem;
        padding: 0.2rem 0.35rem;
        font-size: 0.82rem;
        line-height: 1;
        border-radius: 0.45rem;
    }

    #main-header .language-switcher--desktop .language-item__flag {
        width: 1.15rem;
        height: 0.85rem;
        border-radius: 0.14rem;
    }

    #main-header .language-switcher--desktop .language-item:not(.active) {
        background-color: rgba(255, 255, 255, 0.06);
    }

    #main-header .language-switcher--desktop .language-item.active {
        background-color: rgba(245, 176, 65, 0.22);
    }
}

#main-header .mobile-menu .language-switcher--mobile {
    display: flex;
    flex-direction: row;
    align-items: center;
}
</style>
<header id="main-header">
    <nav class="header-nav">
        <div class="header-container">
            
            
            <div class="header-logo">
                <a href="<?php echo e(url('/')); ?>" class="header-logo-link">
                    <img src="<?php echo e(asset('images/navbar_ATK.png')); ?>" alt="Politeknik ATK">
                    <span class="header-logo-text"></span>
                </a>
            </div>

            
            <div class="header-desktop-nav">
                
                
                
                
                <div class="nav-dropdown">
                    <button type="button" class="nav-dropdown-btn">
                        <?php echo e(__('navbar.profil')); ?>

                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu nav-dropdown-menu--wide">
                        <div class="nav-dropdown-card">
                            <a href="<?php echo e(route('profil-kampus')); ?>#tentang" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.profil_kampus')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.profil_kampus_desc')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('profil-kampus')); ?>#visi-misi" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.visi_misi')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.visi_misi_desc')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('struktur-organisasi')); ?>" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.struktur_organisasi')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.struktur_organisasi_desc')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                
                
                
                <div class="nav-dropdown">
                    <button type="button" class="nav-dropdown-btn">
                        <?php echo e(__('navbar.penelitian')); ?>

                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu nav-dropdown-menu--wide">
                        <div class="nav-dropdown-card">
                            <a href="<?php echo e(route('penelitian')); ?>#panduan" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.panduan')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.panduan_penelitian_desc')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('penelitian')); ?>#jurnal" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.jurnal')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.jurnal_desc')); ?></span>
                                </div>
                            </a>
                            <a href="https://forms.gle/fdPhDW4nMZz1Lkei8" target="_blank" rel="noopener noreferrer" class="nav-dropdown-item nav-dropdown-item--highlight">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.ajukan_proposal')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.ajukan_proposal_desc')); ?></span>
                                    <span class="nav-dropdown-item__badge"><?php echo e(__('ui.google_form')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                
                
                
                <div class="nav-dropdown">
                    <button type="button" class="nav-dropdown-btn">
                        <?php echo e(__('navbar.pengabdian')); ?>

                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu nav-dropdown-menu--wide">
                        <div class="nav-dropdown-card">
                            <a href="<?php echo e(route('pengabdian.panduan')); ?>" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.panduan')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.panduan_pengabdian_desc')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('pengabdian')); ?>#skema" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.skema')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.skema_desc')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('pengabdian.pelatihan')); ?>" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.pelatihan_pelayanan')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.pelatihan_pelayanan_desc')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('pengabdian')); ?>#kegiatan" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.berita_kegiatan')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.berita_kegiatan_desc')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                
                
                
                <div class="nav-dropdown">
                    <button type="button" class="nav-dropdown-btn">
                        <?php echo e(__('navbar.dokumen')); ?>

                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu nav-dropdown-menu--wide">
                        <div class="nav-dropdown-card">
                            <a href="<?php echo e(route('dokumen.arsip')); ?>" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.arsip_dokumen')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.arsip_dokumen_desc')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('dokumen.berita')); ?>" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.liputan_berita')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.liputan_berita_desc')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                
                
                
                <div class="nav-dropdown">
                    <button type="button" class="nav-dropdown-btn">
                        <?php echo e(__('navbar.publikasi')); ?>

                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="nav-dropdown-menu nav-dropdown-menu--wide">
                        <div class="nav-dropdown-card">
                            <a href="<?php echo e(route('publikasi.jurnal-bptkspk')); ?>" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.jurnal_bptkspk')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.jurnal_bptkspk_desc')); ?></span>    
                                </div>
                            </a>
                            <a href="<?php echo e(route('publikasi.jurnal-ojs')); ?>" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.jurnal_ojs')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.jurnal_ojs_desc')); ?></span>
                                </div>
                            </a>
                            <a href="<?php echo e(route('publikasi.prosiding-semnas')); ?>" class="nav-dropdown-item">
                                <div class="nav-dropdown-item__icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div class="nav-dropdown-item__content">
                                    <span class="nav-dropdown-item__title"><?php echo e(__('navbar.prosiding_semnas')); ?></span>
                                    <span class="nav-dropdown-item__desc"><?php echo e(__('navbar.prosiding_semnas_desc')); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="<?php echo e(route('kemitraan')); ?>" class="nav-link" title="<?php echo e(__('navbar.kemitraan')); ?>">
                    <?php echo e(__('navbar.kemitraan')); ?>

                </a>

            </div>

            
            <?php
                $currentLocale = app()->getLocale();
                $basePath = trim((string) request()->getBaseUrl(), '/');
                $basePrefix = $basePath === '' ? '' : '/'.$basePath;
                $currentFullUrl = request()->fullUrl();
                $switchIdUrl = $basePrefix.'/lang/id?redirect='.urlencode($currentFullUrl);
                $switchEnUrl = $basePrefix.'/lang/en?redirect='.urlencode($currentFullUrl);
            ?>
            <div class="language-switcher language-switcher--desktop">
                <a
                    class="language-item <?php echo e($currentLocale == 'id' ? 'active' : ''); ?>"
                    data-locale="id"
                    href="<?php echo e($switchIdUrl); ?>"
                    aria-label="Ganti bahasa ke Indonesia"
                >
                    <img src="https://flagcdn.com/w20/id.png" alt="Indonesia" class="language-item__flag" loading="lazy">
                    <span>ID</span>
                </a>
                <a
                    class="language-item <?php echo e($currentLocale == 'en' ? 'active' : ''); ?>"
                    data-locale="en"
                    href="<?php echo e($switchEnUrl); ?>"
                    aria-label="Switch language to English"
                >
                    <img src="https://flagcdn.com/w20/us.png" alt="English" class="language-item__flag" loading="lazy">
                    <span>EN</span>
                </a>
            </div>

            
            <button type="button" id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle menu" aria-expanded="false">
                <svg id="icon-menu-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="icon-menu-close" class="hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </nav>
    
    
    
    
    <div id="mobile-menu" class="mobile-menu">
        <div class="mobile-menu-content">
            
            
            <div class="mobile-menu-section">
                <div class="mobile-menu-section__title"><?php echo e(__('navbar.profil')); ?></div>
                <a href="<?php echo e(route('profil-kampus')); ?>#tentang" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.profil_kampus')); ?></span>
                    <small><?php echo e(__('navbar.profil_kampus_short')); ?></small>
                </a>
                <a href="<?php echo e(route('profil-kampus')); ?>#visi-misi" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.visi_misi')); ?></span>
                    <small><?php echo e(__('navbar.visi_misi_short')); ?></small>
                </a>
                <a href="<?php echo e(route('struktur-organisasi')); ?>" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.struktur_organisasi')); ?></span>
                    <small><?php echo e(__('navbar.struktur_organisasi_short')); ?></small>
                </a>
            </div>
            
            <hr class="mobile-menu-divider">
            
            
            <div class="mobile-menu-section">
                <div class="mobile-menu-section__title"><?php echo e(__('navbar.penelitian')); ?></div>
                <a href="<?php echo e(route('penelitian')); ?>#panduan" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.panduan')); ?></span>
                    <small><?php echo e(__('navbar.panduan_penelitian_short')); ?></small>
                </a>
                <a href="<?php echo e(route('penelitian')); ?>#jurnal" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.jurnal')); ?></span>
                    <small><?php echo e(__('navbar.jurnal_short')); ?></small>
                </a>
                <a href="https://forms.gle/fdPhDW4nMZz1Lkei8" target="_blank" rel="noopener noreferrer" class="mobile-menu-link mobile-menu-link--highlight">
                    <span><?php echo e(__('navbar.ajukan_proposal')); ?></span>
                    <small><?php echo e(__('navbar.ajukan_proposal_short')); ?></small>
                </a>
            </div>
            
            <hr class="mobile-menu-divider">
            
            
            <div class="mobile-menu-section">
                <div class="mobile-menu-section__title"><?php echo e(__('navbar.pengabdian')); ?></div>
                <a href="<?php echo e(route('pengabdian.panduan')); ?>" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.panduan')); ?></span>
                    <small><?php echo e(__('navbar.panduan_pengabdian_short')); ?></small>
                </a>
                <a href="<?php echo e(route('pengabdian')); ?>#skema" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.skema')); ?></span>
                    <small><?php echo e(__('navbar.skema_short')); ?></small>
                </a>
                <a href="<?php echo e(route('pengabdian.pelatihan')); ?>" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.pelatihan_pelayanan')); ?></span>
                    <small><?php echo e(__('navbar.pelatihan_pelayanan_short')); ?></small>
                </a>
                <a href="<?php echo e(route('pengabdian')); ?>#kegiatan" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.berita_kegiatan')); ?></span>
                    <small><?php echo e(__('navbar.berita_kegiatan_short')); ?></small>
                </a>
            </div>
            
            <hr class="mobile-menu-divider">
            
            
            <div class="mobile-menu-section">
                <div class="mobile-menu-section__title"><?php echo e(__('navbar.dokumen')); ?></div>
                <a href="<?php echo e(route('dokumen.arsip')); ?>" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.arsip_dokumen')); ?></span>
                    <small><?php echo e(__('navbar.arsip_dokumen_short')); ?></small>
                </a>
                <a href="<?php echo e(route('dokumen.berita')); ?>" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.liputan_berita')); ?></span>
                    <small><?php echo e(__('navbar.liputan_berita_short')); ?></small>
                </a>
            </div>
            
            <hr class="mobile-menu-divider">
            
            
            <div class="mobile-menu-section">
                <div class="mobile-menu-section__title"><?php echo e(__('navbar.publikasi')); ?></div>
                <a href="<?php echo e(route('publikasi.jurnal-bptkspk')); ?>" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.jurnal_bptkspk')); ?></span>
                    <small><?php echo e(__('navbar.jurnal_bptkspk_short')); ?></small>
                </a>
                <a href="<?php echo e(route('publikasi.jurnal-ojs')); ?>" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.jurnal_ojs')); ?></span>
                    <small><?php echo e(__('navbar.jurnal_ojs_short')); ?></small>
                </a>
                <a href="<?php echo e(route('publikasi.prosiding-semnas')); ?>" class="mobile-menu-link">
                    <span><?php echo e(__('navbar.prosiding_semnas')); ?></span>
                    <small><?php echo e(__('navbar.prosiding_semnas_short')); ?></small>
                </a>
            </div>
            
            <a href="<?php echo e(route('kemitraan')); ?>" class="mobile-menu-link">
                <span><?php echo e(__('navbar.kemitraan')); ?></span>
                <small><?php echo e(__('navbar.kemitraan_desc')); ?></small>
            </a>

            
            <div class="language-switcher language-switcher--mobile">
                <a
                    class="language-item <?php echo e($currentLocale == 'id' ? 'active' : ''); ?>"
                    data-locale="id"
                    href="<?php echo e($switchIdUrl); ?>"
                    aria-label="Ganti bahasa ke Indonesia"
                >
                    <img src="https://flagcdn.com/w20/id.png" alt="Indonesia" class="language-item__flag" loading="lazy">
                    ID
                </a>
                <a
                    class="language-item <?php echo e($currentLocale == 'en' ? 'active' : ''); ?>"
                    data-locale="en"
                    href="<?php echo e($switchEnUrl); ?>"
                    aria-label="Switch language to English"
                >
                    <img src="https://flagcdn.com/w20/us.png" alt="English" class="language-item__flag" loading="lazy">
                    EN
                </a>
            </div>
            
        </div>
    </div>
</header>


<div class="header-spacer"></div>





<?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\partials\header.blade.php ENDPATH**/ ?>