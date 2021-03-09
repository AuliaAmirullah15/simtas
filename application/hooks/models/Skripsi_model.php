<?php

class Skripsi_model extends CI_Model {

private $primary_key='id_skripsi';
private $primary_key2='nim';
private $table_name='skripsi';
private $table_name2='skripsi_nim';
private $table_name3='mahasiswa';
private $table_name4='pembimbing';
private $table_name5='pembanding';
private $table_name6='nilai';



function __construct() {
	parent::__construct();
}

function get_paged_list($page,$off)
{
	$this->db->select('*');
	$this->db->from('v_pencatatan');
	$this->db->limit($page,$off);
	$query = $this->db->get();
	return $query;
}

function get_paged_list_count()
{
	$this->db->select('*');
	$this->db->from('v_pencatatan');
	$query = $this->db->get();
	return $query;
	//	return $this->db->get($this->table_name);
	/*if(empty($order_column)|| empty($order_type))
	$this->db->order_by($this->primary_key,'asc');
	else
	$this->db->order_by($order_column,$order_type);
	return $this->db->get($this->table_name,$limit, $offset);*/
	
}

function get_date($nim)
{
	$this->db->where($this->primary_key2,$nim);
	return $this->db->get($this->table_name2);
}
function get_paged_list_update($kd)
{
	$this->db->select('*')->from('v_pencatatan')->where('nim',$kd);
	return $this->db->get();
	
}

function get_data($nim)
{
	$this->db->select('*')->from('v_pencatatan')->where('nim',$nim);
	return $this->db->get();
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
	$this->db->where($this->primary_key,$id);
	$this->db->update($this->table_name,$person);
}

function update_skripsi($nim,$data) {
	$this->db->where($this->primary_key2,$nim);
	$this->db->update($this->table_name2,$data);
}

function update_mahasiswa($nim,$data) {
	$this->db->where($this->primary_key2,$nim);
	$this->db->update($this->table_name3,$data);
}

function update_pembimbing($nim,$data) {
	$this->db->where($this->primary_key2,$nim);
	$this->db->update($this->table_name4,$data);
}

function update_pembanding($nim,$data) {
	$this->db->where($this->primary_key2,$nim);
	$this->db->update($this->table_name5,$data);
}

function update_nilai($nim,$data) {
	$this->db->where($this->primary_key2,$nim);
	$this->db->update($this->table_name6,$data);
}
function delete_mahasiswa($id) {

	$this->db->where($this->primary_key2,$id);
	$this->db->delete($this->table_name3);
}
function delete_pembimbing($id) {

	$this->db->where($this->primary_key2,$id);
	$this->db->delete($this->table_name4);
}
function delete_pembanding($id) {

	$this->db->where($this->primary_key2,$id);
	$this->db->delete($this->table_name5);
}
function delete_nilai($id) {

	$this->db->where($this->primary_key2,$id);
	$this->db->delete($this->table_name6);
}
function delete_skripsi($id) {

	$this->db->where($this->primary_key2,$id);
	$this->db->delete($this->table_name2);
}

function search($skripsi,$nim,$prodi,$cari,$tgl_a,$tgl_t,$pil,$page, $off)
{
	$where = "Tgl_lulus BETWEEN '$tgl_a' AND '$tgl_t'";

	if(empty($cari) AND empty($tgl_a) AND empty($tgl_t) AND empty($skripsi) AND empty($nim) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->limit($page,$off);
		}
	
		$query= $this->db->get();
		return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($skripsi) AND empty($nim) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('Tgl_lulus', $tgl_t);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_t) AND empty($skripsi) AND empty($nim) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('Tgl_lulus', $tgl_a);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->where('Tgl_lulus', $tgl_a);
		$this->db->limit($page,$off);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($skripsi) AND empty($nim) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('nama_PS', $prodi)->or_like('nama_PS', $prodi);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		$this->db->limit($page,$off);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($skripsi) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('nim', $nim)->or_like('nim', $nim);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->limit($page,$off);
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($nim) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->limit($page,$off);
		$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($tgl_a) AND empty($nim) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->limit($page,$off);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($tgl_a) AND empty($nim) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->limit($page,$off);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($nim) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->group_start()->where('judul_skripsi',$skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('judul_skripsi',$skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		$this->db->limit($page,$off);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($skripsi) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->group_start()->where('nim',$nim)->or_like('nim',$nim)->group_end();
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('nim',$nim)->or_like('nim',$nim)->group_end();
		$this->db->limit($page,$off);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($skripsi) AND empty($nim) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS',$prodi)->group_end();
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('nama_PS',$prodi)->or_like('nama_PS',$prodi)->group_end();
		$this->db->limit($page,$off);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($prodi) AND empty($skripsi) AND empty($nim) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->where('Tgl_lulus', $tgl_a);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($prodi) AND empty($skripsi) AND empty($nim) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->where('Tgl_lulus', $tgl_t);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($prodi) AND empty($cari) AND empty($tgl_t) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
			$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($nim) AND empty($cari) AND empty($tgl_t) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($nim) AND empty($cari) AND empty($tgl_t) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
			$this->db->where('Tgl_lulus', $tgl_a);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($nim) AND empty($cari) AND empty($tgl_a) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
			$this->db->where('Tgl_lulus', $tgl_t);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($tgl_a) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->where('Tgl_lulus', $tgl_a);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($prodi) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->where('Tgl_lulus', $tgl_t);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($nim) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
			$this->db->where('Tgl_lulus', $tgl_a);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($nim) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
			$this->db->where('Tgl_lulus', $tgl_t);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($nim) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where($where);
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->limit($page,$off);
		$this->db->where('status',$pil);
		$this->db->where($where);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->where('nim', $nim);
			$this->db->group_start()->where('judul_skripsi',$skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
			$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('nim', $nim);
		$this->db->group_start()->where('judul_skripsi',$skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		$this->db->limit($page,$off);
		}
	
	$query= $this->db->get();
	var_dump($query);die();
	return $query;
	}

	else if(empty($cari)) 
	{
	
	if($pil == 'all')

		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
			$this->db->where('nim',$nim);
			$this->db->where('nama_PS', $prodi);
			$this->db->where($where);
		$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
		$this->db->where('status',$pil);
		$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		$this->db->where('nim',$nim);
		$this->db->where('nama_PS', $prodi);
		$this->db->where($where);
		$this->db->limit($page,$off);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
			$this->db->where('nim',$nim);
			$this->db->where('nama_PS', $prodi);
		$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
		$this->db->where('status',$pil);
		$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		$this->db->where('nim',$nim);
		$this->db->where('nama_PS', $prodi);
		$this->db->limit($page,$off);
		}
		
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_t))
	{
		$this->db->select('*');
	$this->db->from('v_script');
	$this->db->limit($page,$off);
	$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
	$this->db->where('status',$pil);
	$this->db->where('Tgl_lulus', $tgl_a);
	
	$query= $this->db->get();
	return $query;
	}

