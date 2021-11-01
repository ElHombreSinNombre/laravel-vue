<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\CarController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\CarDeletedMailController;

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

//Auth

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

///////////

Route::get('/choose', function () {
    return view('choose');
})->name('choose')->middleware('auth');

Route::resource('cars', CarController::class)->middleware('auth');

Route::resource('people', PersonController::class)->middleware('auth');

Route::get('/send', [CarDeletedMailController::class, 'email'])->name('email');

