<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Familles</title>
    <link href="<?= base_url('style/familleAgent.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="form-container">
    <div class="form-header">
        <img src="/images/logo.png" alt="Logo" class="logo">
        <h2>Ajouter un membre de la famille</h2>
    </div>

    <form action="<?= base_url('/familleAgent/store'); ?>" method="post">
        <?= csrf_field() ?>
        
        <div class="form-section row g-3">
            <div class="col-md-6">
                <label for="matricule" class="form-label">IM de l'agent :</label>
                <input type="number" id="matricule" name="matricule" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom_famille" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="date_naissance" class="form-label">Date de Naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label for="relation" class="form-label">Lien :</label>
                <select id="relation" name="relation" class="form-select" required>
                    <option value="">Sélectionnez</option>
                    <option value="Conjoint">Conjoint</option>
                    <option value="Conjointe">Conjointe</option>
                    <option value="Enfant">Enfant</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="contact" class="form-label">Contact :</label>
                <input type="tel" id="contact" name="contact" class="form-control" required pattern="[0-9]{10}">
            </div>
        </div>

        <div class="text-center">
            <a href="<?= base_url('/familleAgent') ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Enregistrer
            </button>
        </div>
    </form>

    <?php if(session()->getFlashdata('error')): ?>
        <div id="alert-message" class="alert alert-danger mt-3 text-center">
            <i class="bi bi-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
        </div>
        <script>
            setTimeout(() => {
                const alertMessage = document.getElementById('alert-message');
                if(alertMessage) alertMessage.style.display = 'none';
            }, <?= session()->getFlashdata('alert_time') ?? 3000 ?>);
        </script>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div id="success-message" class="alert alert-success mt-3 text-center">
            <i class="bi bi-check-circle"></i> <?= session()->getFlashdata('success') ?>
        </div>
        <script>
            setTimeout(() => {
                const successMessage = document.getElementById('success-message');
                if(successMessage) successMessage.style.display = 'none';
            }, 3000);
        </script>
    <?php endif; ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
