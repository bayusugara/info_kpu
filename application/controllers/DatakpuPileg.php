<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatakpuPileg extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        //load libary pagination
        $this->load->library('pagination');

        $this->load->model('SuaraCalonPilegModel');
        $this->load->model('CalonPilegModel');

    }

    public function index(){
        $data['data'] = $this->SuaraCalonPilegModel->get_all();
        $data['pileg'] = $this->CalonPilegModel->get_all();
        //print_r($data2);exit();
        $this->load->view('frontend/dkpileg', $data);
    }
}
