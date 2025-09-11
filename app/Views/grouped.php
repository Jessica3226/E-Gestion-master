<?php
// S’assurer que $critere et $grouped sont définis
$critere = $critere ?? 'corps';
$grouped = $grouped ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste groupée par <?= ucfirst($critere) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }
        .category-card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .category-title {
            background: #0d6efd;
            color: white;
            padding: 10px;
            border-radius: 12px 12px 0 0;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .agent-list {
            padding: 15px;
        }
        .agent-item {
            padding: 5px 0;
            border-bottom: 1px solid #eee;
        }
        .agent-item:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body class="container py-5">

    <h1 class="mb-4">👥 Liste des Agents groupés par <span class="text-primary"><?= ucfirst($critere) ?></span></h1>

    <!-- Menu de tri -->
    <div class="mb-4">
        <form method="get">
            <label class="form-label">Choisir un critère :</label>
            <select name="tri" class="form-select w-25 d-inline-block" onchange="this.form.submit()">
                <option value="corps" <?= $critere=='corps'?'selected':'' ?>>Corps</option>
                <option value="grade" <?= $critere=='grade'?'selected':'' ?>>Grade</option>
                <option value="direction" <?= $critere=='direction'?'selected':'' ?>>Direction</option>
                <option value="situation_matrimoniale" <?= $critere=='situation_matrimoniale'?'selected':'' ?>>Situation Matrimoniale</option>
                <option value="localisation" <?= $critere=='localisation'?'selected':'' ?>>Localisation</option>
            </select>
        </form>
    </div>

    <div class="row">
        <?php foreach ($grouped as $categorie => $list): ?>
            <div class="col-md-4">
                <div class="category-card">
                    <div class="category-title">
                        <span><?= esc($categorie) ?: 'Non défini' ?></span>
                        <span class="badge bg-light text-dark"><?= count($list) ?> agents</span>
                    </div>
                    <div class="agent-list">
                        <?php foreach ($list as $agent): ?>
                            <div class="agent-item">
                                <?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php if (empty($grouped)): ?>
        <div class="alert alert-warning mt-4">Aucun agent trouvé pour ce critère.</div>
    <?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
