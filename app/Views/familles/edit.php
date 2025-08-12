<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Membre de Famille</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style/familleAgent.css') ?>">
</head>
<body>
    <div class="container">
        <form action="<?= base_url('/familles/update/' . $fami['id']) ?>" method="post" class="form-inline">
            <?= csrf_field() ?>
            <p><img src="/images/logo.png" alt="Logo" class="logo">Family</p>
                <div class="form-group">
                    <label for="nom_famille">Nom :</label>
                    <input type="text" name="nom_famille" id="nom_famille" value="<?= esc($fami['nom_famille']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom :</label>
                    <input type="text" name="prenom" id="prenom" value="<?= esc($fami['prenom']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="date_naissance">Date de Naissance :</label>
                    <input type="date" name="date_naissance" id="date_naissance" value="<?= esc($fami['date_naissance']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="relation">Relation :</label>
                    <select name="relation" id="relation" required>
                        <option value="Conjoint" <?= $fami['relation'] == 'Conjoint' ? 'selected' : '' ?>>Conjoint</option>
                        <option value="Conjointe" <?= $fami['relation'] == 'Conjointe' ? 'selected' : '' ?>>Conjointe</option>
                        <option value="Enfant" <?= $fami['relation'] == 'Enfant' ? 'selected' : '' ?>>Enfant</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="contact">Contact :</label>
                    <input type="tel" name="contact" id="contact" value="<?= esc($fami['contact']) ?>" required pattern="[0-9]{10}">
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn-primary">💾 Enregistrer</button>
                </div>
        </form>

            <!-- Messages de succès et d'erreur -->
            <p id="successMessage" class="success-message" style="display: none;">Membre de la famille ajouté avec succès !</p>
            <p id="errorMessage" class="error-message" style="display: none;">Erreur lors de l'ajout du membre de la famille.</p>
    </div>
</body>
</html>
