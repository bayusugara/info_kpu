<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		$this->load->model('PenggunaModel');
	}

	public function index(){
		

		$this->load->view('Daftar');
	}

    public function createPublic(){
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(  
                'username' => $this->input->post('username',TRUE),
                'password' => md5($this->input->post('password',TRUE)),
                'nama_pengguna' => $this->input->post('nama_pengguna',TRUE),
                'hak_akses' => $this->input->post('hak_akses',TRUE),
                'email' => $this->input->post('email',TRUE),
                );

            $this->PenggunaModel->insert($data);
            $this->session->set_flashdata('message', 'Berhasil Daftar');
            redirect(site_url('Login'));
        }
    }

    public function _rules(){
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('nama_pengguna', 'nama pengguna', 'trim|required');
        $this->form_validation->set_rules('hak_akses', 'hak akses', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}