<?php

class Jadwal_model extends CI_Model {
	
	private $primary_key = 'id';
	private $table_name = 'jadwal_seminar';
function __construct()
{
	parent::__construct();
}

function show_jadwal()
	{
		$this->db->select('*')->from('jadwal_seminar')->order_by('jadwal','ASC');
		$query = $this->db->get();
		return $query;
	}

function save($data)
{
	$this->db->insert($this->table_name,$data);
	return $this->db->insert_id();
}

function delete($id) {

	$this->db->where($this->primary_key,$id);
	$this->db->delete($this->table_name);
}

function get_data_by_id($id)
{
	$this->db->where($this->primary_key,$id);
	return $this->db->get($this->table_name);
}

function update_seminar($data,$id)
{
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$data);
}

function get_mahasiswa($id)
{
	$cek = $this->db->select('*')->from('v_mahasiswa_seminar')->where('id_jadwal_seminar',$id)->order_by('id_jadwal_seminar','ASC');
	
	$query = $this->db->get();
	return $query;

}

function delete_mahasiswa_di_jadwal($nim,$id)
{
	$query = "DELETE FROM mahasiswa_sidang WHERE nim ='$nim' AND id_jadwal_seminar ='$id'";
	$query = $this->db->query($query);
	return $query;

}

function show($id)
{
	$id = (int)$id;
	$query = "SELECT mahasiswa.nim,mahasiswa.nama FROM mahasiswa,skripsi WHERE mahasiswa.nim = skripsi.nim AND skripsi.status=(SELECT seminar FROM jadwal_seminar WHERE id=$id);";

	$this->db->query($query);

	$queri = $this->db->get();
	return $queri;
}

function tes($id)
{
	$id = (int)$id;
	$query = "SELECT mahasiswa.nim,mahasiswa.nama FROM mahasiswa,skripsi WHERE mahasiswa.nim = skripsi.nim AND skripsi.status=(SELECT seminar FROM jadwal_seminar WHERE id=$id);";

	$this->db->query($query);

	$queri = $this->db->get();
	return $queri;

}
function banding($id)
{
	$this->db->select('*')->FROM('mahasiswa_sidang');
	$query = $this->db->get();

	return $query;
}

function get_detail($id)
{
	$id = (int) $id;
	//$query = "SELECT mahasiswa.nama FROM mahasiswa , mahasiswa_sidang WHERE mahasiswa_sidang.nim = mahasiswa.nim AND mahasiswa_sidang.id_jadwal_seminar = $id";

	//$this->db->query($query);
	$this->db->select('mahasiswa.nama')->from('mahasiswa','mahasiswa_sidang')->where('mahasiswa_sidang.nim','mahasiswa.nim');
	$queri =  $this->db->get();


	return $queri;
}

function get_nim($id)
{
	$this->db->select('nim')->from('mahasiswa_sidang')->where('id_jadwal_seminar',$id);
	return $this->db->get();
}
}