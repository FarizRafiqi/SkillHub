<?php

class Pemesanan extends Controller
{
    public function index()
    {
        $data["judul"] = "Daftar Pemesanan";
        $data["pemesanan"] = $this->model("PemesananModel")->all();

        $data["current_route"] = $this->currentRoute();
        $this->view("admin_panel.pemesanan.index", $data, "templates.layout_admin");
    }

    public function create()
    {
        $data["judul"] = "Tambah Pemesanan";
        $data["current_route"] = $this->currentRoute();

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.pemesanan.create", $data, "templates.layout_admin");
    }

    public function store()
    {
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

    public function show($id)
    {
        $data["judul"] = "Detail Pengguna";
        $data["pengguna"] = $this->model("PenggunaModel")->find($id);
        $this->view("admin_panel.pengguna.show", $data, "templates.layout_admin");
        $data["pemesanan"] = $this->model("PemesananModel")->find($id);
        $this->view("admin_panel.pemesanan.show", $data, "templates.layout_admin");
    }

    public function edit($id)
    {
        $data["judul"] = "Ubah Pengguna";
        $data["peran"] = $this->model("PeranModel")->all();

        $data["pengguna"] = $this->model("PenggunaModel")->find($id);
        $data["pemesanan"] = $this->model("PemesananModel")->find($id);
        $data["current_route"] = $this->currentRoute();

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.pemesanan.edit", $data, "templates.layout_admin");
    }

    public function update()
    {
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
        if ($this->model("PemesananModel")->destroy($id) > 0) {
            Flasher::setFlash("Data pemesanan berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Data pemesanan gagal dihapus", "danger");
        }

        redirect("pemesanan/index");
    }

    public function search()
    {
        $data["judul"] = "Daftar Pemesanan";
        $data["pengguna"] = $this->model("PemesananModel")->search($_POST['keyword']);
        $data["current_route"] = $this->currentRoute();
        $this->view("admin_panel.pemesanan.index", $data, "templates.layout_admin");
    }
}