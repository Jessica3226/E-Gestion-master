<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLocalisationDirectionNomTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('direction',[
            'direction'=>[
                'type'=>'VARCHAR',
                'constraint'=>'30',
                'null'=>false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('direction',['direction']);
    }
}
