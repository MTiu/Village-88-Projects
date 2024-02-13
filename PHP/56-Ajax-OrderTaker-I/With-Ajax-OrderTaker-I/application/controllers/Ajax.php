<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Order');
	}

	public function index()
	{
		$this->load->view('order-taker');
	}

	public function order_list()
	{
		$data['orders'] = $this->Order->fetch_all();
		$this->load->view('partial/orders', $data);
	}

	public function order()
	{
		$validation['validation'] = $this->Order->validate_order();

		if ($validation['validation'] != 'success') {
			$data['orders'] = $this->Order->fetch_all();
			$this->load->view('partial/validation', $validation);
			$this->load->view('partial/orders', $data);
		} else {
			$this->Order->insert($this->input->post('order'));
			$data['orders'] = $this->Order->fetch_all();
			$this->load->view('partial/orders', $data);
		}
	}
}
