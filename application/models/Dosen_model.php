<?php

class Dosen_model extends CI_Model {

private $primary_key='Kode_dosen';
private $table_name='dosen';
private $table = 'program_studi';
private $pk ='id_PS';

function __construct() {
	parent::__construct();
}

function get_paged_list()
{
	$this->db->select('*');
	$this->db->from('dosen a');
	$this->db->join('program_studi b', 'b.id_PS=a.Kode_PS','left');
	$query = $this->db->get();
	return $query;
	/*$data = $this->db->get($this->table_name);
	return $data;*/

	/*if(empty($order_column)|| empty($order_type))
	$this->db->order_by($this->primary_key,'asc');
	else
	$this->db->order_by($order_column,$order_type);
	return $this->db->get($this->table_name,$limit, $offset);*/
	
}

function get_check_id_dosen($kd)
{
    $this->db->select('*')->from('dosen')->where('Kode_dosen',$kd);
    return $this->db->get();
}
function save_akun_dosen($data)
{
	$this->db->insert('user',$data);
	return $this->db->insert_id();
}

function get_dosen()
{
	$this->db->select('*')->from('dosen');
	return $this->db->get();
}

function get_akun_by_id($id)
{
	$this->db->select('*')->from('user')->where('kd_dsn',$id);
	return $this->db->get();
}

function save_akun($data)
{
	$this->db->insert('user',$data);
	return $this->db->insert_id();
}

function get_pembanding_seminar($nim)
{
	$this->db->select('*')->from('pembanding')->where('nim',$nim);
	return $this->db->get();
}

function get_paged_list_update($kd)
{
	$this->db->select('*');
	$this->db->from('dosen a');
	$this->db->join('program_studi b', 'b.id_PS=a.Kode_PS','left');
	$this->db->where('a.Kode_dosen',$kd);
	$query = $this->db->get();
	return $query;
	/*$this->db->where($this->primary_key,$kd);
	return $this->db->get($this->table_name);


	/*if(empty($order_column)|| empty($order_type))
	$this->db->order_by($this->primary_key,'asc');
	else
	$this->db->order_by($order_column,$order_type);
	return $this->db->get($this->table_name,$limit, $offset);*/
	
}
function count_all() {
	return $this->db->count_all($this->table_name);
}

function get_by_id($id) {
	$this->db->where($this->primary_key,$id);
	return $this->db->get($this->table_name);
}

function save($person) {
	var_dump($person);
	$this->db->insert($this->table_name,$person);
	return $this->db->insert_id();
}

function update($id,$person) {
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$person);

	
}

function delete($id) {

	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}


//Prodi
function get_paged_list_ps($limit=10,$offset=0,
$order_column='',$order_type='asc')
{
	if(empty($order_column)|| empty($order_type))
	$this->db->order_by($this->pk,'asc');
	else
	$this->db->order_by($order_column,$order_type);
	return $this->db->get($this->table,$limit, $offset);
}

function count_all_ps() {
	return $this->db->count_all($this->table);
}
function save_prodi($person) {
	$this->db->insert($this->table,$person);
	return $this->db->insert_id();
}
function get_by_id_prodi($id) {
	$this->db->where($this->pk,$id);
	return $this->db->get($this->table);
}

function delete_prodi($id) {

	$this->db->where($this->pk,$id);
	$this->db->delete($this->table);
}
    
    function get_stambuk($id)
    {
        $this->db->select('stambuk')->from('kuota_bimbingan')->where('kd_dosen', $id)->group_by('stambuk')->order_by('stambuk', 'ASC');
        
        return $this->db->get();
    }
}