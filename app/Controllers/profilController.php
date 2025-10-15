<?php

namespace App\Controllers;
use App\Models\AgentModel;
use CodeIgniter\Controller;

class ProfilController extends Controller
{
    protected $agentModel;

    public function __construct()
    {
        $this->agentModel = new AgentModel();
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

}
