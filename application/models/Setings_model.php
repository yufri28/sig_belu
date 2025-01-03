<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setings_model extends CI_Model {

    public function get_all($table)
    {
        return $this->db->get($table)->result_array();
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