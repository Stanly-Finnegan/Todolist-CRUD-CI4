<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Users extends Entity
{

    public function setPassword(string $pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
    }

    protected $atributes = [
        'id'        => null,
        'name'      => '',
        'email'     => '',
        'password'  => '',
        'uuid'      => '',
        'created_at'  => null,
        'updated_at'     => null,
        'deleted_at'    => null,

    ];
}
