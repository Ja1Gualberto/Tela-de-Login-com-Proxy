<?php

use App\Http\Controllers\MainControler; 
use Illuminate\Support\Facades\Route;

Route::controller(MainControler::class)->group(function(){
    Route::get('/', 'login')->name('login');
});
