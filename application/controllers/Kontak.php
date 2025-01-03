<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Contact_model');
        // Check if the user is logged in
		if (!$this->session->userdata('logged_in')) {
			// If not logged in, redirect to login page
			redirect('auth/login');
		}
    }

    public function index() {

        // Ambil data kontak dari model
        $data = [
            'menu' => 'kontak',
            'contact' => $this->Contact_model->get_contact_info()
        ]; 
        // Tampilkan halaman view
        $this->load->view('pages_template/header', $data);
        $this->load->view('contact_preview');
        $this->load->view('pages_template/footer');
    }

    public function update() {
        
        // Data dari form (AJAX request)
        $data = array(
            'email'   => $this->input->post('email'),
            'telepon' => $this->input->post('telepon'),
            'alamat'  => $this->input->post('alamat')
        );

        // Update data kontak
        if ($this->Contact_model->update_contact_info($data)) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diperbarui'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Gagal memperbarui data'));
        }
    }
}
?>