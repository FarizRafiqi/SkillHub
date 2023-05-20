<?php

class App{
    /*
        Disini terjadi proses Routing,
        yaitu proses menentukan controller dan method yang dibutuhkan
    */
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        // URL dipecah menjadi array
        $url = $this->parseURL();
        //controller
        /*
            Cek apakah index ke-0 yg merupakan controller, ada tidak filenya?
            jika ada maka jalankan perintah dibawah ini, namun jika tidak ada
            maka jalankan controller default yaitu index
        */
        if(isset($url[0]) && file_exists('../app/controllers/'  . $url[0] . '.php') ){
            // jika ada maka property controller di assign dgn controller dari array
            $this->controller = $url[0];
            // stlh itu hilangkan controller dari array nya
            unset($url[0]);
        }

        // panggil controller dan buat objek dari controller tsb
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // method
        // cek apakah index ke-1 yg merupakan method sudah di set apa belum
        // jika belum maka proses ini akan dilewatkan dan langsung memanggil method defaultnya
        if(isset($url[1])){
            if( method_exists($this->controller, $url[1]) ){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // params
        //cek apakah ada parameter atau tidak
        if(!empty($url)){
            $this->params = array_values($url);
        }

        // jalankan controller dan method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}