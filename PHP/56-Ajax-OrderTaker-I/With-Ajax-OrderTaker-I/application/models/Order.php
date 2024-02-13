<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('', '');
    }

    public function fetch_all(){
        return $this->db->query("SELECT * FROM orders")->result_array();
    }
    
    public function insert($post){
        $safe_post = $this->security->xss_clean($post);
        $this->db->query("INSERT INTO orders (description, created_at) VALUES(?,?)",array($safe_post, date('Y-m-d H:i:s')));
    }

    public function validate_order(){
        $this->form_validation->set_rules('order','Order','required|trim|min_length[3]');

        if (!$this->form_validation->run())
        {
            return form_error('order');
        }
        else
        {
            return 'success';
        }
    }
}

?>