<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Recensement</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      background: #f4f6f9;
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

    .dashboard-box {
      padding: 40px 30px;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
    }

    .card-dashboard {
      background: #fff;
      border-radius: 15px;
      padding: 25px 20px;
      text-align: center;
      box-shadow: 0 6px 12px rgba(0,0,0,0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      position: relative;
    }

    .card-dashboard:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 24px rgba(0,0,0,0.2);
    }

    .circle {
      width: 80px;
      height: 80px;
      background: #10700d;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 15px;
      color: white;
      font-size: 1.8rem;
    }

    .card-dashboard h5 {
      font-size: 1.1rem;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .card-dashboard p {
      font-size: 0.9rem;
      color: #555;
      margin-bottom: 15px;
    }

    .cta-btn {
      display: inline-block;
      background-color: #3498db;
      color: white;
      padding: 8px 16px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      transition: background-color 0.2s ease;
    }

    .cta-btn:hover {
      background-color: #2980b9;
    }

    @media (max-width: 768px) {
      .dashboard-box {
        padding: 20px;
      }

      .circle {
        width: 70px;
        height: 70px;
        font-size: 1.5rem;
      }

      .cta-btn {
        padding: 6px 12px;
        font-size: 0.9rem;
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

  <div class="dashboard-box">
    <div class="row mb-4">
    <!-- Contrats signés -->
    <div class="col-md-6 col-lg-3">
      <div class="card-dashboard">
        <div class="circle"><i class="fas fa-file-contract"></i></div>
        <h5>Contrats signés</h5>
        <p><strong>128</strong> contrats enregistrés</p>
      </div>
    </div>

    <!-- Agents connectés -->
    <div class="col-md-6 col-lg-3">
      <div class="card-dashboard">
        <div class="circle"><i class="fas fa-user-check"></i></div>
        <h5>Agents connectés</h5>
        <p><strong>34</strong> agents en ligne</p>
      </div>
    </div>
  </div>

    <div class="dashboard-grid">
      <!-- Agent -->
      <div class="card-dashboard">
        <div class="circle"><i class="fas fa-user-plus"></i></div>
        <h5>Agent</h5>
        <p>Ajouter un nouvel agent dans le système.</p>
        <a href="/ajoutAgent" class="cta-btn">Accéder</a>
      </div>

      <!-- Familles -->
      <div class="card-dashboard">
        <div class="circle"><i class="fas fa-people-roof"></i></div>
        <h5>Familles</h5>
        <p>Gérer les informations des familles des agents.</p>
        <a href="/familleAgent" class="cta-btn">Accéder</a>
      </div>

      <!-- Liste -->
      <div class="card-dashboard">
        <div class="circle"><i class="fas fa-list"></i></div>
        <h5>Liste</h5>
        <p>Consulter la liste complète des agents.</p>
        <a href="/listesAgent" class="cta-btn">Accéder</a>
      </div>

      <!-- Archives -->
      <div class="card-dashboard">
        <div class="circle"><i class="fas fa-box-archive"></i></div>
        <h5>Archives</h5>
        <p>Accéder aux archives des données enregistrées.</p>
        <a href="/archivesAgent" class="cta-btn">Accéder</a>
      </div>

      <!-- Contrat -->
      <div class="card-dashboard">
        <div class="circle"><i class="fas fa-file-signature"></i></div>
        <h5>Contrat</h5>
        <p>Ajouter des contrats des agents dans le système.</p>
        <a href="/contrats" class="cta-btn">Accéder</a>
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
