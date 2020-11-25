<?php

use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\KategoriBukuController;
use App\Http\Controllers\Dashboard\BukuController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['admin']], function (){
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
    Route::resource('manajemen-user', UserController::class);
    Route::resource('manajemen-kategoribuku', KategoriBukuController::class);
    Route::resource('manajemen-buku', BukuController::class);
});

Route::group(['middleware' => ['user']], function (){
    return view('welcome');

});
