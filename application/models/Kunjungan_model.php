<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan_model extends CI_Model {

    public function get_kunjungan($id = null)
    {
        $this->db->select('kunjungan.*, wisata.id_wisata, wisata.nama_wisata, wisata.foto');
        $this->db->from('kunjungan');
        $this->db->join('wisata', 'kunjungan.f_id_wisata = wisata.id_wisata', 'left');

        // Menambahkan filter berdasarkan ID wisata jika ID diberikan
        if ($id != null) {
            $this->db->where('wisata.f_id_pengelola', $id);
        }

        // Mengambil data dan mengembalikannya dalam bentuk array
        return $this->db->get()->result_array();
    }

    public function get_kunjungan_per_bulan($id) {
        // Query untuk mengambil data kunjungan
        $this->db->select('wisata.nama_wisata, kunjungan.januari, kunjungan.februari, kunjungan.maret, kunjungan.april, kunjungan.mei, kunjungan.juni, kunjungan.juli, kunjungan.agustus, kunjungan.september, kunjungan.oktober, kunjungan.november, kunjungan.desember');
        $this->db->from('kunjungan');
        $this->db->join('wisata', 'kunjungan.f_id_wisata = wisata.id_wisata', 'left');
        
        // Menambahkan filter berdasarkan ID wisata jika ID diberikan
        if ($id != null) {
            $this->db->where('wisata.f_id_pengelola', $id);
        }
    
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
        if($id != null){
        $query = $this->db->query("SELECT 
                                    (SUM(Januari) + 
                                    SUM(Februari) + 
                                    SUM(Maret) + 
                                    SUM(April) + 
                                    SUM(Mei) + 
                                    SUM(Juni) + 
                                    SUM(Juli) + 
                                    SUM(Agustus) + 
                                    SUM(September) + 
                                    SUM(Oktober) + 
                                    SUM(November) + 
                                    SUM(Desember)) AS total_kunjungan
                                FROM kunjungan
                                JOIN wisata 
                                ON wisata.id_wisata=kunjungan.f_id_wisata
                                WHERE wisata.f_id_pengelola='$id'");
        }else{
            $query = $this->db->query("SELECT 
                                    (SUM(Januari) + 
                                    SUM(Februari) + 
                                    SUM(Maret) + 
                                    SUM(April) + 
                                    SUM(Mei) + 
                                    SUM(Juni) + 
                                    SUM(Juli) + 
                                    SUM(Agustus) + 
                                    SUM(September) + 
                                    SUM(Oktober) + 
                                    SUM(November) + 
                                    SUM(Desember)) AS total_kunjungan
                                FROM kunjungan");
        }
        
        if ($query->num_rows() > 0) {
            return $query->row()->total_kunjungan; // Mengembalikan total kunjungan
        } else {
            return 0; // Jika tidak ada data, kembalikan 0
        }
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