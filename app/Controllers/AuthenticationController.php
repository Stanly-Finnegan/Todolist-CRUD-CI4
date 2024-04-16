<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthenticationModel;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;


class AuthenticationController extends BaseController
{

  use ResponseTrait;

  public function tokenDelete()
  {
    $post_data = json_decode(file_get_contents('php://input'), true);

    $authToken = $post_data['token'];

    $authenticationModel = new AuthenticationModel();

    if ($authenticationModel->where('token', $authToken)->delete()) {
      return $this->respond(['success' => true, 'message' => 'Successfully logged out']);
    } else {
      return $this->respond(['success' => false, 'message' => 'failed logged out']);
    }
  }

  public function tokenValidate()
  {
    $post_data = json_decode(file_get_contents('php://input'), true);

    $authToken = $post_data['token'];

    $authenticationModel = new AuthenticationModel();
    $auth = $authenticationModel->where('token', $authToken)->first();


    if ($auth) {
      return $this->respond(['message' => 'Token valid', 'success' => true]);
    } else {
      return $this->respond(['message' => 'Token Invalid', 'success' => false]);
    }
  }
}
