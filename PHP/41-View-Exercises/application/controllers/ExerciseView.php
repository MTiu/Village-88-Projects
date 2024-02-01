<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExerciseView extends CI_Controller {

	public function index()
	{
		$this->load->view('users/index');
	}

	public function world()
	{
		$this->load->view('main/world');
	}

	public function ninja($num)
	{
		$data['num'] = $num;
		$this->load->view('main/ninja',$data);
	}
	
	public function users()
	{
		$this->load->view('users/index');
	}
	
	public function new()
	{
		$this->load->view('users/new');
	}

	public function create()
	{
		if($this->input->post()){
			$this->load->view('users/create');
		}else{
			redirect('users');
		}
	}
	public function count(){
		if($this->session->userdata('visit')){
			$currentVisit = $this->session->userdata('visit') + 1;
		}else{
			$currentVisit = 1;
		}
		$this->session->set_userdata('visit', $currentVisit);
		$data['visit'] = $this->session->userdata('visit');
		$this->load->view('users/count',$data);
	}
	public function reset(){
		$this->session->unset_userdata('visit');
		$this->load->view('users/reset');
	}
	public function say($word, $number){
		if(is_numeric($number)){
			$numberTimes = $number;
			$say = $word;
			$data['data'] = array('word' => $say, 'num' => $numberTimes);
			$this->load->view('users/say',$data);
		}else{
 			$this->load->view('users/say');
		}
	}
	public function mprep()
	{
		$view_data = array(
			'name' => "Michael Choi",
			'age'  => 40,
			'location' => "Seattle, WA",
			'hobbies' => array( "Basketball", "Soccer", "Coding", "Teaching", "Kdramas")
		);
		$this->load->view('users/mprep', $view_data);
	}
}
