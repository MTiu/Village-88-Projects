<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Model
{
    public function fetch_all()
    {
        return $this->db->query("SELECT * FROM items")->result_array();
    }
}
