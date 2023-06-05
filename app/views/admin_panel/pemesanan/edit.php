<h2>Ubah Pengguna</h2>

<div class="container container-sm form-crud">
  <div class="card">
    <div class="card-body">
      <form action="<?= BASEURL; ?>/pemesanan/update" method="POST">
        <div class="mb-3">
          <input type="text" name="id" value="<?= $pemesanan['id']; ?>">
          <label for="id" class="form-label">ID</label>
          <input type="text"
                 class="form-control"
                 name="id"
                 id="id"
                 placeholder="Masukkan id"
                 value="<?= $pemesanan['id']; ?>"
          >

            <?php if (isset($errors["id"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["id"]; ?>
              </div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
          <input type="text" name="id_pengguna" value="<?= $pemesanan['id_pengguna']; ?>">
          <label for="id_pengguna" class="form-label">ID Pengguna</label>
          <input type="text"
                 class="form-control"
                 name="id_pengguna"
                 id_pengguna="id_pengguna"
                 placeholder="Masukkan id_pengguna"
                 value="<?= $pemesanan['id_pengguna']; ?>"
          >

            <?php if (isset($errors["id_pengguna"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["id_pengguna"]; ?>
              </div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
          <input type="text" name="id_kursus" value="<?= $pemesanan['id_kursus']; ?>">
          <label for="id_kursus" class="form-label">ID Kursus</label>
          <input type="text"
                 class="form-control"
                 name="id_kursus"
                 id_kursus="id_kursus"
                 placeholder="Masukkan id_kursus"
                 value="<?= $pemesanan['id_kursus']; ?>"
          >

            <?php if (isset($errors["id_kursus"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["id_kursus"]; ?>
              </div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
          <input type="text" name="total_harga" value="<?= $pemesanan['total_harga']; ?>">
          <label for="total_harga" class="form-label">Total Harga</label>
          <input type="text"
                 class="form-control"
                 name="total_harga"
                 total_harga="total_harga"
                 placeholder="Masukkan total_harga"
                 value="<?= $pemesanan['total_harga']; ?>"
          >

            <?php if (isset($errors["total_harga"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["total_harga"]; ?>
              </div>
            <?php endif; ?>
        </div>

        <div class="mb-3">
          <input type="text" name="tanggal_pesan" value="<?= $pemesanan['tanggal_pesan']; ?>">
          <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
          <input type="text"
                 class="form-control"
                 name="tanggal_pesan"
                 tanggal_pesan="tanggal_pesan"
                 placeholder="Masukkan tanggal_pesan"
                 value="<?= $pemesanan['tanggal_pesan']; ?>"
          >

            <?php if (isset($errors["tanggal_pesan"])) : ?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["tanggal_pesan"]; ?>
              </div>
            <?php endif; ?>
        </div>

        <div class="text-right">
          <a class="btn btn-outline btn-outline-secondary text-sm" href="<?= BASEURL; ?>/pemesanan/index">Batal</a>
          <button class="btn btn-primary text-sm">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>
