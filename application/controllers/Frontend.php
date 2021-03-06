<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        //load libary pagination
        $this->load->library('pagination');

        $this->load->model('BeritaModel');
        $this->load->model('KomentarModel');
        $this->load->model('ReplyModel');

    }

    public function index(){
        //konfigurasi pagination
        $config['base_url'] = site_url('frontend/index'); //site url
        $config['total_rows'] = $this->db->count_all('berita'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function getberita_list yang ada pada mmodel berita_model. 
        $data['data'] = $this->BeritaModel->get_berita_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('frontend/index', $data);
    }

    public function beritaSelengkapnya($id_berita){
        $berita_selengkapnya = $this->BeritaModel->beritaSelengkapnya($id_berita);
        $komentar = $this->KomentarModel->getKomentar($id_berita);
        $reply = $this->ReplyModel->getReply();

        $this->load->view('frontend/bacaberita', ['berita_selengkapnya' => $berita_selengkapnya, 'komentar' => $komentar, 'reply' => $reply]);
    }

    public function tambahKomentar($id_berita){
        $id_berita = $this->input->post('id_berita');
        $username = $this->session->userdata('username');
        $isi_komentar = $this->input->post('isi_komentar');

        $data = array(
            'id_berita' => $id_berita,
            'username' => $username,
            'isi_komentar' => $isi_komentar,
        );

        $this->KomentarModel->tambah($data, 'komentar');

        redirect(site_url('Frontend/beritaSelengkapnya/'.$id_berita));
    }

    public function tambahReply($id_komentar){
        $id_berita = $this->input->post('id_berita');
        $id_komentar = $this->input->post('id_komentar');
        $username = $this->session->userdata('username');
        $isi_reply = $this->input->post('isi_reply');

        $data = array(
            'id_komentar' => $id_komentar,
            'username' => $username,
            'isi_reply' => $isi_reply,
        );

        $this->KomentarModel->tambah($data, 'reply');

        redirect(site_url('Frontend/beritaSelengkapnya/'.$id_berita));
    }
}
