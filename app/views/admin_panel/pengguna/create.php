<h2>Tambah Pengguna</h2>

<div class="container container-sm form-crud">
  <div class="card">
    <div class="card-body">
      <form action="<?= BASEURL; ?>/pengguna/store" method="POST">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" 
                 class="form-control" 
                 name="nama" 
                 id="nama" 
                 placeholder="Masukkan nama">
            <?php if (isset($errors) && isset($errors["nama"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["nama"]; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" 
                 class="form-control" 
                 name="email" 
                 id="email" 
                 placeholder="user@example.com">
            <?php if (isset($errors) && isset($errors["email"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["email"]; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" 
                 class="form-control" 
                 name="password" 
                 id="password" 
                 placeholder="Masukkan password">
            <?php if (isset($errors) && isset($errors["password"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["password"]; ?>
              </div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="selectPeran" class="form-label">Peran</label>
          <select class="form-control" id="selectPeran" 
                 name="id_peran">
            <option value="" selected disabled>Pilih Peran</option>
              <?php foreach ($peran as $row): ?>
                  <?php if ($row['id'] !== 1) : ?>
                    <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                  <?php endif; ?>
              <?php endforeach; ?>
          </select>
            <?php if (isset($errors) && isset($errors["id_peran"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["id_peran"]; ?>
              </div>
            <?php endif; ?>
        </div>

        <div class="text-right">
          <a class="btn btn-outline btn-outline-secondary text-sm" 
             href="<?= BASEURL; ?>/pengguna/index"
          >
            Batal
          </a>
          <button class="btn btn-primary text-sm">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>
