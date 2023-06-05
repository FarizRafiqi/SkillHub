$(function () {

    $(".tombolTambahData").on("click", function () {
        $("#judulModal").html("Tambah Data PenggunaModel");
        $(".modal-footer button[type=submit]").html("Tambah Data");
    });

    $(".tampilModalUbah").on("click", function () {

        $("#judulModal").html("Ubah Data PenggunaModel");
        $(".modal-footer button[type=submit]").html("Ubah Data");
        $(".modal-body form").attr("action", "http://localhost/phpmvc/public/mahasiswa/ubah")
        const id = $(this).data("id");

        $.ajax({
            url: "http://localhost/phpmvc/public/mahasiswa/getubah",
            data: { id: id },
            method: "post",
            dataType: "json",
            success: function (data) {
                $("#nama").val(data.nama);
                $("#nrp").val(data.nrp);
                $("#email").val(data.email);
                $("#jurusan").val(data.jurusan);
                $("#id").val(data.id);
            }
        });
    });

    // Untuk menghilangkan alert setelah 3 detik
    setTimeout(function () {
        $(".alert").fadeOut();
    }, 3000);

    $("#search").on("keyup", function () {
        let keyword = $(this).val().toLowerCase();
        const url = $(this).data("url");
        $.ajax({
            url: url,
            method: "POST",
            data: { keyword: keyword },
            success: function (response) {
                let content = $(response).find("tbody");
                $("tbody").empty().append(content.html());
            }
        });
    });

    $(".btn-hapus").on("click", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        let url = $(this).attr("href");

        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            // Redirect ke halaman destroy dengan mengirimkan ID sebagai parameter
            window.location.href = url + "/" + id;
        }
    });

    $(".btn-logout").on("click", function (e) {
        e.preventDefault();

        let url = $(this).attr("href");

        if (confirm("Apakah Anda yakin ingin logout?")) {
            window.location.href = url;
        }
    });

    // Mengambil referensi elemen-elemen yang diperlukan
    const editProfileButton = document.getElementById("edit-profile");
    const profileImage = document.getElementById("profile-image");

    // Menambahkan event listener pada tombol "edit-profile"
    editProfileButton.addEventListener("click", function () {
        // Membuka dialog pemilihan file ketika tombol diklik
        const input = document.createElement("input");
        input.type = "file";
        input.accept = "image/*";
        input.onchange = function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function (readerEvent) {
                // Mengubah gambar profil dengan gambar yang diunggah
                profileImage.src = readerEvent.target.result;
            };
            reader.readAsDataURL(file);
        };
        input.click();
    });

});