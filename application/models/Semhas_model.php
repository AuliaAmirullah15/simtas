<?php

class Semhas_model extends CI_Model {

private $table_name = 'skripsi';

function __construct() {
	parent::__construct();
}

function get_data()
{
	$this->db->select('*')->from('semhas')->where('status','belum dikonfirmasi')->order_by('id','DESC');
	return $this->db->get();
}

function get_validasi($nim)
{
	$this->db->select('id_pengajuan,judul')->from('pengajuan_judul')->where('nim',$nim)->order_by('id_pengajuan','DESC')->limit(1);
	return $this->db->get();
}

function get_tanggal($id_seminar)
{
	$this->db->select('jadwal')->from('jadwal_seminar')->where('id',$id_seminar);
	return $this->db->get();
}

function edit_semhas($id,$status)
{
	$data = array(
		'status' => $status
		);
	$this->db->where('id',$id);
	$this->db->update('semhas',$data);
}

function save_validasi_berkas_semhas($data)
{
	$this->db->insert('validasi_semhas', $data);
	return $this->db->insert_id();
}

function save_validasi_penggandaan($data)
{
	$this->db->insert('validasi_penggandaan', $data);
	return $this->db->get();
}

function available_penggandaan($nim)
{
	$this->db->select('*')->from('validasi_penggandaan')->where('nim', $nim);
	return $this->db->get();
}

function get_statusnya($nim)
{
    $this->db->select('*')->from('mahasiswa')->where('nim',$nim);
    return $this->db->get();
}

function input_skripsi_nims($data)
{
    $this->db->insert('skripsi_nim',$data);
    return $this->db->insert_id();
}

function cek_status_mahasiswa($nim)
{
    $this->db->select('*')->from('mahasiswa')->where('nim',$nim)->group_start()->where('status','belum sidang')->or_where('status','sudah sidang')->or_where('status','lulus')->group_end();
    return $this->db->get();
}
    
function cek_status_mahasiswa_semhas($nim)
{
    $this->db->select('*')->from('mahasiswa')->where('nim',$nim)->group_start()->where('status','belum sidang')->or_where('status','sudah sidang')->or_where('status','lulus')->or_where('status','belum semhas')->group_end();
    return $this->db->get();
}
    
function cek_diterima($nim)
{
	$this->db->select('*')->from('semhas')->where('status','diterima')->where('nim',$nim);
	return $this->db->get();
}

function save_validasi_berkas_sidang($data)
{
	$this->db->insert('validasi_sidang', $data);
	return $this->db->insert_id();
}

function get_pembanding($id)
{
	$this->db->select('a.pembanding1,a.pembanding2,b.Nama_dosen as dopemb1,c.Nama_dosen as dopemb2')->from('jadwal_seminar a')->join('dosen b','a.pembanding1 = b.Kode_dosen')->join('dosen c','a.pembanding2 = c.Kode_dosen')->where('a.id',$id);
	return $this->db->get();
}
function get_gaji($column)
{
	$this->db->select($column)->from('gaji_dosen');
	return $this->db->get();
}

function get_gaji_pembimbing($id)
{
	$this->db->select("c.Nama_dosen as dopim1,d.Nama_dosen as dopim2,COUNT('b.pembimbing1') AS jumlah1,COUNT('b.pembimbing2') as jumlah2")->from('mahasiswa_sidang a')->join('pembimbing b','a.nim=b.nim')->join('dosen c','b.pembimbing1 = c.Kode_dosen')->join('dosen d','b.pembimbing2 = d.Kode_dosen')->where('a.id_jadwal_seminar',$id)->group_by('b.pembimbing1','b.pembimbing2');
	return $this->db->get();
}
    
    function get_nilai_uji_program($nim)
    {
        $this->db->select('*')->from('penilaian_uji_program')->where('nim', $nim);
        return $this->db->get();
    }
    
    function save_penilaian_uji_program($data)
    {
        $this->db->insert('penilaian_uji_program', $data);
        return $this->db->insert_id();
    }
    
