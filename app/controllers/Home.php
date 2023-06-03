<?php 

class Home extends Controller{
    public function index(){
        $data['judul'] = "Home";
        $data['pengguna'] = $this->model('PenggunaModel')->all();
        $this->view('home.index', $data, "templates.layout_customer");
    }
}
