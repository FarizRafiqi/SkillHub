<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman <?= $judul; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body>
<nav class="navbar admin">
  <div class="navbar-menu">
    <a href="<?= BASEURL; ?>/dashboard" class="navbar-brand">
      <img src="<?= BASEURL; ?>/img/Logo_SkillHub.png" alt="" width="113px" height="23px"
    </a>
  </div>
  <div class="navbar-menu">
    <span class="text-sm font-normal"><?= $_SESSION['user']['nama'];?></span>
    <a href="<?= BASEURL; ?>/profil/index" class="navbar-menu-item">
      <div class="avatar">
        <img src="<?= BASEURL; ?>/img/avatar-default.png" alt="Avatar" class="avatar-image">
      </div>
    </a>
  </div>
</nav>