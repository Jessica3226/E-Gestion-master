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
        <h2><?= isset($famille) ? "Modifier un membre de la famille" : "Ajouter un membre de la famille" ?></h2>
    </div>

    <form action="<?= isset($famille) ? base_url('/familles/update/'.$famille['id']) : base_url('/familleAgent/store'); ?>" method="post">
        <?= csrf_field() ?>

        <?php if(isset($famille)): ?>
            <input type="hidden" name="id" value="<?= $famille['id'] ?>">
        <?php endif; ?>

        <div class="form-section row g-3">
            <div class="col-md-6">
                <label for="matricule" class="form-label">IM de l'agent :</label>
                <input type="number" id="matricule" name="matricule" class="form-control" value="<?= isset($famille) ? esc($famille['matricule']) : '' ?>" required>
            </div>

            <div class="col-md-6">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom_famille" class="form-control" value="<?= isset($famille) ? esc($famille['nom_famille']) : '' ?>" required>
            </div>

            <div class="col-md-6">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="<?= isset($famille) ? esc($famille['prenom']) : '' ?>" required>
            </div>

            <div class="col-md-6">
                <label for="date_naissance" class="form-label">Date de Naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="<?= isset($famille) ? esc($famille['date_naissance']) : '' ?>" required>
            </div>

            <div class="col-md-6">
                <label for="relation" class="form-label">Lien :</label>
                <select id="relation" name="relation" class="form-select" required>
                    <option value="">Sélectionnez</option>
                    <option value="Conjoint" <?= (isset($famille) && $famille['relation']==='Conjoint') ? 'selected' : '' ?>>Conjoint</option>
                    <option value="Conjointe" <?= (isset($famille) && $famille['relation']==='Conjointe') ? 'selected' : '' ?>>Conjointe</option>
                    <option value="Enfant" <?= (isset($famille) && $famille['relation']==='Enfant') ? 'selected' : '' ?>>Enfant</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="contact" class="form-label">Contact :</label>
                <input type="tel" id="contact" name="contact" class="form-control" value="<?= isset($famille) ? esc($famille['contact']) : '' ?>" required pattern="[0-9]{10}">
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="<?= base_url('/familleAgent') ?>" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Retour
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> <?= isset($famille) ? "Modifier" : "Enregistrer" ?>
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
