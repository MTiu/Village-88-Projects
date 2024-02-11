<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $user = $this->validate_user();
        $this->load->view('template/dashboard-header');
        $this->load->view('dashboard/Product-Dashboard');
    }
    private function validate_user(){
        if (!$this->session->userdata('user_id')) {
            redirect('/');
        } else if($this->session->userdata('admin')){
            return 'admin';
        }
        return 'user';
    }
}
