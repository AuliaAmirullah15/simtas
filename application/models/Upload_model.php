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

	function get_sempro_allowed($nim)
	{
		$this->db->select('status,status_kelayakan')->from('pengajuan_judul')->where('nim',$nim)->where('status_kelayakan', 'diterima');
		return $this->db->get();
	}

	function get_profil()
	{
		$username = $_SESSION['username'];
		$password = $_SESSION['password'];
		$level = $_SESSION['level'];

		$this->db->select('*')->from('user')->where('username',$username)->where('password',$password)->where('level',$level);
		return $this->db->get();
	}

	function get_data($nim,$status)
	{
		$this->db->select('*')->from('pengajuan_judul')->where('nim',$nim)->where('status',$status);
		return $this->db->get();
	}

	function cek_headline()
	{
		$this->db->select('*')->from('berita')->where('headline','1');
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
		$this->db->select('*');
        $this->db->from('pengajuan_judul');
        $this->db->where('nim',$nim);
         if($_SESSION['judul'] == 'all'){ 
        $this->db->group_start()->where('status_kelayakan','belum dikonfirmasi')->or_where('status_kelayakan','diterima')->group_end();
         }
        else {
            $this->db->where('id_pengajuan', $_SESSION['judul']);
        }
		return $this->db->get();
	}
    
    function get_izinnya($jenis_seminar, $nim, $dopim)
    {
        $this->db->select('a.nim, a.id_pengajuan, a.pembimbing1, a.pembimbing2, a.penguji1, a.penguji2, a.jenis_seminar, a.rencana_tgl_seminar')->from('izin_seminar a')-> join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan')->where('a.nim', $nim)->where('a.jenis_seminar', $jenis_seminar)->where('b.status_kelayakan', 'diterima');
        
        return $this->db->get();
    }

	function get_nama($nim)
	{
		$this->db->select('*')->from('mahasiswa')->join('program_studi','program_studi.id_PS = mahasiswa.id_PS')->where('nim',$nim);
		return $this->db->get();
	}

	function get_all_data($pengajuan_judul='all')
	{
        if($_SESSION['prodi'] == '')
        {
//            if($pengajuan_judul == 'penolakan'){   
//                $this->db->select('a.id_penolakan, a.id_pengajuan, b.nim, a.file, b.tgl_pengajuan, a.waktu_penolakan, b.judul, a.catatan_validasi,b.jenis_TA, a.status_validasi')->from('riwayat_penolakan_pengajuan a')->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan')->order_by('a.id_penolakan', 'DESC');
//            }
//            else if($pengajuan_judul != 'all'){
//		      $this->db->select('*')->from('pengajuan_judul')->where('status_validasi',$pengajuan_judul)->order_by('id_pengajuan','DESC');
//            }
//            else{
//                $this->db->select('*')->from('pengajuan_judul')->order_by('id_pengajuan','DESC');
//            }
            
            $this->db->select('*')->from('pengajuan_judul')->order_by('id_pengajuan','DESC');
        }
        else
        {
//            if($pengajuan_judul == 'penolakan'){
//                $this->db->select('a.id_penolakan, a.id_pengajuan, b.nim, a.file, b.tgl_pengajuan, a.waktu_penolakan, b.judul, a.catatan_validasi, b.jenis_TA, a.status_validasi')->from('riwayat_penolakan_pengajuan a')->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan')->join('mahasiswa c', 'b.nim = c.nim')->where('c.id_PS', $_SESSION['prodi'])->order_by('a.id_penolakan', 'DESC');
//            }
//            else if($pengajuan_judul != 'all'){
//                 $this->db->select('*')->from('pengajuan_judul a')->join('mahasiswa b', 'a.nim = b.nim')->where('status_validasi',$pengajuan_judul)->where('b.id_PS', $_SESSION['prodi'])->order_by('a.id_pengajuan','DESC'); 
//            }
//             
//            else{
//                $this->db->select('*')->from('pengajuan_judul a')->join('mahasiswa b', 'a.nim = b.nim')->where('b.id_PS', $_SESSION['prodi'])->order_by('a.id_pengajuan','DESC'); 
//            }
          
             $this->db->select('*')->from('pengajuan_judul a')->join('mahasiswa b', 'a.nim = b.nim')->where('b.id_PS', $_SESSION['prodi'])->order_by('a.id_pengajuan','DESC'); 
            
        }
		return $this->db->get();
	}

	function get_nim_by_id($id)
	{
		$this->db->select('nim')->from('validasi_penggandaan')->where('id',$id);
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
    
    function get_berkas_sempros($nim, $jenis_berkas)
    {
          $this->db->select('a.id,a.nim, a.tgl_upload, b.nama, a.nama_file, a.orig_name, a.status, c.fotokopi_krs, c.fotokopi_kelunasan_spp, c.lembar_kendali_prasempro, c.id as id_validasi_sempro, d.id_pengajuan');
          $this->db->from('berkas_validasi a');
          $this->db->join('mahasiswa b','a.nim = b.nim');
          $this->db->join('validasi_sempro c', 'a.nim = c.nim');
          $this->db->join('pengajuan_judul d', 'c.id_pengajuan_judul = d.id_pengajuan');
           $this->db->where('a.jenis_berkas',$jenis_berkas);
                
            if($_SESSION['prodi'] != '' AND $_SESSION['level'] != '2') 
            {
                
                $this->db->where('b.id_PS', $_SESSION['prodi']);
            }
            
            $this->db->group_start();
            $this->db->where('a.status_verifikasi', 'belum dikonfirmasi');
            $this->db->or_where('a.status_verifikasi', 'belum dikonfirmasi');
            $this->db->group_end();
            
            $this->db->order_by('a.id','DESC');
            $this->db->group_by('a.nim');
          
        return $this->db->get();
        
    }
    
    function get_berkas($nim,$jenis_berkas)
    {
//        if($nim != null) {
//        $this->db->select('*')->from('berkas_validasi')->where('nim',$nim)->where('jenis_berkas',$jenis_berkas);
//        }
//        
//        else {
//            if($_SESSION['prodi'] != '') {
//            $this->db->select('a.id,a.nim, a.tgl_upload, b.nama, a.nama_file, a.orig_name, a.status')->from('berkas_validasi a')->join('mahasiswa b','a.nim = b.nim')->where('jenis_berkas',$jenis_berkas)->where('b.id_PS', $_SESSION['prodi'])->order_by('id','DESC');
//            } else {
//               $this->db->select('a.id,a.nim, a.tgl_upload, b.nama, a.nama_file, a.orig_name, a.status')->from('berkas_validasi a')->join('mahasiswa b','a.nim = b.nim')->where('jenis_berkas',$jenis_berkas)->order_by('id','DESC'); 
//            }
//        }
        
        if($nim != null) {
        $this->db->select('*')->from('berkas_validasi')->where('nim',$nim)->where('jenis_berkas',$jenis_berkas);
        }
        
        else {
            
            if($jenis_berkas == 'sempro'){
                 $this->db->select('a.id,a.nim, a.tgl_upload, b.nama, a.nama_file, a.orig_name, a.status, c.fotokopi_krs, c.fotokopi_kelunasan_spp, c.lembar_kendali_prasempro, c.id as id_validasi_sempro, d.id_pengajuan');
            }
            else if($jenis_berkas == 'semhas')
            {
                 $this->db->select('a.id,a.nim, a.tgl_upload, b.nama, a.nama_file, a.orig_name, a.status, c.fotokopi_krs, c.fotokopi_sk_dopim, c.fotokopi_kelunasan_spp,c.lembar_kendali_prasemhas, c.id as id_validasi_semhas, d.id_pengajuan');
            }
            else if($jenis_berkas == 'sidang')
            {
                $this->db->select('a.id,a.nim, a.tgl_upload, b.nama, a.nama_file, a.orig_name, a.status,c.buku_bimbingan, c.kartu_kemajuan_mahasiswa, c.lembar_kendali_prasidang,c.draf_jurnal, c.fotokopi_krs, c.fotokopi_slip_spp, c.sk_dopim, c.id as id_validasi_sidang, d.id_pengajuan');
            }
            else if($jenis_berkas == 'validasi_aplikasi')
            {
                 $this->db->select('a.id,a.nim, a.tgl_upload, b.nama, a.nama_file, a.orig_name, a.status, c.cd_kode_jurnal, c.form_persetujuan, c.fotokopi_bebas, c.id as id_validasi_penggandaan, d.id_pengajuan');
            }
            
            else {
            $this->db->select('a.id,a.nim, a.tgl_upload, b.nama, a.nama_file, a.orig_name, a.status');
            }
            
            $this->db->from('berkas_validasi a');
            $this->db->join('mahasiswa b','a.nim = b.nim');
            
            if($jenis_berkas == 'sempro')
            {
                $this->db->join('validasi_sempro c', 'a.nim = c.nim');
                $this->db->join('pengajuan_judul d', 'c.id_pengajuan_judul = d.id_pengajuan');
            }
            else if($jenis_berkas == 'semhas')
            {
                $this->db->join('validasi_semhas c', 'a.nim = c.nim');
                $this->db->join('pengajuan_judul d', 'c.id_pengajuan_judul = d.id_pengajuan');
            }
            else if($jenis_berkas == 'sidang')
            {
                $this->db->join('validasi_sidang c', 'a.nim = c.nim');
                $this->db->join('pengajuan_judul d', 'c.id_pengajuan_judul = d.id_pengajuan');
            }
            else if($jenis_berkas == 'validasi_aplikasi')
            {
                $this->db->join('validasi_penggandaan c', 'a.nim = c.nim');
                $this->db->join('pengajuan_judul d', 'c.id_pengajuan_judul = d.id_pengajuan');
            }
            
            $this->db->where('a.jenis_berkas',$jenis_berkas);
                
            if($_SESSION['prodi'] != '' AND $_SESSION['level'] != '2') 
            {
                
                $this->db->where('b.id_PS', $_SESSION['prodi']);
            }
            
            $this->db->group_start();
            $this->db->where('a.status_verifikasi', 'belum dikonfirmasi');
            $this->db->or_where('a.status_verifikasi', 'belum dikonfirmasi');
            $this->db->group_end();
            
            $this->db->order_by('a.id','DESC');
//            $this->db->group_by('a.nim');
        
        }
        
        return $this->db->get();
    }
    
    function dapat_berkas($nim,$jenis_berkas,$status_submit)
    {
        $this->db->select('*')->from('berkas_validasi')->where('nim',$nim)->where('jenis_berkas',$jenis_berkas)->where('status_submit',$status_submit);
        return $this->db->get();
    }
    
    function upd_status($tabele, $data)
    {
        $this->db->insert($tabele,$data);
        return $this->db->insert_id();
    }
    function simpan_berkas($data)
    {
        $this->db->insert('berkas_validasi', $data);
        return $this->db->insert_id();
    }

	function cek_semhas($nim)
	{
		$this->db->select('*')->from('semhas')->where('nim',$nim)->order_by('id','DESC')->limit(1);
		return $this->db->get();
	}

	function save_berita($data)
	{
		$this->db->insert('berita',$data);
		return $this->db->insert_id();
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
		if($seminar == 'seminar%20hasil')
		{
			$seminar = 'seminar hasil';
		}
		$this->db->select('*')->from('nilai_detail')->where('nim',$nim)->where('kategori',$seminar);
		return $this->db->get();
	}
	function get_nilai_total($nim)
	{
		$this->db->select('*')->from('nilai')->where('nim',$nim);
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
		$this->db->select('*')->from('mahasiswa')->where('nim',$nim)->group_start()->where('status','sudah sidang')->or_where('status','lulus')->group_end();
		return $this->db->get();
	}

	function get_id_pengajuan($id)
	{
		$this->db->select('id_pengajuan')->from('pengajuan_judul')->where('status_kelayakan','diterima')->where('nim',$id)->order_by('id_pengajuan');
		return $this->db->get();
	}

	function get_all_berita()
	{
		$this->db->select('*')->from('berita')->order_by('id','DESC');
		return $this->db->get();
	}

    function get_all_berita_display()
    {
        $this->db->select('*')->from('berita')->where('status','display')->order_by('id','DESC');
		return $this->db->get();
    }
	function get_all_berita_limit()
	{
		$this->db->select('*')->from('berita')->order_by('id','DESC')->limit(5);
		return $this->db->get();
	}

	function get_berita_by_id($id)
	{
		$this->db->select('*')->from('berita')->where('id',$id);
		return $this->db->get();
	}

	function get_all_berita_headline($halaman,$page)
	{
		$this->db->select('*')->from('berita')->where('status','display')->order_by('id','DESC')->limit($halaman,$page);
		return $this->db->get();
	}
    
    //NEW OCTOBER 2018
    function get_nim_by_pengajuan($id_pengajuan)
    {
        $this->db->select('nim')->from('pengajuan_judul')->where('id_pengajuan', $id_pengajuan);
        return $this->db->get();
    }

}