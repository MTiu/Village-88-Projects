<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search_Filter extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Item');
	}

	public function index()
	{
		$this->load->view('search');
	}

	public function search($page = 1)
	{
		$data['validation'] = $this->Item->validate();
		$data['data'] = $this->Item->filter($this->input->post(NULL, TRUE),$page);
		$this->load->view('partial/table-items', $data);
	}

	public function loadPage()
	{
		$data['count'] = $this->Item->fetch_page_count($this->input->post(NULL, TRUE));
		$this->load->view('partial/pages', $data);
	}
}
