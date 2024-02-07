<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Billings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Billing');
	}
	public function index()
	{
		$data['data']=$this->Billing->returnBills();
		$this->load->view('Client-Bills',$data);
	}
}
