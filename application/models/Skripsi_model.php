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
	$this->db->from('v_script');
    if($page != 'all')
    {
        $this->db->limit($page,$off);
    }
    
	$query = $this->db->get();
	return $query;
}

function get_akun_user_by($username)
{
    $this->db->select('*')->from('user')->where('username', $username);
    return $this->db->get();
}
    
    function save_new_user($data)
    {
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }
    
function cek_available_akun($id,$tabel,$diff)
{
	$this->db->select('*')->from($tabel)->where($diff,$id);
	return $this->db->get();
}

function simpan_akun($data,$tabel)
{
	$this->db->insert($tabel,$data);
	return $this->db->insert_id();
}
function get_akun()
{
	//$query = "SELECT a.nim,a.nama,b.nama_PS,c.username,c.level FROM ((mahasiswa a join program_studi b) join user c) WHERE a.id_PS = b.id_PS AND a.nim = c.username";

	$this->db->select('a.nim,a.nama,b.nama_PS,c.username,c.level')->from('mahasiswa a')->join('program_studi b','a.id_PS = b.id_PS')->join('user c','a.nim = c.username');
	return $this->db->get();
}
    
function get_akun_user()
{
    $this->db->select('*')->from('user')->where('level !=', '2')->where('level !=', '3')->group_start()->where('prodi', $_SESSION['prodi'])->or_where('prodi', '')->group_end();
    return $this->db->get();
}

function get_akun_dosen()
{
	$this->db->select('*')->from('dosen a')->join('program_studi b', 'a.Kode_PS = b.id_PS')->join('user c', 'a.Kode_dosen = c.kd_dsn');
	return $this->db->get();
}

function get_akun_by_nim($nim)
{
	//$query = "SELECT a.nim,a.nama,b.nama_PS,c.username,c.level FROM ((mahasiswa a join program_studi b) join user c) WHERE a.id_PS = b.id_PS AND a.nim = c.username";

	$this->db->select('a.nim, a.nama, a.id_PS, a.status,a.sks, a.upload_sempro, a.upload_semhas, a.upload_sidang, a.upload_validasi, a.uji_program, b.nama_PS,b.syarat_sks,c.username')->from('mahasiswa a')->join('program_studi b','a.id_PS = b.id_PS')->join('user c','a.nim = c.username')->where('a.nim',$nim);
	return $this->db->get();
}

function get_paged_list_count()
{
	$this->db->select('*');
	$this->db->from('v_script');
	$query = $this->db->get();
	return $query;
	//	return $this->db->get($this->table_name);
	/*if(empty($order_column)|| empty($order_type))
	$this->db->order_by($this->primary_key,'asc');
	else
	$this->db->order_by($order_column,$order_type);
	return $this->db->get($this->table_name,$limit, $offset);*/
	
}
    
function get_status($nim)
{
    $this->db->select('status')->from('mahasiswa')->where('nim',$nim);
    return $this->db->get();
}

function get_date($nim)
{
	$this->db->where($this->primary_key2,$nim);
	return $this->db->get($this->table_name2);
}
function get_paged_list_update($kd)
{
	$this->db->select('*')->from('v_script')->where('nim',$kd);
	return $this->db->get();
	
}

