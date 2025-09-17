<?php

namespace App\Controllers;
use App\Models\AgentModel;
use App\Models\FamilleModel;

class Dashboard extends BaseController
{
    protected $agentModel;
    protected $session;

    public function __construct()
    {
        $this->agentModel = new AgentModel();
        $this->session = session(); 
    }

    public function admin()
    {
        $session = session();

        if (!$session->get('is_logged_in') || !$session->get('agent_id')) {
            return redirect()->to('/login')->with('error', 'Session expirée. Veuillez vous reconnecter.');
        }
        
        $agent_id = $session->get('agent_id');

        $agentModel = new AgentModel();
        $agent = $agentModel->find($agent_id);

        return view('profil', [
            'agent' => $agent,
        ]);
    }

    public function user()
    {
        $session = session();

        if (!$session->get('is_logged_in')) {
            return redirect()->to('/login')->with('error', 'Accès non autorisé.');
        }

        return view('dashboard');
    }

    public function situation()
    {
        if (!$this->session->get('is_logged_in')) {  
            return redirect()->to('/login')->with('error', 'Session expirée. Veuillez vous reconnecter.');
        }

        $agent_id = $this->session->get('agent_id');
        $data['agent'] = $this->agentModel->find($agent_id);

        return view('situation', $data);
    }

    public function certificat()
    {
        if (!$this->session->get('is_logged_in')) {  
            return redirect()->to('/login')->with('error', 'Session expirée. Veuillez vous reconnecter.');
        }

        $agent_id = $this->session->get('agent_id');
        $data['agent'] = $this->agentModel->find($agent_id);

        return view('certificat', $data);
    }

    public function imprimer($id_agent)
    {
        $agentModel = new AgentModel();
        $certificatModel = new \App\Models\CertificatModel();
        $archiveModel = new ArchiveAgentModel();

        $certificatModel->insert([
            'id_agent' => $id_agent,
            'annee'    => date('Y'),
            'created_at' => date('Y-m-d')
        ]);
        $insert_id = $certificatModel->getInsertID();

        $numero_auto = str_pad($insert_id, 4, "0", STR_PAD_LEFT);
        $numero_formatte = $numero_auto . '-' . date('Y') . '/MIN-JS';
        $certificatModel->update($insert_id, ['numero_formatte' => $numero_formatte]);

        $agent = $agentModel->find($id_agent);
        $historiques = $archiveModel->where('id_agent', $id_agent)->orderBy('date_debut', 'ASC')->findAll();

        return view('profil', [
            'agent' => [],
            'historiques' => [],
            'numero_formatte' => null
        ]);
    }

}
