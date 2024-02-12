<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="error-popup">', '</p>');
        date_default_timezone_set('Asia/Manila');
    }

    public function get_reviews($id)
    {
        $safe_id = $this->security->xss_clean($id);

        $result = $this->db->query("SELECT CONCAT(users.first_name, ' ', users.last_name) AS user, reviews.created_at AS date, review_description AS review, review_id
                                FROM reviews 
                                INNER JOIN users ON users.user_id = reviews.user_id
                                WHERE reviews.product_id = ?
                                ORDER BY date DESC
                    ", $safe_id)->result_array();
        foreach ($result as $key => $value) {
            $result[$key]['date'] = $this->calculateTime($result[$key]['date']);
        }
        return $result;
    }
    public function get_replies()
    {
        $result = $this->db->query("SELECT CONCAT(users.first_name, ' ', users.last_name) AS user, replies.created_at AS date, reply_description AS reply, review_id
                                FROM replies 
                                INNER JOIN users ON users.user_id = replies.user_id
        ")->result_array();

        foreach ($result as $key => $value) {
            $result[$key]['date'] = $this->calculateTime($result[$key]['date']);
        }
        return $result;
    }

    public function make_review($product_id, $user_id, $message)
    {
        $safe_product_id = $this->security->xss_clean($product_id);
        $safe_user_id = $this->security->xss_clean($user_id);
        $safe_message = $this->security->xss_clean($message);

        $query = ("INSERT INTO reviews (review_description, user_id, product_id, created_at) VALUES (?,?,?,?)");
        $values = array($safe_message, $safe_user_id, $safe_product_id, date('Y-m-d H:i:s'));
        $this->db->query($query, $values);
    }

    public function make_reply($review_id, $user_id, $message)
    {
        $safe_review_id = $this->security->xss_clean($review_id);
        $safe_user_id = $this->security->xss_clean($user_id);
        $safe_message = $this->security->xss_clean($message);

        $query = ("INSERT INTO replies (reply_description, user_id, review_id, created_at) VALUES (?,?,?,?)");
        $values = array($safe_message, $safe_user_id, $safe_review_id, date('Y-m-d H:i:s'));
        $this->db->query($query, $values);
    }

    public function validate_review()
    {
        $this->form_validation->set_rules('review', 'Review', 'trim|required|min_length[3]|max_length[255]');
        if (!$this->form_validation->run()) {
            $errors = array(
                'review' => form_error('review'),
            );
            return $errors;
        } else {
            return 'success';
        }
    }

    public function validate_reply()
    {

        $this->form_validation->set_rules('reply', 'Reply', 'trim|required|min_length[3]|max_length[255]');
        if (!$this->form_validation->run()) {
            $errors = array(
                'reply' => form_error('reply'),
            );
            return $errors;
        } else {
            return 'success';
        }
    }

    private function calculateTime($date)
    {
        $now = time();
        $msg_date = strtotime($date);
        $timeDifference = $now - $msg_date;

        if ($timeDifference < 60) {
            return "Less than a minute ago";
        } else if ($timeDifference < 3600) {
            $minutes = floor($timeDifference / 60);
            return "$minutes minute" . ($minutes > 1 ? 's' : '') . " ago";
        } else if ($timeDifference < 86400) {
            $hours = floor($timeDifference / 3600);
            return "$hours hour" . ($hours > 1 ? 's' : '') . " ago";
        } else if ($timeDifference < 604800) {
            $days = floor($timeDifference / 86400);
            return "$days day" . ($days > 1 ? 's' : '') . " ago";
        } else {
            return date('Y-m-d H:i:s', $msg_date);
        }
    }
}
