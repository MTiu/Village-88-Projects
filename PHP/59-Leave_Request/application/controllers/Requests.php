<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Requests extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Request');
	}

	public function index()
	{
		$this->load->view('Leave-Request');
	}

	public function search_requests()
	{
		if (empty($this->input->post('request_time', true))) {
			$data['data'] = $this->Request->fetch_all();
		} else {
			$data['data'] = $this->Request->filter_search($this->input->post(NULL, true));
		}
		$this->load->view('partial/request-table', $data);
	}

	public function count(){
		if (empty($this->input->post('request_time', true))) {
			$data['id'] = $this->Request->count_all();
		} else {
			$data['id'] = $this->Request->count_all_filter($this->input->post(NULL, true));
		}
		echo json_encode($data['id'] . ' Leave Requests');
	}
}
