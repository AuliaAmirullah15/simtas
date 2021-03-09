<?php

class Sempro_model extends CI_Model {

private $table_name = 'skripsi';

function __construct() {
	parent::__construct();
}

function cek($nim)
{
	$this->db->select('*')->from('pengajuan_judul')->where('nim',$nim)->where('status_kelayakan','diterima');
	return $this->db->get();
}

function get_nim($id)
{
	$this->db->select('nim')->from('pengajuan_judul')->where('id_pengajuan',$id);
	return $this->db->get();

}

function cek_available($nim)
{
	$this->db->select('*')->from('skripsi')->where('nim',$nim);
	return $this->db->get();
}

function get_some_data($nim)
{
	$query = "SELECT pengajuan_judul.judul,mahasiswa.nim,mahasiswa.nama,mahasiswa.id_PS,pembimbing.pembimbing1,pembimbing.pembimbing2 FROM pengajuan_judul,mahasiswa,pembimbing WHERE pengajuan_judul.nim = mahasiswa.nim AND mahasiswa.nim = pembimbing.nim AND mahasiswa.nim = '$nim' AND pengajuan_judul.status_kelayakan = 'diterima'";

	$this->db->query($query);
	return $this->db->get();
}

function input_baru($data)
{
	$this->db->insert($this->table_name,$data);
	return $this->db->insert_id();
}

function get_data()
{
	$this->db->select('*')->from('skripsi')->where('status','seminar proposal');
	return $this->db->get();
}

function edit_skripsi($nim)
{
	$data = array(
		'status' => 'pengajuan judul'
		);

	$datum = array(
		'status_kelayakan' => 'ditolak'
		);
	$this->db->where('nim',$nim)->update('skripsi',$data);
	$this->db->where('nim',$nim)->update('mahasiswa',$data);
	$this->db->where('nim',$nim)->where('status_kelayakan','diterima')->update('pengajuan_judul',$datum);
}

function edit_script($nim)
{
	$data = array(
		'status' => 'seminar hasil'
		);

	$datum = array(
		'status' => 'belum semhas'
		);
	$this->db->where('nim',$nim)->update('skripsi',$data);
	$this->db->where('nim',$nim)->update('mahasiswa',$datum);
}

function cek_uji_program($nim)
{
	$this->db->select('*')->from('pengajuan_judul')->join('mahasiswa','pengajuan_judul.nim = mahasiswa.nim')->where('pengajuan_judul.nim',$nim)->where('pengajuan_judul.status_kelayakan','diterima')->group_start()->where('mahasiswa.status','belum semhas')->or_where('mahasiswa.status','belum sidang')->group_end();
	return $this->db->get();	
}

function cek_sidang($nim)
{
	$this->db->select('*')->from('mahasiswa')->where('nim',$nim)->group_start()->where('status','belum sidang')->or_where('status','sudah sidang')->or_where('status','lulus')->group_end();
	return $this->db->get();	
}

function get_judul($nim)
{
	$this->db->select('judul')->from('pengajuan_judul')->where('nim',$nim)->where('status_kelayakan','diterima');
	return $this->db->get();
}

function cek_skripsi($nim)
{
	$this->db->select('*')->from('skripsi_nim')->where('nim',$nim);
	return $this->db->get();
}

function save($data)
{
	$this->db->insert('skripsi_nim',$data);
	return $this->db->insert_id();
}

function edit($data,$nim)
{
	$this->db->where('nim',$nim)->update('skripsi_nim',$data);
}

function edit_jadwal($nim,$data)
{
	$this->db->where('nim',$nim)->update('mahasiswa_sidang',$data);
}

function cek_seminar($id)
{
	$this->db->select('seminar')->from('jadwal_seminar')->where('id',$id);
	return $this->db->get();
}
}
