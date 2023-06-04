<?php

class Login extends Controller
{
    public function index($data)
    {

        $result = $this->model("PenggunaModel")->findByEmail($data);
        if ($result) {
            $hashedPassword = $result['password'];
            $inputPassword = $data['password'];

            if (password_verify($inputPassword, $hashedPassword)) {
                $data["judul"] = "Login";
                $data['konten'] = '../app/views/login/index.php';

                $data['current_route'] = $this->currentRoute();
                $this->view("login.index", $data, "templates.layout_admin");
            } else {
                Flasher::setFlash("Login gagal.", "danger");
                redirect("login/index");
            }
        }
    }
}
