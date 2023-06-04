<h2>Tambah Kursus</h2>

<div class="container container-sm form-crud">
  <div class="card">
    <div class="card-body">
      <form action="<?= BASEURL; ?>/kursus/store" method="POST">

        <div class="mb-3">
          <label for="selectKategori" class="form-label">Kategori</label>
          <select class="form-control" id="selectKategori" name="id_kategori">
            <option value="" selected disabled>Pilih Kategori</option>
            <?php foreach ($kategori as $row) : ?>
              <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
            <?php endforeach; ?>
          </select>
          <?php if (isset($errors["id_kategori"])) : ?>
            <div class="text-red-500 my-2 text-sm error-message">
              <?= $errors["id_kategori"]; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label for="selectPengguna" class="form-label">Pengguna</label>
          <select class="form-control" id="selectPengguna" name="id_pengguna">
            <option value="" selected disabled>Pilih Pengguna</option>
            <?php foreach ($pengguna as $row) : ?>
              <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
            <?php endforeach; ?>
          </select>
          <?php if (isset($errors["id_pengguna"])) : ?>
            <div class="text-red-500 my-2 text-sm error-message">
              <?= $errors["id_pengguna"]; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Kursus</label>
          <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama">
          <?php if (isset($errors) && isset($errors["nama"])) : ?>
            <div class="text-red-500 my-2 text-sm error-message">
              <?= $errors["nama"]; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label for="total_jam_belajar" class="form-label">Total Jam Belajar</label>
          <input type="number" min="0" class="form-control" name="total_jam_belajar" id="total_jam_belajar" placeholder="Masukkan lama waktu belajar">
          <?php if (isset($errors) && isset($errors["total_jam_belajar"])) : ?>
            <div class="text-red-500 my-2 text-sm error-message">
              <?= $errors["total_jam_belajar"]; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label for="harga" class="form-label">Harga</label>
          <input type="number" min="0" class="form-control" name="harga" id="harga" placeholder="Masukkan harga">
          <?php if (isset($errors) && isset($errors["harga"])) : ?>
            <div class="text-red-500 my-2 text-sm error-message">
              <?= $errors["harga"]; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label for="rating" class="form-label">Rating</label>
          <input type="number" min="0" max="5" class="form-control" name="rating" id="rating" placeholder="Masukkan rating pengguna">
          <?php if (isset($errors) && isset($errors["rating"])) : ?>
            <div class="text-red-500 my-2 text-sm error-message">
              <?= $errors["rating"]; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" cols="10" rows="5" class="form-control" placeholder="Masukkan deskripsi"></textarea>
          <?php if (isset($errors) && isset($errors["deskripsi"])) : ?>
            <div class="text-red-500 my-2 text-sm error-message">
              <?= $errors["deskripsi"]; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="text-right">
          <a class="btn btn-outline btn-outline-secondary text-sm" href="<?= BASEURL; ?>/kursus/index">Batal</a>
          <button class="btn btn-primary text-sm">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>