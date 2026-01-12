<!-- TAMBAHKAN ID 'admin-sidebar' dan kelas transisi -->
<!-- Logika: Mobile = Fixed (Overlay), Desktop = Static (Dalam layout) -->
<!-- Mobile default tertutup (-translate-x-full), Desktop default terbuka (md:translate-x-0) -->
<aside id="admin-sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-slate-300 flex flex-col transition-transform duration-300 ease-in-out transform -translate-x-full md:translate-x-0 md:static md:block">
    
    <!-- Brand -->
    <div class="h-16 flex items-center px-6 border-b border-slate-800">
        <span class="text-xl font-bold text-white tracking-wide">UPPM ADMIN</span>
    </div>

    <!-- User Info Mini -->
    <div class="p-4 border-b border-slate-800">
        <p class="text-xs uppercase text-slate-500 font-semibold">Logged in as</p>
        <p class="text-sm font-bold text-white mt-1">
            {{ auth()->user()->role === 'super_admin' ? 'Super Admin' : 'Admin Pegawai' }}
        </p>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
        
        {{-- LINK HOME --}}
        <a href="{{ route('home') }}" target="_blank" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group hover:bg-slate-800 hover:text-white transition-colors">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover:text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Lihat Website
        </a>

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-white border-l-4 border-indigo-500' : '' }}">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>

        {{-- KELOLA KONTEN --}}
        <a href="{{ route('admin.konten.index') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.konten*') ? 'bg-slate-800 text-white border-l-4 border-indigo-500' : '' }}">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            Kelola Konten
        </a>

        {{-- SUPER ADMIN MENU --}}
        @if(auth()->user()->role === 'super_admin')
            <div class="pt-4 pb-2">
                <p class="px-3 text-xs font-semibold text-slate-500 uppercase tracking-wider">Super Admin</p>
            </div>
            <a href="{{ route('admin.users.index') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg group hover:bg-slate-800 hover:text-white transition-colors {{ request()->routeIs('admin.users*') ? 'bg-slate-800 text-white border-l-4 border-indigo-500' : '' }}">
                <svg class="w-5 h-5 mr-3 text-slate-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Kelola User
            </a>
        @endif

    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-slate-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center w-full px-3 py-2 text-sm font-medium text-red-400 rounded-lg hover:bg-red-900/20 hover:text-red-300 transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </button>
        </form>
    </div>
</aside>