
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
    <div class="container ">
        <div class="text-center">
            <img src="/images/Malagasy.jpeg" alt="Malagasy" class="Malagasy">
            <p class="fw-bold">Ministère de la Jeunesse et des Sports</p>
            <hr>
        </div>

        <?php
        if (!isset($reference)) {
            $reference = "SA-" . date("Ymd-His");
        }
        ?>
        <div class="info text-left">
            <p>
                <?php
                    if (!isset($numero_formatte)) {
                        $numero_formatte = "";
                    }
                ?>
                <strong>N° :</strong> <?= $numero_formatte ?><br>
                <strong>Date :</strong> <?= date('d/m/Y') ?>
            </p>
        </div>
    </div>
    <div class="text-center">
        <h6 class="fw-bold" style="font-size: 2rem;">CERTIFICAT ADMINISTRATIF</h6>
        
       <p>Je soussigné(e), Monsieur / Madame <strong><?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?></strong>
       , agissant en qualité de <strong>Responsable des Ressources Humaines</strong>, certifie que :</p>
       <ul>
            <p style="margin-left: -31.4%;">- IM : <?= esc($agent['matricule']) ?></p>
            <p style="margin-left: -23.7%;">- Fonction : <?= esc($agent['corps']) ?></p>
        </ul>

        <?php if (!empty($historiques) && is_array($historiques) && count($historiques) <= 1): ?>
            <p>est en service depuis le <strong><?= esc($agent['date_entree']) ?></strong> au sein de <strong>Ministère de la Jeunesse et des Sports en qualité de <?= esc($agent['qualite']) ?>.</strong></p>
            <!-- <p>Le présent certificat est établi pour servire et valoir ce que de droit.</p> -->
        <?php else: ?>
            <p>depuis son entree en service le <?= esc($agent['date_entree']) ?>, il/elle a occupé successivement les postes suivants :</p>
            </p>
                <ul>
                <?php foreach ($historiques as $poste): ?>
                    <li>
                    <?= $poste->poste ?> du <?= esc($agent['date_entree']) ?> au 
                    <?= $poste->date_fin ? date('d/m/Y', strtotime($poste->date_fin)) : 'à ce jour' ?>
                    </li>
                <?php endforeach; ?>
                </ul>
                <p>Actuellement, il/elle appartient au corps <strong><?= $agent->corps ?></strong>.</p>
            <?php endif; ?>
            <p>
                Conformément aux dispositions en vigueur, ce certificat est délivré pour servir et valoir ce que de droit.
            </p>
        </div>
   
    <div class="body text-center">
        <div class="footer">
            <p style="margin-top: 40px;">Fait à <?= esc($agent['localisation']) ?>, le <?= date('d F Y'); ?></p>
            <p><strong>Signature du Responsable</strong></p>
            <p>____________________________</p>
            <p><em>[Nom et Fonction]</em></p>
        </div>
    </div>
</body>
</html>



