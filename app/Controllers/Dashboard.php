<?php

namespace App\Controllers;
use App\Models\AgentModel;
use App\Models\SituationAdminModel;
use App\Models\FamilleModel;
use App\Models\ArchiveModel;

class Dashboard extends BaseController
{
    protected $agentModel;
    protected $session;

    public function __construct()
    {
        $this->agentModel = new AgentModel();
        $this->session = session(); 
    }

    public function index()
    {
        $session = session(); 
        
        $situationModel = new SituationAdminModel();
        $familleModel = new FamilleModel();
        $archiveLog = new ArchiveModel();


        $agentConnecte = null;
        $agentsActifs = 0;
        if ($session->get('is_logged_in')) {
            $agent_id = $session->get('agent_id');
            $agentConnecte = $this->agentModel->find($agent_id);

            $agentsActifs = $this->agentModel->where('is_logged_in', 1)->countAllResults();
        }
        $agentsActifs = $this->agentModel->where('is_logged_in', 1)->countAllResults();

        // Statistiques principales
        $contratsEnCours = $situationModel->where('date_fin >=', date('Y-m-d'))->countAllResults();
        $contratsExpires = $situationModel->where('date_fin <', date('Y-m-d'))->countAllResults();
        $famillesLiees = $familleModel->countAllResults();
        $archivesRecentes = $archiveLog->orderBy('created_at', 'DESC')->findAll();

        $derniersAgents = $this->agentModel->orderBy('created_at', 'DESC')->limit(3)->findAll();

        // Contrats proches de l'expiration
        $contratsAlertes = $situationModel
                            ->where('date_fin <=', date('Y-m-d', strtotime('+30 days')))
                            ->where('date_fin >=', date('Y-m-d'))
                            ->findAll();

        $famillesIncompletes = [];  
        $historiqueSituations = $archiveLog->orderBy('created_at', 'DESC')->limit(10)->findAll();

        return view('dashboard', [
            'agentConnecte' => $agentConnecte,
            'agentsActifs' => $agentsActifs,
            'contratsEnCours' => $contratsEnCours,
            'contratsExpires' => $contratsExpires,
            'famillesLiees' => $famillesLiees,
            'archivesRecentes' => count($archivesRecentes),
            'derniersAgents' => $derniersAgents,
            'contratsAlertes' => $contratsAlertes,
            'famillesIncompletes' => $famillesIncompletes,
            'historiqueSituations' => $historiqueSituations
        ]);
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
}
