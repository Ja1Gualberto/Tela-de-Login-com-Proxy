<?php

use App\Http\Controllers\MainControler;
use Illuminate\Support\Facades\Route;

Route::controller(MainControler::class)->group(function(){
  Route::get('home', 'home' )->name('home');
  Route::get('/', 'login')->name('login');
  Route::get('cadastro','cadastro')->name('cadastro');
});
