<?php 

class Profil_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}

	function get_profil($nim)
	{

		$this->db->select('*')->from('mahasiswa')->where('nim',$nim);
		return $this->db->get();
	}
}