<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SuaraCalonPilpresModel extends CI_Model
{

    public $table = 'suara_calon_pilpres';
    public $id = 'id_suara_calon_pilpres';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }


    public function getNew(){
        $this->db->select('*');
        $this->db->from('suara_calon_pilpres');

        return $this->db->get()->result();
    }

    // get all
    function get_all(){
        $this->db->order_by($this->id, $this->order);
        $this->db->join('paslon_pilpres', 'paslon_pilpres.id_paslon_pilpres = suara_calon_pilpres.id_paslon_pilpres');
        $this->db->join('calon_pilpres a', 'a.id_calon_pilpres = paslon_pilpres.id_capres');
        $this->db->join('calon_pilpres b', 'b.id_calon_pilpres = paslon_pilpres.id_cawapres');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = suara_calon_pilpres.id_kecamatan');
        //$this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        //$this->db->join('parpol', 'parpol.id_parpol = a.id_parpol');
        $this->db->select('id_suara_calon_pilpres, paslon_pilpres.id_paslon_pilpres, nomor_urut, a.nama_calon AS id_capres, b.nama_calon AS id_cawapres, nama_kecamatan, jumlah_suara, suara_calon_pilpres.tahun, suara_calon_pilpres.id_kecamatan');
        return $this->db->get($this->table)->result();
    }

    function get(){
        $this->db->order_by('nama_kecamatan');
        $this->db->join('paslon_pilpres', 'paslon_pilpres.id_paslon_pilpres = suara_calon_pilpres.id_paslon_pilpres');
        $this->db->join('calon_pilpres a', 'a.id_calon_pilpres = paslon_pilpres.id_capres');
        $this->db->join('calon_pilpres b', 'b.id_calon_pilpres = paslon_pilpres.id_cawapres');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = suara_calon_pilpres.id_kecamatan');
        $this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        $this->db->join('parpol', 'parpol.id_parpol = a.id_parpol');
        $this->db->select('id_suara_calon_pilpres, paslon_pilpres.id_paslon_pilpres, nomor_urut, a.nama_calon AS id_capres, b.nama_calon AS id_cawapres, nama_kecamatan, jumlah_suara, suara_calon_pilpres.tahun');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id){
        $this->db->where($this->id, $id);
        $this->db->join('paslon_pilpres', 'paslon_pilpres.id_paslon_pilpres = suara_calon_pilpres.id_paslon_pilpres');
        $this->db->join('calon_pilpres a', 'a.id_calon_pilpres = paslon_pilpres.id_capres');
        $this->db->join('calon_pilpres b', 'b.id_calon_pilpres = paslon_pilpres.id_cawapres');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = suara_calon_pilpres.id_kecamatan');
        //$this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        //$this->db->join('parpol', 'parpol.id_parpol = a.id_parpol');
        $this->db->select('id_suara_calon_pilpres, paslon_pilpres.id_paslon_pilpres, nomor_urut, a.nama_calon AS id_capres, b.nama_calon AS id_cawapres,suara_calon_pilpres.id_kecamatan, nama_kecamatan, jumlah_suara, suara_calon_pilpres.tahun');
        return $this->db->get($this->table)->row();
    }

    function get_where($condition){
        $this->db->where($condition);
        $this->db->join('paslon_pilpres', 'paslon_pilpres.id_paslon_pilpres = suara_calon_pilpres.id_paslon_pilpres');
        $this->db->join('calon_pilpres', 'calon_pilpres.id_calon_pilpres = paslon_pilpres.id_capres');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = suara_calon_pilpres.id_kecamatan');
        $this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        $this->db->join('parpol', 'parpol.id_parpol = calon_pilpres.id_parpol');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_suara_calon_pilpres', $q);
    $this->db->or_like('id_paslon_pilpres', $q);
    $this->db->or_like('id_kecamatan', $q);
    $this->db->or_like('jumlah_suara', $q);
    $this->db->or_like('tahun', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_suara_paslon_pilpres', $q);
    $this->db->or_like('id_paslon_pilpres', $q);
    $this->db->or_like('id_kecamatan', $q);
    $this->db->or_like('jumlah_suara', $q);
    $this->db->or_like('tahun', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    //ambil data calonpilpres dari database
    public function get_suara_calon_pilpres_list($limit, $start){
        $query = $this->db->get('suara_calon_pilpres', $limit, $start);
                
        return $query;
    }


}

