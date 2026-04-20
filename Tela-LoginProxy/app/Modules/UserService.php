<?php

namespace App\Modules;
use Illuminate\Support\Facades\Auth;

class UserService {
  public function login(array $credenciais) {
    if (Auth::attempt($credenciais)) {
      return true;
    }
    return false;
  }
  public function logout(array $credenciais) {
    Auth::logout();
  }
}
