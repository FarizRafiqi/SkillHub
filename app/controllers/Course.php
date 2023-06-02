<?php 

class Course extends Controller{
    public function index(){
        $data['judul'] = "Course";
        $this->view('templates/header', $data);
        $this->view('course/detail_course', $data);
        $this->view('templates/footer');
    }
}
?>