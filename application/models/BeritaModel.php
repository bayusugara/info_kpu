<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BeritaModel extends CI_Model {

    public $id_berita;
    public $username;

    public function find($username){
        $this->db->select('*');
        $this->db->from('berita a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->where('a.username', $username);
        $this->db->order_by('id_berita','desc');

        return $this->db->get()->result();
    }

    public function get_all(){
        $this->db->select('*');
        $this->db->from('berita a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->order_by('id_berita','desc');

        return $this->db->get()->result();
    }

    function get_where($condition){
        $this->db->where($condition);
        $this->db->join('pengguna b','a.username = b.username', 'left');
        return $this->db->get($this->table)->result();
    }

    public function tambah($data, $tabel){
		$this->db->insert($tabel, $data);
	}

    public function detail($id){
        $this->db->select('*');
        $this->db->from('berita a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->where($id);
        
        return $this->db->get();
    }

    public function hapus($id, $tabel){
		$this->db->where($id);
		$this->db->delete($tabel);
	}

    public function edit($where, $data){
        $this->db->where($where);
        return $this->db->update('berita', $data);
    }

    public function komentar($id){
        $this->db->select('*');
        $this->db->from('komentar a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->join('berita c','a.id_berita = c.id_berita', 'left');
        $this->db->where('a.id_berita', $id);
        
        return $this->db->get();
    }

    public function cari_berita_id($id_komentar){
        $this->db->select('a.id_berita');
        $this->db->from('komentar a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->join('berita c','a.id_berita = c.id_berita', 'left');
        $this->db->where('id_komentar', $id_komentar);
        
        return $this->db->get();
    }

    public function cari_berita_idi($id_berita){
        $this->db->select('c.id_berita');
        $this->db->from('reply a');
        $this->db->join('pengguna b','a.username = b.username', 'left');
        $this->db->join('komentar c','a.id_komentar = c.id_komentar', 'left');
        $this->db->join('berita d','c.id_berita = d.id_berita', 'left');
        $this->db->where('id_reply', $id_berita);
        
        return $this->db->get();
    }

    //ambil data berita dari database
    public function get_berita_list($limit, $start){
        $this->db->order_by("id_berita", "desc");
        $query = $this->db->get('berita', $limit, $start);
        return $query;
    }

    //ambil data berita pilkada dari database
    public function get_berita_pilkada(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('jenis_berita', 'PILKADA');
        
        return $this->db->get();
    }
     //ambil jumlah row berita pilkada dari database
    public function count_berita_pilkada(){
        $query = $this->db->where('jenis_berita', 'PILKADA')->get('berita');
        return $query->num_rows();
    }

    //ambil data berita pileg dari database
    public function get_berita_pileg(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('jenis_berita', 'PILEG');
        
        return $this->db->get();
    }
     //ambil jumlah row berita pileg dari database
    public function count_berita_pileg(){
        $query = $this->db->where('jenis_berita', 'PILGEG')->get('berita');
        return $query->num_rows();
    }

    //ambil data berita pilpres dari database
    public function get_berita_pilpres(){
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('jenis_berita', 'PIlPRES');
        
        return $this->db->get();
    }
     //ambil jumlah row berita pilpres dari database
    public function count_berita_pilpres(){
        $query = $this->db->where('jenis_berita', 'PIlPRES')->get('berita');
        return $query->num_rows();
    }

     //ambil data berita berdasarkan id dari database
    public function beritaSelengkapnya($id_berita){
        $this->db->select('*');
        $this->db->from('berita a');
        
        $this->db->where('a.id_berita', $id_berita);

        return $this->db->get()->result();
    }   
}
?>