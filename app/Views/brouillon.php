<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des actions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container mt-5">

    <h1 class="text-center mb-4">Historique des actions sur les agents</h1>

    <div class="d-flex justify-content-between mb-3">
        <a href="/dashboard" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Retour</a>

        <form action="<?= site_url('archives/deleteAll') ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer toutes les actions ?');">
            <?= csrf_field() ?>
            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer tout</button>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead>
                <tr class="table-primary text-center">
                    <th>Résumé de l’action</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if(empty($archives)): ?>
                <tr><td colspan="3" class="text-center">Aucune archive trouvée.</td></tr>
            <?php else: ?>
                <?php foreach($archives as $archive): ?>
                    <tr>
                        <td>
                            <?php
                                $action = $archive['action'];
                                $utilisateur = esc($archive['user_matricule']);
                                $agent = esc($archive['agent_matricule']);
                                $details = json_decode($archive['details'], true);

                                if ($action === 'ajout') {
                                    echo "L'utilisateur <strong>$utilisateur</strong> a <strong>ajouté</strong> l’agent <strong>$agent</strong>.";
                                } elseif ($action === 'suppression') {
                                    echo "L'utilisateur <strong>$utilisateur</strong> a <strong>supprimé</strong> l’agent <strong>$agent</strong>.";
                                } elseif ($action === 'modification') {
                                    echo "L'utilisateur <strong>$utilisateur</strong> a <strong>modifié</strong> l’agent <strong>$agent</strong>.";
                                    echo "<div class='small mt-1'>";
                                    $avant = $details['avant'] ?? [];
                                    $apres = $details['apres'] ?? [];
                                    foreach($avant as $champ => $valeurAvant){
                                        $valeurApres = $apres[$champ] ?? '';
                                        if($valeurAvant != $valeurApres){
                                            echo "<div><strong>$champ</strong>: <span class='text-danger'>« $valeurAvant »</span> → <span class='text-success'>« $valeurApres »</span></div>";
                                        }
                                    }
                                    echo "</div>";
                                } else {
                                    echo "Action inconnue effectuée par <strong>$utilisateur</strong>.";
                                }
                            ?>
                        </td>
                        <td><?= esc($archive['created_at']) ?></td>
                        <td class="text-center">
                            <form action="<?= site_url('archives/delete/' . $archive['id']) ?>" method="post" onsubmit="return confirm('Supprimer cette action ?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

















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

    // Affichage de toutes les archives
    public function index()
    {
        $archives = $this->archiveModel->orderBy('created_at', 'DESC')->findAll();
        return view('archives/index', ['archives' => $archives]);
    }

    // Supprimer une archive
    public function delete($id)
    {
        if ($this->request->getMethod() === 'post') {
            $this->archiveModel->delete($id);
            return redirect()->to('/archives')->with('success', 'Archive supprimée avec succès.');
        }
        return redirect()->to('/archives')->with('error', 'Méthode non autorisée.');
    }

    // Supprimer toutes les archives
    public function deleteAll()
    {
        if ($this->request->getMethod() === 'post') {
            $this->archiveModel->truncate();
            return redirect()->to('/archives')->with('success', 'Toutes les archives ont été supprimées.');
        }
        return redirect()->to('/archives')->with('error', 'Méthode non autorisée.');
    }
}





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