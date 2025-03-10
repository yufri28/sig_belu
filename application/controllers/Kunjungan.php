<?php 
class Kunjungan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kunjungan_model');  // Pastikan model sudah dibuat
        $this->load->model('Wisata_model');  // Pastikan model sudah dibuat
    }

    public function index()
    {
        // Ambil daftar tahun unik dari tabel kunjungan
        $query = "SELECT DISTINCT YEAR(tanggal) as tahun FROM kunjungan ORDER BY tahun DESC";
        $tahun_list = $this->db->query($query)->result_array();

        $data = [
            'menu' => 'kunjungan',
            'jumlah_kunjungan' => $this->session->userdata("role") == 'admin'
                ? $this->get_kunjungan_data()
                : $this->get_kunjungan_data($this->session->userdata('user_id')),

            'wisata_list' => $this->session->userdata("role") == 'admin'
                ? $this->Wisata_model->get_all_join()
                : $this->Wisata_model->get_all_join($this->session->userdata('user_id')),

            'wisata_isnull_list' => $this->session->userdata("role") == 'admin'
                ? $this->Wisata_model->get_join_isnull()
                : $this->Wisata_model->get_join_isnull($this->session->userdata('user_id')),

            'kunjungan_list' => $this->session->userdata("role") == 'admin'
                ? $this->Kunjungan_model->get_kunjungan()
                : $this->Kunjungan_model->get_kunjungan($this->session->userdata('user_id')),

            'tahun_list' => $tahun_list // Tambahkan daftar tahun untuk digunakan di select option
        ];

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/kunjungan/index');
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/wisata_js');
    }

    public function filter($tahun = null) {
        
        // Ambil kembali daftar tahun unik
        $query = "SELECT DISTINCT YEAR(tanggal) as tahun FROM kunjungan ORDER BY tahun DESC";
        $tahun_list = $this->db->query($query)->result_array();
    
        $data = [
            'kunjungan_list' => $this->session->userdata("role") == 'admin'
                ? $this->Kunjungan_model->get_kunjungan(null, $tahun)
                : $this->Kunjungan_model->get_kunjungan($this->session->userdata('user_id'),$tahun),
            'tahun_list' => $tahun_list,
            'menu' => 'kunjungan', // Pastikan data menu tetap disertakan
            'jumlah_kunjungan' => $this->session->userdata("role") == 'admin'
                ? $this->get_kunjungan_data(null, $tahun)
                : $this->get_kunjungan_data($this->session->userdata('user_id'),$tahun),
    
            'wisata_list' => $this->session->userdata("role") == 'admin'
                ? $this->Wisata_model->get_all_join()
                : $this->Wisata_model->get_all_join($this->session->userdata('user_id')),
    
            'wisata_isnull_list' => $this->session->userdata("role") == 'admin'
                ? $this->Wisata_model->get_join_isnull()
                : $this->Wisata_model->get_join_isnull($this->session->userdata('user_id'))
        ];
    
        // Gunakan view yang sama dengan index
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/kunjungan/index');
        $this->load->view('admin/templates/footer');
        $this->load->view('admin/templates/wisata_js');
    }
    
    

    // Function untuk mengambil data kunjungan per bulan
    public function get_kunjungan_data($id = null, $tahun = null) {
        $data = $this->Kunjungan_model->get_kunjungan_per_bulan($id, $tahun);
        return json_encode($data);
    }

    // Function untuk menambah data kunjungan
    public function add() {
        // Ambil data dari form
        $id_wisata = $this->input->post('id_wisata');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');

        // Cek apakah ada data yang sama (tanggal dan f_id_wisata) di database
        $existing_data = $this->Kunjungan_model->get_existing_data($id_wisata, $tanggal);

        if ($existing_data) {
            // Jika data sudah ada, munculkan pesan bahwa data sudah ada
            $this->session->set_flashdata('error', 'Data kunjungan untuk wisata tersebut pada tanggal tersebut sudah ada!');
        } else {
            // Jika tidak ada data yang sama, simpan data baru
            $kunjungan_data = array(
                'f_id_wisata' => $id_wisata,
                'tanggal' => $tanggal,
                'jumlah' => $jumlah,
            );

            // Simpan data ke database
            $insert = $this->Kunjungan_model->insert('kunjungan', $kunjungan_data);

            // Redirect atau tampilkan pesan sukses/gagal
            if ($insert) {
                $this->session->set_flashdata('success', 'Data kunjungan berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan data kunjungan!');
            }
        }

        redirect('kunjungan');
    }

    // Function untuk menyimpan edit data kunjungan
    public function edit() {
        // Ambil data dari form
        $id_kunjungan = $this->input->post('id_kunjungan');
        $id_wisata = $this->input->post('id_wisata');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');

        // Cek apakah ada data yang sama (tanggal dan f_id_wisata) di database, selain data yang sedang di-update
        $existing_data = $this->Kunjungan_model->get_existing_data($id_wisata, $tanggal, $id_kunjungan);

        if ($existing_data) {
            // Jika data sudah ada, munculkan pesan bahwa data sudah ada
            $this->session->set_flashdata('error', 'Data kunjungan untuk wisata tersebut pada tanggal tersebut sudah ada!');
        } else {
            // Jika tidak ada data yang sama, lakukan update data
            $kunjungan_data = array(
                'f_id_wisata' => $id_wisata,
                'tanggal' => $tanggal,
                'jumlah' => $jumlah,
            );

            // Update data ke database
            $update = $this->Kunjungan_model->update('kunjungan', $kunjungan_data, array('id' => $id_kunjungan));

            // Redirect atau tampilkan pesan sukses/gagal
            if ($update) {
                $this->session->set_flashdata('success', 'Data kunjungan berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui data kunjungan!');
            }
        }

        redirect('kunjungan');
    }



    public function delete()
	{
		$id = htmlspecialchars($this->input->post('id'));

		// Dapatkan data kunjungan berdasarkan ID
		$current_data = $this->Kunjungan_model->get_kunjungan_by_id($id);

		// Hapus data dari database
		$result = $this->Kunjungan_model->delete('kunjungan', "id = " . $id);

		if ($result) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Data gagal dihapus.');
		}

		redirect('kunjungan');
	}
}
?>