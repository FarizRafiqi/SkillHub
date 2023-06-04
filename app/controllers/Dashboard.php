<?php

class Dashboard extends Controller
{
  public function index()
  {
    $data["judul"] = "Dashboard";
    $data['current_route'] = $this->currentRoute();

    // jika pengguna sudah login maka arahkan ke dashboard
    if (isset($_SESSION['user'])) {
      $pengguna = $this->model("PenggunaModel")->find($_SESSION['user']['id']);
      $logged = ($pengguna['is_login'] != 1) && ($pengguna['id_peran'] != 1);
      abort_if($logged, 403, 'Akses ditolak');
      $this->view("admin_panel.index", $data, "templates.layout_admin");
    } else {
      abort_if(true, 403, 'Akses ditolak');
    }
  }
}
