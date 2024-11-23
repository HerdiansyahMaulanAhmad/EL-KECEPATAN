<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\PasienController;
use \Illuminate\Auth\Middleware\Authenticate;

Route::middleware([Authenticate::class])->group(function (){
    Route::resource('pasien', PasienController::class);
    Route::resource('daftar', DaftarController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
