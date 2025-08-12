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
  <title>Connexion</title>
  <link rel="stylesheet" href="style/login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
  <section class="formContainer">
    <div class="logo-circle">
      <img src="images/logo.png" alt="Logo">
    </div>

    <form id="loginForm" method="post">
      <h2 class="title">Connexion</h2>

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

      <button type="submit" class="submit-btn">Se connecter</button>

      <div id="loginError" class="alert alert-danger mt-2 d-none"></div>
    </form>

    <!-- Modal Bootstrap -->
    <div class="modal fade" id="choiceModal" tabindex="-1" aria-labelledby="choiceModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Choisissez où aller</h5>
          </div>
          <div class="modal-body text-center">
            <p>Souhaitez-vous aller vers :</p>
            <div class="d-flex justify-content-around">
              <button class="btn btn-outline-secondary" id="goProfil">Profil</button>
              <button class="btn btn-outline-success" id="goDashboard">Dashboard</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <a href="<?= site_url('inscrit') ?>">S'inscrire</a>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger alert-dismissible fade show" id="autoDismissAlert" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <script>
        setTimeout(function() {
          const alert = document.getElementById('autoDismissAlert');
          if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(() => alert.remove(), 500);
          }
        }, 2000); 
      </script>
    <?php endif; ?>


  </section>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.getElementById('loginForm').addEventListener('submit', function (e) {
      e.preventDefault();

      const form = e.target;
      const formData = new FormData(form);
      const loginError = document.getElementById('loginError');
      loginError.classList.add('d-none');

      fetch('<?= base_url('/login') ?>', {
        method: 'POST',
        body: formData
      })
        .then(response => response.json())
        .then(data => {
          if (!data.success) {
            loginError.textContent = data.message;
            loginError.classList.remove('d-none');
          } else {
            const niveau = data.niveau;

            if (niveau == 3) {
              window.location.href = "<?= base_url('/profil') ?>";
            } else if (niveau == 1 || niveau == 2) {
              let modal = new bootstrap.Modal(document.getElementById('choiceModal'));
              modal.show();

              document.getElementById('goProfil').onclick = () => {
                fetch('<?= base_url('/auth/check-info') ?>')
                  .then(response => response.json())
                  .then(data => {
                    if (data.complete) {
                      window.location.href = "<?= base_url('/profil') ?>";
                    } else {
                      window.location.href = "<?= base_url('/completer-info') ?>";
                    }
                  })
                  .catch(() => {
                    // Raha misy erreur any amin'ny serveur dia alefa any amin'ny completer-info
                    window.location.href = "<?= base_url('/completer-info') ?>";
                  });
              };

              document.getElementById('goDashboard').onclick = () => {
                window.location.href = "<?= base_url('/dashboard') ?>";
              };
            }
          }
        })
        .catch(err => {
          loginError.textContent = 'Erreur lors de la connexion.';
          loginError.classList.remove('d-none');
        });
    });
  </script>
</body>
</html>
