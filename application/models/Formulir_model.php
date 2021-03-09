<?php

class Formulir_model extends CI_Model {

function __construct() {
	parent::__construct();
}

function get_assesment($id)
{
	$this->db->select('*');
	$this->db->from('v_script');
	$this->db->where('id_skripsi',$id);
	$query = $this->db->get();
	return $query;
}

function search($id)
{
	$this->db->select('id_skripsi')->from('v_script')->where('nim', $id)->limit(1);
	$query = $this->db->get();
	return $query;
}
}