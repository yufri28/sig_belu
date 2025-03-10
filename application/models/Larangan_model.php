<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Larangan_model extends CI_Model {

    public function get_all($table)
    {
        return $this->db->get($table)->result_array();
    }

    public function get_all_join($id = null)
    {
        $this->db->select('tanda_larangan.*, wisata.nama_wisata');
        $this->db->from('tanda_larangan');
        
        // Join dengan tabel wisata
        $this->db->join('wisata', 'tanda_larangan.f_id_wisata = wisata.id_wisata', 'left');
        
        // Menambahkan filter berdasarkan $id jika diberikan
        if ($id != null) {
            $this->db->where('wisata.f_id_pengelola', $id);
        }
        
        // Menjalankan query dan mengembalikan hasilnya
        return $this->db->get()->result_array();
    }

    public function get_all_join_by_id($id)
    {
        $this->db->select('tanda_larangan.*, wisata.nama_wisata');
        $this->db->from('tanda_larangan');
        
        // Join with wisata tables
        $this->db->join('wisata', 'tanda_larangan.f_id_wisata = wisata.id_wisata', 'left');
        $this->db->where('tanda_larangan.f_id_wisata', $id);
        // Execute query and return result
        return $this->db->get()->result_array();
    }

    public function get_larangan_by_id($id)
    {
        return $this->db->where('id_larangan', $id)->get('tanda_larangan')->row_array();
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