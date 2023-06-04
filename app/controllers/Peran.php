<?php

class Peran extends Controller
{
    public function index()
    {
        $this->checkUserAccess();

        $data["judul"] = "Daftar Peran";
        $data["peran"] = $this->model("PeranModel")->all();

        $this->view("admin_panel.peran.index", $data, "templates.layout_admin");
    }

    public function create()
    {
        $this->checkUserAccess();

        $data["judul"] = "Tambah Peran";

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.peran.create", $data, "templates.layout_admin");
    }

    public function store()
    {
        $this->checkUserAccess();

        $errors = $this->request("PeranRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data peran gagal ditambahkan.", "danger");

            $this->withErrors($errors);
            redirect("peran/create");
        }

        if ($this->model("PeranModel")->create($_POST) > 0) {
            Flasher::setFlash("Data peran berhasil ditambahkan", "success");
            redirect("peran/index");
        }
    }

    public function edit($id)
    {
        $this->checkUserAccess();

        $data["judul"] = "Ubah Peran";

        $data["peran"] = $this->model("PeranModel")->find($id);

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.peran.edit", $data, "templates.layout_admin");
    }

    public function update()
    {
        $this->checkUserAccess();

        $errors = $this->request("PeranRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data peran gagal diubah.", "danger");

            $this->withErrors($errors);
            back();
        }

        if ($this->model("PeranModel")->update($_POST) >= 0) {
            Flasher::setFlash("Data peran berhasil diubah", "success");
            redirect("peran/index");
        }
    }

    public function destroy($id)
    {
        $this->checkUserAccess();

        if ($this->model("PeranModel")->destroy($id) > 0) {
            Flasher::setFlash("Data peran berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Data peran gagal dihapus", "danger");
        }

        redirect("peran/index");
    }

    public function search()
    {
        $this->checkUserAccess();

        $data["judul"] = "Daftar Peran";
        $data["peran"] = $this->model("PeranModel")->search($_POST['keyword']);
        $this->view("admin_panel.peran.index", $data, "templates.layout_admin");
    }
}