    function get_nilai_uji_programs($nim)
    {
        $this->db->select('a.nim, a.penilai, a.kemampuan_dasar, a.kecocokan, a.kasus, a.ui, a.validasi, a.total, c.Nama_dosen AS dopim1, d.Nama_dosen AS dopim2 ')->from('penilaian_uji_program a')->join('pembimbing b', 'a.nim = b.nim')->join('dosen c', 'b.pembimbing1 = c.Kode_dosen')->join('dosen d', 'b.pembimbing2 = d.Kode_dosen')->where('a.nim', $nim);
        
        return $this->db->get();
    }
    
    function simpan_berkas_semhas($validasi_berkas_semhas)
    {
        $this->db->insert('validasi_semhas', $validasi_berkas_semhas);
        return $this->db->insert_id();
    }
    
    function get_nilai_semhas_by_dosen($kd_dsn, $nim, $id_jadwal, $id_pengajuan)
    {
        $this->db->select('*')->from('penilaian_semhas')->where('dosen', $kd_dsn)->where('nim', $nim)->where('id_jadwal_seminar', $id_jadwal)->where('id_pengajuan', $id_pengajuan);
        
        return $this->db->get();
    }
    
    function simpan_penilaian_semhas($data)
    {
        $this->db->insert('penilaian_semhas', $data);
        return $this->db->insert_id();
    }
    
    function simpan_penilaian_sidang($data)
    {
        $this->db->insert('penilaian_sidang', $data);
        return $this->db->insert_id();
    }
    
    function get_penilaian_semhas_mahasiswa($nim, $id_seminar, $id_pengajuan, $status)
    {
        $this->db->select('a.id, a.dosen, a.status_dosen, a.nim, a.id_pengajuan, a.id_jadwal_seminar, a.abstrak, a.bab1, a.bab2, a.bab3, a.bab4, a.bab5, a.pendapat, a.total, a.grade, b.Nama_dosen, b.NIP, b.ttd');
        $this->db->from('penilaian_semhas a');
        $this->db->join('dosen b', 'a.dosen = b.Kode_dosen');
        $this->db->where('a.nim', $nim);
        $this->db->where('a.id_jadwal_seminar', $id_seminar);
        $this->db->where('a.id_pengajuan', $id_pengajuan);
        
            if($status != 'all')
            {
                $this->db->where('a.status_dosen', $status);
            }
        
        return $this->db->get();
    }
    
    function get_penilaian_sidang_mahasiswa($nim, $id_seminar, $id_pengajuan, $status)
    {
        $this->db->select('a.id, a.dosen, a.status_dosen, a.nim, a.id_pengajuan, a.id_jadwal_seminar, a.sistematika, a.substansi, a.kemampuan_substansi, a.pendapat, a.total, a.grade, b.Nama_dosen, b.NIP, b.ttd');
        $this->db->from('penilaian_sidang a');
        $this->db->join('dosen b', 'a.dosen = b.Kode_dosen');
        $this->db->where('a.nim', $nim);
        $this->db->where('a.id_jadwal_seminar', $id_seminar);
        $this->db->where('a.id_pengajuan', $id_pengajuan);
        
            if($status != 'all')
            {
                $this->db->where('a.status_dosen', $status);
            }
        
        return $this->db->get();
    }
    
    function get_nilai_sidang_by_dosen($kd_dsn, $nim, $id_jadwal, $id_pengajuan)
    {
        $this->db->select('*')->from('penilaian_sidang')->where('dosen', $kd_dsn)->where('nim', $nim)->where('id_jadwal_seminar', $id_jadwal)->where('id_pengajuan', $id_pengajuan);
        
        return $this->db->get();
    }
    
    function get_catatan_perbaikan_sidang($kd_dsn, $nim, $id_jadwal, $id_pengajuan)
    {
        $this->db->select('*')->from('catatan_perbaikan_sidang')->where('dosen', $kd_dsn)->where('nim', $nim)->where('id_jadwal_seminar', $id_jadwal)->where('id_pengajuan', $id_pengajuan);
        
        return $this->db->get();
    }
    
