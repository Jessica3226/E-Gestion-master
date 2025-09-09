<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

<section class="hero text-white">
    <div class="container">
        <h2>Bienvenue dans votre espace Ressources Humaines</h2>
    </div>
</section>

<main class="py-5">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="card card-custom p-4 h-100">
                    <div class="mb-3"><i class="bi bi-clipboard-data" style="font-size:40px;"></i></div>
                    <h5>Recensement</h5>
                    <p>Enregistrez et gérez vos informations.</p>
                    <a href="<?= site_url('login') ?>" class="btn">Accéder</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom p-4 h-100">
                    <div class="mb-3"><i class="bi bi-graph-up" style="font-size:40px;"></i></div>
                    <h5>Avancement</h5>
                    <p>Suivez l’évolution de vos carrière.</p>
                    <a href="<?= site_url('#') ?>" class="btn">Voir plus</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom p-4 h-100">
                    <div class="mb-3"><i class="bi bi-calendar-check" style="font-size:40px;"></i></div>
                    <h5>Congé / Permission</h5>
                    <p>Demandez et suivez vos absences.</p>
                    <a href="<?= site_url('#') ?>" class="btn">Demander</a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom p-4 h-100">
                    <div class="mb-3"><i class="bi bi-info-circle" style="font-size:40px;"></i></div>
                    <h5>Informations</h5>
                    <p>Accédez aux infos importantes.</p>
                    <a href="<?= site_url('#') ?>" class="btn">Consulter</a>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- FOOTER -->
<footer class="footer">
    <p>&copy; <?= date('Y') ?> Ressources Humaines - Tous droits réservés</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
