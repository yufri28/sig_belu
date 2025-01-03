<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

	public function index()
	{
		$data['menu'] = 'users';
		$data['users'] = $this->User_model->get_all_users();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/users/index');
		$this->load->view('admin/templates/footer');
		$this->load->view('admin/templates/wisata_js');
	}

	public function tambah_user() {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role' => 'pengelola'
        ];
        
        $result = $this->User_model->insert_user($data);

        if ($result) {
            $this->session->set_flashdata('success', 'User berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan user.');
        }
        redirect('users');
    }

    public function edit_user($id_admin) {
        $data = [
            'username' => $this->input->post('username')
        ];
        if ($this->input->post('password')) {
            $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        }

        $result =  $this->User_model->update_user($id_admin, $data);

        if ($result) {
            $this->session->set_flashdata('success', 'User berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui user.');
        }
        redirect('users');
    }

    public function hapus_user($id_admin) {
        $result = $this->User_model->delete_user($id_admin);

		if ($result) {
            $this->session->set_flashdata('success', 'User berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user.');
        }
        redirect('users');
    }
}