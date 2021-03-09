<?php

class Cari_model extends CI_Model {

private $primary_key='id_skripsi';
private $table_name='skripsi';
private $table_name2='v_cari_mahasiswa';

function __construct() {
	parent::__construct();
}

function cari_mahasiswa2()
{
	$this->db->select('*')->from('v_cari_mahasiswa');
	return $this->db->get();
}
function cari_mahasiswa($key,$status,$status2)
{

	$this->db->select('*')->from('v_cari_mahasiswa');

	if($status=='pembimbing1')
	{
		$this->db->group_start()->where('pembimbing1',$key)->or_like('pembimbing1',$key)->group_end();
	}

	else if($status=='pembimbing2')
	{
		$this->db->group_start()->where('pembimbing2',$key)->or_like('pembimbing2',$key)->group_end();	
	}

	if($status2 != 'all'){
	$this->db->where('status',$status2);
	}
	return $this->db->get();
}

function cariin($skripsi,$nim,$prodi,$cari,$tgl_a,$tgl_t,$page, $off, $table)
{
	$where = "tahun_lulus BETWEEN '$tgl_a' AND '$tgl_t'";


	$this->db->select('*');
	$this->db->from($table);
	if(!empty($skripsi))
	{
		//echo "dsfdsfdsdsds";die();
		if(empty($cari) AND empty($nim) and empty($tgl_a) AND empty($tgl_t) AND $prodi == 'all')
		{
			
			$this->db->where('judul', $skripsi)->or_like('judul',$skripsi);

		}
		else
		{
			$this->db->group_start()->where('judul', $skripsi)->or_like('judul',$skripsi)->group_end();
			

		}
	}
	if(!empty($nim))
	{
		$this->db->where('nim',$nim);
	}
	if($prodi != 'all')
	{
		$this->db->where('nama_PS',$prodi);
	}
	if(!empty($cari))
	{
		if(empty($nim) and empty($tgl_a) AND empty($tgl_t) AND $prodi == 'all')
		{
		
			$this->db->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari);
		}
		else
		{

			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();

		}
	}

	if(!empty($tgl_a) AND !empty($tgl_t))
	{
		$this->db->where($where);
	}
	if(!empty($tgl_a))
	{
		$this->db->where('tahun_lulus',$tgl_a);
	}
	if(!empty($tgl_t))
	{
		$this->db->where('tahun_lulus', $tgl_t);
	}

	$this->db->limit($page,$off);	
	$query= $this->db->get();
	return $query;
}

function jumlah_cariin($skripsi,$nim,$prodi,$cari,$tgl_a,$tgl_t,$table)
{
	$where = "tahun_lulus BETWEEN '$tgl_a' AND '$tgl_t'";

	$this->db->select('*');
	$this->db->from($table);
	if(!empty($skripsi))
	{
		//echo "dsfdsfdsdsds";die();
		if(empty($cari) AND empty($nim) and empty($tgl_a) AND empty($tgl_t) AND $prodi == 'all')
		{
			
			$this->db->where('judul', $skripsi)->or_like('judul',$skripsi);
		}
		else
		{
			
			$this->db->group_start()->where('judul', $skripsi)->or_like('judul',$skripsi)->group_end();

		}
	
	}
	if(!empty($nim))
	{
		$this->db->where('nim',$nim);
	}
	if(!empty($prodi))
	{
		if($prodi != 'all')
		{
			$this->db->where('nama_PS',$prodi);
		}
	}
	if(!empty($cari))
	{
		if(empty($nim) and empty($tgl_a) AND empty($tgl_t) AND $prodi == 'all')
		{
		
			$this->db->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari);
		}
		else
		{

			$this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();

		}
	}

	if(!empty($tgl_a) AND !empty($tgl_t))
	{
		$this->db->where($where);
	}
	if(!empty($tgl_a))
	{
		$this->db->where('tahun_lulus',$tgl_a);
	}
	if(!empty($tgl_t))
	{
		$this->db->where('tahun_lulus', $tgl_t);
	}

	$query= $this->db->get();
	return $query;
}
}

/*

function search($skripsi,$nim,$prodi,$cari,$tgl_a,$tgl_t,$pil,$page, $off)
{

	$search = array();
	$a = 0;

	if(empty($skripsi))
	{
		$a = $a + 0;
	}
	else
	{
		$a = $a+1;
		$search[$a] = "(judul_skripsi = '$skripsi' OR judul_skripsi LIKE '%$skripsi%')";
	}

	if(empty($nim))
	{
		$a = $a+0;
	}
	else
	{
		$a = $a+1;
		//$search[$a] = $this->db->where('nim',$nim);
		$search[$a] = "nim = '$nim'";
		//var_dump($search[$a]);die();

	}

	if($prodi == 'all')
	{
		$a = $a+0;
	}
	else
	{
		$a = $a+1;
		//$search[$a] = $this->db->where('nama_PS',$prodi);
		$search[$a] = "nama_PS = '$prodi'";
	}

	if(empty($cari))
	{
		$a = $a + 0;
	}
	else
	{
		$a = $a+1;
		//$search[$a] = $this->db->group_start()->where('Dosen_Pembimbing1', $cari)->or_like('Dosen_Pembimbing1', $cari)->or_where('Dosen_Pembimbing2', $cari) ->or_like('Dosen_Pembimbing2', $cari)->group_end();
		$search = "(Dosen_Pembimbing1 = '$cari' or Dosen_Pembimbing1 LIKE '%cari%' OR Dosen_Pembimbing2 = '$cari' OR Dosen_Pembimbing2 LIKE '%cari%')";
	}

	if(empty($tgl_a) AND empty($tgl_t))
	{
		$a = $a+0;
	}
	else if(empty($tgl_a))
	{
		$a = $a+1;
		//$search[$a] = $this->db->where('Tgl_lulus', $tgl_a);
		$search[$a] = "Tgl_lulus = '$tgl_a'";
	}
	else if(empty($tgl_t))
	{
		$a = $a+1;
		//$search[$a] = $this->db->where('Tgl_lulus',$tgl_t);
		$search[$a] = "Tgl_lulus = '$tgl_t'";
	}
	else
	{
		$where = "Tgl_lulus BETWEEN '$tgl_a' AND '$tgl_t'";
		$a = $a+1;
		//$search[$a] = $this->db->where($where);
		$search[$a] = "(Tgl_lulus BETWEEN '$tgl_a' AND '$tgl_t')";
	}

	if($pil == 'all')
	{
		$a = $a+0;
	}
	else
	{
		$a = $a+1;
		//$search[$a] = $this->db->where('status',$pil);
		$search[$a] = "status = '$pil'";
	}

	$teks = "";
	if($a == 0)
	{
		$teks = "";
	}
	else if($a == 1)
	{
		$teks = " WHERE ". $search[$a];
		var_dump($teks); die();
	}
	else
	{
		$teks = " WHERE ";
		for($i=1;$i<=$a;$i++)
		{
			if($i<$a)
				{
					$teks = $teks.$search[$i]. " AND ";
				}
			else
			{
				$teks = $teks.$search[$i];
			}
		}
	}

//var_dump($sql); die();
	$this->db->select('*');
	$this->db->from('v_script');
	$this->db->
	$query = $this->db->get();
	var_dump($query);die();
	return $query;

		
}

*/