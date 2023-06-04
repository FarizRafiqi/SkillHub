<?php 

class About extends Controller{
    public function index(){
        $data['judul'] = "About Me";
        $this->view('customer.about', $data, "templates.layout_customer");
    }
}