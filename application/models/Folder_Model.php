<?php

class Folder_model extends CI_Model {

private $primary_key='id_skripsi';
private $table_name='folder';
private $table_name2='v_cari_mahasiswa';

function __construct() {
	parent::__construct();
}

function tambah_folder($data)
{
    $this->db->insert('folder',$data);
    return $this->db->insert_id();
}
    
function get_folder($data)
{
    $this->db->select('*')->from('folder')->where('parent_folder',$data);
    return $this->db->get();
}
    
function get_file($id_folder)
{
    $this->db->select('*')->from('file')->where('folder',$id_folder);
    return $this->db->get();
}

function get_detail_folder($id)
{
    $this->db->select('*')->from('folder')->where('id',$id);
    return $this->db->get();
}

function upload_file($data)
{
    $this->db->insert('file',$data);
    return $this->db->insert_id();
}
    
function get_all_data($id_file)
{
    $this->db->select('b.id,b.judul_file,b.deskripsi_file,a.nama_folder,b.folder');
    $this->db->from('file b');
    $this->db->join('folder a','b.folder = a.id');
    $this->db->where('b.id',$id_file);
    return $this->db->get();
}

function get_all_file()
{
    $this->db->select('*')->from('file');
    return $this->db->get();
}
    
function get_files($halaman, $off)
{   
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->order_by('b.id');
    $this->db->limit($halaman, $off);
    return $this->db->get();
}

function get_files_public_count()
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->where('a.akses','public');
    return $this->db->get();
}

function get_files_public($halaman, $off)
{   
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->where('a.akses','public');
    $this->db->order_by('b.id');
    $this->db->limit($halaman, $off);
    return $this->db->get();
}

function get_files_count()
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    return $this->db->get();
}
    

function get_files_id($folder,$halaman, $off)
{   
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->where('b.folder',$folder);
    $this->db->order_by('b.id');
    $this->db->limit($halaman, $off);
    return $this->db->get();
}

function get_files_public_id_count($folder)
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->where('b.folder',$folder);
    $this->db->where('a.akses','public');
    return $this->db->get();
}

function get_file_id_by($id_file)
{
    $this->db->select('*')->from('file')->where('id',$id_file);
    return $this->db->get();
}
    
function get_files_public_id($folder,$halaman, $off)
{   
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->where('b.folder',$folder);
    $this->db->where('a.akses','public');
    $this->db->order_by('b.id');
    $this->db->limit($halaman, $off);
    return $this->db->get();
}

function get_files_id_count($folder)
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->where('b.folder',$folder);
    return $this->db->get();
}
    
    
function get_all_akun()
{
    $this->db->select('*')->from('account');
    return $this->db->get();
}
    
function simpan_akun_baru($data)
{
    $this->db->insert('account',$data);
    return $this->db->insert_id();
}

function get_data_akun($id)
{
    $this->db->select('*')->from('account')->where('id',$id);
    return $this->db->get();
}

function get_files_cari($key,$halaman,$off)
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->group_start()->where('b.nama_file',$key)->or_like('b.nama_file',$key)->or_where('b.judul_file',$key)->or_like('b.judul_file',$key)->group_end();
    $this->db->limit($halaman,$off);
    return $this->db->get();
}

function get_files_cari_count($key)
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->group_start()->where('b.nama_file',$key)->or_like('b.nama_file',$key)->or_where('b.judul_file',$key)->or_like('b.judul_file',$key)->group_end();
    return $this->db->get();
}

function get_files_cari_public($key,$halaman,$off)
{
   $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->group_start()->where('b.nama_file',$key)->or_like('b.nama_file',$key)->or_where('b.judul_file',$key)->or_like('b.judul_file',$key)->group_end();
    $this->db->where('a.akses','public');
    $this->db->limit($halaman,$off);
    return $this->db->get();
}

function get_files_cari_public_count($key)
{
   $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a', 'b.folder = a.id');
    $this->db->group_start()->where('b.nama_file',$key)->or_like('b.nama_file',$key)->or_where('b.judul_file',$key)->or_like('b.judul_file',$key)->group_end();
    $this->db->where('a.akses','public');
    return $this->db->get();
}
    
function count_all_files_all()
{
    $this->db->select('*')->from('file');
    return $this->db->get();
}

function count_all_files()
{
    $this->db->select('*');
    $this->db->from('file a');
    $this->db->join('folder b', 'a.folder = b.id');
    $this->db->where('b.akses','public');
    return $this->db->get();
}

function get_folders()
{
    $this->db->select('*');
    $this->db->from('folder');
    $this->db->order_by('nama_folder','ASC');
    return $this->db->get();
}

function get_folder_jumlah()
{
    $this->db->select('a.id,a.nama_folder, COUNT(b.nama_file) AS jumlah');
    $this->db->from('folder a');
    $this->db->join('file b', 'b.folder = a.id');
    $this->db->where('a.akses','public');
    $this->db->group_by('b.folder');
    return $this->db->get();
}

function get_folder_jumlah_all()
{
    $this->db->select('a.id,a.nama_folder, COUNT(b.nama_file) AS jumlah');
    $this->db->from('folder a');
    $this->db->join('file b', 'b.folder = a.id');
    $this->db->group_by('b.folder');
    return $this->db->get();
}
    
function get_folders_by_id($id_direktori)
{
     $this->db->select('*');
     $this->db->from('folder');
     $this->db->where('id',$id_direktori);
     return $this->db->get();
}

function get_files_by_id($id_file)
{
     $this->db->select('*');
     $this->db->from('file');
     $this->db->where('id',$id_file);
     return $this->db->get();
}
    
function get_files_populer($halaman, $off)
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a','b.folder = a.id');
    $this->db->limit($halaman,$off);
    $this->db->order_by('b.jumlah_download','DESC');
    return $this->db->get();
}
    
function get_files_populer_count()
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a','b.folder = a.id');
    $this->db->order_by('b.jumlah_download','DESC');
    return $this->db->get();
}
    
function get_files_public_populer($halaman, $off)
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a','b.folder = a.id');
    $this->db->where('a.akses','public');
    $this->db->limit($halaman,$off);
    $this->db->order_by('b.jumlah_download','DESC');
    return $this->db->get();
}
    
function get_files_public_populer_count()
{
    $this->db->select('a.id AS id_folder,b.id AS id_file,b.nama_file,a.nama_folder,b.judul_file,b.deskripsi_file');
    $this->db->from('file b');
    $this->db->join('folder a','b.folder = a.id');
     $this->db->where('a.akses','public');
    $this->db->order_by('b.jumlah_download','DESC');
    return $this->db->get();
}
    
}