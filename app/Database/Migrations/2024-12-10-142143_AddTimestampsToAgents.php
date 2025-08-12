<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToAgents extends Migration
{
    public function up()
    {
        // Ajouter des colonnes seulement si elles n'existent pas
        if (!$this->db->table('agents')->hasColumn('created_at')) {
            $this->forge->addColumn('agents', [
                'created_at' => [
                    'type' => 'DATETIME',
                    'default' => 'CURRENT_TIMESTAMP',
                    'null' => true,
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'default' => 'CURRENT_TIMESTAMP',
                    'on update' => 'CURRENT_TIMESTAMP',
                    'null' => true,
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->table('agents')->hasColumn('created_at')) {
            $this->forge->dropColumn('agents', 'created_at');
            $this->forge->dropColumn('agents', 'updated_at');
        }
    }
}
