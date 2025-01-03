<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		// Check if the user is logged in
		if (!$this->session->userdata('logged_in')) {
			// If not logged in, redirect to login page
			redirect('auth/login');
		}
        $this->load->model('Setings_model');
        $this->load->model('Wisata_model');
        $this->load->model('Kunjungan_model');
        $this->load->model('User_model');
		
    }

	public function index()
	{
		$data = [
 			'menu' => 'wisata',
			'wisata_list' => $this->session->userdata("role") == 'admin'
			?$this->Wisata_model->get_all_join()
			:$this->Wisata_model->get_all_join($this->session->userdata('user_id')),
			
			'wisata_isnull_list' => $this->session->userdata("role") == 'admin'
			?$this->Wisata_model->get_join_isnull()
			:$this->Wisata_model->get_join_isnull($this->session->userdata('user_id')),
			
			'jumlah_kunjungan' => $this->session->userdata("role") == 'admin'
			?$this->get_kunjungan_data()
			:$this->get_kunjungan_data($this->session->userdata('user_id')),

			'kunjungan_list' => $this->session->userdata("role") == 'admin'
			?$this->Kunjungan_model->get_kunjungan()
			:$this->Kunjungan_model->get_kunjungan($this->session->userdata('user_id')),

			'kecamatan_list' => $this->Setings_model->get_all('kecamatan'),
			'kategori_list' => $this->Setings_model->get_all('kategori'),
			'pengelola_list' => $this->User_model->get_all_pengelola(),
			
		];
		
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/wisata/index');
		$this->load->view('admin/templates/footer');
		$this->load->view('admin/templates/wisata_js');
	}

	// Function untuk mengambil data kunjungan per bulan
    public function get_kunjungan_data($id = null) {
        $data = $this->Kunjungan_model->get_kunjungan_per_bulan($id);
        return json_encode($data);
    }

	// CRUD
	public function add()
	{
		$nama_wisata = htmlspecialchars($this->input->post('nama_wisata'));
		$latitude = htmlspecialchars($this->input->post('latitude'));
		$longitude = htmlspecialchars($this->input->post('longitude'));
		$geojson = $this->input->post('geojson');
		$deskripsi = htmlspecialchars($this->input->post('deskripsi'));

		$f_id_pengelola = $this->session->userdata('role') != 'admin'
		?$this->session->userdata('user_id')
		:htmlspecialchars($this->input->post('f_id_pengelola'));
		
		$kontak = htmlspecialchars($this->input->post('kontak'));
		$jam_kunjung = htmlspecialchars($this->input->post('jam_kunjung'));
		$jam_tutup = htmlspecialchars($this->input->post('jam_tutup'));
		$f_id_kecamatan = htmlspecialchars($this->input->post('f_id_kecamatan'));
		$f_id_kategori = htmlspecialchars($this->input->post('f_id_kategori'));

		
		$data = [
			'nama_wisata' => $nama_wisata,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'geojson' => $geojson,
			'deskripsi' => $deskripsi,
			'f_id_pengelola' => $f_id_pengelola,
			'kontak' => $kontak,
			'jam_kunjung' => $jam_kunjung,
			'jam_tutup' => $jam_tutup,
			'f_id_kecamatan' => $f_id_kecamatan,
			'f_id_kategori' => $f_id_kategori
		];
		
		// Proses upload foto
		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;
		}

		
		$result = $this->Wisata_model->insert('wisata', $data);
		
		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal ditambahkan.');
		}
		redirect('wisata');
	}

	public function edit()
	{
		$id = htmlspecialchars($this->input->post('id_wisata'));
		$nama_wisata = htmlspecialchars($this->input->post('nama_wisata'));
		$latitude = htmlspecialchars($this->input->post('latitude'));
		$longitude = htmlspecialchars($this->input->post('longitude'));
		$geojson = $this->input->post('geojson');
		$deskripsi = htmlspecialchars($this->input->post('deskripsi'));

		$f_id_pengelola = $this->session->userdata('role') != 'admin'
		?$this->session->userdata('user_id')
		:htmlspecialchars($this->input->post('f_id_pengelola'));

		$kontak = htmlspecialchars($this->input->post('kontak'));
		$jam_kunjung = htmlspecialchars($this->input->post('jam_kunjung'));
		$jam_tutup = htmlspecialchars($this->input->post('jam_tutup'));
		$f_id_kecamatan = htmlspecialchars($this->input->post('f_id_kecamatan'));
		$f_id_kategori = htmlspecialchars($this->input->post('f_id_kategori'));

		$data = [
			'nama_wisata' => $nama_wisata,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'geojson' => $geojson,
			'deskripsi' => $deskripsi,
			'f_id_pengelola' => $f_id_pengelola,
			'kontak' => $kontak,
			'jam_kunjung' => $jam_kunjung,
			'jam_tutup' => $jam_tutup,
			'f_id_kecamatan' => $f_id_kecamatan,
			'f_id_kategori' => $f_id_kategori
		];

		$get_data['wisata'] = $this->Wisata_model->get_wisata_by_id($id);
		
		// Cek apakah ada gambar baru yang diupload
		if (!empty($_FILES['foto']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;

			// Hapus foto lama jika ada
			if ($get_data['wisata']['foto'] != '') {
				unlink(FCPATH . 'uploads/wisata/' . $get_data['wisata']['foto']);
			}
		}

		$result = $this->Wisata_model->update('wisata', $data, "id_wisata = " . $id);

		$cek_row_kunjungan = $this->Kunjungan_model->cek_kunjungan($id);
		
		if($cek_row_kunjungan < 1){
			$kunjungan = [
				'tahun' => date("Y"),
				'f_id_wisata' => $id
			];
			$result = $this->Kunjungan_model->insert('kunjungan', $kunjungan);
		}

		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil diedit.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diedit.');
		}

		redirect('wisata');
	}

	public function delete()
	{
		$id = htmlspecialchars($this->input->post('id_wisata'));

		// Get the current data to find the image associated with the record
		$current_data = $this->Wisata_model->get_wisata_by_id($id);
		$current_image = $current_data['foto']; // Assuming 'foto' is the image field

		// Delete the record from the database
		$result = $this->Wisata_model->delete('wisata', "id_wisata = " . $id);

		if ($result) {
			// If the deletion is successful, unlink (delete) the associated image file
			if (!empty($current_image) && file_exists(FCPATH . 'uploads/wisata/' . $current_image)) {
				unlink(FCPATH . 'uploads/wisata/' . $current_image);
			}

			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus.');
		}

		redirect('wisata');
	}

	// Fungsi untuk upload foto
	private function _do_upload()
	{
		$config['upload_path'] = FCPATH . 'uploads/wisata/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = round(microtime(true) * 1000);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('wisata/add');
		}
		return $this->upload->data('file_name');
	}


	
}