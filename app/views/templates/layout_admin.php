<?php require_once "header_admin.php" ?>

  <div class="admin-panel flex">
    <div class="sidebar">
      <div class="sidebar-header">
        <h1 class="text-white text-2xl font-bold">Admin Panel</h1>
      </div>
      <ul class="menu">
        <li>
          <a href="<?= BASEURL; ?>/dashboard"
             class="<?= (str_contains($current_route, 'dashboard') !== false) ? 'active' : ''; ?>"
          >
            <span class="text-left icon">
              <i class="fa-solid fa-gauge-high"></i>
            </span>
            Dashboard
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/pengguna"
             class="<?= (str_contains($current_route, 'pengguna') !== false) ? 'active' : ''; ?>"
          >
            <span class="text-left icon">
              <i class="fa-solid fa-user"></i>
            </span>
            Pengguna
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/peran"
             class="<?= (str_contains($current_route, 'peran') !== false) ? 'active' : ''; ?>"
          >
            <span class="text-left icon">
              <i class="fa-solid fa-user-tie"></i>
            </span>
            Peran
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/kursus"
             class="<?= (str_contains($current_route, 'kursus') !== false) ? 'active' : ''; ?>"
          >
            <span class="text-left icon">
              <i class="fa-solid fa-laptop"></i>
            </span>
            Kursus
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/pemesanan"
             class="<?= (str_contains($current_route, 'pemesanan') !== false) ? 'active' : ''; ?>"
          >
            <span class="text-left icon">
              <i class="fa-solid fa-clipboard-list"></i>
            </span>
            Pemesanan
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/pembayaran"
             class="<?= (str_contains($current_route, 'pembayaran') !== false) ? 'active' : ''; ?>"
          >
            <span class="text-left icon">
              <i class="fa-solid fa-money-bill"></i>
            </span>
            Pembayaran
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/kategori"
             class="<?= (str_contains($current_route, 'kategori') !== false) ? 'active' : ''; ?>"
          >
            <span class="text-left icon">
              <i class="fa-solid fa-tag"></i>
            </span>
            Kategori
          </a>
        </li>
        <li>
          <a href="<?= BASEURL; ?>/autentikasi/logout" class="btn-logout">
            <span class="text-left icon">
              <i class="fa-solid fa-right-from-bracket"></i>
            </span>
            Logout
          </a>
        </li>
      </ul>
    </div>
    <div class="content">
        <?= $content; ?>
    </div>
  </div>

<?php require_once "footer.php" ?>