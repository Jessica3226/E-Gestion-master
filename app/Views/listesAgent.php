<?php
    $tri = isset($tri) ? $tri : 'nom';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Liste des Agents</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/style/affichageAgent.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    </head>
    <body>

        <div class="container mt-5">
            <div class="top-bar">
                <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left">
                <h1 class="mb-4">👨‍💼 Liste des Agents</h1>
                <img src="images/logo-right.png" alt="Logo Droite" class="logo-right">
            </div>

            <!-- Tableau des agents -->
            <div >
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>IM</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de Naissance</th>
                            <th>Contact</th>
                            <th>CIN</th>
                            <th>Situation Matrimoniale</th>
                            <th>Date d'Entrée</th>
                            <th>Corps</th>
                            <th>Grade</th>
                            <th>Indice</th>
                            <th>Qualité</th>
                            <th>Localisation</th>
                            <th>Direction</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($agents as $agent): ?>
                            <tr>
                                <td><?= esc($agent['matricule']); ?></td>
                                <td><?= esc($agent['nom']); ?></td>
                                <td><?= esc($agent['prenom']); ?></td>
                                <td><?= esc($agent['date_naissance']); ?></td>
                                <td><?= esc($agent['contact']); ?></td>
                                <td><?= esc($agent['cin']); ?></td>
                                <td><?= esc($agent['situation_matrimoniale']); ?></td>
                                <td><?= esc($agent['date_entree']); ?></td>
                                <td><?= esc($agent['corps']); ?></td>
                                <td><?= esc($agent['grade']); ?></td>
                                <td><?= esc($agent['indice']); ?></td>
                                <td><?= esc($agent['qualite']); ?></td>
                                <td><?= esc($agent['localisation']); ?></td>
                                <td><?= esc($agent['direction']); ?></td>
                                <td>
                                    <a href="/agents/edit/<?= $agent['id'] ?>" class="edit-btn">✏️ Modifier</a>
                                    <a href="/agents/delete/<?= $agent ['id'] ?>" class="delete-btn" 
                                    onclick="return confirm('Confirmer la suppression ?')">🗑️ Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Effectif total -->
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="alert alert-info mb-0">
                    <strong>👥 Effectif total :</strong>  agent(s)
                </div>

            </div>

        </div>

    </body>
</html>