<?php

class Pengguna extends Controller
{
    public function index()
    {
        $data["judul"] = "Daftar Pengguna";
        $data["pengguna"] = $this->model("PenggunaModel")->all();

        $data["current_route"] = $this->currentRoute();
        $this->view("admin_panel.pengguna.index", $data, "templates.layout_admin");
    }

    public function create()
    {
        $data["judul"] = "Tambah Pengguna";
        $data["peran"] = $this->model("PeranModel")->all();
        $data["current_route"] = $this->currentRoute();

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.pengguna.create", $data, "templates.layout_admin");
    }

    public function store()
    {
        $errors = $this->request("PenggunaRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data pengguna gagal ditambahkan.", "danger");

            $this->withErrors($errors);
            redirect("pengguna/create");
        }

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

        if ($this->model("PenggunaModel")->create($_POST) > 0) {
            Flasher::setFlash("Data pengguna berhasil ditambahkan", "success");
            redirect("pengguna/index");
        }
    }

    public function show($id)
    {
        $data["judul"] = "Detail Pengguna";
        $data["pengguna"] = $this->model("PenggunaModel")->find($id);
        $this->view("admin_panel.pengguna.show", $data, "templates.layout_admin");
    }

    public function edit($id)
    {
        $data["judul"] = "Ubah Pengguna";
        $data["peran"] = $this->model("PeranModel")->all();

        $data["pengguna"] = $this->model("PenggunaModel")->find($id);
        $data["current_route"] = $this->currentRoute();

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.pengguna.edit", $data, "templates.layout_admin");
    }

    public function update()
    {
        $errors = null;

        if (empty($_POST['password'])) {
            unset($_POST['password']);
        } else {
            $errors = $this->request("PenggunaRequest")->validate($_POST);
        }

        if (!empty($errors)) {
            Flasher::setFlash("Data pengguna gagal diubah.", "danger");

            $this->withErrors($errors);
            back();
        }

        if (isset($_POST["password"]) && !empty($_POST['password'])) {
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }

        if ($this->model("PenggunaModel")->update($_POST) >= 0) {
            Flasher::setFlash("Data pengguna berhasil diubah", "success");
            redirect("pengguna/index");
        }
    }

    public function destroy($id)
    {
        if ($this->model("PenggunaModel")->destroy($id) > 0) {
            Flasher::setFlash("Data pengguna berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Data pengguna gagal dihapus", "danger");
        }

        redirect("pengguna/index");
    }

    public function search()
    {
        $data["judul"] = "Daftar Pengguna";
        $data["pengguna"] = $this->model("PenggunaModel")->search($_POST['keyword']);
        $data["current_route"] = $this->currentRoute();
        $this->view("admin_panel.pengguna.index", $data, "templates.layout_admin");
    }
}