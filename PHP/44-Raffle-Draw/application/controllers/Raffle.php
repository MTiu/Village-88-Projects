<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Raffle extends CI_Controller {

	public function index()
	{
		$random = rand(1000000,9999999);
		if($this->input->post('submit')){
			if($this->session->userdata('count')){
				$count = $this->session->userdata('count') + 1;
			} else{
				$count = 1;
			}
			$this->session->set_userdata('count', $count);
			$data = array('num' => $count, 'random' => $random);
			$this->load->view('raffle',$data);
		} else if($this->input->post('reset')) {
			$this->session->unset_userdata('count');
			$this->load->view('raffle');
		} else{
			$this->load->view('raffle');
		}
		
	}
}
