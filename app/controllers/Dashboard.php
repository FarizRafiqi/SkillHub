<?php

class Dashboard extends Controller
{
    public function index()
    {
        $this->checkUserAccess();

        $data["judul"] = "Dashboard";
        $this->view("admin_panel.index", $data, "templates.layout_admin");
    }
}
