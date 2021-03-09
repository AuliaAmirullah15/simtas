<?php

class upload_model extends CI_Model
{
	private $table_name = 'pengajuan_judul';
	private $primary_key = 'id_pengajuan';
	function __construct() {
	parent::__construct();
}

	function get($nim)
	{
		$this->db->select('status,status_kelayakan')->from('pengajuan_judul')->where('nim',$nim);
		return $this->db->get();
	}

	function get_data($nim,$status)
	{
		$this->db->select('*')->from('pengajuan_judul')->where('nim',$nim)->where('status',$status);
		return $this->db->get();
	}

	function get_data_available($nim)
	{
		$this->db->select('*')->from('pengajuan_judul')->where('nim',$nim)->where('status','simpan sementara');
		return $this->db->get();
	}

	function edit_pengajuan($id_pengajuan,$data)
	{
		$id_pengajuan = (int)$id_pengajuan;
		$this->db->where($this->primary_key,$id_pengajuan);
		$this->db->update($this->table_name,$data);
	}

	function get_list_judul($nim)
	{
		$this->db->select('*')->from('pengajuan_judul')->where('nim',$nim)->where('status !=', 'simpan sementara');
		return $this->db->get();
	}

	function get_data_pengajuan($nim)
	{
		$this->db->select('*')->from('pengajuan_judul')->where('nim',$nim)->group_start()->where('status_kelayakan','belum dikonfirmasi')->or_where('status_kelayakan','diterima')->group_end();
		return $this->db->get();
	}

	function get_nama($nim)
	{
		$this->db->select('*')->from('mahasiswa')->join('program_studi','program_studi.id_PS = mahasiswa.id_PS')->where('nim',$nim);
		return $this->db->get();
	}

	function get_all_data()
	{
		$this->db->select('*')->from('pengajuan_judul')->where('status_kelayakan','belum dikonfirmasi');
		return $this->db->get();
	}
	function get_data_by_id($id)
	{
		
		$this->db->select('*')->from('pengajuan_judul')->where('id_pengajuan',$id);
		return $this->db->get();
	}

	function save_uji_program($nim,$file)
	{
		$data = array(
				'nim' => $nim,
				'persetujuan_semhas' => $file
			);
		$this->db->insert('semhas',$data);
	return $this->db->insert_id();
	}

	function cek_semhas($nim)
	{
		$this->db->select('*')->from('semhas')->where('nim',$nim);
		return $this->db->get();
	}

	function cek_semhas_persetujuan($nim)
	{
		$this->db->select('*')->from('semhas')->where('nim',$nim)->where('status', 'belum dikonfirmasi')->or_where('status', 'diterima');
		return $this->db->get();
	}

	function cek_penilaian($nim,$seminar)
	{
		$this->db->select('*')->from('nilai_detail')->where('nim',$nim)->where('kategori',$seminar);
		return $this->db->get();
	}

	function save_nilai_mhs($nim,$data)
	{
		$this->db->insert('nilai_detail',$data);
		return $this->db->insert_id();
	}

	function update_nilai_mhs($nim,$seminar,$data)
	{
		$this->db->where('nim',$nim)->where('kategori',$seminar)->update('nilai_detail',$data);
	}

	function get_nilai($nim,$seminar)
	{
		$this->db->select('*')->from('nilai_detail')->where('nim',$nim)->where('kategori',$seminar);
		return $this->db->get();
	}

	function get_total($nim,$seminar)
	{
		if($seminar == 'sidang')
		{
			$this->db->select('nilai_sidang')->from('nilai')->where('nim',$nim);
		}

		else
		{
			$this->db->select('nilai_semhas')->from('nilai')->where('nim',$nim);
		}

		return $this->db->get();
	}

	function cek_sidang($nim)
	{
		$this->db->select('*')->from('mahasiswa')->where('nim',$nim)->where('status','sudah sidang');
		return $this->db->get();
	}

}