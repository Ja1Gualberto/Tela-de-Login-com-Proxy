<?php

namespace App\Modules;

use App\Models\User as ModelsUser;

class UserRepository {
  public function findBYEmail(string $email) {
    return ModelsUser::where("email", $email)->first();
  }
}
