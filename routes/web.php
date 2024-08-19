<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AlamatkontakController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BannerhomeController;
use App\Http\Controllers\BannersliderController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DownloadareaController;
use App\Http\Controllers\HalamanbaruController;
use App\Http\Controllers\IdentitaswebsiteController;
use App\Http\Controllers\IklanatasController;
use App\Http\Controllers\IklansidebarController;
use App\Http\Controllers\JejakpendapatController;
use App\Http\Controllers\KategoriberitaController;
use App\Http\Controllers\LogowebsiteController;
use App\Http\Controllers\ManajemenmodulController;
use App\Http\Controllers\ManajemenuserController;
use App\Http\Controllers\MenuwebsiteController;
use App\Http\Controllers\PlaylistvideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekilasinfoController;
use App\Http\Controllers\TagberitaController;
use App\Http\Controllers\TagvideoController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\VideoController;
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
    Route::get('berita/publish/{id_berita}', [BeritaController::class, 'publish'])->name('berita.publish');
    Route::resource('kategoriberita', KategoriberitaController::class);
    Route::resource('tagberita', TagberitaController::class);
    Route::resource('playlistvideo', PlaylistvideoController::class);
    Route::resource('video', VideoController::class);
    Route::resource('tagvideo', TagvideoController::class);
    Route::resource('manajemenuser', ManajemenuserController::class);
    Route::resource('manajemenmodul', ManajemenmodulController::class);
    Route::resource('sekilasinfo', SekilasinfoController::class);

    Route::resource('jejakpendapat', JejakpendapatController::class);
    Route::resource('downloadarea', DownloadareaController::class);
    Route::resource('menuwebsite', MenuwebsiteController::class);
    Route::resource('bannerslider', BannersliderController::class);
    Route::resource('bannerhome', BannerhomeController::class);
    Route::resource('iklansidebar', IklansidebarController::class);

    Route::resource('agenda', AgendaController::class);
    Route::resource('alamatkontak', AlamatkontakController::class);
    Route::resource('logowebsite', LogowebsiteController::class);
    Route::resource('album', AlbumController::class);
    Route::resource('iklanatas', IklanatasController::class);
});

Route::get('testing', [TestingController::class, 'test']);
