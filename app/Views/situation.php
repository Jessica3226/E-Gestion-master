<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Situation Administrative</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('style/profil.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <h3 class="text-center text-success">SITUATION ADMINISTRATIVE</h3>

    <div class="text-left my-3">
        <strong><?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?></strong><br>
        <strong>IM <?= esc($agent['matricule']) ?></strong>
        <p>Né le <?= esc($agent['date_naissance']); ?></p>
        <p>Habite à <?= esc($agent['localisation']) ?></p>
        <p>Tel: <?= esc($agent['contact']) ?></p>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Début</th>
                <th>Fin</th>
                <th>Corps</th>
                <th>Cat</th>
                <th>Grade</th>
                <th>Acte</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($situations)): ?>
            <?php foreach ($situations as $s): ?>
                <tr>
                    <td><?= esc($s['date_debut']) ?></td>
                    <td><?= esc($s['date_fin'] ?? '-') ?></td>
                    <td><?= esc($s['corps']) ?></td>
                    <td><?= esc($s['cat']) ?></td>
                    <td><?= esc($s['grade']) ?></td>
                    <td><?= esc($s['acte']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="text-center text-muted">Aucune situation administrative trouvée</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <!-- Boutons -->
    <div class="action-buttons my-3 d-flex justify-content-center gap-3">
        <a href="<?= base_url('profil') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left-circle me-1"></i> Retour
        </a>
        <button class="btn btn-success" onclick="window.print()">
            <i class="bi bi-printer-fill me-1"></i> Imprimer
        </button>
    </div>
</body>
</html>
