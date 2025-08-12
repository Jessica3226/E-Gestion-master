<?php
namespace App\Models;

use CodeIgniter\Model;

class FamilleModel extends Model
{
    protected $table            = 'familles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        'matricule', 
        'nom_famille', 
        'prenom', 
        'date_naissance', 
        'relation', 
        'contact'
    ];
    protected $useTimestamps = false;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
    protected $deletedField     = 'deleted_at';
    
    /*
     * Règles de validation
     */
    protected $validationRules = [
        'matricule'      => 'required|is_natural_no_zero', 
        'nom_famille'   => 'required|max_length[50]',
        'prenom'        => 'required|max_length[50]',
        'date_naissance'=> 'required|valid_date[Y-m-d]',
        'relation'      => 'required|in_list[Conjoint, Conjointe ,Enfant]', 
        'contact'       => 'required|regex_match[/^[0-9]{10}$/]'
    ];

    // Définir des messages d'erreur personnalisés
    protected $validationMessages = [
        'matricule' => [
            'required' => 'L\'ID de l\'agent est requis.',
            'is_natural_no_zero' => 'L\'ID de l\'agent doit être un nombre naturel non nul.'
        ],
        'nom_famille' => [
            'required' => 'Le nom de la famille est requis.',
            'max_length' => 'Le nom de la famille ne doit pas dépasser 50 caractères.'
        ],
        'prenom' => [
            'required' => 'Le prénom est requis.',
            'max_length' => 'Le prénom ne doit pas dépasser 50 caractères.'
        ],
        'date_naissance' => [
            'required' => 'La date de naissance est requise.',
            'valid_date' => 'La date de naissance doit être valide au format YYYY-MM-DD.'
        ],
        'relation' => [
            'required' => 'La relation est requise.',
            'in_list' => 'La relation doit être l\'une des valeurs suivantes : Conjoint, Conjointe, Enfant.'
        ],
        'contact' => [
            'required' => 'Le contact est requis.',
            'regex_match' => 'Le contact doit être un numéro de téléphone valide avec 10 chiffres.'
        ]
    ];

     public function matriculeExists(string $matricule): bool
    {
        return $this->where('matricule', $matricule)->countAllResults() > 0;
    }
}
