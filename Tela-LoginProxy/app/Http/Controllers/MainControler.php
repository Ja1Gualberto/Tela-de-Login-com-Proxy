<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Modules\UserService;
use App\Modules\UserServiceProxy;
use Illuminate\Http\Request;

class MainControler extends Controller {

  protected $userService;

  public function __construct(UserService $userService)
  {
    $this->userService = new UserServiceProxy($userService);
  }

  public function home() {
    return  view('home');
  }

  public function showLoginFormSemProxy() {
    return view('login-sem-proxy');
  }

  public function showLoginForm() {
    return view('login');
  }

  public function cadastrarSemProxy() {
    return view('cadastro-sem-proxy');
  }

  public function cadastrar() {
    return view('cadastro');
  }

  public function login(Request $request) {
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

  public function logout(Request $request) {
    $this->userService->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }

  public function cadastrarSubmit(Request $request) {
    $request->validate([
      'name'     => 'required|string|max:255',
      'email'    => 'required|email|unique:users,email',
      'password' => 'required',
    ]);

    $this->userService->register($request->only('name','email', 'password'));

    return redirect()->route('login')->with('success', 'Conta criada! Faça login.');
  }
}
