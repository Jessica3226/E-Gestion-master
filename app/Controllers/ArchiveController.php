<?php
namespace App\Controllers;

use App\Models\ArchiveModel;
use CodeIgniter\Controller;

class ArchiveController extends Controller
{
    protected $archiveModel;

    public function __construct()
    {
        $this->archiveModel = new ArchiveModel();
    }

    public function index()
    {
        $archives = $this->archiveModel->orderBy('created_at', 'DESC')->findAll();
        return view('archives/index', ['archives' => $archives]);
    }

    public function delete($id)
    {
        if ($this->archiveModel->delete($id)) {
            return redirect()->to('/archives')->with('success', 'Archive supprimée avec succès.');
        } else {
            return redirect()->to('/archives')->with('error', 'Erreur lors de la suppression de l\'archive.');
        }
    }
    
    public function deleteAll()
    {
        $this->archiveModel->truncate();
        return redirect()->to('/archives')->with('success', 'Archives supprimées avec succès.');
    }
    
}