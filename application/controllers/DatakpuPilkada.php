<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatakpuPilkada extends CI_Controller {

	public function __construct(){
        parent:: __construct();
        //load libary pagination
        $this->load->library('pagination');

        $this->load->model('SuaraCalonPilegModel');

    }

	public function index(){
        
        //print_r($data2);exit();
		$this->load->view('frontend/dkpilkada');
	}
}
