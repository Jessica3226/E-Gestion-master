<?php
namespace App\Controllers;

use App\Models\FamilleModel;
use App\Models\AgentModel;
use App\Models\ArchiveModel;

class FamilleController extends BaseController {

    protected $familleModel;
    protected $agentModel;
    protected $archiveModel;

    public function __construct() {
        $this->familleModel = new FamilleModel();
        $this->agentModel = new AgentModel();
        $this->archiveModel = new ArchiveModel();
    }

    public function cre() {
        $familles = $this->familleModel->findAll();
        return view('familleAgent', [
            'famille' => $familles
        ]);
    }

    public function index() {
        return view('ajoutFamille'); 
    }

    public function store() {
        $matricule = $this->request->getPost('matricule');
        $nom       = $this->request->getPost('nom_famille');
        $prenom    = $this->request->getPost('prenom');
        $dateNaiss = $this->request->getPost('date_naissance');
        $relation  = $this->request->getPost('relation');
        $contact   = $this->request->getPost('contact');

        $agent = $this->agentModel->where('matricule', $matricule)->first();
        if (!$agent) {
            return redirect()->back()->withInput()->with('error', "Le matricule $matricule n'existe pas !");
        }

        if (in_array($relation, ['Conjoint', 'Conjointe'])) {
            $existeConjoint = $this->familleModel
                ->where('matricule', $matricule)
                ->groupStart()
                    ->where('relation', 'Conjoint')
                    ->orWhere('relation', 'Conjointe')
                ->groupEnd()
                ->first();

            if ($existeConjoint) {
                return redirect()
                ->back()
                ->withInput()
                ->with('error', "L'agent avec matricule $matricule a déjà un conjoint/conjointe !");
            }
        }

        $data = [
            'matricule'      => $matricule,
            'nom_famille'    => $nom,
            'prenom'         => $prenom,
            'date_naissance' => $dateNaiss,
            'relation'       => $relation,
            'contact'        => $contact,
            'created_at'     => date('Y-m-d H:i:s')
        ];

        $this->familleModel->insert($data);

        $this->archiveModel->insert([
            'user_matricule'  => session()->get('user_matricule') ?? 'SYSTEM',
            'agent_matricule' => $matricule,
            'action'          => 'ajout',
            'details'         => json_encode($data),
            'created_at'      => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/familleAgent')->with('success', 'Membre ajouté avec succès !');
    }

    public function edit($id) {
        $famille = $this->familleModel->find($id);
        if (!$famille) {
            return redirect()->to('/familleAgent')->with('error', 'Membre non trouvé.');
        }

        $agent = $this->agentModel->where('matricule', $famille['matricule'])->first();

        return view('ajoutFamille', [
            'famille' => $famille,
            'agent'   => $agent
        ]);
    }

    public function update($id) {
        
        $archiveLog = new ArchiveModel();
        $familleModel = $this->familleModel;
    
        $oldData = $familleModel->find($id);
        $newData = $this->request->getPost();
    
        $apres = [
            'nom_famille'    => $this->request->getPost('nom_famille'),
            'prenom'         => $this->request->getPost('prenom'),
            'date_naissance' => $this->request->getPost('date_naissance'),
            'relation'       => $this->request->getPost('relation'),
            'contact'        => $this->request->getPost('contact')
        ];
    
        $familleModel->update($id, $apres);
    
        $archiveLog->insert([
            'user_matricule' => session()->get('matricule'),
            'agent_matricule' => $oldData['matricule'],
            'action' => 'modification',
            'details' => json_encode([
                'avant' => $oldData,
                'apres' => $newData,
            ]),
        ]);
    
        return redirect()->to('/familleAgent')->with('success', 'Membre modifié avec succès !');
    }
    

    public function delete($id) {
        $famille = $this->familleModel->find($id);
        if (!$famille) {
            return redirect()->to('/familleAgent')->with('error', 'Membre non trouvé.');
        }

        $this->familleModel->delete($id);

        $this->archiveModel->insert([
            'user_matricule'  => session()->get('user_matricule') ?? 'SYSTEM',
            'agent_matricule' => $famille['matricule'],
            'action'          => 'suppression',
            'details'         => json_encode($famille),
            'created_at'      => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/familleAgent')->with('success', 'Membre supprimé avec succès.');
    }
}
