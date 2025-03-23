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

			'kecamatan_list' => $this->Setings_model->get_all('kecamatan'),
			'kategori_list' => $this->Setings_model->get_all('kategori'),
			'pengelola_list' => $this->User_model->get_all_users(),
			// 'pengelola_list' => $this->User_model->get_all_pengelola(),
			
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
		$deskripsi = $this->input->post('deskripsi');

		$f_id_pengelola = $this->session->userdata('role') != 'admin'
			? $this->session->userdata('user_id')
			: htmlspecialchars($this->input->post('f_id_pengelola'));
		
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

		// Proses upload beberapa foto
		$fotos = [];
		if (!empty($_FILES['foto']['name'][0])) {
			$count = count($_FILES['foto']['name']); // Hitung jumlah file yang diupload
			// Looping untuk setiap file yang diunggah
			for ($i = 0; $i < $count; $i++) {
				$_FILES['temp_file']['name']     = $_FILES['foto']['name'][$i];
				$_FILES['temp_file']['type']     = $_FILES['foto']['type'][$i];
				$_FILES['temp_file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
				$_FILES['temp_file']['error']    = $_FILES['foto']['error'][$i];
				$_FILES['temp_file']['size']     = $_FILES['foto']['size'][$i];

				// Panggil fungsi upload untuk setiap file
				$uploadData = $this->_do_upload('temp_file');
				if ($uploadData) {
					$fotos[] = $uploadData; // Simpan nama file yang berhasil diupload
				}
			}
		}

		// Jika ada file yang berhasil diunggah, simpan dalam JSON
		if (!empty($fotos)) {
			$data['foto'] = json_encode($fotos);
		}

		// Simpan data ke database
		$result = $this->Wisata_model->insert('wisata', $data);

		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal ditambahkan.');
		}
		redirect('wisata');
	}

	// Fungsi untuk upload foto
	private function _do_upload($field_name)
	{
		$config['upload_path'] = FCPATH . 'uploads/wisata/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = round(microtime(true) * 1000);

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload($field_name)) {
			$this->session->set_flashdata('error', $this->upload->display_errors());
			return false;
		}
		return $this->upload->data('file_name'); // Mengembalikan nama file yang diupload
	}

	public function edit()
	{
		$id = htmlspecialchars($this->input->post('id_wisata'));
		$nama_wisata = htmlspecialchars($this->input->post('nama_wisata'));
		$latitude = htmlspecialchars($this->input->post('latitude'));
		$longitude = htmlspecialchars($this->input->post('longitude'));
		$geojson = $this->input->post('geojson');
		$deskripsi = $this->input->post('deskripsi');

		$f_id_pengelola = $this->session->userdata('role') != 'admin'
			? $this->session->userdata('user_id')
			: htmlspecialchars($this->input->post('f_id_pengelola'));

		$kontak = htmlspecialchars($this->input->post('kontak'));
		$jam_kunjung = htmlspecialchars($this->input->post('jam_kunjung'));
		$jam_tutup = htmlspecialchars($this->input->post('jam_tutup'));
		$f_id_kecamatan = htmlspecialchars($this->input->post('f_id_kecamatan'));
		$f_id_kategori = htmlspecialchars($this->input->post('f_id_kategori'));

		// Ambil foto lama dari database
		$fotoLama = $this->Wisata_model->getWisataByIdOld($id);
		$existing_photos = json_decode($fotoLama['foto'], true) ?: [];

		// Menghapus file yang dipilih untuk dihapus
		$deleted_files = $this->input->post('deleted_files');

		if (!empty($deleted_files)) {
			foreach ($deleted_files as $value) {
				$key = array_search($value, $existing_photos);
				if ($key !== false) {
					unset($existing_photos[$key]);
					// Hapus file fisik
					if (file_exists(FCPATH . '/uploads/wisata/' . $value)) {
						unlink(FCPATH . '/uploads/wisata/' . $value);
					}
				}
			}
		}

		// Proses upload file baru
		if (isset($_FILES['foto']) && count($_FILES['foto']['name']) > 0) {
			foreach ($_FILES['foto']['name'] as $key => $filename) {
				if ($_FILES['foto']['size'][$key] > 0) {
					$_FILES['temp_file']['name'] = $_FILES['foto']['name'][$key];
					$_FILES['temp_file']['type'] = $_FILES['foto']['type'][$key];
					$_FILES['temp_file']['tmp_name'] = $_FILES['foto']['tmp_name'][$key];
					$_FILES['temp_file']['error'] = $_FILES['foto']['error'][$key];
					$_FILES['temp_file']['size'] = $_FILES['foto']['size'][$key];

					// Upload file baru
					$uploadData = $this->_do_upload('temp_file');
					$existing_photos[] = $uploadData;
				}
			}
		}

		// Simpan foto terbaru dalam bentuk JSON
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
			'f_id_kategori' => $f_id_kategori,
			'foto' => json_encode(array_values($existing_photos)) // Update foto
		];

	
		// Update data wisata
		$result = $this->Wisata_model->update('wisata', $data, "id_wisata = " . $id);

		// Cek jika tidak ada kunjungan, tambahkan entry kunjungan
		// $cek_row_kunjungan = $this->Kunjungan_model->cek_kunjungan($id);
		// if ($cek_row_kunjungan < 1) {
		// 	$kunjungan = [
		// 		'tahun' => date("Y"),
		// 		'f_id_wisata' => $id
		// 	];
		// 	$this->Kunjungan_model->insert('kunjungan', $kunjungan);
		// }

		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil diedit.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal diedit.');
		}

		redirect('wisata');
	}

	// Restore fungsi
	// public function edit()
	// {
	// 	$id = htmlspecialchars($this->input->post('id_wisata'));
	// 	$nama_wisata = htmlspecialchars($this->input->post('nama_wisata'));
	// 	$latitude = htmlspecialchars($this->input->post('latitude'));
	// 	$longitude = htmlspecialchars($this->input->post('longitude'));
	// 	$geojson = $this->input->post('geojson');
	// 	$deskripsi = htmlspecialchars($this->input->post('deskripsi'));

	// 	$f_id_pengelola = $this->session->userdata('role') != 'admin'
	// 		? $this->session->userdata('user_id')
	// 		: htmlspecialchars($this->input->post('f_id_pengelola'));

	// 	$kontak = htmlspecialchars($this->input->post('kontak'));
	// 	$jam_kunjung = htmlspecialchars($this->input->post('jam_kunjung'));
	// 	$jam_tutup = htmlspecialchars($this->input->post('jam_tutup'));
	// 	$f_id_kecamatan = htmlspecialchars($this->input->post('f_id_kecamatan'));
	// 	$f_id_kategori = htmlspecialchars($this->input->post('f_id_kategori'));

	// 	$data = [
	// 		'nama_wisata' => $nama_wisata,
	// 		'latitude' => $latitude,
	// 		'longitude' => $longitude,
	// 		'geojson' => $geojson,
	// 		'deskripsi' => $deskripsi,
	// 		'f_id_pengelola' => $f_id_pengelola,
	// 		'kontak' => $kontak,
	// 		'jam_kunjung' => $jam_kunjung,
	// 		'jam_tutup' => $jam_tutup,
	// 		'f_id_kecamatan' => $f_id_kecamatan,
	// 		'f_id_kategori' => $f_id_kategori
	// 	];

	// 	$get_data = $this->Wisata_model->get_wisata_by_id($id);

	// 	// Proses upload beberapa foto
	// 	$fotos = json_decode($get_data['foto'], true); // Ambil foto lama
	// 	if (isset($_FILES['foto']) && count($_FILES['foto']['name']) > 0) {
	// 		foreach ($_FILES['foto']['name'] as $key => $filename) {
	// 			if ($_FILES['foto']['size'][$key] > 0) {
	// 				$_FILES['temp_file']['name'] = $_FILES['foto']['name'][$key];
	// 				$_FILES['temp_file']['type'] = $_FILES['foto']['type'][$key];
	// 				$_FILES['temp_file']['tmp_name'] = $_FILES['foto']['tmp_name'][$key];
	// 				$_FILES['temp_file']['error'] = $_FILES['foto']['error'][$key];
	// 				$_FILES['temp_file']['size'] = $_FILES['foto']['size'][$key];

	// 				// Upload file baru
	// 				$uploadData = $this->_do_upload('temp_file');
	// 				$fotos[] = $uploadData;
	// 			}
	// 		}

	// 		// Hapus foto lama jika ada
	// 		if (!empty($get_data['foto'])) {
	// 			$old_fotos = json_decode($get_data['foto'], true);
	// 			foreach ($old_fotos as $old_foto) {
	// 				if (file_exists(FCPATH . 'uploads/wisata/' . $old_foto)) {
	// 					unlink(FCPATH . 'uploads/wisata/' . $old_foto);
	// 				}
	// 			}
	// 		}

	// 		$data['foto'] = json_encode($fotos); // Simpan foto baru dalam bentuk JSON
	// 	}

	// 	$result = $this->Wisata_model->update('wisata', $data, "id_wisata = " . $id);

	// 	// Cek jika tidak ada kunjungan, tambahkan entry kunjungan
	// 	$cek_row_kunjungan = $this->Kunjungan_model->cek_kunjungan($id);
	// 	if ($cek_row_kunjungan < 1) {
	// 		$kunjungan = [
	// 			'tahun' => date("Y"),
	// 			'f_id_wisata' => $id
	// 		];
	// 		$this->Kunjungan_model->insert('kunjungan', $kunjungan);
	// 	}

	// 	if ($result) {
	// 		$this->session->set_flashdata('success', 'Data berhasil diedit.');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Data gagal diedit.');
	// 	}

	// 	redirect('wisata');
	// }

	public function delete()
	{
		$id = htmlspecialchars($this->input->post('id_wisata'));

		// Dapatkan data wisata berdasarkan ID
		$current_data = $this->Wisata_model->get_wisata_by_id($id);

		// Hapus data dari database
		$result = $this->Wisata_model->delete('wisata', "id_wisata = " . $id);

		if ($result) {
			// Jika ada foto terkait, hapus dari folder
			if (!empty($current_data['foto'])) {
				$fotos = json_decode($current_data['foto'], true);
				foreach ($fotos as $foto) {
					if (file_exists(FCPATH . 'uploads/wisata/' . $foto)) {
						unlink(FCPATH . 'uploads/wisata/' . $foto);
					}
				}
			}

			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus.');
		}

		redirect('wisata');
	}

	// public function add()
	// {
	// 	$nama_wisata = htmlspecialchars($this->input->post('nama_wisata'));
	// 	$latitude = htmlspecialchars($this->input->post('latitude'));
	// 	$longitude = htmlspecialchars($this->input->post('longitude'));
	// 	$geojson = $this->input->post('geojson');
	// 	$deskripsi = htmlspecialchars($this->input->post('deskripsi'));

	// 	$f_id_pengelola = $this->session->userdata('role') != 'admin'
	// 	?$this->session->userdata('user_id')
	// 	:htmlspecialchars($this->input->post('f_id_pengelola'));
		
	// 	$kontak = htmlspecialchars($this->input->post('kontak'));
	// 	$jam_kunjung = htmlspecialchars($this->input->post('jam_kunjung'));
	// 	$jam_tutup = htmlspecialchars($this->input->post('jam_tutup'));
	// 	$f_id_kecamatan = htmlspecialchars($this->input->post('f_id_kecamatan'));
	// 	$f_id_kategori = htmlspecialchars($this->input->post('f_id_kategori'));

		
	// 	$data = [
	// 		'nama_wisata' => $nama_wisata,
	// 		'latitude' => $latitude,
	// 		'longitude' => $longitude,
	// 		'geojson' => $geojson,
	// 		'deskripsi' => $deskripsi,
	// 		'f_id_pengelola' => $f_id_pengelola,
	// 		'kontak' => $kontak,
	// 		'jam_kunjung' => $jam_kunjung,
	// 		'jam_tutup' => $jam_tutup,
	// 		'f_id_kecamatan' => $f_id_kecamatan,
	// 		'f_id_kategori' => $f_id_kategori
	// 	];
		
	// 	// Proses upload foto
	// 	if (!empty($_FILES['foto']['name'])) {
	// 		$upload = $this->_do_upload();
	// 		$data['foto'] = $upload;
	// 	}

		
	// 	$result = $this->Wisata_model->insert('wisata', $data);
		
	// 	if ($result) {
	// 		$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Data gagal ditambahkan.');
	// 	}
	// 	redirect('wisata');
	// }

	// public function edit()
	// {
	// 	$id = htmlspecialchars($this->input->post('id_wisata'));
	// 	$nama_wisata = htmlspecialchars($this->input->post('nama_wisata'));
	// 	$latitude = htmlspecialchars($this->input->post('latitude'));
	// 	$longitude = htmlspecialchars($this->input->post('longitude'));
	// 	$geojson = $this->input->post('geojson');
	// 	$deskripsi = htmlspecialchars($this->input->post('deskripsi'));

	// 	if($this->input->post('f_id_pengelola') == null){
	// 		$f_id_pengelola = $this->session->userdata('user_id');
	// 	}else{
	// 		$f_id_pengelola = $this->session->userdata('role') != 'admin'
	// 		?$this->session->userdata('user_id')
	// 		:htmlspecialchars($this->input->post('f_id_pengelola'));
	// 	}

	// 	$kontak = htmlspecialchars($this->input->post('kontak'));
	// 	$jam_kunjung = htmlspecialchars($this->input->post('jam_kunjung'));
	// 	$jam_tutup = htmlspecialchars($this->input->post('jam_tutup'));
	// 	$f_id_kecamatan = htmlspecialchars($this->input->post('f_id_kecamatan'));
	// 	$f_id_kategori = htmlspecialchars($this->input->post('f_id_kategori'));

	// 	$data = [
	// 		'nama_wisata' => $nama_wisata,
	// 		'latitude' => $latitude,
	// 		'longitude' => $longitude,
	// 		'geojson' => $geojson,
	// 		'deskripsi' => $deskripsi,
	// 		'f_id_pengelola' => $f_id_pengelola,
	// 		'kontak' => $kontak,
	// 		'jam_kunjung' => $jam_kunjung,
	// 		'jam_tutup' => $jam_tutup,
	// 		'f_id_kecamatan' => $f_id_kecamatan,
	// 		'f_id_kategori' => $f_id_kategori
	// 	];

	// 	$get_data['wisata'] = $this->Wisata_model->get_wisata_by_id($id);
		
	// 	// Cek apakah ada gambar baru yang diupload
	// 	if (!empty($_FILES['foto']['name'])) {
	// 		$upload = $this->_do_upload();
	// 		$data['foto'] = $upload;

	// 		// Hapus foto lama jika ada
	// 		if ($get_data['wisata']['foto'] != '') {
	// 			unlink(FCPATH . 'uploads/wisata/' . $get_data['wisata']['foto']);
	// 		}
	// 	}

	// 	$result = $this->Wisata_model->update('wisata', $data, "id_wisata = " . $id);

	// 	$cek_row_kunjungan = $this->Kunjungan_model->cek_kunjungan($id);
		
	// 	if($cek_row_kunjungan < 1){
	// 		$kunjungan = [
	// 			'tahun' => date("Y"),
	// 			'f_id_wisata' => $id
	// 		];
	// 		$result = $this->Kunjungan_model->insert('kunjungan', $kunjungan);
	// 	}

	// 	if ($result) {
	// 		$this->session->set_flashdata('success', 'Data berhasil diedit.');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Data gagal diedit.');
	// 	}

	// 	redirect('wisata');
	// }

	// public function delete()
	// {
	// 	$id = htmlspecialchars($this->input->post('id_wisata'));

	// 	// Get the current data to find the image associated with the record
	// 	$current_data = $this->Wisata_model->get_wisata_by_id($id);
	// 	$current_image = $current_data['foto']; // Assuming 'foto' is the image field

	// 	// Delete the record from the database
	// 	$result = $this->Wisata_model->delete('wisata', "id_wisata = " . $id);

	// 	if ($result) {
	// 		// If the deletion is successful, unlink (delete) the associated image file
	// 		if (!empty($current_image) && file_exists(FCPATH . 'uploads/wisata/' . $current_image)) {
	// 			unlink(FCPATH . 'uploads/wisata/' . $current_image);
	// 		}

	// 		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
	// 	} else {
	// 		$this->session->set_flashdata('error', 'Data gagal dihapus.');
	// 	}

	// 	redirect('wisata');
	// }

	// Fungsi untuk upload foto
	// private function _do_upload()
	// {
	// 	$config['upload_path'] = FCPATH . 'uploads/wisata/';
	// 	$config['allowed_types'] = 'gif|jpg|png|jpeg';
	// 	$config['file_name'] = round(microtime(true) * 1000);

	// 	$this->load->library('upload', $config);

	// 	if (!$this->upload->do_upload('foto')) {
	// 		$this->session->set_flashdata('error', $this->upload->display_errors());
	// 		redirect('wisata/add');
	// 	}
	// 	return $this->upload->data('file_name');
	// }


	
}