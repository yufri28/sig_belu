<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_model extends CI_Model {

    public function get_contact_info() {
        // Mengambil data dari tabel contact_info
        $result = $this->db->get('contact_info')->row_array();

        // Jika tidak ada data, maka generate data default
        if (empty($result)) {
            $this->generate_default_contact();
            // Setelah data default dimasukkan, ambil lagi data dari database
            $result = $this->db->get('contact_info')->row_array();
        }

        return $result;
    }


    public function update_contact_info($data)
    {
        // Mengambil data sebelumnya untuk memastikan kolom lain tidak hilang
        $current_data = $this->db->get_where('contact_info', ['id' => 1])->row_array();
        
        // Jika data tidak ada, kembalikan false (atau lakukan penanganan error lainnya)
        if (!$current_data) {
            return false;
        }
    
        // Gabungkan data yang ada dengan data yang baru
        $updated_data = [
            'email'     => isset($data['email']) ? $data['email'] : $current_data['email'],
            'telepon'   => isset($data['telepon']) ? $data['telepon'] : $current_data['telepon'],
            'alamat'    => isset($data['alamat']) ? $data['alamat'] : $current_data['alamat'],
            'updated_at' => date('Y-m-d H:i:s') // Update waktu
        ];
    
        // Melakukan update pada tabel contact_info
        $this->db->where('id', 1); // Misalnya update kontak dengan ID = 1
        return $this->db->update('contact_info', $updated_data);
    }
    

     // Fungsi untuk generate data default ke dalam database
     private function generate_default_contact()
     {
         $data = [
             'id' => 1,
             'email' => 'info@default.com',
             'telepon' => '0000000000',
             'alamat' => 'Alamat belum tersedia.',
             'created_at' => date('Y-m-d H:i:s'),
             'updated_at' => date('Y-m-d H:i:s')
         ];
 
         // Insert data default ke dalam tabel contact_info
         $this->db->insert('contact_info', $data);
     }

}
?>