    function simpan_catatan_perbaikan($data)
    {
        $this->db->insert('catatan_perbaikan_sidang', $data);
        return $this->db->insert_id();
    }
    
    function get_catatan_perbaikan_semhas($kd_dsn, $nim, $id_jadwal, $id_pengajuan)
    {
        $this->db->select('*')->from('catatan_perbaikan_semhas')->where('dosen', $kd_dsn)->where('nim', $nim)->where('id_jadwal_seminar', $id_jadwal)->where('id_pengajuan', $id_pengajuan);
        
        return $this->db->get();
    }
    
    function simpan_catatan_perbaikan_semhas($data)
    {
        $this->db->insert('catatan_perbaikan_semhas', $data);
        return $this->db->insert_id();
    }
    
    function get_penguji($nim)
    {
        $this->db->select('a.nim, a.pembimbing1, a.pembimbing2, b.pembanding1, b.pembanding2, c.Nama_dosen as dosen1, d.Nama_dosen as dosen2, e.Nama_dosen as dosen3, f.Nama_dosen as dosen4, c.ttd, c.nip');
        $this->db->from('pembimbing a');
        $this->db->join('pembanding b', 'a.nim = b.nim');
        $this->db->join('dosen c', 'a.pembimbing1 = c.Kode_dosen');
        $this->db->join('dosen d', 'a.pembimbing2 = d.Kode_dosen');
        $this->db->join('dosen e', 'b.pembanding1 = e.Kode_dosen');
        $this->db->join('dosen f', 'b.pembanding2 = f.Kode_dosen');
        $this->db->where('a.nim', $nim);
        $this->db->where('b.nim', $nim);
        
        return $this->db->get();
    }
    
    function get_nilai_semhas($nim, $id_pengajuan)
    {
        $this->db->select('*');
        $this->db->from('penilaian_semhas a');
        $this->db->join('mahasiswa_sidang b', 'a.id_jadwal_seminar = b.id_jadwal_seminar');
        $this->db->where('a.nim', $nim);
        $this->db->where('b.nim', $nim);
        $this->db->where('a.id_pengajuan', $id_pengajuan);
        $this->db->where('b.id_pengajuan', $id_pengajuan);
        $this->db->where('b.status_kelayakan', 'layak');
        
        return $this->db->get();
    }
    
    function get_nilai_sidang($nim, $id_pengajuan, $id_jadwal)
    {
        $this->db->select('*');
        $this->db->from('penilaian_sidang');
        $this->db->where('nim', $nim);
        $this->db->where('id_pengajuan', $id_pengajuan);
        $this->db->where('id_jadwal_seminar', $id_jadwal);
        
        return $this->db->get();
    }
    
    function get_nilai_uji_programming($nim)
    {
        $this->db->select('*');
        $this->db->from('penilaian_uji_program');
        $this->db->where('nim', $nim);
        
        return $this->db->get();
    }
    
    function get_kirim_aplikasi($nim)
    {
        $this->db->select('*');
        $this->db->from('kirim_aplikasi');
        $this->db->where('nim', $nim);
        $this->db->order_by('id', 'DESC');
        
        return $this->db->get();
    }
    
    function simpan_aplikasi($data)
    {
        $this->db->insert('kirim_aplikasi', $data);
        return $this->db->insert_id();
    }
    
    function get_aplikasi_mahasiswa($kd_dsn)
    {
        $this->db->select('*');
        $this->db->from('pembimbing a');
        $this->db->join('pembanding b', 'a.nim = b.nim');
        $this->db->join('kirim_aplikasi', 'a.nim = c.nim');
        
        $this->db->group_start();
        $this->db->where('a.pembimbing1', $kd_dsn);
        $this->db->or_where('a.pembimbing2', $kd_dsn);
        $this->db->or_where('b.pembanding1', $kd_dsn);
        $this->db->or_where('a.pembanding2', $kd_dsn);
        $this->db->group_end();
        
        return $this->db->get();
        
    }
    
