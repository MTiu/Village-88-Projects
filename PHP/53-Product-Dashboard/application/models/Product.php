<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    }
    /* This function gets all the products to be displayed and can be used not only in the 
        main dashboard but also in other pages like getting product data to be passed
        in input. The singular specific version of this is the get_product which accepts a product_id
    */
    public function get_all_products()
    {
        return $this->db->query("SELECT * FROM products ORDER BY product_id")->result_array();
    }

    public function get_product($id)
    {
        $safe_id = $this->security->xss_clean($id);
        return $this->db->query("SELECT * FROM products WHERE product_id = ?", $safe_id)->row_array();
    }

    /* add product and edit product are both used to manage the data values of the product
        for adding and editting current data as well as remove product.
    */

    public function add_product($post)
    {
        foreach ($post as &$value) {
            $value = $this->security->xss_clean($value);
        }

        $query = ("INSERT INTO products (name, product_description, price, product_quantity, quantity_sold, image, created_at, updated_at)
                            VALUES (?,?,?,?,?,?,?,?)");
        $values = array(
            $post['product-name'], $post['product-description'], $post['product-price'], $post['inventory-count'], $post['sold-quantity'], $post['product-image'], date('Y-m-d H:i:s'), date('Y-m-d H:i:s')
        );
        return $this->db->query($query,$values);
    }

    public function edit_product($post,$id)
    {
        foreach ($post as &$value) {
            $value = $this->security->xss_clean($value);
        }

        $query = ("UPDATE products SET name = ?, product_description = ?, price = ? , product_quantity = ?, quantity_sold = ? , image = ?, updated_at = ?
                    WHERE product_id = ?");
        $values = array(
            $post['product-name'], $post['product-description'], $post['product-price'], $post['inventory-count'], $post['sold-quantity'], $post['product-image'], date('Y-m-d H:i:s'), $id
        );
        return $this->db->query($query,$values);
    }

    public function remove_product($id){
        $safe_id = $this->security->xss_clean($id);
        return $this->db->query("DELETE FROM products WHERE product_id = ?", $safe_id);
    }

    /*This is the validation mention earlier that validates the input fields for editting and adding the products */

    public function validate_manage()
    {
        $this->form_validation->set_rules('product-name', 'Product name', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('product-image', 'Product image', 'trim|required|min_length[10]|max_length[255]|valid_url');
        $this->form_validation->set_rules('product-description', 'Product Description', 'trim|required|min_length[8]|max_length[800]');
        $this->form_validation->set_rules('product-price', 'Product Price', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('inventory-count', 'Inventory Count', 'trim|required|greater_than[0]');
        $this->form_validation->set_rules('sold-quantity', 'Sold Quantity', 'trim|required|greater_than[0]');
        if (!$this->form_validation->run()) {
            $errors = array(
                'product-name' => form_error('product-name'),
                'product-image' => form_error('product-image'),
                'product-description' => form_error('product-description'),
                'product-price' => form_error('product-price'),
                'inventory-count' => form_error('inventory-count'),
                'sold-quantity' => form_error('sold-quantity'),
            );
            return $errors;
        } else {
            return 'success';
        }
    }
}
