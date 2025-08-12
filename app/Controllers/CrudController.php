<?php
namespace App\Controllers;

use App\Models\AgentModel;
use App\Models\FamilleModel;

class CrudController extends BaseController {
    protected $agentModel;
    protected $familleModel;

    public function __construct() {
        $this->agentModel = new AgentModel();
        $this->familleModel = new FamilleModel();
    }

    public function ajoutAgent() {
        return view('ajoutAgent');
    }

    public function listesAgent() {
        $agentModel = new AgentModel();
        $data['agents'] = $this->agentModel->findAll();
        $data['search'] = '';
        return view('listesAgent', $data);
    }

    public function familleAgent() {
        return view('familleAgent');
    }

    public function archivesAgent() {
        // Logique pour récupérer les agents archivés
        $data['agents'] = $this->agentModel->where('archived', true)->findAll();
        return view('archivesAgent', $data);
    }

    public function storeAgent() {
        $data = $this->request->getPost();

        if ($this->agentModel->save($data)) {
            return redirect()->to('/listesAgent')->with('success', 'Agent ajouté avec succès.');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout de l\'agent.');
        }
    }

    public function storeFamille() {
        $data = $this->request->getPost();

        if ($this->familleModel->save($data)) {
            return redirect()->to('/familleAgent')->with('success', 'Membre de la famille ajouté avec succès.');
        } else {
            return redirect()->back()->with('error', 'Erreur lors de l\'ajout du membre de la famille.');
        }
    }
    
}

