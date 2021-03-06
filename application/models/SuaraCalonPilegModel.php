<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SuaraCalonPilegModel extends CI_Model
{

    public $table = 'suara_calon_pileg';
    public $id = 'id_suara_calon_pileg';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all(){
        $this->db->order_by($this->id, $this->order);
        $this->db->join('calon_pileg', 'calon_pileg.id_calon_pileg = suara_calon_pileg.id_calon_pileg');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = suara_calon_pileg.id_kecamatan');
        $this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        $this->db->join('parpol', 'parpol.id_parpol = calon_pileg.id_parpol');
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id){
        $this->db->where($this->id, $id);
        $this->db->join('calon_pileg', 'calon_pileg.id_calon_pileg = suara_calon_pileg.id_calon_pileg');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = suara_calon_pileg.id_kecamatan');
        $this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        $this->db->join('parpol', 'parpol.id_parpol = calon_pileg.id_parpol');
        return $this->db->get($this->table)->row();
    }

    function get_where($condition){
        $this->db->where($condition);
        $this->db->join('calon_pileg', 'calon_pileg.id_calon_pileg = suara_calon_pileg.id_calon_pileg');
        $this->db->join('kecamatan', 'kecamatan.id_kecamatan = suara_calon_pileg.id_kecamatan');
        $this->db->join('dapil', 'dapil.id_dapil = kecamatan.id_dapil');
        $this->db->join('parpol', 'parpol.id_parpol = calon_pileg.id_parpol');
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_suara_calon_pileg', $q);
    $this->db->or_like('id_calon_pileg', $q);
    $this->db->or_like('id_kecamatan', $q);
    $this->db->or_like('jumlah_suara', $q);
    $this->db->or_like('tahun', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_suara_calon_pileg', $q);
    $this->db->or_like('id_calon_pileg', $q);
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

    //ambil data calonpileg dari database
    public function get_suara_calon_pileg_list($limit, $start){
        $query = $this->db->get('suara_calon_pileg', $limit, $start);
                
        return $query;
    }

}

