<?php

namespace App\Models;

use CodeIgniter\Model;

class ArchiveAgentModel extends Model
{
    protected $table = 'archive_agents';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'agent_id', 'matricule',  'nom', 'prenom', 'date_naissance', 'contact', 'cin', 'situation_matrimoniale',
        'date_entree', 'corps', 'grade', 'indice', 'qualite', 'localisation', 'direction', 'date_archivage',
        'created_at', 'updated_at', 'deleted_at'
    ];
    protected $useTimestamps = true;
}
