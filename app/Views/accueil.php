<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="<?= base_url('style/acc.css') ?>">
</head>
<body>

<header class="header">
    <nav class="NavBar">
        <div class="header-content">
            <img src="<?= base_url('images/logo-left.png') ?>" alt="Logo gauche" class="logo">
            <h1>Ressources Humaines</h1>
            <img src="<?= base_url('images/logo-right.png') ?>" alt="Logo droit" class="logo">
        </div>
    </nav>
</header>

<main class="container">
    <a href="<?= site_url('login') ?>" class="btn">📋 Recensement</a>
    <a href="<?= site_url('#') ?>" class="btn">📈 Avancement</a>
    <a href="<?= site_url('#') ?>" class="btn">🏖️ Congé / Permission</a>
    <a href="<?= site_url('#') ?>" class="btn">ℹ️ Informations</a>
</main>

<footer class="footer">
    <p>&copy; <?= date('Y') ?> Ressources Humaines - Tous droits réservés</p>
</footer>

</body>
</html>
