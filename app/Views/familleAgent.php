<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Famille - Recherche</title>
    <link href="<?= base_url('style/familleAgent.css') ?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- Formulaire de recherche -->
    <div class="card shadow-sm mx-auto mb-4" style="max-width: 400px;">
        <div class="card-body">
            <h2 class="text-center mb-4">
                <i class="bi bi-search"></i> Rechercher une famille
            </h2>

            <form method="post" action="/famille/auth" class="row g-3">
                <?= csrf_field() ?>
                <div class="col-12">
                    <label for="matricule" class="form-label visually-hidden">Matricule</label>
                    <input type="text" id="matricule" name="matricule" class="form-control" placeholder="Entrer le matricule" required autofocus>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Rechercher
                    </button>
                </div>
            </form>

            <!-- Bouton Ajouter -->
            <div class="text-center mt-4">
                <a href="<?= base_url('/famille/ajouter') ?>" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Ajouter une Famille
                </a>
            </div>

            <!-- Flash message -->
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger mt-3 text-center">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Résultats après recherche -->
    <?php if(isset($famille)): ?>
        <div class="mb-4">
            <h4>Membres de la famille liés au matricule <strong><?= esc($matricule ?? '') ?></strong></h4>
            <a href="<?= site_url('famille/logout') ?>" class="btn btn-danger mb-3">
                <i class="bi bi-box-arrow-right"></i> Quiter
            </a>
        </div>

        <?php if (empty($famille)): ?>
            <div class="alert alert-warning">Aucun membre trouvé pour ce matricule.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
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
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
