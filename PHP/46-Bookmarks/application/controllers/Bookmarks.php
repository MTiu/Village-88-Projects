<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bookmarks extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Bookmark");
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "required|min_length[3]|max_length[80]");
		$this->form_validation->set_rules("url", "URL", "required|min_length[3]|max_length[255]|valid_url");
	}

	public function index()
	{
		if($this->session->flashdata("errors")){
			echo $this->session->flashdata("errors");
			var_dump($this->session->flashdata("errors"));
		}
		// $this->output->enable_profiler(TRUE);
		$data['data'] = $this->Bookmark->get_all_bookmarks();
		$this->load->view('Bookmark', $data);
	}

	public function delete($id)
	{
		$data['id'] = $id;
		$data['favorite'] = $this->Bookmark->get_bookmark_id($id);
		$this->load->view('delete', $data);
	}

	public function deleteProcess($id)
	{
		$this->Bookmark->delete_bookmark($id);
		redirect(base_url());
	}

	public function process()
	{
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata("errors", validation_errors());
			redirect(base_url());
		} else {
			$bookmark = $this->input->post();
			$this->Bookmark->add_bookmark($bookmark);
			redirect(base_url());
		}
	}
}
