<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Filters extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Filter');

	}

	public function index()
	{
		if ($this->session->flashdata('errors')) {
			$data['error']=$this->session->flashdata('errors');
		} 
		if ($this->session->userdata('data')) {
			$data['data'] = $this->session->userdata('data');
			$this->load->view('fire-emblem', $data);
		} else {
			$data['data'] = $this->Filter->get_all_characters();
			$this->load->view('fire-emblem', $data);
		}


	}


	public function process()
	{
		$result = $this->Filter->validate($this->input->post());
		if ($result != 'valid') {
			$this->session->set_flashdata('errors', $result);
			redirect('/');
		} else {
			$data = $this->Filter->search(
				$this->input->post('character-name'),
				$this->input->post('weapon'),
				$this->input->post('gender')
			);
			$this->session->set_userdata('data', $data);
			var_dump($this->input->post());
			redirect('/');
		}
	}
}
