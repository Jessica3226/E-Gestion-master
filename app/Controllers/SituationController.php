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
        $model = new SituationAdminModel();

        $data = [
            'agent_matricule' => $this->request->getPost('agent_matricule'),
            'date_debut'      => $this->request->getPost('date_debut'),
            'date_fin'        => $this->request->getPost('date_fin'),
            'corps'           => $this->request->getPost('corps'),
            'cat'             => $this->request->getPost('cat'),
            'grade'           => $this->request->getPost('grade'),
            'acte'            => $this->request->getPost('acte'),
            'created_at'      => date('Y-m-d H:i:s')
        ];

        $model->insert($data);

        return redirect()->to('/contrats')->with('success', 'Contrat ajouté avec succès');
    }

    public function situationAdministrative()
    {
        $matricule = session()->get('matricule'); // matricule de l'agent connecté
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