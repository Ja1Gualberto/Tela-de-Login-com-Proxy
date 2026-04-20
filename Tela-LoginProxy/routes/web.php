<?php

use App\Http\Controllers\MainControler;
use Illuminate\Support\Facades\Route;


Route::controller(MainControler::class)->group(function(){
  Route::get('/', 'showLoginForm')->name('login');
  Route::get('cadastro','cadastrar')->name('cadastro');
  Route::post('cadastro', 'cadastrarSubmit')->name('cadastrar.submit');

  Route::post('/login','login')->name('login.submit');

  Route::middleware('auth')->group(function () {
    Route::get('home', 'home')->name('home');
    Route::post('logout', 'logout')->name('logout');
  });
});
