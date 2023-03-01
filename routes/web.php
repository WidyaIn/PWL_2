<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengalamanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramController;
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

Route::get('/home', [PageController::class, 'index']);

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
