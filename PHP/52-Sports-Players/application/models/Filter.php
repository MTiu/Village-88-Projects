<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Filter extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('character-name', 'Character Name', 'trim|min_length[3]|max_length[80]');
        $this->form_validation->set_error_delimiters("<p class = 'error'>", '</p>');
    }
    /* This Function Gets all the characters in the database
    It also has its own default value which uses the eval_arr */
    public function get_all_characters()
    {
        return $this->db->query("SELECT * FROM characters")->result_array();
    }

    public function search($name,$weapon_id, $gender){
        $safe_name = $this->security->xss_clean($name);
        $safe_weapon_id = $this->security->xss_clean($weapon_id);
        $safe_gender = $this->security->xss_clean($gender);

        $safe_gender = $this->eval_arr($safe_gender,array('f','m'));
        $safe_weapon_id = $this->eval_arr($safe_weapon_id,array(1,2,3,4,5,6));
        $safe_name = $this->eval_arr($safe_name, "");

        $query = "SELECT first_name, last_name, image FROM relation
                    INNER JOIN characters ON characters.character_id = relation.character_id
                    WHERE characters.gender IN ?
                    AND weapon_id IN ?
                    AND CONCAT(first_name, ' ',last_name) LIKE ?
                    GROUP BY relation.character_id;";
        $values = array($safe_gender,$safe_weapon_id,'%'.$safe_name.'%');
        return $this->db->query($query,$values)->result_array();
    }
    /* This is mostly used for validation in the controller */
    public function validate()
    {
        if ($this->form_validation->run()) {
            return "valid";
        } else {
            return array(validation_errors());
        }
    }
    /* This function evaluates if the array that is passed to the model is empty 
    so that it can assign a default value to the array */
    private function eval_arr($arr,$value){
        if(empty($arr)){
            return $arr = $value;
        }
        return $arr;
    }
}
