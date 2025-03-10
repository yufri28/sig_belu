<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TandaLarangan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		// Check if the user is logged in
		if (!$this->session->userdata('logged_in')) {
			// If not logged in, redirect to login page
			redirect('auth/login');
		}
        $this->load->model('Wisata_model');
        $this->load->model('Larangan_model');
		
    }
	
	public function index()
	{
		$data = [
			'menu' => 'larangan',
			'wisata_list' => $this->session->userdata("role") == 'admin'
			?$this->Wisata_model->get_all('wisata')
			:$this->Wisata_model->get_all('wisata', $this->session->userdata('user_id')),
			
			'larangan_list' => $this->session->userdata("role") == 'admin'
			?$this->Larangan_model->get_all_join()
			:$this->Larangan_model->get_all_join($this->session->userdata('user_id')),
		];
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/larangan/index');
		$this->load->view('admin/templates/footer');
	}

	// CRUD
	public function add()
	{
		$f_id_wisata = htmlspecialchars($this->input->post('f_id_wisata'));
		$nama_larangan = htmlspecialchars($this->input->post('nama_larangan'));
		$latitude = htmlspecialchars($this->input->post('latitude'));
		$longitude = htmlspecialchars($this->input->post('longitude'));
		$keterangan = $this->input->post('keterangan');
		$tarif = htmlspecialchars($this->input->post('tarif'));
		

		
		$data = [
			'f_id_wisata' => $f_id_wisata,
			'nama_larangan' => $nama_larangan,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'keterangan' => $keterangan
		];
		
		// Proses upload foto
		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;
		}

		
		$result = $this->Larangan_model->insert('tanda_larangan', $data);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal ditambahkan.');
		}
		redirect('tandalarangan');
	}

	public function edit()
	{
		$id = htmlspecialchars($this->input->post('id_larangan'));
		$f_id_wisata = htmlspecialchars($this->input->post('f_id_wisata'));
		$nama_larangan = htmlspecialchars($this->input->post('nama_larangan'));
		$latitude = htmlspecialchars($this->input->post('latitude'));
		$longitude = htmlspecialchars($this->input->post('longitude'));
		$keterangan = $this->input->post('keterangan');

		$data = [
			'f_id_wisata' => $f_id_wisata,
			'nama_larangan' => $nama_larangan,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'keterangan' => $keterangan
		];

		$get_data['larangan'] = $this->Larangan_model->get_larangan_by_id($id);
		
		// Cek apakah ada gambar baru yang diupload
		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;

			// Hapus foto lama jika ada
			if ($get_data['larangan']['foto'] != '') {
				unlink(FCPATH . 'uploads/larangan/' . $get_data['larangan']['foto']);
			}
		}

		$result = $this->Larangan_model->update('tanda_larangan', $data, "id_larangan = " . $id);

		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil diedit.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diedit.');
		}

		redirect('tandalarangan');
	}

	public function delete()
	{
		$id = htmlspecialchars($this->input->post('id_larangan'));

		// Get the current data to find the image associated with the record
		$current_data = $this->Larangan_model->get_larangan_by_id($id);
		$current_image = $current_data['foto']; // Assuming 'foto' is the image field

		// Delete the record from the database
		$result = $this->Larangan_model->delete('tanda_larangan', "id_larangan = " . $id);

		if ($result) {
			// If the deletion is successful, unlink (delete) the associated image file
			if (!empty($current_image) && file_exists(FCPATH . 'uploads/larangan/' . $current_image)) {
				unlink(FCPATH . 'uploads/larangan/' . $current_image);
			}

			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus.');
		}

		redirect('tandalarangan');
	}

	// Fungsi untuk upload foto
	private function _do_upload()
	{
		$config['upload_path'] = FCPATH . 'uploads/larangan/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = round(microtime(true) * 1000);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('tandalarangan/add');
		}
		return $this->upload->data('file_name');
	}
}