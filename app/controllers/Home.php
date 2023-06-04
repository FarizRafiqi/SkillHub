<?php 

class Home extends Controller{
    public function index(){
        $data['judul'] = "Home";

        if(isset($_SESSION['user']))
            $data['pengguna'] = $_SESSION['user'];

        $this->view('customer.index', $data, "templates.layout_customer");
    }
}
