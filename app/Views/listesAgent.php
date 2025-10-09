<?php
    $tri = isset($tri) ? $tri : 'nom';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Agents</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style/affichageAgent.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

<div class="container mt-5">

    <div class="top-bar d-flex justify-content-between align-items-center mb-4">
        <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left" style="height:50px;">
        <h1> Liste des Agents</h1>
        <img src="images/logo-right.png" alt="Logo Droite" class="logo-right" style="height:50px;">
    </div> 

    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#triMenu" aria-controls="triMenu">
            ☰ Trier
        </button>
        <input type="text" id="searchInput" class="form-control w-25" placeholder="Rechercher...">
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="triMenu" aria-labelledby="triMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="triMenuLabel">Trier par</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-group">
                <a href="/grouped?tri=corps" class="list-group-item">Corps</a>
                <a href="/grouped?tri=grade" class="list-group-item">Grade</a>
                <a href="/grouped?tri=localisation" class="list-group-item">Localisation</a>
                <a href="/grouped?tri=situation_matrimoniale" class="list-group-item">Situation Matrimoniale</a>
                <a href="/grouped?tri=direction" class="list-group-item">Direction</a>
            </ul>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th>IM</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de Naissance</th>
                        <th>Contact</th>
                        <th>CIN</th>
                        <th>Situation Matrimoniale</th>
                        <th>Date d'Entrée</th>
                        <th>Corps</th>
                        <th>Grade</th>
                        <th>Indice</th>
                        <th>Qualité</th>
                        <th>Localisation</th>
                        <th>Direction</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <?php foreach ($agents as $agent): ?>
                        <tr>
                            <td><?= esc($agent['matricule']); ?></td>
                            <td><?= esc($agent['nom']); ?></td>
                            <td><?= esc($agent['prenom']); ?></td>
                            <td><?= esc($agent['date_naissance']); ?></td>
                            <td><?= esc($agent['contact']); ?></td>
                            <td><?= esc($agent['cin']); ?></td>
                            <td><?= esc($agent['situation_matrimoniale']); ?></td>
                            <td><?= esc($agent['date_entree']); ?></td>
                            <td><?= esc($agent['corps']); ?></td>
                            <td><?= esc($agent['grade']); ?></td>
                            <td><?= esc($agent['indice']); ?></td>
                            <td><?= esc($agent['qualite']); ?></td>
                            <td><?= esc($agent['localisation']); ?></td>
                            <td><?= esc($agent['direction']); ?></td>
                            <td>
                               <a href="/agents/edit/<?= $agent['id'] ?>" class="btn btn-sm btn-action btn-edit">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <a href="/agents/delete/<?= $agent['id'] ?>" class="btn btn-sm btn-action btn-delete" onclick="return confirm('Confirmer la suppression ?')">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </a>
                                <a href="/contrats" class="btn btn-sm btn-action btn-contrat">
                                    <i class="fas fa-file-signature"></i> Contrat
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <strong>Effectif total : </strong><span id="totalCount"><?= count($agents) ?></span>
    </div>

    <nav>
        <ul class="pagination justify-content-center" id="pagination">
            <li class="page-item" id="prevPage"><a class="page-link" href="#">Précédent</a></li>
            <li class="page-item" id="nextPage"><a class="page-link" href="#">Suivant</a></li>
        </ul>
    </nav>
</div>

<script>
    let rows = Array.from(document.querySelectorAll('#tableBody tr'));
    const rowsPerPage = 5;
    let currentPage = 1;
    let filteredRows = [...rows];

    const tableBody = document.getElementById('tableBody');
    const prevPageBtn = document.getElementById('prevPage');
    const nextPageBtn = document.getElementById('nextPage');
    const searchInput = document.getElementById('searchInput');

    function renderTable() {
        tableBody.innerHTML = '';
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageRows = filteredRows.slice(start, end);
        pageRows.forEach(row => tableBody.appendChild(row));
        updatePaginationButtons();
        document.getElementById('totalCount').textContent = filteredRows.length;
    }

    function updatePaginationButtons() {
        const pageCount = Math.ceil(filteredRows.length / rowsPerPage);
        prevPageBtn.classList.toggle('disabled', currentPage === 1);
        nextPageBtn.classList.toggle('disabled', currentPage === pageCount || pageCount === 0);
    }

    prevPageBtn.addEventListener('click', e => {
        e.preventDefault();
        if(currentPage > 1) { currentPage--; renderTable(); }
    });

    nextPageBtn.addEventListener('click', e => {
        e.preventDefault();
        const pageCount = Math.ceil(filteredRows.length / rowsPerPage);
        if(currentPage < pageCount) { currentPage++; renderTable(); }
    });

    searchInput.addEventListener('input', () => {
        const term = searchInput.value.toLowerCase();
        filteredRows = rows.filter(row => {
            return Array.from(row.cells).some(cell =>
                cell.textContent.toLowerCase().includes(term)
            );
        });
        currentPage = 1;
        renderTable();
    });

    renderTable();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
