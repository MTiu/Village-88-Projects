<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'trim');
        $this->form_validation->set_rules('min', 'Minimum Number', 'trim|numeric');
        $this->form_validation->set_rules('max', 'Maximum Number', 'trim|numeric');
        $this->form_validation->set_error_delimiters("<p class = 'error'>", '</p>');
    }

    public function fetch_all()
    {
        $data = $this->db->query("SELECT * FROM items ORDER BY price")->result_array();
        $data = $this->create_date($data);
        return $data;
    }

    public function filter($post)
    {
        $safe_post  = $this->clean_post($post);
        $safe_name = $this->default_values($safe_post['name'], "");
        $safe_min = $this->default_values($safe_post['min'], 1);
        $safe_max = $this->default_values($safe_post['max'], 1000);

        $data = $this->db->query(
            "SELECT * FROM items
                            WHERE name LIKE ?
                            AND quantity BETWEEN ? AND ?
                            ORDER BY price " . $safe_post['order'],
            array('%' . $safe_name . '%', $safe_min, $safe_max)
        )->result_array();

        return $data = $this->create_date($data);
    }

    private function clean_post($post)
    {

        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }

        return $post;
    }

    private function default_values($item, $value)
    {
        if (empty($item)) {
            return $item = $value;
        }
        return $item;
    }

    private function create_date($data){
        foreach ($data as $key => $item) {
            $data[$key]['created_at'] = date('F d, Y', strtotime($item['created_at']));
        }
        return $data;
    }

    public function validate(){

        if (!$this->form_validation->run())
        {
            return validation_errors();
        }
        else
        {
            return;
        }
    }
}
