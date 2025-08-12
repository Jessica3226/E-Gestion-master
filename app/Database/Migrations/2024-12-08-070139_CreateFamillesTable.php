<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFamillesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'agent_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'prenom' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'date_naissance' => [
                'type' => 'DATE',
            ],
            'relation' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
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
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('agent_id', 'agents', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('familles');
    }

    public function down()
    {
        $this->forge->dropTable('familles');
    }
}
