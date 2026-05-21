<header class="admin-header">
    {{-- Left Side --}}
    <div class="header-left">
        {{-- Toggle Button --}}
        <button type="button" id="sidebar-toggle" class="sidebar-toggle-btn" aria-label="Toggle Sidebar">
            <i class="fas fa-bars"></i>
        </button>

        {{-- Breadcrumb / Page Title --}}
        <div class="header-title">
            <h1>@yield('page-title', 'Dashboard')</h1>
        </div>
    </div>

    {{-- Right Side --}}
    <div class="header-right">
        {{-- Current Date --}}
        <div class="header-date">
            <i class="fas fa-calendar-alt"></i>
            <span>{{ now()->translatedFormat('l, d F Y') }}</span>
        </div>

        {{-- User Dropdown --}}
        <div class="header-user-dropdown" id="user-dropdown">
            <button type="button" class="header-user-btn" id="user-dropdown-toggle">
                <div class="header-user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <span class="header-user-name">{{ auth()->user()->name ?? 'Admin' }}</span>
                <i class="fas fa-chevron-down header-user-chevron"></i>
            </button>

            {{-- Dropdown Menu --}}
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
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="header-dropdown-item header-dropdown-logout">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
