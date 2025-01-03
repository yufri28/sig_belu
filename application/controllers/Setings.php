<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Setings_model');
    }

    public function index()
    {
        $data['menu'] = 'setings';
        $data['kecamatan'] = $this->Setings_model->get_all('kecamatan');
        $data['kategori'] = $this->Setings_model->get_all('kategori');

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/setings/index', $data);
        $this->load->view('admin/templates/footer');
    }

    // Kecamatan CRUD
	public function addKecamatan()
	{
		$kecamatan = htmlspecialchars($this->input->post('kecamatan'));
		$result = $this->Setings_model->insert('kecamatan', ['nama_kecamatan' => $kecamatan]);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal ditambahkan.');
		}
		redirect('setings');
	}
	

	public function editKecamatan()
	{
		$kecamatan = htmlspecialchars($this->input->post('kecamatan'));
		$id = htmlspecialchars($this->input->post('id'));
	
		$result = $this->Setings_model->update('kecamatan', ['nama_kecamatan' => $kecamatan], "id_kecamatan = ".$id);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil diedit.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diedit.');
		}
		redirect('setings');
	}
	

	public function deleteKecamatan()
	{
		$id = htmlspecialchars($this->input->post('id'));
	
		$result = $this->Setings_model->delete('kecamatan', "id_kecamatan = ".$id);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus.');
		}
		redirect('setings');
	}
	

    // Kategori CRUD
	public function addKategori()
	{
		$kategori = htmlspecialchars($this->input->post('kategori'));
		$result = $this->Setings_model->insert('kategori', ['nama_kategori' => $kategori]);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal ditambahkan.');
		}
		redirect('setings');
	}
	

    public function editKategori()
	{
		$kategori = htmlspecialchars($this->input->post('kategori'));
		$id = htmlspecialchars($this->input->post('id'));

		$result = $this->Setings_model->update('kategori', ['nama_kategori' => $kategori], "id_kategori = ".$id);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil diedit.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diedit.');
		}
		redirect('setings');
	}


	public function deleteKategori()
	{
		$id = htmlspecialchars($this->input->post('id'));

		$result = $this->Setings_model->delete('kategori', "id_kategori = ".$id);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus.');
		}
		redirect('setings');
	}

}