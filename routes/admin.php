<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PenelitianController;
use App\Http\Controllers\Admin\PublikasiController;
use Illuminate\Support\Facades\Route;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

/*
|--------------------------------------------------------------------------
| Content Management (Custom Routes)
|--------------------------------------------------------------------------
*/
Route::prefix('content')->name('content.')->group(function () {
    // Index - Semua Section
    Route::get('/', [ContentController::class, 'index'])->name('index');
    
    // ⚠️ ROUTE DENGAN ID HARUS DI ATAS (pakai constraint angka)
    // Edit - Get data untuk edit (AJAX)
    Route::get('/{id}/edit', [ContentController::class, 'edit'])
        ->name('edit')
        ->where('id', '[0-9]+');  // ← Hanya angka!
    
    // Update - Update konten
    Route::put('/{id}', [ContentController::class, 'update'])
        ->name('update')
        ->where('id', '[0-9]+');
    
    // Destroy - Hapus konten
    Route::delete('/{id}', [ContentController::class, 'destroy'])
        ->name('destroy')
        ->where('id', '[0-9]+');
    
    // ⚠️ ROUTE DENGAN {section} DI BAWAH
    // Section - List semua konten per section
    Route::get('/{section}', [ContentController::class, 'section'])
        ->name('section')
        ->where('section', '[a-z\-]+');  // ← Hanya huruf kecil & dash
    
    // Store - Simpan konten baru
    Route::post('/{section}/{category}', [ContentController::class, 'store'])
        ->name('store')
        ->where([
            'section' => '[a-z\-]+',
            // Support category keys with underscore, e.g. "program_pelatihan"
            'category' => '[a-z\-_]+'
        ]);
});

/*
|--------------------------------------------------------------------------
| Resource Routes (Standard CRUD)
|--------------------------------------------------------------------------
*/
Route::resource('team', TeamController::class);
Route::resource('penelitian', PenelitianController::class);
Route::resource('publikasi', PublikasiController::class);
