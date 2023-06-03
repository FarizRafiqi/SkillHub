<?php

class Dashboard extends Controller
{
  public function index()
  {
    $data["judul"] = "Dashboard";
    $data['konten'] = '../app/views/admin_panel/index.php';

    $data['current_route'] = $this->currentRoute();
    $this->view("admin_panel.index", $data, "templates.layout_admin");
  }
}