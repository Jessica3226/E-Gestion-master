




<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Famille - Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- Login Form -->
    <div class="card shadow-sm mx-auto mb-4" style="max-width: 400px;">
        <div class="card-body">
            <h2 class="text-center mb-4">🔍 Rechercher une famille par Matricule</h2>

            <form method="post" action="/famille/auth" class="row g-3">
                <?= csrf_field() ?>
                <div class="col-12">
                    <input type="text" name="matricule" class="form-control" placeholder="Entrer le matricule" required autofocus>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                </div>
            </form>
 <!-- Bouton Ajouter -->
 <div class="text-center mt-4">
                <a href="<?= base_url('/famille/ajouter') ?>" class="btn btn-success">
                    ➕ Ajouter une Famille
                </a>
            </div>
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger mt-3 text-center">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Résultats après connexion -->
    <?php if (session()->has('matricule')): ?>
        <div class="mb-4">
            <h4>Membres de la famille liés au matricule <strong><?= esc(session('matricule')) ?></strong></h4>
            <a href="<?= site_url('famille/logout') ?>" class="btn btn-danger mb-3">Quiter</a>
        </div>

        <?php if (empty($famille)): ?>
            <div class="alert alert-warning">Aucun membre trouvé pour ce matricule.</div>
        <?php else: ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Relation</th>
                        <th>Contact</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($famille as $membre): ?>
                        <tr>
                            <td><?= esc($membre['nom_famille']) ?></td>
                            <td><?= esc($membre['prenom']) ?></td>
                            <td><?= esc($membre['date_naissance']) ?></td>
                            <td><?= esc($membre['relation']) ?></td>
                            <td><?= esc($membre['contact']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
