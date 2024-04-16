<?php

namespace App\Models;

use App\Entities\TodoList;
use CodeIgniter\Model;

class TodoListModel extends Model
{

    protected $table    = 'todolist_ms';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'title',
        'description',
        'uuid',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $returnType =  \App\Entities\TodoList::class;

    //Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    //Validation
    protected $validationRules      = [
        'user_id' => 'required',
        'title' => 'required',
        'uuid'  => 'required'
    ];
    protected $validationMessages   = [
        'user_id' => [
            'required' => 'auth : user_id null',
        ],
        'title' => [
            'required' => 'Title must be filled in'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
