<h2>Detail Pembayaran</h2>

<div class="container container-sm form-crud">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $pembayaran['id']; ?>">
                        <label for="nama" class="form-label font-bold">Nama</label>
                        <div><?= $pembayaran['nama']; ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label font-bold">Tanggal Pembayaran</label>
                        <div><?= $pembayaran['tanggal_bayar']; ?></div>
                    </div>

                    <div class="mb-3">
                        <label for="nominal" class="form-label font-bold">Nominal</label>
                        <div><?= $pembayaran['nominal_bayar']; ?></div>
                    </div>

                    <div class="text-right">
                        <a class="btn btn-outline btn-primary text-sm" href="<?= BASEURL; ?>/pembayaran/index">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label font-bold">ID</label>
                        <div><?= $pemesanan['id']; ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-bold">Nama Pemesan</label>
                        <div><?= $pemesanan['nama_pengguna']; ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-bold">Nama Kursus</label>
                        <div><?= $pemesanan['nama_kursus']; ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-bold">Total Harga</label>
                        <div><?= $pemesanan['total_harga']; ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-bold">Tanggal pesan</label>
                        <div><?= $pemesanan['tanggal_pesan']; ?></div>
                    </div>

                    <div class="text-right">
                        <a class="btn btn-outline btn-primary text-sm" href="<?= BASEURL; ?>/pembayaran/index">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>