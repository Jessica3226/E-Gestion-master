<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajout d'un Agent</title>
  <link href="<?= base_url('style/ajoutAg.css') ?>" rel="stylesheet">
</head>
<body>
  <div>
    <p class="header">RESSOURCES <br> HUMAINES</p>
    <img src="/images/logo-right.png" alt="Logo Droite" class="logo-right">
  </div>
  <div class="container">
    <?php if(session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>
    
    <form action="<?= isset($agent) ? base_url('agents/update/' . $agent['id']) : base_url('agent/addAgent') ?>" method="post">

            <!-- Première ligne de champs (Gauche) -->
            <div class="form-row">
                <div>
                    <label for="matricule">IM:</label>
                    <input type="number" id="matricule" name="matricule" value="<?= isset($agent) ? esc($agent['matricule']) : '' ?>" required>
                </div>
                <div>
                    <label for="corps">Corps:</label>
                    <select class="taille" id="corps" name="corps" required>
                        <option value="">Sélectionnez</option>
                        <option value="sous-operateur" <?= isset($agent) && $agent['corps'] == 'sous-operateur' ? 'selected' : '' ?>>Sous-Opérateur</option>
                        <option value="operateur" <?= isset($agent) && $agent['corps'] == 'operateur' ? 'selected' : '' ?>>Opérateur</option>
                        <option value="encadreur" <?= isset($agent) && $agent['corps'] == 'encadreur' ? 'selected' : '' ?>>Encadreur</option>
                        <option value="Technicien_Superieur" <?= isset($agent) && $agent['corps'] == 'Technicien_Superieur' ? 'selected' : '' ?>>Technicien Superieur</option>
                        <option value="realisateur_adjoint" <?= isset($agent) && $agent['corps'] == 'realisateur_adjoint' ? 'selected' : '' ?>>Réalisateur Adjoint</option>
                        <option value="realisateur" <?= isset($agent) && $agent['corps'] == 'realisateur' ? 'selected' : '' ?>>Réalisateur</option>
                        <option value="planificateur" <?= isset($agent) && $agent['corps'] == 'planificateur' ? 'selected' : '' ?>>Planificateur</option>
                        <option value="cpci" <?= isset($agent) && $agent['corps'] == 'cpci' ? 'selected' : '' ?>>CPCI</option>
                    </select>
                </div>
            </div>

            <!-- Deuxième ligne de champs (Gauche) -->
            <div class="form-row">
                <div>
                    <label for="nom">Nom:</label>
                    <input type="text" id="nom" name="nom" value="<?= isset($agent) ? esc($agent['nom']) : '' ?>" required>
                </div>
                <div>
                    <label for="grade">Grade:</label>
                    <select id="grade" name="grade" required>
                    <option value="">Sélectionnez</option>
                        <option value="1C1E" <?= isset($agent) && $agent['grade'] == '1C1E' ? 'selected' : '' ?>>1C1E</option>
                        <option value="1C2E" <?= isset($agent) && $agent['grade'] == '1C2E' ? 'selected' : '' ?>>1C2E</option>
                        <option value="1C3E" <?= isset($agent) && $agent['grade'] == '1C3E' ? 'selected' : '' ?>>1C3E</option>
                        <option value="2C1E" <?= isset($agent) && $agent['grade'] == '2C1E' ? 'selected' : '' ?>>2C1E</option>
                        <option value="2C2E" <?= isset($agent) && $agent['grade'] == '2C2E' ? 'selected' : '' ?>>2C2E</option>
                        <option value="2C3E" <?= isset($agent) && $agent['grade'] == '2C3E' ? 'selected' : '' ?>>2C3E</option>
                        <option value="3C1E" <?= isset($agent) && $agent['grade'] == '3C1E' ? 'selected' : '' ?>>3C1E</option>
                        <option value="3C2E" <?= isset($agent) && $agent['grade'] == '3C2E' ? 'selected' : '' ?>>3C2E</option>
                    </select>
                </div>
            </div>
               
            <div class="form-row">
               
                <div>
                    <label for="prenom">Prénom:</label>
                    <input type="text" id="prenom" name="prenom" value="<?= isset($agent) ? esc($agent['prenom']) : '' ?>" required>
                </div>
                <div>
                    <label for="indice">Indice :</label>
                    <input type="number" id="indice" name="indice" value="<?= isset($agent) ? esc($agent['indice']): '' ?>" required>
                </div>
            </div>

            <!-- Troisième ligne de champs (Droite) -->
            <div class="form-row">
                <div>
                    <label for="date_naissance">Date de Naissance:</label>
                    <input type="date" id="date_naissance" name="date_naissance" value="<?= isset($agent) ? esc($agent['date_naissance']) : '' ?>" required>
                </div>
                <div>
                    <label for="date_entree">Date d'Entrée:</label>
                    <input type="date" id="date_entree" name="date_entree" value="<?= isset($agent) ? esc($agent['date_entree']) : '' ?>" required>
                </div>
              
            </div>

            <div class="form-row">
                <div>
                    <label for="contact">Contact:</label>
                    <input type="number" id="contact" name="contact" value="<?= isset($agent) ? esc($agent['contact']) : '' ?>" required>
                </div>
                <div>
                    <label for="direction">Direction:</label>
                    <select id="direction" name="direction" required>
                        <option value="">Sélectionnez</option>
                        <option value="DSI" <?= isset($agent) && $agent['direction'] == 'DSI' ? 'selected' : '' ?>>DSI</option>
                        <option value="DRH" <?= isset($agent) && $agent['direction'] == 'DRH' ? 'selected' : '' ?>>DRH</option>
                        <!-- Ajoutez les autres directions... -->
                    </select>
                </div>
            </div>
            
            <!-- Lignes supplémentaires (Gauche) -->
            <div class="form-row">
                <div>
                    <label for="cin">CIN:</label>
                    <input type="number" id="cin" name="cin" value="<?= isset($agent) ? esc($agent['cin']) : '' ?>" required>
                </div>
                <div>
                    <label for="qualite">Qualité:</label>
                    <select id="qualite" name="qualite" required>
                        <option value="">Sélectionnez</option>
                        <option value="ELD" <?= isset($agent) && $agent['qualite'] == 'ELD' ? 'selected' : '' ?>>ELD</option>
                        <option value="EFA" <?= isset($agent) && $agent['qualite'] == 'EFA' ? 'selected' : '' ?>>EFA</option>
                        <option value="HEE" <?= isset($agent) && $agent['qualite'] == 'HEE' ? 'selected' : '' ?>>HEE</option>
                        <option value="FONCTIONNAIRE" <?= isset($agent) && $agent['qualite'] == 'FONCTIONNAIRE' ? 'selected' : '' ?>>FONCTIONNAIRE</option>
                    </select>
                </div>
            </div>

            <!-- Lignes supplémentaires (Droite) -->
            <div class="form-row">
                <div>
                    <label for="situation_matrimoniale">Situation Matrimoniale:</label>
                    <select id="situation_matrimoniale" name="situation_matrimoniale" required>
                        <option value="">Sélectionnez</option>
                        <option value="Marié" <?= isset($agent) && $agent['situation_matrimoniale'] == 'Marié' ? 'selected' : '' ?>>Marié</option>
                        <option value="Celibataire" <?= isset($agent) && $agent['situation_matrimoniale'] == 'Celibataire' ? 'selected' : '' ?>>Célibataire</option>
                        <option value="Divorcé" <?= isset($agent) && $agent['situation_matrimoniale'] == 'Divorcé' ? 'selected' : '' ?>>Divorcé</option>
                        <option value="Veuf/Veuve" <?= isset($agent) && $agent['situation_matrimoniale'] == 'Veuf/Veuve' ? 'selected' : '' ?>>Veuf/Veuve</option>
                    </select>
                </div>
            </div>

            <!-- Dernière ligne de champs (Qualité) -->
            <div class="form-row">
                <div>
                    <label for="localisation">Localisation:</label>
                    <select id="localisation" name="localisation" required>
                        <option value="">Sélectionnez</option>
                        <option value="Analamanga" <?= isset($agent) && $agent['localisation'] == 'Analamanga' ? 'selected' : '' ?>>Analamanga</option>
                        <option value="Antananarivo" <?= isset($agent) && $agent['localisation'] == 'Antananarivo' ? 'selected' : '' ?>>Antananarivo</option><option value="Fianarantsoa" <?= isset($agent) && $agent['localisation'] == 'Fianarantsoa' ? 'selected' : '' ?>>Fianarantsoa</option>
                        <option value="Menabe" <?= isset($agent) && $agent['localisation'] == 'Menabe' ? 'selected' : '' ?>>Menabe</option>
                        <option value="Melaky" <?= isset($agent) && $agent['localisation'] == 'Melaky' ? 'selected' : '' ?>>Melaky</option>
                        <option value="Vatovavy" <?= isset($agent) && $agent['localisation'] == 'Vatovavy' ? 'selected' : '' ?>>Vatovavy</option>
                        <option value="Fitovinany" <?= isset($agent) && $agent['localisation'] == 'Fitovinany' ? 'selected' : '' ?>>Fitovinany</option>
                        <option value="Boeny" <?= isset($agent) && $agent['localisation'] == 'Boeny' ? 'selected' : '' ?>>Boeny</option>
                        <option value="Vakinakaratra" <?= isset($agent) && $agent['localisation'] == 'Vakinakaratra' ? 'selected' : '' ?>>Vakinakaratra</option>
                        <option value="Itasy" <?= isset($agent) && $agent['localisation'] == 'Itasy' ? 'selected' : '' ?>>Itasy</option>
                        <option value="Diana" <?= isset($agent) && $agent['localisation'] == 'Diana' ? 'selected' : '' ?>>Diana</option>
                        <option value="Bongolava" <?= isset($agent) && $agent['localisation'] == 'Bongolava' ? 'selected' : '' ?>>Bongolava</option>
                        <option value="Sava" <?= isset($agent) && $agent['localisation'] == 'Sava' ? 'selected' : '' ?>>Sava</option>
                        <option value="Haute-Matsiatra" <?= isset($agent) && $agent['localisation'] == 'Haute-Matsiatra' ? 'selected' : '' ?>>Haute Matsiatra</option>
                        <option value="Ihorombe" <?= isset($agent) && $agent['localisation'] == 'Ihorombe' ? 'selected' : '' ?>>Ihorombe</option>
                        <option value="Antsimo-Antsinanana" <?= isset($agent) && $agent['localisation'] == 'Antsimo-Antsinanana' ? 'selected' : '' ?>>Antsimo-Antsinanana</option>
                        <option value="Analanjirofo" <?= isset($agent) && $agent['localisation'] == 'Analanjirofo' ? 'selected' : '' ?>>Analanjirofo</option>
                        <option value="Amoroni-mania" <?= isset($agent) && $agent['localisation'] == 'Amoroni-mania' ? 'selected' : '' ?>>Amoron'i Mania</option>
                        <option value="Alaotra-Mangoro" <?= isset($agent) && $agent['localisation'] == 'Alaotra-Mangoro' ? 'selected' : '' ?>>Alaotra-Mangoro</option>
                        <option value="Atsinanana" <?= isset($agent) && $agent['localisation'] == 'Atsinanana' ? 'selected' : '' ?>>Atsinanana</option>
                        <option value="Bestiboka" <?= isset($agent) && $agent['localisation'] == 'Bestiboka' ? 'selected' : '' ?>>Bestiboka</option>
                        <option value="Sofia" <?= isset($agent) && $agent['localisation'] == 'Sofia' ? 'selected' : '' ?>>Sofia</option>
                        <option value="Anosy" <?= isset($agent) && $agent['localisation'] == 'Anosy' ? 'selected' : '' ?>>Anosy</option>
                        <option value="Antsimo-Andrefana" <?= isset($agent) && $agent['localisation'] == 'Antsimo-Andrefana' ? 'selected' : '' ?>>Antsimo-Andrefana</option>
                    </select>
                </div>
            </div>
            <div class="boutton">
                <button type="submit" >
                    <img src="/images/image-bouton.png" alt="Enregistrer"  >
                </button>
            </div>
    </form>

    <p id="successMessage" class="success-message" style="display: none;">Agent ajouté avec succès !</p>
    <p id="errorMessage" class="error-message" style="display: none;">Erreur lors de l'ajout de l'agent.</p>
  </div>
  
  <div class="form-footer">
    <form action="/dashboard" method="get">
        <button class="back-button">← Retour</button>
    </form>
  </div>
</body>
</html>
