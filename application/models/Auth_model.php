<?php
class Auth_model extends CI_Model {

	// Get user by username
	public function get_user($username)
	{
		return $this->db->get_where('admin', ['username' => $username])->row_array();
	}

	// Create a new user
	public function create_user($data)
	{
		$this->db->insert('admin', $data);
	}
}