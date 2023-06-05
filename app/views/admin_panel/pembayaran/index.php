<div class="row items-center">
  <div class="col-6">
    <h2>Data Pembayaran</h2>
  </div>
  <div class="col-6 text-right">
    <a href="<?= BASEURL;?>/pembayaran/create" class="btn btn-primary text-sm">
      <i class="fas fa-plus"></i>
      pembayaran
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
              <th>ID Pemesanan</th>
              <th>Nama Pemesan</th>
              <th>Tanggal Bayar</th>
              <th>Nominal Bayar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($pembayaran as $row): ?>
              <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['id_pemesanan']; ?></td>
                <td><?= $row['nama_pengguna']; ?></td>
                <td><?= date('d-m-Y', strtotime($row['tanggal_bayar'])); ?></td>
                <td>Rp. <?= formatNumber($row['nominal_bayar']); ?></td>
              </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>