<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HodimlarController;
use App\Http\Controllers\IqtidorliTalabalarController;
use App\Http\Controllers\FanlarController;
use App\Http\Controllers\MaqolaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AsosiyController;
use App\Http\Controllers\YangiliklarController;

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
Route::get('hodimlar-me', [HodimlarController::class, 'showh'])->name('hodimlar.showh');

Route::resource('talabalar', IqtidorliTalabalarController::class);

Route::resource('fanlar', FanlarController::class);

Route::resource('maqolalar', MaqolaController::class);

Route::resource('yangiliklar', YangiliklarController::class);

Auth::routes();

#Route::get('register', [RegisterController::class, 'show_form'])->middleware('auth');
//Route::get('home', [HomeController::class, 'index'])->name('home');
Route::post('home', [AsosiyController::class, 'home'])->name('home');

Route::get('/', [AsosiyController::class, 'index'])->name('asosiy');

Route::post('fullnews', [AsosiyController::class, 'shown'])->name('fullnews.showh');

Route::post('showhodim', [AsosiyController::class, 'showxodim'])->name('showhodim');