    function get_berkas_penguji($nim)
    {
        $this->db->select('*');
        $this->db->from('berkas_validasi_penguji');
        $this->db->where('nim', $nim);
        
        return $this->db->get();
    }
    
     function get_aplikasi_mahasiswanya($kd_dsn)
    {
        $this->db->select('c.id, c.nim, c.cd, c.kode, c.jurnal, c.program');
        $this->db->from('berkas_validasi_penguji c');
        $this->db->join('pembimbing a', 'a.nim = c.nim');
        $this->db->join('pembanding b', 'b.nim = c.nim');
//        $this->db->join('berkas_validasi_penguji c', 'a.nim = c.nim');
        
        $this->db->group_start();
        $this->db->where('a.pembimbing1', $kd_dsn);
        $this->db->or_where('a.pembimbing2', $kd_dsn);
        $this->db->or_where('b.pembanding1', $kd_dsn);
        $this->db->or_where('b.pembanding2', $kd_dsn);
        $this->db->group_end();
        
        return $this->db->get();
        
    }
    
    function get_izin_seminar($nim, $jenis_seminar)
    {
        $this->db->select('a.id, a.nim, a.id_pengajuan, a.pembimbing1, a.pembimbing2, a.penguji1, a.penguji2, a.jenis_seminar, a.rencana_tgl_seminar');
        $this->db->from('izin_seminar a');
        $this->db->join('pengajuan_judul b', 'a.id_pengajuan = b.id_pengajuan');
        $this->db->where('a.nim', $nim);
        $this->db->where('a.jenis_seminar', $jenis_seminar);
        
        if($jenis_seminar == 'semhas')
        {
            $this->db->where('b.status_kelayakan_sempro', 'layak');
        }
        else if($jenis_seminar == 'sidang')
        {
            $this->db->where('b.status_kelayakan_semhas', 'layak');
        }
        
        return $this->db->get();
    }
    
    function get_ttd_dopim($nim)
    {
        $this->db->select('a.id, a.nomor_sk, a.nim, a.pembimbing1, a.pembimbing2, b.Nama_dosen as dosen1, c.Nama_dosen as dosen2, b.ttd as ttd1, c.ttd as ttd2, b.nip as nip1, c.nip as nip2');
        $this->db->from('pembimbing a');
        $this->db->join('dosen b', 'a.pembimbing1 = b.Kode_dosen');
        $this->db->join('dosen c', 'a.pembimbing2 = c.Kode_dosen');
        $this->db->where('nim', $nim);
        
        return $this->db->get();
    }
    
    function get_ttd_dopem($nim)
    {
        $this->db->select('a.id, a.nomor_sk, a.nim, a.pembanding1, a.pembanding2, b.Nama_dosen as dosen3, c.Nama_dosen as dosen4, b.ttd as ttd3, c.ttd as ttd4, b.nip as nip3, c.nip as nip4');
        $this->db->from('pembanding a');
        $this->db->join('dosen b', 'a.pembanding1 = b.Kode_dosen');
        $this->db->join('dosen c', 'a.pembanding2 = c.Kode_dosen');
        $this->db->where('nim', $nim);
        
        return $this->db->get();
    }
    
    function get_mahasiswa_validasi($status_plagiarisme)
    {
        $this->db->select('a.nim, a.nama, b.judul, b.status_plagiarisme, b.id_pengajuan, b.keywords, b.status_plagiarisme');
        $this->db->from('pengajuan_judul b');
        $this->db->join('mahasiswa a', 'b.nim = a.nim');
        $this->db->where('a.status', 'belum semhas');
        
        if($status_plagiarisme != 'all')
        {
            $this->db->where('b.status_plagiarisme', $status_plagiarisme);
        }
        
        return $this->db->get();
    }
}
