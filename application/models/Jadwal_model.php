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
		$this->db->select('*')->from('jadwal_seminar')->order_by('jadwal','DESC');
		$query = $this->db->get();
		return $query;
	}

function save($data)
{
	$this->db->insert($this->table_name,$data);
	return $this->db->insert_id();
}

function tampil_jadwal($id)
{
	$this->db->select('*')->from('jadwal_seminar')->where('id',$id);
	return $this->db->get();
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
//	$cek = $this->db->select('a.id_jadwal_seminar, e.status_kelayakan, a.nim, a.nama, a.nama_PS, a.Dosen_Pembimbing1, a.Dosen_Pembimbing2, a.id_pengajuan, a.status_kelayakan_sempro')->from('v_mahasiswa_seminar a')->join('mahasiswa_sidang e', 'a.id_jadwal_seminar = e.id_jadwal_seminar')->where('a.id_jadwal_seminar',$id)->group_by('a.nim')->order_by('a.id_jadwal_seminar','ASC');
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

function get_mahasiswa_semhas($id)
{
    //Untuk data yang ngambilnya dari pengajuan_judul
        $this->db->select('a.id_jadwal_seminar, a.nim, a.nama, a.nama_PS, a.Dosen_Pembimbing1, a.Dosen_Pembimbing2, a.id_pengajuan, a.status_kelayakan_sempro, b.pembimbing1, b.pembimbing2, c.pembanding1, c.pembanding2, d.status_kelayakan_semhas, d.status_kelayakan_sidang, a.status_kelayakan');
        $this->db->from('v_mahasiswa_seminar a');
        $this->db->join('pembimbing b', 'a.nim = b.nim');
        $this->db->join('pembanding c', 'a.nim = c.nim');
        $this->db->join('pengajuan_judul d', 'a.id_pengajuan = d.id_pengajuan');
        $this->db->where('a.id_jadwal_seminar',$id);
        $this->db->order_by('a.id_jadwal_seminar','ASC');
//        $this->db->select('a.id_jadwal_seminar, a.nim, a.nama, a.nama_PS, a.Dosen_Pembimbing1, a.Dosen_Pembimbing2, a.id_pengajuan, a.status_kelayakan_sempro, b.pembimbing1, b.pembimbing2, c.pembanding1, c.pembanding2, d.status_kelayakan_semhas, d.status_kelayakan_sidang, e.status_kelayakan');
//        $this->db->from('v_mahasiswa_seminar a');
//        $this->db->join('pembimbing b', 'a.nim = b.nim');
//        $this->db->join('pembanding c', 'a.nim = c.nim');
//        $this->db->join('pengajuan_judul d', 'a.id_pengajuan = d.id_pengajuan');
//        $this->db->join('mahasiswa_sidang e', 'a.id_jadwal_seminar = e.id_jadwal_seminar');
//        $this->db->where('e.id_jadwal_seminar', $id);
//        $this->db->where('a.id_jadwal_seminar',$id);
//        $this->db->group_by('a.nim');
//        $this->db->order_by('a.id_jadwal_seminar','ASC');
        
	
	    $query = $this->db->get();
	return $query;

}
}