<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des actions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        html, body {
            background: linear-gradient(135deg, #a1c4fd, #c2e9fb);
            font-family: cursive;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 40px;
            max-width: 95%;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            border-collapse: separate;
            text-align: center;
            border-spacing: 0 15px;
        }

        table thead {
            background-color: rgba(0, 123, 255, 0.9);
            color: white;
        }

        table tbody tr {
            background-color: transparent !important; 
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: scale(1.02); 
        }

        table tbody td {
            background-color: transparent !important;
            padding: 16px;
            border: none;
            word-wrap: break-word;
            word-break: break-word;
            white-space: normal;
        }

        .modif-details {
            font-size: 0.9em;
            margin-top: 5px;
        }

        .avant {
            color: red;
        }

        .apres {
            color: green;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }

        .logo-left {
            width: 15%;
        }

        .logo-right {
            width: 8%;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .back-button {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .logo-left, .logo-right {
                width: 20%;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>

    <!-- En-tête avec logos -->
    <div class="header container">
        <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left">
        <h1>Archive sur les agents</h1>
        <img src="images/logo-right.png" alt="Logo Droite" class="logo-right">
    </div>

    <div class="container">
        <!-- Formulaires header : Retour + Supprimer tout -->
        <div class="form-header">
            <form action="/dashboard" method="get">
                <button class="back-button"><i class="fas fa-arrow-left"></i> Retour</button>
            </form>

            <form action="<?= site_url('archives/deleteAllActions') ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer toutes les actions ?');">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer tout</button>
            </form>
        </div>

        <!-- Tableau des logs -->
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
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
                                        $utilisateur = esc($archive['agent_matricule']);
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
