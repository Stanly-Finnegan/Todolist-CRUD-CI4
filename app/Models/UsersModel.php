<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{


    protected $table    = 'users_ms';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'name',
        'email',
        'password',
        'uuid',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    protected $returnType = \App\Entities\Users::class;


    //Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    //Validation
    protected $validationRules      = [
        'name' => 'required|min_length[5]|alpha_numeric_punct',
        'email' => 'required|valid_email|is_unique[users_ms.email]',
        'password' => 'required',
        'uuid'  => 'required|is_unique[users_ms.uuid]'


    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Username must be filled in',

        ],

        'email' => [
            'required' => 'Email must be filled in',
            'valid_email' => 'Must provide a valid email address',
            'is_unique' => 'Email already  registered',
        ],

        'password' => [
            'required' => 'Password must be filled in',
        ]

    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
