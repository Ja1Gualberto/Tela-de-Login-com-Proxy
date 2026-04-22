<?php

namespace App\Modules;

use Illuminate\Support\Facades\Log;

class UserServiceProxy {
  protected UserService $userService;

  //? Construct que acessa as ações da service real
  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }

  //? Usa a função de login da service principal e faz o log
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

  //? Usa a função de registrar  da service principal e faz o log
  public function register(array $dados) {
    Log::info('Tentativa de cadastro', ['email' => $dados['email']]);

    $usuario = $this->userService->register($dados);

    Log::info('Cadastro realizado com sucesso', ['email' => $dados['email']]);

    return $usuario;
  }
}
