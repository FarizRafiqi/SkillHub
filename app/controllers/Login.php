<?php

class Login extends Controller
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
        if ($result) {
            $hashedPassword = $result['password'];
            $inputPassword = $_POST['password'];

            if (password_verify($inputPassword, $hashedPassword)) {
                redirect("dashboard");
            } else {
                Flasher::setFlash("Login gagal.", "danger");
                back();
            }
        }
    }
}
