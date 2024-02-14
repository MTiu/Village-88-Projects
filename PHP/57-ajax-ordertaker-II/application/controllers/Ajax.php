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
		$this->load->view('order_taker');
	}

	public function index_html()
	{
		$data['orders'] = $this->Order->all_orders();
		$this->load->view('partial/order-list', $data);
	}

	public function update($id)
	{
		$this->Order->update_order($id, $this->input->post('description'));
		$data['orders'] = $this->Order->all_orders();
		$this->load->view('partial/order-list', $data);
	}

	public function remove($id)
	{
		$this->Order->delete_order($id);
		$data['orders'] = $this->Order->all_orders();
		$this->load->view('partial/order-list', $data);
	}

	public function put_order()
	{
		if (strlen($this->input->post('order')) > 0)
		$this->Order->save_order($this->input->post('order'));
		
		$data['orders'] = $this->Order->all_orders();
		$this->load->view('partial/order-list', $data);
	}
}
