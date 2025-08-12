<?php

namespace App\Controllers;
use App\Models\AgentModel;
use App\Models\FamilleModel;

class Dashboard extends BaseController
{
    public function admin()
    {
        $session = session();

        if (!$session->get('is_logged_in') || !$session->get('agent_id')) {
            return redirect()->to('/login')->with('error', 'Session expirée. Veuillez vous reconnecter.');
        }
        
        $agent_id = $session->get('agent_id');

        // Récupère les infos de l'agent
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

        // 3. Maka data agent sy archives
        $agent = $agentModel->find($id_agent);
        $historiques = $archiveModel->where('id_agent', $id_agent)->orderBy('date_debut', 'ASC')->findAll();

        return view('profil', [
            'agent' => [],
            'historiques' => [],
            'numero_formatte' => null
        ]);
    }

}
