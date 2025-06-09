<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Visitors_model extends CI_Model {

    // Insert a new visitor record
    public function insert_visitor($data) {
        $this->db->insert('visitors', $data);
    }

    // Check if the visitor for the day already exists
    public function check_visitor($ip_address, $visit_date) {
        $this->db->where('ip_address', $ip_address);
        $this->db->where('visit_date', $visit_date);
        $query = $this->db->get('visitors');
        return $query->row();
    }

    // Get today's visitors
    public function get_today_visitors() {
        $today = date('Y-m-d');
        $this->db->where('visit_date', $today);
        return $this->db->count_all_results('visitors');
    }

    // Get this month's visitors
    public function get_month_visitors() {
        $this->db->where('MONTH(visit_date)', date('m'));
        $this->db->where('YEAR(visit_date)', date('Y'));
        return $this->db->count_all_results('visitors');
    }

    // Get this year's visitors
    public function get_year_visitors() {
        $this->db->where('YEAR(visit_date)', date('Y'));
        return $this->db->count_all_results('visitors');
    }

    // Get total visitors
    public function get_total_visitors() {
        return $this->db->count_all('visitors');
    }
}
    




?>