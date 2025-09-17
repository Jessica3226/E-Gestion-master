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
            background: linear-gradient(135deg, #e0f7fa, #c8e6c9); /* Bleu clair → Vert clair */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 50px;
            max-width: 98%;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd;
            font-weight: 700;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .logo-left, .logo-right {
            max-height: 60px;
            object-fit: contain;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .back-button, .btn-danger {
            border-radius: 12px;
            font-weight: 600;
            padding: 10px 18px;
            transition: all 0.3s ease;
        }

        .back-button {
            background-color: #0d6efd;
            color: white;
            border: none;
        }

        .back-button:hover {
            background-color: #0b5ed7;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
        }

        table {
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        table thead th {
            background-color: #0d6efd;
            color: white;
            border-radius: 12px;
            padding: 12px;
            text-align: center;
        }

        table tbody tr {
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 12px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        table tbody tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        table tbody td {
            padding: 16px;
            text-align: center;
            vertical-align: middle;
            word-break: break-word;
        }

        .modif-details {
            font-size: 0.9em;
            margin-top: 5px;
            text-align: left;
        }

        .avant {
            color: #dc3545;
            font-weight: 600;
        }

        .apres {
            color: #28a745;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 22px;
            }
            .header img {
                max-height: 50px;
            }
            .back-button, .btn-danger {
                padding: 8px 14px;
                font-size: 0.9em;
            }
        }
    </style>
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

            <form action="<?= site_url('archives/deleteAllActions') ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer toutes les actions ?');">
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
