<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_model extends CI_Model {

    public function get_kunjungan($id = null, $year = null)
    {
        // Menggunakan tahun saat ini jika parameter $year tidak diberikan
        if ($year == null) {
            $year = date('Y'); // Mendapatkan tahun saat ini
        }
    
        $this->db->select('kunjungan.*, wisata.id_wisata, wisata.nama_wisata, wisata.foto');
        $this->db->from('kunjungan');
        $this->db->join('wisata', 'kunjungan.f_id_wisata = wisata.id_wisata', 'left');
    
        // Menambahkan filter berdasarkan ID pengelola jika ID diberikan
        if ($id != null) {
            $this->db->where('wisata.f_id_pengelola', $id);
        }
    
        // Menambahkan filter berdasarkan tahun
        $this->db->where('YEAR(kunjungan.tanggal)', $year);
    
        // Mengambil data dan mengembalikannya dalam bentuk array
        return $this->db->get()->result_array();
    }
    

    public function get_kunjungan_per_bulan($id = null, $year = null) {
        // Menggunakan tahun saat ini jika parameter $year tidak diberikan
        if ($year == null) {
            $year = date('Y'); // Mendapatkan tahun saat ini
        }
    
        // Query untuk mengambil jumlah kunjungan per bulan dan per wisata
        $this->db->select('wisata.nama_wisata, 
                           DATE_FORMAT(kunjungan.tanggal, "%M") as bulan, 
                           SUM(kunjungan.jumlah) as total_kunjungan');
        $this->db->from('kunjungan');
        $this->db->join('wisata', 'kunjungan.f_id_wisata = wisata.id_wisata', 'left');
        
        // Menambahkan filter berdasarkan ID pengelola jika ID diberikan
        if ($id != null) {
            $this->db->where('wisata.f_id_pengelola', $id);
        }
    
        // Menambahkan filter berdasarkan tahun (baik yang diberikan atau tahun saat ini)
        $this->db->where('YEAR(kunjungan.tanggal)', $year);
    
        // Mengelompokkan data berdasarkan nama wisata dan bulan
        $this->db->group_by(['wisata.nama_wisata', 'bulan']);
        $this->db->order_by('wisata.nama_wisata', 'ASC');
        
        // Menyimpan hasil query ke dalam variabel
        $query = $this->db->get();
        
        // Memeriksa apakah query berhasil dan mengembalikan hasil
        if ($query->num_rows() > 0) {
            return $query->result_array(); // Mengembalikan data dalam bentuk array
        } else {
            return []; // Jika tidak ada data ditemukan, mengembalikan array kosong
        }
    }
    
    
    public function count_all_kunjungan($id = null) {
        // Menghitung total kunjungan berdasarkan tanggal
        if ($id != null) {
            $query = $this->db->query("SELECT COUNT(*) AS total_kunjungan
                                       FROM kunjungan
                                       JOIN wisata ON wisata.id_wisata = kunjungan.f_id_wisata
                                       WHERE wisata.f_id_pengelola = '$id'");
        } else {
            $query = $this->db->query("SELECT COUNT(*) AS total_kunjungan
                                       FROM kunjungan");
        }
        
        if ($query->num_rows() > 0) {
            return $query->row()->total_kunjungan; // Mengembalikan total kunjungan
        } else {
            return 0; // Jika tidak ada data, kembalikan 0
        }
    }

    public function get_existing_data($id_wisata, $tanggal, $id_kunjungan = null) {
        $this->db->from('kunjungan');
        $this->db->where('f_id_wisata', $id_wisata);
        $this->db->where('tanggal', $tanggal);
    
        // Jika sedang mengedit, pastikan data yang dicari bukan data yang sedang diupdate
        if ($id_kunjungan != null) {
            $this->db->where('id !=', $id_kunjungan);
        }
    
        $query = $this->db->get();
    
        // Jika ada data yang cocok, kembalikan datanya
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false; // Tidak ada data yang cocok
        }
    }
    
    
    public function get_kunjungan_by_id($id)
    {
        return $this->db->where('id', $id)->get('kunjungan')->row_array();
    }

    public function cek_kunjungan($id)
    {
        return $this->db->where('f_id_wisata', $id)->get('kunjungan')->num_rows();
    }
    
    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function update($table, $data, $id)
    {
        $this->db->where($id);
        return $this->db->update($table, $data);
    }

    public function delete($table, $id)
    {
        $this->db->where($id);
        return $this->db->delete($table);
    }
}