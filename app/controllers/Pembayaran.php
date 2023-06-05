<?php

class Pembayaran extends Controller
{
    public function index()
    {
        $this->checkUserAccess();

        $data["judul"] = "Daftar Pembayaran";
        $data["pembayaran"] = $this->model("PembayaranModel")->all();

        $this->view("admin_panel.pembayaran.index", $data, "templates.layout_admin");
    }

    public function create()
    {
        $this->checkUserAccess();

        $data["judul"] = "Tambah Pembayaran";
        $data["peran"] = $this->model("PeranModel")->all();

        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("admin_panel.pembayaran.create", $data, "templates.layout_admin");
    }

    public function store()
    {
        $this->checkUserAccess();

        $errors = $this->request("PembayaranRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Data pembayaran gagal ditambahkan.", "danger");

            $this->withErrors($errors);
            redirect("pembayaran/create");
        }

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

        if ($this->model("PembayaranModel")->create($_POST) > 0) {
            Flasher::setFlash("Data pembayaran berhasil ditambahkan", "success");
            redirect("pembayaran/index");
        }
    }

    public function show($id)
    {
        $this->checkUserAccess();

        $data["judul"] = "Detail Pembayaran";
        $data["pembayaran"] = $this->model("PembayaranModel")->find($id);
        $this->view("admin_panel.pembayaran.show", $data, "templates.layout_admin");
    }


    public function search()
    {
        $this->checkUserAccess();

        $data["judul"] = "Daftar Pembayaran";
        $data["pembayaran"] = $this->model("PembayaranModel")->search($_POST['keyword']);
        $this->view("admin_panel.pembayaran.index", $data, "templates.layout_admin");
    }
}
