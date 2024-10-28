<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    DosenController,
    DosenBiasaController,
    KaprodiController,
    KelasController,
    MahasiswaController,
    PlottingController,
    PostController
};

// Redirect root to the login page
Route::get('/', fn() => redirect()->route('login'));

// Login and logout routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes protected by authentication middleware
Route::middleware('auth')->group(function () {

    // Profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/post', [PostController::class, 'profile'])->name('post.profile');
        Route::get('/mahasiswa', [MahasiswaController::class, 'profile'])->name('mahasiswa.profile');
        Route::get('/dosen_biasa', [DosenBiasaController::class, 'profile'])->name('dosen_biasa.profile');
    });

    // Dashboard routes
    Route::prefix('layout')->group(function () {
        Route::get('/kaprodidasbor', [KaprodiController::class, 'dashboard'])->name('layout.kaprodidasbor');
        Route::get('/mahasiswadashboard', [MahasiswaController::class, 'dashboard'])->name('layout.mahasiswadashboard');
        Route::get('/dosendashboard', [DosenController::class, 'dashboard'])->name('layout.dosendashboard');
        Route::get('/dosenbiasadashboard', [DosenBiasaController::class, 'index'])->name('layout.dosenbiasadashboard');
        Route::get('/mahasiswadasbor', [MahasiswaController::class, 'dasbor'])->name('layout.mahasiswadasbor');
        Route::get('/dosendasbor', [DosenController::class, 'dasbor'])->name('layout.dosendasbor');
    });

    // Dosen routes
    Route::prefix('dosen')->group(function () {
        Route::get('/index', [DosenController::class, 'dashboard'])->name('dosen.index');
        Route::post('/requests/{id}/approve', [DosenController::class, 'approveRequest'])->name('dosen.requests.approve');
        Route::post('/requests/{id}/reject', [DosenController::class, 'rejectRequest'])->name('dosen.requests.reject');
    });

    // Mahasiswa routes
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/request_edit', [MahasiswaController::class, 'showRequestEditForm'])->name('mahasiswa.request_edit');
        Route::post('/{id}/request-edit', [MahasiswaController::class, 'submitRequestEdit'])->name('mahasiswa.request_edit.submit');
        Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    });

    // Post routes
    Route::prefix('post')->group(function () {
        Route::get('/request', [PostController::class, 'index'])->name('post.request.index');
        Route::get('/jadwal', [DosenController::class, 'show'])->name('post.jadwal');
    });

    // Kaprodi routes
    Route::prefix('kaprodi')->group(function () {
        Route::get('/mahasiswa', [KaprodiController::class, 'mahasiswa'])->name('kaprodi.mahasiswa');
    });
});

// Plotting routes
Route::prefix('plotting')->group(function () {
    Route::get('/', [PlottingController::class, 'index'])->name('plotting.index');
    Route::get('/create', [PlottingController::class, 'create'])->name('plotting.create');
    Route::post('/', [PlottingController::class, 'store'])->name('plotting.store');
    Route::delete('/{id}', [PlottingController::class, 'destroy'])->name('plotting.destroy');
});

// Resource routes protected by authentication
Route::middleware('auth')->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('dosen_biasa', DosenBiasaController::class);
    Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
});

// Additional routes outside the grouping
Route::get('/layout/dosenbiasadasbor', [DosenBiasaController::class, 'dasbor'])->name('layout.dosenbiasadasbor');
Route::get('/dosen_biasa/jadwal', [DosenBiasaController::class, 'show'])->name('dosen_biasa.jadwal');
Route::get('/mahasiswa/jadwal', [MahasiswaController::class, 'show'])->name('mahasiswa.jadwal');
