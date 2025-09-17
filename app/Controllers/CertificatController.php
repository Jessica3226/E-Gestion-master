<?php
namespace App\Controllers;

use App\Models\AgentModel;
use App\Models\CertificatModel;
use CodeIgniter\Controller;

class CertificatController extends Controller
{
    public function imprimer()
    {
        $agentModel = new AgentModel();
        $certificatModel = new CertificatModel();

        // Récupérer l'agent depuis la session
        $agent_id = session()->get('agent_id'); // ou 'id' selon ce que tu stockes
        if (!$agent_id) {
            return redirect()->to('/profil')->with('error', 'Aucun agent connecté.');
        }

        $agent = $agentModel->find($agent_id);

        $annee = date('Y');

        // Récupérer le dernier certificat
        $lastCertificat = $certificatModel
            ->where('annee', $annee)
            ->orderBy('id', 'DESC')
            ->first();

        if ($lastCertificat && !empty($lastCertificat['numero_formatte'])) {
            $lastNumber = intval(explode('/', $lastCertificat['numero_formatte'])[0]);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }

        $numeroCertificat = $newNumber . '/' . $annee . '/MJS/SG/DRH';

        // Enregistrer le certificat
        $certificatModel->insert([
            'agent_id' => $agent['id'],
            'annee' => date('Y'),
            'numero_formatte' => $numeroCertificat,
            'action' => 'Certificat administratif',
            'details' => 'Certificat généré automatiquement',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Passer les données à la vue
        return view('certificat', [
            'agent' => $agent,
            'numero' => $numeroCertificat
        ]);
    }
}
