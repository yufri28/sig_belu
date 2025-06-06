<?php 
class Ulasan_model extends CI_Model {

    public function get_comments_with_replies($id) {
        // Mengambil semua komentar utama (ulasan_id = 0) dan balasannya
        $this->db->select('*');
        $this->db->from('ulasan');
        $this->db->where('ulasan.ulasan_id', 0); // Komentar utama
        $this->db->where('ulasan.f_id_wisata', $id); // Komentar utama
        $this->db->order_by('ulasan.created_at', 'DESC');
        $comments = $this->db->get()->result_array();

        foreach ($comments as &$comment) {
            // Mengambil balasan berdasarkan ulasan_id
            $comment['replies'] = $this->get_replies($comment['id_ulasan']);
        }

        return $comments;
    }

    public function get_replies($ulasan_id) {
        $this->db->select('*');
        $this->db->from('ulasan');
        $this->db->where('ulasan_id', $ulasan_id); // Balasan komentar
        $this->db->order_by('created_at', 'ASC');
        return $this->db->get()->result_array();
    }

    public function insert_comment($data) {
        $this->db->insert('ulasan', $data);
    }

    public function deleteComment($id_ulasan)
    {
        return $this->db->delete('ulasan', ['id_ulasan' => $id_ulasan]);
    }

    public function deleteReply($id_ulasan)
    {
        return $this->db->delete('ulasan', ['id_ulasan' => $id_ulasan]);
    }
    

}

?>