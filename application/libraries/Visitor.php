<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor {

    protected $CI;

    public function __construct()
    {
        // Dapatkan instance CodeIgniter
        $this->CI =& get_instance();
        // Pastikan nama model konsisten: Visitors_model
        $this->CI->load->model('Visitors_model');
    }

     // Fungsi untuk melacak pengunjung
    public function track()
    {
        $ip_address = $this->CI->input->ip_address();  // Dapatkan IP pengunjung
        $visit_date = date('Y-m-d');                   // Dapatkan tanggal hari ini
        $user_agent = $this->CI->input->user_agent();  // Dapatkan info user agent

        // Cek apakah pengunjung sudah tercatat hari ini
        $visitor = $this->CI->Visitors_model->check_visitor($ip_address, $visit_date);

        if (!$visitor) {
            // Jika belum tercatat hari ini, masukkan data pengunjung
            $data = [
                'ip_address' => $ip_address,
                'visit_date' => $visit_date,
                'user_agent' => $user_agent
            ];
            $this->CI->Visitors_model->insert_visitor($data);
        }

        // Data statistik pengunjung
        $data['today_visitors'] = $this->CI->Visitors_model->get_today_visitors();
        $data['total_visitors'] = $this->CI->Visitors_model->get_total_visitors();

        // Perhatikan bahwa library tidak bisa langsung memuat view.
        // View harus dimuat oleh controller.
        // Jika ingin mengembalikan statistik, Anda bisa return $data;
        return $data;
    }
}