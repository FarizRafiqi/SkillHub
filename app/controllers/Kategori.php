<?php

class Kategori extends Controller
{
    public function index()
    {
        $this->checkUserAccess();

        $data["judul"] = "Daftar Kategori";
        $data["kategori"] = $this->model("KategoriModel")->all();

        $this->view("admin_panel.kategori.index", $data, "templates.layout_admin");
    }

    public function create()
    {
        $this->checkUserAccess();

        $data["judul"] = "Tambah Kategori";

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.kategori.create", $data, "templates.layout_admin");
    }

    public function store()
    {
        $this->checkUserAccess();

        $errors = $this->request("KategoriRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data kategori gagal ditambahkan.", "danger");

            $this->withErrors($errors);
            redirect("kategori/create");
        }

        if ($this->model("KategoriModel")->create($_POST) > 0) {
            Flasher::setFlash("Data kategori berhasil ditambahkan", "success");
            redirect("kategori/index");
        }
    }

    public function edit($id)
    {
        $this->checkUserAccess();

        $data["judul"] = "Ubah Kategori";

        $data["kategori"] = $this->model("KategoriModel")->find($id);

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.kategori.edit", $data, "templates.layout_admin");
    }

    public function update()
    {
        $this->checkUserAccess();

        $errors = $this->request("KategoriRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data kategori gagal diubah.", "danger");

            $this->withErrors($errors);
            back();
        }

        if ($this->model("KategoriModel")->update($_POST) >= 0) {
            Flasher::setFlash("Data kategori berhasil diubah", "success");
            redirect("kategori/index");
        }
    }

    public function destroy($id)
    {
        $this->checkUserAccess();

        if ($this->model("KategoriModel")->destroy($id) > 0) {
            Flasher::setFlash("Data kategori berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Data kategori gagal dihapus", "danger");
        }

        redirect("kategori/index");
    }

    public function search()
    {
        $this->checkUserAccess();

        $data["judul"] = "Daftar Kategori";
        $data["peran"] = $this->model("KategoriModel")->search($_POST['keyword']);
        $this->view("admin_panel.kategori.index", $data, "templates.layout_admin");
    }
}
