<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background: #f4f6f9; /* fond gris clair */
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background: #10700d;
      color: white;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .header h1 {
      margin: 0;
      font-size: 1.8rem;
      text-align: center;
    }

    .logo-left, .logo-right {
      height: 50px;
    }

    .logout-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      background: #10700d;
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
      transition: 0.3s;
    }
    .logout-btn:hover {
      background: #0a4e09;
    }

    /* Box principal */
    .dashboard-box {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
      padding: 40px 30px;
      width: 95%;
      max-width: 1100px;
      margin: 60px auto;
      position: relative;
    }

    .dashboard-box::after {
      content: "";
      position: absolute;
      bottom: -30px;
      left: 50%;
      transform: translateX(-50%);
      width: 70%;
      height: 18px;
      background: radial-gradient(rgba(0,0,0,0.4), transparent);
      border-radius: 50%;
      filter: blur(6px);
    }

    /* Grid cards */
    .card-dashboard {
      background: #fff;
      border: none;
      text-align: center;
      padding: 20px 15px;
      border-radius: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      height: 100%;
    }
    .card-dashboard:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.2);
    }

    .circle {
      width: 100px;
      height: 100px;
      background: #10700d;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 15px auto;
      color: white;
      font-size: 2rem;
    }

    .card-dashboard h5 {
      font-size: 1.1rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-dashboard p {
      font-size: 0.9rem;
      color: #555;
      margin: 0;
    }

    a{
        color: white;
    }

    @media (max-width: 768px) {
      .circle {
        width: 80px;
        height: 80px;
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>

  <div class="header">
    <img src="images/logo-left.png" alt="Logo Gauche" class="logo-left">
    <h1>RECENSEMENT</h1>
    <img src="images/logo-right.png" alt="Logo Droite" class="logo-right">
  </div>

  <button class="logout-btn" onclick="logoutUser()"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>

  <!-- Box principal -->
  <div class="dashboard-box">
    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-md-6 col-lg-3">
        <div class="card-dashboard">
          <div class="circle"><a href="/ajoutAgent"><i class="fas fa-user-plus"></i></a></div>
          <h5>Agent</h5>
          <p>Ajouter un nouvel agent dans le système.</p>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6 col-lg-3">
        <div class="card-dashboard">
          <div class="circle"><a href="/familleAgent"><i class="fas fa-people-roof"></i></a></div>
          <h5>Familles</h5>
          <p>Gérer les informations des familles des agents.</p>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-6 col-lg-3">
        <div class="card-dashboard">
          <div class="circle"><a href="/listesAgent"><i class="fas fa-list"></i></a></div>
          <h5>Liste</h5>
          <p>Consulter la liste complète des agents.</p>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-6 col-lg-3">
        <div class="card-dashboard">
          <div class="circle"><a href="/archivesAgent"><i class="fas fa-box-archive"></i></a></div>
          <h5>Archives</h5>
          <p>Accéder aux archives des données enregistrées.</p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function logoutUser() {
      window.location.href = "<?php echo base_url('/logout'); ?>";
    }
  </script>

</body>
</html>
