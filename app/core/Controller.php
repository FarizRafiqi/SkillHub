<?php

class Controller
{
    public function view($view, $data = [], $layout)
    {
        // Mengubah separator dot menjadi slash (/)
        $viewPath = str_replace('.', '/', $view);
        $viewPath = '../app/views/' . $viewPath . '.php';

        $layoutPath = str_replace('.', '/', $layout);
        $layoutPath = '../app/views/' . $layoutPath . '.php';

        if (file_exists($viewPath) && file_exists($layoutPath)) {
            ob_start();

            extract($data);
            require_once $viewPath;

            $content = ob_get_clean();

            // Render layout dengan memasukkan konten anak ke dalam layout
            require_once $layoutPath;
        } else {
            die("View and layout file not found: " . $viewPath);
        }
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }

    public function request($request)
    {
        require_once '../app/requests/' . $request . '.php';
        return new $request;
    }

    public function currentRoute()
    {
        if (!isset($_GET['url'])) return;

        $url = rtrim($_GET['url'], '/');
        return filter_var($url, FILTER_SANITIZE_URL);
    }

    public function withErrors($errors): void
    {
        if (is_array($errors)) {
            $_SESSION['errors'] = $errors;
//            dd($_SESSION['errors']);
        }
    }

    protected function clearErrors()
    {
        $errors = [];
        unset($_SESSION["errors"]);
    }
}