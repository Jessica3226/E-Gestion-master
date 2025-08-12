<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?=base_url('style/dashboard.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

    <div class="header">
        <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left">
        <h1>RECENSEMENT</h1>
        <img src="images/logo-right.png" alt="Logo Droite" class="logo-right">
    </div>

    <button class="logout-btn" onclick="logoutUser()"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>

    <div class="menu">
        <a href="/ajoutAgent"><i class="fas fa-user-plus"></i> <span>Agent</span></a>
        <a href="/familleAgent"><i class="fas fa-people-roof"></i> <span>Familles</span></a>
        <a href="/listesAgent"><i class="fas fa-list"></i> <span>Liste des Agents</span></a>
        <a href="/archivesAgent"><i class="fas fa-box-archive"></i> <span>Archives</span></a>
    </div>
    <script>
        function logoutUser() {
            window.location.href = "/logout";
        }
    </script>

</body>
</html>
