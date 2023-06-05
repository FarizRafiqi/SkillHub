<h2>Tambah Pemesanan</h2>

<div class="container container-sm form-crud">
  <div class="card">
    <div class="card-body">
      <form action="<?= BASEURL; ?>/pemesanan/store" method="POST">
        <div class="mb-3">
          <label for="selectPengguna" class="form-label">Pengguna</label>
          <select class="form-control" id="selectPengguna" name="id_pengguna">
            <option value="" selected disabled>Pilih Pengguna</option>
            <?php foreach($pengguna as $row): ?>
              <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
            <?php endforeach;?>
          </select>
          <?php if (isset($errors["id_pengguna"])) :?>
            <div class="text-red-500 my-2 text-sm error-message">
                <?= $errors["id_pengguna"]; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="selectKursus" class="form-label">Kursus</label>
          <select class="form-control" id="selectkursus" name="id_kursus">
            <option value="" selected disabled>Pilih Kursus</option>
            <?php foreach($kursus as $row): ?>
              <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
            <?php endforeach;?>
          </select>
          <?php if (isset($errors["id_kursus"])) :?>
            <div class="text-red-500 my-2 text-sm error-message">
                <?= $errors["id_kursus"]; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="total_harga" class="form-label">Total Harga</label>
          <input type="number" min="0" class="form-control" name="total_harga" id="total_harga" placeholder="Masukkan total harga">
          <?php if (isset($errors["total_harga"])) :?>
              <div class="text-red-500 my-2 text-sm error-message">
                  <?= $errors["total_harga"]; ?>
              </div>
          <?php endif; ?>
        </div>
        <div class="mb-3">
          <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
          <input type="date" class="form-control" name="tanggal_pesan" id="tanggal_pesan" placeholder="Masukkan tanggal pesan">
          <?php if (isset($errors["tanggal_pesan"])) :?>
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
