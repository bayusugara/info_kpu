<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatakpuPilpres extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        //load libary paginationa
        $this->load->library('pagination');

        $this->load->model('SuaraCalonPilpresModel');
        $this->load->model('KecamatanModel');

    }

    public function index(){
        $data['data'] = $this->SuaraCalonPilpresModel->get_all();
        $data['kec'] = $this->KecamatanModel->get_all();
        //print_r($data2);exit();
        $this->load->view('frontend/dkpilpres', $data);
    }
}
