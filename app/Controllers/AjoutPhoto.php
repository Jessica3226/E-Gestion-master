<?php

namespace App\Controllers;
use App\Models\AgentModel;


class AjoutPhoto extends BaseController
{
    protected $agentModel;

    public function __construct() {
        $this->agentModel = new AgentModel();
    }

    public function store()
    {
        
        $agentModel = new AgentModel();

        $photo = $this->request->getFile('photo');
        $agentId = $this->request->getPost('agent_id');

        if ($photo->isValid() && !$photo->hasMoved()) {
            $newFileName = 'agent_id' . $agentId . '_' . $photo->getRandomName();
            $photo->move('uploads/', $newFileName); 

            $this->agentModel->save([
                'id' => $agentId, 
                'photo' => $newFileName
            ] );

            return redirect()->to('profil')->with('success', 'Ajout avec succès');
        }

        return redirect()->to('profil')->with('error', 'Erreur lors de l\'upload');
    }
    
    public function deletePhoto($agentId)
    {
        $agent = $this->agentModel->find($agentId);
    
        if ($agent && !empty($agent['photo'])) {
            $photoPath = 'uploads/' . $agent['photo'];
    
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
    
            $this->agentModel->update($agentId, ['photo' => 'agent.png']);
        }
    
        return redirect()->to('profil')->with('message', 'Photo supprimée');
    }
    
}
