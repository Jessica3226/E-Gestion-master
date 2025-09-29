<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des familles</title>
    <link href="<?= base_url('style/familleAgent.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php if(session()->getFlashdata('success')): ?>
    <div id="success-message" class="alert alert-success text-center">
        <i class="bi bi-check-circle"></i> <?= session()->getFlashdata('success') ?>
    </div>
    <script>
        setTimeout(() => {
            const successMessage = document.getElementById('success-message');
            if(successMessage) successMessage.style.display = 'none';
        }, 3000);
    </script>
<?php endif; ?>

<?php if(session()->getFlashdata('error')): ?>
    <div id="alert-message" class="alert alert-danger text-center">
        <i class="bi bi-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
    </div>
    <script>
        setTimeout(() => {
            const alertMessage = document.getElementById('alert-message');
            if(alertMessage) alertMessage.style.display = 'none';
        }, 3000);
    </script>
<?php endif; ?>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="images/logo-left.png" alt="Logo">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="/ajoutAgent">Agents</a></li>
        <li class="nav-item"><a class="nav-link" href="/familleAgent">Famille</a></li>
        <li class="nav-item"><a class="nav-link" href="/listesAgent">Listes</a></li>
        <li class="nav-item"><a class="nav-link" href="/archivesAgent">Archives</a></li>
      </ul>
    </div>

    <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary btn-retour">
      <i class="bi bi-arrow-left-circle me-2"></i> Retour
    </a>
  </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center mb-4">Liste complète des membres de la famille</h2>
    <div class="top-bar">
        <div>
            <a href="<?= base_url('/famille/ajouter') ?>" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Nouveau
            </a>
        </div>
        <div>
            <input type="text" id="searchMatricule" class="form-control" style="min-width: 200px;" placeholder="Rechercher par matricule">
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="familleTable">
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Relation</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($famille as $membre): ?>
                    <tr>
                        <td><?= esc($membre['matricule']) ?></td>
                        <td><?= esc($membre['nom_famille']) ?></td>
                        <td><?= esc($membre['prenom']) ?></td>
                        <td><?= esc($membre['date_naissance']) ?></td>
                        <td><?= esc($membre['relation']) ?></td>
                        <td><?= esc($membre['contact']) ?></td>
                        <td>
                            <a href="<?= site_url('familles/edit/'.$membre['id']) ?>" class="btn btn-sm btn-primary">
                                <i class="bi bi-pencil-square"></i> Modifier
                            </a>
                            <a href="<?= site_url('familles/delete/'.$membre['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce membre ?')">
                                <i class="bi bi-trash"></i> Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-2 flex-wrap">
        <div>Effectif total : <span id="total-count"><?= count($famille) ?></span></div>
        <div class="pagination">
            <button id="prevBtn">Précédent</button>
            <button id="nextBtn">Suivant</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const table = document.getElementById('familleTable').getElementsByTagName('tbody')[0];
    const rows = Array.from(table.getElementsByTagName('tr'));
    const searchInput = document.getElementById('searchMatricule');
    const totalCount = document.getElementById('total-count');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    const rowsPerPage = 5;
    let currentPage = 1;
    let filteredRows = rows;

    function renderTable() {
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;

        rows.forEach(row => row.style.display = 'none');
        filteredRows.slice(start, end).forEach(row => row.style.display = '');

        totalCount.textContent = filteredRows.length;

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage * rowsPerPage >= filteredRows.length;
    }

    searchInput.addEventListener('input', function() {
        const query = this.value.trim().toLowerCase();
        filteredRows = rows.filter(row => row.cells[0].textContent.toLowerCase().includes(query));
        currentPage = 1;
        renderTable();
    });

    prevBtn.addEventListener('click', () => {
        if(currentPage > 1){
            currentPage--;
            renderTable();
        }
    });

    nextBtn.addEventListener('click', () => {
        if(currentPage * rowsPerPage < filteredRows.length){
            currentPage++;
            renderTable();
        }
    });

    renderTable();
</script>
</body>
</html>
