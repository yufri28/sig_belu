<?php 
class Ulasan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('ulasan_model'); // Pastikan ada model ulasan
    }

    // Fungsi untuk menampilkan halaman ulasan beserta komentar
    public function index() {
        $data['ulasan'] = $this->ulasan_model->get_comments_with_replies();
        $this->load->view('ulasan_view', $data);
    }

    // Fungsi untuk menyimpan komentar baru
    public function submit_comment() {
        $email = $this->input->post('email');
        $komentar = $this->input->post('komentar');
        $f_id_wisata = $this->input->post('f_id_wisata'); // ID wisata terkait
        $ulasan_id = $this->input->post('ulasan_id'); // Ulasan parent, jika kosong maka 0

        $data = [
            'email' => $email,
            'komentar' => $komentar,
            'f_id_wisata' => $f_id_wisata,
            'ulasan_id' => ($ulasan_id) ? $ulasan_id : 0, // 0 untuk parent komentar
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->ulasan_model->insert_comment($data);
        redirect('pages/detail_wisata/'.$f_id_wisata);
    }

    public function delete()
    {
        $commentId = $this->input->post('id_ulasan');
        
        if ($this->ulasan_model->deleteComment($commentId)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

    public function deleteReply()
    {
        $replyId = $this->input->post('id_ulasan');
        
        if ($this->ulasan_model->deleteReply($replyId)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }

}


?>