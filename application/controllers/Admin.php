<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','form'));
        $this->load->helper('download');
		$this->load->library('session');
        $this->load->library('upload');
        $this->load->library('pagination');
		$this->load->model('Dosen_model','',TRUE);	
		$this->load->model('Akun_Model','',TRUE);
        $this->load->model('Folder_Model','', TRUE);
	}
        
        

		function index()
		{
            //Setting Message
            if($this->uri->segment(3) == 'sukses_menambah_folder')
                $data['message'] = "Berhasil Menambah Folder Baru";
            else if($this->uri->segment(3) == 'sukses_menghapus_folder')
                $data['message'] = "Berhasil Menghapus Folder";
            else if($this->uri->segment(3) == 'gagal_menambah_folder')
                $data['message'] = "Folder Sudah Ada";
            else if($this->uri->segment(3) == 'gagal_menambah_folders')
                $data['message'] = "Gagal Menambah Folder";
            else
                $data['message'] = "";
            
            
            
            //Get Data Where Parent = 0
            $data['data'] = $this->Folder_Model->get_folder('0')->result();
            
            
            //Setting Tampilan 
            $data['title'] = 'Repositori - ADMIN';
			$data['active'] = 'dashboard';
            
            $this->load->view('content/admin/index',$data);
		}
        
        function tambah_direktori()
        {
            $nama_folder = $this->input->post('nama_folder');
            $akses = $this->input->post('akses');
           
            
            $direktori = 'sharing_folder/'.$nama_folder;
           // echo $directory;die;
            
            if(mkdir($direktori, 0777, TRUE))
            {
                $data = array(
                    'nama_folder' => $nama_folder,
                    'parent_folder' => 0,
                    'akses' => $akses
                );
                
            $simpan = $this->Folder_Model->tambah_folder($data);
                
             if($simpan) {
                    redirect('Admin/index/sukses_menambah_folder');
            }
                else
                {
                    redirect('Admin/index/gagal_menambah_folders');
                }
            }
            else
            {
               redirect('Admin/index/gagal_menambah_folder');
            }
            die;
        }
        
        function detail_folder($id,$message=null)
        {
            //Setting Message
            if($message == 'sukses_mengubah_folder')
                $data['message'] = "Berhasil Mengubah Detail Folder";
            else if($message == 'sukses_menghapus_folder')
                $data['message'] = "Berhasil Menghapus Folder";
            else if($message == 'gagal_mengubah_folder')
                $data['message'] = "Gagal Mengubah Folder";
            else if($message == 'gagal_menghapus_folder')
                $data['message'] = "Gagal Menghapus Folder";
            else if($message == 'sukses_mengupload_file')
                $data['message'] = "Sukses Mengupload File";
            else if($message == 'gagal_mengupload_file')
                $data['message'] = "Gagal Mengupload File";
            else if($message == 'sukses_menghapus')
                $data['message'] = "Sukses Menghapus File";
            else if($message == 'gagal_menghapus')
                $data['message'] = "Gagal Menghapus File";
            else
                $data['message'] = "";
            
            
            //Get Detail Folder
            $data['detail'] = $this->Folder_Model->get_detail_folder($id)->result();
            
             //Get All Folder Where Parent = $id
            $data['folder'] = $this->Folder_Model->get_folder($id)->result();
            
            //Get All File Where Folder = $id
            $data['file'] = $this->Folder_Model->get_file($id)->result();
            
            //Setting Tampilan 
            $data['title'] = 'Repositori - ADMIN';
            $data['active'] = 'dashboard';
            
            $this->load->view('content/admin/detail_folder',$data);
        }

        function update_folder($id, $nama_old_folder)
        {
            $button = $this->input->post('button');
            
            if($button == 'delete')
            {
                
                $dir = 'sharing_folder/'. str_replace('%20',' ',$nama_old_folder);
                var_dump($dir);
                if(rmdir($dir)) {
                $delete = $this->db->where('id',$id)->delete('folder');
                
                if($delete)
                {
                     redirect('Admin/index/sukses_menghapus_folder');
                }
                else
                {
                    redirect('Admin/detail_folder/'.$id.'/gagal_menghapus_folders');
                }
                }
                
                else
                {
                    error_reporting(E_ALL);die;
                     redirect('Admin/detail_folder/'.$id.'/gagal_menghapus_folder');
                }
            }
            
            $nama_new_folder = $this->input->post('nama_folder');
            $akses = $this->input->post('akses');
            
            
            $direktori_lama = 'sharing_folder/'. str_replace('%20',' ',$nama_old_folder);
            $direktori_baru = 'sharing_folder/'.$nama_new_folder;
            
            var_dump($direktori_lama);
            var_dump($direktori_baru);
            if(rename($direktori_lama, $direktori_baru))
            {
                $data = array(
                    'nama_folder' => $nama_new_folder,
                    'akses' => $akses
                );
                
                $update = $this->db->where('id',$id)->update('folder',$data);
                
                if($update)
                {
                    redirect('Admin/detail_folder/'.$id.'/sukses_mengubah_folder');
                }
                else
                {
                    redirect('Admin/detail_folder/'.$id.'/gagal_mengubah_folder');
                }
            }
            else
            {
                redirect('Admin/detail_folder/'.$id.'/gagal_mengubah_folder');
            }    
        }
        
        function upload_file($id,$message = null)
        { 
            //Setting Message
            if($message == 'sukses_mengubah_folder')
                $data['message'] = "Berhasil Mengubah Detail Folder";
            else if($message == 'sukses_menghapus_folder')
                $data['message'] = "Berhasil Menghapus Folder";
            else if($message == 'gagal_mengubah_folder')
                $data['message'] = "Gagal Mengubah Folder";
            else if($message == 'gagal_menghapus_folder')
                $data['message'] = "Gagal Menghapus Folder";
            else
                $data['message'] = "";
            
            //Get Data
            $data['data'] = $this->Folder_Model->get_detail_folder($id)->result();
            
              //Setting Tampilan 
            $data['title'] = 'Repositori - ADMIN';
            $data['active'] = 'dashboard';
            $this->load->view('content/admin/upload_file',$data);
        }
        
        function file_uploaded($id,$message = null)
        {
             //Setting Message
            if($message == 'sukses_mengubah_folder')
                $data['message'] = "Berhasil Mengubah Detail Folder";
            else if($message == 'sukses_menghapus_folder')
                $data['message'] = "Berhasil Menghapus Folder";
            else if($message == 'gagal_mengubah_folder')
                $data['message'] = "Gagal Mengubah Folder";
            else if($message == 'gagal_menghapus_folder')
                $data['message'] = "Gagal Menghapus Folder";
            else
                $data['message'] = "";
            
            //Get Data
            $data['data'] = $this->Folder_Model->get_detail_folder($id)->result();
            
              //Setting Tampilan 
            $data['title'] = 'Repositori - ADMIN';
            $data['active'] = 'dashboard';
            
            $this->load->view('content/admin/file_uploaded',$data);
        }
        
        
        function proses_upload($id)
        {
            
            //DLL
            $judul_file = $this->input->post('judul_file');
            $deskripsi = $this->input->post('deskripsi');
            $tgl_submit = date("Y-m-d");
            
            
            //Direktori
            $dir = $this->Folder_Model->get_detail_folder($id)->result();
            
            foreach($dir as $dir)
            {
                $direktori = $dir->nama_folder;    
            } 
            
            //Jumlah File Yang Diupload
            $jumlah = count($_FILES['berkas']['tmp_name']);
            
            //Parsekan setiap file
            for($i = 0; $i < $jumlah; $i++) {
            
            $fullpath = './sharing_folder/'.$direktori.'/'.$_FILES['berkas']['name'][$i];
            $additional = '1';

            if(file_exists($fullpath)){
            while(file_exists($fullpath)) {
                $info = pathinfo($fullpath);
                $fullpath = $info['dirname'].'/'.$info['filename'].$additional.'.'.$info['extension'];
                $nama_file = $info['filename'] .$additional.'.'.$info['extension'];
            }
            }
            else
            {
                 $info = pathinfo($fullpath);
                 $nama_file = $info['filename'] .'.'.$info['extension'];
            }
                
            if(move_uploaded_file($_FILES['berkas']['tmp_name'][$i],$fullpath))
            {
                //echo "berhasil";
                if($judul_file == null OR $judul_file == '') {
                $data = array(
                    'nama_file' => $nama_file,
                    'folder' => $id,
                    'judul_file' => $nama_file,
                    'deskripsi_file' => $deskripsi,
                    'akses' => 'public',
                    'tanggal_submit' => $tgl_submit
                );
                }
                else
                {
                     $data = array(
                    'nama_file' => $nama_file,
                    'folder' => $id,
                    'judul_file' => $judul_file,
                    'deskripsi_file' => $deskripsi,
                    'akses' => 'public',
                    'tanggal_submit' => $tgl_submit
                    );
                }
                
                //save to database
                $save = $this->Folder_Model->upload_file($data);
                
                if($save)
                {
                    echo "sukses";
                }
                else
                {
                    echo "gagal";
                }
            }
            else
            {
                redirect('Admin/detail_folder/'.$id.'/gagal_mengupload_file');
            }
        }
             redirect('Admin/detail_folder/'.$id.'/sukses_mengupload_file');      
     }
        
    
        
    function edit_file($id_file,$message=null)
    {
              //Setting Message
            if($message == 'sukses_mengupdate_file')
                $data['message'] = "Berhasil Mengupdate File";
            else if($message == 'gagal_mengupdate_file')
                $data['message'] = "Gagal Mengupdate File";
            else
                $data['message'] = "";
        
            $data['data'] = $this->Folder_Model->get_all_data($id_file)->result();
        
          //Setting Tampilan 
            $data['title'] = 'Repositori - ADMIN';
            $data['active'] = 'dashboard';
            $this->load->view('content/admin/edit_file',$data);
    }
        
    function update_upload($id_file)
    {
        $judul_file = $this->input->post('judul_file');
        $deskripsi = $this->input->post('deskripsi');
        
        $data = array(
            'judul_file' => $judul_file,
            'deskripsi_file' => $deskripsi
        );
        
        $update = $this->db->where('id',$id_file)->update('file',$data);
        
        if($update)
        {
            redirect('Admin/edit_file/'.$id_file.'/sukses_mengupdate_file');
        }
        else
        {
            redirect('Admin/edit_file/'.$id_file.'/gagal_mengupdate_file');
        }
    }
        
    function hapus_file($id_file,$id_folder)
    {
        
        $filenya = $this->Folder_Model->get_file_id_by($id_file)->result();
        
        foreach($filenya as $filenya)
        {
            $nama_file = $filenya->nama_file;
        }
        $folder = $this->Folder_Model->get_detail_folder($id_folder)->result();
        
        foreach($folder as $fld)
        {
            $nama_folder = $fld->nama_folder;
        }
        $path = './sharing_folder/'.$nama_folder.'/'.$nama_file;
        
        if(unlink($path))
        {
            echo "sukses";
        }
        else
        {
            echo "gagal";
        }
        
        $delete = $this->db->where('id',$id_file)->delete('file');
        
        if($delete)
        {
            redirect('Admin/detail_folder/'.$id_folder.'/sukses_menghapus');
        }
        else
        {
            redirect('Admin/detail_folder/'.$id_folder.'/gagal_menghapus');
        }
    }
    
    function manajemen_akun()
    {
         //Setting Message
            if($this->uri->segment(3) == 'sukses_menambah_akun_baru')
                $data['message'] = "Berhasil Menambah Akun Baru";
            else if($this->uri->segment(3) == 'gagal_menambah_akun_baru')
                $data['message'] = "Gagal Menambah Akun Baru";
            else if($this->uri->segment(3) == 'sukses_menghapus_akun')
                $data['message'] = "Berhasil Menghapus Akun";
            else if($this->uri->segment(3) == 'gagal_menghapus_akun')
                $data['message'] = "Gagal Menghapus Akun";
            else if($this->uri->segment(3) == 'gagal_menambah_folder')
                $data['message'] = "Folder Sudah Ada";
            else if($this->uri->segment(3) == 'gagal_menambah_folders')
                $data['message'] = "Gagal Menambah Folder";
            else
                $data['message'] = "";
        
        $data['data'] = $this->Folder_Model->get_all_akun()->result();
     
        
         //Setting Tampilan 
            $data['title'] = 'Repositori - ADMIN';
            $data['active'] = 'manajemen_akun';
        $this->load->view('content/admin/manajemen_akun', $data);
    }
    
    function tambah_akun()
    {
         //Setting Message
            if($this->uri->segment(3) == 'sukses_menambah_folder')
                $data['message'] = "Berhasil Menambah Folder Baru";
            else if($this->uri->segment(3) == 'sukses_menghapus_folder')
                $data['message'] = "Berhasil Menghapus Folder";
            else if($this->uri->segment(3) == 'gagal_menambah_folder')
                $data['message'] = "Folder Sudah Ada";
            else if($this->uri->segment(3) == 'gagal_menambah_folders')
                $data['message'] = "Gagal Menambah Folder";
            else
                $data['message'] = "";
        
         //Setting Tampilan 
            $data['title'] = 'Repositori - ADMIN';
            $data['active'] = 'manajemen_akun';
            $data['set'] = "tambah_akun";
            $data['judul'] = "Tambah Akun";
        $this->load->view('content/admin/update_akun', $data);
    }
    
    function proses_tambah_akun()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $data = array(
            'username' => $username,
            'password' => $password,
            'level' => '2'
        );
        
        $simpan = $this->Folder_Model->simpan_akun_baru($data);
        
        if($simpan)
        {
            redirect('Admin/manajemen_akun/sukses_menambah_akun_baru');
        }
        else
        {
            redirect('Admin/manajemen_akun/gagal_menambah_akun_baru');
        }
    }
        
    function edit_akun($id,$pesan = null)
    {
        $data['data'] = $this->Folder_Model->get_data_akun($id)->result();
        
        //Setting Message
            if($pesan == 'sukses_mengupdate_akun')
                $data['message'] = "Berhasil Mengupdate Akun";
            else if($pesan == 'sukses_menghapus_folder')
                $data['message'] = "Berhasil Menghapus Folder";
            else if($pesan == 'gagal_mengupdate_akun')
                $data['message'] = "Gagal Mengupdate Akun";
            else if($pesan == 'gagal_menambah_folders')
                $data['message'] = "Gagal Menambah Folder";
            else
                $data['message'] = "";
        
         //Setting Tampilan 
            $data['title'] = 'Repositori - ADMIN';
            $data['active'] = 'manajemen_akun';
            $data['set'] = "edit_akun";
            $data['judul'] = "Edit Akun";
        $this->load->view('content/admin/update_akun', $data);     
    }
    
    function hapus_akun($id)
    {
        $delete = $this->db->where('id',$id)->delete('account');
        
          if($delete)
        {
            redirect('Admin/manajemen_akun/sukses_menghapus_akun');
        }
        else
        {
            redirect('Admin/manajemen_akun/gagal_menghapus_akun');
        }
    }
        
    function proses_edit_akun($id)
    {
        $username_baru = $this->input->post('username');
        $password_baru = $this->input->post('password');
        
        if($password_baru == null OR $password_baru == "")
        {
            $data = array(
                'username' => $username_baru
            );
        }
        else
        {
            $password = md5($password_baru);
            
             $data = array(
                'username' => $username_baru,
                'password' => $password
            );    
        }
        
        $update = $this->db->where('id',$id)->update('account',$data);
        
        if($update)
        {
            redirect('Admin/edit_akun/'.$id.'/sukses_mengupdate_akun');
        }
        else
        {
            redirect('Admin/edit_akun/'.$id.'/gagal_mengupdate_akun');
        }
    }
        
    function login()
	{
        if($this->uri->segment(3) == 'akun_belum_terdaftar')
            $message = "Akun Belum Terdaftar";
        else if($this->uri->segment(3) == 'salah_password')
            $message = "Password Anda Salah";
        else
            $message = "";
        
		if(!$_POST)
		{
			$input = (object) $this->Akun_Model->getDefaultValues();

		}
		else
		{

			$input = (object) $this->input->post();
		}

		if(!$this->Akun_Model->validate()) {
			$this->load->view(('content/login'), compact('input','message'));
			return;
		}

		if(!$this->Akun_Model->run($input)) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
			$verifikasi_user = $this->Akun_Model->verif_user($username)->num_rows();
            
            if($verifikasi_user<=0)
            {
                redirect('Admin/login/akun_belum_terdaftar');
            }
            else
            {
                $verifikasi_akun = $this->Akun_Model->verif_akun($username,$password)->num_rows();
                
                if($verifikasi_akun <= 0)
                {
                    redirect('Admin/login/salah_password');
                }   
            }
            
			redirect('Admin/login');
		}
		else
		{
            if($_SESSION['level'] == '1') {
			redirect('Admin/index');}
            else
            {
                redirect('User/index');
            }
		}
	}

	function logout()
	{
		$this->Akun_Model->logout();
		redirect('Admin/login');
	} 
}