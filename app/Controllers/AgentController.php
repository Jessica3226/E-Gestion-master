<?php

namespace App\Controllers;

use App\Models\AgentModel;
use App\Models\ArchiveAgentModel;
use App\Models\ArchiveModel;
use CodeIgniter\RESTful\ResourceController;

class AgentController extends BaseController
{
    protected $agentModel;

    public function __construct() {
        $this->agentModel = new AgentModel();
    }

    public function index()
    {
        
        $model = new AgentModel();

        $critere = $this->request->getGet('tri') ?? 'corps';

        $allowed = ['corps', 'grade', 'direction', 'situation_matrimoniale', 'localisation'];

        if (!in_array($critere, $allowed)) {
            $critere = 'corps';
        }

        $agents = $model->select("$critere, nom, prenom")
                        ->orderBy($critere)
                        ->orderBy('nom')
                        ->findAll();

        $grouped = [];
        foreach ($agents as $a) {
            $grouped[$a[$critere]][] = [
                'nom' => $a['nom'],
                'prenom' => $a['prenom']
            ];
        }

        return view('grouped', [
            'critere' => $critere,
            'grouped' => $grouped
        ]);
        return view('listesAgent', $data);
    }

    public function create() 
    {
        return view('ajoutAgent');
    }

        public function addAgent()
    {
        $agentModel = new AgentModel();
        $archiveModel = new ArchiveAgentModel();
        $archiveLog = new ArchiveModel();

        $data = [
            'matricule'            => $this->request->getPost('matricule'),
            'nom'        => $this->request->getPost('nom'),
            'prenom'     => $this->request->getPost('prenom'),
            'date_naissance'   => $this->request->getPost('date_naissance'),
            'contact'          => $this->request->getPost('contact'),
            'cin'              => $this->request->getPost('cin'),
            'situation_matrimoniale'=> $this->request->getPost('situation_matrimoniale'),
            'date_entree'      => $this->request->getPost('date_entree'),
            'corps'            => $this->request->getPost('corps'),
            'grade'            => $this->request->getPost('grade'),
            'indice'            => $this->request->getPost('indice'),
            'qualite'          => $this->request->getPost('qualite'),
            'localisation'           => $this->request->getPost('localisation'),
            'direction'         => $this->request->getPost('direction')
        ];
        
        $errors = [];

        if ($agentModel->where('matricule', $data['matricule'])->first()) {
            $errors['matricule'] = "Le matricule existe déjà.";
        }
        if ($agentModel->where('contact', $data['contact'])->first()) {
            $errors['contact'] = "Le contact existe déjà.";
        }
        if ($agentModel->where('cin', $data['cin'])->first()) {
            $errors['cin'] = "Le CIN existe déjà.";
        }

        if (!empty($errors)) {
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        if ($agentModel->insert($data)) {
            $agent_id = $agentModel->getInsertID();
            $data['agent_id'] = $agent_id;
            $data['date_archivage'] = date('Y-m-d H:i:s');
    
            $archiveModel->save($data);

            $archiveLog->insert([
                'user_matricule' => session()->get('matricule'),
                'agent_matricule' => $data['matricule'],
                'action' => 'ajout',
                'details' => json_encode($data),
            ]);
    
            return redirect()->to('/agents')->with('success', 'Agent ajouté avec succès');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout de l\'agent.');
        }
    }
    public function edit($id)
    {
        $agentModel = new AgentModel();
        $agent = $agentModel->find($id);

        if (!$agent) {
            return redirect()->to('/agents')->with('error', 'Agent non trouvé');
        }

        return view('ajoutAgent', ['agent' => $agent]);
    }

    public function update($id)
    {
        $agentModel = new AgentModel();
        $archiveModel = new ArchiveAgentModel();
        $archiveLog = new ArchiveModel();

        $oldData = $agentModel->find($id);
        $newData = $this->request->getPost();

        $agentModel->setValidationRules([
            'cin' => "required|alpha_numeric|max_length[12]|is_unique[agents.cin,id,{$id}]",
            'contact' => "required|numeric|max_length[10]|is_unique[agents.contact,id,{$id}]",
            'matricule' => "required|alpha_numeric|max_length[6]|is_unique[agents.matricule,id,{$id}]",
        ]);

        if (!$agentModel->validate($newData)) {
            return redirect()->back()->withInput()->with('errors', $agentModel->errors());
        }

        $agentModel->update($id, $newData);
        
        $archivedData = $newData;
        $archivedData['agent_id'] = $id;
        $archivedData['date_archivage'] = date('Y-m-d H:i:s');
        $archiveModel->save($archivedData);

        // Journal des modifications
        $archiveLog->insert([
            'agent_matricule' => session()->get('matricule'),
            'agent_matricule' => $oldData['matricule'],
            'action' => 'modification',
            'details' => json_encode([
                'avant' => $oldData,
                'apres' => $newData,
            ]),
        ]);

        return redirect()->to('/agents')->with('success', 'Agent modifié avec succès.');
    }

    public function delete($id)
    {
        $archiveAgent = new ArchiveAgentModel();
        $archiveLog = new ArchiveModel();

        $agent = $this->agentModel->find($id);
        if ($agent) {
            $agent['agent_id'] = $id;
            $agent['date_archivage'] = date('Y-m-d H:i:s');
            $archiveAgent->save($agent);

            $archiveLog->insert([
                'agent_matricule' => session()->get('matricule'),
                'agent_matricule' => $agent['matricule'],
                'action' => 'suppression',
                'details' => json_encode($agent),
            ]);

            $this->agentModel->delete($id, true);
            return redirect()->to('/agents')->with('success', 'Agent supprimé avec succès');
        }

        return redirect()->to('/agents')->with('error', 'Agent introuvable');
    }
    public function searchLive()
{
    $query = trim($this->request->getGet('query') ?? '');
    $agentModel = new \App\Models\AgentModel();

    if (strlen($query) < 1) {
        return $this->response->setJSON([]);
    }

    $agents = $agentModel
        ->groupStart()
            ->like('matricule', $query, 'after')
            ->orLike('nom', $query, 'after')
            ->orLike('prenom', $query, 'after')
        ->groupEnd()
        ->findAll(20);

    return $this->response->setJSON($agents);
}

}
