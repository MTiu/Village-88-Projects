<?php

class Catalog extends CI_Model
{
    public function get_all_items()
    {
        return $this->db->query("SELECT * FROM items")->result_array();
    }

    public function get_all_cart_items()
    {
        return $this->db->query("SELECT name, cart_item_quantity, price, cart_id, items.item_id FROM carts
                INNER JOIN items ON items.item_id = carts.item_id
                ORDER BY carts.created_at;")->result_array();
    }

    public function get_cart_total()
    {
        return $this->db->query("SELECT COUNT(cart_id) FROM carts")->row_array();
    }

    public function add_to_cart($item)
    {
        $determiner = $this->db->query("SELECT * FROM carts WHERE item_id = ?", $item['id'])->row_array();
        $cart_quantity = $this->db->query("SELECT cart_item_quantity FROM carts WHERE item_id = ?", $item['id'])->row_array();
        $item_quantity = $this->db->query("SELECT quantity FROM items WHERE item_id = ?",$item['id'])->row_array();
        
        if((array_values($cart_quantity)[0]+$item['number']) > array_values($item_quantity)[0]){
            return null;
        } else{
            if($determiner){
                $item['number'] += array_values($cart_quantity)[0];
                $query = "UPDATE carts SET cart_item_quantity = ? WHERE item_id = ?";
                $values = array($item['number'],$item['id']);
                return $this->db->query($query,$values);
            } else {
                $query = "INSERT INTO carts (user_id, item_id, cart_item_quantity, created_at) VALUES (?,?,?,?)";
                $values = array(1, $item['id'], $item['number'], date('Y-m-d H:i:s'));
                return $this->db->query($query,$values);
            }
        }
    }

    public function destroy_cart_item($id)
    {
        return $this->db->query("DELETE FROM carts WHERE cart_id = ?", $id);
    }

    public function get_total_price()
    {
        return $this->db->query("SELECT SUM(items.price*cart_item_quantity) FROM carts
                INNER JOIN items ON items.item_id = carts.item_id
                GROUP BY user_id")
            ->row_array();
    }

    public function bill($cart){

        $item_quantity = $this->db->query("SELECT quantity FROM items WHERE item_id = ?",$cart['item_id'])->row_array();
        $cart_quantity = $this->db->query("SELECT cart_item_quantity FROM carts WHERE item_id = ?", $cart['item_id'])->row_array();

        var_dump($item_quantity);
        var_dump($cart_quantity);

        $quantity =  array_values($item_quantity)[0] - array_values($cart_quantity)[0];
        $query = "UPDATE items SET quantity = ? WHERE item_id = ?";
        $values = array($quantity,$cart['item_id']);
        $this->db->query($query,$values);
    }
    public function delete_all_cart(){
        $this->db->query("DELETE FROM carts");
    }
}
