<?php

class Tesis_model extends CI_Model {

private $primary_key='id_tesis';
private $table_name='tesis';


function __construct() {
	parent::__construct();
}

function get_paged_list($page,$off)
{
	$this->db->select('*');
	$this->db->from('v_tesis');
	$this->db->limit($page,$off);
	$query = $this->db->get();
	return $query;
	//return $this->db->get($this->table_name);
	/*
	if(empty($order_column)|| empty($order_type))
	$this->db->order_by($this->primary_key,'asc');
	else
	$this->db->order_by($order_column,$order_type);
	return $this->db->get($this->table_name,$limit, $offset); */
	
}

function get_paged_list_count()
{
	$this->db->select('*');
	$this->db->from('v_tesis');
	$query = $this->db->get();
	return $query;
}

function get_paged_list_update($kd)
{
	$this->db->where($this->primary_key,$kd);
	return $this->db->get($this->table_name);
	
}

function count_all() {
	return $this->db->count_all($this->table_name);
}

function get_by_id($id) {
	$this->db->where($this->primary_key,$id);
	return $this->db->get($this->table_name);
}

function save($person) {
	$this->db->insert($this->table_name,$person);
	return $this->db->insert_id();
}

function update($id,$person) {
	var_dump($person);
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$person);
}

function delete($id) {

	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}
}