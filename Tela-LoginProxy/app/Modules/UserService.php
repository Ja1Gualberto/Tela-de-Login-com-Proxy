<?php

namespace App\Modules;

use App\Modules\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService {

  protected UserRepository $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  public function login(array $credenciais) {

    //? Chama a função da repository e salva o retorno em uma variavel
    $usuario = $this->userRepository->findBYEmail($credenciais['email']);

    //? Hash a senha informada no input de login e compara com o objeto retornado pelo banco
    if ($usuario && Hash::check($credenciais['password'], $usuario->password)) {
      Auth::login($usuario);
      return true;
    }
    return false;
  }

  public function logout() {
    Auth::logout();
  }

  public function register(array $dados) {
    return $this->userRepository->criaUser($dados);
  }
}
