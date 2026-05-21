<aside id="admin-sidebar" class="admin-sidebar">
    
    {{-- Brand --}}
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon">
            <i class="fas fa-flask"></i>
        </div>
        <span class="sidebar-brand-text">UPPM Admin</span>
    </div>

    {{-- User Info --}}
    <div class="sidebar-user">
        <div class="sidebar-user-avatar">
            <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-user-info">
            <p class="sidebar-user-name">{{ auth()->user()->name ?? 'Admin' }}</p>
            <p class="sidebar-user-role">
                {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin' }}
            </p>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="sidebar-nav">
        
        {{-- Main Menu --}}
        <div class="sidebar-nav-section">
            <p class="sidebar-nav-title">Menu Utama</p>
            
            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}" 
               class="sidebar-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt sidebar-nav-icon"></i>
                <span>Dashboard</span>
            </a>

            {{-- Kelola Konten --}}
            <a href="{{ route('admin.content.index') }}" 
               class="sidebar-nav-link {{ request()->routeIs('admin.content*') ? 'active' : '' }}">
                <i class="fas fa-folder-open sidebar-nav-icon"></i>
                <span>Kelola Konten</span>
            </a>
        </div>

        {{-- Super Admin Menu --}}
        @if(auth()->user()->role === 'super_admin')
        <div class="sidebar-nav-section">
            <p class="sidebar-nav-title">Super Admin</p>
            
            <a href="{{ route('admin.users.index') }}" 
               class="sidebar-nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                <i class="fas fa-user-cog sidebar-nav-icon"></i>
                <span>Kelola User</span>
            </a>
        </div>
        @endif

        {{-- External Links --}}
        <div class="sidebar-nav-section">
            <p class="sidebar-nav-title">Lainnya</p>
            
            <a href="{{ route('home') }}" target="_blank" class="sidebar-nav-link">
                <i class="fas fa-external-link-alt sidebar-nav-icon"></i>
                <span>Lihat Website</span>
            </a>
        </div>

    </nav>

    {{-- Logout --}}
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sidebar-logout-btn">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>