function get_data($nim)
{
	$this->db->select('*')->from('v_script')->where('nim',$nim);
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
    
    function get_penilaian_seminar($nim, $seminar)
    {
        $this->db->select('a.id_jadwal_seminar, a.nim, a.nama, a.nama_PS, a.Dosen_Pembimbing1, a.Dosen_Pembimbing2, a.id_pengajuan, a.status_kelayakan_sempro, b.judul, c.jadwal, b.status_kelayakan_semhas, a.status_kelayakan');
        $this->db->from('v_mahasiswa_seminar a');
        $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
        $this->db->join('jadwal_seminar c', 'a.id_jadwal_seminar = c.id');
        
        if($seminar == 'sempro')
        {
        $this->db->join('penilaian_sempro d', 'a.id_jadwal_seminar = d.id_jadwal_seminar');
        }
        else if($seminar == 'semhas')
        {
            $this->db->join('penilaian_semhas d', 'a.id_jadwal_seminar = d.id_jadwal_seminar');
        }
         else if($seminar == 'sidang')
        {
            $this->db->join('catatan_perbaikan_sidang d', 'a.id_jadwal_seminar = d.id_jadwal_seminar');
        }
        
        $this->db->where('a.nim', $nim);
        
        if($seminar == 'sempro'){
        $this->db->where('c.seminar', 'seminar proposal');
        }
        else if($seminar == 'semhas')
        {
            $this->db->where('c.seminar', 'seminar hasil');
        }
        else if($seminar == 'sidang')
        {
            $this->db->where('c.seminar', 'sidang');
        }
        $this->db->order_by('a.id_pengajuan', 'DESC');
//        $this->db->group_by('a.id_jadwal_seminar');
        
        return $this->db->get();
    }
    
    function get_perbaikan_sidang($nim, $id_pengajuan, $id_seminar)
    {
        $this->db->select('a.id, a.dosen, a.status_dosen, a.nim, a.id_pengajuan, a.id_jadwal_seminar, a.catatan_perbaikan, a.status_perbaikan, a.keterangan_catatan, b.Nama_dosen');
        $this->db->from('catatan_perbaikan_sidang a');
        $this->db->join('dosen b', 'a.dosen = b.Kode_dosen');
        
        if($id_pengajuan == null)
        {
            $this->db->join('mahasiswa_sidang c', 'a.id_jadwal_seminar = c.id_jadwal_seminar');
            $this->db->where('c.status_kelayakan', 'layak');
        }
        $this->db->where('a.nim', $nim);
        
        if($id_pengajuan != null) {
        $this->db->where('a.id_pengajuan', $id_pengajuan);
        $this->db->where('a.id_jadwal_seminar', $id_seminar);
        }
        $this->db->order_by('a.status_dosen');
        
        return $this->db->get();
    }
    
    function get_all_perbaikan_skripsi($nim)
    {
        $this->db->select('a.id, a.dosen, a.status_dosen, a.nim, a.id_pengajuan, a.id_jadwal_seminar, a.catatan_perbaikan, a.status_perbaikan, a.keterangan_catatan, b.Nama_dosen,a.kunci');
        $this->db->from('catatan_perbaikan_sidang a');
        $this->db->join('dosen b', 'a.dosen = b.Kode_dosen');
        $this->db->join('mahasiswa_sidang c', 'a.id_jadwal_seminar = c.id_jadwal_seminar');
        $this->db->where('a.nim', $nim);
        $this->db->where('c.status_kelayakan', 'layak');
        
        return $this->db->get();
    }
    
    function get_all_catatan_perbaikan($kd_dsn, $nim, $status_dosen, $id_pengajuan, $id_jadwal_seminar,$status_perbaikan)
    {
        $this->db->select('*');
        $this->db->from('catatan_perbaikan_sidang');
        
        if($status_perbaikan != 'both' AND $status_perbaikan != 'all') {
            $this->db->where('dosen', $kd_dsn);
            $this->db->where('status_dosen', $status_dosen);
        }
        
        $this->db->where('nim', $nim);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->where('id_jadwal_seminar', $id_jadwal_seminar);
        
        if($status_perbaikan == 'both')
        {
            $this->db->where('status_perbaikan', 'sudah');
            $this->db->where('keterangan_catatan', '');
        }
        else if($status_perbaikan == 'status_perbaikan')
        {
            $this->db->where('status_perbaikan', 'sudah');
        }
        else if($status_perbaikan == 'cek_verified')
        {
            $this->db->where('kunci', 'locked');
        }
        
        return $this->db->get();
    }
    
    function get_mhs()
    {
        $this->db->select('*')->from('mahasiswa a')->join('program_studi b', 'a.id_PS = b.id_PS')->order_by('a.nim', 'DESC');
        return $this->db->get();
    }
    
    function get_pengumuman_seminar($nim, $status = null)
    {
        $this->db->select('b.seminar, a.status_dilihat, a.id, a.id_pengajuan, b.jadwal, c.judul');
        $this->db->from('mahasiswa_sidang a');
        $this->db->join('jadwal_seminar b', 'a.id_jadwal_seminar = b.id');
        $this->db->join('pengajuan_judul c', 'a.id_pengajuan = c.id_pengajuan');
        $this->db->where('a.nim', $nim);
        if($status != null) { 
        $this->db->where('a.status_dilihat', 'belum');
        }
        $this->db->order_by('b.jadwal', 'DESC');
        
        return $this->db->get();
    }
    
    function get_catatan_sidang_pindah($nim, $id_pengajuan, $id_jadwal_seminar)
    {
        $this->db->select('*')->from('catatan_perbaikan_sidang')->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->where('id_jadwal_seminar', $id_jadwal_seminar);
        
        return $this->db->get();
    }
    
    function simpan_catatan_sidang_baru($data_pindahan)
    {
        $this->db->insert('catatan_perbaikan_semhas', $data_pindahan);
        return $this->db->insert_id();
    }
}
