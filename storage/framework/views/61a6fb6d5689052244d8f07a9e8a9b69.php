<aside id="admin-sidebar" class="admin-sidebar">
    
    
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon">
            <i class="fas fa-flask"></i>
        </div>
        <span class="sidebar-brand-text">UPPM Admin</span>
    </div>

    
    <div class="sidebar-user">
        <div class="sidebar-user-avatar">
            <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-user-info">
            <p class="sidebar-user-name"><?php echo e(auth()->user()->name ?? 'Admin'); ?></p>
            <p class="sidebar-user-role">
                <?php echo e(auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin'); ?>

            </p>
        </div>
    </div>

    
    <nav class="sidebar-nav">
        
        
        <div class="sidebar-nav-section">
            <p class="sidebar-nav-title">Menu Utama</p>
            
            
            <a href="<?php echo e(route('admin.dashboard')); ?>" 
               class="sidebar-nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <i class="fas fa-tachometer-alt sidebar-nav-icon"></i>
                <span>Dashboard</span>
            </a>

            
            <a href="<?php echo e(route('admin.content.index')); ?>" 
               class="sidebar-nav-link <?php echo e(request()->routeIs('admin.content*') ? 'active' : ''); ?>">
                <i class="fas fa-folder-open sidebar-nav-icon"></i>
                <span>Kelola Konten</span>
            </a>
        </div>

        
        <?php if(auth()->user()->role === 'super_admin'): ?>
        <div class="sidebar-nav-section">
            <p class="sidebar-nav-title">Super Admin</p>
            
            <a href="<?php echo e(route('admin.users.index')); ?>" 
               class="sidebar-nav-link <?php echo e(request()->routeIs('admin.users*') ? 'active' : ''); ?>">
                <i class="fas fa-user-cog sidebar-nav-icon"></i>
                <span>Kelola User</span>
            </a>
        </div>
        <?php endif; ?>

        
        <div class="sidebar-nav-section">
            <p class="sidebar-nav-title">Lainnya</p>
            
            <a href="<?php echo e(route('home')); ?>" target="_blank" class="sidebar-nav-link">
                <i class="fas fa-external-link-alt sidebar-nav-icon"></i>
                <span>Lihat Website</span>
            </a>
        </div>

    </nav>

    
    <div class="sidebar-footer">
        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>
            <button type="submit" class="sidebar-logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>
<?php /**PATH E:\laragon\uppm-web\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>