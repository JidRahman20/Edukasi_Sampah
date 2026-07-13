<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes — Website Edukasi Sampah
|--------------------------------------------------------------------------
*/

// ── Halaman Publik (tanpa login) ────────────────────────────────────────
Route::get('/', [PublicController::class, 'beranda'])->name('beranda');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');

// Materi Edukasi
Route::prefix('materi')->name('materi.')->group(function () {
    Route::get('/', [PublicController::class, 'materiIndex'])->name('index');
    Route::get('/pengertian-sampah', [PublicController::class, 'pengertian'])->name('pengertian');
    Route::get('/jenis-sampah', [PublicController::class, 'jenis'])->name('jenis');
    Route::get('/cara-pemilahan', [PublicController::class, 'pemilahan'])->name('pemilahan');
    Route::get('/prinsip-3r', [PublicController::class, 'tigaR'])->name('tiga-r');
});

Route::get('/galeri', [PublicController::class, 'galeri'])->name('galeri');
Route::get('/video', [PublicController::class, 'video'])->name('video');
Route::get('/tips', [PublicController::class, 'tips'])->name('tips');

// Evaluasi
Route::get('/evaluasi', [PublicController::class, 'evaluasi'])->name('evaluasi');
Route::post('/evaluasi', [PublicController::class, 'evaluasiSubmit'])->name('evaluasi.submit');

// Kontak
Route::get('/kontak', [PublicController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [PublicController::class, 'kontakSubmit'])->name('kontak.submit');

// ── Admin Panel (hanya untuk admin) ────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    // Redirect /admin ke dashboard (akan di-redirect ke login jika belum auth)
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    // Dashboard admin — protected
    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        
        Route::resource('materials', \App\Http\Controllers\Admin\MaterialController::class);
        Route::resource('videos', \App\Http\Controllers\Admin\VideoController::class);
        Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
        
        Route::get('evaluations/form', [\App\Http\Controllers\Admin\EvaluationController::class, 'form'])->name('evaluations.form');
        Route::get('evaluations', [\App\Http\Controllers\Admin\EvaluationController::class, 'index'])->name('evaluations.index');
        Route::get('visitors', [\App\Http\Controllers\Admin\VisitorController::class, 'index'])->name('visitors.index');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// ── Auth (hanya admin yang diarahkan ke sini) ───────────────────────────
Route::prefix('admin')->group(function () {
    require __DIR__.'/auth.php';
});
