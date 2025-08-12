<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyToAgence extends Migration
{
    public function up()
    {
        
        $this->forge->addColumn('agents', [
            'CONSTRAINT fk_id_corps FOREIGN KEY (id_corps) REFERENCES corps(id) ON DELETE CASCADE ON UPDATE CASCADE',
        ]);
    }

    public function down()
    {
        $this->forge->dropForeignKey('agence', 'fk_id_corps');
    }
}
