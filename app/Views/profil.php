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
            <p>Référence : <?= esc($reference) ?></p>
            <p>Adresse : <?= esc($agent['adresse']) ?></p>
            <p>Email : <?= esc($agent['email']) ?></p>
            <p class="date"><?= date('d F Y')?></p>
        </div>
    </div>
    <div class="text-center">
        <h6 class="fx fw-bold">SITUATION ADMINISTRATIVE</h6>
        
        <form action="<?= site_url('ajoutphoto/store') ?>" method="post" enctype="multipart/form-data" id="photoForm">
            <div class="d-flex flex-column align-items-center">
                <div class="profile-img-wrapper">
                    <img id="profile-img" src="<?= base_url('uploads/' . ($agent['photo'] ?? 'agent.png')) ?>" alt="Photo de profil">
                    
                    <label for="profile-pic" class="profile-pic">
                        <i class="bi bi-camera-fill"></i>
                        <input type="file" id="profile-pic" name="photo" accept="image/*">
                    </label>
                </div>


                    <input type="hidden" name="agent_id" value="<?= esc($agent['id']) ?>">

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php elseif (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>

                    <div class="hisName">
                        <strong>IM : <?= esc($agent['matricule']) ?>( <?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?> )</strong>
                    </div>
            </div>
        </form>
    </div>
    
    <main class="container-main">
        <div class="form-row">
            <div>
                <strong>Date de naissance :</strong> <?= esc($agent['date_naissance']) ?>
            </div>
            <div>
                <strong>Date d’entrée :</strong> <?= esc($agent['date_entree']) ?>
            </div>
        </div>
        <div class="form-row">
            <div>
                <strong>Contact :</strong> <?= esc($agent['contact']) ?>
            </div>
            <div>
                <strong>Corps :</strong> <?= esc($agent['corps']) ?>
            </div>
        </div>
        <div class="form-row">
            <div>
                <strong>CIN :</strong> <?= esc($agent['cin']) ?>
            </div>
            <div>
                <strong>Grade :</strong> <?= esc($agent['grade']) ?>
            </div>
        </div>
        <div class="form-row">
            <div>
                <strong>Situation matrimoniale :</strong> <?= esc($agent['situation_matrimoniale']) ?>
            </div>
            <div>
                <strong>Qualité :</strong> <?= esc($agent['qualite']) ?>
            </div>
        </div>
        <div class="form-row">
            <div>
                <strong>Localisation :</strong> <?= esc($agent['localisation']) ?>
            </div>
            <div>
                <strong>Direction :</strong> <?= esc($agent['direction']) ?>
            </div>
        </div>
    </main>

    <div class="body text-center">
        <h6 class="fw-bold">OBSERVATIONS ET DECISIONS</h6>
        <P >Après etude de la situation administrative de <strong><?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?></strong>, exercant 
            au sein du <strong>Ministère de la Jeunesse et des Sports</strong>,<br> nous avons procède à une analyse des données fournies.
        </P>

        <h6 style="margin-top: 15px; margin-left: -35%;"><strong>✔ Analyse et vérification :</strong></h6>
        <div>
            <p class="A1" style="margin-left: -20%;">- Confermité des information avec les règlements en vigueur.</p>
            <p class="A2" style="margin-left: -30%;">- Validation des pièces justifications.</p>
            <p class="A3" style="margin-left: -21%;">- Examen des droits et obligation liés au corps et au grade.</p>
        </div>
        
        <h6 style="margin-top: 15px; margin-left: -39%;"><strong>✔ Décision prise :</strong></h6>
        <div>
            <p class="A4" style="margin-left: -15%;">- Situation validé et enregistrée sous la référence [<?= esc($reference) ?>].</p>
            <p class="A5" style="margin-left: -24%;">- Situation en cours, nécessiant des compléments.</p>
        </div>

        <div class="footer">
            <p style="margin-top: 40px;"><?= esc($agent['localisation']) ?>, le <?= date('d F Y'); ?></p>
            <p><strong>Signature du Responsable</strong></p>
            <p>____________________________</p>
            <p><em>[Nom et Fonction]</em></p>
        </div>
    </div>
    
    <div class="action-buttons">
        <button class="print-btn" onclick="window.print()">
            <i class="bi bi-printer-fill me-1"></i> Imprimer
        </button>

        <button class="logout-btn" onclick="logoutUser()">
            <i class="bi bi-box-arrow-right me-1"></i> Déconnexion
        </button>
    </div>

    <script>
        // Fonction pour afficher un aperçu de l'image téléchargée
        document.getElementById('profile-pic').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const reader = new FileReader();

            if (file) {
            reader.onload = function (e) {
                document.getElementById('profile-img').src = e.target.result;
            };
            reader.readAsDataURL(file);

            // Envoie automatiquement le formulaire
            document.getElementById('photoForm').submit();
            }
        });
    
        function logoutUser() {
            window.location.href = "/logout";
        }
    </script>
</body>
</html>