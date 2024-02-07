<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalogs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->library('form_validation');
		$this->load->model('Catalog');
		$this->form_validation->set_rules('name', 'Name', 'min_length[3]|max_length[255]');
		$this->form_validation->set_rules('number', 'Quantity', 'required|greater_than[0]|max_length[255]');
	}
	public function index()
	{
		$data['data'] = $this->Catalog->get_all_items();
		$data['count'] = $this->Catalog->get_cart_total()['COUNT(cart_id)'];
		if ($this->session->flashdata('errors')) {
			$data['error'] = substr($this->session->flashdata('errors'), 3, -5);
		} else {
			$data['error'] = $this->session->flashdata('error');
		}
		$data['success'] = $this->session->flashdata('success');
		$this->load->view('catalog', $data);
	}

	public function cart()
	{
		$data['error'] = $this->session->flashdata('error');
		$data['cart'] = $this->Catalog->get_all_cart_items();
		$data['total'] = $this->Catalog->get_total_price();
		if($data['total']){
			$data['total'] = array_values($this->Catalog->get_total_price())[0];
		}
		$this->load->view('cart', $data);
	}

	public function thanks()
	{
		$this->load->view('thank you');
	}

	public function buy()
	{
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
		} else {
			$input = $this->Catalog->add_to_cart($this->input->post());
			if ($input) {
				$this->session->set_flashdata('success', 'Item Added to Cart!');
				redirect('/');
			} else {
				$this->session->set_flashdata('error', 'Items in Cart Exceeded Stock!');
				redirect('/');
			}
		}
	}

	public function destroy($id)
	{
		$this->Catalog->destroy_cart_item($id);
		redirect('cart');
	}

	public function billing()
	{
		$cart_items = $this->Catalog->get_all_cart_items();
		if($cart_items){
			foreach ($cart_items as $values) {
				$this->Catalog->bill($values);
			}
			$this->Catalog->delete_all_cart();
			redirect('cart/Thank-you');
		} else {
			$this->session->set_flashdata('error', 'NO ITEMS IN CART!');
			redirect('cart');
		}
	}
}
