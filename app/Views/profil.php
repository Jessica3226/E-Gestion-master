<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="<?= base_url('style/profil.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>
    <div class="container ">
        <form action="<?= site_url('ajoutphoto/store') ?>" method="post" enctype="multipart/form-data" id="photoForm">
            <div class="d-flex flex-column align-items-center">
                <div class="profile-img-wrapper">
                    <img id="profile-img" src="<?= base_url('uploads/' . ($agent['photo'] ?? 'agent.png')) ?>" alt="Photo de profil">
                    
                    <label for="profile-pic" class="profile-pic">
                        <i class="bi bi-camera-fill"></i>
                        <input type="file" id="profile-pic" name="photo" accept="image/*">
                    </label>
                </div>


                    <input type="hidden" name="agent_id" value="<?= esc($agent['id']) ?>">

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                    <?php elseif (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                    <?php endif; ?>
            </div>
        </form>
    </div>
    <div class="text-center">
        <h1>WELCOME, <?= esc($agent['nom']) . ' ' . esc($agent['prenom']) ?></h1>
    </div>
</body>
</html>