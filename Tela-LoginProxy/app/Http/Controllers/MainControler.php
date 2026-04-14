<?php

namespace App\Http\Controllers; 

use Illuminate\Routing\Controller;

class MainControler extends Controller {

    public function login() {
        return view('login');
    }
}
