<?php

use App\Http\Controllers\MainControler;
use Illuminate\Support\Facades\Route;


Route::controller(MainControler::class)->group(function(){
  Route::get('/', 'showLoginForm')->name('login');
  Route::get('login-sem-proxy', 'showLoginFormSemProxy')->name('login-sem-proxy');
  Route::get('cadastro','cadastrar')->name('cadastro');
  Route::get('cadastro-sem-proxy', 'cadastrarSemProxy')->name('cadastro-sem-proxy');


  Route::post('cadastro-sem-proxy', 'cadastroSemProxySubmit')->name('cadastroSemProxy.submit');
  Route::post('/login-sem-proxy', 'loginSemProxySubmit')->name('loginSemProxy.submit');

  Route::post('cadastro', 'cadastrarSubmit')->name('cadastrar.submit');
  Route::post('/login','login')->name('login.submit');

  Route::middleware('auth')->group(function () {
    Route::get('home', 'home')->name('home');
    Route::post('logout', 'logout')->name('logout');
  });
});
