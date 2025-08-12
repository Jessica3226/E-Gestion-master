<?php
namespace App\Controllers;

use App\Models\FamilleModel;
use CodeIgniter\HTTP\ResponseInterface;

class FamilleController extends BaseController {
    protected $familleModel;

    public function __construct() {
        $this->familleModel = new FamilleModel();
    }

    public function cre()
    {
        return view('familleAgent');
    }

    public function auth()
    {
        $matricule = $this->request->getPost('matricule');

        $familleModel = new FamilleModel();

        if ($familleModel->matriculeExists($matricule)) {
            // Matricule valide - créer la session
            session()->set('matricule', $matricule);
            return redirect()->to('/famille/dashboard');
        } else {
            // Matricule invalide - message d'erreur
            session()->setFlashdata('error', 'Matricule invalide.');
            return redirect()->to('/famille/login');
        }
    }

    public function dashboard()
    {
        $famille = [];
    
        if (session()->has('matricule')) {
            $matricule = session('matricule');
            $famille = $this->familleModel->where('matricule', $matricule)->findAll();
        }
    
        return view('familleAgent', ['famille' => $famille]);
    }
    

    // Créer un nouveau membre de famille
    public function store()
    {
        $model = new FamilleModel();

        $matricule = $this->request->getPost('matricule');
        $relation = $this->request->getPost('relation');

        // Vérifier si relation est Conjoint ou Conjointe
        if ($relation === 'Conjoint' || $relation === 'Conjointe') {
            $countConjoint = $this->familleModel
                                ->where('matricule', $matricule)
                                ->whereIn('relation', ['Conjoint', 'Conjointe'])
                                ->countAllResults();

            if ($countConjoint > 0) {
                // Ici on peut retourner une erreur avec alert JS via session flashdata
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Un agent ne peut avoir qu\'un seul conjoint/conjointe.')
                    ->with('alert_time', 2000); // temps en ms
            }
        }

        $data = [
            'matricule'       => $this->request->getPost('matricule'),
            'nom_famille'    => $this->request->getPost('nom_famille'),
            'prenom'         => $this->request->getPost('prenom'),
            'date_naissance' => $this->request->getPost('date_naissance'),
            'relation'       => $this->request->getPost('relation'),
            'contact'        => $this->request->getPost('contact')
        ];

        if ($model->insert($data)) {
            return redirect()->to('/familles')->with('success', 'Famille ajoutée avec succès.');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }

    public function index()
    {
        return view('ajoutFamille'); 
    }
    
    public function edit($id)
    {   
        $famille = new FamilleModel();
        $fami = $famille->find($id);

        if (!$fami) {
            return redirect()->to('/familles')->with('error', 'Agent non trouvé.');
        }

        return view('familles/edit', ['fami' => $fami]); 
    }

    public function update($id)
    {
        $famille = new FamilleModel();

        $data = [
            'nom_famille'    => $this->request->getPost('nom_famille'),
            'prenom'         => $this->request->getPost('prenom'),
            'date_naissance' => $this->request->getPost('date_naissance'),
            'relation'       => $this->request->getPost('relation'),
            'contact'        => $this->request->getPost('contact'),
        ];

        if (!$famille->validate($data)) {
            return redirect()->back()->withInput()->with('errors', $famille->errors());
        }

        $famille->update($id, $data);

        return redirect()->to('/familles')->with('success', 'Famille modifiée avec succès.');
    }



    public function delete($id)
    {
        $famille = new FamilleModel();
        $famille->delete($id);

        return redirect()->to('familles');
    }

    public function logout()
    {
        session()->remove('matricule'); 
        return redirect()->to('/familleAgent');
    }
}
