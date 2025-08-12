<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <section class="formContainer">
        <div class="logo-circle">
            <img src="images/logo.png" alt="Logo" >
        </div>
        <form id="loginForm" action="<?= base_url('/inscrit'); ?>" method="post"> 
            <h2 class="title">Inscription</h2>

             <!-- Matricule -->
            <div class="input-container input-group">
                <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
                <input type="number" id="matricule" name="matricule" class="form-control" placeholder="Matricule" required>
            </div>

            <!-- Mot de passe -->
            <div class="input-container input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de Passe" required>
            </div>

            <button type="submit" class="submit-btn">S'inscrire</button>
            <p id="errorMessage" class="error-message"></p>
        </form>

        <a href="<?= site_url('login') ?>">Login</a>
        
        <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

    </section>
    
</body>
</html>