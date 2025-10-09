<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Profil Agent</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="<?= base_url('style/profil.css') ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  
</head>
<body>

<header class="app-header">
    <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left">
  <div class="menu-container" style="position: relative;">
    <button class="menu-btn" id="menuBtn"><i class="bi bi-list"></i></button>
    <div class="dropdown-menu-custom" id="dropdownMenu">
    <a href="/situation">
    <i class="bi bi-file-text me-1"></i> Situation
</a>

<a href="/certificat">
    <i class="bi bi-file-earmark-check me-1"></i> Certificat
</a>

      <a href="<?= base_url('/logout') ?>" class="logout-btn">
          <i class="bi bi-box-arrow-right"></i> Déconnexion
      </a>
    </div>
  </div>
</header>

<div class="profile-section">
  <div class="profile-card">
    <div class="row text-center text-md-start">
      <!-- Gauche : Contact rapide -->
      <div class=" contact col-12 col-md-4 mb-4 mb-md-0">
        <h4 class="mb-3 text-success"> Contact rapide</h4>
        <p><i class="bi bi-telephone-fill me-2 text-success"></i><strong>Téléphone :</strong> <?= esc($agent['contact'] ?? '—') ?></p>
        <p><i class="bi bi-envelope-fill me-2 text-success"></i><strong>Email :</strong> <?= esc($agent['email'] ?? '—') ?></p>
        <p><i class="bi bi-geo-alt-fill me-2 text-success"></i><strong>Adresse :</strong> <?= esc($agent['adresse'] ?? '—') ?> (<?= esc($agent['localisation'] ?? '—') ?>)</p>

        <a href="/completer-info/edit/<?= $agent['id'] ?>" class="btn btn-sm btn-outline-primary mt-2">
            <i class="bi bi-pencil-fill me-1"></i> Modifier mes infos
        </a>
    </div>
      
      <!-- Centre : Photo + Nom -->
      <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-center">
      <strong class="title-text"> Profil Agent</strong>
        <form action="<?= site_url('ajoutphoto/store') ?>" method="post" enctype="multipart/form-data" id="photoForm">
          <div class="profile-photo-wrapper">
            <img id="profile-img" src="<?= base_url('uploads/' . ($agent['photo'] ?? 'agent.png')) ?>" alt="Photo de profil" class="profile-photo">
            <label for="profile-pic"><i class="bi bi-camera-fill"></i></label>
            <input type="file" id="profile-pic" name="photo" accept="image/*">
          </div>
          <input type="hidden" name="agent_id" value="<?= esc($agent['id']) ?>">
        </form>
        <div class="fullname mt-2"><?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?></div>
        <div class="subtext"><?= esc($agent['qualite'] ?? 'Agent') ?></div>
      </div>
      
      <!-- Droite : Détails -->
      <div class="col-12 col-md-4">
        <h4 class="mb-3 text-success"> Détails</h4>
        <div class="details-list">
          <p><strong>Matricule :</strong> <?= esc($agent['matricule'] ?? '—') ?></p>
          <p><strong>Date de naissance :</strong> <?= esc($agent['date_naissance'] ?? '—') ?></p>
          <p><strong>CIN :</strong> <?= esc($agent['cin'] ?? '—') ?></p>
          <p><strong>Situation :</strong> <?= esc($agent['situation_matrimoniale'] ?? '—') ?></p>
          <p><strong>Date entrée :</strong> <?= esc($agent['date_entree'] ?? '—') ?></p>
          <p><strong>Corps :</strong> <?= esc($agent['corps'] ?? '—') ?></p>
          <p><strong>Grade :</strong> <?= esc($agent['grade'] ?? '—') ?></p>
          <p><strong>Indice :</strong> <?= esc($agent['indice'] ?? '—') ?></p>
          <p><strong>Direction :</strong> <?= esc($agent['direction'] ?? '—') ?></p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Auto-submit photo
  document.getElementById('profile-pic').addEventListener('change', function () {
    document.getElementById('photoForm').submit();
  });

  // Toggle menu
  const menuBtn = document.getElementById('menuBtn');
  const dropdownMenu = document.getElementById('dropdownMenu');

  menuBtn.addEventListener('click', () => {
    dropdownMenu.style.display = dropdownMenu.style.display === 'flex' ? 'none' : 'flex';
  });

  // Fermer menu si clic à l'extérieur
  document.addEventListener('click', (e) => {
    if (!menuBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
      dropdownMenu.style.display = 'none';
    }
  });
</script>

</body>
</html>
