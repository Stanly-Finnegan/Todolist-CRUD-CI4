<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthenticationModel;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;


class AuthenticationController extends BaseController
{

  use ResponseTrait;

  private function checkAuthorization()
  {
    $bearerToken =  $this->request->getHeaderLine('Authorization');

    if ((string)$bearerToken !== '') {
      $explodeBearerToken = explode(' ', $bearerToken);

      if ($explodeBearerToken[0] ===  'Bearer') {
        // print($explodeBearerToken[1]);
        return $explodeBearerToken[1];
      }
    }
    return 'Authorization Null';
  }

  public function tokenDelete()
  {
    $jwt = $this->checkAuthorization();
    // $post_data = json_decode(file_get_contents('php://input'), true);

    // $authToken = $post_data['token'];

    $authenticationModel = new AuthenticationModel();

    if ($authenticationModel->where('token', $jwt)->delete()) {
      return $this->respond(['success' => true, 'message' => 'Successfully logged out']);
    } else {
      return $this->fail(['success' => false, 'message' => 'failed logged out']);
    }
  }

  public function tokenValidate()
  {
    $jwt = $this->checkAuthorization();

    // $post_data = json_decode(file_get_contents('php://input'), true);

    // $authToken = $post_data['token'];

    $authenticationModel = new AuthenticationModel();
    $auth = $authenticationModel->where('token', $jwt)->first();

    if ($auth) {
      return $this->respond(['message' => 'Token valid', 'success' => true]);
    } else {
      return $this->fail(['message' => 'Token Invalid', 'success' => false]);
    }
  }
}
