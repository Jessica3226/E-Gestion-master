<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="<?= base_url('style/profil.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <div>
            <img src="/images/Malagasy.jpeg" alt="Malagasy" class="Malagasy">
            <hr>
        </div>

        <div class="info">
            <p>MINISTERE DE LA JEUNESSE ET DES SPORTS</p>
            <p>--------------------</p>
            <p>SECRETARIAT GENERAL</p>
            <p>--------------------</p>
            <p>DIRECTION DES RESOURCES HUMAINES</p>
            <p>--------------------</p>
            <p>Numero : /MJS/SG/DRH</p>
        </div>
    </div>

    <div class="text-center mt-3">
        <h6 class="fx fw-bold">CERTIFICAT ADMINISTRATIF</h6>
        <p>--------------------------</p>
    </div>
    
    <main class="container">
        <p class="lab text-left">Je soussigné(e), Directeur des Ressources Humaines du Ministère de la Jeunesse et des Sports, certifie que,</p>
           
        <div class="liste">
            <table class="table table-borderless">
                <tr>
                    <td><strong>Nom et Prénom </strong></td>
                    <td>: <?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?></td>
                </tr>
                <tr>
                    <td><strong>IM </strong></td>
                    <td>: <?= esc($agent['matricule']) ?></td>
                </tr>
                <tr>
                    <td><strong>Fonction </strong></td>
                    <td>:</td>
                </tr>
                <tr>
                    <td><strong>Corps et Grade </strong></td>
                    <td>: <?= esc($agent['corps']) ?></td>
                </tr>
                <tr>
                    <td><strong>Indice </strong></td>
                    <td>: <?= esc($agent['indice']) ?></td>
                </tr>
                <tr>
                    <td><strong>Imputation Budgétaire </strong></td>
                    <td>:</td>
                </tr>
                <tr>
                    <td><strong>Date de Naissance </strong></td>
                    <td>: <?= esc($agent['date_naissance']) ?></td>
                </tr>
                <tr>
                    <td><strong>CIN </strong></td>
                    <td>: <?= esc($agent['cin']) ?></td>
                </tr>
                <tr>
                    <td><strong>Budget </strong></td>
                    <td>: </td>
                </tr>
                <tr>
                    <td><strong>Localité de service </strong></td>
                    <td>: <?= esc($agent['localisation']) ?></td>
                </tr>
            </table>
        </div>

        <p class="lab text-left">
            Est en service au Ministère de la Jeunesse et des Sports depuis le : <?= esc($agent['date_entree']); ?> jusqu'à ce jour. <br>
            En foi de quoi, le présent certificat lui est délivré pour servir et valoir ce que de droit.
        </p>
    </main>

    <div class="body text-center">
        <div class="footer">
            <p style="margin-top: 40px;"><?= esc($agent['localisation']) ?>, le <?= date('d F Y'); ?></p>
            <p><strong>Signature du Responsable</strong></p>
            <p class="no-print">____________________________</p>
            <p class="no-print"><em>[Nom et Fonction]</em></p>
        </div>
    </div>
    
    <!-- Boutons -->
    <div class="action-buttons my-3 d-flex justify-content-center gap-3">
        <!-- Bouton retour -->
        <a href="<?= base_url('profil') ?>" class="btn btn-secondary me-2">
            <i class="bi bi-arrow-left-circle me-1"></i> Retour
        </a>
        <!-- Bouton imprimer -->
        <button class="btn btn-success print-btn" onclick="window.print()">
            <i class="bi bi-printer-fill me-1"></i> Imprimer
        </button>
    </div>
</body>
</html>
