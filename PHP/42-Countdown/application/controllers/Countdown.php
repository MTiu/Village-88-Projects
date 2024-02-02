<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countdown extends CI_Controller {

	public function main()
	{
		date_default_timezone_set('Asia/Manila');
		$elapsedSeconds = 86400 -(time() - strtotime("today"));
		$day = date("F d, Y");
		$date['date'] = array(
			'seconds' => $elapsedSeconds,
			'today' => $day
		);
		$this->load->view('view',$date);
	}
}
