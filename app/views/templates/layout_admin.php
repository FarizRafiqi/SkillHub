<?php require_once "header_admin.php" ?>

  <div class="admin-panel flex">
    <div class="sidebar">
      <div class="sidebar-header">
        <h1 class="text-white text-2xl font-bold">Admin Panel</h1>
      </div>
      <ul class="menu">
        <li><a href="<?= BASEURL; ?>/dashboard"
               class="<?= (str_contains($current_route, 'dashboard') !== false) ? 'active' : ''; ?>">Dashboard</a></li>
        <li><a href="<?= BASEURL; ?>/pengguna"
               class="<?= (str_contains($current_route, 'pengguna') !== false) ? 'active' : ''; ?>">Pengguna</a></li>
        <li><a href="<?= BASEURL; ?>/peran"
               class="<?= (str_contains($current_route, 'peran') !== false) ? 'active' : ''; ?>">Peran</a></li>
        <li><a href="<?= BASEURL; ?>/kursus"
               class="<?= (str_contains($current_route, 'kursus') !== false) ? 'active' : ''; ?>">Kursus</a></li>
        <li><a href="<?= BASEURL; ?>/pemesanan"
               class="<?= (str_contains($current_route, 'pemesanan') !== false) ? 'active' : ''; ?>">Pemesanan</a></li>
        <li><a href="<?= BASEURL; ?>/pembayaran"
               class="<?= (str_contains($current_route, 'pembayaran') !== false) ? 'active' : ''; ?>">Pembayaran</a>
        </li>
        <li><a href="<?= BASEURL; ?>/kategori"
               class="<?= (str_contains($current_route, 'kategori') !== false) ? 'active' : ''; ?>">Kategori</a></li>
        <li><a href="<?= BASEURL; ?>/autentikasi/logout" class="btn-logout"><i class="fas fa-sign-out-alt"></i>
            Logout</a></li>
      </ul>
    </div>
    <div class="content">
        <?= $content; ?>
    </div>
  </div>

<?php require_once "footer.php" ?>