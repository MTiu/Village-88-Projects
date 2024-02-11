<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
    }

    public function get_user_id($email)
    {
        $safe_email = $this->security->xss_clean($email);
        return $this->db->query("SELECT user_id FROM users WHERE email = ?", $safe_email)->row_array();
    }

    public function get_user_info($id)
    {
        $safe_id = $this->security->xss_clean($id);
        return $this->db->query("SELECT email, first_name, last_name FROM users WHERE user_id = ?", $safe_id)->result_array();
    }

    public function edit_user_info($id, $post)
    {
        $safe_id = $this->security->xss_clean($id);
        $safe_fname = $this->security->xss_clean($post['fname']);
        $safe_lname = $this->security->xss_clean($post['lname']);
        $safe_email = $this->security->xss_clean($post['email']);
        $this->db->query("UPDATE users SET first_name = ?, last_name = ?, email = ?, updated_at = ? WHERE user_id = ?", array($safe_fname, $safe_lname, $safe_email, date('Y-m-d H:i:s'),$safe_id));
    }

    public function edit_user_password($id,$post)
    {
        $safe_id = $this->security->xss_clean($id);
        $safe_password = $this->security->xss_clean($post['new-password']);
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted = md5($safe_password . $salt);
        $this->db->query("UPDATE users SET password = ?, salt = ?, updated_at = ? WHERE user_id = ?", array($encrypted,$salt, date('Y-m-d H:i:s'),$safe_id));
    }

    public function validate_password($id, $password)
    {
        $safe_id = $this->security->xss_clean($id);
        $safe_password = $this->security->xss_clean($password);

        $salt = $this->db->query("SELECT salt FROM users WHERE user_id = ?", $safe_id)->row_array();
        $salted = md5($safe_password . $salt['salt']);
        return $this->db->query("SELECT password FROM users where password = ?", $salted)->row_array();
    }

    public function register($post)
    {
        $safe_fname = $this->security->xss_clean($post['fname']);
        $safe_lname = $this->security->xss_clean($post['lname']);
        $safe_email = $this->security->xss_clean($post['email']);
        $safe_password = $this->security->xss_clean($post['password']);
        $salt = bin2hex(openssl_random_pseudo_bytes(22));
        $encrypted = md5($safe_password . $salt);
        $query = "INSERT INTO users (first_name,last_name,email,password,salt,created_at,updated_at)
        VALUES (?,?,?,?,?,?,?)";
        $values = array($safe_fname, $safe_lname, $safe_email, $encrypted, $salt, date('Y-m-d H:i:s'), date('Y-m-d H:i:s'));
        return $this->db->query($query, $values);
    }

    public function validate_register()
    {
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[8]|max_length[255]|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[255]');
        $this->form_validation->set_rules('conf-password', 'Confirm Password', 'trim|required|min_length[8]|max_length[255]|matches[password]');
        if (!$this->form_validation->run()) {
            $errors = array(
                'fname' => form_error('fname'),
                'lname' => form_error('lname'),
                'email' => form_error('email'),
                'password' => form_error('password'),
                'conf-password' => form_error('conf-password'),
            );
            return $errors;
        } else {
            return 'success';
        }
    }

    public function validate_login()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[8]|max_length[255]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[255]');
        if (!$this->form_validation->run()) {
            $errors = array(
                'email' => form_error('email'),
                'password' => form_error('password'),
            );
            return $errors;
        } else {
            return 'success';
        }
    }

    public function validate_edit_info()
    {
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|min_length[8]|max_length[255]|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|min_length[3]|max_length[255]');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|min_length[3]|max_length[255]');
        if (!$this->form_validation->run()) {
            $errors = array(
                'email' => form_error('email'),
                'fname' => form_error('fname'),
                'lname' => form_error('lname'),
            );
            return $errors;
        } else {
            return 'success';
        }
    }

    public function validate_change_password()
    {
        $this->form_validation->set_rules('old-password', 'Old Password', 'trim|required|min_length[8]|max_length[255]');
        $this->form_validation->set_rules('new-password', 'New Password', 'trim|required|min_length[8]|max_length[255]');
        $this->form_validation->set_rules('conf-password', 'Confirm Password', 'trim|required|min_length[8]|max_length[255]|matches[new-password]');
        if (!$this->form_validation->run()) {
            $errors = array(
                'old-password' => form_error('old-password'),
                'new-password' => form_error('new-password'),
                'conf-password' => form_error('conf-password'),
            );
            return $errors;
        } else {
            return 'success';
        }
    }
}
