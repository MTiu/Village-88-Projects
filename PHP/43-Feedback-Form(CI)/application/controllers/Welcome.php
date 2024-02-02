<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('submitForm');
	}
	public function success(){
		$data['data'] = array(
			'name' => $this->input->post('name'),
			'course' => $this->input->post('course'),
			'score' => $this->input->post('score'),
			'reason' => $this->input->post('reason'),
		);
		$this->load->view('success',$data);
	}
}
