<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArtikelModelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\HobiModelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeluargaModelController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahModelController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::get('logout', [LoginController::class, 'logout']);
Route::get('/tes', function(){
    echo Hash::make('1')."<br>";
    echo Hash::make('1')."<br>";
    echo Hash::make('1')."<br>";

});

Route::middleware(['auth'])->group(function(){
    // Route::get('/home', [HageController::class, 'index']);


    Route::prefix('product')->group(function(){
        Route::get('/list', [ProductController::class, 'product']);
    });

    Route::get('/news/{param}', [NewsController::class, 'news']);

    Route::prefix('program')->group(function(){
        Route::get('/lis', [ProgramController::class, 'program']);
    });

    Route::get('/about-us', [AboutUsController::class, 'index']);

    Route::resource('index', PageController::class);

    Route::get('/contact-us', [ContactUsController::class, 'index']);

    Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/pengalaman', [PengalamanController::class, 'index'])->name('pengalaman');

    Route::get('/artikel', [ArtikelModelController::class, 'index']);

    Route::resource('/hobi', HobiModelController::class);

    Route::resource('/matakuliah', MatakuliahModelController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/mahasiswa', MahasiswaController::class);
    Route::resource('/keluarga', KeluargaModelController::class);

    Route::resource('/fasilitas', FasilitasController::class);

    Route::get('mahasiswa/nilai/{id}', [MahasiswaController::class, 'nilai'])->name('nilai');
});

