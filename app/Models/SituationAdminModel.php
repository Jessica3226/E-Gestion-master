<?php
namespace App\Models;
use CodeIgniter\Model;

class SituationAdminModel extends Model
{
    protected $table = 'situations_admin';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'agent_matricule', 'date_debut', 'date_fin', 
        'corps', 'cat', 'grade', 'acte'
    ];

    // Gestion auto created_at / updated_at
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField     = 'deleted_at';
    protected $returnType       = 'array';

    public function getSituationsByAgent($agent_matricule)
    {
        return $this->where('agent_matricule', $agent_matricule)
                    ->orderBy('date_debut', 'DESC')
                    ->findAll();
    }

}
