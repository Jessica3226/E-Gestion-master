<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajout d'un Agent</title>
  <link href="<?= base_url('style/ajoutAg.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="images/logo-left.png" alt="Logo">
    </a>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link <?= service('uri')->getSegment(1) == 'ajoutAgent' ? 'active' : '' ?>" href="/ajoutAgent">
                Agents
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= service('uri')->getSegment(1) == 'familleAgent' ? 'active' : '' ?>" href="/familleAgent">
                Famille
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= service('uri')->getSegment(1) == 'listesAgent' ? 'active' : '' ?>" href="/listesAgent">
                Listes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= service('uri')->getSegment(1) == 'archivesAgent' ? 'active' : '' ?>" href="/archivesAgent">
                Archives
            </a>
        </li>
      </ul>
    </div>
    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-retour">
      <i class="bi bi-arrow-left-circle me-2"></i> Retour
    </a>
  </div>
</nav>

<div class="container my-5">
    <div class="form-header">
        <img src="<?= base_url('images/logo-right.png') ?>" alt="Logo" class="logo">
        <h2>RESSOURCES HUMAINES</h2>
        <h4><?= isset($agent) ? "Modifier un agent" : "Ajouter un agent" ?></h4>
    </div>

    <div class="form-container">
        <form action="<?= isset($agent) ? base_url('agents/update/' . $agent['id']) : base_url('agent/addAgent') ?>" method="post">
           
            <div class="form-section">
                <h5>INFORMATIONS PERSONNELLES</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="matricule" class="form-label">IM</label>
                        <input class="form-control" type="number" id="matricule" name="matricule" value="<?= isset($agent) ? esc($agent['matricule']) : '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?= isset($agent) ? esc($agent['nom']) : '' ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= isset($agent) ? esc($agent['prenom']) : '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="date_naissance" class="form-label">Date de Naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="<?= isset($agent) ? esc($agent['date_naissance']) : '' ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="number" class="form-control" id="contact" name="contact" value="<?= isset($agent) ? esc($agent['contact']) : '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cin" class="form-label">CIN</label>
                        <input type="number" id="cin" name="cin" class="form-control" value="<?= isset($agent) ? esc($agent['cin']) : '' ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="situation_matrimoniale" class="form-label">Situation Matrimoniale</label>
                    <select id="situation_matrimoniale" name="situation_matrimoniale" class="form-select" required>
                        <option value="">Sélectionnez</option>
                        <option value="Marié" <?= isset($agent) && $agent['situation_matrimoniale'] == 'Marié' ? 'selected' : '' ?>>Marié</option>
                        <option value="Celibataire" <?= isset($agent) && $agent['situation_matrimoniale'] == 'Celibataire' ? 'selected' : '' ?>>Célibataire</option>
                        <option value="Divorcé" <?= isset($agent) && $agent['situation_matrimoniale'] == 'Divorcé' ? 'selected' : '' ?>>Divorcé</option>
                        <option value="Veuf/Veuve" <?= isset($agent) && $agent['situation_matrimoniale'] == 'Veuf/Veuve' ? 'selected' : '' ?>>Veuf/Veuve</option>
                    </select>
                </div>
            </div>

            <div class="form-section">
                <h5>INFORMATIONS PROFESSIONNELLES</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="date_entree" class="form-label">Date d'Entrée</label>
                        <input type="date" id="date_entree" name="date_entree" class="form-control" value="<?= isset($agent) ? esc($agent['date_entree']) : '' ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="corps" class="form-label">Corps</label>
                        <select class="form-select" id="corps" name="corps" required>
                            <option value="">Sélectionnez</option>
                            <option value="sous-operateur" <?= isset($agent) && $agent['corps'] == 'sous-operateur' ? 'selected' : '' ?>>Sous-Opérateur</option>
                            <option value="operateur" <?= isset($agent) && $agent['corps'] == 'operateur' ? 'selected' : '' ?>>Opérateur</option>
                            <option value="encadreur" <?= isset($agent) && $agent['corps'] == 'encadreur' ? 'selected' : '' ?>>Encadreur</option>
                            <option value="Technicien_Superieur" <?= isset($agent) && $agent['corps'] == 'Technicien_Superieur' ? 'selected' : '' ?>>Technicien Supérieur</option>
                            <option value="realisateur" <?= isset($agent) && $agent['corps'] == 'realisateur' ? 'selected' : '' ?>>Réalisateur</option>
                            <option value="planificateur" <?= isset($agent) && $agent['corps'] == 'planificateur' ? 'selected' : '' ?>>Planificateur</option>
                            <option value="cpci" <?= isset($agent) && $agent['corps'] == 'cpci' ? 'selected' : '' ?>>CPCI</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="grade" class="form-label">Grade</label>
                        <select id="grade" name="grade" class="form-select" required>
                            <option value="">Sélectionnez</option>
                            <option value="1C1E" <?= isset($agent) && $agent['grade'] == '1C1E' ? 'selected' : '' ?>>1C1E</option>
                            <option value="1C2E" <?= isset($agent) && $agent['grade'] == '1C2E' ? 'selected' : '' ?>>1C2E</option>
                            <option value="1C3E" <?= isset($agent) && $agent['grade'] == '1C3E' ? 'selected' : '' ?>>1C3E</option>
                            <option value="2C1E" <?= isset($agent) && $agent['grade'] == '2C1E' ? 'selected' : '' ?>>2C1E</option>
                            <option value="2C2E" <?= isset($agent) && $agent['grade'] == '2C2E' ? 'selected' : '' ?>>2C2E</option>
                            <option value="2C3E" <?= isset($agent) && $agent['grade'] == '2C3E' ? 'selected' : '' ?>>2C3E</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="indice" class="form-label">Indice</label>
                        <input type="number" class="form-control" id="indice" name="indice" value="<?= isset($agent) ? esc($agent['indice']) : '' ?>" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="direction" class="form-label">Direction</label>
                    <select id="direction" name="direction" class="form-select" required>
                        <option value="">Sélectionnez</option>
                        <option value="DGS" <?= isset($agent) && $agent['direction'] == 'DGS' ? 'selected' : '' ?>>DGS</option>
                        <option value="DGANS" <?= isset($agent) && $agent['direction'] == 'DGANS' ? 'selected' : '' ?>>DG ANS</option>
                        <option value="DGTAF" <?= isset($agent) && $agent['direction'] == 'DGTAF' ? 'selected' : '' ?>>DG TAFITA</option>
                        <option value="INJ" <?= isset($agent) && $agent['direction'] == 'INJ' ? 'selected' : '' ?>>INJ</option>
                        <option value="CRJS" <?= isset($agent) && $agent['direction'] == 'CRJS' ? 'selected' : '' ?>>CRJS</option>
                        <option value="DAF" <?= isset($agent) && $agent['direction'] == 'DAF' ? 'selected' : '' ?>>DAF</option>
                        <option value="DRH" <?= isset($agent) && $agent['direction'] == 'DRH' ? 'selected' : '' ?>>DRH</option>
                        <option value="DIL" <?= isset($agent) && $agent['direction'] == 'DIL' ? 'selected' : '' ?>>DIL</option>
                        <option value="DCAI" <?= isset($agent) && $agent['direction'] == 'DCAI' ? 'selected' : '' ?>>DCAI</option>
                        <option value="SPCIJ" <?= isset($agent) && $agent['direction'] == 'SPCIJ' ? 'selected' : '' ?>>SPCIJ</option>
                        <option value="EPQE" <?= isset($agent) && $agent['direction'] == 'EPQE' ? 'selected' : '' ?>>CN-EPQE</option>
                        <option value="DSI" <?= isset($agent) && $agent['direction'] == 'DRH' ? 'selected' : '' ?>>DSI</option>
                    </select>
                </div>
            </div>

            <div class="form-section">
                <h5>AUTRES INFORMATIONS</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="qualite" class="form-label">Qualité</label>
                        <select id="qualite" name="qualite" class="form-select" required>
                            <option value="">Sélectionnez</option>
                            <option value="ELD" <?= isset($agent) && $agent['qualite'] == 'ELD' ? 'selected' : '' ?>>ELD</option>
                            <option value="EFA" <?= isset($agent) && $agent['qualite'] == 'EFA' ? 'selected' : '' ?>>EFA</option>
                            <option value="HEE" <?= isset($agent) && $agent['qualite'] == 'HEE' ? 'selected' : '' ?>>HEE</option>
                            <option value="FONCTIONNAIRE" <?= isset($agent) && $agent['qualite'] == 'FONCTIONNAIRE' ? 'selected' : '' ?>>FONCTIONNAIRE</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="localisation" class="form-label">Localisation</label>
                        <select id="localisation" name="localisation" class="form-select" required>
                            <option value="">Sélectionnez</option>
                            <option value="Analamanga" <?= isset($agent) && $agent['localisation'] == 'Analamanga' ? 'selected' : '' ?>>Analamanga</option>
                            <option value="Antananarivo" <?= isset($agent) && $agent['localisation'] == 'Antananarivo' ? 'selected' : '' ?>>Antananarivo</option>
                            <option value="Fianarantsoa" <?= isset($agent) && $agent['localisation'] == 'Fianarantsoa' ? 'selected' : '' ?>>Fianarantsoa</option>
                            <option value="Menabe" <?= isset($agent) && $agent['localisation'] == 'Menabe' ? 'selected' : '' ?>>Menabe</option>
                            <option value="Boeny" <?= isset($agent) && $agent['localisation'] == 'Boeny' ? 'selected' : '' ?>>Boeny</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-end d-flex justify-content-between">
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-save me-2"></i> Enregistrer
                </button>
            </div>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>