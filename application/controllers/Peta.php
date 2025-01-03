<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('Wisata_model');
        $this->load->model('Fasilitas_model');
	}
	
	public function index()
	{
		$data = [
			'menu' => 'peta',
			'wisata_list' => $this->session->userdata("role") == 'admin'
			?$this->Wisata_model->get_all_join()
			:$this->Wisata_model->get_all_join($this->session->userdata('user_id')),
		];
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/peta/index');
		$this->load->view('admin/templates/footer');
	}
}