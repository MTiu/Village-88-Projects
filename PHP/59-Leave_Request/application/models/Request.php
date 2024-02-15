<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Request extends CI_Model
{
    public function fetch_all()
    {
        $data = $this->db->query("SELECT * FROM requests ")->result_array();
        $data = $this->create_date($data);
        return $data;
    }

    public function filter_search($post)
    {
        $safe_post  = $this->clean_post($post);

        if ($safe_post['request_time'] == 'old') {
            $data = $this->db->query(
                "SELECT * FROM requests
                WHERE request_date < '2024-02-05'
                AND leave_type LIKE ?",
                $safe_post['vacation']
            )->result_array();
        } else if ($safe_post['request_time'] == 'recent') {
            $data = $this->db->query(
                "SELECT * FROM requests
                WHERE request_date BETWEEN '2024-02-05' AND '2024-02-11'
                AND leave_type LIKE ?",
                $safe_post['vacation']
            )->result_array();
        }

        return $data = $this->create_date($data);
    }

    private function clean_post($post)
    {

        foreach ($post as $key => $value) {
            $post[$key] = $this->security->xss_clean($value);
        }

        return $post;
    }

    public function count_all()
    {
        $data = $this->db->query("SELECT COUNT(id) as count FROM requests")->row_array();
        return $data['count'];
    }

    public function count_all_filter($post)
    {
        $safe_post  = $this->clean_post($post);

        if ($safe_post['request_time'] == 'old') {
            $data = $this->db->query(
                "SELECT COUNT(id) as count FROM requests
                WHERE request_date < '2024-02-05'
                AND leave_type LIKE ?",
                $safe_post['vacation']
            )->row_array();
        } else if ($safe_post['request_time'] == 'recent') {
            $data = $this->db->query(
                "SELECT COUNT(id) as count FROM requests
                WHERE request_date BETWEEN '2024-02-05' AND '2024-02-11'
                AND leave_type LIKE ?",
                $safe_post['vacation']
            )->row_array();
        }
        return $data['count'];
    }

    private function create_date($data)
    {
        foreach ($data as $key => $request) {
            $data[$key]['request_date'] = date('m/d/Y', strtotime($request['request_date']));
            $data[$key]['from_date'] = date('m/d/Y', strtotime($request['from_date']));
            $data[$key]['to_date'] = date('m/d/Y', strtotime($request['to_date']));
        }
        return $data;
    }
}
