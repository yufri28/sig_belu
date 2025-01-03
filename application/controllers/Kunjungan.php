<?php 
class Kunjungan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kunjungan_model');  // Pastikan model sudah dibuat
    }

    // Function untuk menambah data kunjungan
    public function add() {
        // Ambil data dari form
        $id_wisata = $this->input->post('id_wisata');
        $kunjungan_data = array(
            'f_id_wisata' => $id_wisata,
            'januari' => $this->input->post('Januari'),
            'februari' => $this->input->post('Februari'),
            'maret' => $this->input->post('Maret'),
            'april' => $this->input->post('April'),
            'mei' => $this->input->post('Mei'),
            'juni' => $this->input->post('Juni'),
            'juli' => $this->input->post('Juli'),
            'agustus' => $this->input->post('Agustus'),
            'september' => $this->input->post('September'),
            'oktober' => $this->input->post('Oktober'),
            'november' => $this->input->post('November'),
            'desember' => $this->input->post('Desember')
        );

        // Simpan data ke database
        $insert = $this->Kunjungan_model->insert('kunjungan', $kunjungan_data);

        // Redirect atau tampilkan pesan sukses/gagal
        if ($insert) {
            $this->session->set_flashdata('success', 'Data kunjungan berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data kunjungan!');
        }

        redirect('wisata');
    }

    // Function untuk menyimpan edit data kunjungan
    public function edit() {
        // Ambil data dari form
        $id_kunjungan = $this->input->post('id_kunjungan');
        $kunjungan_data = array(
            'f_id_wisata' => $this->input->post('id_wisata'),
            'januari' => $this->input->post('Januari'),
            'februari' => $this->input->post('Februari'),
            'maret' => $this->input->post('Maret'),
            'april' => $this->input->post('April'),
            'mei' => $this->input->post('Mei'),
            'juni' => $this->input->post('Juni'),
            'juli' => $this->input->post('Juli'),
            'agustus' => $this->input->post('Agustus'),
            'september' => $this->input->post('September'),
            'oktober' => $this->input->post('Oktober'),
            'november' => $this->input->post('November'),
            'desember' => $this->input->post('Desember')
        );

        // Update data ke database
        $update = $this->Kunjungan_model->update('kunjungan', $kunjungan_data, array('id' => $id_kunjungan));

        // Redirect atau tampilkan pesan sukses/gagal
        if ($update) {
            $this->session->set_flashdata('success', 'Data kunjungan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data kunjungan!');
        }

        redirect('wisata');
    }
}
?>