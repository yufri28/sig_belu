<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FasilitasPendukung extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		// Check if the user is logged in
		if (!$this->session->userdata('logged_in')) {
			// If not logged in, redirect to login page
			redirect('auth/login');
		}
        $this->load->model('Wisata_model');
        $this->load->model('Fasilitas_model');
		
    }
	
	public function index()
	{
		$data = [
			'menu' => 'pendukung',
			'wisata_list' => $this->session->userdata("role") == 'admin'
			?$this->Wisata_model->get_all('wisata')
			:$this->Wisata_model->get_all('wisata', $this->session->userdata('user_id')),
			
			'fasilitas_list' => $this->session->userdata("role") == 'admin'
			?$this->Fasilitas_model->get_all_join()
			:$this->Fasilitas_model->get_all_join($this->session->userdata('user_id')),
		];
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/pendukung/index');
		$this->load->view('admin/templates/footer');
	}

	// CRUD
	public function add()
	{
		$f_id_wisata = htmlspecialchars($this->input->post('f_id_wisata'));
		$nama_fasilitas = htmlspecialchars($this->input->post('nama_fasilitas'));
		$latitude = htmlspecialchars($this->input->post('latitude'));
		$longitude = htmlspecialchars($this->input->post('longitude'));
		$keterangan = $this->input->post('keterangan');
		$tarif = htmlspecialchars($this->input->post('tarif'));
		

		
		$data = [
			'f_id_wisata' => $f_id_wisata,
			'nama_fasilitas' => $nama_fasilitas,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'keterangan' => $keterangan,
			'tarif' => $tarif
		];
		
		// Proses upload foto
		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;
		}

		
		$result = $this->Fasilitas_model->insert('fasilitas_wisata', $data);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal ditambahkan.');
		}
		redirect('fasilitaspendukung');
	}

	public function edit()
	{
		$id = htmlspecialchars($this->input->post('id_fasilitas_wisata'));
		$f_id_wisata = htmlspecialchars($this->input->post('f_id_wisata'));
		$nama_fasilitas = htmlspecialchars($this->input->post('nama_fasilitas'));
		$latitude = htmlspecialchars($this->input->post('latitude'));
		$longitude = htmlspecialchars($this->input->post('longitude'));
		$keterangan = $this->input->post('keterangan');
		$tarif = htmlspecialchars($this->input->post('tarif'));

		$data = [
			'f_id_wisata' => $f_id_wisata,
			'nama_fasilitas' => $nama_fasilitas,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'keterangan' => $keterangan,
			'tarif' => $tarif
		];

		$get_data['fasilitas'] = $this->Fasilitas_model->get_fasilitas_by_id($id);
		
		// Cek apakah ada gambar baru yang diupload
		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;

			// Hapus foto lama jika ada
			if ($get_data['fasilitas']['foto'] != '') {
				unlink(FCPATH . 'uploads/fasilitas/' . $get_data['fasilitas']['foto']);
			}
		}

		$result = $this->Fasilitas_model->update('fasilitas_wisata', $data, "id_fasilitas_wisata = " . $id);

		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil diedit.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diedit.');
		}

		redirect('fasilitaspendukung');
	}

	public function delete()
	{
		$id = htmlspecialchars($this->input->post('id_fasilitas_wisata'));

		// Get the current data to find the image associated with the record
		$current_data = $this->Fasilitas_model->get_fasilitas_by_id($id);
		$current_image = $current_data['foto']; // Assuming 'foto' is the image field

		// Delete the record from the database
		$result = $this->Fasilitas_model->delete('fasilitas_wisata', "id_fasilitas_wisata = " . $id);

		if ($result) {
			// If the deletion is successful, unlink (delete) the associated image file
			if (!empty($current_image) && file_exists(FCPATH . 'uploads/fasilitas/' . $current_image)) {
				unlink(FCPATH . 'uploads/fasilitas/' . $current_image);
			}

			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus.');
		}

		redirect('fasilitaspendukung');
	}

	// Fungsi untuk upload foto
	private function _do_upload()
	{
		$config['upload_path'] = FCPATH . 'uploads/fasilitas/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = round(microtime(true) * 1000);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('fasilitaspendukung/add');
		}
		return $this->upload->data('file_name');
	}
}