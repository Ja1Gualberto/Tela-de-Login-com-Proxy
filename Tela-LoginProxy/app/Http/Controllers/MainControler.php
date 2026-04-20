<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Modules\UserService;
use Illuminate\Http\Request;

class MainControler extends Controller {

  protected $userService;

  public function __construct(UserService $userService)
  {
    // Agora sim a variável da classe recebe o que foi injetado
    $this->userService = $userService;
  }

  public function home() {
    return  view('home');
  }

  public function login() {
    return view('login');
  }

  public function cadastrar() {
    return view('cadastro');
  }

  public function authenticate(Request $request) {
    $credenciais = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if ($this->userService->login($credenciais)) {
      $request->session()->regenerate();

      return redirect()->intended('/home');
    }
    return redirect()->back()->withErrors([
      'email' => 'As credenciais fornecidadas estão erradas'
    ])->onlyInput('email');
  }

}
