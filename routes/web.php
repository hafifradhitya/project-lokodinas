<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HalamanbaruController;
use App\Http\Controllers\IdentitaswebsiteController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\PlaylistvideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagberitaController;
use App\Http\Controllers\TagvideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('administrator.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); // Mengarahkan ke halaman register Laravel Breeze

// Route::get('/login', function () {
//     return view('auth.login'); // Mengarahkan ke halaman login Laravel Breeze
// })->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route::get('administrator/dashboard', [DashboardController::class, "dashboard"]);

Route::prefix('administrator')->name('administrator.')->group(function () {
    Route::resource('dasboard', DashboardController::class);
    Route::resource('halamanbaru', HalamanbaruController::class);
    Route::get('identitaswebsite', [IdentitaswebsiteController::class, 'edit'])->name('identitaswebsite.edit');
    Route::put('identitaswebsite', [IdentitaswebsiteController::class, 'update'])->name('identitaswebsite.update');
    Route::resource('berita', BeritaController::class);
    Route::resource('kategoriberita', KategoriberitaController::class);
    Route::resource('tagberita', TagberitaController::class);
    Route::resource('playlistvideo', PlaylistvideoController::class);
    Route::resource('tagvideo', TagvideoController::class);
});
