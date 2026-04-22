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
    //? Com Proxy
    $this->userService = new UserServiceProxy($userService);
    //? Sem Proxy
    // $this->userService =  $userService;
  }

  //? Views do Exemplo
  public function home() {
    return  view('home');
  }

  public function showLoginForm() {
    return view('Com-Proxy.login');
  }

  public function cadastrar() {
    return view('Com-Proxy.cadastro');
  }


  public function login(Request $request) {
    //? Valida os inputs do usuario
    $credenciais = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    //? Usa a função que retorna uma booleano para o caso de true
    if ($this->userService->login($credenciais)) {
      $request->session()->regenerate();

      return redirect()->intended('/home');
    }

    //? Retorna o usuario para a tela de login com uma mensagem de erro em caso de false
    return redirect()->back()->withErrors([
      'email' => 'As credenciais fornecidadas estão erradas'
    ])->onlyInput('email');
  }

  public function logout(Request $request) {
    //? faz o logout
    $this->userService->logout();

    //? Invalida a sessão atual e retorna o usuario para a tela de login
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }

  public function cadastrarSubmit(Request $request) {
    //? Valida os campos de inputs do usuario
    $request->validate([
      'name'     => 'required|string|max:255',
      'email'    => 'required|email|unique:users,email',
      'password' => 'required',
    ]);

    //? Usa a função que registra no banco e redireciona pra Home com uma mensagem
    $this->userService->register($request->only('name','email', 'password'));

    return redirect()->route('login')->with('success', 'Conta criada! Faça login.');
  }
}
