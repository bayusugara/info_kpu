<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gis extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('KecamatanModel');
		$this->load->model('DapilModel');
    }

	public function index(){
		$this->load->view('frontend/gis');
	}

	public function getDataKecamatan(){
		echo json_encode($this->KecamatanModel->get_all());
	}

	public function getDapil(){
		echo json_encode($this->DapilModel->get_all());

	}
}
