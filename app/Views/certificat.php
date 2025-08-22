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
            <hr>
        </div>

        <?php
        if (!isset($reference)) {
            $reference = "SA-" . date("Ymd-His");
        }
        ?>
        <div class="info text-left">
            <p>MINISTERE DE LA JEUNESSE ET DES SPORTS</p>
            <p>--------------------</p>
            <p>SECRETARIAT GENERAL</p>
            <p>--------------------</p>
            <p>DIRECTION DES RESOURCES HUMAINES</p>
            <p>--------------------</p>
        </div>
    </div>
    <div class="text-center">
        <h6 class="fx fw-bold">CERTIFICAT ADMINISTRATIF</h6>
        <p>-------------</p>
        
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
            </div>
        </form>
    </div>
    
    <main class="text-center">
    <p class="text-left" >Je soussigné(e), Directeur des Ressources Humaines du Ministère de la Jeunesse et des Sports, certifie que,</p>
           
        <div>
            <strong>Nom et Prénom :</strong> <?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?><br>
            <strong>IM : </strong><?= esc($agent['matricule']) ?><br>
            <strong>Fonction :</strong><br>
            <strong>Corps et Grade :</strong> <?= esc($agent['corps']) ?><br>
            <strong>Indice :</strong> <?= esc($agent['indice']) ?><br>
            <strong>Imputation Budgetaire :</strong> <br>
            <strong>Date de Naissance : </strong><?= esc($agent['date_naissance']); ?><br>
            <strong>CIN :</strong> <?= esc($agent['cin']) ?><br>
            <strong>Budget :</strong><br>
            <strong>Localité de service:</strong> <?= esc($agent['localisation']) ?><br>
        </div>
        Est en service au Ministère de la Jeunesse et des Sports depuis le : <?= esc($agent['date_entree']); ?> jusqu'à ce jour. <br>
        En foi de quoi, le présent certificat lui est délivrè pour serviret valoir ce que de droit.
    </main>

    <div class="body text-center">

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