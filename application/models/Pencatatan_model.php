<?php

class Pencatatan_model extends CI_Model {

private $primary_key='id_skripsi';
private $table_name='mahasiswa';
private $table_name2='pembimbing';
private $table_name3='pembanding';
private $table_name4='nilai';
private $table_name5='skripsi_nim';

function __construct() {
	parent::__construct();
}

function save_mahasiswa($data)
{
	$this->db->insert($this->table_name,$data);
	return $this->db->insert_id();
}

function save_pembimbing($data)
{
	$this->db->insert($this->table_name2,$data);
	return $this->db->insert_id();
}

function save_pembanding($data)
{
	$this->db->insert($this->table_name3,$data);
	return $this->db->insert_id();
}

function save_nilai($data)
{

$this->db->insert($this->table_name4,$data);
	return $this->db->insert_id();

}

function save_skripsi($data)
{
	$this->db->insert($this->table_name5,$data);
	return $this->db->insert_id();
}

function get_data_pencatatan()
{
	$this->db->select('*')->from('log_pencatatan')->order_by('waktu','DESC')->limit(30);
	return $this->db->get();
}
}