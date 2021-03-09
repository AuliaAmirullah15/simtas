<?php

class pembimbing_model extends CI_Model
{
	private $table_name = 'pembimbing';
	
	function __construct() {
	parent::__construct();
}

    function simpan_dosen_baru($data)
    {
        $this->db->insert('dosen', $data);
        return $this->db->insert_id();
    }
    
	function cek($nim)
	{
		$this->db->select('*')->from('pembimbing')->where('nim',$nim);
		return $this->db->get();
	}

	function insert($input)
	{
		$this->db->insert($this->table_name,$input);
		return $this->db->insert_id();
}
	function update($nim,$data)
	{
		$this->db->where('nim',$nim);
		$this->db->update($this->table_name,$data);

	}

	function get_dosen($nim)
	{
		$this->db->select('*')->from('pembimbing')->where('nim',$nim);
		return $this->db->get();
	}

	function insert_pembanding($person)
	{
		$this->db->insert('pembanding',$person);
		return $this->db->insert_id();
	}

	function insert_nilai($nilai)
	{
		$this->db->insert('nilai',$nilai);
		return $this->db->insert_id();
	}

	function update_pembanding($data,$nim)
	{
		$this->db->where('nim',$nim)->update('pembanding',$data);
	}
	function get_pembanding($id)
	{
		$this->db->select('*')->from('jadwal_seminar')->where('id',$id);
		return $this->db->get();
	}

	function get_pembanding_nim($nim)
	{
		$this->db->select('*')->from('pembanding')->where('nim',$nim);
		return $this->db->get();
	}
}