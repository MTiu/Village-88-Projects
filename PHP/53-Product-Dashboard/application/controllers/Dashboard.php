<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product');
    }
    
    public function index()
    {
        $this->validate_user();
        if ($this->session->userdata('admin')) {
            $data['products'] = $this->Product->get_all_products();
            $data['admin'] = $this->session->userdata('admin');
            $this->load->view('template/dashboard-header');
            $this->load->view('dashboard/Product-Dashboard', $data);
        } else {
            $data['products'] = $this->Product->get_all_products();
            $this->load->view('template/dashboard-header');
            $this->load->view('dashboard/Product-Dashboard',$data);
        }
    }
    /* This function validates if the user is an admin or not for session handling */
    private function validate_user()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        } else if ($this->session->userdata('admin')) {
            return 'admin';
        }
        return 'user';
    }
}
