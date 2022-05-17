<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HodimlarController;
use App\Http\Controllers\IqtidorliTalabalarController;
use App\Http\Controllers\FanlarController;
use App\Http\Controllers\MaqolaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('hodimlar', HodimlarController::class);

Route::resource('talabalar', IqtidorliTalabalarController::class);

Route::resource('fanlar', FanlarController::class);

Route::resource('maqolalar', MaqolaController::class);

Auth::routes();

#Route::get('register', [RegisterController::class, 'show_form'])->middleware('auth');
#Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
