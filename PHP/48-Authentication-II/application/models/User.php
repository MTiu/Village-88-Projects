<?php

class User extends CI_Model
{
    public function get_email_user($user)
    {
        return $this->db->query("SELECT * FROM users WHERE email = ?", $user['email'])->row_array();
    }
    public function get_contact_user($user)
    {
        return $this->db->query("SELECT * FROM users WHERE contact_number = ?", $user['contact_number'])->row_array();
    }
    public function signUp($user)
    {
        $query = "INSERT INTO users (first_name, last_name, contact_number, password, email, created_at) VALUES (?, ?, ?, ?, ?, ?)";
        $values = array($user['first_name'],$user['last_name'],$user['contact_number'],$user['password'],$user['email'], date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    public function failedLogin_email($user){
        return $this->db->query("UPDATE users SET failed_login = ? WHERE email = ?", array(date("Y-m-d, H:i:s"), $user['email']));
    }
    public function failedLogin_contact($user){
        return $this->db->query("UPDATE users SET failed_login = ? WHERE contact_number = ?", array(date("Y-m-d, H:i:s"), $user['contact_number']));
    }
}
