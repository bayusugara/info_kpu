<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformasiUmumPilkada extends CI_Controller {

	public function __construct(){
        parent:: __construct();
        //load libary pagination
        $this->load->library('pagination');

        $this->load->model('CalonPilkadaModel');
        $this->load->model('PaslonPilkadaModel');

    }

	public function index(){
        //konfigurasi pagination
        $config['base_url'] = site_url('InformasiUmumPilkada/index'); //site url
        $config['total_rows'] = $this->db->count_all('calon_pilkada'); //total row
        $config['per_page'] = 4;  //show record per halaman
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
        $data['data'] = $this->CalonPilkadaModel->get_calon_pilkada_list($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

        $data['paslon'] = $this->PaslonPilkadaModel->get_all();
        //print_r($data2);exit();
		$this->load->view('frontend/iupilkada', $data);
	}
}
