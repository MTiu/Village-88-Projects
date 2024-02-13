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
		$data['orders'] = $this->Order->fetch_all();
		if($this->session->flashdata('errors')){
			$data['errors'] = $this->session->flashdata('errors');
			$this->load->view('order-taker',$data);
		} else {
			$this->load->view('order-taker',$data);
		}
	}
	public function order()
	{
		$validation = $this->Order->validate_order();

		if ($validation != 'success') {
			$this->session->set_flashdata('errors', $validation);
			redirect('/');
		} else {
			$this->Order->insert($this->input->post('order'));
			redirect('/');
		}
	}
}
