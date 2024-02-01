<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		echo "This is the Main Class";
	}
	public function hello(){
		echo "Hello World";
	}
	public function say(){
		echo 'HI';
	}
	public function say_anything($word){
		echo strtoupper($word);
	}
	public function danger(){
		redirect('/main');
	}
}

