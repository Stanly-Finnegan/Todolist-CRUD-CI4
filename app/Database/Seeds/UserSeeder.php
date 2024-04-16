<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Ramsey\Uuid\Rfc4122\UuidV4;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{



    public function run()
    {


        $data = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => password_hash('123', PASSWORD_BCRYPT),
            'uuid' => Uuid::uuid4(),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => null,
            'deleted_at' => null
        ];

        $this->db->table('users_ms')->insert($data);
    }
}
