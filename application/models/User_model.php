<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_all_users() {
        return $this->db->get('admin')->result_array();
    }

    public function get_all_pengelola() {
        return $this->db->where('role', 'pengelola')->get('admin')->result_array();
    }

    public function insert_user($data) {
        return $this->db->insert('admin', $data);
    }

    public function get_user_by_id($id_admin) {
        return $this->db->where('id_admin', $id_admin)->get('admin')->row_array();
    }

    public function update_user($id_admin, $data) {
        return $this->db->where('id_admin', $id_admin)->update('admin', $data);
    }

    public function delete_user($id_admin) {
        return $this->db->where('id_admin', $id_admin)->delete('admin');
    }
}