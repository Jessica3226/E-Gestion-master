<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeletedAtColumnToAgents extends Migration
{
    public function up()
    {
        // Ajouter la colonne 'deleted_at' à la table 'agents'
        $this->forge->addColumn('agents', [
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true, // par défaut à NULL
            ]
        ]);
    }

    public function down()
    {
        // Supprimer la colonne 'deleted_at' si la migration est inversée
        $this->forge->dropColumn('agents', 'deleted_at');
    }
}
