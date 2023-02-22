<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
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
    Route::get('/list', [PageController::class, 'product']);
});

Route::get('/news/{param}', [PageController::class, 'news']);

Route::prefix('program')->group(function(){
    Route::get('/list', [PageController::class, 'program']);
});

Route::get('AboutUs', function(){
    echo "Profile lengkap kami dapat di lihat pada link About Us berikut ini";
    echo "
    <ul>
        <li>
            <a href='https://www.educastudio.com/about-us'>About Us</a>
        </li>
    </ul>
    ";
});

Route::resource('index', PageController::class);

