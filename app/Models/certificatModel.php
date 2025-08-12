<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificatModel extends Model
{
    protected $table = 'certificat';
    protected $primaryKey = 'id';
    protected $allowedFields = ['annee', 'agent_id', 'action', 'details', 'created_at'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
}
