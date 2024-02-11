<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->output->enable_profiler(TRUE);
	}

	public function index()
	{
		if ($this->session->flashdata('errors')) {
			$data = $this->session->flashdata('errors');
			$this->load->view('template/access-header', $data);
			$this->load->view('users/login', $data);
		} else {
			$data['access'] = 'register';
			$this->load->view('template/access-header', $data);
			$this->load->view('users/login', $data);
		}
	}

	public function register()
	{
		if ($this->session->flashdata('errors')) {
			$data = $this->session->flashdata('errors');
			$this->load->view('template/access-header', $data);
			$this->load->view('users/register', $data);
		} else {
			$data['access'] = 'login';
			$this->load->view('template/access-header', $data);
			$this->load->view('users/register', $data);
		}
	}

	public function regProcess()
	{
		$access['validation'] = $this->User->validate_register();
		$access['access'] = 'login';

		if ($access['validation'] != 'success') {
			$this->session->set_flashdata('errors', $access);
			redirect('register');
		}
		$this->User->register($this->input->post());
		$user_id = $this->User->get_user_id($this->input->post('email'));
		$this->session->set_userdata('user_id', $user_id);
		redirect('Dashboard');
	}

	public function loginProcess()
	{
		$access['validation'] = $this->User->validate_login();
		$access['access'] = 'register';

		if ($access['validation'] != 'success') {
			$this->session->set_flashdata('errors', $access);
			redirect('/');
		}
		$user = $this->User->get_user_id($this->input->post('email'));
		$password = $this->input->post('password');
		$validation = $this->User->validate_password($user['user_id'], $password);

		if ($validation) {
			if ($user['user_id'] == 1) {
				$this->session->set_userdata('admin', 'yes');
				$this->session->set_userdata('user_id', $user['user_id']);
				$this->session->set_userdata('user_pass', $this->input->post('password'));
				redirect('Dashboard');
			}
			$this->session->set_userdata('user_id', $user['user_id']);
			redirect('Dashboard');
		}

		$access['validation'] = array(
			'email' => "<span class='error'>Password/Email wrong",
			'password' => "<span class='error'>Password/Email wrong"
		);
		$this->session->set_flashdata('errors', $access);
		redirect('/');
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('Users');
	}

	public function edit()
	{
		if ($this->session->flashdata('errors')) {
			$data = $this->session->flashdata('errors');
			$data['data'] = $this->User->get_user_info($this->session->userdata('user_id'));
			$this->load->view('template/dashboard-header');
			$this->load->view('users/user-profile', $data);
		} else {
			$data['data'] = $this->User->get_user_info($this->session->userdata('user_id'));
			$data['success'] = $this->session->flashdata('success');
			$this->load->view('template/dashboard-header');
			$this->load->view('users/user-profile', $data);
		}
	}

	public function editProcess()
	{
		$access['validation'] = $this->User->validate_edit_info();
		if ($access['validation'] == 'success') {
			$this->User->edit_user_info($this->session->userdata('user_id'), $this->input->post());
			redirect('users/edit');
		}
		$this->session->set_flashdata('errors', $access);
		redirect('users/edit');
	}

	public function changePassword()
	{
		$access['validation'] = $this->User->validate_change_password();
		if ($access['validation'] != 'success') {
			$this->session->set_flashdata('errors', $access);
			redirect('users/edit');
			if ($this->session->userdata('user_pass') != $this->input->post('old-password')) {
				$access['validation'] = array(
					'old-password' => "<span class='error'>Old Password wrong</span>",
					'new-password' => form_error('new-password'),
					'conf-password' => form_error('conf-password'),
				);
				$this->session->set_flashdata('errors', $access);
				redirect('users/edit');
			}
		} else {
			$this->User->edit_user_password($this->session->userdata('user_id'),$this->input->post());
			$this->session->set_flashdata('success', "<p class= 'success'>Successfully Changed Password</p>");
			redirect('users/edit');
		}
	}
}
