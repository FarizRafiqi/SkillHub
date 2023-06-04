<?php

class Autentikasi extends Controller
{
    public function index()
    {
        $data["judul"] = "Login";

        $data['current_route'] = $this->currentRoute();
        $data['errors'] = $_SESSION['errors'] ?? null;
        unset($_SESSION['errors']);

        $this->view("auth.login", $data, "templates.layout_customer");
    }

    public function process()
    {
        $errors = $this->request("LoginRequest")->validate($_POST);

        if (!empty($errors)) {
            Flasher::setFlash("Login Gagal.", "danger");

            $this->withErrors($errors);
            back();
        }

        $result = $this->model("PenggunaModel")->findByEmail($_POST);
        if (!$result) return;

        $hashedPassword = $result['password'];
        $inputPassword = $_POST['password'];

        if (password_verify($inputPassword, $hashedPassword)) {
            $result['is_login'] = true;

            $is_login = $this->model("PenggunaModel")->update($result);

            $_SESSION['user'] = $result;
            if ($is_login >= 0) redirect("dashboard");
        } else {
            Flasher::setFlash("Login gagal.", "danger");
            back();
        }
    }

    public function logout()
    {
        unset($_SESSION['user']);
        redirect("autentikasi/index");
    }
}
