<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

	public function __construct(){
		parent:: __construct();

		if ($this->session->userdata('level') != "admin") {
			redirect('Login');
		}
		$this->load->model('BeritaModel');
		$this->load->model('ReplyModel');
	}

	public function komentar($id_berita)
	{
		$id = $id_berita;
		$reply = $this->ReplyModel->getReply();
		$komentar = $this->BeritaModel->komentar($id)->result();
		$id = array('id_berita' => $id_berita);
		$berita = $this->BeritaModel->detail($id)->result();

		$this->load->view('layout/static', ['content' => 'berita/komentar', 'komentar' => $komentar,'reply' => $reply, 'berita' => $berita]);
	}

	public function hapuskomentar($id_komentar)
	{
		$idberita = $id_komentar;
		$row = $this->BeritaModel->cari_berita_id($idberita)->row();
		$ide = $row->id_berita;

		$id = array('id_komentar' => $id_komentar);
		$this->BeritaModel->hapus($id, 'komentar');

		redirect(site_url('Komentar/komentar/'.$ide));
	}

	public function hapusreply($id_reply)
	{
		$idberita = $id_reply;
		$row = $this->BeritaModel->cari_berita_idi($idberita)->row();
		$ide = $row->id_berita;

		$id = array('id_reply' => $id_reply);
		$this->BeritaModel->hapus($id, 'reply');

		redirect(site_url('Komentar/komentar/'.$ide));
	}

}
