<?php


namespace App\Controllers;

use App\Entities\TodoList;
use App\Models\AuthenticationModel;
use App\Models\TodoListModel;
use App\Models\UsersModel;
use CodeIgniter\API\ResponseTrait;
use Ramsey\Uuid\Uuid;

class HomeController extends BaseController
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

  public function addList()
  {
    // $post_data = json_decode(file_get_contents('php://input'), true);

    $post_data = $this->request->getPost();

    $title = $post_data['title'];
    $desc = $post_data['description'];
    // $token = $post_data['token'];
    $jwt = $this->checkAuthorization();


    $authModel = new AuthenticationModel();

    $auth_data = $authModel->where('token', $jwt)->first();
    $userID = $auth_data->user_id;

    if ($userID) {
      $data = [
        'title' => $title,
        'description' => $desc,
        'user_id' => $userID,
        'uuid' => Uuid::uuid4(),
        'created_at' => date('Y-m-d H-i-s'),
      ];
    } else {
      return $this->respond(['success' => false, 'message' => 'Add failed']);
    }


    $todoListModel = new TodoListModel();

    if (!$todoListModel->insert($data)) {
      $errors = $todoListModel->errors();
      return $this->respond(['success' => false, 'error message' => $errors]);
    } else {
      return $this->respond(['success' => true, 'message' => 'Add List successful']);
    }
  }

  public function fetchData()
  {
    // $post_data = json_decode(file_get_contents('php://input'), true);
    // $token = $post_data['token'];

    $jwt = $this->checkAuthorization();

    $authModel = new AuthenticationModel();

    $auth_data = $authModel->where('token', $jwt)->first();
    $userID = $auth_data->user_id;

    $todolistModel = new TodoListModel();

    $data = $todolistModel->select('title, description, uuid')->where('user_id', $userID)->findAll();

    return $this->respond(['success' => true, 'message' => 'Fetch Success', 'result' => $data]);
  }


  public function deleteData($uuid)
  {
    // $post_data = json_decode(file_get_contents('php://input'), true);
    // $post_data = $this->request->getPost();

    // $uuid = $post_data['uuid'];

    $todolistModel = new TodoListModel();


    if ($todolistModel->where('uuid', $uuid)->delete()) {
      return $this->respond(['success' => true, 'message' => 'Delete Successfully']);
    } else {
      return $this->respond(['success' => false, 'message' => 'Delete Failed']);
    }
  }

  public function editData()
  {
    // $post_data = json_decode(file_get_contents('php://input'), true);
    $post_data = $this->request->getPost();

    $uuid = $post_data['uuid'];
    $title = $post_data['title'];
    $description = $post_data['desc'];


    $todolistModel = new TodoListModel();

    // $todolistId = $todolistModel->where('uuid', $uuid)->first();

    $data = [
      'title' => $title,
      'description' => $description
    ];


    if ($todolistModel->where('uuid', $uuid)->update(null, $data)) {
      return $this->respond(['success' => true, 'message' => 'Edit Successfully']);
    } else {
      return $this->fail(['success' => false, 'message' => 'Delete Failed']);
    }
  }

  public function updateData()
  {
    // $post_data = json_decode(file_get_contents('php://input'), true);
    $post_data = $this->request->getRawInput();
    if ($post_data === null || $post_data === '') {
      return $this->fail('Missing parameter');
    }


    $uuid = $post_data['uuid'];
    $title = $post_data['title'];
    $description = $post_data['desc'];

    $todolistModel = new TodoListModel();

    // $todolistId = $todolistModel->where('uuid', $uuid)->first();

    $data = [
      'title' => $title,
      'description' => $description
    ];


    if ($todolistModel->where('uuid', $uuid)->update(null, $data)) {
      return $this->respond(['success' => true, 'message' => 'Edit Successfully']);
    } else {
      return $this->fail(['success' => false, 'message' => 'Delete Failed']);
    }
  }
}
