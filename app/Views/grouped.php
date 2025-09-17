<?php
$critere = $critere ?? 'corps';
$grouped = $grouped ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste groupée par <?= ucfirst($critere) ?></title>
    <link rel="stylesheet" href="<?= base_url('style/grouped.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="container py-5">
    <div class="mb-3">
        <a href="/listesAgent" class="btn btn-back">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    <div class="text-center">
        <h1 class="mb-4">
            <i class="fas fa-users"></i> Liste des Agents groupés par 
            <span class="text-dark"><?= ucfirst($critere) ?></span>
        </h1>
    </div>

    <div class="mb-4">
        <form method="get" class="d-flex align-items-center gap-2">
            <label class="form-label mb-0"><i class="fas fa-filter"></i> Choisir un critère :</label>
            <select name="tri" class="form-select w-auto" onchange="this.form.submit()">
                <option value="corps" <?= $critere=='corps'?'selected':'' ?>>Corps</option>
                <option value="grade" <?= $critere=='grade'?'selected':'' ?>>Grade</option>
                <option value="direction" <?= $critere=='direction'?'selected':'' ?>>Direction</option>
                <option value="situation_matrimoniale" <?= $critere=='situation_matrimoniale'?'selected':'' ?>>Situation Matrimoniale</option>
                <option value="localisation" <?= $critere=='localisation'?'selected':'' ?>>Localisation</option>
            </select>
        </form>
    </div>

    <!-- Grille responsive -->
    <div class="text-center">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php foreach ($grouped as $categorie => $list): ?>
                <div class="col">
                    <div class="category-card">
                        <div class="category-title">
                            <span><i class="fas fa-folder-open"></i> <?= esc($categorie) ?: 'Non défini' ?></span>
                            <span class="badge bg-light text-dark"><?= count($list) ?> agents</span>
                        </div>
                        <div class="agent-list">
                            <?php foreach ($list as $agent): ?>
                                <div class="agent-item">
                                    <i class="fas fa-user"></i>
                                    <?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (empty($grouped)): ?>
        <div class="alert alert-warning mt-4">
            <i class="fas fa-exclamation-triangle"></i> Aucun agent trouvé pour ce critère.
        </div>
    <?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
