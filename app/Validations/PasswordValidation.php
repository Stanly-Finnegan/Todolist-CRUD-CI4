<?php

namespace App\Validations;

class  PasswordValidation
{

  public function strongPassword($pass, $fields, $data, string &$error = null): bool
  {
    if (preg_match('#[0-9]#', $pass) && preg_match('#[A-Z]#', $pass)) {
      return true;
    } else {
      $error = 'Password is not strong enough!';
      return false;
    }
  }
}
