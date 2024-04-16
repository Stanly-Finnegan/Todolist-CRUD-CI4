<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class TodoList extends Entity
{

    protected $atributes = [
        'id'        => null,
        'user_id' => '',
        'title'      => '',
        'description'  => '',
        'uuid'      => '',
        'created_at'  => null,
        'updated_at'     => null,
        'deleted_at'    => null,
    ];
}
