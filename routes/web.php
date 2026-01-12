<?php

use Illuminate\Support\Facades\Route;

// Import Controller (Pastikan F -> Front)
use App\Http\Controllers\FrontendController; 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContentController; 

require __DIR__.'/auth.php';

// --- ROUTE PUBLIK (Frontend) ---
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/profil-kampus', [FrontendController::class, 'profil'])->name('profil-kampus');

Route::get('/penelitian', [FrontendController::class, 'penelitian'])->name('penelitian');
Route::get('/pengabdian', [FrontendController::class, 'pengabdian'])->name('pengabdian');
Route::get('/publikasi', [FrontendController::class, 'publikasi'])->name('publikasi');
Route::get('/kkn', [FrontendController::class, 'kkn'])->name('kkn');

// --- ROUTE DASHBOARD GLOBAL ---
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// --- BLOCK REGISTER PUBLIK ---
Route::match(['get', 'post'], '/register', function () {
    abort(403, 'Pendaftaran publik ditutup. Silakan hubungi Administrator.');
})->name('register');

// --- ROUTE ADMIN ---
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    // --- DASHBOARD ADMIN ---
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); 
    })->name('dashboard');

    // --- ROUTE USERS ---
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
        Route::put('/{id}/role', [UserController::class, 'updateRole'])->name('role');
    });

    // --- ROUTE KONTEN (FULL MANUAL - FIX FINAL) ---
    Route::prefix('konten')->name('konten.')->group(function () {
        
        // 1. Route Index (Halaman Utama / Hub)
        // Wajib manual karena bentrok dengan resource jika dibiarkan
        Route::get('/', [ContentController::class, 'index'])->name('index');

        // 2. Route Folder (Static)
        Route::get('/profile', [ContentController::class, 'profileIndex'])->name('manage.profile');
        Route::get('/penelitian', [ContentController::class, 'penelitianIndex'])->name('manage.penelitian');
        Route::get('/pengabdian', [ContentController::class, 'pengabdianIndex'])->name('manage.pengabdian');
        Route::get('/publikasi', [ContentController::class, 'publikasiIndex'])->name('manage.publikasi');
        Route::get('/kkn', [ContentController::class, 'kknIndex'])->name('manage.kkn');

        // 3. Manual CRUD Routes (MENGGANTIKAN Route::resource)
        // Kita tulis manual agar tidak ada bentrok URL dan pasti bekerja 100%
        
        // Halaman Tambah Konten
        Route::get('/create', [ContentController::class, 'create'])->name('create');
        
        // Simpan Konten (POST)
        Route::post('/', [ContentController::class, 'store'])->name('store');
        
        // Halaman Edit (GET)
        Route::get('/{id}/edit', [ContentController::class, 'edit'])->name('edit');
        
        // Update Konten (PUT)
        Route::put('/{id}', [ContentController::class, 'update'])->name('update');
        
        // Hapus Konten (DELETE)
        Route::delete('/{id}', [ContentController::class, 'destroy'])->name('destroy');
    });

});