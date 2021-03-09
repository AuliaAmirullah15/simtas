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

function cek_available_skripsi_nim($nim)
{
    $this->db->select('*')->from('skripsi_nim')->where('nim',$nim);
    return $this->db->get();
}

function cek_sementaranya($nim)
{
    $this->db->select('*')->from('berkas_validasi')->where('status_submit','simpan_sementara');
    return $this->db->get();
}

function get_nim($id)
{
	$this->db->select('*')->from('pengajuan_judul')->where('id_pengajuan',$id);
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

function input_skripsi_nims($data)
{
    $this->db->insert('skripsi_nim',$data);
    return $this->db->insert_id();
}

function insert_skripsi($data)
{
	$this->db->insert('pengajuan_judul',$data);
	return $this->db->insert_id();
}

function get_data()
{
	// $query = "SELECT a.nim,a.judul_skripsi, b.jenis_ta FROM (skripsi a join pengajuan_judul b) WHERE a.nim = b.nim AND statu"
	$this->db->select('*')->from('skripsi')->where('status','seminar proposal')->order_by('id_skripsi','DESC');
	return $this->db->get();
}

function save_validasi_berkas_sempro($data)
{
	$this->db->insert('validasi_sempro', $data);
	return $this->db->insert_id();
}

function edit_skripsi($nim, $id_seminar, $id_pengajuan)
{
	$data = array(
		'status' => 'pengajuan judul'
		);

	$datum = array(
		'status_kelayakan' => 'ditolak',
        'status_kelayakan_sempro' => 'tidak layak'
		);
    $array = array(
        'status' => 'pengajuan judul',
        'upload_sempro' => 1
    );
    $jadwal_seminar = array(
        'status_kelayakan' => 'tidak layak'
    );
	$this->db->where('nim',$nim)->update('skripsi',$data);
	$this->db->where('nim',$nim)->update('mahasiswa',$array);
	$this->db->where('nim',$nim)->where('status_kelayakan','diterima')->update('pengajuan_judul',$datum);
    $this->db->where('nim',$nim)->where('id_jadwal_seminar',$id_seminar)->where('id_pengajuan', $id_pengajuan)->update('mahasiswa_sidang',$jadwal_seminar);
}

function edit_script($nim, $id_seminar, $id_pengajuan)
{
	$data = array(
		'status' => 'seminar hasil'
		);

	$datum = array(
		'status' => 'belum semhas'
		);
    
    $datums = array(
        'status_kelayakan_sempro' => 'layak'
		);
    
    $jadwal_seminar = array(
        'status_kelayakan' => 'layak'
    );
  
    $this->db->where('nim',$nim)->where('status_kelayakan','diterima')->update('pengajuan_judul',$datums);
	$this->db->where('nim',$nim)->update('skripsi',$data);
	$this->db->where('nim',$nim)->update('mahasiswa',$datum);
    $this->db->where('nim',$nim)->where('id_jadwal_seminar',$id_seminar)->where('id_pengajuan', $id_pengajuan)->update('mahasiswa_sidang',$jadwal_seminar);
}
    
function cek_pembimbing($nim)
{
    $this->db->select('*')->from('pembimbing')->where('nim',$nim);
    return $this->db->get();
}

function cek_uji_program($nim)
{
	$this->db->select('*')->from('pengajuan_judul')->join('mahasiswa','pengajuan_judul.nim = mahasiswa.nim')->where('pengajuan_judul.nim',$nim)->where('pengajuan_judul.status_kelayakan','diterima')->group_start()->where('mahasiswa.status','belum semhas')->or_where('mahasiswa.status','belum sidang')->or_where('mahasiswa.status','sudah sidang')->or_where('mahasiswa.status','lulus')->group_end();
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

function get_jadwal_seminar($id)
{
	$this->db->select('*')->from('jadwal_seminar')->where('id',$id);
	return $this->db->get();
}

function get_jenis_ta($nim)
{
	$this->db->select('*')->from('pengajuan_judul')->where('nim',$nim)->order_by('id_pengajuan','DESC')->limit(1);
	return $this->db->get();
}

function syarat_sks($id_ps)
{
    $this->db->select('syarat_sks')->from('program_studi')->where('id_PS',$id_ps);
    return $this->db->get();
}
function available_bisa($nim)
{
    $this->db->select('*')->from('mahasiswa')->where('nim',$nim);
    return $this->db->get();
}
function get_seminar($id)
{
    $this->db->select('*')->from('jadwal_seminar')->where('id',$id);
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

function cek_available_seminar($nim,$id_seminar)
{
	$this->db->select('*')->from('mahasiswa_sidang')->where('nim',$nim)->where('id_jadwal_seminar',$id_seminar);
	return $this->db->get();
}

function edit_jadwal($nim,$data)
{
	$this->db->where('nim',$nim)->update('mahasiswa_sidang',$data);
}

function savekan($data)
{
	$this->db->insert('mahasiswa_sidang',$data);
	return $this->db->insert_id();
}

function cek_seminar($id)
{
	$this->db->select('seminar')->from('jadwal_seminar')->where('id',$id);
	return $this->db->get();
}
    
function get_lembar_kendali($jenis_seminar, $page, $off)
{
    $this->db->select('a.id, a.nim, a.id_pengajuan, a.tgl_penyerahan, a.tgl_selesai_diperiksa, a.tgl_terima_kembali,a.catatan, a.pembimbing, b.judul');
    $this->db->from('lembar_kendali_bimbingan a');
    $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
    $this->db->where('a.jenis_seminar', $jenis_seminar);
    $this->db->where('a.nim', $_SESSION['username']);
    if($_SESSION['judul'] != 'all'){
        $this->db->where('a.id_pengajuan', $_SESSION['judul']);
    }
    
    if($_SESSION['dosen'] != 'all')
    {
        $this->db->where('a.pembimbing', $_SESSION['dosen']);
    }

    $this->db->order_by('a.tgl_penyerahan','DESC');
    $this->db->limit($page, $off);
    return $this->db->get();
}
    
function get_lembar_kendali_count($jenis_seminar)
{
    
    $this->db->select('a.id, a.nim, a.id_pengajuan, a.tgl_penyerahan, a.tgl_selesai_diperiksa, a.tgl_terima_kembali,a.catatan, a.pembimbing, b.judul');
    $this->db->from('lembar_kendali_bimbingan a');
    $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
    $this->db->where('a.jenis_seminar', $jenis_seminar);
    $this->db->where('a.nim', $_SESSION['username']);
    
    if($_SESSION['judul'] != 'all'){
        $this->db->where('a.id_pengajuan',$_SESSION['judul']);
    }
    
    if($_SESSION['dosen'] != 'all')
    {
        $this->db->where('a.pembimbing', $_SESSION['dosen']);
    }

    $this->db->order_by('a.tgl_penyerahan','DESC');
    
    return $this->db->get();
}
    
function get_lembar_kendali_counting($jenis_seminar)
{
    
    $this->db->select('a.id, a.nim, a.id_pengajuan, a.tgl_penyerahan, a.tgl_selesai_diperiksa, a.tgl_terima_kembali,a.catatan, a.pembimbing, b.judul');
    $this->db->from('lembar_kendali_bimbingan a');
    $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
    $this->db->where('a.jenis_seminar', $jenis_seminar);
    $this->db->where('a.nim', $_SESSION['username']);
    $this->db->where('b.status_kelayakan_sempro', 'layak');
    $this->db->order_by('a.tgl_penyerahan','DESC');
    
    return $this->db->get();
}

function save_riwayat_bimbingan($data)
{
    $this->db->insert('lembar_kendali_bimbingan', $data);
    return $this->db->insert_id();
}

function get_data_riwayat_bimbingan($id)
{
    $this->db->select('a.id, a.nim, a.id_pengajuan, a.tgl_penyerahan, a.tgl_selesai_diperiksa, a.tgl_terima_kembali, a.catatan, a.pembimbing, b.judul')->from('lembar_kendali_bimbingan a')->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
    return $this->db->get();
}
    
function get_judul_by_nim($nim)
{
    $this->db->select('id_pengajuan, judul')->from('pengajuan_judul')->where('nim', $nim);
    return $this->db->get();
}
    
    function get_riwayat($jenis_seminar)
{
    $this->db->select('a.id, a.nim, a.id_pengajuan, a.tgl_penyerahan, a.tgl_selesai_diperiksa, a.tgl_terima_kembali,a.catatan, a.pembimbing, b.judul');
    $this->db->from('lembar_kendali_bimbingan a');
    $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
    $this->db->where('a.jenis_seminar', $jenis_seminar);
    $this->db->where('a.nim', $_SESSION['username']);
    
    if($_SESSION['judul'] != 'all'){
        $this->db->where('a.id_pengajuan', $_SESSION['judul']);
    }
    
    if($_SESSION['dosen'] != 'all')
    {
        $this->db->where('a.pembimbing', $_SESSION['dosen']);
    }

    $this->db->order_by('a.tgl_penyerahan','DESC');
    return $this->db->get();
}
    
    function get_riwayat_seminar($jenis_seminar, $pembimbing)
    {
       
        $this->db->select('a.id, a.nim, a.id_pengajuan, a.tgl_penyerahan, a.tgl_selesai_diperiksa, a.tgl_terima_kembali,a.catatan, a.pembimbing');
        $this->db->from('lembar_kendali_bimbingan a');
        $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
        $this->db->where('a.pembimbing', $pembimbing);
        $this->db->where('a.jenis_seminar', $jenis_seminar);
        
        return $this->db->get();
    }
    
    function get_izin_seminar($nim, $id_pengajuan, $sempro, $kolom = null)
    {
        $this->db->select('*');
        $this->db->from('izin_seminar');
        $this->db->where('nim', $nim);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->where('jenis_seminar', $sempro);
        
        if($kolom == 'pembimbing1')
        {
            $this->db->where('pembimbing1 !=', '0000-00-00');
        }
        else if($kolom == 'pembimbing2')
        {
            $this->db->where('pembimbing2 !=', '0000-00-00');
        }
        
        return $this->db->get();
    }
    
    function get_bimbingan($kd_dsn, $key1_nim, $status_pemb, $status_mhs, $halaman, $off)
    {
        $this->db->select('a.nim, a.nama, a.id_PS, a.status, a.kd_pemb1, a.kd_pemb2, b.nama_PS, c.judul_skripsi, d.pembanding1, d.pembanding2');
        $this->db->from('v_cari_mahasiswa a');
        $this->db->join('program_studi b', 'a.id_PS = b.id_PS');
        $this->db->join('skripsi c', 'a.nim = c.nim');
        $this->db->join('pembanding d', 'a.nim = d.nim');
        
        if($key1_nim != null or $key1_nim != '') {
            $this->db->where('a.nim', $key1_nim);
        }
        
        if($status_pemb == null or $status_pemb == '' or $status_pemb == 'all')
        {
            $this->db->group_start();
            $this->db->where('kd_pemb1', $kd_dsn);
            $this->db->or_where('kd_pemb2', $kd_dsn);
            $this->db->or_where('d.pembanding1', $kd_dsn);
            $this->db->or_where('d.pembanding2', $kd_dsn);
            $this->db->group_end();
        }
        else if($status_pemb == 'pembimbing1')
        {
            $this->db->where('kd_pemb1', $kd_dsn);
        }
        else if($status_pemb == 'pembimbing2')
        {
            $this->db->where('kd_pemb2', $kd_dsn);
        }
        else if($status_pemb == 'pembanding1')
        {
            $this->db->where('d.pembanding1', $kd_dsn);
        }
        else
        {
            $this->db->where('d.pembanding2', $kd_dsn);
        }
        
        if($status_mhs == 'sudah sidang')
        {
            $this->db->group_start();
            $this->db->where('a.status', 'sudah sidang');
            $this->db->or_where('a.status', 'lulus');
            $this->db->group_end();
        }
        
        if($status_mhs == 'belum sidang')
        {
            $this->db->where('a.status', 'belum sidang');
        }
       
        $this->db->order_by('a.nim', 'DESC');
//        $this->db->group_by('a.nim');
        
        $this->db->limit($halaman, $off);
        
        return $this->db->get();
    }
    
    function get_bimbingan_jumlah($kd_dsn, $key1_nim, $status_pemb, $status_mhs)
    {
        $this->db->select('a.nim, a.nama, a.id_PS, a.status, a.kd_pemb1, a.kd_pemb2, b.nama_PS, c.judul_skripsi');
        $this->db->from('v_cari_mahasiswa a');
        $this->db->join('program_studi b', 'a.id_PS = b.id_PS');
        $this->db->join('skripsi c', 'a.nim = c.nim');
        $this->db->join('pembanding d', 'a.nim = d.nim');
        
        if($key1_nim != null or $key1_nim != '') {
            $this->db->where('a.nim', $key1_nim);
        }
        
        if($status_pemb == null or $status_pemb == '' or $status_pemb == 'all')
        {
            $this->db->group_start();
            $this->db->where('kd_pemb1', $kd_dsn);
            $this->db->or_where('kd_pemb2', $kd_dsn);
            $this->db->or_where('d.pembanding1', $kd_dsn);
            $this->db->or_where('d.pembanding2', $kd_dsn);
            $this->db->group_end();
        }
        else if($status_pemb == 'pembimbing1')
        {
            $this->db->where('kd_pemb1', $kd_dsn);
        }
        else if($status_pemb == 'pembimbing2')
        {
            $this->db->where('kd_pemb2', $kd_dsn);
        }
        else if($status_pemb == 'pembanding1')
        {
            $this->db->where('d.pembanding1', $kd_dsn);
        }
        else
        {
            $this->db->where('d.pembanding2', $kd_dsn);
        }
        
         if($status_mhs == 'sudah sidang')
        {
            $this->db->group_start();
            $this->db->where('a.status', 'sudah sidang');
            $this->db->or_where('a.status', 'lulus');
            $this->db->group_end();
        }
        
         if($status_mhs == 'belum sidang')
        {
            $this->db->where('a.status', 'belum sidang');
        }
       
        return $this->db->get();
    }
    
     function get_riwayat_aktif($nim, $jenis_seminar, $kelayakan)
{
    $this->db->select('a.id, a.nim, a.id_pengajuan, a.tgl_penyerahan, a.tgl_selesai_diperiksa, a.tgl_terima_kembali,a.catatan, a.pembimbing, b.judul');
    $this->db->from('lembar_kendali_bimbingan a');
    $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
    $this->db->where('a.jenis_seminar', $jenis_seminar);
    $this->db->where('a.nim', $nim);
    
         if($kelayakan != null)
         {
             $this->db->where('b.status_kelayakan', 'diterima');
         }

    $this->db->order_by('a.tgl_penyerahan','DESC');
    return $this->db->get();
}
    
    function save_izin_seminar($data)
    {
        $this->db->insert('izin_seminar', $data);
        return $this->db->insert_id();
    }
    
    function cek_tgl_seminar($nim, $jenis_seminar, $status_dopim)
    {
        $this->db->select('a.id,a.nim,a.id_pengajuan, a.pembimbing1, a.pembimbing2, a.penguji1, a.penguji2, a.rencana_tgl_seminar')->from('izin_seminar a')->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan')->where('b.status_kelayakan','diterima')->where('a.nim', $nim)->where('jenis_seminar', $jenis_seminar);
        return $this->db->get();
    }
    
    function get_penilaian_sempro($nim, $id_pengajuan, $id_seminar, $kd_dsn)
    {
        $this->db->select('a.id, a.dosen, a.nim, a.id_pengajuan, a.id_jadwal_seminar, a.judul_skripsi, a.catatan_judul_skripsi, a.latar_belakang,	a.catatan_latar_belakang, a.rumusan_masalah, a.catatan_rumusan_masalah,	a.landasan_teori,	a.catatan_landasan_teori,	a.penelitian_terdahulu, a.catatan_penelitian_terdahulu, a.data_digunakan, a.catatan_data_digunakan,	a.metodologi, a.catatan_metodologi,	a.arsitektur_umum,	a.catatan_arsitektur_umum, a.kelayakan_sempro, b.judul, c.seminar, c.jadwal, d.nama')->from('penilaian_sempro a')->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan')->join('jadwal_seminar c', 'a.id_jadwal_seminar = c.id')->join('mahasiswa d', 'a.nim = d.nim')->where('a.nim', $nim)->where('a.id_pengajuan', $id_pengajuan)->where('a.id_jadwal_seminar', $id_seminar)->where('a.dosen', $kd_dsn);
        
        return $this->db->get();
    }
    
    function save_penilaian_sempro($data)
    {
        $this->db->insert('penilaian_sempro', $data);
        return $this->db->insert_id();
    }
    
    function gets_penilaian_sempro($nim, $jadwal_seminar, $id_pengajuan)
    {
        $this->db->select('a.dosen, a.kelayakan_sempro, 
a.judul_skripsi,
a.catatan_judul_skripsi,
a.latar_belakang,
a.catatan_latar_belakang,
a.rumusan_masalah,
a.catatan_rumusan_masalah,
a.landasan_teori,
a.catatan_landasan_teori,
a.penelitian_terdahulu,
a.catatan_penelitian_terdahulu,
a.data_digunakan,
a.catatan_data_digunakan,
a.metodologi,
a.catatan_metodologi,
a.arsitektur_umum,
a.catatan_arsitektur_umum,
a.kelayakan_sempro, b.Nama_dosen')->from('penilaian_sempro a')->join('dosen b', 'a.dosen = b.Kode_dosen')->where('a.nim', $nim)->where('a.id_jadwal_seminar', $jadwal_seminar)->where('a.id_pengajuan', $id_pengajuan);
        
        return $this->db->get();
    }
    
    function get_penilai_nama($username, $password)
    {
        $this->db->select('b.Nama_dosen')->from('user a')->join('dosen b', 'a.kd_dsn = b.Kode_dosen')->where('username', $username)->where('password', $password);
        return $this->db->get();
    }
    
    function get_catatan_seminar($kd_dsn, $seminar, $pembimbing_penguji, $nim, $status_dosen, $page, $off)
    {
        if($pembimbing_penguji == 'pembimbing')
        {
        $this->db->select('a.id_jadwal_seminar, a.nim, a.nama, a.nama_PS, a.Dosen_Pembimbing1, a.Dosen_Pembimbing2, a.id_pengajuan, a.status_kelayakan_sempro, b.judul, c.jadwal, d.pembimbing1, d.pembimbing2');
        }
        else
        {
            $this->db->select('a.id_jadwal_seminar, a.nim, a.nama, a.nama_PS, a.Dosen_Pembimbing1, a.Dosen_Pembimbing2, a.id_pengajuan, a.status_kelayakan_sempro, b.judul, c.jadwal');
        }
        $this->db->from('v_mahasiswa_seminar a');
        $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
        $this->db->join('jadwal_seminar c', 'a.id_jadwal_seminar = c.id');
        
        if($pembimbing_penguji == 'pembimbing')
        {
        $this->db->join('pembimbing d', 'a.nim = d.nim');
            
            if($status_dosen == 'all' or $status_dosen == '' or $status_dosen == null)
            {
        $this->db->group_start();
        $this->db->where('d.pembimbing1', $kd_dsn);
        $this->db->or_where('d.pembimbing2', $kd_dsn);
        $this->db->group_end();
            }
            
            else if($status_dosen == 'pembimbing1'){
                 $this->db->where('d.pembimbing1', $kd_dsn);
            }
            else {
                 $this->db->where('d.pembimbing2', $kd_dsn);
            }
        }
        
        if($nim != '' or $nim != null)
        {
            $this->db->where('a.nim', $nim);
        }
        
        
        $this->db->where('c.seminar', $seminar);
        $this->db->order_by('c.jadwal', 'DESC');
        $this->db->limit($page, $off);
        
        return $this->db->get();
        
    }
    
    function get_catatan_seminar_jumlah($kd_dsn, $seminar, $pembimbing_penguji, $nim, $status_dosen)
    {
        if($pembimbing_penguji == 'pembimbing')
        {
        $this->db->select('a.id_jadwal_seminar, a.nim, a.nama, a.nama_PS, a.Dosen_Pembimbing1, a.Dosen_Pembimbing2, a.id_pengajuan, a.status_kelayakan_sempro, b.judul, c.jadwal, d.pembimbing1, d.pembimbing2');
        }
        else
        {
            $this->db->select('a.id_jadwal_seminar, a.nim, a.nama, a.nama_PS, a.Dosen_Pembimbing1, a.Dosen_Pembimbing2, a.id_pengajuan, a.status_kelayakan_sempro, b.judul, c.jadwal');
        }
        $this->db->from('v_mahasiswa_seminar a');
        $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
        $this->db->join('jadwal_seminar c', 'a.id_jadwal_seminar = c.id');
        
        if($pembimbing_penguji == 'pembimbing')
        {
        $this->db->join('pembimbing d', 'a.nim = d.nim');
            
            if($status_dosen == 'all' or $status_dosen == '' or $status_dosen == null)
            {
        $this->db->group_start();
        $this->db->where('d.pembimbing1', $kd_dsn);
        $this->db->or_where('d.pembimbing2', $kd_dsn);
        $this->db->group_end();
            }
            
            else if($status_dosen == 'pembimbing1'){
                 $this->db->where('d.pembimbing1', $kd_dsn);
            }
            else {
                 $this->db->where('d.pembimbing2', $kd_dsn);
            }
        }
        
        if($nim != '' or $nim != null)
        {
            $this->db->where('a.nim', $nim);
        }
        
        
        $this->db->where('c.seminar', $seminar);
        $this->db->order_by('c.jadwal', 'DESC');
        
        return $this->db->get();
        
    }
    
    function get_catatan_semhas($nim, $id_pengajuan, $id_seminar)
    {
       $this->db->select('a.id, a.dosen, a.status_dosen, a.nim, a.id_pengajuan, a.id_jadwal_seminar, a.catatan_perbaikan, a.status_perbaikan, a.keterangan_catatan, b.Nama_dosen')->from('catatan_perbaikan_semhas a')->join('dosen b', 'a.dosen = b.Kode_dosen')->where('a.nim', $nim)->where('a.id_pengajuan', $id_pengajuan)->where('a.id_jadwal_seminar', $id_seminar)->order_by('a.status_dosen');
        return $this->db->get();
    }
    
    function catatan_perbaikan_semhas($nim, $status=null, $jenis_seminar)
    {
        $this->db->select('b.Kode_dosen, b.Nama_dosen, a.dosen, a.status_dosen, a.nim, a.id_pengajuan, a.id_jadwal_seminar, a.catatan_perbaikan, a.status_perbaikan, c.jadwal, a.id, a.kunci');
        $this->db->from('catatan_perbaikan_semhas a');
        $this->db->join('dosen b', 'a.dosen = b.Kode_dosen');
        $this->db->join('jadwal_seminar c', 'a.id_jadwal_seminar = c.id');
        $this->db->where('a.nim', $nim);
        
        if($status == 'sudah')
        {
            $this->db->where('status_perbaikan', 'sudah');
        }
        
        if($status == 'locked')
        {
            $this->db->where('kunci', 'locked');
        }
        
        $this->db->where('untuk_seminar', $jenis_seminar);
        $this->db->order_by('a.id_jadwal_seminar', 'ASC');
        
        return $this->db->get();
    }
    
    function simpan_upload_validasi_penguji($save)
    {
        $this->db->insert('berkas_validasi_penguji', $save);
        return $this->db->insert_id();
    }
    
    function get_dosen()
    {
        $this->db->select('*')->from('dosen');
        return $this->db->get();
    }
    
    function simpan_notif($simpankan)
    {
        $this->db->insert('notifikasi_dosen', $simpankan);
        return $this->db->insert_id();
    }
    
    function get_notifikasi_dosen($kd_dsn, $status = null)
    {
        $this->db->select('*');
        $this->db->from('notifikasi_dosen');
        $this->db->where('kd_dsn', $kd_dsn);
        if($status == 'belum')
        {
            $this->db->where('status_dilihat', 'belum');
        }
        $this->db->order_by('jadwal', 'DESC');
        
        return $this->db->get();
    }
}
