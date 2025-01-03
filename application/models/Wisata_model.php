<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_model extends CI_Model {

    public function get_all($table, $id = null)
    {
        // Jika ID diberikan, lakukan filter berdasarkan ID
        if ($id != null) {
            $this->db->where('f_id_pengelola', $id); // Asumsi bahwa kolom ID adalah 'id'
        }

        // Mengambil data dari tabel
        return $this->db->get($table)->result_array();
    }

    public function count_all_wisata($id = null)
    {
        // Menggunakan query untuk menghitung jumlah entri pada tabel wisata
        $this->db->from('wisata');
        
        // Jika $id tidak null, tambahkan kondisi where untuk menghitung berdasarkan ID tertentu
        if ($id != null) {
            $this->db->where('f_id_pengelola', $id); // sesuaikan dengan nama kolom ID yang digunakan
        }

        // Mengembalikan jumlah total hasil
        return $this->db->count_all_results();
    }

    public function get_all_join($id = null)
    {
        $this->db->select('wisata.*, kecamatan.nama_kecamatan, admin.username as pengelola, kategori.nama_kategori');
        $this->db->from('wisata');
        
        // Jika id tidak null, maka tambahkan kondisi WHERE untuk filter pengelola
        if ($id != null) {
            $this->db->where('wisata.f_id_pengelola', $id);
        }
        
        // Melakukan join dengan tabel kecamatan, admin, dan kategori
        $this->db->join('kecamatan', 'wisata.f_id_kecamatan = kecamatan.id_kecamatan', 'left');
        $this->db->join('admin', 'wisata.f_id_pengelola = admin.id_admin', 'left');
        $this->db->join('kategori', 'wisata.f_id_kategori = kategori.id_kategori', 'left');
        
        // Menjalankan query dan memeriksa apakah ada hasil
        $query = $this->db->get();
        
        // Jika berhasil dan ada data, kembalikan dalam bentuk array
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return []; // Kembalikan array kosong jika tidak ada data
        }
    }


    public function get_join_isnull($id = null)
    {
        $this->db->select('wisata.*, kunjungan.id');
        $this->db->from('wisata');
        
        // Melakukan join dengan tabel kunjungan
        $this->db->join('kunjungan', 'wisata.id_wisata = kunjungan.f_id_wisata', 'left');
        
        // Jika id tidak null, maka tambahkan kondisi WHERE untuk filter pengelola
        if ($id != null) {
            $this->db->where('wisata.f_id_pengelola', $id);
        }
        
        // Mengambil data wisata yang tidak memiliki kunjungan
        $this->db->where('kunjungan.id IS NULL');
        
        // Menjalankan query dan memeriksa apakah ada hasil
        $query = $this->db->get();
        
        // Jika berhasil dan ada data, kembalikan dalam bentuk array
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return []; // Kembalikan array kosong jika tidak ada data
        }
    }



    public function get_wisata_by_id($id)
    {
        return $this->db->where('id_wisata', $id)->get('wisata')->row_array();
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