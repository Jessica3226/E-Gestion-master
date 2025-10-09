<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des actions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('style/archive.css') ?>">
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

    <div class="container">
        <div class="top-bar d-flex justify-content-between align-items-center mb-4">
            <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left" style="height:50px;">
            <h1>Historique des actions sur les agents et ses familles</h1>
            <img src="images/logo-right.png" alt="Logo Droite" class="logo-right" style="height:50px;">
        </div>
        <div class="form-header">
            <p class=""></p>

            <form action="<?= site_url('archives/deleteAll') ?>" method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer toutes les actions ?');">
                <?= csrf_field() ?>
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer tout</button>
            </form>
        </div>

        <div class="table-responsive">
            <table id="archiveTable" class="table table-borderless align-middle">
                <thead>
                    <tr>
                        <th>Résumé de l’action</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($archives)): ?>
                        <tr><td colspan="3">Aucune archive trouvée.</td></tr>
                    <?php else: ?>
                        <?php foreach ($archives as $archive): ?>
                            <tr>
                                <td>
                                    <?php
                                        $action = $archive['action'];
                                        $utilisateur = esc($archive['user_matricule']);
                                        $agent = esc($archive['agent_matricule']);
                                        $details = json_decode($archive['details'], true);

                                        $avant = $details['avant'] ?? [];
                                        $apres = $details['apres'] ?? [];
                                        $isFamille = isset($avant['nom_famille']) && isset($avant['prenom']);
                                        $familleId = $avant['id'] ?? ($details['id'] ?? 'inconnu');

                                        
                                        if ($action === 'ajout') {
                                            if ($isFamille) {
                                                echo "L'utilisateur <strong>$utilisateur</strong> a <strong>ajouté une famille</strong> à l’agent <strong>$agent</strong>.";
                                            } else {
                                                echo "L'utilisateur <strong>$utilisateur</strong> a <strong>ajouté</strong> l’agent <strong>$agent</strong>.";
                                            }
                                        } elseif ($action === 'suppression') {
                                            if ($isFamille) {
                                                $familleId = $details['id'] ?? 'inconnu';
                                                echo "L'utilisateur <strong>$utilisateur</strong> a <strong>supprimé une famille</strong de l’agent <strong>$agent</strong> (famille ID: <strong>$familleId</strong>).";
                                            } else {
                                                echo "L'utilisateur <strong>$utilisateur</strong> a <strong>supprimé</strong> l’agent <strong>$agent</strong>.";
                                            }
                                        } elseif ($action === 'modification') {
                                            if ($isFamille) {
                                                echo "L'utilisateur <strong>$utilisateur</strong> a <strong>modifié une famille</strong> de l’agent <strong>$agent</strong> (famille ID: <strong>$familleId</strong>).";
                                            } else {
                                                echo "L'utilisateur <strong>$utilisateur</strong> a <strong>modifié</strong> l’agent <strong>$agent</strong>.";
                                            }

                                            echo "<div class='modif-details'>";
                                            $avant = $details['avant'] ?? [];
                                            $apres = $details['apres'] ?? [];

                                            foreach ($avant as $champ => $valeurAvant) {
                                                $valeurApres = $apres[$champ] ?? null;
                                                if ($valeurAvant != $valeurApres) {
                                                    echo "<div><strong>$champ</strong> : ";
                                                    echo "<span class='avant'>« $valeurAvant »</span> → ";
                                                    echo "<span class='apres'>« $valeurApres »</span></div>";
                                                }
                                            }

                                            echo "</div>";
                                        } else {
                                            echo "Action inconnue effectuée par <strong>$utilisateur</strong>.";
                                        }
                                    ?>
                                </td>
                                <td><?= esc($archive['created_at']) ?></td>
                                <td>
                                <form action="<?= site_url('archives/delete/' . $archive['id']) ?>" method="post" style="display:inline;" onsubmit="return confirm('Supprimer cette action ?');">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <div id="pagination" class="d-flex justify-content-center mt-3"></div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const rowsPerPage = 5;
        const table = document.getElementById("archiveTable");
        const tbody = table.querySelector("tbody");
        const rows = Array.from(tbody.querySelectorAll("tr"));
        const pagination = document.getElementById("pagination");
        let currentPage = 1;

        function showPage(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? "" : "none";
            });

            pagination.innerHTML = "";
            const pageCount = Math.ceil(rows.length / rowsPerPage);

            // Bouton Précédent
            const prevBtn = document.createElement("button");
            prevBtn.textContent = "Précédent";
            prevBtn.className = "btn btn-sm btn-secondary mx-1";
            prevBtn.disabled = page === 1;
            prevBtn.addEventListener("click", () => {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                }
            });
            pagination.appendChild(prevBtn);

            // Bouton Suivant
            const nextBtn = document.createElement("button");
            nextBtn.textContent = "Suivant";
            nextBtn.className = "btn btn-sm btn-secondary mx-1";
            nextBtn.disabled = page === pageCount;
            nextBtn.addEventListener("click", () => {
                if (currentPage < pageCount) {
                    currentPage++;
                    showPage(currentPage);
                }
            });
            pagination.appendChild(nextBtn);
        }

        if (rows.length > 0) {
            showPage(currentPage);
        }
    });
    </script>


</body>
</html>
