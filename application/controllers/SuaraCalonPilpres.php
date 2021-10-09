<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuaraCalonPilpres extends CI_Controller{

    public $main_menu = 'Data Pemilu';
    public $sub_menu = 'PILPRES';

    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != "admin") {
            redirect('login');
        }
        $this->load->model('SuaraCalonPilpresModel');
        $this->load->model('CalonPilpresModel');
        $this->load->model('PaslonPilpresModel');
        $this->load->model('KecamatanModel');
        $this->load->library('form_validation');
    }

    public function index(){

        $suaracalonpilpres = $this->SuaraCalonPilpresModel->get_all();

        $data = array(
            'main_menu' => $this->main_menu,
            'content' => 'suaracalonpilpres/suara_calon_pilpres_list',
            'suaracalonpilpres_data' => $suaracalonpilpres
        );
        $this->load->view('layout/static', $data);
    }

    public function read($id){
        $row = $this->SuaraCalonPilpresModel->get_by_id($id);
        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'detail_menu' => 'Suara Calon Pilpres',
                'content' => 'suaracalonpilpres/suara_calon_pilpres_read',
                'id_suara_calon_pilpres' => $row->id_suara_calon_pilpres,
                'id_paslon_pilpres' => $row->id_paslon_pilpres,
                'capres' => $row->id_capres,
                'cawapres' => $row->id_cawapres,
                'nama_kecamatan' => $row->nama_kecamatan,
                'jumlah_suara' => $row->jumlah_suara,
                'tahun' => $row->tahun,
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('SuaraCalonPilpres'));
        }
    }

    public function create(){
        $kecamatan = $this->KecamatanModel->get_all();
        $data = array(
            'main_menu' => $this->main_menu,
            'sub_menu' => $this->sub_menu,
            'detail_menu' => 'Suara Calon Pilpres',
            'content' => 'suaracalonpilpres/suara_calon_pilpres_form',
            'button' => 'Create',
            'action' => site_url('SuaraCalonPilpres/create_action'),
            'id_suara_calon_pilpres' => set_value('id_suara_calon_pilpres'),
            'id_paslon_pilpres' => set_value('id_paslon_pilpres'),
            'id_kecamatan' => set_value('id_kecamatan'),
            'jumlah_suara' => set_value('jumlah_suara'),
            'tahun' => set_value('tahun'),
            'kecamatan' => $kecamatan
        );
        $this->load->view('layout/static', $data);
    }
    
    public function create_action(){
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_paslon_pilpres' => $this->input->post('id_paslon_pilpres',TRUE),
        'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
        'jumlah_suara' => $this->input->post('jumlah_suara',TRUE),
        'tahun' => $this->input->post('tahun',TRUE),
        );

            $this->SuaraCalonPilpresModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('SuaraCalonPilpres'));
        }
    }
    
    public function update($id){
        $row = $this->SuaraCalonPilpresModel->get_by_id($id);
        $kecamatan = $this->KecamatanModel->get_all();

        if ($row) {
            $data = array(
                'main_menu' => $this->main_menu,
                'sub_menu' => $this->sub_menu,
                'detail_menu' => 'Suara Calon Pilpres',
                'content' => 'suaracalonpilpres/suara_calon_pilpres_form',
                'button' => 'Update',
                'action' => site_url('SuaraCalonPilpres/update_action'),
                'id_suara_calon_pilpres' => set_value('id_suara_calon_pilpres', $row->id_suara_calon_pilpres),
                'id_paslon_pilpres' => set_value('id_paslon_pilpres', $row->id_paslon_pilpres),
                'jumlah_suara' => set_value('jumlah_suara', $row->jumlah_suara),
                'tahun' => set_value('tahun', $row->tahun),
                'id_kecamatan' => set_value('id_kecamatan', $row->id_kecamatan),
                'kecamatan' => $kecamatan
            );
            $this->load->view('layout/static', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('SuaraCalonPilpres'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_suara_calon_pilpres', TRUE));
        } else {
            $data = array(
        'id_paslon_pilpres' => $this->input->post('id_paslon_pilpres',TRUE),
        'id_kecamatan' => $this->input->post('id_kecamatan',TRUE),
        'jumlah_suara' => $this->input->post('jumlah_suara',TRUE),
        'tahun' => $this->input->post('tahun',TRUE),
        );

            $this->SuaraCalonPilpresModel->update($this->input->post('id_suara_calon_pilpres', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('SuaraCalonPilpres'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->SuaraCalonPilpresModel->get_by_id($id);

        if ($row) {
            $this->SuaraCalonPilpresModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('SuaraCalonPilpres'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('SuaraCalonPilpres'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('id_paslon_pilpres', 'id paslon pilpres', 'trim|required');
    $this->form_validation->set_rules('id_kecamatan', 'id kecamatan', 'trim|required');
    $this->form_validation->set_rules('jumlah_suara', 'jumlah suara', 'trim|required');
    $this->form_validation->set_rules('tahun', 'tahun', 'trim|required');

    $this->form_validation->set_rules('id_suara_calon_pilpres', 'id_suara_calon_pilpres', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
