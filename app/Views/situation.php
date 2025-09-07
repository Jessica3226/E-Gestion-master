<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situation Adminstrative</title>
    <link rel="stylesheet" href="<?= base_url('style/profil.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background-color: #333; /* noir */
            color: #fff;
        }
        td {
            background-color: #f2f2f2; /* gris clair */
        }
        tr:nth-child(even) td {
            background-color: #fff; /* blanc */
        }
    </style>
</head>
<body>
    <div class="text-center">
        <h3 style="color: #0f5534">SITUATION ADMINISTRATIVE</h3>
    </div>
    <div class="text-left">
        <strong style="font-size: 20px"><?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?></strong><br>
        <strong style="font-size: 20px">IM <?= esc($agent['matricule']) ?></strong>
        <p>Né le <?= esc($agent['date_naissance']); ?></p>
        <p>Habite à <?= esc($agent['adresse'] ?? '—') ?> à <?= esc($agent['localisation']) ?></p>
        <p>Tel: <?= esc($agent['contact'] ?? '—') ?></p>
    </div>

    <div class="container mt-5">
        <h2>Liste des Agents</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Corps</th>
                    <th>Grade</th>
                    <th>Acte</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($agents) && is_array($agents)): ?>
                    <?php foreach($agents as $agent): ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($agent['debut'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($agent['fin'])) ?></td>
                            <td><?= esc($agent['corps']) ?></td>
                            <td><?= esc($agent['grade']) ?></td>
                            <td><?= esc($agent['acte']) ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Modifier</a>
                                <a href="#" class="btn btn-sm btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucun agent trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Boutons -->
    <div class="action-buttons my-3 d-flex justify-content-center gap-3">
        <!-- Bouton retour -->
        <a href="<?= base_url('profil') ?>" class="btn btn-secondary me-2">
            <i class="bi bi-arrow-left-circle me-1"></i> Retour
        </a>
        <!-- Bouton imprimer -->
        <button class="btn btn-success print-btn" onclick="window.print()">
            <i class="bi bi-printer-fill me-1"></i> Imprimer
        </button>
    </div>
</body>
</html>