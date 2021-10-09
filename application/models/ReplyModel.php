<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReplyModel extends CI_Model {

    public $id_komentar;
    public $username;

    public function getReply(){
        $this->db->select('*');
        $this->db->from('Reply');
        $this->db->join('komentar', 'komentar.id_komentar = reply.id_komentar');
        $this->db->join('pengguna', 'pengguna.username = reply.username');
        $this->db->join('berita', 'berita.id_berita = komentar.id_berita');

        return $this->db->get()->result();
    }

    public function tambah($data, $tabel){
        $this->db->insert($tabel, $data);
    }

}

?>