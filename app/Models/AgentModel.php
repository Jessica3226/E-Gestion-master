<?php

namespace App\Models;

use CodeIgniter\Model;

class AgentModel extends Model
{
    protected $table            = 'agents';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'matricule', 'photo', 'nom', 'prenom', 'date_naissance', 'contact', 'cin', 'situation_matrimoniale', 
        'date_entree', 'corps', 'grade', 'indice', 'qualite', 'localisation', 'direction', 'password', 'email', 'adresse', 'is_logged_in'
    ];
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    protected $returnType       = 'array';

    protected $validationRules = [
        'matricule'        => 'required|numeric|max_length[6]',
        'nom'        => 'required|max_length[100]',
        'prenom'     => 'required|max_length[100]',
        'date_naissance'   => 'required|valid_date',
        'contact'          => 'required|numeric|max_length[10]',
        'cin'              => 'required|alpha_numeric|max_length[12]',
        'situation_matrimoniale'=> 'required|max_length[30]',
        'date_entree'      => 'required|valid_date',
        'corps'            => 'required|max_length[30]',
        'grade'            => 'required|max_length[15]',
        'grade'            => 'required|max_length[15]',
        'qualite'          => 'required|max_length[30]',
        'localisation'           => 'required|max_length[30]',
        'direction'         => 'required|max_length[30]',
    ];

    protected $validationMessages = [
        'cin' => [
            'is_unique' => 'Ce CIN est déjà enregistré.'
        ],
        'contact' => [
            'is_unique' => 'Ce contact est déjà utilisé.'
        ],
        'matricule' => [
            'is_unique' => 'Ce matricule est déjà utilisé.'
        ],
    ];

    public function getAgentsGroupedBy($category){
        $validCategories = ['corps', 'grade', 'direction', 'localisation'];

        if(!in_array($category, $validCategories)){
            return $this->findAll();
        }
        return $this->orderBy($category, 'ASC')->findAll();
    }

}
