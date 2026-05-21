<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

// Homepage
Route::get('/', [FrontendController::class, 'index'])->name('home');

// Fallback akses file public storage tanpa bergantung symlink.
Route::get('/media/{path}', function (string $path) {
    $path = ltrim($path, '/');

    if ($path === '' || str_contains($path, '..')) {
        abort(404);
    }

    $disk = Storage::disk('public');

    if (!$disk->exists($path)) {
        abort(404);
    }

    $absolutePath = $disk->path($path);
    if (!is_file($absolutePath)) {
        abort(404);
    }

    return response()->file($absolutePath, [
        'Cache-Control' => 'public, max-age=31536000',
    ]);
})->where('path', '.*')->name('media.public');

// Storage link sudah dibuat: php artisan storage:link
// Akses file via: asset('storage/' . $path)

// ============================================================
// PROFIL
// ============================================================
Route::get('/profil-kampus', [FrontendController::class, 'profilKampus'])->name('profil-kampus');
Route::get('/struktur-organisasi', [FrontendController::class, 'strukturOrganisasi'])->name('struktur-organisasi');

// ============================================================
// PENELITIAN
// ============================================================
Route::get('/penelitian', [FrontendController::class, 'penelitian'])->name('penelitian');
// PENTING: Route dengan parameter harus di bawah route statis
Route::get('/penelitian/proposal', [FrontendController::class, 'proposal'])->name('penelitian.proposal');
Route::get('/penelitian/{penelitian}', [FrontendController::class, 'penelitianDetail'])->name('penelitian.detail');

// ============================================================
// PENGABDIAN
// ============================================================
Route::get('/pengabdian', [FrontendController::class, 'pengabdian'])->name('pengabdian');
Route::get('/pengabdian/panduan', [FrontendController::class, 'panduanPengabdian'])->name('pengabdian.panduan');
Route::get('/pengabdian/pelatihan', [FrontendController::class, 'pelatihan'])->name('pengabdian.pelatihan');
Route::get('/pengabdian/pelayanan', [FrontendController::class, 'pelayanan'])->name('pengabdian.pelayanan');

// ============================================================
// PUBLIKASI
// ============================================================
Route::get('/publikasi', [FrontendController::class, 'publikasi'])->name('publikasi');
Route::get('/publikasi/jurnal-bptkspk', [FrontendController::class, 'publikasiJurnalBptkspk'])->name('publikasi.jurnal-bptkspk');
Route::get('/publikasi/jurnal-ojs', [FrontendController::class, 'publikasiJurnalOjs'])->name('publikasi.jurnal-ojs');
Route::get('/publikasi/prosiding-semnas', [FrontendController::class, 'publikasiProsidingSemnas'])->name('publikasi.prosiding-semnas');
Route::redirect('/publikasi/hak-paten', '/publikasi/prosiding-semnas', 301);
Route::redirect('/publikasi/jurnal', '/publikasi/jurnal-bptkspk', 301);
Route::redirect('/publikasi/hak-cipta', '/publikasi/jurnal-ojs', 301);
Route::get('/publikasi/{publikasi}', [FrontendController::class, 'publikasiDetail'])->name('publikasi.detail');

// ============================================================
// KEMITRAAN
// ============================================================
Route::get('/kemitraan', [FrontendController::class, 'kemitraan'])->name('kemitraan');

// ============================================================
// DOKUMEN
// ============================================================
Route::get('/dokumen/arsip', [FrontendController::class, 'arsip'])->name('dokumen.arsip');
Route::get('/dokumen/berita', [FrontendController::class, 'liputanBerita'])->name('dokumen.berita');
Route::get('/dokumen/berita/{slug}', [FrontendController::class, 'liputanBeritaDetail'])->name('dokumen.berita.detail');

// ============================================================
// KONTAK & SUBSCRIBE
// ============================================================
Route::get('/kontak', [FrontendController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [FrontendController::class, 'kontakSubmit'])->name('kontak.submit');
Route::post('/subscribe', [FrontendController::class, 'subscribe'])->name('subscribe');
Route::get('/lang/{locale}', [FrontendController::class, 'setLocale'])->name('lang.switch');