	else
	{
	
	$this->db->select('*');
	$this->db->from('v_script');
	$this->db->limit($page,$off);
	$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
	$this->db->where('status',$pil);
	$this->db->where($where);
	
	$query= $this->db->get();
	return $query;
	}
}

function search_count($skripsi,$nim,$prodi,$cari,$tgl_a,$tgl_t,$pil)
{
	$where = "Tgl_lulus BETWEEN '$tgl_a' AND '$tgl_t'";

	if(empty($cari) AND empty($tgl_a) AND empty($tgl_t) AND empty($skripsi) AND empty($nim) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($skripsi) AND empty($nim) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('Tgl_lulus', $tgl_t);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($skripsi) AND empty($nim) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('Tgl_lulus', $tgl_a);
		
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($skripsi) AND empty($nim) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('nama_PS', $prodi)->or_like('nama_PS', $prodi);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($skripsi) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('nim', $nim)->or_like('nim', $nim);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari) AND empty($tgl_a) AND empty($nim) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($tgl_a) AND empty($nim) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($nim) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->group_start()->where('judul_skripsi',$skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('judul_skripsi',$skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($skripsi) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->group_start()->where('nim',$nim)->or_like('nim',$nim)->group_end();
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('nim',$nim)->or_like('nim',$nim)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($skripsi) AND empty($nim) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS',$prodi)->group_end();
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('nama_PS',$prodi)->or_like('nama_PS',$prodi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($prodi) AND empty($skripsi) AND empty($nim) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->where('Tgl_lulus', $tgl_a);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($prodi) AND empty($skripsi) AND empty($nim) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->where('Tgl_lulus', $tgl_t);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($prodi) AND empty($cari) AND empty($tgl_t) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
			$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($nim) AND empty($cari) AND empty($tgl_t) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($nim) AND empty($cari) AND empty($tgl_t) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
			$this->db->where('Tgl_lulus', $tgl_a);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($nim) AND empty($cari) AND empty($tgl_a) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi', $skripsi)->group_end();
			$this->db->where('Tgl_lulus', $tgl_t);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($tgl_a) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->where('Tgl_lulus', $tgl_a);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

		else if(empty($skripsi) AND empty($cari) AND empty($prodi) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
			$this->db->where('Tgl_lulus', $tgl_t);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nim', $nim)->or_like('nim', $nim)->group_end();
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($nim) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
			$this->db->where('Tgl_lulus', $tgl_a);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		$this->db->where('Tgl_lulus', $tgl_a);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($skripsi) AND empty($cari) AND empty($nim) AND empty($tgl_a))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
			$this->db->where('Tgl_lulus', $tgl_t);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('nama_PS', $prodi)->or_like('nama_PS', $prodi)->group_end();
		$this->db->where('Tgl_lulus', $tgl_t);
		}
	
	$query= $this->db->get();
	return $query;
	}


	else if(empty($skripsi) AND empty($cari) AND empty($nim) AND empty($prodi))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->where($where);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->where($where);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($prodi) AND empty($tgl_t))
	{
		if($pil == 'all')
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
			$this->db->where('nim', $nim);
			$this->db->group_start()->where('judul_skripsi',$skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->where('status',$pil);
		$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$this->db->where('nim', $nim);
		$this->db->group_start()->where('judul_skripsi',$skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($cari))  //rombak dengan banyak kondisi
	{
	

	if($pil == 'all')
		
		{
			$this->db->select('*');
			$this->db->from('v_script');
			$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
			$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
			$this->db->where('nim',$nim);
			$this->db->where('nama_PS', $prodi);
			$this->db->where($where);
		$this->db->limit($page,$off);
		}

		else
		{
		$this->db->select('*');
		$this->db->from('v_script');
		$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
		$this->db->where('status',$pil);
		$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		$this->db->where('nim',$nim);
		$this->db->where('nama_PS', $prodi);
		$this->db->where($where);
		$this->db->limit($page,$off);
		}
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_a) AND empty($tgl_t))
	{
		
		if($pil == 'all')
		{
			$this->db->select('*');
	$this->db->from('v_script');
	$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
	$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		$this->db->where('nim',$nim);
		$this->db->where('nama_PS', $prodi);
		}

		else
		{
		$this->db->select('*');
	$this->db->from('v_script');
	$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
	$this->db->group_start()->where('judul_skripsi', $skripsi)->or_like('judul_skripsi',$skripsi)->group_end();
		$this->db->where('nim',$nim);
		$this->db->where('nama_PS', $prodi);
	$this->db->where('status',$pil);
		}
		
	
	$query= $this->db->get();
	return $query;
	}

	else if(empty($tgl_t)) //rombak banyak kondisi
	{
		$this->db->select('*');
	$this->db->from('v_script');
	$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
	$this->db->where('status',$pil);
	$this->db->where('Tgl_lulus', $tgl_a);
	
	$query= $this->db->get();
	return $query;
	}

	else //rombak banyak kondisi
	{
	
	$this->db->select('*');
	$this->db->from('v_script');
	$this->db->group_start()->where('Dosen_Pembimbing1',$cari)->or_where('Dosen_Pembimbing2',$cari)->or_like('Dosen_Pembimbing1',$cari)->or_like('Dosen_Pembimbing2',$cari)->group_end();
	$this->db->where('status',$pil);
	$this->db->where($where);
	
	$query= $this->db->get();

	return $query;
	}
}
}
