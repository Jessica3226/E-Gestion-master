<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\AgentModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $agentModel;

    public function __construct()
    {
        $this->agentModel = new AgentModel();
    }

    public function login()
    {

        return view('auth/login');
    }

    public function inscrit()
    {
        return view('auth/inscrit'); 
    }

    public function doInscription()
    {
        $matricule = trim($this->request->getPost('matricule'));
        $password = $this->request->getPost('password');

        $agentModel = new \App\Models\AgentModel();
        $agent = $agentModel->where('matricule', $matricule)->first();
        // dd($agent);
        // Vérifie si l'utilisateur existe déjà
        if (!$agent) {
            return redirect()->back()->with('error', 'Matricule introuvable');
        }

        if (!empty($agent['password'])){
            return redirect()->back()->with('error', 'Compte déja activé');
        }
        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->agentModel->update($agent['id'], ['password' => $hashedPassword]);

        return redirect()->to('/login')->with('success', 'Inscription réussie.');
    }

    public function doLogin()
    {
        $session = session();
        $matricule = $this->request->getPost('matricule');
        $password = $this->request->getPost('password');

        if (!$matricule || !$password){
            return $this->response->setJSON(['message'=>'Matricule et Mot de passe requis'])->setStatusCode(400);
        }

        $agentModel = new AgentModel();
        $agent = $agentModel->where('matricule', $matricule)->first();

        if (!$agent) {
            return redirect()->back()->with('error', 'Matricule introuvable.');
        }

        if (!password_verify($password, $agent['password'])) {
            return redirect()->back()->with('error', 'Mot de passe incorrect.');
        }

        $session->set([
            'agent_id' => $agent['id'],
            'matricule' => $agent['matricule'],
            'niveau' => $agent['niveau'], 
            'is_logged_in' => true
        ]);

        $this->agentModel->update($agent['id'], ['is_logged_in' => 1]);

        return $this->response->setJSON([
            'success' => true,
            'niveau' => $agent['niveau']
        ]);

    }
    
   
    public function completerInfo($agentId = null)
    {
        if (!$agentId) {
            $agentId = session()->get('agent_id');
        }
    
        $agent = $this->agentModel->find($agentId);
    
        return view('auth/completer_info', ['agent' => $agent]);
    }
    
    public function saveInfo()
    {
        $email = $this->request->getPost('email');
        $adresse = $this->request->getPost('adresse');
        $agentId = session()->get('agent_id');
    
        if (!$agentId) {
            return redirect()->to('/login')->with('error', 'Session expirée. Veuillez vous reconnecter.');
        }
    
        $this->agentModel->update($agentId, [
            'email' => $email,
            'adresse' => $adresse
        ]);
    
        return redirect()->to('/profil');
    }

    public function profil()
{
    $session = session();

    if (!$session->get('isLoggedIn')) {
        return redirect()->to('/login')->with('error', 'Veuillez vous reconnecter.');
    }

    $agent_id = $session->get('agent_id');
    $agent = $this->agentModel->find($agent_id);

    return view('profil', ['agent' => $agent]);
}


    public function logout()
    {       
        $agent_id = session()->get('agent_id');
        if($agent_id){
            $this->agentModel->update($agent_id, ['is_logged_in' => 0]);
        }
        session()->destroy();
        return redirect()->to('/login');
    }
}
