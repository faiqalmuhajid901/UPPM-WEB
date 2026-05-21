<header class="admin-header">
    
    <div class="header-left">
        
        <button type="button" id="sidebar-toggle" class="sidebar-toggle-btn" aria-label="Toggle Sidebar">
            <i class="fas fa-bars"></i>
        </button>

        
        <div class="header-title">
            <h1><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
        </div>
    </div>

    
    <div class="header-right">
        
        <div class="header-date">
            <i class="fas fa-calendar-alt"></i>
            <span><?php echo e(now()->translatedFormat('l, d F Y')); ?></span>
        </div>

        
        <div class="header-user-dropdown" id="user-dropdown">
            <button type="button" class="header-user-btn" id="user-dropdown-toggle">
                <div class="header-user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <span class="header-user-name"><?php echo e(auth()->user()->name ?? 'Admin'); ?></span>
                <i class="fas fa-chevron-down header-user-chevron"></i>
            </button>

            
            <div class="header-dropdown-menu" id="user-dropdown-menu">
                <a href="#" class="header-dropdown-item">
                    <i class="fas fa-user-circle"></i>
                    <span>Profil</span>
                </a>
                <a href="#" class="header-dropdown-item">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
                <hr class="header-dropdown-divider">
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="header-dropdown-item header-dropdown-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
<?php /**PATH \\DESKTOP-EQN4087\XAMPP8212\htdocs\uppm-web\resources\views\admin\partials\header.blade.php ENDPATH**/ ?>