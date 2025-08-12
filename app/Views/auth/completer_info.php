<!-- app/Views/auth/completer_info.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Compléter les informations</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      background: #f0f2f5;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-container {
      margin-top: 60px;
      padding: 30px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    .form-title {
      font-weight: bold;
      margin-bottom: 25px;
      color: #343a40;
    }
    .input-group-text {
      background-color: #e9ecef;
      border-right: 0;
    }
    .form-control {
      border-left: 0;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
  <div class="col-md-6 form-container">

    <h2 class="form-title text-center">Compléter vos informations</h2>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="alert alert-danger" role="alert">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('/auth/save-info') ?>">

      <!-- Email input -->
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
        <input type="email" name="email" class="form-control" placeholder="Votre adresse email" required>
      </div>

      <!-- Adresse input -->
      <div class="input-group mb-4">
        <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
        <input type="text" name="adresse" class="form-control" placeholder="Votre adresse postale" required>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Valider</button>
      </div>
    </form>

  </div>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
