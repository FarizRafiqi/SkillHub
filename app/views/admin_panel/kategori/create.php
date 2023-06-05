<h2>Tambah Kategori</h2>

<div class="container container-sm form-crud">
  <div class="card">
    <div class="card-body">
      <form action="<?= BASEURL; ?>/kategori/store" method="POST">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama">
          <?php if (isset($errors["nama"])) : ?>
            <div class="text-red-500 my-2 text-sm error-message">
              <?= $errors["nama"]; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="text-right">
          <a class="btn btn-outline btn-outline-secondary text-sm" href="<?= BASEURL; ?>/kategori/index">Batal</a>
          <button class="btn btn-primary text-sm">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>