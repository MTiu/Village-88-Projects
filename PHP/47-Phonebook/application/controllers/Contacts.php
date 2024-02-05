<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contacts extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Contact');
		// $this->output->enable_profiler(TRUE);
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "required|min_length[3]|max_length[80]");
		$this->form_validation->set_rules("number", "Contact Number", "required|min_length[3]|max_length[11]");
	}

	public function index()
	{
		$data['contacts'] = $this->Contact->get_all_contacts();
		$this->load->view('contacts-page', $data);
	}

	public function new()
	{
		$this->load->view('contacts-add');
	}

	public function show($id)
	{
		$data = $this->Contact->get_contact_id($id);
		$data['id'] = $id;
		$this->load->view('contacts-show', $data);
	}

	public function edit($id)
	{
		$data['id'] = $id;
		$this->load->view('contacts-edit', $data);
	}

	public function update($id)
	{
		if ($this->form_validation->run() === FALSE) {
			$data['id'] = $id;
			$this->session->set_flashdata('errors', validation_errors());
			echo $this->session->flashdata('errors');
			$this->load->view("contacts-edit", $data);
		} else {
			$this->Contact->update_contact($this->input->post(),$id);
			redirect(base_url());
		}
	}

	public function destroy($id)
	{
		echo "I deleted this contact number $id";
		$this->Contact->destroy_contact($id);
		redirect('contacts');
	}

	public function create()
	{
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			echo $this->session->flashdata('errors');
			$this->load->view('contacts-add');
		} else {
			$this->Contact->add_contact($this->input->post());
			echo "Added Successfully |";
			$this->load->view('contacts-add');
		}
	}
}
