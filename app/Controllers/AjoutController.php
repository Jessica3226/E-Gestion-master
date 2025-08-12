<?php
namespace App\Controllers;

class AjoutController extends BaseController
{
    protected $path = WRITEPATH . 'data/agents.json';

    public function index()
    {
        $model = new \App\Models\AgentModel();
        $agents = $this->getAgents();
        $data['agents'] = $model->findAll();
        return view('listesAgent', $data);
    }

    public function create()
    {
        return view('ajoutAgent');
    }

    public function store()
    {
        $agents = $this->getAgents();

        $newAgent = [
            'id' => uniqid(),
            'matricule' => $this->request->getPost('matricule'),
            'nom' => $this->request->getPost('nom'),
            'prenom' => $this->request->getPost('prenom'),
            'date_naissance' => $this->request->getPost('date_naissance'),
            'contact' => $this->request->getPost('contact'),
            'cin' => $this->request->getPost('cin'),
            'situation_matrimoniale' => $this->request->getPost('situation_matrimoniale'),
            'date_entree' => $this->request->getPost('date_entree'),
            'corps' => $this->request->getPost('corps'),
            'grade' => $this->request->getPost('grade'),
            'indice' => $this->request->getPost('indice'),
            'qualite' => $this->request->getPost('qualite'),
            'localisation' => $this->request->getPost('localisation'),
            'direction' => $this->request->getPost('direction'),
        ];

        $agents[] = $newAgent;
        file_put_contents($this->path, json_encode($agents, JSON_PRETTY_PRINT));

        return redirect()->to('/agents');
    }

    private function getAgents()
    {
        if (!file_exists($this->path)) {
            return [];
        }

        $json = file_get_contents($this->path);
        return json_decode($json, true);
    }
}
