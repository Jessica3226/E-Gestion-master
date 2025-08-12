<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDeleteToCorps extends Migration
{
    public function up()
    {
        $this->forge->addColumn('corps', [
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
           
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('corps', 'deleted_at');
    }
}
