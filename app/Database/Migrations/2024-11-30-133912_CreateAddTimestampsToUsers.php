<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAddTimestampsToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('corps', ['created_at', 'updated_at']);
    }
}
