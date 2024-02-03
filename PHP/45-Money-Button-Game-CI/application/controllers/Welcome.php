<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function reset(){
		if($this->session->userdata()){
			$this->session->unset_userdata('money');
			$this->session->unset_userdata('chance');
			$this->session->unset_userdata('message');
			redirect(base_url());
		}
	}

	public function index()
	{
		$data = $this->loadPage();
		$postData = $this->loadData($this->input->post());
		$data['initDate'] = date('[m/d/Y h:i A]');
		$data['post'] = $postData;
		if($this->input->post()){
			$this->load->view('Money-Game', $data);
		}else{
			$this->load->view('Money-Game', $data);
		}
	}

	private function loadPage()
	{
		$data['page'] = array(
			'low' => array('name' => 'Low Risk', 'price' => 'by -25 up to 100', 'picture' => 'sun'),
			'Moderate' => array('name' => 'Moderate Risk', 'price' => 'by -100 up to 1000' , 'picture' => 'wheel'),
			'High' => array('name' => 'High Risk', 'price' => 'by -500 up to 2500' , 'picture' => 'hanged'),
			'Severe' => array('name' => 'Severe Risk', 'price' => 'by -3000 up to 5000' , 'picture' => 'death'),
		);
		return $data;
	}

	private function loadData($post){
		if($post){
			foreach($post as $key => $value){
				if($key == 'Low_Risk'){
					$random = $this->loadRand(-25,100, 'Low Risk');
					return $random;
				} else if($key == 'Moderate_Risk'){
					$random = $this->loadRand(-100,1000, 'Moderate Risk');
					return $random;
				} else if($key == 'High_Risk'){
					$random = $this->loadRand(-500,2500, 'High Risk');
					return $random;
				} else if($key == 'Severe_Risk'){
					$random = $this->loadRand(-3000,5000, 'Severe Risk');
					return $random;
				}
			}
		}
	}

	private function loadRand($min, $max, $name){
		$random = array('random' => rand($min, $max));
		if($random['random'] >= 0){
			$random['host'] = 'money-plus.gif'; 
			$random['class'] = 'plus'; 
		} else{
			$random['host'] = 'money-minus.gif';
			$random['class'] = 'minus'; 
		}
		$date = date('[m/d/Y h:i A]');

		$random['chance'] = $this->computeSession('chance',-1);
		$random['money'] = $this->computeSession('money',$random['random']);

		if($this->session->userdata('message')){
			$random['msg'] = $this->session->userdata('message');
			$random['msg'][] = "<p class= '{$random['class']}'> $date You pushed $name. Value {$random['random']}. Your current money now is {$this->session->userdata('money')} with {$this->session->userdata('chance')} </p>";
			$this->session->set_userdata('message',$random['msg']);
			return $random;
		} else{
			$random['msg'][] = "<p class= '{$random['class']}'> $date You pushed $name. Value {$random['random']}. Your current money now is {$this->session->userdata('money')} with {$this->session->userdata('chance')} </p>";
			$this->session->set_userdata('message',$random['msg']);
			return $random;
		}
	} 

	private function computeSession($name ,$value){

		if(!($this->session->userdata($name))){
			if($name == 'money'){
				$this->session->set_userdata($name, 500);
			} else {
				$this->session->set_userdata($name, 10);
			}
		}

		if($this->session->userdata($name)){
			$data = $this->session->userdata($name);
			$data += $value; 
			$this->session->set_userdata($name,$data);
			return $data;
		} 
	}
	
}
