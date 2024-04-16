<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Authentication extends Entity
{

  protected $atributes = [
    'id'        => null,
    'user_id'      => '',
    'token'       => '',
    'created_at'  => null,
    'updated_at' => null,
    'deleted_at'    => null,
  ];
}
