<?php 

class Course extends Controller{
    public function index(){
        $data['judul'] = "Course";
        $this->view('course.detail_course', $data, 'templates.layout_customer');
    }
}