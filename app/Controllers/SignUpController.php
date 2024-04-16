<?php

namespace App\Controllers;

use App\Models\UsersModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\API\ResponseTrait;


class SignUpController extends BaseController
{

  use  ResponseTrait;

  public function signUp()
  {

    $validation = \Config\Services::validation();

    $post_data = json_decode(file_get_contents('php://input'), true);

    $validation->setRuleGroup('strongPasswordValidation');

    if ($validation->run($post_data) === false) {
      return $this->fail(['message' => $validation->getErrors()]);
    }

    $name = $post_data['name'];
    $email = $post_data['email'];
    $password = $post_data['password'];

    $data = [
      'name' => $name,
      'email' => $email,
      'password' => $password ? password_hash($password, PASSWORD_BCRYPT) : null,
      'uuid' => Uuid::uuid4()->toString(),
    ];

    // echo ($data['uuid']);

    $userModel = new UsersModel();

    if ($userModel->insert($data) === false) {
      $errors = $userModel->errors();
      // echo ($errors);
      return $this->fail(['success' => false, 'message' => $errors]);
    } else {
      return $this->respond(['success' => true, 'message' => 'Register successful']);
    }
  }
}
