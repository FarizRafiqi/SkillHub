<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman <?= $data['judul']; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<nav class="navbar">
  <div class="container">
    <div class="navbar-menu">
      <a href="#" class="navbar-brand">
        <img src="<?= BASEURL; ?>/img/Logo_SkillHub.png" alt="" width="113px" height="23px"
      </a>
      <a href="#" class="navbar-menu-item">
        <span class="navbar-menu-link  text-sm active">Home</span>
      </a>
      <a href="#" class="navbar-menu-item">
        <span class="navbar-menu-link text-sm">E-learning</span>
      </a>
    </div>
    <div class="navbar-menu">
      <a href="#" class="navbar-menu-item">
        <span class="navbar-menu-link button primary-button">Login</span>
      </a>
      <a href="#" class="navbar-menu-item">
        <span class="navbar-menu-link button outline-button">Register</span>
      </a>
    </div>
  </div>
</nav>
<body>