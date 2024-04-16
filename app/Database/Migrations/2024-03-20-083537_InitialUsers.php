<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitialUsers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'        => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'email'     => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'password'  => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'uuid'  => [
                'type'           => 'CHAR',
                'constraint'     => '40',
            ],
            'created_at'  => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
            'updated_at'  => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
            'deleted_at'    => [
                'type'           => 'DATETIME',
                'null'           => true
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users_ms');
    }

    public function down()
    {
        $this->forge->dropTable('users_ms');
    }
}
