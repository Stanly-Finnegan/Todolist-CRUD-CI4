<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitialTodoList extends Migration
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
            'user_id'  => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'title'      => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'uuid'  => [
                'type'           => 'CHAR',
                'constraint'     => '40',
            ],
            'created_at'  => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at'     => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'    => [
                'type' => 'DATETIME',
                'null' => true,
            ],


        ]);
        $this->forge->addKey('id', true);
        // $this->forge->addForeignKey('auth_token', 'authentication_trs', 'token');
        $this->forge->createTable('todolist_ms');
    }

    public function down()
    {
        $this->forge->dropTable('todolist_ms');
    }
}
