<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthenticationModel extends Model
{

  protected $table    = 'authentication_trs';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'user_id',
    'token',
    'created_at',
    'updated_at',
    'deleted_at'
  ];
  protected $returnType =  \App\Entities\Authentication::class;


  //Dates
  protected $useTimestamps = true;
  protected $dateFormat = 'datetime';
  protected $createdField = 'created_at';
  protected $deletedField = 'deleted_at';


  protected $validationRules      = [
    'user_id' => 'required',
    'token'  => 'required'
  ];
  protected $validationMessages   = [
    'user_id' => [
      'required' => 'auth : user_id null',
    ],
    'token' => [
      'required' => 'auth :token null',

    ]
  ];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // $this->join(user_ms, 'authentication_tr.user_id = user_ms.user_id')
  // $this->where(user_ms.uuid, $uuid)
}
