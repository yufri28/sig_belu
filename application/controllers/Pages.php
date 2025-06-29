<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Visitor');
        $this->load->model('Wisata_model');
        $this->load->model('Kunjungan_model');
        $this->load->model('Fasilitas_model');
        $this->load->model('Larangan_model');
        $this->load->model('Ulasan_model');
        $this->load->model('Contact_model');
		$this->visitor->track();
	}
    
	public function index()
	{
		$data = [
			'menu' => 'beranda',
			'wisata_list' => $this->Wisata_model->get_all_join(),
			'destinasi_terpopuler' => $this->Kunjungan_model->get_top_5_destinasi() // Ambil 5 destinasi terpopuler
		]; 
		$this->load->view('pages_template/header', $data);
		$this->load->view('index');
		$this->load->view('pages_template/footer');
	}

	public function tempat_wisata()
	{
		$data = [
            'menu' => 'tempat_wisata',
            'wisata_list' => $this->Wisata_model->get_group_wisata_by_kategori(),
        ]; 
         
		$this->load->view('pages_template/header', $data);
		$this->load->view('tempat_wisata');
		$this->load->view('pages_template/footer');
	}

	public function kontak()
	{
		$data = [
			'menu' => 'kontak',
			'contact' => $this->Contact_model->get_contact_info()
        ]; 
         
		$this->load->view('pages_template/header', $data);
		$this->load->view('kontak');
		$this->load->view('pages_template/footer');
	}

    public function detail_wisata($id)
	{
		$data = [
			'wisata_list' => $this->Wisata_model->get_all_join(),
            'menu' => 'detail_wisata',
            'wisata' => $this->Wisata_model->get_wisata_by_id($id),
            'fasilitas_list' => $this->Fasilitas_model->get_all_join_by_id($id),
            'larangan_list' => $this->Larangan_model->get_all_join_by_id($id),
            'ulasan' => $this->Ulasan_model->get_comments_with_replies($id),
        ]; 
         
		$this->load->view('pages_template/header', $data);
		$this->load->view('detail_wisata');
		$this->load->view('pages_template/footer');
	}

}