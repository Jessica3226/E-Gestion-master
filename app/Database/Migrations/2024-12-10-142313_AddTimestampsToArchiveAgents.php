<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTimestampsToArchiveAgents extends Migration
{
    public function up()
    {
        // Ajouter des colonnes seulement si elles n'existent pas
        if (!$this->db->table('archive_agents')->hasColumn('created_at')) {
            $this->forge->addColumn('archive_agents', [
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
                'date_archivage' => [
                    'type' => 'DATETIME',
                    'default' => 'CURRENT_TIMESTAMP',
                    'null' => true,
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->table('archive_agents')->hasColumn('created_at')) {
            $this->forge->dropColumn('archive_agents', 'created_at');
            $this->forge->dropColumn('archive_agents', 'updated_at');
            $this->forge->dropColumn('archive_agents', 'date_archivage');
        }
    }
}
