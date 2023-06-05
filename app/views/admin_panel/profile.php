<div class="row items-center">
  <div class="col-12">
    <h2 class ="text-left">Profil</h2>
  </div>
</div>
<div class="row">
    <div class="profile col-12">
        <div class="profile-image">
            <img id="profile-image" src="<?= BASEURL; ?>/img/avatar-default.png" alt="">
            <div class="edit-profile" id="edit-profile">
                <i class = "fas fa-edit"></i>
            </div>
        </div>
        <h3><?= $pengguna['nama']; ?></h3>
        <p><?= $pengguna['email']; ?></p>
        <p><b><?= $pengguna['nama_peran']; ?></b></p>
    </div>
</div>