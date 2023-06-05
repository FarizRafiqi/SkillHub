<h2>Tambah Pembayaran</h2>
<div class="container container-sm form-crud">
    <div class="card">
        <div class="card-body">
            <form action="<?= BASEURL; ?>/pembayaran/store" method="POST">
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
                    <label for="selectPemesanan" class="form-label">Pemesanan</label>
                    <select class="form-control" id="selectPemesanan" name="id_pemesanan">
                        <option value="" selected disabled>Pilih Pemesanan</option>
                        <?php foreach ($pemesanan as $row) : ?>
                            <option value="<?= $row['id']; ?>"><?= $row['id']; ?> - <?= $row['nama_pengguna']; ?> - <?= $row['nama_kursus']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors["id_pemesanan"])) : ?>
                        <div class="text-red-500 my-2 text-sm error-message">
                            <?= $errors["id_pemesanan"]; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                    <input type="date" class="form-control" name="tanggal_bayar" id="tanggal_bayar" placeholder="Masukkan tanggal bayar">
                    <?php if (isset($errors["tanggal_bayar"])) : ?>
                        <div class="text-red-500 my-2 text-sm error-message">
                            <?= $errors["tanggal_bayar"]; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="nominal_bayar" class="form-label">Nominal Bayar</label>
                    <input type="number" min="0" class="form-control" name="nominal_bayar" id="nominal_bayar" placeholder="Masukkan Nominal Bayar">
                    <?php if (isset($errors["nominal_bayar"])) : ?>
                        <div class="text-red-500 my-2 text-sm error-message">
                            <?= $errors["nominal_bayar"]; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="text-right">
                    <a class="btn btn-outline btn-outline-secondary text-sm" href="<?= BASEURL; ?>/pembayaran/index">Batal</a>
                    <button class="btn btn-primary text-sm">Kirim</button>
                </div>

            </form>
        </div>
    </div>
</div>
