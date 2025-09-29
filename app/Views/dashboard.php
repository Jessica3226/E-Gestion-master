<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Tableau de bord RH</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('style/dash.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="container-fluid p-4">

  <div class="dashboard-header d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0"><img src="images/logo-left.png" alt="Logo Gauche" class="logo-left"> Tableau de bord RH</h2>
    <div class="d-flex align-items-center gap-2">
      <input type="text" id="searchGlobal" class="form-control form-control-sm" placeholder="Rechercher...">
      <button class="btn btn-light btn-sm" id="btnExport"><i class="fas fa-file-export"></i> Export</button>
      <button class="logout-btn" onclick="logoutUser()"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-9">
      <div class="row g-3 mb-4">
        <div class="col-md-3">
          <div class="card stats-card text-center p-3">
            <h5><i class="fas fa-user-check"></i> Agents actifs</h5>
            <h3 class="text-success">
              <?= $agentsActifs > 0 ? $agentsActifs : 'Aucun agent connecté' ?>
            </h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card stats-card text-center p-3">
            <h5><i class="fas fa-file-contract"></i> Contrats</h5>
            <h6>En cours : <span class="text-success"><?= $contratsEnCours ?></span></h6>
            <h6>Expirés : <span class="text-danger"><?= $contratsExpires ?></span></h6>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card stats-card text-center p-3">
            <h5><i class="fas fa-users"></i> Familles liées</h5>
            <h3 class="text-primary"><?= $famillesLiees ?></h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card stats-card text-center p-3">
            <h5><i class="fas fa-archive"></i> Archives récentes</h5>
            <h3 class="text-secondary"><?= $archivesRecentes ?></h3>
          </div>
        </div>
      </div>

      <!-- ZONE DYNAMIQUE -->
      <div class="card shadow-sm mb-4">
        <div class="card-header" style="background-color: #10700d; color: white;">Zone dynamique</div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Derniers agents ajoutés :
              <ul>
                <?php foreach($derniersAgents as $a): ?>
                  <li><?= esc($a['nom']) ?> <?= esc($a['prenom']) ?></li>
                <?php endforeach; ?>
              </ul>
            </li>
            <li class="list-group-item">Contrats proches expiration : <strong><?= count($contratsAlertes) ?></strong></li>
            <li class="list-group-item">Familles incomplètes : <strong><?= count($famillesIncompletes) ?></strong></li>
            <li class="list-group-item">Historique situations : <strong><?= count($historiqueSituations) ?></strong></li>
          </ul>
        </div>
      </div>

    </div>

    <div class="col-lg-3">
      <div class="sidebar">
        <div class="module"><i class="fas fa-user"></i> <a href="/ajoutAgent" >Agents</a><br><small>Ajouter des agents</small></div>
        <div class="module"><i class="fas fa-users"></i><a href="/familleAgent" >Famille</a> <br><small>Gestion des membres liés</small></div>
        <div class="module"><i class="fas fa-list"></i><a href="/listesAgent" >Listes</a>  <br><small>Modification, suppression, contrats</small></div>
        <div class="module"><i class="fas fa-archive"></i> <a href="/archivesAgent" >Archives</a> <br><small>Consultation, suppression</small></div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('searchGlobal').addEventListener('input', function() {
    let val = this.value.toLowerCase();
    document.querySelectorAll('.list-group-item, .stats-card').forEach(el => {
      el.style.display = el.innerText.toLowerCase().includes(val) ? '' : 'none';
    });
  });

  document.getElementById('btnExport').addEventListener('click', function() {
    const data = {
      agentsActifs: <?= $agentsActifs ?>,
      contratsEnCours: <?= $contratsEnCours ?>,
      contratsExpires: <?= $contratsExpires ?>,
      famillesLiees: <?= $famillesLiees ?>
    };
    const blob = new Blob([JSON.stringify(data, null, 2)], {type: "application/json"});
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = "dashboard_export.json"; 
    a.click();
    URL.revokeObjectURL(url);
  });
</script>
</body>
</html>
