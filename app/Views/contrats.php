<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajout Situation Administrative</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .alert-success {
      position: fixed;
      top: 20px;
      right: 20px;
      z-index: 9999;
      animation: fadeOut 3s forwards;
    }

    @keyframes fadeOut {
      0% { opacity: 1; }
      80% { opacity: 1; }
      100% { opacity: 0; display: none; }
    }
  </style>
</head>
<body class="bg-light">

<div class="container mt-5">
  <h2 class="mb-4">Ajouter une situation administrative</h2>

  <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <form action="/situation-admin/enregistrer" method="post" class="bg-white p-4 rounded shadow-sm">
    <div class="mb-3">
      <label for="agent_matricule" class="form-label">Matricule Agent</label>
      <input type="text" name="agent_matricule" class="form-control" required>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="date_debut" class="form-label">Date début</label>
        <input type="date" name="date_debut" class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="date_fin" class="form-label">Date fin</label>
        <input type="date" name="date_fin" class="form-control">
      </div>
    </div>

    <div class="mb-3">
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

    <div class="mb-3">
      <label for="cat" class="form-label">Catégorie</label>
      <input type="text" name="cat" class="form-control">
    </div>

    <div class="mb-3">
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

    <div class="mb-3">
      <label for="acte" class="form-label">Acte</label>
      <input type="text" name="acte" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Enregistrer</button>
  </form>
</div>

</body>
</html>
