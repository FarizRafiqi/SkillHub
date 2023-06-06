<?php

class Pemesanan extends Controller
{
    public function index()
    {
        $this->checkUserAccess();

        $data["judul"] = "Daftar Pemesanan";
        $data["pemesanan"] = $this->model("PemesananModel")->all();

        $this->view("admin_panel.pemesanan.index", $data, "templates.layout_admin");
    }

    public function create()
    {
        $this->checkUserAccess();

        $data["judul"] = "Tambah Pemesanan";
        $data["pengguna"] = $this->model("PenggunaModel")->all();
        $data["kursus"] = $this->model("KursusModel")->all();

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.pemesanan.create", $data, "templates.layout_admin");
    }

    public function store()
    {
        $this->checkUserAccess();

        $errors = $this->request("PemesananRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data pemesanan gagal ditambahkan.", "danger");

            $this->withErrors($errors);
            redirect("pemesanan/create");
        }

        if ($this->model("PemesananModel")->create($_POST) > 0) {
            Flasher::setFlash("Data pemesanan berhasil ditambahkan", "success");
            redirect("pemesanan/index");
        }
    }

    public function edit($id)
    {
        $this->checkUserAccess();

        $data["judul"] = "Ubah Pemesanan";
        $data["pengguna"] = $this->model("PenggunaModel")->all();
        $data["kursus"] = $this->model("KursusModel")->all();

        $data["pemesanan"] = $this->model("PemesananModel")->find($id);

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.pemesanan.edit", $data, "templates.layout_admin");
    }

    public function update()
    {
        $this->checkUserAccess();

        $errors = $this->request("PemesananRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data pemesanan gagal diubah.", "danger");

            $this->withErrors($errors);
            back();
        }

        if ($this->model("PemesananModel")->update($_POST) >= 0) {
            Flasher::setFlash("Data pemesanan berhasil diubah", "success");
            redirect("pemesanan/index");
        }
    }

    public function destroy($id)
    {
        $this->checkUserAccess();

        if ($this->model("PemesananModel")->destroy($id) > 0) {
            Flasher::setFlash("Data pemesanan berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Data pemesanan gagal dihapus", "danger");
        }

        redirect("pemesanan/index");
    }

    public function search()
    {
        $this->checkUserAccess();

        $data["judul"] = "Daftar Pemesanan";
        $data["pemesanan"] = $this->model("PemesananModel")->search($_POST['keyword']);
        $this->view("admin_panel.pemesanan.index", $data, "templates.layout_admin");
    }
}