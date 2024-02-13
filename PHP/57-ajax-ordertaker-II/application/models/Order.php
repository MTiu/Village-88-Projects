<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Model
{

    public function all_orders()
    {
        return $this->db->query("SELECT * FROM orders")->result_array();
    }

    public function delete_order($id)
    {
        $safe_id = $this->security->xss_clean($id);
        $this->db->query("DELETE FROM orders WHERE id = ?", $safe_id);
    }

    public function update_order($id, $post)
    {
        $safe_id = $this->security->xss_clean($id);
        $safe_post = $this->security->xss_clean($post);
        $this->db->query("UPDATE orders SET description = ? WHERE id = ?", array($safe_post, $safe_id));
    }

    public function save_order($post)
    {
        $this->db->query("INSERT INTO orders (description,created_at,updated_at) VALUES(?,now(),now())",$post);
    }
}
