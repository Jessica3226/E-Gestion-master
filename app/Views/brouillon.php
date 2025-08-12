
<!DOCTYPE html>
<html lang="fr">
    
    <body>

        <div class="container">
            
        
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Tri à gauche -->
                <form action="" method="get" id="triForm" class="me-auto">
                    <input type="hidden" name="tri" id="triInput">
                    <div class="dropdown">
                        <button class="btn btn-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" name="tri" onchange="this.form.submit()">
                            <li><a class="dropdown-item" href="?tri=corps">Trier par Corps</a></li>
                            <li><a class="dropdown-item" href="?tri=grade">Trier par Grade</a></li>
                            <li><a class="dropdown-item" href="?tri=direction">Trier par Direction</a></li>
                            <li><a class="dropdown-item" href="?tri=localisation">Trier par Localisation</a></li>
                        </ul>
                    </div>
                </form>

                <!-- Titre centré -->
                <h1 class="text-center flex-grow-1 m-0"> Liste des Agents</h1>

                <div class="search-container mb-3">
    <input type="text" name="query" id="searchQuery" class="form-control" placeholder="🔍 Rechercher un agent...">
</div>

<!-- Loader -->
<div id="loader" style="display:none;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Chargement...</span>
    </div>
</div>

            <?php if (!isset($tri_active) || !$tri_active) : ?>
                <table id="agentsTable" class="table">
                    <thead>
                        <tr>
                            <th>IM</th>
                            <th>Nom</th>
                            <th>Prenom</th>
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
                    <tbody id="agentsTableBody">
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
                                    <a href="/agents/edit/<?= $agent['id'] ?>" class="edit-btn">✏️ Modifier</a>
                                    <a href="/agents/delete/<?= $agent['id'] ?>" class="delete-btn" 
                                    onclick="return confirm('Confirmer la suppression ?')">🗑️ Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                            
                    </tbody>
                </table>
                <h4 class="mt-4"> Effectif total : <?= count($agents) ?> agent<?= count($agents) > 1 ? 's' : '' ?></h4>
            
            
            <?php else :?>
                <?php foreach ($groupedAgents as $categorie =>$agentsGroup) : ?>
                    <h3><?= ucfirst($categorie) ?> (Total : <?= count($agentsGroup) ?>)</h3>
                    <table id="agentsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>IM</th>
                                <th>Nom</th>
                                <th>Prenom</th>
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
                        <tbody id="agentsTableBody">
                            <?php foreach ($agentsGroup as $agent): ?>
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
                                
                                    
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <h3>>👥 Effectifs par <?= ucfirst($categorie) ?> : <? count($agentsGroup) ?> agent<?= count($agentsGroup) > 1 ? 's' : '' ?></h3>
            <?php endforeach; ?>

            <p id="errorMessage" class="error-message" style="display: none;">Erreur de chargement des données.</p>
            <?php endif; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script>
document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('searchQuery');
    const tableBody = document.getElementById('agentsTableBody');
    const loader = document.getElementById('loader');
    let timer;
    const delay = 300;

    input.addEventListener('input', () => {
        clearTimeout(timer);
        const query = input.value.trim();

        if (query.length === 0) {
            tableBody.innerHTML = ''; // Afaka averina amin'ny état initial
            return;
        }

        timer = setTimeout(() => {
            loader.style.display = 'block';

            fetch(`/agents/searchLive?query=${encodeURIComponent(query)}`)
                .then(res => {
                    if (!res.ok) throw new Error('Erreur serveur');
                    return res.json();
                })
                .then(data => {
                    if (data.length === 0) {
                        tableBody.innerHTML = `<tr><td colspan="15" class="text-center text-muted">Aucun résultat trouvé.</td></tr>`;
                    } else {
                        const rows = data.map(agent => `
                            <tr>
                                <td>${agent.matricule}</td>
                                <td>${agent.nom}</td>
                                <td>${agent.prenom}</td>
                                <td>${agent.date_naissance}</td>
                                <td>${agent.contact}</td>
                                <td>${agent.cin}</td>
                                <td>${agent.situation_matrimoniale}</td>
                                <td>${agent.date_entree}</td>
                                <td>${agent.corps}</td>
                                <td>${agent.grade}</td>
                                <td>${agent.indice}</td>
                                <td>${agent.qualite}</td>
                                <td>${agent.localisation}</td>
                                <td>${agent.direction}</td>
                                <td>
                                    <a href="/agents/edit/${agent.id}" class="edit-btn">✏️</a>
                                    <a href="/agents/delete/${agent.id}" class="delete-btn" onclick="return confirm('Confirmer ?')">🗑️</a>
                                </td>
                            </tr>
                        `).join('');
                        tableBody.innerHTML = rows;
                    }
                })
                .catch(error => {
                    tableBody.innerHTML = `<tr><td colspan="15" class="text-danger">Erreur : ${error.message}</td></tr>`;
                    console.error('Erreur AJAX:', error);
                })
                .finally(() => {
                    loader.style.display = 'none';
                });
        }, delay);
    });
});
</script>

    </body>
</html>