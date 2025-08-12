<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAgentIdToArchiveAgents extends Migration
{
    public function up()
    {
        $fields = [
            'agent_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'null' => false,
            ],
        ];
        $this->forge->addColumn('archive_agents', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('archive_agents', 'agent_id');
    }
}
