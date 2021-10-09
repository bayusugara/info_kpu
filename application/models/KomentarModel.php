<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KomentarModel extends CI_Model {

    public $id_berita;
    public $username;

    public function getKomentar($id_berita){
        $this->db->select('*');
        $this->db->from('Komentar');
        $this->db->join('pengguna', 'pengguna.username = komentar.username');
        $this->db->join('berita', 'komentar.id_berita = berita.id_berita');

        $this->db->where('komentar.id_berita', $id_berita);
        $this->db->order_by('id_komentar','desc');

        return $this->db->get()->result();
    }

    public function tambah($data, $tabel){
        $this->db->insert($tabel, $data);
    }

}

?>