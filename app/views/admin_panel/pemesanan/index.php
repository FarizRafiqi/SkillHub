<div class="row items-center">
  <div class="col-6">
    <h2>Data Pemesanan</h2>
  </div>
  <div class="col-6 text-right">
    <a href="<?= BASEURL;?>/pemesanan/create" class="btn btn-primary text-sm">
      <i class="fas fa-plus"></i>
      pemesanan
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
            <input type="text" class="form-control col-8 col-md-9" id="search" placeholder="Masukkan kata pencarian..." data-url="<?= BASEURL;?>/pemesanan/search">
          </div>
        </div>
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr class="text-center">
              <th>ID</th>
              <th>Nama Pemesan</th>
              <th>Nama Kursus</th>
              <th>Total Harga</th>
              <th>Tanggal Pesan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($pemesanan as $row): ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama_pengguna']; ?></td>
                <td><?= $row['nama_kursus']; ?></td>
                <td><?= $row['total_harga']; ?></td>
                <td><?= $row['tanggal_pesan']; ?></td>
                <td>
                  <a href="<?= BASEURL;?>/pemesanan/edit/<?= $row['id']; ?>" class="btn btn-success text-sm">Ubah</a>
                  <a href="<?= BASEURL;?>/pemesanan/destroy/<?= $row['id']; ?>" class="btn btn-danger text-sm btn-hapus" data-id="<?= $row['id']; ?>">Hapus</a>
                </td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>