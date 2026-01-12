@extends('layouts.admin')
@section('title', 'Tambah User Baru')
@section('page_title', 'Tambah User Baru')

@section('admin_content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-8">
        
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <!-- Nama -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required 
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-3 border">
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required 
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-3 border">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-slate-700 mb-2">Password</label>
                <input type="password" name="password" id="password" required 
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-3 border">
                <p class="text-xs text-slate-500 mt-1">Minimal 8 karakter.</p>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-6">
                <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required 
                       class="w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-3 border">
            </div>

            <!-- Role -->
            <div class="mb-8">
                <label for="role" class="block text-sm font-medium text-slate-700 mb-2">Role</label>
                <select name="role" id="role" class="w-full border-slate-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 px-4 py-3 border bg-white">
                    <option value="admin">Admin Pegawai</option>
                    <option value="super_admin">Super Admin</option>
                </select>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex items-center justify-between">
                <a href="{{ route('admin.users.index') }}" class="text-slate-500 hover:text-slate-700 font-medium">
                    Batal
                </a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-200">
                    Simpan User
                </button>
            </div>
        </form>

    </div>
</div>
@endsection