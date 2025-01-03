<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {

    public function get_all($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function get_all_join($id = null)
    {
        $this->db->select('fasilitas_wisata.*, wisata.nama_wisata');
        $this->db->from('fasilitas_wisata');
        
        // Join dengan tabel wisata
        $this->db->join('wisata', 'fasilitas_wisata.f_id_wisata = wisata.id_wisata', 'left');
        
        // Menambahkan filter berdasarkan $id jika diberikan
        if ($id != null) {
            $this->db->where('wisata.f_id_pengelola', $id);
        }
        
        // Menjalankan query dan mengembalikan hasilnya
        return $this->db->get()->result_array();
    }

    public function get_all_join_by_id($id)
    {
        $this->db->select('fasilitas_wisata.*, wisata.nama_wisata');
        $this->db->from('fasilitas_wisata');
        
        // Join with wisata tables
        $this->db->join('wisata', 'fasilitas_wisata.f_id_wisata = wisata.id_wisata', 'left');
        $this->db->where('fasilitas_wisata.f_id_wisata', $id);
        // Execute query and return result
        return $this->db->get()->result_array();
    }

    public function get_fasilitas_by_id($id)
    {
        return $this->db->where('id_fasilitas_wisata', $id)->get('fasilitas_wisata')->row_array();
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