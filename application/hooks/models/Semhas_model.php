<?php

class Semhas_model extends CI_Model {

private $table_name = 'skripsi';

function __construct() {
	parent::__construct();
}

function get_data()
{
	$this->db->select('*')->from('semhas')->where('status','belum dikonfirmasi');
	return $this->db->get();
}

function edit_semhas($id,$status)
{
	$data = array(
		'status' => $status
		);
	$this->db->where('id',$id);
	$this->db->update('semhas',$data);
}

function cek_diterima($nim)
{
	$this->db->select('*')->from('semhas')->where('status','diterima')->where('nim',$nim);
	return $this->db->get();
}
}
