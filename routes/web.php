<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('login/{provider}', [App\Http\Controllers\SocialController::class, 'redirect']);
Route::get('login/{provider}/callback', [App\Http\Controllers\SocialController::class, 'Callback']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{stepId}', [App\Http\Controllers\HomeController::class, 'indexById'])->name('home2');
Route::get('/newgame', [App\Http\Controllers\GameController::class, 'formCreateGame'])->name('newgame');
Route::post('/newgame', [App\Http\Controllers\GameController::class, 'newgame'])->name('game');
Route::get('/game/{id}', [App\Http\Controllers\GameController::class, 'index'])->name('game');
Route::resource('users', App\Http\Controllers\UserController::class);
Route::post('/makeChoice', [App\Http\Controllers\GameController::class, 'makeChoice'])->name('makeChoice');
Route::get('/result/{id}', [App\Http\Controllers\ResultController::class, 'index'])->name('result');
