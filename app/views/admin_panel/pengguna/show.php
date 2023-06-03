<h2>Detail Pengguna</h2>

<div class="container container-sm form-crud">
  <div class="card">
    <div class="card-body">
      <div class="mb-3">
        <input type="hidden" name="id" value="<?= $pengguna['id']; ?>">
        <label for="nama" class="form-label font-bold">Nama</label>
        <div><?= $pengguna['nama']; ?></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label font-bold">Email</label>
        <div><?= $pengguna['email']; ?></div>
      </div>
      <div class="mb-3">
        <label for="selectPeran" class="form-label font-bold">Peran</label>
        <div><?= $pengguna['nama_peran']; ?></div>
      </div>

      <div class="text-right">
        <a class="btn btn-outline btn-primary text-sm" href="<?= BASEURL; ?>/pengguna/index">Kembali</a>
      </div>
    </div>
  </div>
</div>
