<?php

namespace App\Models;

use CodeIgniter\Model;

class ArchiveModel extends Model
{
    protected $table = 'archives';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_matricule', 'agent_matricule', 'action', 'details', 'created_at'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
}
