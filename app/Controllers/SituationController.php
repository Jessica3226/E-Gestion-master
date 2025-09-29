<?php
namespace App\Controllers;

use App\Models\SituationAdminModel;
use App\Models\AgentModel;
use CodeIgniter\Controller;

class SituationController extends Controller
{
    public function index()
    {
        return view('contrats');
    }

    public function enregistrer()
    {
        $situationModel = new SituationAdminModel();
        $agentModel = new AgentModel();

        $matricule = $this->request->getPost('agent_matricule');

        $agent = $agentModel->where('matricule', $matricule)->first();

        if (!$agent) {
            return redirect()->back()->withInput()->with('error', "Le matricule $matricule n'existe pas !");
        }
        
        $data = [
            'agent_matricule' => $matricule,
            'date_debut'      => $this->request->getPost('date_debut'),
            'date_fin'        => $this->request->getPost('date_fin'),
            'corps'           => $this->request->getPost('corps'),
            'cat'             => $this->request->getPost('cat'),
            'grade'           => $this->request->getPost('grade'),
            'acte'            => $this->request->getPost('acte'),
            'created_at'      => date('Y-m-d H:i:s')
        ];

        $situationModel->insert($data);

        return redirect()->to('/contrats')->with('success', 'Situation administrative ajoutée avec succès');
    }


    public function situationAdministrative()
    {
        $matricule = session()->get('matricule'); 
        $situationModel = new SituationAdminModel();
        $agentModel = new AgentModel();
    
        $agent = $agentModel->where('matricule', $matricule)->first();
        $situations = $situationModel->getSituationsByAgent($matricule);
    
        return view('situation', [
            'agent' => $agent,
            'situations' => $situations
        ]);
    }
}