<?php

namespace App\Controllers;

use App\Models\ArchiveAgentModel;
use App\Models\ArchiveModel;
use CodeIgniter\Controller;

class ArchiveController extends Controller
{
    // Fonction pour afficher la liste des archives d'agents
    public function index()
    {
        // $archiveModel = new ArchiveAgentModel();
        // $archives = $archiveModel->findAll(); 
        // return view('archives/index', ['archives' => $archives]);
        $archiveModel = new ArchiveModel();

        // On récupère uniquement les logs
        $archives = $archiveModel->orderBy('created_at', 'DESC')->findAll();

        return view('archives/index', ['archives' => $archives]);
    }

    // Fonction pour afficher le formulaire de création d'un agent
    public function create()
    {
        return view('archives/create');
    }

    // Fonction pour enregistrer une nouvelle archive
    public function store()
    {
        $validation =  \Config\Services::validation();

        if (!$this->validate([
            
            'matricule' => 'required|min_length[10]',
            'nom' => 'required|min_length[3]|max_length[100]',
            'prenom' => 'required|min_length[3]|max_length[100]',
            'date_naissance' => 'required|valid_date',
            'contact' => 'required|min_length[10]',
            'cin' => 'required|max_length[15]',
            'situation_matrimoniale' => 'required',
            'date_entree' => 'required|valid_date',
            'corps' => 'required',
            'grade' => 'required',
            'indice' => 'required',
            'qualite' => 'required',
            'localisation' => 'required',
            'direction' => 'required',
            'date_archivage' => 'required|valid_date'
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Créer une instance de modèle pour insérer dans la base de données
        $archiveModel = new ArchiveAgentModel();
        $archiveModel->save([
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
            'date_archivage' => $this->request->getPost('date_archivage')
        ]);
        return redirect()->to('/archives')->with('success', 'Archive ajoutée avec succès.');
    }

    // Fonction pour afficher le formulaire d'édition d'un agent
    public function edit($id)
    {
        $archiveModel = new ArchiveAgentModel();
        $archive = $archiveModel->find($id);

        if (!$archive) {
            return redirect()->to('/archives')->with('error', 'Archive non trouvée.');
        }
        return view('archives/edit', ['archive' => $archive]);
    }

    // Fonction pour mettre à jour une archive
    public function update($id)
    {
        $validation =  \Config\Services::validation();

        if (!$this->validate([
            'matricule' => 'required|min_length[10]',
            'nom' => 'required|min_length[3]|max_length[100]',
            'prenom' => 'required|min_length[3]|max_length[100]',
            'date_naissance' => 'required|valid_date',
            'contact' => 'required|min_length[10]',
            'cin' => 'required|max_length[15]',
            'situation_matrimoniale' => 'required',
            'date_entree' => 'required|valid_date',
            'corps' => 'required',
            'grade' => 'required',
            'indice' => 'required',
            'qualite' => 'required',
            'localisation' => 'required',
            'direction' => 'required',
            'date_archivage' => 'required|valid_date'
        ])) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Créez une instance du modèle pour mettre à jour l'archive
        $archiveModel = new ArchiveAgentModel();
        $archiveModel->update($id, [
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
            'date_archivage' => $this->request->getPost('date_archivage')
        ]);
        return redirect()->to('/archives')->with('success', 'Archive mise à jour avec succès.');
    }

    // Fonction pour supprimer une archive
    public function delete($id)
    {
        $archiveModel = new ArchiveAgentModel();
        if ($archiveModel->delete($id)) {
            return redirect()->to('/archives')->with('success', 'Archive supprimée avec succès.');
        } else {
            return redirect()->to('/archives')->with('error', 'Erreur lors de la suppression de l\'archive.');
        }
    }

    public function deleteAll(){
        $archiveModel = new ArchiveAgentModel();
        $archiveModel->truncate();

        return redirect()->to('/archives')->with('success', 'Archives supprimée avec succès.');
    }
}
