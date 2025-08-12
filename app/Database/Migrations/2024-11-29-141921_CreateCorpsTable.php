<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\MySQLi\Forge;

class CreateCorpsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'    => [ 
             'type' => 'INT',
            'unsigned'  =>  true,
            'auto_increment'    =>true,
        ],
            'sous_operateur'    =>[
                'type'  =>  'VARCHAR',
                'constraint'=>'255',
                'null'  =>false,
            ],
            'operateur'    =>[
                'type'  =>  'VARCHAR',
                'constraint'=>'255',
                'null'  =>false,
            ],
            'encadreur'    =>[
                'type'  =>  'VARCHAR',
                'constraint'=>'255',
                'null'  =>false,
            ],
            'Technicien_Superieur'    =>[
                'type'  =>  'VARCHAR',
                'constraint'=>'255',
                'null'  =>false,
            ],
            'realisateur_adjoin'    =>[
                'type'  =>  'VARCHAR',
                'constraint'=>'255',
                'null'  =>false,
            ],
            'realisateur'    =>[
                'type'  =>  'VARCHAR',
                'constraint'=>'255',
                'null'  =>false,
            ],
            'planificateur'    =>[
                'type'  =>  'VARCHAR',
                'constraint'=>'255',
                'null'  =>false,
            ],
            'cpci'    =>[
                'type'  =>  'VARCHAR',
                'constraint'=>'255',
                'null'  =>false,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('corps');
    }

    public function down()
    {
        $this->forge->dropTable('corps');
    }
}
