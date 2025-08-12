<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/familleAgent.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Gestion des Familles</title>
</head>
<body>
    <div class="container">
        <p><img src="/images/logo.png" alt="Logo" class="logo">Family</p>
        <form class="form-inline" action="<?= base_url('/familleAgent/store'); ?>" method="post">
            <div class="form-group">
                <label for="matricule">IM de l'agent :</label>
                <input type="number" id="matricule" name="matricule" required>
            </div>
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom_famille" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de Naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance" required>
            </div>
            <div class="form-group">
                <label for="relation">Lien:</label>
                <select id="relation" name="relation" required>
                <option value="">Sélectionnez</option>
                    <option value="Conjoint">Conjoint</option>
                    <option value="Conjointe">Conjointe</option>
                    <option value="Enfant">Enfant</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact :</label>
                <input type="tel" id="contact" name="contact" required pattern="[0-9]{10}">
            </div>

            <!-- <button type="submit">Ajouter Membre de Famille</button> -->
            <button type="submit" class="btn-primary">💾 Enregistrer</button>
        </form>

        <?php if(session()->getFlashdata('error')): ?>
        <div id="alert-message" class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>

        <script>
            setTimeout(() => {
                const alertMessage = document.getElementById('alert-message');
                if (alertMessage) {
                    alertMessage.style.display = 'none';
                }
            }, <?= session()->getFlashdata('alert_time') ?? 2000 ?>); // 2 secondes
        </script>
    <?php endif; ?>
        <!-- Messages de succès et d'erreur -->
        <p id="successMessage" class="success-message" style="display: none;">Membre de la famille ajouté avec succès !</p>
        <p id="errorMessage" class="error-message" style="display: none;">Erreur lors de l'ajout du membre de la famille.</p>
    </div>
</body>
</html>
