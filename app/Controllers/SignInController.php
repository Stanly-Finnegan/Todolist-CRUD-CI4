<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\Authentication;
use App\Models\AuthenticationModel;
use App\Models\UsersModel;
use Ramsey\Uuid\Uuid;
use CodeIgniter\API\ResponseTrait;

class SignInController extends BaseController
{
  use ResponseTrait;

  public function signIn()
  {
    // $post_data = json_decode(file_get_contents('php://input'), true);

    $post_data = $this->request->getPost();

    if ($post_data === null && $post_data === '') {
      return $this->fail('Missing parameter');
    }

    $email = $post_data['email'];
    $password = $post_data['password'];

    $userModel = new UsersModel();

    $user = $userModel->where('email', $email)->first();

    if (!($user && password_verify($password,  $user->password))) {
      // return $this->respond(['success' => true, 'message' => 'Login successful']);
      return $this->fail('Login failed');
    }

    $data = [
      'user_id'  => $user->id,
      'token'   => Uuid::uuid4(),
      'created_at' => date('Y-m-d H-i-s'),
      'updated_at' => null,
      'deleted_at' => null

    ];

    $authentication = new AuthenticationModel();

    if (!$authentication->insert($data)) {
      $errors = $authentication->errors();
      return $this->fail($errors);
    } else {
      // $response = array('success' => true, 'message' => 'Auth successful');
      // echo (json_encode($response));
      return $this->respond(['token' => $data['token'], 'success' => true, 'message' => 'Auth successfull']);
    }
    // echo (json_encode($response));
  }
}
