<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function new()
    {
        $this->load->view('template/dashboard-header');
        $this->load->view('dashboard/Manage-Product');
    }
    public function edit()
    {
        $this->load->view('template/dashboard-header');
        $this->load->view('dashboard/Manage-Product');
    }
    public function show()
    {
        $this->load->view('template/dashboard-header');
        $this->load->view('dashboard/Product-Info');
    }
}
