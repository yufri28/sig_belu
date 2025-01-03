<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	// Login function
	public function login()
	{
		// If already logged in, redirect to dashboard
		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}

		if ($this->input->post()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Check credentials
			$user = $this->Auth_model->get_user($username);

			if ($user && password_verify($password, $user['password'])) {
				// Successful login
				$session_data = [
					'user_id' => $user['id_admin'],
					'username' => $user['username'],
					'role' => $user['role'],
					'logged_in' => TRUE
				];
				$this->session->set_userdata($session_data);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('error', 'Invalid username or password.');
				redirect('auth/login');
			}
		}

		$this->load->view('admin/auth/login');
	}

	// Logout function
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}

	// Automatically generate an admin user if it does not exist
	private function generate_admin()
	{
		// Check if the admin already exists
		$admin_exists = $this->Auth_model->get_user('supportadmin');

		if (!$admin_exists) {
			// If not, create it with the default password
			$data = [
				'username' => 'supportadmin',
				'password' => password_hash('cobasuperadmin', PASSWORD_DEFAULT), // Hash the password
				'role' => 'admin'
			];
			$this->Auth_model->create_user($data);
		}
	}

	// Call this in the constructor to ensure admin generation happens when the controller is loaded
	public function index()
	{
		$this->generate_admin(); // Ensure the admin user is generated if it does not exist
		$this->login(); // Redirect to login
	}
}