<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ajax extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler(TRUE);
		$this->load->model('Order');
	}

	public function index()
	{
		$data['orders'] = $this->Order->all_orders();
		$this->load->view('order_taker', $data);
	}

	public function update($id)
	{
		$this->Order->update_order($id, $this->input->post('description'));
		redirect('/');
	}

	public function remove($id)
	{
		$this->Order->delete_order($id);
		redirect('/');
	}

	public function put_order()
	{
		$this->Order->save_order($this->input->post('order'));
		redirect('/');
	}
}
