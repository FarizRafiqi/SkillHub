<h2>Detail Kursus</h2>

<div class="container container-sm form-crud">
  <div class="card">
    <div class="card-body">
      <div class="mb-3">
        <label for="nama_kategori" class="form-label font-bold">Kategori</label>
        <div><?= $kursus['nama_kategori']; ?></div>
      </div>
      <div class="mb-3">
        <label for="nama_pengguna" class="form-label font-bold">Nama Pembuat</label>
        <div><?= $kursus['nama_pengguna']; ?></div>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label font-bold">Nama Kursus</label>
        <div><?= $kursus['nama']; ?></div>
      </div>
      <div class="mb-3">
        <label for="total_jam_belajar" class="form-label font-bold">Total Jam Belajar</label>
        <div><?= $kursus['total_jam_belajar']; ?> Jam</div>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label font-bold">Harga</label>
        <div>Rp. <?= $kursus['harga']; ?></div>
      </div>
      <div class="mb-3">
        <label for="rating" class="form-label font-bold">Rating</label>
        <div><?= $kursus['rating']; ?></div>
      </div>
      <div class="mb-3">
        <label for="deskripsi" class="form-label font-bold">Deskripsi</label>
        <div><?= $kursus['deskripsi']; ?></div>
      </div>

      <div class="text-right">
        <a class="btn btn-outline btn-primary text-sm" href="<?= BASEURL; ?>/kursus/index">Kembali</a>
      </div>
    </div>
  </div>
</div>
