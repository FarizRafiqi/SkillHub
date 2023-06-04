<?php

class Controller
{
    public function view($view, $data = [], $layout = null)
    {
        // Mengubah separator dot menjadi slash (/)
        $viewPath = str_replace('.', '/', $view);
        $viewPath = '../app/views/' . $viewPath . '.php';

        $layoutPath = null;
        if ($layout) {
            $layoutPath = str_replace('.', '/', $layout);
            $layoutPath = '../app/views/' . $layoutPath . '.php';
        }

        if (file_exists($viewPath) && (!$layout || file_exists($layoutPath))) {
            ob_start();

            $data["current_route"] = $this->currentRoute();

            extract($data, EXTR_SKIP);

            try {
                require_once $viewPath;

                $content = ob_get_clean();

                // Render layout dengan memasukkan konten anak ke dalam layout
                if ($layout) {
                    require_once $layoutPath;
                } else {
                    echo $content;
                }
            } catch (Exception $e) {
                // Tangani error dengan menampilkan pesan yang lebih informatif
                echo 'Error rendering view: ' . $e->getMessage();
            }
        } else {
            echo 'View or layout file not found';
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
        }
    }

    protected function clearErrors()
    {
        unset($_SESSION["errors"]);
    }

    protected function checkUserAccess(): void
    {
        // Jika pengguna belum login, maka abort koneksi
        if (!isset($_SESSION['user'])) {
            abort_if(true, 403, 'errors.403');
        }

        // Jika pengguna sudah login tetapi perannya bukan admin maka abort
        // Jika perannya admin maka return false

        $pengguna = $this->model("PenggunaModel")->find($_SESSION['user']['id']);
        $isNotAllowed = ($pengguna['is_login'] != 1) && ($pengguna['id_peran'] != 1);
        abort_if($isNotAllowed, 403, 'errors.403');
    }
}