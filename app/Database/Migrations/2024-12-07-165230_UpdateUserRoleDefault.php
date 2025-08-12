<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUserRoleDefault extends Migration
{
    public function up()
    {
        $fields = [
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'default' => 'user',
                'null' => false,
            ],
        ];
        $this->forge->modifyColumn('users', $fields);
    }

    public function down()
    {
        $fields = [
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
        ];
        $this->forge->modifyColumn('users', $fields);
    }
}
