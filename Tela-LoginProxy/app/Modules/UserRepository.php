<?php

namespace App\Modules ;

use App\Modules\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;

class UserRepository {

  //? Pega o email e pesquisa no banco onde tive um igual e pega
  public function findBYEmail(string $email) {
    return ModelsUser::where("email", $email)->first();
  }

  //? Pega o array de dados e cria no banco um novo objeto
  public function criaUser(array $dados) {
    return ModelsUser::create([
      'name'    => $dados['name'],
      'email'   => $dados['email'],
      'password'=> Hash::make($dados['password']),
    ]);
  }
}
