<?php

namespace App\Modules;

use App\Modules\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService {

  public function login(array $credenciais) {
    if (Auth::attempt($credenciais)) {
      return true;
    }
    return false;
  }

  public function logout() {
    Auth::logout();
  }

  public function register(array $dados) {
    return User::create([
      'name'    => $dados['name'],
      'email'   => $dados['email'],
      'password'=> Hash::make($dados['password']),
    ]);
  }
}
