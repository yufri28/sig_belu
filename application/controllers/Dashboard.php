<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// Check if the user is logged in
		if (!$this->session->userdata('logged_in')) {
			// If not logged in, redirect to login page
			redirect('auth/login');
		}
		
        $this->load->model('Wisata_model');
        $this->load->model('Kunjungan_model');
		$this->load->model('Visitors_model');
	}

	public function index()
	{
		$data = [
			'menu' => 'dashboard',
			'sum_kunjungan' => $this->session->userdata("role") == 'admin'
			?$this->Kunjungan_model->count_all_kunjungan()
			:$this->Kunjungan_model->count_all_kunjungan($this->session->userdata('user_id')),

			'sum_wisata' => $this->session->userdata("role") == 'admin'
			?$this->Wisata_model->count_all_wisata()
			:$this->Wisata_model->count_all_wisata($this->session->userdata('user_id')),
			
			'jumlah_kunjungan' => $this->session->userdata("role") == 'admin'
			?$this->get_kunjungan_data()
			:$this->get_kunjungan_data($this->session->userdata('user_id')),
		];

		// Get visitor statistics
        $data['today_visitors'] = $this->Visitors_model->get_today_visitors();
        $data['month_visitors'] = $this->Visitors_model->get_month_visitors();
        $data['year_visitors'] = $this->Visitors_model->get_year_visitors();
        $data['total_visitors'] = $this->Visitors_model->get_total_visitors();
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/index');
		$this->load->view('admin/templates/footer');	
		$this->load->view('admin/templates/wisata_js');
	}
	
	// Function untuk mengambil data kunjungan per bulan
    public function get_kunjungan_data($id = null) {
        $data = $this->Kunjungan_model->get_kunjungan_per_bulan($id);
        return json_encode($data);
    }
}