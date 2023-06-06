<?php 

class Profil extends Controller{
    public function index(){
        $this->checkUserAccess();

        $data['judul'] = "Profil";

        if(isset($_SESSION['user']))
            $data['pengguna'] = $_SESSION['user'];

        $this->view('admin_panel.profile', $data, "templates.layout_admin");
    }
}
