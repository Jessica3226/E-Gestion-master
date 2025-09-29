<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ajout Situation Administrative</title>
  <link href="<?= base_url('style/ajoutAg.css') ?>" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  <style>
      #notif {
          z-index: 9999 !important;
      }
  </style>
</head>
<body>
  <?php if (session()->getFlashdata('success')): ?>
      <div id="notif" 
          class="alert alert-success alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x m-3 shadow" 
          role="alert">
          <?= session()->getFlashdata('success') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <script>
          setTimeout(() => {
              let notif = document.getElementById('notif');
              if (notif) notif.classList.remove('show');
          }, 3000);
      </script>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
      <div id="notif" 
          class="alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x m-3 shadow" 
          role="alert">
          <?= session()->getFlashdata('error') ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <script>
          setTimeout(() => {
              let notif = document.getElementById('notif');
              if (notif) notif.classList.remove('show');
          }, 3000);
      </script>
  <?php endif; ?>

  <div class="container my-5">
      <div class="form-header">
          <img src="<?= base_url('images/logo-right.png') ?>" alt="Logo" class="logo">
          <h2>RESSOURCES HUMAINES</h2>
          <h4>AJOUTER DES CONTRATS</h4>
      </div>

      <div class="form-container">
          <form action="/situation-admin/enregistrer" method="post">

              <div class="form-section">
                  <h5>INFORMATIONS DE BASE</h5>
                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="agent_matricule" class="form-label">Matricule Agent</label>
                          <input type="text" name="agent_matricule" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                          <label for="cat" class="form-label">Catégorie</label>
                          <input type="text" name="cat" class="form-control">
                      </div>
                  </div>
              </div>

              <div class="form-section">
                  <h5>DATES</h5>
                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="date_debut" class="form-label">Date début</label>
                          <input type="date" name="date_debut" class="form-control" required>
                      </div>
                      <div class="col-md-6">
                          <label for="date_fin" class="form-label">Date fin</label>
                          <input type="date" name="date_fin" class="form-control">
                      </div>
                  </div>
              </div>

              <div class="form-section">
                  <h5>INFORMATIONS PROFESSIONNELLES</h5>
                  <div class="row mb-3">
                      <div class="col-md-6">
                          <label for="corps" class="form-label">Corps</label>
                          <select class="form-select" id="corps" name="corps" required>
                              <option value="">Sélectionnez</option>
                              <option value="sous-operateur">Sous-Opérateur</option>
                              <option value="operateur">Opérateur</option>
                              <option value="encadreur">Encadreur</option>
                              <option value="Technicien_Superieur">Technicien Supérieur</option>
                              <option value="realisateur">Réalisateur</option>
                              <option value="planificateur">Planificateur</option>
                              <option value="cpci">CPCI</option>
                          </select>
                      </div>
                      <div class="col-md-6">
                          <label for="grade" class="form-label">Grade</label>
                          <select id="grade" name="grade" class="form-select" required>
                              <option value="">Sélectionnez</option>
                              <option value="1C1E">1C1E</option>
                              <option value="1C2E">1C2E</option>
                              <option value="1C3E">1C3E</option>
                              <option value="2C1E">2C1E</option>
                              <option value="2C2E">2C2E</option>
                              <option value="2C3E">2C3E</option>
                          </select>
                      </div>
                  </div>
              </div>

              <div class="form-section">
                  <h5>AUTRES INFORMATIONS</h5>
                  <div class="mb-3">
                      <label for="acte" class="form-label">Acte</label>
                      <input type="text" name="acte" class="form-control">
                  </div>
              </div>

              <div class="text-end d-flex justify-content-between">
                  <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary px-4">
                      <i class="bi bi-arrow-left-circle me-2"></i> Retour
                  </a>
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
