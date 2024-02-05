<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		// $this->output->enable_profiler(TRUE);
		$this->load->model('User');
		date_default_timezone_set("Asia/Manila");
	}

	public function index()
	{
		if ($this->session->userdata('data')) {
			$this->session->unset_userdata('data');
		}
		if ($this->session->flashdata('errors')) {
			echo $this->session->flashdata('errors');
		}
		if ($this->session->flashdata('success')) {
			echo $this->session->flashdata('success');
		}
		$this->load->view('register-login');
	}

	public function profile()
	{
		if ($this->session->userdata('data')) {
			$data = array(
				'first_name' => $this->session->userdata('data')['first_name'],
				'last_name' => $this->session->userdata('data')['last_name'],
				'contact_number' => $this->session->userdata('data')['contact_number'],
				'failed_login' => $this->session->userdata('data')['failed_login']
			);
			if($data['failed_login']){
				$data['failed_login'] = date_format(date_create($data['failed_login']), "d M Y, h:i A");
			} else{
				$data['failed_login'] = 'No failed login';
			}
			$this->load->view('profile', $data);
		} else {
			redirect(base_url());
		}
	}

	public function regProcess()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]|max_length[80]|alpha');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]|max_length[80]|alpha');
		$this->form_validation->set_rules('email', 'Sign-up Email Address', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('contact_number', 'Sign-up Contact Number', 'required|exact_length[11]|is_unique[users.contact_number]');
		$this->form_validation->set_rules('password', 'Sign-up Password', 'required|min_length[8]|max_length[80]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[8]|max_length[80]|matches[password]');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url());
		} else {
			$this->User->signUp($this->input->post());
			$this->session->set_flashdata('success', "<p class = 'success'>You're Signed up!</p>");
			redirect('Success');
		}
	}

	public function logProcess()
	{
		if (is_numeric($this->input->post('email_contact'))) {
			$this->form_validation->set_rules('contact_number', 'Log-in Contact Number', 'required|exact_length[11]');
			$validate = array(
				'contact_number' => $this->input->post('email_contact'),
				'password' => $this->input->post('password')
			);
		} else {
			$this->form_validation->set_rules('email', 'Log-in Email Address', 'required|valid_email');
			$validate = array(
				'email' => $this->input->post('email_contact'),
				'password' => $this->input->post('password')
			);
		}
		$this->form_validation->set_rules('password', 'Log-in Password', 'required|min_length[8]|max_length[80]');
		$this->form_validation->set_data($validate);
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', validation_errors());
			redirect(base_url());
		} else {
			if (isset($validate['contact_number'])) {
				$data = $this->User->get_contact_user($validate);
				if ($data) {
					if ($data['password'] == $validate['password']) {
						$this->session->set_userdata('data', $data);
						redirect('users/profile');
					} else {
						$this->session->set_flashdata('errors', '<p>Wrong Password</p>');
						$this->User->failedLogin_contact($validate);
						redirect(base_url());
					}
				} else {
					$this->session->set_flashdata('errors', '<p>User Does not Exist</p>');
					redirect(base_url());
				}
			} else {
				$data = $this->User->get_email_user($validate);
				if ($data) {
					if ($data['password'] == $validate['password']) {
						$this->session->set_userdata('data', $data);
						redirect('users/profile');
					} else {
						$this->session->set_flashdata('errors', '<p>Wrong Password</p>');
						$this->User->failedLogin_email($validate);
						redirect(base_url());
					}
				} else {
					$this->session->set_flashdata('errors', '<p>User Does not Exist</p>');
					redirect(base_url());
				}
			}
		}
	}
}
