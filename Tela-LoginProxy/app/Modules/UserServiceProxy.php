<?php

namespace App\Modules;

use Illuminate\Support\Facades\Log;

class UserServiceProxy {
  protected UserService $userService;

  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }

  public function login(array $credenciais): bool {
    Log::info('Tentativa de login', ['email' => $credenciais['email']]);

    $resultado = $this->userService->login($credenciais);

    if ($resultado) {
      Log::info('Login Bem sucedido', ['email' => $credenciais['email']]);
    }else {
      Log::info('Login Falhou', ['email' => $credenciais['email']]);
    }
    return $resultado;
  }

  public function logout(): void {
    Log::info('Usuario fez logout');
  }

  public function register(array $dados) {
    Log::info('Tentativa de cadastro', ['email' => $dados['email']]);

    $usuario = $this->userService->register($dados);

    Log::info('Cadastro realizado com sucesso', ['email' => $dados['email']]);

    return $usuario;
  }
}
