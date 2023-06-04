<?php

class Kursus extends Controller
{
    public function index()
    {
        $data["judul"] = "Daftar kursus";
        $data["kursus"] = $this->model("KursusModel")->all();

        $data["current_route"] = $this->currentRoute();
        $this->view("admin_panel.kursus.index", $data, "templates.layout_admin");
    }

    public function create()
    {
        $data["judul"] = "Tambah Kursus";
        $data["kategori"] = $this->model("KategoriModel")->all();
        $data["pengguna"] = $this->model("PenggunaModel")->all();
        $data["current_route"] = $this->currentRoute();

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.kursus.create", $data, "templates.layout_admin");
    }

    public function store()
    {
        $errors = $this->request("KursusRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data pengguna gagal ditambahkan.", "danger");

            $this->withErrors($errors);
            redirect("kursus/create");
        }

        if ($this->model("KursusModel")->create($_POST) > 0) {
            Flasher::setFlash("Data pengguna berhasil ditambahkan", "success");
            redirect("kursus/index");
        }
    }

    public function show($id)
    {
        $data["judul"] = "Detail Kursus";
        $data["kursus"] = $this->model("KursusModel")->find($id);
        $this->view("admin_panel.kursus.show", $data, "templates.layout_admin");
    }

    public function edit($id)
    {
        $data["judul"] = "Ubah Kursus";
        $data["kategori"] = $this->model("KategoriModel")->all();
        $data["pengguna"] = $this->model("PenggunaModel")->all();
        $data["kursus"] = $this->model("KursusModel")->find($id);
        $data["current_route"] = $this->currentRoute();

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.kursus.edit", $data, "templates.layout_admin");
    }

    public function update()
    {
        $errors = $this->request("KursusRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data kursus gagal diubah.", "danger");

            $this->withErrors($errors);
            back();
        }

        if ($this->model("KursusModel")->update($_POST) >= 0) {
            Flasher::setFlash("Data kursus berhasil diubah", "success");
            redirect("kursus/index");
        }
    }

    public function destroy($id)
    {
        if ($this->model("KursusModel")->destroy($id) > 0) {
            Flasher::setFlash("Data kursus berhasil dihapus", "success");
        } else {
            Flasher::setFlash("Data kursus gagal dihapus", "danger");
        }

        redirect("kursus/index");
    }

    public function search()
    {
        $data["judul"] = "Daftar Kursus";
        $data["kursus"] = $this->model("KursusModel")->search($_POST['keyword']);
        $data["current_route"] = $this->currentRoute();
        $this->view("admin_panel.kursus.index", $data, "templates.layout_admin");
    }
}
