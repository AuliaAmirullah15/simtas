<?php

class Gaji_model extends CI_Model{

	private $table_name='gaji_dosen';

function __construct()
{
	parent::__construct();
}

function gaji()
{
	$this->db->select('*')->from('gaji_dosen');
	$query = $this->db->get();
	return $query;

}

function save($gaji) {
	$this->db->update($this->table_name,$gaji);
}


}