<div class="row items-center">
  <div class="col-6">
    <h2>Data Kategori</h2>
  </div>
  <div class="col-6 text-right">
    <a href="<?= BASEURL; ?>/kategori/create" class="btn btn-primary text-sm">
      <i class="fas fa-plus"></i>
      Kategori
    </a>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <?php Flasher::flash(); ?>
  </div>
  <div class="col-12">
    <div class="card mt-5">
      <div class="card-body">
        <div class="flex justify-end mb-4 mr-4">
          <div class="row items-center">
            <label for="search" class="form-label col-4 col-md-3 m-0">Cari</label>
            <input type="text" class="form-control col-8 col-md-9" id="search" placeholder="Masukkan kata pencarian..." data-url="<?= BASEURL; ?>/kategori/search">
          </div>
        </div>
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>Nama</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kategori as $row) : ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td class="text-center">
                  <a href="<?= BASEURL; ?>/kategori/edit/<?= $row['id']; ?>" class="btn btn-success text-sm">Ubah</a>
                  <a href="<?= BASEURL; ?>/kategori/destroy/<?= $row['id']; ?>" class="btn btn-danger btn-hapus text-sm" data-id="<?= $row['id']; ?>">Hapus</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>