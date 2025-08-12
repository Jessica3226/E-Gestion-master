<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFamilleAndArchiveTable extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,  // Correction de 'unsigend' à 'unsigned'
                'auto_increment' => true,
            ],
            'nom_famille' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false,
            ],
            'id_agent' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
            ],
            'relation' => [ 
            'type' => 'VARCHAR', 
            'constraint' => '20', 
            'null' => false, 
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
         ]);
         $this->forge->addPrimaryKey('id');
         $this->forge->addForeignKey('id_agent', 'agents', 'id', 'CASCADE', 'CASCADE');
         $this->forge->createTable('famille');
    }

    public function down()
    {
        $this->forge->dropTable('famille');
    }
}
