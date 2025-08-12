<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAgentsTable extends Migration
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
            'contact' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'cin' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'situation_matrimoniale' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'date_entree' => [
                'type' => 'DATE',
            ],
            'corps' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'grade' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'qualite' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'localisation' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'direction' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->createTable('agents');
    }

    public function down()
    {
        $this->forge->dropTable('agents');
    }
}
