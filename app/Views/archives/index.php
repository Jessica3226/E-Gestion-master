<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des actions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style/archive.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

    <div class="container">
        <!-- Header logos + titre -->
        <div class="header">
            <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left">
            <h1>Historique des actions sur les agents</h1>
            <img src="images/logo-right.png" alt="Logo Droite" class="logo-right">
        </div>

        <!-- Form header : retour + supprimer tout -->
        <div class="form-header">
            <form action="/dashboard" method="get">
                <button class="back-button"><i class="fas fa-arrow-left"></i> Retour</button>
            </form>

            <form action="<?= site_url('archives/delete') ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer toutes les actions ?');">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer tout</button>
            </form>
        </div>

        <!-- Tableau des logs -->
        <div class="table-responsive">
            <table class="table table-borderless align-middle">
                <thead>
                    <tr>
                        <th>Résumé de l’action</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($archives)): ?>
                        <tr><td colspan="3">Aucune archive trouvée.</td></tr>
                    <?php else: ?>
                        <?php foreach ($archives as $archive): ?>
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

                                            echo "<div class='modif-details'>";
                                            $avant = $details['avant'] ?? [];
                                            $apres = $details['apres'] ?? [];

                                            foreach ($avant as $champ => $valeurAvant) {
                                                $valeurApres = $apres[$champ] ?? null;
                                                if ($valeurAvant != $valeurApres) {
                                                    echo "<div><strong>$champ</strong> : ";
                                                    echo "<span class='avant'>« $valeurAvant »</span> → ";
                                                    echo "<span class='apres'>« $valeurApres »</span></div>";
                                                }
                                            }

                                            echo "</div>";
                                        } else {
                                            echo "Action inconnue effectuée par <strong>$utilisateur</strong>.";
                                        }
                                    ?>
                                </td>
                                <td><?= esc($archive['created_at']) ?></td>
                                <td>
                                    <a href="<?= site_url('archives/deleteAction/' . $archive['id']) ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('Supprimer cette action ?');">
                                       <i class="fas fa-trash-alt"></i> Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
