<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Tugas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library(array('form_validation'));
		$this->load->helper(array('url','form'));
        $this->load->helper('download');
		$this->load->library('session');
		$this->load->model('Dosen_model','',TRUE);	
		$this->load->model('Disertasi_model','',TRUE);	
		$this->load->model('Skripsi_model','',TRUE);
		$this->load->model('Cari_model','',TRUE);	
		$this->load->model('Tesis_model','',TRUE);	
		$this->load->model('Prodi_model','',TRUE);	
		$this->load->model('Formulir_model','',TRUE);	
		$this->load->model('Gaji_model','',TRUE);	
		$this->load->model('Jadwal_model','', TRUE); 
		$this->load->model('Pencatatan_model','', TRUE); 
		$this->load->model('Upload_model','', TRUE); 
		$this->load->model('Pembimbing_model','', TRUE); 
		$this->load->model('Sempro_model','', TRUE); 
		$this->load->model('Semhas_model','', TRUE); 
		$this->load->library('pagination');
		$this->load->model('Login_model','',true);
	}
        
//        public function index($pesan= NULL)
//	{
//        
//        if($this->uri->segment(3) == 'akun_belum_terdaftar')
//            $message = "Akun Belum Terdaftar";
//        else if($this->uri->segment(3) == 'salah_password')
//            $message = "Password Anda Salah";
//        else if($this->uri->segment(3) == 'salah_username_password')
//            $message = "Username atau Password Anda Salah";
//        else
//            $message = "";
//        
//        
//		if(!$_POST)
//		{
//			$input = (object) $this->Login_model->getDefaultValues();
//		}
//		else
//		{
//			$input = (object) $this->input->post();
//		}
//
//		if(!$this->Login_model->validate()) {
//			$this->load->view('templates/loginFix', compact('input','message'));
//			return;
//		}
//
//		if(!$this->Login_model->run($input)) {
//            $username = $this->input->post('username');
//            $password = md5($this->input->post('password'));
//            
////            var_dump($username,$password);die();
//            
//             if(strlen($username) == 9)
//        {
//             //fopen("cookie.txt", "w+");
//
//    
//    $curl = curl_init();
//    $url["login"] = "https://portal.usu.ac.id/login/proses_login.php";
//    $url["khs"] = "https://portal.usu.ac.id/informasi_hasil_studi/tampil.php";
//    $url["transkrip"] = "https://portal.usu.ac.id/transkrip/tampil.php";
//    $url['profil'] = "https://portal.usu.ac.id/profil/tampil.php";
//    $cookie = "cookie.txt";
//
//    $data = [
//      'username' => $username,
//      'password' => $psswd
//    ];
//
//    $data = http_build_query($data);
//
//    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//    curl_setopt($curl, CURLOPT_URL, $url["login"] );
//    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($curl, CURLOPT_POST, 1);
//    curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($cookie));
//
//    
//    $html = curl_exec($curl);
//    $pattern = '/<div.+?id="member-info">.+<h3>([\S\s]+)<\/h3>.+<h4>([\d]+)<\/h4>.+<h4>([\S\s]+)<\/h4>.+/s';
//    preg_match($pattern, $html, $login);
//
//    if(empty($login))
//    {
//        if(is_numeric($username))
//        {
//            redirect('Tugas/login/salah_username_password');
//        }
//        else
//        {
//             $verifikasi_user = $this->Login_model->verif_user($username)->num_rows();
//            
//            if($verifikasi_user<=0)
//            {
//                redirect('Tugas/login/akun_belum_terdaftar');
//            }
//            else
//            {
//                $verifikasi_akun = $this->Login_model->verif_akun($username,$password)->num_rows();
//                
//                if($verifikasi_akun <= 0)
//                {
//                    redirect('Tugas/login/salah_password');
//                }   
//            }
//        }
//    }
//    }
//            
//            $verifikasi_user = $this->Login_model->verif_user($username)->num_rows();
//            
//            if($verifikasi_user<=0)
//            {
//                redirect('Tugas/index/akun_belum_terdaftar');
//            }
//            else
//            {
//                $verifikasi_akun = $this->Login_model->verif_akun($username,$password)->num_rows();
//                
//                if($verifikasi_akun <= 0)
//                {
//                    redirect('Tugas/index/salah_password');
//                }   
//            }
//            
//			redirect('Tugas/login');
//		}
//		else
//		{  
//           
//			if($_SESSION['level'] == '1' || $_SESSION['level'] == '2' || $_SESSION['level'] == '4' || $_SESSION['level'] == '5' || $_SESSION['level'] == '6' || $_SESSION['level'] == '7')
//			{ redirect('Tugas/skripsi');}
//			else if($_SESSION['level'] == '3')
//			{
//				redirect('Mahasiswa/index');
//			}
//			else
//			{
//				$id_user = $_SESSION['username'];
//				$id = $this->Formulir_model->search($id_user)->result();
//				foreach($id as $d)
//				{
//					$id_new = $d->id_skripsi;
//				}
//				$session_data = [
//						'id_skripsi' => $id_new
//						];
//
//					$this->session->set_userdata($session_data);
//				
//				redirect('Tugas/get_formulir/'.$id_new);
//			}
//		}
//	}

		public function getGlobal($id)
		{
			return [
				'jumlah_mhs_sem' => (int) @$this->db->query("SELECT COUNT(*) as jumlah_mhs FROM mahasiswa_sidang WHERE id_jadwal_seminar = {$id}")
				 ->row()
				 ->jumlah_mhs ?: 0,
				'batas_mhs_sem' => (int) @$this->db->query("SELECT * FROM jadwal_seminar WHERE id = {$id}")
				 ->row()
				 ->batas_sidang ?: 0
			];
		}

		function dosen()
		{

		$data['user']=$this->Dosen_model->get_paged_list()->result();
		$this->load->library('pagination');
		$config['uri_segment']=3;
		$this->pagination->initialize($config);
		
		if($this->uri->segment(3) == 'delete_success')
				$data['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$data['message'] = 'Data berhasil ditambah';
        else if($this->uri->segment(3) == 'add_gagal')
				$data['message'] = 'Kode Dosen Tersebut Sudah Ada';
		else if($this->uri->segment(3) == 'update_success')
				$data['message'] = 'Data berhasil diedit';
		else
				$data['message'] =' ';

		$data['active'] = 'dosen';
		$this->load->view('templates/dosen',$data);

		}

		function index($page = null)
		{
			$halaman = 8;
            $data['bar'] = 0;

			$off = $page;

			$data['headline'] = $this->Upload_model->cek_headline()->result();
			$data['data'] = $this->Upload_model->get_all_berita_headline($halaman,$off)->result();
			$data['jumlah'] = $this->Upload_model->get_all_berita_display()->num_rows();

			$config['base_url'] = base_url().'Tugas/index';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 


				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();


				$data['no'] = 1+$off;

			$this->load->view('templates/headline',$data);
		}

		function detail_berita($id)
		{
			$data['data'] = $this->Upload_model->get_berita_by_id($id)->result();
			$data['others'] = $this->Upload_model->get_all_berita_limit()->result();

			$this->load->view('templates/detail_berita',$data);
		}


		//validation rules

		function _set_rules() {
	
			$this->form_validation->set_rules('Kode_dosen','kd_dosen',
			'required');
		}
		function add_dosen($aktif)
		{
		$data['activated'] = $aktif;
		$data['prodi']=$this->Prodi_model->get_paged_list()->result();
		$data['active'] ='akun dosen';

		$this->load->view('templates/insert_dosen',$data);
	
		}

		function insert_adv($activated){
		$kd = $this->input->post('Kode_dosen');
		$nama = $this->input->post('Nama_dosen');
		$pangkat = $this->input->post('Pangkat');
		$golongan = $this->input->post('Golongan');
		$nip = $this->input->post('NIP');
		$nidn = $this->input->post('NIDN');
		$kode = $this->input->post('Kode_PS');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = md5($password);
            
             $dat = $this->Dosen_model->get_check_id_dosen($kd)->num_rows();
           if($dat > 0)
           {
               redirect('Tugas/dosen/add_gagal',$data);
           }
            
            $upload = $this->input->post('uploadImage');

		//konfigurasi upload cover
		$config['upload_path'] = './ttd_dosen/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 9000000000000;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $config['overwrite']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadImage'))
           {
           	  $error = $this->upload->display_errors();

                        if($error == '<p>You did not select a file to upload.</p>')
                        	{
                         $data = array(
			'Kode_dosen' => $kd,
			'Nama_dosen' => $nama,
			'Pangkat' => $pangkat,
			'Golongan' => $golongan,
			'NIP' => $nip,
			'NIDN' => $nidn,
			'Kode_PS' => $kode
			);
            
        
		$this->Dosen_model->save($data);

		$datum = array(
			'username' => $username,
			'password' => $pass,
			'level' => '2',
			'kd_dsn' => $kd
			);
            
       
            
		$tes = $this->Dosen_model->save_akun($datum);

            
                if($test)
                {
                	 redirect('Tugas/dosen/add_success',$data);  
       			}
                                
            }
                        else
                        	$errors = $error;

                        redirect('Tugas/add_dosen/'.$errors);

           }

        else
        {
        	   $data_gambar = array('upload_data' => $this->upload->data());

                        foreach($data_gambar as $dg)
                        {
                        	$nama_file = $dg['orig_name'];
                        }
                
                
            $data = array(
			'Kode_dosen' => $kd,
			'Nama_dosen' => $nama,
			'Pangkat' => $pangkat,
			'Golongan' => $golongan,
			'NIP' => $nip,
			'NIDN' => $nidn,
			'Kode_PS' => $kode,
            'ttd' => $nama_file
			);
            
        
		$this->Dosen_model->save($data);

		$datum = array(
			'username' => $username,
			'password' => $pass,
			'level' => '2',
			'kd_dsn' => $kd
			);
            
       
            
		$tes = $this->Dosen_model->save_akun($datum);

            
                if($test)
                {
                	 redirect('Tugas/dosen/add_success',$data);  
       			}
		}
        
	}

		function update($aktif,$id)
		{
			$data['studi']=$this->Prodi_model->get_paged_list()->result();
			$data['dosen']=$this->Dosen_model->get_paged_list_update($id)->result();
			$data['akun'] = $this->Dosen_model->get_akun_by_id($id)->result();
			$data['active'] = $aktif;
            
            $data['stambuk'] = $this->Dosen_model->get_stambuk($id)->result();
			$this->load->view('templates/edit_dosen',$data);
		}

		function proses_tambah_akun_dsn()
		{
			$dosen = $this->input->post('dosen');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$pass = md5($password);

			$data = array(
				'username' => $username,
				'password' => $pass,
				'level' => '2',
				'kd_dsn' => $dosen
				);

			$this->Dosen_model->save_akun_dosen($data);

			redirect('tugas/akun_dosen/add_success');
		}

		function tambah_akun_dosen()
		{
			$data['dosen'] = $this->Dosen_model->get_dosen()->result();

			$this->load->view('templates/tambah_akun_dosen',$data);
		}

		function proses_update_akun_dsn($kd)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$pass = md5($password);

			if($password == '')
			{
				$data = array(
				'username' => $username,
				);
			}
			else
			{
				$data = array(
				'username' => $username,
				'password' => $pass
				);
			}
		

			$this->db->where('kd_dsn', $kd)->update('user',$data);

			redirect('tugas/akun_dosen/sukses_diedit');
		}

		function profil()
		{
			$data['data'] = $this->Upload_model->get_profil()->result();


			if($this->uri->segment(3) == 'update_berhasil')
				$data['message'] = "Data Telah Diupdate";
			else
				$data['message'] = "";

			$this->load->view('templates/profil',$data);
		}

		function update_profil($username)
		{
			$user = $this->input->post('username');
			$password = $this->input->post('password');
			$pass = md5($password);


			
			if($password == '')
			{
				$data = array(
					'username' => $user,
					);
			}
			else
			{
				$data = array(
					'username' => $user,
					'password' => $pass
					);
			}

			$this->db->where('username',$username)->update('user',$data);
			$this->session->set_userdata($data);

			redirect('Tugas/profil/update_berhasil',$data);
		}

		function update_akun_dosen($id)
		{
			$data['active'] = "akun dosen";
			$data['dosen']=$this->Dosen_model->get_paged_list_update($id)->result();
			$data['akun'] = $this->Dosen_model->get_akun_by_id($id)->result();

			$this->load->view('templates/edit_akun_dosen',$data);
		}

		function update_dsn($aktif,$id)
		{

        if($_SESSION['level'] == '4')
        {
            $id = $id;
		$kd = $this->input->post('Kode_dosen');
		$nama = $this->input->post('Nama_dosen');
        $kuota = $this->input->post('kuota');
        $stambuk = $this->input->post('stambuk'); 
            
            //EDIT KUOTA BIMBINGAN
            if($kuota != null)
            {
                $nilai_kuota = array(
                    'kuota' => $kuota
                );
                
                $this->db->where('stambuk', $stambuk)->where('kd_dosen', $kd)->update('kuota_bimbingan', $nilai_kuota);
            }
            
            redirect ('Tugas/dosen/update_success');
            
        }
            else{
		$id = $id;
		$kd = $this->input->post('Kode_dosen');
		$nama = $this->input->post('Nama_dosen');
		$pangkat = $this->input->post('Pangkat');
		$golongan = $this->input->post('Golongan');
		$nip = $this->input->post('NIP');
		$nidn = $this->input->post('NIDN');
		$kode = $this->input->post('Kode_PS');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = md5($password);
		$username_lama = $this->input->post('username_lama');
        $kuota = $this->input->post('kuota');
        $stambuk = $this->input->post('stambuk'); 
            }
            
             //konfigurasi upload cover
		$config['upload_path'] = './ttd_dosen/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 9000000000000;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $config['overwrite']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadImage'))
           {
           	  $error = $this->upload->display_errors();

                        if($error == '<p>You did not select a file to upload.</p>')
                        	{
                         
		$data = array(
			'Kode_dosen' => $kd,
			'Nama_dosen' => $nama,
			'Pangkat' => $pangkat,
			'Golongan' => $golongan,
			'NIP' => $nip,
			'NIDN' => $nidn,
			'Kode_PS' => $kode
			);

		$this->Dosen_model->update($id,$data);
                        }

                        else
                        {$errors = $error;
                        
                        redirect('Tugas/update/dosen/'.$kd);
                        }

                        

           }

        else
        {
        	   $data_gambar = array('upload_data' => $this->upload->data());

                        foreach($data_gambar as $dg)
                        {
                        	$nama_file = $dg['orig_name'];
                        }
                
                 
		$data = array(
			'Kode_dosen' => $kd,
			'Nama_dosen' => $nama,
			'Pangkat' => $pangkat,
			'Golongan' => $golongan,
			'NIP' => $nip,
			'NIDN' => $nidn,
			'Kode_PS' => $kode,
            'ttd' => $nama_file
			);

		$this->Dosen_model->update($id,$data);

           
		}
        //EDIT KUOTA BIMBINGAN
            if($kuota != null)
            {
                $nilai_kuota = array(
                    'kuota' => $kuota
                );
                
                $this->db->where('stambuk', $stambuk)->where('kd_dosen', $kd)->update('kuota_bimbingan', $nilai_kuota);
            }

		var_dump($kd);
            
           
       
		if($password == '')
		{
			$datum = array(
			'username' => $username,
			'kd_dsn' => $kd,
			'level' => '2'
			);
		}

		else {
		$datum = array(
			'username' => $username,
			'password' => $pass,
			'kd_dsn' => $kd,
			'level' => '2'

			);
		}

		//CEK sudah ada atau belum di akun
		$akun_dosen = $this->Dosen_model->get_akun_by_id($kd)->num_rows();

		if($akun_dosen > 0)
		{
			//update
			$this->db->where('username',$username_lama)->update('user',$datum);

		}
		else
		{
			//insert
			$this->Dosen_model->save_akun($datum);
		}
            
        

		if($aktif == 'dosen')
		{
		redirect ('Tugas/dosen/update_success');
	}
	else
	{
		redirect ('Tugas/akun_dosen/update_success');
		}
	}



	function delete_dosen($id) {
	//delete siswa
	$this->Dosen_model->delete($id);

	//redirect to dosen list page
	
	redirect('Tugas/dosen/delete_success','refresh');}
        
    function mahasiswa_diuji($page=NULL)
    {
       
        $data['active']='mahasiswa_diuji';
 $this->load->database();
        $this->load->library('pagination');
        
         if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
        
            
			$data['batas'] = $this->input->post('batas');
            
            if($data['batas'] != NULL) {
            $sess_data = [
						'def' =>$data['batas']
						];

					$this->session->set_userdata($sess_data);
            }

			if($_SESSION['def'] == NULL)
            {
                $halaman = 5;
            }
			else
			{
				$halaman = $_SESSION['def'];
			}

			$off = $page;
        
		$data['data'] = $this->Cari_model->cari_penguji($halaman,$off)->result();
		$data['jumlah'] = $this->Cari_model->cari_penguji_count()->num_rows();
        
            if($halaman == 'all')
            {
                $halaman = $data['jumlah'];
            }

				$config['base_url'] = base_url().'Tugas/mahasiswa_diuji';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
            $data['set'] = "normal";
        $data['no'] = 1+$off;
		$this->load->view('templates/pencarian_mahasiswa_diuji',$data);
    }
    
    function cari_mahasiswa_diuji($offset = null)
	{
        $data['active']='mahasiswa_diuji';
        
            $this->load->database();
			$this->load->library('pagination');
        
         if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }

			$halaman = 10;
			$off = $offset;
       // var_dump($off);
        
        $data['set'] = "pencarian";
		$key = $this->input->post('key');
		$status1 = $this->input->post('status_pemb');
		$status2 = $this->input->post('status');
        $cetak = $this->input->post('cetak');
        
        if($cetak != null)
        {
            $halaman = "all";
        }

		$data['data'] = $this->Cari_model->cari_penguji_mahasiswa($key,$status1,$status2,$halaman,$off)->result();
        
        //var_dump($data['data']);
		$data['jumlah'] = $this->Cari_model->cari_penguji_mahasiswa_count($key,$status1,$status2)->num_rows();
        
                $config['base_url'] = base_url().'Tugas/cari_mahasiswa_diuji';
				$config['total_rows'] = $data['jumlah']; 
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
        
		$data['cari'] = $key;
		$data['status_pemb'] = $status1;
		$data['status'] = $status2;
        //var_dump($data['cari']);
        $data['no'] = 1+$off;
        
         if($cetak != null)
        {
               // load view yang akan digenerate atau diconvert
        // contoh kita akan membuat pdf dari halaman welcome codeigniter
        $this->load->view('templates/print_cari_pembimbing',$data);
        // dapatkan output html

        $html = $this->output->get_output();

        // Load/panggil library dompdfnya
        $this->load->library('Dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("pembimbing.pdf", array('Attachment' => 0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        //$this->dompdf->stream("welcome.pdf");
            
        }
		$this->load->view('templates/pencarian_mahasiswa_diuji',$data);
	}

	function search_mahasiswa($page=NULL)
	{
		$data['active']='pencarian_mahasiswa';
        
        
         if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
        
        $this->load->database();
        $this->load->library('pagination');
            
			$data['batas'] = $this->input->post('batas');
            
            if($data['batas'] != NULL) {
            $sess_data = [
						'def' =>$data['batas']
						];

					$this->session->set_userdata($sess_data);
            }

			if($_SESSION['def'] == NULL)
            {
                $halaman = 5;
            }
			else
			{
				$halaman = $_SESSION['def'];
			}

			$off = $page;
        
		$data['data'] = $this->Cari_model->cari_mahasiswa2($halaman,$off)->result();
		$data['jumlah'] = $this->Cari_model->cari_mahasiswa2_count()->num_rows();
        
            if($halaman == 'all')
            {
                $halaman = $data['jumlah'];
            }

				$config['base_url'] = base_url().'Tugas/search_mahasiswa';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
            $data['set'] = "normal";
        $data['no'] = 1+$off;
		$this->load->view('templates/pencarian_mahasiswa',$data);
	}


	function proses_cari_mahasiswa($offset = null)
	{
        $data['active']='pencarian_mahasiswa';
        
            $this->load->database();
			$this->load->library('pagination');

         if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
        
			$halaman = 10;
			$off = $offset;
       // var_dump($off);
        
        $data['set'] = "pencarian";
		$key = $this->input->post('key');
		$status1 = $this->input->post('status_pemb');
		$status2 = $this->input->post('status');
        $cetak = $this->input->post('cetak');
        
        if($cetak != null)
        {
            $halaman = "all";
        }

		$data['data'] = $this->Cari_model->cari_mahasiswa($key,$status1,$status2,$halaman,$off)->result();
        
        //var_dump($data['data']);
		$data['jumlah'] = $this->Cari_model->cari_mahasiswa_count($key,$status1,$status2)->num_rows();
        
                $config['base_url'] = base_url().'Tugas/proses_cari_mahasiswa';
				$config['total_rows'] = $data['jumlah']; 
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
        
		$data['cari'] = $key;
		$data['status_pemb'] = $status1;
		$data['status'] = $status2;
        //var_dump($data['cari']);
        $data['no'] = 1+$off;
        
         if($cetak != null)
        {
               // load view yang akan digenerate atau diconvert
        // contoh kita akan membuat pdf dari halaman welcome codeigniter
        $this->load->view('templates/print_cari_pembimbing',$data);
        // dapatkan output html

        $html = $this->output->get_output();

        // Load/panggil library dompdfnya
        $this->load->library('Dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("pembimbing.pdf", array('Attachment' => 0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        //$this->dompdf->stream("welcome.pdf");
            
        }
		$this->load->view('templates/pencarian_mahasiswa',$data);
	}
        
		function disertasi($page=null)
		{
			$this->load->database();
			$this->load->library('pagination');
			//load data siswa
			$disertasi['batas'] = $this->input->post('batas');

			if($disertasi['batas'] == NULL)
				{$halaman = 5;}
			else
			{
				$halaman = $disertasi['batas'];
			}

			$off = $page;

		$disertasi['data']=$this->Disertasi_model->get_paged_list($halaman,$off)->result();
		$disertasi['jumlah'] = $this->Disertasi_model->get_paged_list_count()->num_rows();
		$disertasi['studi'] = $this->Prodi_model->get_paged_list()->result();
		

				$config['base_url'] = base_url().'Tugas/disertasi';
				$config['total_rows'] = $disertasi['jumlah'];
				$config['per_page'] = $halaman;
				$config['prev_tag_open'] = "<div class='previous'>";
				$config['prev_tag_close'] = "</div>";
				$config['next_tag_open'] = "<div class='btn btn-default' >";
				$config['next_tag_close'] ="</div>";
				$config['prev_tag_open'] = "<div class='btn btn-default' >";
				$config['prev_tag_close'] ="</div>";
				$config['next_tag_open'] = "<div class='btn btn-default' >";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = false;

				
				$this->pagination->initialize($config);

				$disertasi['pagination'] = $this->pagination->create_links();
		if($this->uri->segment(3) == 'delete_success')
				$disertasi['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$disertasi['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'update_success')
				$disertasi['message'] = 'Data berhasil diedit';
		else
				$disertasi['message'] =' ';

			$disertasi['no'] = 1+$off;
			$disertasi['active'] = 'disertasi';

		$this->load->view('templates/disertasi',$disertasi);

		}

		function search_disertasi($offset = null)
		{
			$this->load->database();
			$this->load->library('pagination');

			
			$halaman = 30;
			$off = $offset;
			$data['set'] = 1;
		
			$data['cari'] = $this->input->post('key');
			$data['tgl_mulai'] = $this->input->post('tgl_awal');
			$data['tgl_akhir'] = $this->input->post('tgl_akhir');
			$data['pil'] = $this->input->post('pilihan');
			$data['skripsi'] = $this->input->post('skripsi');
			$data['nim'] = $this->input->post('nim');
			$data['prodi'] = $this->input->post('prodi');
			$data['reset'] = $this->input->post('reset');


			//set NULL value
			//if($data['prodi'] == 'all') {$data['prodi'] = NULL;}
			//var_dump($data); die();
			$data['data'] = $this->Cari_model->cariin($data['skripsi'],$data['nim'],$data['prodi'],$data['cari'],$data['tgl_mulai'],$data['tgl_akhir'],$data['pil'],$halaman,$off,'v_disertasi')->result();

			
			//var_dump($db);
			$data['jumlah'] = $this->Cari_model->jumlah_cariin($data['skripsi'],$data['nim'],$data['prodi'],$data['cari'],$data['tgl_mulai'],$data['tgl_akhir'],$data['pil'],'v_disertasi')->num_rows();
			$data['studi'] = $this->Prodi_model->get_paged_list()->result();

				$config['base_url'] = base_url().'Tugas/search_skripsi';
				$config['total_rows'] = $data['jumlah']; 
				$config['per_page'] = $halaman;
				$config['uri_segment'] = 3;
				$config['next_tag_open'] = "<div class='btn btn-default' >";
				$config['next_tag_close'] ="</div>";
				$config['prev_tag_open'] = "<div class='btn btn-default' >";
				$config['prev_tag_close'] ="</div>";
				$config['next_tag_open'] = "<div class='btn btn-default' >";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = false;
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();

			if($this->uri->segment(3) == 'delete_success')
				$message = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$message = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'update_success')
				$message = 'Data berhasil diedit';
		else
				$message =' ';
		$data['no'] = 1+$off;
		
		$this->load->view('templates/disertasi',$data);

		}

		function add_disertasi()
		{	
		$data['prodi'] = $this->Prodi_model->get_paged_list()->result();
		$data['dosen'] = $this->Dosen_model->get_paged_list()->result();
		$data['active'] = 'disertasi';
		$this->load->view('templates/insert_disertasi',$data);
		}

		function insert_disertasi(){
		$kd = $this->input->post('id_disertasi');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode_PS');
		$judul = $this->input->post('judul_skripsi');
		$pembimbing1 = $this->input->post('kode_pembimbing1');
		$pembimbing2 = $this->input->post('kode_pembimbing2');
		$tgl = date('Y-m-d',
	strtotime($this->input->post('Tgl_lulus')));
		

		$data = array(
			'id_disertasi' => $kd,
			'nim' => $nim,
			'nama' => $nama,
			'kode_PS' => $kode,
			'judul_skripsi' => $judul,
			'kode_pembimbing1' => $pembimbing1,
			'kode_pembimbing2' => $pembimbing2,
			'Tgl_lulus' => $tgl,
			);
		$this->Disertasi_model->save($data);
		$disertasi['active'] = 'disertasi';
		redirect('Tugas/disertasi/add_success', $disertasi);
	}


	function delete_disertasi($id) {
	//delete siswa
	$this->Disertasi_model->delete($id);

	/*echo "

<script>
function confirmDialog($nama) {
 return confirm('Apakah anda yakin akan menghapus data ini?')
}
</script>

";*/
	//redirect to dosen list page
	
	redirect('Tugas/disertasi/delete_success','refresh');
}


		function update_disertasi($id)
		{
			$data['prodi2'] = $this->Prodi_model->get_paged_list()->result();
			$data['disertasi']=$this->Disertasi_model->get_paged_list_update($id)->result();
			$data['dosen'] = $this->Dosen_model->get_paged_list()->result();
			$data['active'] = 'disertasi';
			$this->load->view('templates/edit_disertasi',$data);

		}

		function update_dis()
		{
		$id = $this->input->post('id_disertasi');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$prodi = $this->input->post('kode_PS');
		$judul = $this->input->post('judul_skripsi');
		$pembimbing1 = $this->input->post('kode_pembimbing1');
		$pembimbing2 = $this->input->post('kode_pembimbing2');
		$tgl = date('Y-m-d',strtotime($this->input->post('Tgl_lulus')));

			
		$data = array(
			'id_disertasi' => $id,
			'nim' => $nim,
			'nama' => $nama,
			'kode_PS' => $prodi,
			'judul_skripsi' => $judul,
			'kode_pembimbing1' => $pembimbing1,
			'kode_pembimbing2' => $pembimbing2,
			'Tgl_lulus' => $tgl
			);
	
		$this->Disertasi_model->update($id,$data);
		redirect ('Tugas/disertasi/update_success');
		}

		function skripsi($page = null)
		{
			$this->load->database();
			$this->load->library('pagination');
            
			$data['batas'] = $this->input->post('batas');
            
            
            if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
                
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            if($data['batas'] != NULL) {
            $sess_data = [
						'batas' =>$data['batas']
						];

					$this->session->set_userdata($sess_data);
            }

			if($_SESSION['batas'] == NULL)
            {
                $halaman = 5;
            }
			else
			{
				$halaman = $_SESSION['batas'];
			}

			$off = $page;
            
                
				$data['data'] =$this->Skripsi_model->get_paged_list($halaman,$off)->result();
//                var_dump($data['data']); die();
                
//                if($halaman != 'all') {
//                $query = "SELECT * from v_pencatatan limit(". $halaman .",". $off.")";
//                }
//                else {
//                  $query = "SELECT * from v_pencatatan";  
//                }
//            
//            var_dump($query);die;
//                $data['data'] = $this->db->query($query)->result();
				$data['jumlah'] = $this->Skripsi_model->get_paged_list_count()->num_rows();
				$data['studi'] = $this->Prodi_model->get_paged_list()->result();

                 if($halaman == 'all')
            {
                $halaman = $data['jumlah'];
            }

				$config['base_url'] = base_url().'Tugas/skripsi';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
			if($this->uri->segment(3) == 'delete_success')
				$data['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$data['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'update_success')
				$data['message'] = 'Data berhasil diedit';
		else
				$data['message'] =' ';
		$data['no'] = 1+$off;
		$data['active'] = 'skripsi';
            
		$this->load->view('templates/skripsi',$data);
		}

		function search_skripsi($offset = null)
		{
			$this->load->database();
			$this->load->library('pagination');

			$halaman = 5;
			$off = $offset;
			$data['set'] = 1;
		
			$data['cari'] = $this->input->post('key');
			$data['tahun_lulus'] = $this->input->post('tahun_lulus');
			$data['tahun_lulus2'] = $this->input->post('tahun_lulus2');
			$data['skripsi'] = $this->input->post('skripsi');
			$data['nim'] = $this->input->post('nim');
			$data['prodi'] = $this->input->post('prodi');
			$data['reset'] = $this->input->post('reset');
			$data['batas'] = $this->input->post('batas');
			$data['jenis_ta'] = $this->input->post('jenis_ta');
			//set NULL value
			//if($data['prodi'] == 'all') {$data['prodi'] = NULL;}
			//var_dump($data); die();
			//$halaman = $data['batas'];
            
             $data['cetak'] = $this->input->post('cetak');
            
            
            if($data['cetak'] != null)
            {
                $halaman = 'all';
            }
			
			$data['data'] = $this->Cari_model->cariin($data['skripsi'],$data['nim'],$data['prodi'],$data['cari'],$data['tahun_lulus'],$data['tahun_lulus2'],$data['jenis_ta'],$halaman,$off,'v_pencatatan')->result();

			
			//var_dump($db);
			$data['jumlah'] = $this->Cari_model->jumlah_cariin($data['skripsi'],$data['nim'],$data['prodi'],$data['cari'],$data['tahun_lulus'],$data['tahun_lulus2'],$data['jenis_ta'],'v_pencatatan')->num_rows();
			$data['studi'] = $this->Prodi_model->get_paged_list()->result();

				$config['base_url'] = base_url().'Tugas/search_skripsi';
				$config['total_rows'] = $data['jumlah']; 
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
                

			if($this->uri->segment(3) == 'delete_success')
				$message = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$message = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'update_success')
				$message = 'Data berhasil diedit';
		else
				$message =' ';
		$data['no'] = 1+$off;
		$data['active'] = 'skripsi';
            
             if($data['cetak'] != null)
        {
            // load view yang akan digenerate atau diconvert
        // contoh kita akan membuat pdf dari halaman welcome codeigniter
        $this->load->view('templates/page_prints',$data);
        // dapatkan output html

        $html = $this->output->get_output();

        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("welcome.pdf", array('Attachment' => 0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        //$this->dompdf->stream("welcome.pdf");
            
        }
            
		$this->load->view('templates/skripsi',$data);

		}
		
		function add_skripsi()
		{

		$data['prodi'] = $this->Prodi_model->get_paged_list()->result();
		$data['pembimbing'] = $this->Dosen_model->get_paged_list()->result();
		$data['active'] = 'skripsi';
		$this->load->view('templates/insert_skripsi', $data);
		
	
		}

		function insert_skripsi(){
		$kd = $this->input->post('id_skripsi');
		$judul = $this->input->post('judul_skripsi');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$kode = $this->input->post('kode_PS');
		$pembimbing1 = $this->input->post('kode_Pembimbing1');
		$pembimbing2 = $this->input->post('kode_Pembimbing2');
		$tgl = date('Y-m-d',
	strtotime($this->input->post('Tgl_lulus')));
		

		$data = array(
			'id_skripsi' => $kd,
			'judul_skripsi' => $judul,
			'nim' => $nim,
			'nama' => $nama,
			'kode_PS' => $kode,
			'kode_Pembimbing1' => $pembimbing1,
			'kode_Pembimbing2' => $pembimbing2,
			'Tgl_lulus' => $tgl
			);
		$this->Skripsi_model->save($data);
		redirect('Tugas/skripsi/add_success');
	}

	function tambah_skripsi()
		{
			$data['prodi'] = $this->Prodi_model->get_paged_list()->result();
			$data['pembimbing'] = $this->Dosen_model->get_paged_list()->result();
			$data['active'] = 'skripsi';

			if($this->uri->segment(3) == 'add_success')
				$data['message'] = 'Data berhasil ditambah';
			$data['active'] ='tambah_skripsi';

			$this->load->view('templates/tambah_skripsi', $data);
		}

	function proses_tambah_skripsi()
	{
		$nim = $this->input->post('nim');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$kode_PS = $this->input->post('kode_PS');
		$sk_pembimbing = $this->input->post('sk_pembimbing');
		$sk_pembanding = $this->input->post('sk_pembanding');
		$nama = $this->input->post('nama');
		$judul= $this->input->post('judul');
		$jenis_ta = $this->input->post('jenis_ta');
		$kode_Pembimbing1 = $this->input->post('kode_Pembimbing1');
		$kode_Pembimbing2 = $this->input->post('kode_Pembimbing2');
		$kode_Pembanding1 = $this->input->post('kode_Pembanding1');
		$kode_Pembanding2 = $this->input->post('kode_Pembanding2');
		$tgl_sempro = $this->input->post('tgl_sempro');
		$tgl_semhas = $this->input->post('tgl_semhas');
		$tgl_sidang = $this->input->post('tgl_sidang');
		$uji_program = $this->input->post('nilai_uji_program');
		$nilai_semhas = $this->input->post('nilai_semhas');
		$nilai_sidang = $this->input->post('nilai_sidang');
		$total = $this->input->post('total');
		$grade = $this->input->post('grade');
		$status = $this->input->post('status');
        $bulan_lulus = $this->input->post('bulan_lulus');
		$mahasiswa = array (
				'nim' => $nim,
				'nama' => $nama,
				'id_PS' => $kode_PS,
				'status' => $status
			);

		$pembimbing = array(
				'nomor_sk' => $sk_pembimbing,
				'nim' => $nim,
				'pembimbing1' => $kode_Pembimbing1,
				'pembimbing2' => $kode_Pembimbing2
			);

		$pembanding = array(
				'nomor_sk' => $sk_pembanding,
				'nim' => $nim,
				'pembanding1' => $kode_Pembanding1,
				'pembanding2' => $kode_Pembanding2
			);

		$nilai = array(
				'nim' => $nim,
				'nilai_uji_program' => $uji_program,
				'nilai_semhas' => $nilai_semhas,
				'nilai_sidang' => $nilai_sidang,
				'total' => $total,
				'grade' => $grade
			);

		$skripsi = array(
				'nim' => $nim,
				'judul' => $judul,
                'bulan_lulus' => $bulan_lulus,
				'tahun_lulus' =>$tahun_lulus,
				'tanggal_sempro' =>$tgl_sempro,
				'tanggal_semhas' => $tgl_semhas,
				'tanggal_sidang' => $tgl_sidang,
				'jenis_TA' => $jenis_ta
			);

		$this->Pencatatan_model->save_mahasiswa($mahasiswa);
		$this->Pencatatan_model->save_pembimbing($pembimbing);
		$this->Pencatatan_model->save_pembanding($pembanding);
		$this->Pencatatan_model->save_nilai($nilai);
		$this->Pencatatan_model->save_skripsi($skripsi);
		
		redirect('Tugas/tambah_skripsi/add_success');
	}

	function log_pencatatan()
	{
		$data['active'] = 'log_pencatatan';
		$data['data'] = $this->Pencatatan_model->get_data_pencatatan()->result();
		$this->load->view('templates/log_pencatatan', $data);
	}

	function detail_skripsi($nim)
	{
        $data['active'] = 'skripsi';
        
		$data['data']=$this->Skripsi_model->get_data($nim)->result();
		$this->load->view('templates/detail_skripsi', $data);
	}
	function delete_skripsi($nim) {
	//delete siswa
	$this->Skripsi_model->delete_mahasiswa($nim);
	$this->Skripsi_model->delete_pembimbing($nim);
	$this->Skripsi_model->delete_pembanding($nim);
	$this->Skripsi_model->delete_skripsi($nim);
	$this->Skripsi_model->delete_nilai($nim);

	
	redirect('Tugas/skripsi/delete_success','refresh');
}
        
    function print_detail($nim)
    {
        $data['data']=$this->Skripsi_model->get_data($nim)->result();
        
        // load view yang akan digenerate atau diconvert
        // contoh kita akan membuat pdf dari halaman welcome codeigniter
        $this->load->view('templates/print_detail_skripsi',$data);
        // dapatkan output html

        $html = $this->output->get_output();

        // Load/panggil library dompdfnya
        $this->load->library('dompdf_gen');

        // Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        //utk menampilkan preview pdf
        $this->dompdf->stream("detail_skripsi.pdf", array('Attachment' => 0));
        //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
        //$this->dompdf->stream("welcome.pdf");
        
    }

	function update_skripsi($id)
		{
            $data['status'] = $this->Skripsi_model->get_status($id)->result();
			$data['skripsi']=$this->Skripsi_model->get_paged_list_update($id)->result();
			$data['prodi'] = $this->Prodi_model->get_paged_list()->result();
			$data['pembimbing'] = $this->Dosen_model->get_paged_list()->result();
			$data['tgl'] = $this->Skripsi_model->get_date($id)->result();
			$data['active'] = 'skripsi';
			$this->load->view('templates/edit_skripsi',$data);
		}

		function update_skr()
		{
			$nim = $this->input->post('nim');
		$tahun_lulus = $this->input->post('tahun_lulus');
		$kode_PS = $this->input->post('kode_PS');
		$sk_pembimbing = $this->input->post('sk_pembimbing');
		$sk_pembanding = $this->input->post('sk_pembanding');
		$nama = $this->input->post('nama');
		$judul= $this->input->post('judul');
		$kode_Pembimbing1 = $this->input->post('kode_Pembimbing1');
		$kode_Pembimbing2 = $this->input->post('kode_Pembimbing2');
		$kode_Pembanding1 = $this->input->post('kode_Pembanding1');
		$kode_Pembanding2 = $this->input->post('kode_Pembanding2');
		$tgl_sempro = $this->input->post('tgl_sempro');
		$tgl_semhas = $this->input->post('tgl_semhas');
		$tgl_sidang = $this->input->post('tgl_sidang');
		$uji_program = $this->input->post('nilai_uji_program');
		$nilai_semhas = $this->input->post('nilai_semhas');
		$nilai_sidang = $this->input->post('nilai_sidang');
		$total = $this->input->post('total');
		$grade = $this->input->post('grade');
        $bulan_lulus = $this->input->post('bulan_lulus');
        $status = $this->input->post('status');
            
            

		$mahasiswa = array (
				'nim' => $nim,
				'nama' => $nama,
				'id_PS' => $kode_PS,
                'status' => $status
			);

		$pembimbing = array(
				'nomor_sk' => $sk_pembimbing,
				'nim' => $nim,
				'pembimbing1' => $kode_Pembimbing1,
				'pembimbing2' => $kode_Pembimbing2
			);

		$pembanding = array(
				'nomor_sk' => $sk_pembanding,
				'nim' => $nim,
				'pembanding1' => $kode_Pembanding1,
				'pembanding2' => $kode_Pembanding2
			);

		$nilai = array(
				'nim' => $nim,
				'nilai_uji_program' => $uji_program,
				'nilai_semhas' => $nilai_semhas,
				'nilai_sidang' => $nilai_sidang,
				'total' => $total,
				'grade' => $grade
			);

		$skripsi = array(
				'nim' => $nim,
				'judul' => $judul,
				'tahun_lulus' =>$tahun_lulus,
                'bulan_lulus' => $bulan_lulus,
				'tanggal_sempro' =>$tgl_sempro,
				'tanggal_semhas' => $tgl_semhas,
				'tanggal_sidang' => $tgl_sidang
			);

	   $skripsi_nim = array(
        'Tgl_lulus' => $tahun_lulus,
        'Bulan_lulus' => $bulan_lulus
       );
            
        $this->db->where('nim',$nim)->update('skripsi',$skripsi_nim);
		$this->Skripsi_model->update_mahasiswa($nim,$mahasiswa);
		$this->Skripsi_model->update_pembimbing($nim,$pembimbing);
		$this->Skripsi_model->update_pembanding($nim,$pembanding);
		$this->Skripsi_model->update_nilai($nim,$nilai);
		$this->Skripsi_model->update_skripsi($nim,$skripsi);
		redirect ('Tugas/skripsi/update_success');
		}

		function tesis($page = null)
		{

			$this->load->database();
			$this->load->library('pagination');


			$tesis['batas'] = $this->input->post('batas');

			if($tesis['batas'] == NULL)
				{$halaman = 5;}
			else
			{
				$halaman = $tesis['batas'];
			}

			$off = $page;


			//load data siswa
		$tesis['data']=$this->Tesis_model->get_paged_list($halaman,$off)->result();
		$tesis['jumlah']=$this->Tesis_model->get_paged_list_count()->num_rows();

		$tesis['studi'] = $this->Prodi_model->get_paged_list()->result();

				$config['base_url'] = base_url().'Tugas/tesis';
				$config['total_rows'] = $tesis['jumlah'];
				$config['per_page'] = $halaman;
				$config['prev_tag_open'] = "<div class='previous'>";
				$config['prev_tag_close'] = "</div>";
				$config['next_tag_open'] = "<div class='btn btn-default' >";
				$config['next_tag_close'] ="</div>";
				$config['prev_tag_open'] = "<div class='btn btn-default' >";
				$config['prev_tag_close'] ="</div>";
				$config['next_tag_open'] = "<div class='btn btn-default' >";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = false;

		$this->pagination->initialize($config);
		$tesis['pagination'] = $this->pagination->create_links();
		
		if($this->uri->segment(3) == 'delete_success')
				$tesis['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$tesis['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'update_success')
				$tesis['message'] = 'Data berhasil diedit';
		else
				$tesis['message'] =' ';

		$tesis['no']=1+$off;
		$tesis['active'] = 'tesis';
		$this->load->view('templates/tesis',$tesis);

		}

		function search_tesis($offset = null)
		{
			$this->load->database();
			$this->load->library('pagination');

			
			$halaman = 30;
			$off = $offset;
			$data['set'] = 1;
		
			$data['cari'] = $this->input->post('key');
			$data['tgl_mulai'] = $this->input->post('tgl_awal');
			$data['tgl_akhir'] = $this->input->post('tgl_akhir');
			$data['pil'] = $this->input->post('pilihan');
			$data['skripsi'] = $this->input->post('skripsi');
			$data['nim'] = $this->input->post('nim');
			$data['prodi'] = $this->input->post('prodi');
			$data['reset'] = $this->input->post('reset');


			//set NULL value
			//if($data['prodi'] == 'all') {$data['prodi'] = NULL;}
			//var_dump($data); die();
			$data['data'] = $this->Cari_model->cariin($data['skripsi'],$data['nim'],$data['prodi'],$data['cari'],$data['tgl_mulai'],$data['tgl_akhir'],$data['pil'],$halaman,$off,'v_tesis')->result();

			
			//var_dump($db);
			$data['jumlah'] = $this->Cari_model->jumlah_cariin($data['skripsi'],$data['nim'],$data['prodi'],$data['cari'],$data['tgl_mulai'],$data['tgl_akhir'],$data['pil'], 'v_tesis')->num_rows();
			$data['studi'] = $this->Prodi_model->get_paged_list()->result();

				$config['base_url'] = base_url().'Tugas/search_tesis';
				$config['total_rows'] = $data['jumlah']; 
				$config['per_page'] = $halaman;
				$config['uri_segment'] = 3;
				$config['next_tag_open'] = "<div class='btn btn-default' >";
				$config['next_tag_close'] ="</div>";
				$config['prev_tag_open'] = "<div class='btn btn-default' >";
				$config['prev_tag_close'] ="</div>";
				$config['next_tag_open'] = "<div class='btn btn-default' >";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = false;
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();

			if($this->uri->segment(3) == 'delete_success')
				$message = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$message = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'update_success')
				$message = 'Data berhasil diedit';
		else
				$message =' ';
		$data['no'] = 1+$off;
		$data['active'] = 'tesis';
		$this->load->view('templates/tesis',$data);

		}

		function add_tesis()
		{
		$data['prodi'] = $this->Prodi_model->get_paged_list()->result();
		$data['pembimbing'] = $this->Dosen_model->get_paged_list()->result();
		$data['active'] ='tesis';
		$this->load->view('templates/insert_tesis', $data);
		
	
		}

		function insert_tesis(){
		$kd = $this->input->post('id_tesis');
		$judul = $this->input->post('judul_skripsi');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama_mhs');
		$kode = $this->input->post('kode_PS');
		$pembimbing1 = $this->input->post('kode_pembimbing1');
		$pembimbing2 = $this->input->post('kode_pembimbing2');
		$tgl = date('Y-m-d',
			strtotime($this->input->post('Tgl_lulus')));
		

		$data = array(
			'id_tesis' => $kd,
			'judul_skripsi' => $judul,
			'nim' => $nim,
			'nama_mhs' => $nama,
			'kode_PS' => $kode,
			'kode_pembimbing1' => $pembimbing1,
			'kode_pembimbing2' => $pembimbing2,
			'Tgl_lulus' => $tgl
			);
		$this->Tesis_model->save($data);
		redirect('Tugas/tesis/add_success');
	}

	function delete_tesis($id) {
	//delete siswa
	$this->Tesis_model->delete($id);

	/*echo "

<script>
function confirmDialog($nama) {
 return confirm('Apakah anda yakin akan menghapus data ini?')
}
</script>

";*/
	//redirect to dosen list page
	
	redirect('Tugas/tesis/delete_success','refresh');
}

	function update_tesis($id)
		{
			$data['dosen']=$this->Dosen_model->get_paged_list()->result();
			$data['prodi2']=$this->Prodi_model->get_paged_list()->result();
			$data['tesis']=$this->Tesis_model->get_paged_list_update($id)->result();
			$data['active'] = 'tesis';
			$this->load->view('templates/edit_tesis',$data);

		}

	function update_tes()
		{
		$id = $this->input->post('id_tesis');
		$judul = $this->input->post('judul_skripsi');
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama_mhs');
		$prodi = $this->input->post('kode_PS');
		$pembimbing1 = $this->input->post('kode_pembimbing1');
		$pembimbing2 = $this->input->post('kode_pembimbing2');
		$tgl = date('Y-m-d',strtotime($this->input->post('Tgl_lulus')));

			
		$data = array(
			'id_tesis' => $id,
			'judul_skripsi' => $judul,
			'nim' => $nim,
			'nama_mhs' => $nama,
			'kode_PS' => $prodi,
			'kode_pembimbing1' => $pembimbing1,
			'kode_pembimbing2' => $pembimbing2,
			'Tgl_lulus' => $tgl
			);
	
		$this->Tesis_model->update($id,$data);
		redirect ('Tugas/tesis/update_success');
		}

	function prodi()
		{

			//load data siswa
		$prodi['data']=$this->Prodi_model->get_paged_list()->result();

		$this->load->library('pagination');
		$config['uri_segment']=3;
		$this->pagination->initialize($config);
		
		if($this->uri->segment(3) == 'delete_success')
				$prodi['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$prodi['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'update_success')
				$prodi['message'] = 'Data berhasil diedit';
		else
				$prodi['message'] =' ';
		$prodi['active'] = 'prodi';
		$this->load->view('templates/prodi',$prodi);

		}

		function add_prodi()
		{
            if($this->uri->segment(3) == "id_sudah_ada")
                $data['message'] = "Kode Program Studi Tersebut Sudah Ada, Buat Kode Yang Lebih Unik";
            else
                $data['message'] = "";

		$data['active'] = 'prodi';
		$this->load->view('templates/insert_prodi', $data);
		
	
		}

		function insert_prodi(){
		$kd = $this->input->post('id_PS');
		$nama = $this->input->post('nama_PS');	
        $syarat_sks = $this->input->post('syarat_sks');
            
        $cek_available = $this->db->where('id_PS',$kd)
                                  ->get('program_studi')
                                  ->num_rows();
            
        
        if($cek_available > 0)
        {
            redirect("Tugas/add_prodi/id_sudah_ada");
        }
            
            

		$data = array(
			'id_PS' => $kd,
			'nama_PS' => $nama,
            'syarat_sks' => $syarat_sks
			);
		$this->Prodi_model->save($data);
		redirect('Tugas/prodi/add_success');
	}

	function delete_prodi($id) {
	//delete siswa
	$this->Prodi_model->delete($id);

	/*echo "

<script>
function confirmDialog($nama) {
 return confirm('Apakah anda yakin akan menghapus data ini?')
}
</script>

";*/
	//redirect to dosen list page
	
	redirect('Tugas/prodi/delete_success','refresh');
}

	function update_prodi($id,$message=NULL)
		{
        if($message == 'sukses_menambahkan')
            $data['message'] = "Berhasil Menambah Bidang Ilmu Baru";
        else if($message == 'gagal_menambahkan')
            $data['message'] = "Gagal Menambah Bidang Ilmu Baru";
        else if($message == 'sukses_mengedit')
            $data['message'] = "Sukses Mengedit Bidang Ilmu";
        else if($message == 'sukses_menghapus')
            $data['message'] = "Sukses Menghapus Bidang Ilmu";
        else
            $data['message'] = '';
        
			$data['prodi']=$this->Prodi_model->get_paged_list_update($id)->result();
            $data['bidang'] = $this->Prodi_model->get_bidang_ilmu($id)->result();
			$data['active'] = 'prodi';
			$this->load->view('templates/edit_prodi',$data);

		}

	function update_pro()
		{
		$id = $this->input->post('id_PS');
		$nama = $this->input->post('nama_PS');
        $syarat_sks = $this->input->post('syarat_sks');

			
		$data = array(
			'id_PS' => $id,
			'nama_PS' => $nama,
            'syarat_sks' => $syarat_sks
			);
	
		$this->Prodi_model->update($id,$data);
		redirect ('Tugas/prodi/update_success');
		}

    function tambah_bidang($prodi)
    {
        $data['pro'] = $prodi;
        $data['access'] = 1;
        $data['prodi'] = $this->Prodi_model->get_paged_list()->result();
        $this->load->view('templates/bidang_ilmu',$data);
    }
        
    function insert_bidang()
    {
        $prodi = $this->input->post('prodi');
        $bidang_ilmu = $this->input->post('bidang_ilmu');
        
        $data = array(
            'bidang_ilmu' => $bidang_ilmu,
            'prodi' => $prodi
        );
        
        $saved = $this->Prodi_model->save_bidang($data);
        
        if($saved)
        {
            redirect('tugas/update_prodi/'.$prodi.'/sukses_menambahkan');
        }
        else
        {
            redirect('tugas/update_prodi/'.$prodi.'/gagal_menambahkan');
        }
    }
        
    function update_bidang($prodi,$id)
    {
        $data['pro'] = $prodi;
        $data['access'] = 2;
        $data['data'] = $this->Prodi_model->get_data_bidang($id)->result();
        $data['prodi'] = $this->Prodi_model->get_paged_list()->result();
        
        $bidang_ilmu = $this->input->post('bidang_ilmu');
        $prd = $this->input->post('prodi');
        
        $array = array(
            'bidang_ilmu' => $bidang_ilmu
        );
        
        if($bidang_ilmu != NULL || $bidang_ilmu != '') {
            $update = $this->db->where('id',$id)->update('bidang_ilmu',$array);
            
        if($update)
        {
            redirect('tugas/update_prodi/'.$prodi.'/sukses_mengedit');
        }
        }
        
        $this->load->view('templates/bidang_ilmu',$data);
    }
        
    function delete_bidang($id,$prodi)
    {
        $this->db->where('id',$id)->delete('bidang_ilmu');
        
        redirect('tugas/update_prodi/'.$prodi.'/sukses_menghapus');
    }
        
	function assesment()
	{
		$this->load->view('templates/formulir_assesment');
	}

	function get_assesment($id_skripsi)
	{
		$id = $id_skripsi;

		$data['assesment'] = $this->Formulir_model->get_assesment($id)->result();
		//var_dump($data['assesment']); die();

		$this->load->view('templates/formulir_assesment', $data);
	}

	function formulir()
	{
		$this->load->view('templates/formulir_list');
	}

	function get_formulir($id)
	{
		$data['id'] = $id;
		$this->load->view('templates/formulir_list', $data);
	}

	function login($pesan= NULL)
	{
        if($this->uri->segment(3) == 'akun_belum_terdaftar')
            $message = "Akun Belum Terdaftar";
        else if($this->uri->segment(3) == 'salah_password')
            $message = "Password Anda Salah";
        else if($this->uri->segment(3) == 'salah_username_password')
            $message = "Username atau Password Anda Salah";
        else
            $message = "";
        
        
        
		if(!$_POST)
		{
			$input = (object) $this->Login_model->getDefaultValues();
		}
		else
		{
			$input = (object) $this->input->post();
		}

		if(!$this->Login_model->validate()) {
			$this->load->view('templates/loginFix', compact('input','message'));
			return;
		}

		if(!$this->Login_model->run($input)) {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
//            var_dump($username,$password);die();
            
             if(strlen($username) == 9)
        {
             //fopen("cookie.txt", "w+");

    
    $curl = curl_init();
    $url["login"] = "https://portal.usu.ac.id/login/proses_login.php";
    $url["khs"] = "https://portal.usu.ac.id/informasi_hasil_studi/tampil.php";
    $url["transkrip"] = "https://portal.usu.ac.id/transkrip/tampil.php";
    $url['profil'] = "https://portal.usu.ac.id/profil/tampil.php";
    $cookie = "cookie.txt";

    $data = [
      'username' => $username,
      'password' => $psswd
    ];

    $data = http_build_query($data);

    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_URL, $url["login"] );
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_COOKIEJAR, realpath($cookie));

    
    $html = curl_exec($curl);
    $pattern = '/<div.+?id="member-info">.+<h3>([\S\s]+)<\/h3>.+<h4>([\d]+)<\/h4>.+<h4>([\S\s]+)<\/h4>.+/s';
    preg_match($pattern, $html, $login);

    if(empty($login))
    {
        if(is_numeric($username))
        {
            redirect('Tugas/login/salah_username_password');
        }
        else
        {
             $verifikasi_user = $this->Login_model->verif_user($username)->num_rows();
            
            if($verifikasi_user<=0)
            {
                redirect('Tugas/login/akun_belum_terdaftar');
            }
            else
            {
                $verifikasi_akun = $this->Login_model->verif_akun($username,$password)->num_rows();
                
                if($verifikasi_akun <= 0)
                {
                    redirect('Tugas/login/salah_password');
                }   
            }
        }
    }
    }
            
            $verifikasi_user = $this->Login_model->verif_user($username)->num_rows();
            
            if($verifikasi_user<=0)
            {
                redirect('Tugas/login/akun_belum_terdaftar');
            }
            else
            {
                $verifikasi_akun = $this->Login_model->verif_akun($username,$password)->num_rows();
                
                if($verifikasi_akun <= 0)
                {
                    redirect('Tugas/login/salah_password');
                }   
            }
            
			redirect('Tugas/login');
		}
		else
		{  
//            var_dump($_SESSION['level']);die();
			if($_SESSION['level'] == '1' || $_SESSION['level'] == '2' || $_SESSION['level'] == '4' || $_SESSION['level'] == '5' || $_SESSION['level'] == '6' || $_SESSION['level'] == '7')
			{ redirect('Tugas/skripsi');}
			else if($_SESSION['level'] == '3')
			{
				redirect('Mahasiswa/index');
			}
			else
			{
				$id_user = $_SESSION['username'];
				$id = $this->Formulir_model->search($id_user)->result();
				foreach($id as $d)
				{
					$id_new = $d->id_skripsi;
				}
				$session_data = [
						'id_skripsi' => $id_new
						];

					$this->session->set_userdata($session_data);
				
				redirect('Tugas/get_formulir/'.$id_new);
			}
		}
	}

	function gaji_dosen()
	{
		$dosen['active'] ='gaji';
		$dosen['gaji'] = $this->Gaji_model->gaji()->result();
		if($this->uri->segment(3) == 'update_success')
				$dosen['message'] = 'Data berhasil diubah';
		$this->load->view('templates/gaji_dosen_seminar', $dosen);
	}

	function update_gaji()
	{
		$pembimbing1 = $this->input->post('pembimbing1');
		$pembimbing2 = $this->input->post('pembimbing2');
		$pembanding1 = $this->input->post('pembanding1');
		$pembanding2 = $this->input->post('pembanding2');

		$data = array(
			'pembimbing1' => $pembimbing1,
			'pembimbing2' => $pembimbing2,
			'pembanding1' => $pembanding1,
			'pembanding2' => $pembanding2,
			);

		$this->Gaji_model->save($data);
		redirect('Tugas/gaji_dosen/update_success');

	}

	function jadwal_seminar()
	{
		$data['active'] = 'jadwal seminar';
		$data['jadwal'] = $this->Jadwal_model->show_jadwal()->result();

        //var_dump($data['jadwal']);die;
			if($this->uri->segment(3) == 'tanggal_tidak_valid')
				$data['message'] ='Tanggal Tidak Valid';
			else if($this->uri->segment(3) == 'sukses_menambah_jadwal_baru')
				$data['message'] ='Sukses Menambah Jadwal Baru';
			else if($this->uri->segment(3) == 'gagal_menambah_jadwal_baru')
				$data['message'] ='Gagal Menambah Jadwal Baru';
			else if($this->uri->segment(3) == 'delete_success')
				$data['message'] ='Berhasil Menghapus Data';
		$this->load->view('templates/jadwal_seminar', $data);
	}

	function resume_seminar($id,$tipe_seminar)
	{
		$data['active'] = 'jadwal seminar';

		if($tipe_seminar == 'seminar%20proposal')
		{
			$query = "SELECT a.nim,b.nama,c.judul,d.pembimbing1,e.Nama_dosen as dopim1, d.pembimbing2, f.Nama_dosen as dopim2, j.jadwal FROM ((((((mahasiswa_sidang a join mahasiswa b) join pengajuan_judul c) join pembimbing d) join dosen e) join dosen f) join jadwal_seminar j) where (a.nim = b.nim) AND (a.nim = c.nim) AND (a.nim = d.nim) AND (d.pembimbing1 = e.Kode_dosen) AND (d.pembimbing2 = f.Kode_dosen) AND (a.id_jadwal_seminar = j.id ) AND (a.id_jadwal_seminar = $id) AND (a.id_pengajuan = c.id_pengajuan)";
			//ambil data dengan pembanding
			$data['data'] = $this->db->query($query)->result();

		
		}
		else
		{
			$query = "SELECT a.nim,b.nama,c.judul,d.pembimbing1,e.Nama_dosen as dopim1, d.pembimbing2, f.Nama_dosen as dopim2, g.pembanding1, h.Nama_dosen as dopemb1 , g.pembanding2 , i.Nama_dosen as dopemb2, j.jadwal FROM (((((((((mahasiswa_sidang a join mahasiswa b) join pengajuan_judul c) join pembimbing d) join dosen e) join dosen f) join pembanding g) join dosen h) join dosen i) join jadwal_seminar j) where (a.nim = b.nim) AND (a.nim = c.nim) AND (a.nim = d.nim) AND (d.pembimbing1 = e.Kode_dosen) AND (d.pembimbing2 = f.Kode_dosen) AND (a.nim = g.nim) AND (g.pembanding1 = h.Kode_dosen) AND (g.pembanding2 = i.Kode_dosen) AND (a.id_jadwal_seminar = j.id ) AND (a.id_jadwal_seminar = '$id') AND (a.id_pengajuan = c.id_pengajuan)";

			//ambil data dengan pembanding
			$data['data'] = $this->db->query($query)->result();
		}

		$data['fulltanggal'] = $this->Semhas_model->get_tanggal($id)->result();

		$data['tipe_seminar'] = $tipe_seminar;

		$this->load->view('templates/resume_seminar',$data);
	}

	function tambah_jadwal_baru()
	{
		$seminar = $this->input->post('seminar');
		$tanggal = $this->input->post('jadwal');

		$datetime2 = new DateTime($tanggal);
 		$datetime1 = new DateTime(date("Y-m-d"));
 		$interval = $datetime1->diff($datetime2);
 		echo $interval->format('%R%d days');

		if($interval->format('%R%d') < 0)
		{
			redirect('Tugas/jadwal_seminar/tanggal_tidak_valid');
		}
		$batas = $this->input->post('batas');
		$status ='akan datang';

		$data = array(
			'seminar' => $seminar,
			'jadwal' => $tanggal,
			'batas_sidang' => $batas,
			'status' => $status
			);
		$saved = $this->Jadwal_model->save($data);

		if($saved)
			{
            
                $all_dosen = $this->Sempro_model->get_dosen()->result();
            
                foreach($all_dosen as $ad){
                $simpankan = array(
                    'kd_dsn' => $ad->Kode_dosen,
                    'seminar' => $seminar,
                    'jadwal' => $tanggal,
                    'status_dilihat' => 'belum'
                );
                    
                    $this->Sempro_model->simpan_notif($simpankan);
                }
                
				redirect('Tugas/jadwal_seminar/sukses_menambah_jadwal_baru');
			}

		else
		{
			redirect('Tugas/jadwal_seminar/gagal_menambah_jadwal_baru');
		}
		
	}

	function delete_jadwal($id) {
	//delete 
	$this->Jadwal_model->delete($id);
	
	redirect('Tugas/jadwal_seminar/delete_success','refresh');
}

	function edit_jadwal($id){
		$data['id'] = $id;
		$data['active'] ='jadwal seminar';
		$data['data'] = $this->Jadwal_model->get_data_by_id($data['id'])->result();
		$data['dosen'] = $this->Dosen_model->get_paged_list()->result();
		$data['total'] = $this->Jadwal_model->get_mahasiswa($data['id'])->num_rows();
		$data['tgl'] = $this->Jadwal_model->get_mahasiswa($data['id'])->result();
		$data['button_active'] = $this->getGlobal($id)['jumlah_mhs_sem'] <= $this->getGlobal($id)['batas_mhs_sem'];

		if($this->uri->segment(3) == 'update_success')
		{
			$data['message'] = 'Update Berhasil';
			echo "cek";die();
		}
		$this->load->view('templates/edit_jadwal',$data);


	}

	function update_jadwal($id)
	{
		$id = $id;
		$jadwal = $this->input->post('jadwal');
		$batas = $this->input->post('batas');
		$batas = (int) $batas;

		$data = array(
			'jadwal' => $jadwal,
			'batas_sidang' => $batas,
			'pembanding1' => '',
			'pembanding2' => ''
			);

		$saved = $this->Jadwal_model->update_seminar($data,$id);
		// //cek di tabel pembanding
		// $get_nim = $this->Jadwal_model->get_nim($id)->result();

		// foreach($get_nim as $nims)
		// {
		// 	$nim = $nims->nim;
		// 	$datum = array(
		// 		'pembanding1' => $pembanding1,
		// 		'pembanding2' => $pembanding2
		// 		);
		// 	$update_pembanding = $this->db->where('nim',$nim)->update('pembanding',$datum);
		// }


		redirect('Tugas/edit_jadwal/'.$id.'/update_success');
	}

	function update_pembanding($nim,$seminar,$id_jadwal_seminar)
	{
		// var_dump($nim,$seminar,$id_jadwal_seminar);die();
		//code update pembanding di tabel pembanding
		$data['nim'] = $nim;
		$data['seminar'] = $seminar;
		$data['id_seminar'] = $id_jadwal_seminar;
		$data['dosen'] = $this->Dosen_model->get_paged_list()->result();
		$data['pembanding'] = $this->Dosen_model->get_pembanding_seminar($nim)->result();



		$this->load->view('templates/update_pembanding',$data);
	}

	function proses_update_pembanding($id,$id_jadwal_seminar)
	{
		$pembanding1 = $this->input->post('pembanding1');
		$pembanding2 = $this->input->post('pembanding2');

		$data = array(
			'pembanding1' => $pembanding1,
			'pembanding2' => $pembanding2
			);
		
		$saved = $this->db->where('id',$id)->update('pembanding',$data);


		redirect('Tugas/edit_jadwal/'.$id_jadwal_seminar);
	}

	function delete_mahasiswa_sidang($nim,$id)
	{
		$data['delete'] = $this->Jadwal_model->delete_mahasiswa_di_jadwal($nim,$id);

		redirect('Tugas/edit_jadwal/'.$id);
	}

	function hapusLebih($id)
	{
		$isSaved = true;

		$post = $this->input->post();
		$batas = $this->getGlobal($id)['batas_mhs_sem'];
		$sisa = $this->getGlobal($id)['jumlah_mhs_sem'] - $batas;

		if($batas > 0 && $sisa > 0)
		{
			$ids = $this->db->query("SELECT id FROM mahasiswa_sidang LIMIT {$sisa}")->result();

			$ids = array_map(function($value) {
				return $value->id;
			}, $ids);

			if(count($ids) > 0)
			{
				$ids = implode(',', $ids);
				$query = "DELETE FROM mahasiswa_sidang WHERE id IN({$ids})";

				$this->db->query($query);
				$isSaved = $this->db->affected_rows() > 0;
			}
		}

		return $isSaved;
	}

	function add_mahasiswa($id)
	{
//        var_dump($id);die();
		if($this->getGlobal($id)['jumlah_mhs_sem'] >= $this->getGlobal($id)['batas_mhs_sem'])
		{
			redirect('Tugas/edit_jadwal/'. $id);
		}

		$data = [];
		$post = $this->input->post();

		$data['banding'] = $this->Jadwal_model->banding($id)->result();
		
		$existNim = array_flip(array_map(function($value) {
			
			return $value->nim;
		}, $data['banding']));

		

		if($post)
		{
			$nims = $post['mahasiswa'] ?: [];
			$isSaved = true;


			if($nims)
			{
				$queryVal = '';
				$idx = 0;
				$query = "INSERT INTO mahasiswa_sidang(id, id_jadwal_seminar, nim, id_pengajuan) ";

				foreach($nims as $nim)
				{

					
					$id_pengajuan = $this->Upload_model->get_id_pengajuan($nim)->result();
					var_dump($id_pengajuan);

					foreach($id_pengajuan as $idp)
					{
						$pengajuan = $idp->id_pengajuan;
					}
					var_dump($existNim[$nim]);
					if(!isset($existNim[$nim]))
					{
						$queryVal .= $idx > 0 ? "(NULL, {$id}, '{$nim}', '{$pengajuan}')," : "VALUES(NULL, {$id}, '{$nim}', '{$pengajuan}'),";
						$idx++;
						$get_pembanding = $this->Pembimbing_model->get_pembanding($id)->result();

						foreach($get_pembanding as $gp)
						{
							$pembanding1 = $gp->pembanding1;
							$pembanding2 = $gp->pembanding2;
						}

						$person = array(
							'pembanding1' => $pembanding1,
							'pembanding2' => $pembanding2
							);

						if($seminar == 'seminar hasil')
						{
							$update_pembanding = $this->Pembimbing_model->update_pembanding($person,$nim);

							if($update_pembanding)
							{
								echo "die"; die();
							}
							else
							{
								echo "test"; die();
							}
						}

						// //Input ke skripsi_nim
						// $jadwal = $this->Sempro_model->get_jadwal_seminar($id)->result();

						// foreach($jadwal as $j)
						// {
						// 	$date = $j->jadwal;
						// }

						// $judul = $this->Sempro_model->get_judul($nim)->result();


						// foreach($judul as $j)
						// {
						// 	$title = $j->judul;
						// }

						// //ambil data jenis_TA
						// $data_ta = $this->Sempro_model->get_jenis_ta($nim)->result();
						// foreach($data_ta as $ta)
						// {
						// 	$judulnya = $ta->judul;
						// 	$jenis_tugas = $ta->jenis_TA;
						// }

						// $data = array(
						// 	'nim' => $nim,
						// 	'judul' => $title,
						// 	'tanggal_sempro' => $date,
						// 	'jenis_TA' => $jenis_tugas
						// 	);

						// $datum = array(
						// 	'nim' => $nim,
						// 	'id_jadwal_seminar' => $id,
						// 	'id_pengajuan' => $pengajuan
						// 	);

						
						// $cek_skripsi = $this->Sempro_model->cek_skripsi($nim)->num_rows();
						

						
						// if($cek_skripsi == 0)
						// {
						// $input = $this->Sempro_model->save($data);
						// //$edit = $this->Sempro_model->edit_jadwal($nim,$datum);
						// }
						// else
						// {

						// 	$jadwal = $this->Sempro_model->get_jadwal_seminar($id)->result();

						// foreach($jadwal as $j)
						// {
						// 	$tanggalnya = $j->jadwal;
						// }
						// 	$datas = array(
						// 		'nim' => $nim,
						// 		'judul' => $judulnya,
						// 		'tanggal_sempro' => $tanggalnya,
						// 		'jenis_TA' => $jenis_tugas
						// 		);
						// 	$input = $this->db->where('nim',$nim)->update('skripsi_nim',$datas);

						// }



					}
					else
					{
                        
						$query = "SELECT jadwal_seminar.jadwal, jadwal_seminar.seminar, jadwal_seminar.pembanding1, jadwal_seminar.pembanding2 FROM jadwal_seminar, mahasiswa_sidang WHERE mahasiswa_sidang.nim = '$nim' AND mahasiswa_sidang.id_jadwal_seminar = jadwal_seminar.id";

						$tanggal = $this->db->query($query)->result();

						foreach($tanggal as $tgl)
						{
							$date = $tgl->jadwal;
							$seminar = $tgl->seminar;
							$pembanding1 = $tgl->pembanding1;
							$pembanding2 = $tgl->pembanding2;

						}

						$judul = $this->Sempro_model->get_judul($nim)->result();

						foreach($judul as $j)
						{
							$title = $j->judul;
						}

						//ambil data jenis_TA
						$data_ta = $this->Sempro_model->get_jenis_ta($nim)->result();
						foreach($data_ta as $ta)
						{
							$judulnya = $ta->judul;
							$jenis_tugas = $ta->jenis_TA;
						}

						$data = array(
							'nim' => $nim,
							'judul' => $title,
							'tanggal_sempro' => $date,
							'jenis_TA' => $ta->jenis_TA
							);

						$datum = array(
							'nim' => $nim,
							'id_jadwal_seminar' => $id,
							'id_pengajuan' => $pengajuan
							);

						
						$cek_skripsi = $this->Sempro_model->cek_skripsi($nim)->num_rows();
						
						if($cek_skripsi == 0)
						{
						$input = $this->Sempro_model->save($data);
						//$edit = $this->Sempro_model->edit_jadwal($nim,$datum);
						}
						else
						{
                            
						// 	$jadwal = $this->Sempro_model->get_jadwal_seminar($id)->result();

						// foreach($jadwal as $j)
						// {
						// 	$tanggalnya = $j->jadwal;
						// }
						// 	$datas = array(
						// 		'nim' => $nim,
						// 		'judul' => $judulnya,
						// 		'tanggal_sempro' => $tanggalnya,
						// 		'jenis_TA' => $jenis_tugas
						// 		);
						// 	$input = $this->db->where('nim',$nim)->update('skripsi_nim',$datas);

							//$edit = $this->Sempro_model->edit_jadwal($nim,$datum);
                            
                            //update tanggal sempro, tanggal semhas dan tanggal sidang
                            $seminar_p = $this->Sempro_model->get_seminar($id)->result();
                            
                            foreach($seminar_p as $smnr)
                            {
                                $jenis_smnr = $smnr->seminar;
                                $jadwal_tgl = $smnr->jadwal;
                            }
                            
                            
                            if($jenis_smnr == 'seminar proposal')
                            {
                                $next = array(
                                    'tanggal_sempro' => $jadwal_tgl
                                );
                                
                                 $upd = $this->db->where('nim',$nim)->update('skripsi_nim',$next);
                            }
                            else if($jenis_smnr == 'seminar hasil')
                            {
                                $next = array(
                                    'tanggal_semhas' => $jadwal_tgl
                                );
                                
                                 $upd = $this->db->where('nim',$nim)->update('skripsi_nim',$next);
                            }
                            else if($jenis_smnr == 'sidang')
                            {
                                $next = array(
                                    'tanggal_sidang' => $jadwal_tgl
                                );
                                
                                 $upd = $this->db->where('nim',$nim)->update('skripsi_nim',$next);
                            }
                            
                           
                            
						}

						//cek sudah ada atau belum nim tersebut dengan id_judul tersebut
						$checks = $this->Sempro_model->cek_available_seminar($nim,$id)->num_rows();

						if($checks == 0)
						{
							$savekan = $this->Sempro_model->savekan($datum);
						}
					}
				}
				
				if($queryVal)
				{
					$query = $query . trim($queryVal, ', ');
					$this->db->query($query);
					$isSaved = $this->db->affected_rows() > 0;	
				}
			}

			if($isSaved)
			{
				redirect('Tugas/edit_jadwal/' . $id);
			}
		}

		$data['id'] = $id;
		$id_b = (int) $data['id'];
//		$query = "SELECT mahasiswa.nim,mahasiswa.nama FROM mahasiswa,skripsi WHERE mahasiswa.nim = skripsi.nim AND skripsi.status=(SELECT seminar FROM jadwal_seminar WHERE id=$id_b);";
        
        $cek_jenis_seminar = $this->db->where('id', $id_b)
            ->get('jadwal_seminar')
            ->row();
        
        $seminar = $cek_jenis_seminar->seminar;
        
        if($seminar == 'seminar proposal')
        {
            $query = "SELECT mahasiswa.nim,mahasiswa.nama FROM mahasiswa,skripsi,validasi_sempro,pengajuan_judul WHERE mahasiswa.nim = skripsi.nim AND mahasiswa.nim = validasi_sempro.nim AND validasi_sempro.id_pengajuan_judul = pengajuan_judul.id_pengajuan AND validasi_sempro.fotokopi_krs = 'checked' AND validasi_sempro.fotokopi_kelunasan_spp='checked' AND validasi_sempro.lembar_kendali_prasempro = 'checked' AND skripsi.status=(SELECT seminar FROM jadwal_seminar WHERE id=$id_b) AND pengajuan_judul.status_kelayakan = 'diterima';";
        }
        else if($seminar == 'seminar hasil')
        {
            $query = "SELECT mahasiswa.nim,mahasiswa.nama FROM mahasiswa,skripsi,validasi_semhas,pengajuan_judul, izin_seminar WHERE mahasiswa.nim = izin_seminar.nim AND mahasiswa.nim = skripsi.nim AND mahasiswa.nim = validasi_semhas.nim AND validasi_semhas.id_pengajuan_judul = pengajuan_judul.id_pengajuan AND validasi_semhas.fotokopi_krs = 'checked' AND validasi_semhas.fotokopi_sk_dopim  = 'checked' AND validasi_semhas.fotokopi_kelunasan_spp  = 'checked' AND validasi_semhas.lembar_kendali_prasemhas = 'checked' AND skripsi.status=(SELECT seminar FROM jadwal_seminar WHERE id=$id_b) AND pengajuan_judul.status_kelayakan = 'diterima' AND izin_seminar.pembimbing1 != '0000-00-00' AND izin_seminar.pembimbing2 != '0000-00-00' AND izin_seminar.jenis_seminar = 'semhas';";
        }
        else
        {
             $query = "SELECT mahasiswa.nim,mahasiswa.nama FROM mahasiswa,skripsi,validasi_sidang, pengajuan_judul, izin_seminar WHERE mahasiswa.nim = izin_seminar.nim AND mahasiswa.nim = skripsi.nim AND mahasiswa.nim = validasi_sidang.nim AND validasi_sidang.id_pengajuan_judul = pengajuan_judul.id_pengajuan AND validasi_sidang.fotokopi_krs = 'checked' AND validasi_sidang.sk_dopim  = 'checked' AND validasi_sidang.fotokopi_slip_spp  = 'checked' AND validasi_sidang.lembar_kendali_prasidang = 'checked' AND validasi_sidang.kartu_kemajuan_mahasiswa = 'checked' AND validasi_sidang.draf_jurnal = 'checked' AND validasi_sidang.buku_bimbingan = 'checked' AND skripsi.status=(SELECT seminar FROM jadwal_seminar WHERE id=$id_b) AND pengajuan_judul.status_kelayakan = 'diterima' AND izin_seminar.pembimbing1 != '0000-00-00' AND izin_seminar.pembimbing2 != '0000-00-00' AND izin_seminar.penguji1 != '0000-00-00' AND izin_seminar.penguji2 != '0000-00-00' AND izin_seminar.jenis_seminar = 'sidang';";
        }
        
      
	
		$data['pilih'] = $this->db->query($query)->result();

		return $this->load->view('templates/pilih_mahasiswa_sidang',$data);
	}

	function detail_jadwal($id)
	{
		$id = (int)$id;
		$query = "SELECT mahasiswa.nama FROM mahasiswa , mahasiswa_sidang WHERE mahasiswa_sidang.nim = mahasiswa.nim AND mahasiswa_sidang.id_jadwal_seminar = $id";

		$data['data'] = $this->db->query($query)->result();
		$data['total'] = $this->db->query($query)->num_rows();
		//$data['pembanding'] = $this->Semhas_model->get_pembanding($id)->result();
		$data['gaji1'] = $this->Semhas_model->get_gaji('pembanding1')->result();
		$data['gaji2'] = $this->Semhas_model->get_gaji('pembanding2')->result();
		$data['gaji3'] = $this->Semhas_model->get_gaji('pembimbing1')->result();
		$data['gaji4'] = $this->Semhas_model->get_gaji('pembimbing2')->result();
		//$data['pembimbing'] = $this->Semhas_model->get_gaji_pembimbing($id)->result();
		// var_dump($data['pembimbing']);die();

		$query1 = "SELECT a.pembimbing1,c.Nama_dosen,COUNT(a.pembimbing1) as
banyak_membimbing1
FROM ((pembimbing a join mahasiswa_sidang b) join dosen c) where (b.nim = a.nim)
AND (b.id_jadwal_seminar = '$id') AND (a.pembimbing1 = c.Kode_dosen) GROUP BY a.pembimbing1";
		$data['pembimbing1'] = $this->db->query($query1)->result();

		$query2 = "
SELECT a.pembimbing2,c.Nama_dosen,COUNT(a.pembimbing2) as
banyak_membimbing2
FROM ((pembimbing a join mahasiswa_sidang b) join dosen c) where (b.nim = a.nim)
AND (b.id_jadwal_seminar = '$id') AND (a.pembimbing2 = c.Kode_dosen)GROUP BY a.pembimbing2";
		$data['pembimbing2'] = $this->db->query($query2)->result();

		$query3 = "
SELECT a.pembanding1,c.Nama_dosen, COUNT(a.pembanding1) as
banyak_membanding1
FROM ((pembanding a join mahasiswa_sidang b) join dosen c) where (b.nim = a.nim)
AND (b.id_jadwal_seminar = '22') AND (a.pembanding1 = c.Kode_dosen) GROUP BY a.pembanding1";
		$data['pembanding1'] = $this->db->query($query3)->result();

		$query4 = "
SELECT a.pembanding2,c.Nama_dosen, COUNT(a.pembanding2) as
banyak_membanding2
FROM ((pembanding a join mahasiswa_sidang b) join dosen c) where (b.nim = a.nim)
AND (b.id_jadwal_seminar = '22') AND (a.pembanding2 = c.Kode_dosen) GROUP BY a.pembanding2;";
		$data['pembanding2'] = $this->db->query($query4)->result();


		$this->load->view('templates/detail_jadwal', $data);
	} 
	function logout()
	{
		$this->Login_model->logout();
		redirect('Tugas/index');
	} 

	function pengajuan_judul()
	{
		$data['active'] = 'pengajuan judul';

        $pengajuan_judul = $this->input->post('pengajuan_judul');
        
        if($pengajuan_judul != NULL) {
            $sess_data = [
						'pengajuan' =>$pengajuan_judul
						];

					$this->session->set_userdata($sess_data);
            }
        
		if($this->uri->segment(3) == 'berhasil_diedit')
			$data['message'] = 'Anda baru saja berhasil memvalidasi satu data';
        else if($this->uri->segment(3) == 'belum_diinput_stambuk')
			$data['message'] = 'Stambuk Belum Diinput';
        else if($this->uri->segment(3) == 'berhasil_memvalidasi')
			$data['message'] = 'Berhasil Memvalidasi Pengajuan';
        else if($this->uri->segment(3) == 'berhasil_menolak_pengajuan')
			$data['message'] = 'Berhasil Menolak/Mengembalikan Pengajuan Judul';
		else
			$data['message'] = '';
        
        $status_validasi = $_SESSION['pengajuan'];
        
		$data['data'] = $this->Upload_model->get_all_data($status_validasi)->result();
		$this->load->view('templates/pengajuan_judul', $data);
	}
    
    function tampil_berkas($file)
    {
         $data['file'] = $file;
        $this->load->view('templates/mahasiswa/form_jurnal',$data);
    }


	function edit_pengajuan($id_pengajuan,$pembimbing=NULL)
	{
        if($pembimbing == 'pembimbing_belum_ditentukan')
        {
            $data['message'] = "Pembimbing Belum Ditentukan";
        }
		$id_pengajuan = $id_pengajuan;

		$data['dosen'] = $this->Dosen_model->get_paged_list()->result();
		$data['dosen2'] = $this->Dosen_model->get_paged_list()->result();
		$query = "SELECT a.id_pengajuan,a.nim,a.judul,b.pembimbing1,b.pembimbing2 FROM pengajuan_judul a, pembimbing b WHERE a.id_pengajuan = '$id_pengajuan' AND b.nim = (SELECT nim FROM pengajuan_judul WHERE id_pengajuan = '$id_pengajuan')";

		//$data['data'] = $this->Upload_model->get_data_by_id($id_pengajuan)->result();
		$data['data'] = $this->db->query($query)->result();
		$this->load->view('templates/edit_pengajuan',$data);
	}

	function update_dopim($nim,$id_pengajuan)
	{
		$dopim1 = $this->input->post('pembimbing1');
		$dopim2 = $this->input->post('pembimbing2');
        
		$array = array(
				'pembimbing1' => $dopim1,
				'pembimbing2' => $dopim2
			);

		$data = array(
				'calon_dopim1' => $dopim1,
				'calon_dopim2' => $dopim2,
                'status_penentuan_dopim' => 'sudah'
			);
        
        $array2 = array(
				'kode_Pembimbing1' => $dopim1,
				'kode_Pembimbing2' => $dopim2
			);

		$edit = $this->db->where('nim',$nim)->update('pembimbing',$array);
		$edit2 = $this->db->where('id_pengajuan',$id_pengajuan)->update('pengajuan_judul',$data);
        $edit3 = $this->db->where('nim',$nim)->update('skripsi',$array2);

		$data['message'] = "Pembimbing berhasil diganti";
		
		redirect('Tugas/penentuan_pembimbing/berhasil_ditentukan');
	}

	function update_pengajuan($id_pengajuan)
	{
		$id_pengajuan = $id_pengajuan;
		$judul = $this->input->post('judul');
		$uji_kelayakan_judul = $this->input->post('uji_kelayakan_judul');
		$hasil = $this->input->post('hasil');
		$id_pengajuan = (int)$id_pengajuan;
        $nim = $this->input->post('nim');
        
        //cek mahasiswa sudah ditentukan pembimbing atau tidak
        $cek_pembimbing = $this->Sempro_model->cek_pembimbing($nim)->result();
    
        foreach($cek_pembimbing as $cp)
        {
            $pembimbing1 = $cp->pembimbing1;
            $pembimbing2 = $cp->pembimbing2;
        }
        
        if($pembimbing1=='' OR $pembimbing2=='')
        {
            redirect('Tugas/edit_pengajuan/'.$id_pengajuan.'/pembimbing_belum_ditentukan');
        }
        
		$query = "UPDATE pengajuan_judul SET status_kelayakan='$uji_kelayakan_judul',hasil_uji_kelayakan='$hasil' WHERE id_pengajuan=$id_pengajuan";

		var_dump($query);
		$data['save'] = $this->db->query($query);

        
        

		if($data['save'])
		{
			$data['message'] = "Berhasil diedit";

			//set status dari tabel mahasiswa
			if($uji_kelayakan_judul == 'diterima')
			{
                
				$tes = $this->Sempro_model->get_nim($id_pengajuan)->result();

				foreach($tes as $t)
				{
					$nim = $t->nim;
                    $ilmu1 = $t->ilmu1;
                    $ilmu2 = $t->ilmu2;
					var_dump($nim);
				}

				$save = array(
					'id' => '',
					'id_pengajuan_judul' => $id_pengajuan,
					'nim' => $nim,
					'fotokopi_krs' => 'belum dikonfirmasi',
					'fotokopi_kelunasan_spp' => 'belum dikonfirmasi',
					'lembar_kendali_prasempro' => 'belum dikonfirmasi'
					);
				//add validasi berkas sempro yang baru
				$this->Sempro_model->save_validasi_berkas_sempro($save);

				//cek sudah ada di tabel skripsi atau belum
				$check = $this->Sempro_model->cek_available($nim)->num_rows();

				if($check > 0)
				{
                    
					$data = array(
						'judul_skripsi' => $judul,
						'status' => 'seminar proposal',
                        'ilmu1' => $ilmu1,
                        'ilmu2' => $ilmu2
						);
					$update = $this->db->where('nim',$nim)->update('skripsi',$data);
                    
                   $dat = array(
						'judul' => $judul,
                        'ilmu1' => $ilmu1,
                        'ilmu2' => $ilmu2
						);
					$update = $this->db->where('nim',$nim)->update('skripsi_nim',$dat);
				}

				else
				{

					$query = "SELECT pengajuan_judul.judul,mahasiswa.nim,mahasiswa.nama,mahasiswa.id_PS,pembimbing.pembimbing1,pembimbing.pembimbing2,pengajuan_judul.ilmu1,pengajuan_judul.ilmu2 FROM pengajuan_judul,mahasiswa,pembimbing WHERE pengajuan_judul.nim = mahasiswa.nim AND mahasiswa.nim = pembimbing.nim AND mahasiswa.nim = '$nim' AND pengajuan_judul.status_kelayakan = 'diterima'";

					$get_data = $this->db->query($query)->result();
					
					foreach($get_data as $g)
					{
						$data = array(
							'judul_skripsi' => $g->judul,
							'nim' => $g->nim,
							'nama' => $g->nama,
							'kode_PS' => $g->id_PS,
							'kode_Pembimbing1' => $g->pembimbing1,
							'kode_Pembimbing2' => $g->pembimbing2,
							'status' => 'seminar proposal',
                            'ilmu1' => $g->ilmu1,
                            'ilmu2' => $g->ilmu2
							);
					}

					$input = $this->Sempro_model->input_baru($data);
                    
//                    $query = "SELECT pengajuan_judul.judul,pengajuan_judul.jenis_TA,mahasiswa.nim,mahasiswa.nama,mahasiswa.id_PS,pembimbing.pembimbing1,pembimbing.pembimbing2 FROM pengajuan_judul,mahasiswa,pembimbing WHERE pengajuan_judul.nim = mahasiswa.nim AND mahasiswa.nim = pembimbing.nim AND mahasiswa.nim = '$nim' AND pengajuan_judul.status_kelayakan = 'diterima'";
//
//					$get_data = $this->db->query($query)->result();
//                    
//					
//					foreach($get_data as $g)
//					{
//						$datum = array(
//							'nim' => $nim,
//                            'judul' => $g->judul,
//                            'jenis_TA' => $g->jenis_TA
//							);
//					}
//
//					$input = $this->Semhas_model->input_skripsi_nims($datum);
//                    var_dump($input);die;
				}
                
//                //cek sudah ada di tabel skripsi_nim atau belum
//				$cheks = $this->Sempro_model->cek_available_skripsi_nim($nim)->num_rows();
//                
//				if($cheks > 0)
//				{
//					$data = array(
//						'judul' => $judul,
//						);
//					$update = $this->db->where('nim',$nim)->update('skripsi_nim',$data);
//				}
//
//				else
//				{
//                    
//					$query = "SELECT pengajuan_judul.judul,pengajuan_judul.jenis_TA,mahasiswa.nim,mahasiswa.nama,mahasiswa.id_PS,pembimbing.pembimbing1,pembimbing.pembimbing2 FROM pengajuan_judul,mahasiswa,pembimbing WHERE pengajuan_judul.nim = mahasiswa.nim AND mahasiswa.nim = pembimbing.nim AND mahasiswa.nim = '$nim' AND pengajuan_judul.status_kelayakan = 'diterima'";
//
//					$get_data = $this->db->query($query)->result();
//                    
//					
//					foreach($get_data as $g)
//					{
//						$datum = array(
//							'nim' => $nim,
//                            'judul' => $g->judul,
//                            'jenis_TA' => $g->jenis_TA
//							);
//					}
//
//					$input = $this->Sempro_model->input_skripsi_nims($datum);
//                    
//				}

				

				$data = array(
					'status' => 'belum sempro'
					);
				$ubah = $this->db->where('nim',$nim)->update('mahasiswa',$data);
			}



			redirect('Tugas/pengajuan_judul/berhasil_diedit');
		}

		else
		{
			echo "gagal";
		}
	}

	function berita_acara($nim,$id_seminar, $id_pengajuan=null)
	{
		$nim = $nim;
		$data['active'] ='jadwal seminar';

		//cek nama seminar
		$cek_seminar = $this->Sempro_model->cek_seminar($id_seminar)->result();

		foreach($cek_seminar as $sem)
		{
			$seminar = $sem->seminar;
		}
        $data['seminar'] = $seminar;
        
		if($seminar=='seminar proposal')
		{

		$query = "SELECT a.nama,b.nim,b.calon_dopim1,c.Nama_dosen as pembimbing1,
b.calon_dopim2,d.Nama_dosen as pembimbing2,c.NIP as NIP1,d.NIP
as NIP2,b.ilmu1,b.ilmu2,b.judul, c.ttd as ttd1, d.ttd as ttd2 FROM (((pengajuan_judul b join mahasiswa a)
join dosen c)join dosen d) WHERE b.nim = a.nim AND b.calon_dopim1 =
c.Kode_dosen AND b.calon_dopim2 = d.Kode_dosen AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1
";
            
        
		$data['data'] = $this->db->query($query)->result();
            
        if($id_pengajuan != null){
        $judul = $this->db->where('id_pengajuan', $id_pengajuan)
            ->get('pengajuan_judul')
            ->row();
        
        $data['judul_diseminarkan'] = $judul->judul;
        }
            
        $data['penilaian_sempro'] = $this->Sempro_model->gets_penilaian_sempro($nim, $id_seminar, $id_pengajuan)->result();
           
            //var_dump($data['data']);die();

		$data['tanggal'] = $this->Jadwal_model->tampil_jadwal($id_seminar)->result();
		
		$this->load->view('templates/form_berita_acara',$data);
		}          

		else if($seminar=='sidang')
		{
			$query = "SELECT a.nama,b.nim,b.calon_dopim1,c.Nama_dosen as pembimbing1,
			b.calon_dopim2,d.Nama_dosen as pembimbing2,c.NIP as NIP1,d.NIP
			as NIP2,b.ilmu1,b.ilmu2,b.judul, c.ttd as ttd1, d.ttd as ttd2 FROM (((pengajuan_judul b join mahasiswa a)
			join dosen c)join dosen d) WHERE b.nim = a.nim AND b.calon_dopim1 =
			c.Kode_dosen AND b.calon_dopim2 = d.Kode_dosen AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1";
			$pemb = "
SELECT a.Nama_dosen as pemband1,a.NIP as NIP3,b.Nama_dosen as pemband2,b.NIP as NIP4
FROM ((pembanding c join
dosen a)join dosen b) WHERE (c.pembanding1 = a.Kode_dosen) AND (c.pembanding2 = b.Kode_dosen)
AND (nim = '$nim')";
		$data['pembanding'] = $this->db->query($pemb)->result();
	

		$data['data'] = $this->db->query($query)->result();
		
		$data['tanggal'] = $this->Jadwal_model->tampil_jadwal($id_seminar)->result();

		$this->load->view('templates/form_berita_acara_sidang',$data);	
		}

		else
		{
			$query = "SELECT a.nama,b.nim,b.calon_dopim1,c.Nama_dosen as pembimbing1,
			b.calon_dopim2,d.Nama_dosen as pembimbing2,c.NIP as NIP1,d.NIP
			as NIP2,b.ilmu1,b.ilmu2,b.judul FROM (((pengajuan_judul b join mahasiswa a)
			join dosen c)join dosen d) WHERE b.nim = a.nim AND b.calon_dopim1 =
			c.Kode_dosen AND b.calon_dopim2 = d.Kode_dosen AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1";
			$pemb = "
SELECT a.Nama_dosen as pemband1,a.NIP as NIP3,b.Nama_dosen as pemband2,b.NIP as NIP4
FROM ((pembanding c join
dosen a)join dosen b) WHERE (c.pembanding1 = a.Kode_dosen) AND (c.pembanding2 = b.Kode_dosen)
AND (nim = '$nim')";
		$data['pembanding'] = $this->db->query($pemb)->result();
	

		$data['data'] = $this->db->query($query)->result();

		$data['tanggal'] = $this->Jadwal_model->tampil_jadwal($id_seminar)->result();
            
             $data['nilai_pembimbing1'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id_seminar, $id_pengajuan, 'pembimbing1')->result();
             $data['nilai_pembimbing2'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id_seminar, $id_pengajuan, 'pembimbing2')->result();
             $data['nilai_pembanding1'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id_seminar, $id_pengajuan, 'pembanding1')->result();
             $data['nilai_pembanding2'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id_seminar, $id_pengajuan, 'pembanding2')->result();
             $data['pembagi_dosen_hadir'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id_seminar, $id_pengajuan, 'all')->num_rows();
		
		$this->load->view('templates/form_berita_acara_semhas',$data);
		}
	}

	function form_penilaian($nim,$id_seminar, $id_pengajuan, $exceptional_dosen = null)
	{
		$nim = $nim;
		$data['active'] ='jadwal seminar';
        
         if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }

		//cek nama seminar
		$cek_seminar = $this->Sempro_model->cek_seminar($id_seminar)->result();

		foreach($cek_seminar as $sem)
		{
			$seminar = $sem->seminar;
		}
        $data['seminar'] = $seminar;

		if($seminar == 'seminar proposal')
		{
		$query = "SELECT a.nama,b.nim,b.calon_dopim1,c.Nama_dosen as pembimbing1,
b.calon_dopim2,d.Nama_dosen as pembimbing2,c.NIP as NIP1,d.NIP
as NIP2,b.ilmu1,b.ilmu2,b.judul, c.ttd as ttd1, d.ttd as ttd2 FROM (((pengajuan_judul b join mahasiswa a)
join dosen c)join dosen d) WHERE b.nim = a.nim AND b.calon_dopim1 =
c.Kode_dosen AND b.calon_dopim2 = d.Kode_dosen AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1
";

		$data['data'] = $this->db->query($query)->result();

		$data['tanggal'] = $this->Jadwal_model->tampil_jadwal($id_seminar)->result();
            
        $judul = $this->db->where('id_pengajuan', $id_pengajuan)
            ->get('pengajuan_judul')
            ->row();
        
        $data['judul_diseminarkan'] = $judul->judul;
            
            if($_SESSION['level'] == '2' AND $exceptional_dosen == null)
            {
                $data['dosen_penilai'] = $this->Sempro_model->get_penilai_nama($_SESSION['username'], $_SESSION['password'])->result();
                $data['penilaian_sempro'] = $this->Sempro_model->gets_penilaian_sempro($nim, $id_seminar, $id_pengajuan)->result();
            }
            else if($_SESSION['level'] == '1' or $_SESSION['level'] == '4' or $_SESSION['level'] == '5' or $exceptional_dosen != null)
            {
                 $data['penilaian_sempro'] = $this->Sempro_model->gets_penilaian_sempro($nim, $id_seminar, $id_pengajuan)->result();
            }
        
            $data['exceptional_dosen'] = $exceptional_dosen;
           // var_dump($data['penilaian_sempro']);die;
            
        
		
		$this->load->view('templates/form_penilaian_kelayakan_proposal',$data);
		}

		else if($seminar == 'sidang')
		{
			$query = "SELECT a.nama,b.nim,b.judul FROM (pengajuan_judul b join mahasiswa a) WHERE b.nim = a.nim AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1";

			$data['data'] = $this->db->query($query)->result();
            
           $data['penilaian_sidang'] = $this->Semhas_model->get_penilaian_sidang_mahasiswa($nim, $id_seminar, $id_pengajuan, 'all')->result();

			$this->load->view('templates/form_penilaian_sidang',$data);
		}

		else
		{
			$query = "SELECT a.nama,b.nim,b.judul FROM (pengajuan_judul b join mahasiswa a) WHERE b.nim = a.nim AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1";

			$data['data'] = $this->db->query($query)->result();
            
             $data['penilaian_semhas'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id_seminar, $id_pengajuan, 'all')->result();

			$this->load->view('templates/form_penilaian_semhas',$data);
		}
	}

	function sempro()
	{
		$data['active'] = "semproposal";
		$data['data'] = $this->Sempro_model->get_data()->result();

		if($this->uri->segment(3) == 'berhasil_diedit')
			$data['message'] = "Data Berhasil Divalidasi";
		else 
			$data['message'] = '';
		$this->load->view('templates/sempro', $data);
	}

	function edit_sempro($status,$nim, $id_seminar, $id_pengajuan)
	{
		$status = $status;
		$nim = $nim;

		if($status == 'tdk_layak')
		{
		$update = $this->Sempro_model->edit_skripsi($nim, $id_seminar, $id_pengajuan);
		}

		else
		{
		$update = $this->Sempro_model->edit_script($nim, $id_seminar, $id_pengajuan);
		}

//		redirect('Tugas/sempro/berhasil_diedit');
        redirect('Tugas/list_mahasiswa_seminar/'.$id_seminar.'/berhasil_diedit');
	}

	function semhas()
	{
		$data['active'] = "semhasil";
		if($this->uri->segment(3) == 'berhasil_diedit')
			$data['message'] = 'Data berhasil divalidasi';
		else
			$data['message'] = '';
		
		$data['data'] = $this->Semhas_model->get_data()->result();
		$this->load->view('templates/semhas',$data);
	}

	function tampil_persetujuan($file)
	{
		$data['file'] = $file;

		$this->load->view('templates/tampil',$data);
	}

	function edit_semhas($status,$id,$nim)
	{
		$status = $status;
		$id = $id;
		$nim = $nim;
		
		$update = $this->Semhas_model->edit_semhas($id,$status);

		if($status == 'diterima'){

		//tambah data validasi_semhas

		//ambil data id_judul, judul
		$data = $this->Semhas_model->get_validasi($nim)->result();

		foreach($data as $d)
		{
			$id_pengajuan = $d->id_pengajuan;
			$judul = $d->judul;
		}

		//set data yang akan diupdate
		$saved = array(
			'id' => '',
			'id_pengajuan_judul' => $id_pengajuan,
			'nim' => $nim,
			'fotokopi_krs' => 'belum dikonfirmasi',
			'fotokopi_sk_dopim' => 'belum dikonfirmasi',
			'fotokopi_kelunasan_spp' => 'belum dikonfirmasi',
			'lembar_kendali_prasemhas' => 'belum dikonfirmasi'
			);

		$test = $this->Semhas_model->save_validasi_berkas_semhas($saved);
	}

		redirect('Tugas/semhas/berhasil_diedit');
	}

	function nilai($nim,$seminar,$id)
	{
		$data['active'] = 'jadwal seminar';
		$data['data'] = array($nim,$seminar,$id);

		$data['nilai'] = $this->Upload_model->get_nilai($nim,$seminar)->result();
		$data['total'] = $this->Upload_model->get_total($nim,$seminar)->result();
		$data['nTotal'] = $this->Upload_model->get_nilai_total($nim)->result();

		$this->load->view('templates/nilai',$data);
	}

	function post_nilai($nim,$seminar,$id)
	{

		$nilai = $this->input->post('nilai');
		$pembimbing1 = $this->input->post('pembimbing1');
		$pembimbing2 = $this->input->post('pembimbing2');
		$pembanding1 = $this->input->post('pembanding1');
		$pembanding2 = $this->input->post('pembanding2');
		$seminar = preg_replace('/%20/',' ',$seminar);
		var_dump($id,$nim,$seminar);

		if($seminar == 'seminar hasil')
		{
			
			$data = array(
				'nilai_semhas' => $nilai
				);

			$update = $this->db->where('nim',$nim)->update('nilai',$data);
			$cek = $this->Upload_model->cek_penilaian($nim,$seminar)->num_rows();

			var_dump($cek);
			$penilaian = array(
				'kategori' => $seminar,
				'nim' => $nim,
				'pembimbing1' => $pembimbing1,
				'pembimbing2' => $pembimbing2,
				'pembanding1' => $pembanding1,
				'pembanding2' => $pembanding2
				);

			if($cek == 0)
			{
				$insert = $this->Upload_model->save_nilai_mhs($nim,$penilaian);
			}

			else
			{
				$update = $this->Upload_model->update_nilai_mhs($nim,$seminar,$penilaian);
			}


			if($nilai > (float)50)
			{
				$datum = array(
					'status' => 'belum sidang'
					);

				$status = array(
					'status' => 'sidang'
					);

				$query = "SELECT jadwal_seminar.jadwal FROM jadwal_seminar, mahasiswa_sidang WHERE mahasiswa_sidang.id_jadwal_seminar = jadwal_seminar.id AND mahasiswa_sidang.nim = '$nim' AND mahasiswa_sidang.id_jadwal_seminar = '$id'";

				$tgl = $this->db->query($query)->result();
				foreach($tgl as $t)
				{
					$tgl_semhas = $t->jadwal;
				}

				$tanggal = array(
					'tanggal_semhas' => $tgl_semhas
					);

				$input_tgl = $this->db->where('nim',$nim)->update('skripsi_nim',$tanggal);
				//$delete = $this->db->where('nim',$nim)->delete('mahasiswa_sidang');
				$update_mahasiswa = $this->db->where('nim',$nim)->update('mahasiswa',$datum);
				$update_skripsi = $this->db->where('nim',$nim)->update('skripsi',$status);


				//tambah data di validasi_sidang
				$juduls = $this->Semhas_model->get_validasi($nim)->result();

				foreach($juduls as $j)
				{
					$id_pengajuan = $j->id_pengajuan;
					$judul = $j->judul;
				}

				$array_valid = array(
					'id' => '',
					'id_pengajuan_judul' => $id_pengajuan,
					'nim' => $nim,
					'buku_bimbingan' => 'belum dikonfirmasi',
					'kartu_kemajuan_mahasiswa' => 'belum dikonfirmasi',
					'lembar_kendali_prasidang' => 'belum dikonfirmasi',
					'draf_jurnal' => 'belum dikonfirmasi',
					'fotokopi_krs' => 'belum dikonfirmasi',
					'fotokopi_slip_spp' => 'belum dikonfirmasi',
					'sk_dopim' => 'belum dikonfirmasi'

					);

				$this->Semhas_model->save_validasi_berkas_sidang($array_valid);
			}

			else
			{
                $data = array(
                    'upload_semhas' => '1',
                    'uji_program' => '1'
                );
                $update_upload_semhas = $this->db->where('nim', $nim)->update('mahasiswa',$data);
			}
		}
		//sidang
		else
		{
			$total = $this->input->post('total');
			$grade = $this->input->post('grade');

			$data = array(
				'nilai_sidang' => $nilai,
				'total' => $total,
				'grade' => $grade
				);

			$update = $this->db->where('nim',$nim)->update('nilai',$data);
			$cek = $this->Upload_model->cek_penilaian($nim,$seminar)->num_rows();

			var_dump($cek);
			$penilaian = array(
				'kategori' => $seminar,
				'nim' => $nim,
				'pembimbing1' => $pembimbing1,
				'pembimbing2' => $pembimbing2,
				'pembanding1' => $pembanding1,
				'pembanding2' => $pembanding2
				);

			if($cek == 0)
			{
				$insert = $this->Upload_model->save_nilai_mhs($nim,$penilaian);
			}

			else
			{
				$update = $this->Upload_model->update_nilai_mhs($nim,$seminar,$penilaian);
			}


			if($nilai > (float)50)
			{
                
                   $seminar_p = $this->Sempro_model->get_seminar($id)->result();
                            
                            foreach($seminar_p as $smnr)
                            {
                                $jenis_smnr = $smnr->seminar;
                                $jadwal_tgl = $smnr->jadwal;
                            }
                
                                $orderdate = explode('-', $jadwal_tgl);
$tahun = $orderdate[0];
$month   = $orderdate[1];
$tanggals  = $orderdate[2];
                                $upd_tahun = array(
                                    'Tgl_lulus' => $tahun,
                                    'Bulan_lulus' => $month
                                );
                                
                                $upd_tahuns = array(
                                    'tahun_lulus' => $tahun,
                                    'bulan_lulus' => $month
                                );
                    
                                
                                $updt = $this->db->where('nim', $nim)->update('skripsi', $upd_tahun);
                
                                $upd = $this->db->where('nim', $nim)->update('skripsi_nim', $upd_tahuns);
                
				$datum = array(
					'status' => 'sudah sidang'
					);

				$query = "SELECT jadwal_seminar.jadwal FROM jadwal_seminar, mahasiswa_sidang WHERE mahasiswa_sidang.id_jadwal_seminar = jadwal_seminar.id AND mahasiswa_sidang.nim = '$nim' AND mahasiswa_sidang.id_jadwal_seminar = '$id'";

				$tgl = $this->db->query($query)->result();
				foreach($tgl as $t)
				{
					$tgl_sidang = $t->jadwal;
				}

				$tanggal = array(
					'tanggal_sidang' => $tgl_sidang
					);

				$input_tgl = $this->db->where('nim',$nim)->update('skripsi_nim',$tanggal);
				$update_mahasiswa = $this->db->where('nim',$nim)->update('mahasiswa',$datum);
				$update_skripsi = $this->db->where('nim',$nim)->update('skripsi',$datum);

				//tambah data di tabel validasi_penggandaan
				//cek sudah ada dibuat atau belum , untuk menghindari update berkali kali, sehingga data ditabel tidak ditambah terus
				$check_available = $this->Semhas_model->available_penggandaan($nim)->num_rows();

				if($check_available == 0)
				{

					$juduls = $this->Semhas_model->get_validasi($nim)->result();

				foreach($juduls as $j)
				{
					$id_pengajuan = $j->id_pengajuan;
					$judul = $j->judul;
				}

					$saved_data = array(
						'id' => '',
						'id_pengajuan_judul' => $id_pengajuan,
						'nim' => $nim,
						'cd_kode_jurnal' => 'belum dikonfirmasi',
						'form_persetujuan' => 'belum dikonfirmasi',
						'fotokopi_bebas' => 'belum dikonfirmasi'

						);

					$this->Semhas_model->save_validasi_penggandaan($saved_data);
				}
			}
            else
            {
                $arrays = array(
                'upload_sidang' => '1'
                );
                
                $this->db->where('nim',$nim)->update('mahasiswa',$arrays);
            }

		redirect ('Tugas/edit_jadwal/'.$id);
	}
	redirect ('Tugas/edit_jadwal/'.$id);
}

	function lampiran_borang_sidang($nim)
	{
		$data['active'] = 'jadwal seminar';
		$query = "SELECT a.nama,b.nim,b.judul FROM (pengajuan_judul b join mahasiswa a) WHERE b.nim = a.nim AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1";

			$data['data'] = $this->db->query($query)->result();

			$this->load->view('templates/lampiran_borang_sidang',$data);
	}

	function rekapitulasi_nilai($nim, $id_pengajuan, $id_jadwal)
	{
		$data['active'] = 'jadwal seminar';
        
        $data['penguji'] = $this->Semhas_model->get_penguji($nim)->result();
        $data['nilai_semhas'] = $this->Semhas_model->get_nilai_semhas($nim, $id_pengajuan)->result();
        $data['nilai_sidang'] = $this->Semhas_model->get_nilai_sidang($nim, $id_pengajuan, $id_jadwal)->result();
        $data['nilai_uji_program'] = $this->Semhas_model->get_nilai_uji_programming($nim)->result();
        
//        var_dump($data['penguji'], $data['nilai_semhas'], $data['nilai_sidang'], $data['nilai_uji_program']);
        
		$this->load->view('templates/rekapitulasi_nilai',$data);
	}

	function kata_pengantar_sidang($nim)
	{
		$data['active'] = 'jadwal seminar';
		$query = "SELECT a.nama,b.nim,b.judul,c.nama_PS FROM ((pengajuan_judul b join mahasiswa a) join program_studi c) WHERE b.nim = a.nim AND a.id_PS = c.id_PS AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1";

			$data['data'] = $this->db->query($query)->result();

			$this->load->view('templates/pengantar_sidang',$data);
	}
        
    function pengambilan_ijazah()
	{
		$data['active'] ="ijazah";
		$data['data'] = $this->Skripsi_model->get_mhs()->result();
        
		if($this->uri->segment(3) == 'sukses_dihapus')
				$data['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$data['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'sukses_diedit')
				$data['message'] = 'Data berhasil diedit';
		else
				$data['message'] ='';

		$this->load->view('templates/pengambilan_ijazah',$data);
	}
        
    function lihat_detail_ijazah($nim)
    {
        $data['active'] ="ijazah";
		 $data['data'] = $this->Skripsi_model->get_perbaikan_sidang($nim, null, null)->result();
        
        
          $data['perbaikan'] = $this->Skripsi_model->get_all_perbaikan_skripsi($nim)->result();
            
            foreach($data['perbaikan'] as $p)
            {
                $data['id_pengajuan'] = $p->id_pengajuan;
                $data['id_jadwal_seminar'] = $p->id_jadwal_seminar;
            }
            
            $query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1,b.NIP as nip1, a.pembimbing2,
c.Nama_dosen as dopim2 , c.NIP as nip2
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";
            
            $data['dopim'] = $this->db->query($query)->result();
            $data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
		    $data['nama'] = $this->Upload_model->get_nama($nim)->result();
            
            $query = "SELECT a.pembanding1,b.Nama_dosen as dopem1,b.NIP as nip3, a.pembanding2,
c.Nama_dosen as dopem2 , c.NIP as nip4
FROM (pembanding a join dosen b)join dosen c 
WHERE (a.pembanding1 = b.Kode_dosen) AND (a.pembanding2 = c.Kode_dosen) AND (a.nim = '$nim')";
            
            $data['pembanding'] = $this->db->query($query)->result();
        
    
        $this->load->view('templates/revisi_skripsi_mahasiswa',$data);
    }

	function akun()
	{
		$data['active'] ="akun";
		$data['data'] = $this->Skripsi_model->get_akun()->result();

		if($this->uri->segment(3) == 'sukses_dihapus')
				$data['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$data['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'sukses_diedit')
				$data['message'] = 'Data berhasil diedit';
		else
				$data['message'] ='';

		$this->load->view('templates/list_akun',$data);
	}
        
     function akun_user()
        {
        $data['active'] ="akun_user";
		$data['data'] = $this->Skripsi_model->get_akun_user()->result();

		if($this->uri->segment(3) == 'sukses_dihapus')
				$data['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$data['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'sukses_diedit')
				$data['message'] = 'Data berhasil diedit';
		else
				$data['message'] ='';

		$this->load->view('templates/list_akun',$data);
        }

	function akun_dosen()
	{
		$data['active'] = 'akun dosen';

		$data['data'] = $this->Skripsi_model->get_akun_dosen()->result();

		if($this->uri->segment(3) == 'sukses_dihapus')
				$disertasi['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$disertasi['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'sukses_diedit')
				$disertasi['message'] = 'Data berhasil diedit';
		else
				$disertasi['message'] =' ';

		$this->load->view('templates/list_akun',$data);
	}
        
    function ganti_judul($id_pengajuan, $nim)
    {
        $data = array(
        'status_kelayakan' => 'ditolak'
        );
        
        $datum = array(
        'status' => 'pengajuan judul'
        );
        
        $dat = array(
            'ulang' => '1'
        );
        
        $arrays = array(
            'upload_sempro' => '1',
            'upload_semhas' => '1',
            'upload_sidang' => '1',
            'upload_validasi' => '1',
            'uji_program' => '1'
        );
        
        $this->db->where('nim',$nim)->update('mahasiswa',$arrays);
            
        $update_pengajuan_judul = $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul',$data);
        
        $update_status_mahasiswa = $this->db->where('nim',$nim)->update('mahasiswa',$datum);
        
        $update_status_skripsi = $this->db->where('nim',$nim)->update('skripsi',$datum);
        
        $update_terima_berkas = $this->db->where('nim', $nim)->update('semhas', $dat);
        
        redirect('tugas/update_akun/'.$nim.'/berhasil_update');
    }

	function update_akun($nim,$pesan=NULL)
	{
        if($pesan == 'berhasil_update')
            $data['message'] = "Berhasil Mengganti Status Mahasiswa";
        else
            $data['message'] = "";
        
		$data['active'] = "akun";
		$data['data'] = $this->Skripsi_model->get_akun_by_nim($nim)->result();
		$data['prodi'] = $this->Prodi_model->get_paged_list($nim)->result();
        $data['judul'] = $this->Prodi_model->get_judul_ta($nim)->result();
		$this->load->view('templates/edit_akun',$data);
	}

	function edit_akun($nim)
	{
		$nama = $this->input->post('nama');
		$id_PS = $this->input->post('id_PS');
        $password = $this->input->post('password');
        $upload_sempro = $this->input->post('berkas_sempro');
        $uji_program = $this->input->post('berkas_uji_program');
        $upload_semhas = $this->input->post('berkas_seminar_hasil');
        $upload_sidang = $this->input->post('berkas_sidang');
        $upload_validasi = $this->input->post('berkas_validasi_aplikasi');
		$pass = md5($password);

		$simpan = array(
			'nama' => $nama,
			'id_PS' => $id_PS,
            'upload_sempro' => $upload_sempro,
            'uji_program' => $uji_program,
            'upload_semhas' => $upload_semhas,
            'upload_sidang' => $upload_sidang,
            'upload_validasi' => $upload_validasi
			);

		$saved = $this->db->where('nim',$nim)->update('mahasiswa',$simpan);

        if($password != NULL || $password != '') {
		$data = array(
			'password' => $pass
			);

		$isSaved = $this->db->where('username',$nim)->update('user',$data);
        }
        
        if($upload_sempro == '1')
        {
            $data = array(
                
                'status_verifikasi' => 'ditolak',
            
            );
            
            $this->db->where('nim', $nim)->where('jenis_berkas', 'sempro')->update('berkas_validasi', $data);
        }
        
        if($upload_semhas == '1')
        {
            $data = array(
                
                'status_verifikasi' => 'ditolak',
            
            );
            
            $this->db->where('nim', $nim)->where('jenis_berkas', 'semhas')->update('berkas_validasi', $data);
        }
        
        if($upload_sidang == '1')
        {
            $data = array(
                
                'status_verifikasi' => 'ditolak',
            
            );
            
            $this->db->where('nim', $nim)->where('jenis_berkas', 'sidang')->update('berkas_validasi', $data);
        }
        
        if($upload_validasi == '1')
        {
            $data = array(
                
                'status_verifikasi' => 'ditolak',
            
            );
            
            $this->db->where('nim', $nim)->where('jenis_berkas', 'validasi_aplikasi')->update('berkas_validasi', $data);
        }

		redirect('Tugas/akun/sukses_diedit');
	}

	function delete_akun($aktif,$nim)
	{
		$delete = $this->db->where('username',$nim)->delete('user');


		if($aktif == 'akun') {
			redirect('Tugas/akun/sukses_dihapus');
		}
        else if($akun == 'akun_user')
        {
            redirect('Tugas/akun_user/sukses_dihapus');
        }

		else {
			redirect('Tugas/akun_dosen/sukses_dihapus');
		}
		
	}

	function tambah_akun()
	{
		$data['active'] = 'tambah_akun';
		$data['prodi'] = $this->Prodi_model->get_paged_list()->result();
		$this->load->view('templates/tambah_akun',$data);
	}

	function post_akun()
	{
		$nim = $this->input->post('nim');
		$nama = $this->input->post('nama');
		$id_PS = $this->input->post('id_PS');
		$pass = md5($this->input->post('password'));
		$level = '3';
		$status = 'pengajuan judul';

		$simpan = array(
			'nim' => $nim,
			'nama' => $nama,
			'id_PS' => $id_PS,
			'status' => $status
			);
		$cek = $this->Skripsi_model->cek_available_akun($nim,'mahasiswa','nim')->num_rows();

		if($cek == 0)
		{
		$saved = $this->Skripsi_model->simpan_akun($simpan,'mahasiswa');
		}

		$data = array(
			'username' => $nim,
			'password' => $pass,
			'level' => $level
			);

		$cek = $this->Skripsi_model->cek_available_akun($nim,'user','username')->num_rows();

		if($cek == 0)
		{
		$saved = $this->Skripsi_model->simpan_akun($data,'user');
		}

		redirect('Tugas/akun/sukses_diedit');
	}

	function validasi_berkas_sempro()
	{
		$data['active'] ="validasi berkas sempro";
		$data['judul'] = "VALIDASI BERKAS PRA-SEMINAR PROPOSAL";
		$data['number'] = 1;
		$data['berkas'] = 1;

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasempro, a.jenis_TA FROM validasi_sempro b, pengajuan_judul a WHERE b.id_pengajuan_judul = a.id_pengajuan ORDER BY id desc";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/validasi_berkas_sempro', $data);

	}

	function update_validasi_berkas_sempro($id,$pesan)
	{
//		$data['active'] ="validasi berkas sempro";
        $data['active'] ="sempro";
		$data['crumb'] = "List Validasi Berkas Sempro";
//		$data['link'] = "validasi_berkas_sempro";
        $data['link'] = "berkas_mahasiswa/sempro";
		$data['judul'] = "VALIDASI BERKAS PRA-SEMINAR PROPOSAL";
		$data['number'] = 2;
		$data['berkas'] = 1;

		if($pesan == 'berhasil_diedit')
			$data['message'] = 'Data Berhasil Divalidasi';
		else if($pesan == 'gagal_diedit')
			$data['message'] = 'Data Gagal Divalidasi';
		else if($pesan == 'next')
			$data['message'] = '';
		else
			$data['message'] = '';

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasempro FROM validasi_sempro b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.id = $id)";

		$data['data'] = $this->db->query($query)->result();


		$this->load->view('templates/validasi_berkas_sempro', $data);
	}

	function update_proses_berkas_sempro($id)
	{
		$fotokopi_krs = $this->input->post('fotokopi_krs');
		$fotokopi_kelunasan_spp = $this->input->post('fotokopi_kelunasan_spp');
		$lembar_kendali_prasempro = $this->input->post('lembar_kendali_prasempro');

		$data = array(
			'fotokopi_krs' => $fotokopi_krs,
			'fotokopi_kelunasan_spp' => $fotokopi_kelunasan_spp,
			'lembar_kendali_prasempro' => $lembar_kendali_prasempro
			);

		$update = $this->db->where('id',$id)->update('validasi_sempro',$data);

		if($update)
		{
			redirect('Tugas/update_validasi_berkas_sempro/'.$id.'/berhasil_diedit');
		}
		else
		{
			redirect('Tugas/update_validasi_berkas_sempro/'.$id.'gagal_diedit');
		}
	}

	function validasi_berkas_semhas()
	{
		$data['active'] ="validasi berkas semhas";

		$data['judul'] = "VALIDASI BERKAS PRA-SEMINAR HASIL";
		$data['number'] = 1;
		$data['berkas'] = 2;

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasemhas, b.fotokopi_sk_dopim, a.jenis_TA FROM validasi_semhas b, pengajuan_judul a WHERE b.id_pengajuan_judul = a.id_pengajuan ORDER BY id desc";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/validasi_berkas_sempro', $data);

	}

	function update_validasi_berkas_semhas($id,$pesan)
	{
		$data['active'] ="validasi berkas semhas";
//		$data['link'] = "validasi_berkas_semhas";
        $data['link'] = "berkas_mahasiswa/semhas";
		$data['crumb'] = "Berkas Pra Seminar Hasil Mahasiswa";
		$data['judul'] = "VALIDASI BERKAS PRA-SEMINAR HASIL";
		$data['number'] = 2;
		$data['berkas'] = 2;

		if($pesan == 'berhasil_diedit')
			$data['message'] = 'Data Berhasil Divalidasi';
		else if($pesan == 'gagal_diedit')
			$data['message'] = 'Data Gagal Divalidasi';
		else if($pesan == 'next')
			$data['message'] = '';
		else
			$data['message'] = '';

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasemhas, b.fotokopi_sk_dopim FROM validasi_semhas b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.id = $id)";

		$data['data'] = $this->db->query($query)->result();


		$this->load->view('templates/validasi_berkas_sempro', $data);
	}


		function update_proses_berkas_semhas($id)
	{
		$fotokopi_krs = $this->input->post('fotokopi_krs');
		$fotokopi_kelunasan_spp = $this->input->post('fotokopi_kelunasan_spp');
		$lembar_kendali_prasemhas = $this->input->post('lembar_kendali_prasemhas');
		$fotokopi_sk_dopim = $this->input->post('fotokopi_sk_dopim');

		$data = array(
			'fotokopi_krs' => $fotokopi_krs,
			'fotokopi_kelunasan_spp' => $fotokopi_kelunasan_spp,
			'lembar_kendali_prasemhas' => $lembar_kendali_prasemhas,
			'fotokopi_sk_dopim' => $fotokopi_sk_dopim
			);

		$update = $this->db->where('id',$id)->update('validasi_semhas',$data);

		if($update)
		{
			redirect('Tugas/update_validasi_berkas_semhas/'.$id.'/berhasil_diedit');
		}
		else
		{
			redirect('Tugas/update_validasi_berkas_semhas/'.$id.'/gagal_diedit');
		}
	}

	function validasi_berkas_sidang()
	{
		$data['active'] ="validasi berkas sidang";
		$data['judul'] = "VALIDASI BERKAS PRA-SIDANG";
		$data['number'] = 1;
		$data['berkas'] = 3;

			$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_slip_spp, b.lembar_kendali_prasidang, b.sk_dopim, b.buku_bimbingan, b.kartu_kemajuan_mahasiswa,b.draf_jurnal, a.jenis_TA FROM validasi_sidang b, pengajuan_judul a WHERE b.id_pengajuan_judul = a.id_pengajuan ORDER BY id desc";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/validasi_berkas_sempro', $data);

	}
    
    function berkas_mahasiswa($jenis_berkas)
    {
        $data['active'] = $jenis_berkas;
        $data['jenis_berkas'] = $jenis_berkas;
        $data['link'] = 'berkas_mahasiswa/'. $jenis_berkas;
        $data['crumb'] = 'Berkas '.$jenis_berkas;
        
        $data['data'] = $this->Upload_model->get_berkas(NULL,$jenis_berkas)->result();
//        var_dump($data['data']);die;
        $this->load->view('templates/berkas_mahasiswa',$data);
    }

    function download_berkas($file,$id_file)
    {
        $simpan = array(
            'status' => '1'
        );
        
        $this->db->where('id',$id_file)->update('berkas_validasi',$simpan);
        
        $path = base_url().'berkas_mahasiswa/'.$file;
        
        //var_dump($path);die;
        //var_dump($file);die;
       $data['file'] = file_get_contents($path);
        $name = $this->uri->segment(3);
        
        force_download($name,$data);
    }
        
	function update_validasi_berkas_sidang($id,$pesan)
	{
		$data['active'] ="validasi berkas sidang";
		$data['link'] = "validasi_berkas_sidang";
		$data['crumb'] = "List Validasi Berkas Sidang";
		$data['judul'] = "VALIDASI BERKAS PRA-SIDANG";
		$data['number'] = 2;
		$data['berkas'] = 3;

		if($pesan == 'berhasil_diedit')
			$data['message'] = 'Data Berhasil Divalidasi';
		else if($pesan == 'gagal_diedit')
			$data['message'] = 'Data Gagal Divalidasi';
		else if($pesan == 'next')
			$data['message'] = '';
		else
			$data['message'] = '';

	$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_slip_spp, b.lembar_kendali_prasidang, b.sk_dopim, b.buku_bimbingan, b.kartu_kemajuan_mahasiswa,b.draf_jurnal FROM validasi_sidang b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.id = '$id')";

		$data['data'] = $this->db->query($query)->result();


		$this->load->view('templates/validasi_berkas_sempro', $data);
	}


		function update_proses_berkas_sidang($id)
	{
		$fotokopi_krs = $this->input->post('fotokopi_krs');
		$fotokopi_slip_spp = $this->input->post('fotokopi_slip_spp');
		$lembar_kendali_prasidang = $this->input->post('lembar_kendali_prasidang');
		$sk_dopim = $this->input->post('sk_dopim');
		$buku_bimbingan = $this->input->post('buku_bimbingan');
		$kartu_kemajuan_mahasiswa = $this->input->post('kartu_kemajuan_mahasiswa');
		$draf_jurnal = $this->input->post('draf_jurnal');

		$data = array(
			'fotokopi_krs' => $fotokopi_krs,
			'fotokopi_slip_spp' => $fotokopi_slip_spp,
			'lembar_kendali_prasidang' => $lembar_kendali_prasidang,
			'sk_dopim' => $sk_dopim,
			'buku_bimbingan' => $buku_bimbingan,
			'kartu_kemajuan_mahasiswa' => $kartu_kemajuan_mahasiswa,
			'draf_jurnal' => $draf_jurnal
			);

		$update = $this->db->where('id',$id)->update('validasi_sidang',$data);

		if($update)
		{
			redirect('Tugas/update_validasi_berkas_sidang/'.$id.'/berhasil_diedit');
		}
		else
		{
			redirect('Tugas/update_validasi_berkas_sidang/'.$id.'/gagal_diedit');
		}
	}

	function validasi_penggandaan_skripsi()
	{
		$data['active'] ="validasi penggandaan skripsi";
		$data['judul'] = "VALIDASI BERKAS PENGGANDAAN SKRIPSI";
		$data['number'] = 1;
		$data['berkas'] = 4;

			$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.cd_kode_jurnal, b.form_persetujuan, b.fotokopi_bebas, a.jenis_TA FROM validasi_penggandaan b, pengajuan_judul a WHERE b.id_pengajuan_judul = a.id_pengajuan ORDER BY id desc";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/validasi_berkas_sempro', $data);

	}

	function update_validasi_penggandaan_skripsi($id,$pesan)
	{
		$data['active'] ="validasi penggandaan skripsi";
		$data['link'] = "berkas_mahasiswa/validasi_aplikasi";
		$data['crumb'] = "List Validasi Penggandaan Skripsi";
		$data['judul'] = "VALIDASI BERKAS PENGGANDAAN SKRIPSI";
		$data['number'] = 2;
		$data['berkas'] = 4;

		if($pesan == 'berhasil_diedit')
			$data['message'] = 'Data Berhasil Divalidasi';
		else if($pesan == 'gagal_diedit')
			$data['message'] = 'Data Gagal Divalidasi';
		else if($pesan == 'next')
			$data['message'] = '';
		else
			$data['message'] = '';

	$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.cd_kode_jurnal, b.form_persetujuan, b.fotokopi_bebas FROM validasi_penggandaan b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.id = '$id')";

		$data['data'] = $this->db->query($query)->result();


		$this->load->view('templates/validasi_berkas_sempro', $data);
	}


		function update_proses_penggandaan_skripsi($id)
	{
		// var_dump($id);die();
		$cd_kode_jurnal = $this->input->post('cd_kode_jurnal');
		$form_persetujuan = $this->input->post('form_persetujuan');
		$fotokopi_bebas = $this->input->post('fotokopi_bebas');

		$data = array(
			'cd_kode_jurnal' => $cd_kode_jurnal,
			'form_persetujuan' => $form_persetujuan,
			'fotokopi_bebas' => $fotokopi_bebas
			);

		$update = $this->db->where('id',$id)->update('validasi_penggandaan',$data);

		
		if($update)
		{
			if($cd_kode_jurnal == 'checked' AND $form_persetujuan == 'checked' AND $fotokopi_bebas == 'checked')
			{
				//ambil nim
				$nim = $this->Upload_model->get_nim_by_id($id)->result();

				foreach ($nim as $nim)
				{
					$nimm = $nim->nim;
				}


				$datanya = array(
					'status' => 'lulus'
					);

				$this->db->where('nim',$nimm)->update('mahasiswa',$datanya);
				$this->db->where('nim',$nimm)->update('skripsi',$datanya);
			}
			redirect('Tugas/update_validasi_penggandaan_skripsi/'.$id.'/berhasil_diedit');
		}
		else
		{
			redirect('Tugas/update_validasi_penggandaan_skripsi/'.$id.'/gagal_diedit');
		}
	}

	function tambah_berita()
	{
		$data['active'] = 'tambah_berita';
		$data['judul'] = 'Tambah Berita';
		$data['shape'] = 1;

		if($this->uri->segment(3) == 'sukses_posting')
			$data['message'] = 'Berita berhasil diposting';
		else if($this->uri->segment(3) == 'gagal_posting')
			$data['message'] = 'Berita gagal diposting';
		else if($this->uri->segment(3) == 'belum_pilih_gambar')
			$data['message'] = 'Anda belum memilih gambar';
		else
			$data['message'] = '';

		$this->load->view('templates/tambah_berita',$data);
	}

	function post_berita()
	{
		$judul = $this->input->post('judul');
		$konten = $this->input->post('konten');
		$upload = $this->input->post('uploadImage');

		//konfigurasi upload cover
		$config['upload_path'] = './cover_artikel/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = 9000000000000;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $config['overwrite']  = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('uploadImage'))
           {
           	  $error = $this->upload->display_errors();

                        if($error == '<p>You did not select a file to upload.</p>')
                        	$errors = 'belum_pilih_gambar';
                        else
                        	$errors = $error;

                        redirect('Tugas/tambah_berita/'.$errors);

           }

        else
        {
        	   $data_gambar = array('upload_data' => $this->upload->data());

                        foreach($data_gambar as $dg)
                        {
                        	$nama_file = $dg['orig_name'];
                        }
                $author = 'admin';
                $tgl_upload = date('Y-m-d');
                date_default_timezone_set("Asia/Jakarta");
          
                $simpan = array(
                	'id' => '',
                	'judul' => $judul,
                	'author' => $author,
                	'konten' => $konten,
                	'gambar' => $nama_file,
                	'tanggal_posting' => $tgl_upload,
                	'status' => 'display',
                	'headline' => '0'
                	);

                $saved = $this->Upload_model->save_berita($simpan);

                if($saved)
                {
                	redirect('Tugas/tambah_berita/sukses_posting');      
       			}
		}
	}

	function list_berita()
	{
		$data['active'] = 'list_berita';
		$data['judul'] = 'List Berita';

		if($this->uri->segment(3) == 'berhasil_hidden_berita')
			$data['message'] = 'Berhasil Menyembunyikan Berita';
		else if($this->uri->segment(3) == 'berhasil_display_berita')
			$data['message'] = 'Berhasil Menampilkan Berita';
		else if($this->uri->segment(3) == 'berhasil_edit_berita')
			$data['message'] = 'Berhasil Mengedit Berita';
		else if($this->uri->segment(3) == 'belum_pilih_gambar')
			$data['message'] = 'Anda Belum Memilih Gambar';
		else if($this->uri->segment(3) == 'tidak_bisa_set_headline')
			$data['message'] = 'Headline Tidak Bisa Lebih Dari 3, Unset judul yang sekarang jadi Headline';
		else if($this->uri->segment(3) == 'sudah_diset')
			$data['message'] = 'Judul sudah diset menjadi Headline';
		else if($this->uri->segment(3) == 'sudah_diunset')
			$data['message'] = 'Judul sudah diunset menjadi Headline';

		else
			$data['message'] = '';

		$data['data'] = $this->Upload_model->get_all_berita()->result();

		$this->load->view('templates/list_berita',$data);
	}

	function set_headline($id)
	{
		//cek sudah 3 headline belum
		$cek = $this->Upload_model->cek_headline()->num_rows();

		if($cek >= 3)
		{
			redirect('tugas/list_berita/tidak_bisa_set_headline');
		}
		else
		{
			$data = array(
			'headline' => '1'
			);

		$this->db->where('id',$id)->update('berita',$data);
			
			redirect('tugas/list_berita/sudah_diset');
		}
	}

	function unset_headline($id)
	{
		$data = array(
			'headline' => '0'
			);

		$this->db->where('id',$id)->update('berita',$data);
		redirect('tugas/list_berita/sudah_diunset');
	}

	function hidden_berita($id)
	{
		$array = array(
			'status' => 'hidden'
			);

		$this->db->where('id',$id)->update('berita',$array);

		redirect('Tugas/list_berita/berhasil_hidden_berita');
	}

	function display_berita($id)
	{
		$array = array(
			'status' => 'display'
			);

		$this->db->where('id',$id)->update('berita',$array);

		redirect('Tugas/list_berita/berhasil_diplay_berita');
	}

	function edit_berita($id)
	{
		$data['active'] = 'list_berita';
		$data['judul'] = 'Edit Berita';
		$data['shape'] = 2;
		$data['data'] = $this->Upload_model->get_berita_by_id($id)->result();
		$this->load->view('templates/tambah_berita',$data);
	}

	function proses_edit_berita($id)
	{
		$judul = $this->input->post('judul');
		$konten = $this->input->post('konten');
		$gambar = $this->input->post('uploadImage');

		if($gambar != '')
		{
		//konfigurasi upload cover
		$config['upload_path'] = './cover_artikel/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 9000000000000;
        $config['max_width']     = 4000;
        $config['max_height']    = 4000;
        $config['overwrite']  = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('uploadImage'))
           {
           	  $error = $this->upload->display_errors();

                        if($error == '<p>You did not select a file to upload.</p>')
                        	$errors = 'belum_pilih_gambar';
                        else
                        	$errors = $error;

                        redirect('Tugas/list_berita/'.$errors);

           }

        else
        {
        	   $data_gambar = array('upload_data' => $this->upload->data());

                        foreach($data_gambar as $dg)
                        {
                        	$nama_file = $dg['orig_name'];
                        }
            
          
                $simpan = array(
                	'judul' => $judul,
                	'konten' => $konten,
                	'gambar' => $nama_file,
                	);

                $saved = $this->db->where('id',$id)->update('berita',$simpan);

                if($saved)
                {
                	redirect('Tugas/list_berita/berhasil_edit_berita');
       			}
		}
	}

	else
	{
		  $simpan = array(
                	'judul' => $judul,
                	'konten' => $konten,
                	);

                 $saved = $this->db->where('id',$id)->update('berita',$simpan);

                if($saved)
                {
                	redirect('Tugas/list_berita/berhasil_edit_berita');
       			}
	}

	}
        
        function aktifasi_bidang($id_bidang, $id_prodi, $status)
        {
            $data = array(
                'status' => $status
            );
            
            $this->db->where('id', $id_bidang)->update('bidang_ilmu', $data);
            
            redirect('Tugas/update_prodi/'. $id_prodi);
        }
        
        
        //NEW October 2018
//Penambahan Kuota Bimbingan Untuk Masing-masing Dosen
    function kuota_bimbingan()
    {
        $data['active'] = "kuota";
        
        if($this->uri->segment(3) == 'sukses_menambahkan')
			$data['message'] = 'Berhasil Menambahkan Stambuk';
        else if($this->uri->segment(3) == 'sukses_menghapus_stambuk')
            $data['message'] = 'Berhasil Menghapus Stambuk';
		else
			$data['message'] = '';
        
        $data['data'] = $this->Prodi_model->get_kuota()->result();
        
        
        $this->load->view('templates/kuota_bimbingan', $data);
    }
        
   function tambah_kuota_bimbingan()
    {
        $stambuk = $this->input->post('stambuk');
        $kuota = $this->input->post('kuota');
        
        $query = "INSERT INTO kuota_bimbingan (kd_dosen) SELECT Kode_dosen FROM dosen";
        $this->db->query($query);
        
       $data = array(
        'stambuk' => $stambuk,
        'kuota' => $kuota
       );
           
           $this->db->where('stambuk', '0')->update('kuota_bimbingan', $data);
        
        redirect('Tugas/kuota_bimbingan/sukses_menambahkan');
    }
    
    function delete_stambuk($stambuk)
    {
        $this->db->where('stambuk', $stambuk)->delete('kuota_bimbingan');
        
        redirect("Tugas/tambah_kuota_bimbingan/sukses_menghapus_stambuk");
    }
        
        function edit_dopim($id_pengajuan,$pembimbing=NULL)
	{
            $data['active'] = 'penentuan_pembimbing';
            
        $nim = $this->Upload_model->get_nim_by_pengajuan($id_pengajuan)->result();
            
            foreach($nim as $nim)
            {
                $nim = $nim->nim;
            }
            
        $stambuk = substr($nim,0,2);
            
        //Pilih Semua Dosen Yang Belum Ada Bimbingannya
        $queri = "SELECT d.Nama_dosen, d.Kode_dosen, e.kuota, e.stambuk FROM (kuota_bimbingan e join dosen d) WHERE e.kd_dosen = d.Kode_dosen AND e.stambuk LIKE '%". $stambuk ."' AND d.Kode_dosen != 'NO' AND e.kd_dosen NOT IN(SELECT a.pembimbing1 FROM (pembimbing a join kuota_bimbingan b) WHERE a.pembimbing1 = b.kd_dosen AND a.nim LIKE '". $stambuk ."%' AND b.stambuk LIKE '%". $stambuk ."' GROUP BY a.pembimbing1)";
            
		$data['dosen'] = $this->db->query($queri)->result();
        
        if($data['dosen'] == null)
        {
            redirect('Tugas/penentuan_pembimbing/belum_diinput_stambuk');
        }
            
            
        //Pilih Semua Dosen Yang Sudah Ada Bimbingannya
        $query = "SELECT c.Nama_dosen, COUNT(a.nim) AS banyaknya, a.pembimbing1, b.stambuk, b.kuota, (b.kuota - COUNT(a.nim)) AS sisa FROM ((pembimbing a join kuota_bimbingan b)join dosen c) WHERE a.pembimbing1 = c.Kode_dosen AND a.pembimbing1 = b.kd_dosen AND a.nim LIKE '". $stambuk."%' AND b.stambuk LIKE '%". $stambuk ."' GROUP BY a.pembimbing1";
        
        $data['dopim'] = $this->db->query($query)->result();
            
           
		$data['dosen2'] = $this->Dosen_model->get_paged_list()->result();
        $data['dosen3'] = $this->Dosen_model->get_paged_list()->result(); 
            
            
           // $query = "SELECT id_pengajuan,nim,judul FROM pengajuan_judul WHERE id_pengajuan = '$id_pengajuan'";
            
            $query = "SELECT a.id_pengajuan,a.nim,a.judul,b.pembimbing1,b.pembimbing2 FROM pengajuan_judul a, pembimbing b WHERE a.id_pengajuan = '$id_pengajuan' AND b.nim = (SELECT nim FROM pengajuan_judul WHERE id_pengajuan = '$id_pengajuan')";

		//$data['data'] = $this->Upload_model->get_data_by_id($id_pengajuan)->result();
		$data['data'] = $this->db->query($query)->result();
    
		$this->load->view('templates/edit_dopims',$data);
	}
        
    function penentuan_pembimbing()
    {
        $data['active'] = 'penentuan_pembimbing';
        $data['status'] = $this->input->post('status');
        
        
        if($data['status'] == 'sudah')
        {
//             $query = "SELECT a.id_pengajuan, a.nim, tgl_pengajuan, a.judul, a.status_kelayakan, a.status, a.jenis_TA, b.nama, b.id_PS, a.file FROM (pengajuan_judul a join mahasiswa b) WHERE a.nim = b.nim AND b.id_PS = '". $_SESSION['prodi']."' AND a.status_kelayakan ='diterima' AND (a.calon_dopim1 IS NOT NULL OR a.calon_dopim2 IS NOT NULL) AND (a.calon_dopim1 != '' OR a.calon_dopim2 != '') AND (a.calon_dopim1 != 'NO' OR a.calon_dopim2 != 'NO') ORDER BY a.id_pengajuan DESC";
            
            $query = "SELECT a.id_pengajuan, a.nim, tgl_pengajuan, a.judul, a.status_kelayakan, a.status, a.jenis_TA, b.nama, b.id_PS, a.file FROM (pengajuan_judul a join mahasiswa b) WHERE a.nim = b.nim AND b.id_PS = '". $_SESSION['prodi']."' AND a.status_kelayakan ='diterima' AND a.status_penentuan_dopim='sudah' ORDER BY a.id_pengajuan DESC";
        }
        else
        {
//            $query = "SELECT a.id_pengajuan, a.nim, tgl_pengajuan, a.judul, a.status_kelayakan, a.status, a.jenis_TA, b.nama, b.id_PS, a.file FROM (pengajuan_judul a join mahasiswa b) WHERE a.nim = b.nim AND b.id_PS = '". $_SESSION['prodi']."' AND a.status_kelayakan ='diterima' AND ((a.calon_dopim1 IS NULL AND a.calon_dopim2 IS NULL) OR (a.calon_dopim1 = '' AND a.calon_dopim2 = '') OR (a.calon_dopim1 = 'NO' AND a.calon_dopim2 = 'NO')) ORDER BY a.id_pengajuan DESC";
            
            $query = "SELECT a.id_pengajuan, a.nim, tgl_pengajuan, a.judul, a.status_kelayakan, a.status, a.jenis_TA, b.nama, b.id_PS, a.file FROM (pengajuan_judul a join mahasiswa b) WHERE a.nim = b.nim AND b.id_PS = '". $_SESSION['prodi']."' AND a.status_kelayakan ='diterima' AND a.status_penentuan_dopim = 'belum' ORDER BY a.id_pengajuan DESC";
        }

		if($this->uri->segment(3) == 'berhasil_ditentukan')
			$data['message'] = 'Anda baru saja berhasil menentukan pembimbing salah satu mahasiswa';
        else if($this->uri->segment(3) == 'belum_diinput_stambuk')
			$data['message'] = 'Stambuk Belum Diinput';
		else
			$data['message'] = '';
        
        //Tampilkan List Mahasiswa Yang Mengajukan Judul Dimana Status Kelayakan Sudah Diterima oleh Ka. Lab dan 
        //Belum ditentukan Pembimbingnya
        
		$data['data'] = $this->db->query($query)->result();
        
		$this->load->view('templates/penentuan_pembimbing', $data);
    }
        
        function penentuan_pembanding()
        {
            $data['active'] = 'penentuan_pembanding';
            $data['status'] = $this->input->post('status');
            
            if($data['status'] == 'sudah')
            {
                $query = "SELECT a.nim, b.nama, a.pembanding1, a.pembanding2, c.id_pengajuan, c.judul, c.jenis_TA FROM ((pembanding a join mahasiswa b) join pengajuan_judul c) where a.nim = b.nim AND a.nim = c.nim AND c.status_kelayakan_sempro = 'layak' AND b.id_PS = '".$_SESSION['prodi']."' AND a.pembanding1 IS NOT NULL GROUP BY a.nim ORDER BY a.id";
            }
            else
            {
                $query = "SELECT a.nim, b.nama, a.pembanding1, a.pembanding2, c.id_pengajuan, c.judul, c.jenis_TA FROM ((pembanding a join mahasiswa b) join pengajuan_judul c) where a.nim = b.nim AND a.nim = c.nim AND c.status_kelayakan_sempro = 'layak' AND b.id_PS = '".$_SESSION['prodi']."' AND a.pembanding1 IS NULL GROUP BY a.nim ORDER BY a.id";
            }
            
           
            
            $data['data'] = $this->db->query($query)->result();
            
            $this->load->view('templates/penentuan_pembanding', $data);
        }
        
        function edit_dopems($nim, $pesan = null)
        {   
            $data['active'] = 'penentuan_pembanding';
            
            if($pesan == 'sukses')
                $data['message'] = 'Sukses Menentukan Pembanding';
            else
                $data['message'] = '';
            
            $data['dosen2'] = $this->Dosen_model->get_paged_list()->result();
            $data['dosen3'] = $this->Dosen_model->get_paged_list()->result(); 
            
            
            $data['pembanding'] = $this->Dosen_model->get_pembanding_seminar($nim)->result();
            
            $this->load->view('templates/edit_dopem', $data);
        }
        
        function proses_update_pembanding_kaprodi($nim)
	{
		$pembanding1 = $this->input->post('pembanding1');
		$pembanding2 = $this->input->post('pembanding2');

		$data = array(
			'pembanding1' => $pembanding1,
			'pembanding2' => $pembanding2
			);
		
		$saved = $this->db->where('nim',$nim)->update('pembanding',$data);


		redirect('Tugas/edit_dopems/'.$nim.'/sukses');
	}
        
        function update_akun_user($username)
        {
            $data['active'] = "akun_user";
            
            $data['data'] = $this->Skripsi_model->get_akun_user_by($username)->result();
        
            $this->load->view('templates/update_akun_user', $data);
        }
        
        function edit_akun_users()
        {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            if($password != '')
            {
                $pass = md5($password);
                $data = array(
                    'nama' => $nama,
                    'username' => $username,
                    'password' => $pass
                );
            }
            else
            {
                 $data = array(
                    'nama' => $nama,
                    'username' => $username
                );
            }
            
            $this->db->where('username', $username)->update('user', $data);
            
            redirect('Tugas/akun_user/sukses_diedit');
        }
        
        function validasi_pengajuan($id_pengajuan, $status)
        {
            $data = array(
                'status_validasi' => $status
            );
            
            $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul', $data);
            
            redirect('Tugas/pengajuan_judul/berhasil_memvalidasi');
        }
        
        function validasi_pengajuan_tolak()
        {
            $id_pengajuan = $this->input->post('id_pengajuan');
            $catatan = $this->input->post('catatan');
            
            $data = array(
                'status_validasi' => 'ditolak',
                'catatan_validasi' => $catatan,
                'status' => 'simpan sementara',
                'status_kelayakan' => 'simpan sementara'
            );
                
            $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul', $data);
            
            redirect('Tugas/pengajuan_judul/berhasil_menolak_pengajuan');
        }
        
        function kelayakan_pengajuan_judul()
        {
            $data['active'] = 'kelayakan_pengajuan_judul';
            
            $status = $this->input->post('status');
            
            if($status != NULL)
            {
                $sess_data = [
						'pengajuan' =>$status
						];

					$this->session->set_userdata($sess_data);
            }
        
            $pengajuan_judul = $_SESSION['pengajuan'];
            
        //belum dikonfirmasi
        if($pengajuan_judul == 'belum')
        {
            $query = "SELECT a.id_pengajuan, a.nim, a.judul, a.tgl_pengajuan, a.status_kelayakan, a.jenis_TA, a.file, b.nama, b.id_PS FROM (pengajuan_judul a join mahasiswa b) WHERE (a.nim = b.nim) AND (a.status_validasi = 'sudah') AND (a.status_kelayakan = 'belum dikonfirmasi') AND (b.id_PS = '". $_SESSION['prodi'] ."') ORDER BY a.id_pengajuan DESC";
        }
        else if($pengajuan_judul == 'all')
        {
             $query = "SELECT a.id_pengajuan, a.nim, a.judul, a.tgl_pengajuan, a.status_kelayakan, a.jenis_TA, a.file, b.nama, b.id_PS FROM (pengajuan_judul a join mahasiswa b) WHERE (a.nim = b.nim) AND (a.status_validasi = 'sudah') AND (b.id_PS = '". $_SESSION['prodi'] ."') ORDER BY a.id_pengajuan DESC";
        }
        else
        {
            $query = "SELECT a.id_pengajuan, a.nim, a.judul, a.tgl_pengajuan, a.status_kelayakan, a.jenis_TA, a.file, b.nama, b.id_PS FROM (pengajuan_judul a join mahasiswa b) WHERE (a.nim = b.nim) AND (a.status_validasi = 'sudah') AND (a.status_kelayakan = '$pengajuan_judul') AND (b.id_PS = '". $_SESSION['prodi'] ."') ORDER BY a.id_pengajuan DESC";
        }

		if($this->uri->segment(3) == 'berhasil_diedit')
			$data['message'] = 'Anda Berhasil Memverifikasi Kelayakan Pengajuan Judul';
        else if($this->uri->segment(3) == 'belum_diinput_stambuk')
			$data['message'] = 'Stambuk Belum Diinput';
		else
			$data['message'] = '';
        
        //Tampilkan List Mahasiswa Yang Mengajukan Judul Dimana Status Kelayakan Sudah Diterima oleh Ka. Lab dan 
        //Belum ditentukan Pembimbingnya
        
		$data['data'] = $this->db->query($query)->result();
        
		$this->load->view('templates/kelayakan_pengajuan_judul', $data);
        }
        
        function verifikasi_kelayakan_pj($id_pengajuan)
        {
            $data['active'] = 'kelayakan_pengajuan_judul';
            
            $query = "SELECT id_pengajuan,nim,judul,status_kelayakan,hasil_uji_kelayakan FROM pengajuan_judul WHERE id_pengajuan = '$id_pengajuan'";

		//$data['data'] = $this->Upload_model->get_data_by_id($id_pengajuan)->result();
		$data['data'] = $this->db->query($query)->result();
            
            $this->load->view('templates/verifikasi_kelayakan_pj', $data);
        }
        
        function update_verifikasi_pengajuan($id_pengajuan)
	{
		$id_pengajuan = $id_pengajuan;
		$judul = $this->input->post('judul');
		$uji_kelayakan_judul = $this->input->post('uji_kelayakan_judul');
		$hasil = $this->input->post('hasil');
		$id_pengajuan = (int)$id_pengajuan;
        $nim = $this->input->post('nim');
        
		$query = "UPDATE pengajuan_judul SET status_kelayakan='$uji_kelayakan_judul',hasil_uji_kelayakan='$hasil' WHERE id_pengajuan=$id_pengajuan";

		var_dump($query);
		$data['save'] = $this->db->query($query);

        
        

		if($data['save'])
		{
			$data['message'] = "Berhasil diedit";

			//set status dari tabel mahasiswa
			if($uji_kelayakan_judul == 'diterima')
			{
                
				$tes = $this->Sempro_model->get_nim($id_pengajuan)->result();

				foreach($tes as $t)
				{
					$nim = $t->nim;
                    $ilmu1 = $t->ilmu1;
                    $ilmu2 = $t->ilmu2;
					var_dump($nim);
				}

				$save = array(
					'id' => '',
					'id_pengajuan_judul' => $id_pengajuan,
					'nim' => $nim,
					'fotokopi_krs' => 'belum dikonfirmasi',
					'fotokopi_kelunasan_spp' => 'belum dikonfirmasi',
					'lembar_kendali_prasempro' => 'belum dikonfirmasi'
					);
				//add validasi berkas sempro yang baru
				$this->Sempro_model->save_validasi_berkas_sempro($save);

				//cek sudah ada di tabel skripsi atau belum
				$check = $this->Sempro_model->cek_available($nim)->num_rows();

				if($check > 0)
				{
                    
					$data = array(
						'judul_skripsi' => $judul,
						'status' => 'seminar proposal',
                        'ilmu1' => $ilmu1,
                        'ilmu2' => $ilmu2
						);
					$update = $this->db->where('nim',$nim)->update('skripsi',$data);
                    
                   $dat = array(
						'judul' => $judul,
                        'ilmu1' => $ilmu1,
                        'ilmu2' => $ilmu2
						);
					$update = $this->db->where('nim',$nim)->update('skripsi_nim',$dat);
				}

				else
				{

					$query = "SELECT pengajuan_judul.judul,mahasiswa.nim,mahasiswa.nama,mahasiswa.id_PS,pembimbing.pembimbing1,pembimbing.pembimbing2,pengajuan_judul.ilmu1,pengajuan_judul.ilmu2 FROM pengajuan_judul,mahasiswa,pembimbing WHERE pengajuan_judul.nim = mahasiswa.nim AND mahasiswa.nim = pembimbing.nim AND mahasiswa.nim = '$nim' AND pengajuan_judul.status_kelayakan = 'diterima'";

					$get_data = $this->db->query($query)->result();
					
					foreach($get_data as $g)
					{
						$data = array(
							'judul_skripsi' => $g->judul,
							'nim' => $g->nim,
							'nama' => $g->nama,
							'kode_PS' => $g->id_PS,
							'kode_Pembimbing1' => $g->pembimbing1,
							'kode_Pembimbing2' => $g->pembimbing2,
							'status' => 'seminar proposal',
                            'ilmu1' => $g->ilmu1,
                            'ilmu2' => $g->ilmu2
							);
					}

					$input = $this->Sempro_model->input_baru($data);
                    
                    $query = "SELECT pengajuan_judul.judul,pengajuan_judul.jenis_TA,mahasiswa.nim,mahasiswa.nama,mahasiswa.id_PS, pembimbing.pembimbing1,pembimbing.pembimbing2 FROM pengajuan_judul,mahasiswa, pembimbing WHERE pengajuan_judul.nim = mahasiswa.nim AND mahasiswa.nim = pembimbing.nim AND mahasiswa.nim = '$nim' AND pengajuan_judul.status_kelayakan = 'diterima'";

					$get_data = $this->db->query($query)->result();
                
					foreach($get_data as $g)
					{
						$datum = array(
							'nim' => $nim,
                            'judul' => $g->judul,
                            'jenis_TA' => $g->jenis_TA
							);
					}
                    
					$input = $this->Semhas_model->input_skripsi_nims($datum);
                    
                    
				}
                
                //cek sudah ada di tabel skripsi_nim atau belum
				$cheks = $this->Sempro_model->cek_available_skripsi_nim($nim)->num_rows();
                
				if($cheks > 0)
				{
					$data = array(
						'judul' => $judul,
						);
					$update = $this->db->where('nim',$nim)->update('skripsi_nim',$data);
				}

				else
				{
                    
					$query = "SELECT pengajuan_judul.judul,pengajuan_judul.jenis_TA,mahasiswa.nim,mahasiswa.nama,mahasiswa.id_PS,pembimbing.pembimbing1,pembimbing.pembimbing2 FROM pengajuan_judul,mahasiswa,pembimbing WHERE pengajuan_judul.nim = mahasiswa.nim AND mahasiswa.nim = pembimbing.nim AND mahasiswa.nim = '$nim' AND pengajuan_judul.status_kelayakan = 'diterima'";

					$get_data = $this->db->query($query)->result();
                    
					
					foreach($get_data as $g)
					{
						$datum = array(
							'nim' => $nim,
                            'judul' => $g->judul,
                            'jenis_TA' => $g->jenis_TA
							);
					}

					$input = $this->Sempro_model->input_skripsi_nims($datum);
                    
				}

				

				$data = array(
					'status' => 'belum sempro'
					);
				$ubah = $this->db->where('nim',$nim)->update('mahasiswa',$data);
			}
            
           
             else if($uji_kelayakan_judul == 'ditolak')
            {
                $this->db->where('nim', $nim)->delete('pembimbing');
            }

			redirect('Tugas/kelayakan_pengajuan_judul/berhasil_diedit');
		}
        

		else
		{
			echo "gagal";
		}
	}
        
        function pra_sempro($status = null, $pesan = null, $page = null)
        {
            $data['active'] = 'pra_sempro';
            
             if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            $key1_nim = $this->input->post('key1_nim');
            $status_pemb = $this->input->post('status_pemb');
            $status = $this->input->post('reset'); 
            
            if($status == 'reset') {
                $data['nim'] = '';
                $data['status_pemb'] = null;
            }
            else{
                $data['nim'] = $key1_nim;
                $data['status_pemb'] = $status_pemb;
            }
            $dsn = $this->db->where('username',$_SESSION['username'])
                        ->where('password', $_SESSION['password'])
                        ->get('user')
                        ->row();
            
            $data['kd_dsn'] = $dsn->kd_dsn;
            
        //PAGINATION
        $this->load->database();
        $this->load->library('pagination');
        
        $halaman = 30;
        $off = $page;  
        
        $data['data'] = $this->Sempro_model->get_bimbingan($data['kd_dsn'],$key1_nim,$status_pemb, 'belum sempro', $halaman, $off)->result();
        $data['jumlah'] = $this->Sempro_model->get_bimbingan_jumlah($data['kd_dsn'],$key1_nim,$status_pemb, 'belum sempro')->num_rows();
        
        $config['base_url'] = base_url().'Tugas/pra_sempro';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
        
			if($pesan == 'delete_success')
				$data['message'] = 'Data berhasil dihapus';
		else if($pesan == 'berhasil_menambahkan_riwayat_bimbingan')
				$data['message'] = 'Anda berhasil menambahkan 1 riwayat bimbingan';
		else if($this->uri->segment(3) == 'update_success')
				$data['message'] = 'Data Riwayat Bimbingan berhasil diedit';
		else
				$data['message'] ='';
		$data['no'] = 1+$off;
            
            $this->load->view('templates/pra_seminar', $data);
        }
        
        function riwayat_bimbingan($jenis_seminar, $nim, $status_dopim, $pesan= null)
        {
            
            if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            switch($jenis_seminar){
                    //mengambil batas berapa kali bimbingan dari database
                case 'sempro' : $id_batas = '1';$data['active'] = 'pra_sempro';break;
                case 'uji_program' : $id_batas = '2';$data['active'] = 'pra_semhas'; break;
                case 'semhas' : $id_batas = '3'; $data['active'] = 'pra_semhas'; break;
                case 'sidang' : $id_batas = '4'; $data['active'] = 'pra_sidang'; break;
            }
            
            $query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1,b.NIP as nip1, a.pembimbing2,
c.Nama_dosen as dopim2 , c.NIP as nip2
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";
            
            $data['dosen'] = $this->db->query($query)->result();
            $data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
		    $data['nama'] = $this->Upload_model->get_nama($nim)->result();
            $data['riwayat'] = $this->Sempro_model->get_riwayat_aktif($nim,$jenis_seminar, null)->result();
            $data['jenis_seminar'] = $jenis_seminar;
            
            $data['jlh_bimbingan'] = $this->Sempro_model->get_riwayat_aktif($nim, $jenis_seminar, 'diterima')->num_rows();
            $batas_bimbingan = $this->db->where('id',$id_batas)
                        ->get('batas_bimbingan')
                        ->row();
            
            $data['batas'] = $batas_bimbingan->batas;
            $data['status_dopim'] = $status_dopim;
            
            $data['tgl_seminar'] = $this->Sempro_model->cek_tgl_seminar($nim, $jenis_seminar, $status_dopim)->result();
            
            $data['catatan_perbaikan'] = $this->Sempro_model->catatan_perbaikan_semhas($nim,null,$jenis_seminar)->result();
            $data['jlh_catatan_perbaikan'] = $this->Sempro_model->catatan_perbaikan_semhas($nim,null, $jenis_seminar)->num_rows();
            $data['jlh_diceklis'] = $this->Sempro_model->catatan_perbaikan_semhas($nim,'sudah', $jenis_seminar)->num_rows();
            $data['jlh_dilocked'] = $this->Sempro_model->catatan_perbaikan_semhas($nim,'locked', $jenis_seminar)->num_rows();      
            
            
		    $this->load->view('templates/riwayat_bimbingan', $data);
        }
        
        function update_izin_bimbingan($nim, $jenis_seminar, $status_dopim)
        {
            $id_pengajuan = $this->input->post('id_pengajuan');
            $rencana_tgl_seminar = $this->input->post('rencana_tgl_seminar');
            
            $catatan_semhas = array(
                'kunci' => 'locked'
            );
            
            $this->db->where('nim', $nim)->where('kunci', 'unlocked')->update('catatan_perbaikan_semhas', $catatan_semhas);
            
            if($status_dopim == 'pembimbing1')
            {
            $data = array(
                'nim' => $nim,
                'id_pengajuan' => $id_pengajuan,
                'pembimbing1' => date('Y-m-d'),
                'jenis_seminar' => $jenis_seminar,
                'rencana_tgl_seminar' => $rencana_tgl_seminar
            );
            }
            else if($status_dopim == 'pembimbing2')
            {
                $data = array(
                'nim' => $nim,
                'id_pengajuan' => $id_pengajuan,
                'pembimbing2' => date('Y-m-d'),
                'jenis_seminar' => $jenis_seminar,
                'rencana_tgl_seminar' => $rencana_tgl_seminar
            );
            }
            else if($status_dopim == 'penguji1')
            {
                 $data = array(
                'nim' => $nim,
                'id_pengajuan' => $id_pengajuan,
                'penguji1' => date('Y-m-d'),
                'jenis_seminar' => $jenis_seminar,
            );
            }
            else if($status_dopim == 'penguji2')
            {
                 $data = array(
                'nim' => $nim,
                'id_pengajuan' => $id_pengajuan,
                'penguji2' => date('Y-m-d'),
                'jenis_seminar' => $jenis_seminar,
            );
            }
            
           //CEK SUDAH ADA DATANYA DI DB ATAU BELUM
            $cek = $this->db->where('nim', $nim)
                ->where('id_pengajuan', $id_pengajuan)
                ->where('jenis_seminar', $jenis_seminar)
                ->get('izin_seminar')
                ->row();
            
         $cek_pembimbing2 = $this->db->where('pembimbing2', 'NO')
                    ->where('nim', $nim)
                    ->get('pembimbing')
                    ->row();
                    
                if(count($cek_pembimbing2))
                {
                    $data2 = array(
                'nim' => $nim,
                'id_pengajuan' => $id_pengajuan,
                'pembimbing2' => date('Y-m-d'),
                'jenis_seminar' => $jenis_seminar,
                'rencana_tgl_seminar' => $rencana_tgl_seminar
            );
                }
                    
            if(count($cek))
            {
                //update
                $this->db->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->where('jenis_seminar', $jenis_seminar)->update('izin_seminar', $data);
                
                $this->db->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->where('jenis_seminar', $jenis_seminar)->update('izin_seminar', $data2);
            }
            else
            {
                $this->Sempro_model->save_izin_seminar($data);
            }
            
            
            redirect('Tugas/riwayat_bimbingan/'.$jenis_seminar.'/'. $nim.'/'. $status_dopim.'/berhasil_mengizinkan');
        }
        
//        function lembar_kendali($jenis_seminar, $id_pengajuan, $nim)
//        {
//            $data['active'] = 'sempro';
//            
//            $query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1,b.NIP as nip1, a.pembimbing2,
//c.Nama_dosen as dopim2 , c.NIP as nip2
//FROM (pembimbing a join dosen b)join dosen c 
//WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";
//
//		$data['dosen'] = $this->db->query($query)->result();
//		$data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
//		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
//        $data['riwayat1'] = $this->Sempro_model->get_riwayat_seminar($jenis_seminar, 'pembimbing1')->result();
//        $data['riwayat2'] = $this->Sempro_model->get_riwayat_seminar($jenis_seminar, 'pembimbing2')->result();
//        $data['jenis_seminar'] = $jenis_seminar;
//            
//            var_dump($data['data']);die;
//        $this->load->view('templates/lembali_kendali', $data);
//            
//        }
        
        function mahasiswa_seminar()
        {
            $data['active'] = 'mahasiswa_seminar';
            $data['jadwal'] = $this->Jadwal_model->show_jadwal()->result();
            
            if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            $this->load->view('templates/mahasiswa_seminar', $data);
            
        }
        
        function list_mahasiswa_seminar($id, $pesan = null)
        {
            $data['id'] = $id;
            $data['id_seminarnya'] = $id;
		$data['active'] ='mahasiswa_seminar';
		
        $data['data'] = $this->Jadwal_model->get_data_by_id($data['id'])->result();
            
        $cek_seminar = $this->db->where('id', $id)
            ->get('jadwal_Seminar')
            ->row();
            
        $seminar = $cek_seminar->seminar;
            
        $kd_dsn = $this->db->where('username', $_SESSION['username'])
            ->where('password', $_SESSION['password'])
            ->get('user')
            ->row();
            
        $data['kd_dsn'] = $kd_dsn->kd_dsn;
            
        if($seminar == 'seminar proposal'){
		$data['total'] = $this->Jadwal_model->get_mahasiswa($data['id'])->num_rows();
		$data['tgl'] = $this->Jadwal_model->get_mahasiswa($data['id'])->result();
        }
        else 
        {
            $data['total'] = $this->Jadwal_model->get_mahasiswa_semhas($data['id'])->num_rows();
		    $data['tgl'] = $this->Jadwal_model->get_mahasiswa_semhas($data['id'])->result();
            
            
        }
        
        

            
		if($this->uri->segment(3) == 'update_success')
		{
			$data['message'] = 'Update Berhasil';
		}
            
        if($pesan == 'sukses_memverifikasi_mahasiswa')
        {
            $data['message'] = "Sukses Memverifikasi Mahasiswa";
        }
        else
        {
            $data['message'] = "";
        }
            
		$this->load->view('templates/list_mahasiswa_seminar',$data);
        }
        
        function penilaian_sempro($nim, $id_pengajuan, $id_seminar, $pesan = null)
        {
            $data['active'] = 'mahasiswa_seminar';
            $kdsn = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
            
            $data['kd_dsn'] = $kdsn->kd_dsn;
            $data['nim'] = $nim;
            $data['id_pengajuan'] = $id_pengajuan;
            $data['id_seminar'] = $id_seminar;
            
            
            $data['data'] = $this->Sempro_model->get_penilaian_sempro($nim, $id_pengajuan, $id_seminar, $data['kd_dsn'])->result();
            $nama = $this->db->where('nim', $nim)
                ->get('mahasiswa')
                ->row();
            
            $data['nama'] = $nama->nama;
            
            $judul = $this->db->where('id_pengajuan', $id_pengajuan)
                ->get('pengajuan_judul')
                ->row();
            
            $data['judul'] = $judul->judul;
            
            if($pesan == 'sukses_tambah')
            {
                $data['message'] = "Berhasil Menambahkan Penilaian";
            }
            else if($pesan == 'sukses_edit')
            {
                $data['message'] = "Berhasil Mengedit Penilaian";
            }
            else 
            {
                $data['message'] = '';
            }
            
            $this->load->view('templates/penilaian_sempro', $data);
        }
        
        function proses_penilaian_sempro($nim, $id_pengajuan, $id_seminar, $kd_dosen)
        {
                $id = $this->input->post('id');
                $judul_skripsi = $this->input->post('judul_skripsi');
                $catatan_judul_skripsi = ltrim($this->input->post('catatan_judul_skripsi'));
                $latar_belakang = $this->input->post('latar_belakang');
                $catatan_latar_belakang = ltrim($this->input->post('catatan_latar_belakang'));
                $rumusan_masalah = $this->input->post('rumusan_masalah');
                $catatan_rumusan_masalah = ltrim($this->input->post('catatan_rumusan_masalah'));
                $landasan_teori = $this->input->post('landasan_teori');
                $catatan_landasan_teori = ltrim($this->input->post('catatan_landasan_teori'));
                $penelitian_terdahulu = $this->input->post('penelitian_terdahulu');
                $catatan_penelitian_terdahulu = ltrim($this->input->post('catatan_penelitian_terdahulu'));
                $data_digunakan = $this->input->post('data_digunakan');
                $catatan_data_digunakan = ltrim($this->input->post('catatan_data_digunakan'));
                $metodologi = $this->input->post('metodologi');
                $catatan_metodologi = ltrim($this->input->post('catatan_metodologi'));
                $arsitektur_umum = $this->input->post('arsitektur_umum');
                $catatan_arsitektur_umum = ltrim($this->input->post('catatan_arsitektur_umum'));
                $kelayakan_sempro = $this->input->post('kelayakan_sempro');
            
            
                $cek = $this->db->where('id', $id)
                    ->get('penilaian_sempro')
                    ->row();
            
                if(count($cek))
                {
                    //UPDATE
                    $data = array (
                        'judul_skripsi' => $judul_skripsi,
                        'catatan_judul_skripsi' => $catatan_judul_skripsi,
                        'latar_belakang' => $latar_belakang,
                        'catatan_latar_belakang' => $catatan_latar_belakang,
                        'rumusan_masalah' => $rumusan_masalah,
                        'catatan_rumusan_masalah' => $catatan_rumusan_masalah,
                        'landasan_teori' => $landasan_teori,
                        'catatan_landasan_teori' => $catatan_landasan_teori,
                        'penelitian_terdahulu' => $penelitian_terdahulu,
                        'catatan_penelitian_terdahulu' => $catatan_penelitian_terdahulu,
                        'data_digunakan' => $data_digunakan,
                        'catatan_data_digunakan' => $catatan_data_digunakan,
                        'metodologi' => $metodologi,
                        'catatan_metodologi' => $catatan_metodologi,
                        'arsitektur_umum' => $arsitektur_umum,
                        'catatan_arsitektur_umum' => $catatan_arsitektur_umum,
                        'kelayakan_sempro' => $kelayakan_sempro
                    );
                    
                    $this->db->where('id', $id)->update('penilaian_sempro', $data);
                    
                    redirect('Tugas/penilaian_sempro/'. $nim .'/'.$id_pengajuan.'/'.$id_seminar.'/sukses_edit');
                }
                else
                {
                    //INSERT
                    $data = array (
                        'nim' => $nim,
                        'id_pengajuan' => $id_pengajuan,
                        'id_jadwal_seminar' => $id_seminar,
                        'dosen' => $kd_dosen,
                        'judul_skripsi' => $judul_skripsi,
                        'catatan_judul_skripsi' => $catatan_judul_skripsi,
                        'latar_belakang' => $latar_belakang,
                        'catatan_latar_belakang' => $catatan_latar_belakang,
                        'rumusan_masalah' => $rumusan_masalah,
                        'catatan_rumusan_masalah' => $catatan_rumusan_masalah,
                        'landasan_teori' => $landasan_teori,
                        'catatan_landasan_teori' => $catatan_landasan_teori,
                        'penelitian_terdahulu' => $penelitian_terdahulu,
                        'catatan_penelitian_terdahulu' => $catatan_penelitian_terdahulu,
                        'data_digunakan' => $data_digunakan,
                        'catatan_data_digunakan' => $catatan_data_digunakan,
                        'metodologi' => $metodologi,
                        'catatan_metodologi' => $catatan_metodologi,
                        'arsitektur_umum' => $arsitektur_umum,
                        'catatan_arsitektur_umum' => $catatan_arsitektur_umum,
                        'kelayakan_sempro' => $kelayakan_sempro
                    );
                    
                    
                    $this->Sempro_model->save_penilaian_sempro($data);
                    
                    redirect('Tugas/penilaian_sempro/'. $nim .'/'.$id_pengajuan.'/'.$id_seminar.'/sukses_tambah');
                    
                }
            
            
        }
        
        function sempro_ongoing($status = null, $page = null)
        {
            $data['active'] = 'sempro_ongoing';
            
            if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            $key1_nim = $this->input->post('key1_nim');
            $status_pemb = $this->input->post('status_pemb');
            $status = $this->input->post('reset');
            
            if($status == 'reset') {
                $data['nim'] = '';
                $data['status_pemb'] = null;
            }
            else{
                $data['nim'] = $key1_nim;
                $data['status_pemb'] = $status_pemb;
            }
            
            $dsn = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
            
            $data['kd_dsn'] = $dsn->kd_dsn;
            
             $this->load->database();
        $this->load->library('pagination');
        
        $halaman = 30;
        $off = $page;  
        
        $data['data'] = $this->Sempro_model->get_catatan_seminar($data['kd_dsn'], 'seminar proposal', 'pembimbing', $data['nim'], $data['status_pemb'], $halaman, $off)->result();
        $data['jumlah'] = $this->Sempro_model->get_catatan_seminar_jumlah($data['kd_dsn'], 'seminar proposal', 'pembimbing', $data['nim'], $data['status_pemb'])->num_rows();
        
        $config['base_url'] = base_url().'Tugas/sempro_ongoing';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
        
		$data['no'] = 1+$off;
            
            $this->load->view('templates/sempro_ongoing', $data);
        }
        
        function pra_semhas($status = null, $pesan = null, $page = null)
        {
            $data['active'] = 'pra_semhas';
            
            if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            $key1_nim = $this->input->post('key1_nim');
            $status_pemb = $this->input->post('status_pemb');
            $status = $this->input->post('reset'); 
                
            if($status == 'reset') {
                $data['nim'] = '';
                $data['status_pemb'] = null;
            }
            else{
                $data['nim'] = $key1_nim;
                $data['status_pemb'] = $status_pemb;
            }
            $dsn = $this->db->where('username',$_SESSION['username'])
                        ->where('password', $_SESSION['password'])
                        ->get('user')
                        ->row();
            
            $data['kd_dsn'] = $dsn->kd_dsn;
            
        //PAGINATION
        $this->load->database();
        $this->load->library('pagination');
        
        $halaman = 30;
        $off = $page;  
        
        $data['data'] = $this->Sempro_model->get_bimbingan($data['kd_dsn'],$key1_nim,$status_pemb, 'belum semhas', $halaman, $off)->result();
        $data['jumlah'] = $this->Sempro_model->get_bimbingan_jumlah($data['kd_dsn'],$key1_nim,$status_pemb, 'belum semhas')->num_rows();
        
        $config['base_url'] = base_url().'Tugas/pra_semhas';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
        
			if($pesan == 'delete_success')
				$data['message'] = 'Data berhasil dihapus';
		else if($pesan == 'berhasil_menambahkan_riwayat_bimbingan')
				$data['message'] = 'Anda berhasil menambahkan 1 riwayat bimbingan';
		else if($this->uri->segment(3) == 'update_success')
				$data['message'] = 'Data Riwayat Bimbingan berhasil diedit';
		else
				$data['message'] ='';
		$data['no'] = 1+$off;
            
            $this->load->view('templates/pra_seminar', $data);
        }
        
        function penilaian_uji_program($nim, $status_dopim)
        {
            $data['active'] = 'pra_semhas';
            $data['status_dopim'] = $status_dopim;
            $data['nim'] = $nim;
            
            $data['data'] = $this->Semhas_model->get_nilai_uji_program($nim)->result();
            
             if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            $this->load->view('templates/penilaian_uji_program', $data);
        }
        
        function proses_penilaian_uji_program($nim, $status_dopim)
        {
            $cek = $this->db->where('nim', $nim)
                ->get('penilaian_uji_program')
                ->row();
            
            $kemampuan_dasar = $this->input->post('kemampuan_dasar');
            $kecocokan = $this->input->post('kecocokan');
            $kasus = $this->input->post('kasus');
            $ui = $this->input->post('ui');
            $validasi = $this->input->post('validasi');
            $total = $kemampuan_dasar + $kecocokan + $kasus + $ui + $validasi;
            
            
            if(count($cek))
            {
                //UPDATE
                $data = array(
                  'kemampuan_dasar' => $kemampuan_dasar,
                    'kecocokan' => $kecocokan,
                    'kasus' => $kasus,
                    'ui' => $ui,
                    'validasi' => $validasi,
                    'total' => $total
                );
                
                $datum = array(
                    'nilai_uji_program' => $total,
                );
                
                $this->db->where('nim', $nim)->update('penilaian_uji_program', $data);
                $this->db->where('nim', $nim)->update('nilai', $datum);
                
                redirect('tugas/pra_semhas/berhasil_diedit');
            }
            else
            {
                //INSERT
                $data = array(
                    'nim' => $nim,
                    'penilai' => $status_dopim,
                  'kemampuan_dasar' => $kemampuan_dasar,
                    'kecocokan' => $kecocokan,
                    'kasus' => $kasus,
                    'ui' => $ui,
                    'validasi' => $validasi,
                    'total' => $total
                );
                
                  
                $datum = array(
                    'nilai_uji_program' => $total,
                );
                
                $this->Semhas_model->save_penilaian_uji_program($data);
                $this->db->where('nim', $nim)->update('nilai', $datum);
                
                 redirect('tugas/pra_semhas/berhasil_ditambah');
            }
        }
        
         function tambah_catatan_perbaikan_semhas($nim, $id_pengajuan, $id_jadwal, $kd_dsn, $status_dopim)
        {
            $catatan_perbaikan = $this->input->post('catatan_perbaikan');
            
            $data = array(
                'dosen' => $kd_dsn,
                'status_dosen' => $status_dopim,
                'nim' => $nim,
                'id_pengajuan' => $id_pengajuan,
                'id_jadwal_seminar' => $id_jadwal,
                'catatan_perbaikan' => $catatan_perbaikan,
                'status_perbaikan' => 'belum',
                'keterangan_catatan' => ''
             );
            
            $this->Semhas_model->simpan_catatan_perbaikan_semhas($data);
            
            redirect('Tugas/catatan_semhas/'.$nim .'/'.$id_jadwal .'/'. $id_pengajuan.'/berhasil_tambah_catatan');
        }
        
        function hapus_catatan_semhas($id, $nim, $id_jadwal, $id_pengajuan)
        {
            $this->db->where('id', $id)->delete('catatan_perbaikan_semhas');
            
            redirect('Tugas/catatan_semhas/'.$nim .'/'.$id_jadwal .'/'. $id_pengajuan.'/berhasil_hapus_catatan');
        }
        
        function penilaian_semhas($nim, $id_jadwal, $id_pengajuan, $pesan = null)
        {
            $data['active'] = 'mahasiswa_seminar';
            $data['nim'] = $nim;
            $data['id_jadwal'] = $id_jadwal;
            $data['id_pengajuan'] = $id_pengajuan;
            
            $dosen = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
            
            $data['kd_dsn'] = $dosen->kd_dsn;
            
            //PENGECEKAN STATUS DOSEN
            //1.CEK STATUS DOSEN APAKAH SEBAGAI PEMBIMBING 1
            $cek = $this->db->where('nim', $nim)
                ->where('pembimbing1', $data['kd_dsn'])
                ->get('pembimbing')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembimbing1';
            }
            
            //2.CEK STATUS DOSEN APAKAH SEBAGAI PEMBIMBING 2
            $cek = $this->db->where('nim', $nim)
                ->where('pembimbing2', $data['kd_dsn'])
                ->get('pembimbing')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembimbing2';
            }
            
            //3.CEK STATUS DOSEN APAKAH SEBAGAI PEMBANDING 1
            $cek = $this->db->where('nim', $nim)
                ->where('pembanding1', $data['kd_dsn'])
                ->get('pembanding')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembanding1';
            }
            
            //4.CEK STATUS DOSEN APAKAH SEBAGAI PEMBANDING 2
            $cek = $this->db->where('nim', $nim)
                ->where('pembanding2', $data['kd_dsn'])
                ->get('pembanding')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembanding2';
            }
            
            if($pesan == 'edit_sukses')
            {
                $data['message'] = "Berhasil Mengedit Penilaian";
            }
            else if($pesan == 'tambah_sukses')
            {
                $data['message'] = "Berhasil Menambahkan Penilaian";
            }
            else if($pesan == 'berhasil_tambah_catatan')
            {
                $data['message'] = 'Berhasil Menambahkan Catatan';
            }
            else if($pesan == 'berhasil_hapus_catatan')
            {
                $data['message'] = 'Berhasil Menghapus Catatan';
            }
            else
            {
                $data['message'] = '';
            }
            
            //END PENGECEKAN STATUS DOSEN
            
            $data['data'] = $this->Semhas_model->get_nilai_semhas_by_dosen($data['kd_dsn'], $nim, $id_jadwal, $id_pengajuan)->result();
            
            //AMBIL DATA CATATAN PERBAIKAN OLEH DOSEN PENGUJI PER PENGUJI
            $data['catatan'] = $this->Semhas_model->get_catatan_perbaikan_semhas($data['kd_dsn'], $nim, $id_jadwal, $id_pengajuan)->result();
            
            $this->load->view('templates/penilaian_semhas', $data);
        }
        
        function catatan_semhas($nim, $id_jadwal, $id_pengajuan, $pesan = null)
        {
            $data['active'] = 'mahasiswa_seminar';
            $data['nim'] = $nim;
            $data['id_jadwal'] = $id_jadwal;
            $data['id_pengajuan'] = $id_pengajuan;
            
            $dosen = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
            
            $data['kd_dsn'] = $dosen->kd_dsn;
            
            //PENGECEKAN STATUS DOSEN
            //1.CEK STATUS DOSEN APAKAH SEBAGAI PEMBIMBING 1
            $cek = $this->db->where('nim', $nim)
                ->where('pembimbing1', $data['kd_dsn'])
                ->get('pembimbing')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembimbing1';
            }
            
            //2.CEK STATUS DOSEN APAKAH SEBAGAI PEMBIMBING 2
            $cek = $this->db->where('nim', $nim)
                ->where('pembimbing2', $data['kd_dsn'])
                ->get('pembimbing')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembimbing2';
            }
            
            //3.CEK STATUS DOSEN APAKAH SEBAGAI PEMBANDING 1
            $cek = $this->db->where('nim', $nim)
                ->where('pembanding1', $data['kd_dsn'])
                ->get('pembanding')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembanding1';
            }
            
            //4.CEK STATUS DOSEN APAKAH SEBAGAI PEMBANDING 2
            $cek = $this->db->where('nim', $nim)
                ->where('pembanding2', $data['kd_dsn'])
                ->get('pembanding')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembanding2';
            }
            
            if($pesan == 'edit_sukses')
            {
                $data['message'] = "Berhasil Mengedit Penilaian";
            }
            else if($pesan == 'tambah_sukses')
            {
                $data['message'] = "Berhasil Menambahkan Penilaian";
            }
            else if($pesan == 'berhasil_tambah_catatan')
            {
                $data['message'] = 'Berhasil Menambahkan Catatan';
            }
            else if($pesan == 'berhasil_hapus_catatan')
            {
                $data['message'] = 'Berhasil Menghapus Catatan';
            }
            else
            {
                $data['message'] = '';
            }
            
            //END PENGECEKAN STATUS DOSEN
            
            $data['data'] = $this->Semhas_model->get_nilai_semhas_by_dosen($data['kd_dsn'], $nim, $id_jadwal, $id_pengajuan)->result();
            
            //AMBIL DATA CATATAN PERBAIKAN OLEH DOSEN PENGUJI PER PENGUJI
            $data['catatan'] = $this->Semhas_model->get_catatan_perbaikan_semhas($data['kd_dsn'], $nim, $id_jadwal, $id_pengajuan)->result();
            
            $this->load->view('templates/catatan_semhas', $data);
        }
        
        function proses_penilaian_semhas($nim, $id_pengajuan, $id_jadwal, $kd_dsn, $status_dosen)
        {
            $id = $this->input->post('id');
            $abstrak = $this->input->post('abstrak');
            $bab1 = $this->input->post('bab1');
            $bab2 = $this->input->post('bab2');
            $bab3 = $this->input->post('bab3');
            $bab4 = $this->input->post('bab4');
            $bab5 = $this->input->post('bab5');
            $pendapat = $this->input->post('pendapat');
            $total = $abstrak + $bab1 + $bab2 + $bab3 + $bab4 + $bab5 + $pendapat;
            $sum = $total;
                    if($sum >= 81)
                    {
                        $grade = 'A';
                    }
                    else if ($sum >= 74 && $sum <= 80)
                    {
                        $grade = 'B+';
                    }
                    else if ($sum >= 66 && $sum <= 73)
                    {
                        $grade = 'B';
                    }
                    else if ($sum >= 59 && $sum <= 65)
                    {
                        $grade = 'C+';
                    }
                    else if ($sum >= 51 && $sum <= 58)
                    {
                        $grade = 'C';
                    }
                    else if ($sum >= 41 && $sum <= 50)
                    {
                        $grade = 'D';
                    }
                    else{
                        $grade = 'E';
                    }
            
            $cek = $this->db->where('nim', $nim)
                ->where('id_pengajuan', $id_pengajuan)
                ->where('status_dosen', $status_dosen)
                ->where('dosen', $kd_dsn)
                ->where('id_jadwal_seminar', $id_jadwal)
                ->get('penilaian_semhas')
                ->row();
            
            if(count($cek))
            {
                //UPDATE
                $data = array(
                    'dosen' => $kd_dsn,
                    'status_dosen' => $status_dosen,
                    'nim' => $nim,
                    'id_pengajuan' => $id_pengajuan,
                    'id_jadwal_seminar' => $id_jadwal,
                    'abstrak' => $abstrak,
                    'bab1' => $bab1,
                    'bab2' => $bab2,
                    'bab3' => $bab3,
                    'bab4' => $bab4,
                    'bab5' => $bab5,
                    'pendapat' => $pendapat,
                    'total' => $total,
                    'grade' => $grade
                );
                
                $this->db->where('id', $id)->update('penilaian_semhas', $data);
                
                redirect('Tugas/penilaian_semhas/'. $nim.'/'. $id_jadwal.'/'. $id_pengajuan.'/edit_sukses');
            }
            else
            {
                //INSERT
                $data = array(
                    'dosen' => $kd_dsn,
                    'status_dosen' => $status_dosen,
                    'nim' => $nim,
                    'id_pengajuan' => $id_pengajuan,
                    'id_jadwal_seminar' => $id_jadwal,
                    'abstrak' => $abstrak,
                    'bab1' => $bab1,
                    'bab2' => $bab2,
                    'bab3' => $bab3,
                    'bab4' => $bab4,
                    'bab5' => $bab5,
                    'pendapat' => $pendapat,
                    'total' => $total,
                    'grade' => $grade
                );
                
                $this->Semhas_model->simpan_penilaian_semhas($data);
                
                redirect('Tugas/penilaian_semhas/'. $nim.'/'. $id_jadwal.'/'. $id_pengajuan.'/tambah_sukses');
                
            }
        }
        
        function proses_status_semhas($kelayakan_semhas, $nim, $id_pengajuan, $id, $seminar)
        {
            //GET ALL PENILAIAN DOSEN PENGUJI SEMHAS DI TABEL penilaian_semhas
             $data['nilai_pembimbing1'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id, $id_pengajuan, 'pembimbing1')->result();
             $data['nilai_pembimbing2'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id, $id_pengajuan, 'pembimbing2')->result();
             $data['nilai_pembanding1'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id, $id_pengajuan, 'pembanding1')->result();
             $data['nilai_pembanding2'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id, $id_pengajuan, 'pembanding2')->result();
             $data['pembagi_dosen_hadir'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id, $id_pengajuan, 'all')->num_rows();
            
             $nilai = 0;
             foreach($data['nilai_pembimbing1'] as $np1)
             {
                 $pembimbing1 = $np1->total;
                 $nilai += $pembimbing1;
             }
            
            foreach($data['nilai_pembimbing2'] as $np2)
            {
                $pembimbing2 = $np2->total;
                $nilai += $pembimbing2;
            }
            
            foreach($data['nilai_pembanding1'] as $np3)
            {
                $pembanding1 = $np3->total;
                $nilai += $pembanding1;
            }
            
            foreach($data['nilai_pembanding2'] as $np4)
            {
                $pembanding2 = $np4->total;
                $nilai += $pembanding2;
            }
            
            if($data['pembagi_dosen_hadir'] == 0)
            {
                $pembimbing1 = 0;
                $pembimbing2 = 0;
                $pembanding1 = 0;
                $pembanding2 = 0;
                $nilai = 0;
            }
            
            else{
             $nilai = $nilai / $data['pembagi_dosen_hadir'];
            }
            
            //UPDATE DATA TABEL nilai (kumpulan nilai mahasiswa dari uji program hingga sidang)
            $data = array(
				'nilai_semhas' => $nilai
				);

			$update = $this->db->where('nim',$nim)->update('nilai',$data);
            
            //CEK NILAI SEMHAS PER DOSEN SUDAH ADA ATAU BELUM DI TABEL nilai_semhas
			$cek = $this->Upload_model->cek_penilaian($nim,$seminar)->num_rows();

			$penilaian = array(
				'kategori' => str_replace("%20", " ", $seminar),
				'nim' => $nim,
				'pembimbing1' => $pembimbing1,
				'pembimbing2' => $pembimbing2,
				'pembanding1' => $pembanding1,
				'pembanding2' => $pembanding2
				);

			if($cek == 0)
			{
				$insert = $this->Upload_model->save_nilai_mhs($nim,$penilaian);
			}

			else
			{
				$update = $this->Upload_model->update_nilai_mhs($nim,$seminar,$penilaian);
			}

            
			if($kelayakan_semhas == 'layak')
			{
                //UPDATE STATUS MAHASISWA PADA TABEL skripsi_nim, mahasiswa, skripsi
				$datum = array(
					'status' => 'belum sidang'
					);

				$status = array(
					'status' => 'sidang'
					);

				$query = "SELECT jadwal_seminar.jadwal FROM jadwal_seminar, mahasiswa_sidang WHERE mahasiswa_sidang.id_jadwal_seminar = jadwal_seminar.id AND mahasiswa_sidang.nim = '$nim' AND mahasiswa_sidang.id_jadwal_seminar = '$id'";

				$tgl = $this->db->query($query)->result();
				foreach($tgl as $t)
				{
					$tgl_semhas = $t->jadwal;
				}

				$tanggal = array(
					'tanggal_semhas' => $tgl_semhas
					);

				$input_tgl = $this->db->where('nim',$nim)->update('skripsi_nim',$tanggal);
				//$delete = $this->db->where('nim',$nim)->delete('mahasiswa_sidang');
				$update_mahasiswa = $this->db->where('nim',$nim)->update('mahasiswa',$datum);
				$update_skripsi = $this->db->where('nim',$nim)->update('skripsi',$status);


				//tambah data di validasi_sidang
				$juduls = $this->Semhas_model->get_validasi($nim)->result();

				foreach($juduls as $j)
				{
					$id_pengajuan = $j->id_pengajuan;
					$judul = $j->judul;
				}

				$array_valid = array(
					'id' => '',
					'id_pengajuan_judul' => $id_pengajuan,
					'nim' => $nim,
					'buku_bimbingan' => 'belum dikonfirmasi',
					'kartu_kemajuan_mahasiswa' => 'belum dikonfirmasi',
					'lembar_kendali_prasidang' => 'belum dikonfirmasi',
					'draf_jurnal' => 'belum dikonfirmasi',
					'fotokopi_krs' => 'belum dikonfirmasi',
					'fotokopi_slip_spp' => 'belum dikonfirmasi',
					'sk_dopim' => 'belum dikonfirmasi'

					);

				$this->Semhas_model->save_validasi_berkas_sidang($array_valid);
                
                //UBAH STATUS status_validasi_semhas DI TABEL pengajuan_judul
                $pengajuan_judul = array(
                    'status_kelayakan_semhas' => 'layak',
                );
                
                $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul', $pengajuan_judul);
                
                //UPDATE TABEL mahasiswa AGAR DAPAT MENGUPLOAD BERKAS uji_program dan semhas
                $data = array(
                    'upload_semhas' => '0',
                    'uji_program' => '0'
                );
                $update_upload_semhas = $this->db->where('nim', $nim)->update('mahasiswa',$data);
                
                
                //UPDATE status_kelayakan di TABEL mahasiswa_sidang
                $status_seminar = array(
                    'status_kelayakan' => 'layak'
                );
                
                $this->db->where('id_jadwal_seminar', $id)->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->update('mahasiswa_sidang', $status_seminar);
			}

			else
			{
                //UPDATE TABEL mahasiswa AGAR DAPAT MENGUPLOAD BERKAS uji_program dan semhas
                $data = array(
                    'upload_semhas' => '1',
                    'uji_program' => '1'
                );
                $update_upload_semhas = $this->db->where('nim', $nim)->update('mahasiswa',$data);
                
                //UBAH STATUS status_validasi_semhas DI TABEL pengajuan_judul
                $pengajuan_judul = array(
                    'status_kelayakan_semhas' => 'tidak layak',
                );
                
                $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul', $pengajuan_judul);
                
                 //UPDATE status_kelayakan di TABEL mahasiswa_sidang
                $status_seminar = array(
                    'status_kelayakan' => 'tidak layak'
                );
                
                $this->db->where('id_jadwal_seminar', $id)->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->update('mahasiswa_sidang', $status_seminar);
                
                //UPDATE izin_seminar
                $izin_seminarss = array(
                    'pembimbing1' => '0000-00-00',
                    'pembimbing2' => '0000-00-00',
                    'rencana_tgl_seminar' => '0000-00-00'
                );
                
                 $this->db->where('jenis_seminar', 'semhas')->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->update('izin_seminar', $izin_seminarss);
			}
            
            redirect('Tugas/list_mahasiswa_seminar/'. $id.'/sukses_memverifikasi_mahasiswa');
        }
        
        function pra_sidang($status = null, $pesan = null, $page = null)
        {
             $data['active'] = 'pra_sidang';
            
            if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            $key1_nim = $this->input->post('key1_nim');
            $status_pemb = $this->input->post('status_pemb');
            $status = $this->input->post('reset'); 
                
            if($status == 'reset') {
                $data['nim'] = '';
                $data['status_pemb'] = null;
            }
            else{
                $data['nim'] = $key1_nim;
                $data['status_pemb'] = $status_pemb;
            }
            $dsn = $this->db->where('username',$_SESSION['username'])
                        ->where('password', $_SESSION['password'])
                        ->get('user')
                        ->row();
            
            $data['kd_dsn'] = $dsn->kd_dsn;
            
        //PAGINATION
        $this->load->database();
        $this->load->library('pagination');
        
        $halaman = 30;
        $off = $page;  
        
        $data['data'] = $this->Sempro_model->get_bimbingan($data['kd_dsn'],$key1_nim,$status_pemb, 'belum sidang', $halaman, $off)->result();
        $data['jumlah'] = $this->Sempro_model->get_bimbingan_jumlah($data['kd_dsn'],$key1_nim,$status_pemb, 'belum sidang')->num_rows();
        
        $config['base_url'] = base_url().'Tugas/pra_sidang';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
        
			if($pesan == 'delete_success')
				$data['message'] = 'Data berhasil dihapus';
		else if($pesan == 'berhasil_menambahkan_riwayat_bimbingan')
				$data['message'] = 'Anda berhasil menambahkan 1 riwayat bimbingan';
		else if($this->uri->segment(3) == 'update_success')
				$data['message'] = 'Data Riwayat Bimbingan berhasil diedit';
		else
				$data['message'] ='';
		$data['no'] = 1+$off;
            
            $this->load->view('templates/pra_seminar', $data);
        }
        
        function penilaian_sidang($nim,$id_jadwal,$id_pengajuan,$pesan = null)
        {
             $data['active'] = 'mahasiswa_seminar';
            $data['nim'] = $nim;
            $data['id_jadwal'] = $id_jadwal;
            $data['id_pengajuan'] = $id_pengajuan;
            
            $dosen = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
            
            $data['kd_dsn'] = $dosen->kd_dsn;
            
            //PENGECEKAN STATUS DOSEN
            //1.CEK STATUS DOSEN APAKAH SEBAGAI PEMBIMBING 1
            $cek = $this->db->where('nim', $nim)
                ->where('pembimbing1', $data['kd_dsn'])
                ->get('pembimbing')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembimbing1';
            }
            
            //2.CEK STATUS DOSEN APAKAH SEBAGAI PEMBIMBING 2
            $cek = $this->db->where('nim', $nim)
                ->where('pembimbing2', $data['kd_dsn'])
                ->get('pembimbing')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembimbing2';
            }
            
            //3.CEK STATUS DOSEN APAKAH SEBAGAI PEMBANDING 1
            $cek = $this->db->where('nim', $nim)
                ->where('pembanding1', $data['kd_dsn'])
                ->get('pembanding')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembanding1';
            }
            
            //4.CEK STATUS DOSEN APAKAH SEBAGAI PEMBANDING 2
            $cek = $this->db->where('nim', $nim)
                ->where('pembanding2', $data['kd_dsn'])
                ->get('pembanding')
                ->row();
                
            if(count($cek))
            {
                $data['status_dopim'] = 'pembanding2';
            }
            
            if($pesan == 'edit_sukses')
            {
                $data['message'] = "Berhasil Mengedit Penilaian";
            }
            else if($pesan == 'tambah_sukses')
            {
                $data['message'] = "Berhasil Menambahkan Penilaian";
            }
            else if($pesan == 'berhasil_tambah_catatan')
            {
                $data['message'] = "Berhasil Menambahkan Catatan Perbaikan Sidang";
            }
            else if($pesan == 'berhasil_hapus_catatan')
            {
                $data['message'] = "Berhasil Menghapus Catatan Perbaikan Sidang";
            }
            else
            {
                $data['message'] = '';
            }
            
            //END PENGECEKAN STATUS DOSEN
            
            $data['data'] = $this->Semhas_model->get_nilai_sidang_by_dosen($data['kd_dsn'], $nim, $id_jadwal, $id_pengajuan)->result();
            
            //AMBIL DATA CATATAN PERBAIKAN OLEH DOSEN PENGUJI PER PENGUJI
            $data['catatan'] = $this->Semhas_model->get_catatan_perbaikan_sidang($data['kd_dsn'], $nim, $id_jadwal, $id_pengajuan)->result();
            
            $this->load->view('templates/penilaian_sidang', $data);
        }
        
        function proses_penilaian_sidang( $nim, $id_pengajuan, $id_jadwal, $kd_dsn, $status_dosen)
        {
            $id = $this->input->post('id');
            $sistematika = $this->input->post('sistematika');
            $substansi = $this->input->post('substansi');
            $kemampuan_substansi = $this->input->post('kemampuan_substansi');
            $pendapat = $this->input->post('pendapat');
            $total = $sistematika + $substansi + $kemampuan_substansi + $pendapat;
            $sum = $total;
                    if($sum >= 81)
                    {
                        $grade = 'A';
                    }
                    else if ($sum >= 74 && $sum <= 80)
                    {
                        $grade = 'B+';
                    }
                    else if ($sum >= 66 && $sum <= 73)
                    {
                        $grade = 'B';
                    }
                    else if ($sum >= 59 && $sum <= 65)
                    {
                        $grade = 'C+';
                    }
                    else if ($sum >= 51 && $sum <= 58)
                    {
                        $grade = 'C';
                    }
                    else if ($sum >= 41 && $sum <= 50)
                    {
                        $grade = 'D';
                    }
                    else{
                        $grade = 'E';
                    }
            
             $cek = $this->db->where('nim', $nim)
                ->where('id_pengajuan', $id_pengajuan)
                ->where('status_dosen', $status_dosen)
                ->where('dosen', $kd_dsn)
                ->where('id_jadwal_seminar', $id_jadwal)
                ->get('penilaian_sidang')
                ->row();
            
            if(count($cek))
            {
                //UPDATE
                $data = array(
                    'dosen' => $kd_dsn,
                    'status_dosen' => $status_dosen,
                    'nim' => $nim,
                    'id_pengajuan' => $id_pengajuan,
                    'id_jadwal_seminar' => $id_jadwal,
                    'sistematika' => $sistematika,
                    'substansi' => $substansi,
                    'kemampuan_substansi' => $kemampuan_substansi,
                    'pendapat' => $pendapat,
                    'total' => $total,
                    'grade' => $grade
                );
                
                $this->db->where('id', $id)->update('penilaian_sidang', $data);
                
                redirect('Tugas/penilaian_sidang/'. $nim.'/'. $id_jadwal.'/'. $id_pengajuan.'/edit_sukses');
            }
            else
            {
                //INSERT
                $data = array(
                    'dosen' => $kd_dsn,
                    'status_dosen' => $status_dosen,
                    'nim' => $nim,
                    'id_pengajuan' => $id_pengajuan,
                    'id_jadwal_seminar' => $id_jadwal,
                    'sistematika' => $sistematika,
                    'substansi' => $substansi,
                    'kemampuan_substansi' => $kemampuan_substansi,
                    'pendapat' => $pendapat,
                    'total' => $total,
                    'grade' => $grade
                );
                
                $this->Semhas_model->simpan_penilaian_sidang($data);
                
                redirect('Tugas/penilaian_sidang/'. $nim.'/'. $id_jadwal.'/'. $id_pengajuan.'/tambah_sukses');
                
            }
            
        }
        
        function tambah_catatan_perbaikan($nim, $id_pengajuan, $id_jadwal, $kd_dsn, $status_dopim)
        {
            $catatan_perbaikan = $this->input->post('catatan_perbaikan');
            
            $data = array(
                'dosen' => $kd_dsn,
                'status_dosen' => $status_dopim,
                'nim' => $nim,
                'id_pengajuan' => $id_pengajuan,
                'id_jadwal_seminar' => $id_jadwal,
                'catatan_perbaikan' => $catatan_perbaikan,
                'status_perbaikan' => 'belum',
                'keterangan_catatan' => ''
             );
            
            $this->Semhas_model->simpan_catatan_perbaikan($data);
            
            redirect('Tugas/penilaian_sidang/'.$nim .'/'.$id_jadwal .'/'. $id_pengajuan.'/berhasil_tambah_catatan');
        }
        
        function hapus_catatan_sidang($id, $nim, $id_jadwal, $id_pengajuan)
        {
            $this->db->where('id', $id)->delete('catatan_perbaikan_sidang');
            
            redirect('Tugas/penilaian_sidang/'.$nim .'/'.$id_jadwal .'/'. $id_pengajuan.'/berhasil_hapus_catatan');
        }
        
        function proses_status_sidang($kelayakan_sidang, $nim, $id_pengajuan, $id, $seminar)
        {
            //GET NILAI UJI PROGRAM
             $nilai_uji_program = $this->Semhas_model->get_nilai_uji_programming($nim)->result();
             
            foreach($nilai_uji_program as $nup)
            {
                $uji_program = $nup->total;
            }
            
            
            //GET NILAI SEMHAS
            $nilai_semhas = $this->Semhas_model->get_nilai_semhas($nim, $id_pengajuan)->result();
             $semhas = 0;
            
            foreach($nilai_semhas as $ns)
            {
                $semhas += $ns->total;
            }
            
            //GET NILAI SIDANG
             $nilai_sidang = $this->Semhas_model->get_nilai_sidang($nim, $id_pengajuan, $id)->result();
             $total_penguji = $this->Semhas_model->get_nilai_sidang($nim, $id_pengajuan, $id)->num_rows();
            
            $sidang = 0;
            foreach($nilai_sidang as $nsi)
            {
                $sidang += $nsi->total;
            }
            
            $nilai = $sidang / $total_penguji;
            
            
                    $total_semhas_dibagi = $semhas / 4;
                    $total_sidang_dibagi = $sidang / 4;
                    
                    $total = (($total_semhas_dibagi * 4) + ($total_sidang_dibagi * 4) + ($uji_program * 2)) / 10;
            
            var_dump($total);
            //UPDATE DATA TABEL nilai (kumpulan nilai mahasiswa dari uji program hingga sidang)
//            $total = (($semhas * 4) + ($sidang * 4) + ($uji_program * 2))/10;
			
             $sum = $total;
                    if($sum >= 81)
                    {
                        $grade = 'A';
                    }
                    else if ($sum >= 74 && $sum <= 80)
                    {
                        $grade = 'B+';
                    }
                    else if ($sum >= 66 && $sum <= 73)
                    {
                        $grade = 'B';
                    }
                    else if ($sum >= 59 && $sum <= 65)
                    {
                        $grade = 'C+';
                    }
                    else if ($sum >= 51 && $sum <= 58)
                    {
                        $grade = 'C';
                    }
                    else if ($sum >= 41 && $sum <= 50)
                    {
                        $grade = 'D';
                    }
                    else{
                        $grade = 'E';
                    }

			$data = array(
				'nilai_sidang' => $nilai,
				'total' => $total,
				'grade' => $grade
				);

			$update = $this->db->where('nim',$nim)->update('nilai',$data);
			$cek = $this->Upload_model->cek_penilaian($nim,$seminar)->num_rows();

			var_dump($cek);
			$penilaian = array(
				'kategori' => $seminar,
				'nim' => $nim,
				'pembimbing1' => $pembimbing1,
				'pembimbing2' => $pembimbing2,
				'pembanding1' => $pembanding1,
				'pembanding2' => $pembanding2
				);

			if($cek == 0)
			{
				$insert = $this->Upload_model->save_nilai_mhs($nim,$penilaian);
			}

			else
			{
				$update = $this->Upload_model->update_nilai_mhs($nim,$seminar,$penilaian);
			}


			if($kelayakan_sidang == 'layak')
			{
                
                   $seminar_p = $this->Sempro_model->get_seminar($id)->result();
                            
                            foreach($seminar_p as $smnr)
                            {
                                $jenis_smnr = $smnr->seminar;
                                $jadwal_tgl = $smnr->jadwal;
                            }
                
                                $orderdate = explode('-', $jadwal_tgl);
$tahun = $orderdate[0];
$month   = $orderdate[1];
$tanggals  = $orderdate[2];
                                $upd_tahun = array(
                                    'Tgl_lulus' => $tahun,
                                    'Bulan_lulus' => $month
                                );
                                
                                $upd_tahuns = array(
                                    'tahun_lulus' => $tahun,
                                    'bulan_lulus' => $month
                                );
                    
                                
                                $updt = $this->db->where('nim', $nim)->update('skripsi', $upd_tahun);
                
                                $upd = $this->db->where('nim', $nim)->update('skripsi_nim', $upd_tahuns);
                
				$datum = array(
					'status' => 'sudah sidang'
					);

				$query = "SELECT jadwal_seminar.jadwal FROM jadwal_seminar, mahasiswa_sidang WHERE mahasiswa_sidang.id_jadwal_seminar = jadwal_seminar.id AND mahasiswa_sidang.nim = '$nim' AND mahasiswa_sidang.id_jadwal_seminar = '$id'";

				$tgl = $this->db->query($query)->result();
				foreach($tgl as $t)
				{
					$tgl_sidang = $t->jadwal;
				}

				$tanggal = array(
					'tanggal_sidang' => $tgl_sidang
					);

				$input_tgl = $this->db->where('nim',$nim)->update('skripsi_nim',$tanggal);
				$update_mahasiswa = $this->db->where('nim',$nim)->update('mahasiswa',$datum);
				$update_skripsi = $this->db->where('nim',$nim)->update('skripsi',$datum);

				//tambah data di tabel validasi_penggandaan
				//cek sudah ada dibuat atau belum , untuk menghindari update berkali kali, sehingga data ditabel tidak ditambah terus
				$check_available = $this->Semhas_model->available_penggandaan($nim)->num_rows();

				if($check_available == 0)
				{

					$juduls = $this->Semhas_model->get_validasi($nim)->result();

				foreach($juduls as $j)
				{
					$id_pengajuan = $j->id_pengajuan;
					$judul = $j->judul;
				}

					$saved_data = array(
						'id' => '',
						'id_pengajuan_judul' => $id_pengajuan,
						'nim' => $nim,
						'cd_kode_jurnal' => 'belum dikonfirmasi',
						'form_persetujuan' => 'belum dikonfirmasi',
						'fotokopi_bebas' => 'belum dikonfirmasi'

						);

					$this->Semhas_model->save_validasi_penggandaan($saved_data);
				}
                
                //UPDATE status_kelayakan_sidang di pengajuan_judul 
                $pengajuan = array(
                    'status_kelayakan_sidang' => 'layak'
                );
                
                $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul', $pengajuan);
                
                 $arrays = array(
                'upload_sidang' => '0'
                );
                
                $this->db->where('nim',$nim)->update('mahasiswa',$arrays);
                
                 //UPDATE status_kelayakan di TABEL mahasiswa_sidang
                $status_seminar = array(
                    'status_kelayakan' => 'layak'
                );
                
                $this->db->where('id_jadwal_seminar', $id)->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->update('mahasiswa_sidang', $status_seminar);
                
                
			}
            else
            {
//                $arrays = array(
//                'upload_sidang' => '1'
//                );
//                
//                $this->db->where('nim',$nim)->update('mahasiswa',$arrays);
                
                 //UPDATE status_kelayakan_sidang di pengajuan_judul 
                $pengajuan = array(
                    'status_kelayakan_sidang' => 'tidak layak'
                );
                
                $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul', $pengajuan);
                
                 //UPDATE status_kelayakan di TABEL mahasiswa_sidang
                $status_seminar = array(
                    'status_kelayakan' => 'tidak layak'
                );
                
                $this->db->where('id_jadwal_seminar', $id)->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->update('mahasiswa_sidang', $status_seminar);
                
                //UPDATE izin_seminar
                $izin_seminarss = array(
                    'pembimbing1' => '0000-00-00',
                    'pembimbing2' => '0000-00-00',
                    'penguji1' => '0000-00-00',
                    'penguji2' => '0000-00-00',
                    'rencana_tgl_seminar' => '0000-00-00'
                );
                
                 $this->db->where('jenis_seminar', 'sidang')->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->update('izin_seminar', $izin_seminarss);
                
                //PINDAHKAN DATA CATATAN DARI TABEL catatan_perbaikan_sidang ke catatan_perbaikan_semhas
                
                $pindahan = $this->Skripsi_model->get_catatan_sidang_pindah($nim, $id_pengajuan, $id)->result();
                    
                if($pindahan != null)
                {
                    foreach($pindahan as $p)
                    {
                    $data_pindahan = array(
                        'dosen' => $p->dosen,
                        'status_dosen' => $p->status_dosen,
                        'nim' => $p->nim,
                        'id_pengajuan' => $p->id_pengajuan,
                        'id_jadwal_seminar' => $p->id_jadwal_seminar,
                        'catatan_perbaikan' => $p->catatan_perbaikan,
                        'status_perbaikan' => $p->status_perbaikan,
                        'keterangan_catatan' => $p->keterangan_catatan,
                        'kunci' => $p->kunci,
                        'untuk_seminar' => 'sidang'
                    );
                    
                    $cek_dulu = $this->db->where('dosen', $p->dosen)->where('status_dosen', $p->status_dosen)->where('nim', $p->nim)->where('id_pengajuan', $p->id_pengajuan)->where('id_jadwal_seminar', $p->id_jadwal_seminar)->where('catatan_perbaikan', $p->catatan_perbaikan)->get('catatan_perbaikan_semhas')->row();
                        
                    if(count($cek_dulu))
                    {
                    $this->Skripsi_model->simpan_catatan_sidang_baru($data_pindahan);
                        
                    $this->db->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->where('id_jadwal_seminar', $id)->delete('catatan_perbaikan_sidang');
                        
                    }
                    }
                }
            }
            
            redirect('Tugas/list_mahasiswa_seminar/'. $id.'/sukses_memverifikasi_mahasiswa');
        }
        
        function revisi_skripsi($status = null, $pesan = null, $page = null)
        {
            $data['active'] = 'revisi_skripsi';
            
            if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            $key1_nim = $this->input->post('key1_nim');
            $status_pemb = $this->input->post('status_pemb');
            $status = $this->input->post('reset'); 
                
            if($status == 'reset') {
                $data['nim'] = '';
                $data['status_pemb'] = null;
            }
            else{
                $data['nim'] = $key1_nim;
                $data['status_pemb'] = $status_pemb;
            }
            $dsn = $this->db->where('username',$_SESSION['username'])
                        ->where('password', $_SESSION['password'])
                        ->get('user')
                        ->row();
            
            $data['kd_dsn'] = $dsn->kd_dsn;
            
        //PAGINATION
        $this->load->database();
        $this->load->library('pagination');
        
        $halaman = 30;
        $off = $page;  
        
        $data['data'] = $this->Sempro_model->get_bimbingan($data['kd_dsn'],$key1_nim,$status_pemb, 'sudah sidang', $halaman, $off)->result();
        $data['jumlah'] = $this->Sempro_model->get_bimbingan_jumlah($data['kd_dsn'],$key1_nim,$status_pemb, 'sudah sidang')->num_rows();
        
        $config['base_url'] = base_url().'Tugas/revisi_skripsi';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = $halaman;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
        
			if($pesan == 'delete_success')
				$data['message'] = 'Data berhasil dihapus';
		else if($pesan == 'berhasil_menambahkan_riwayat_bimbingan')
				$data['message'] = 'Anda berhasil menambahkan 1 riwayat bimbingan';
		else if($this->uri->segment(3) == 'update_success')
				$data['message'] = 'Data Riwayat Bimbingan berhasil diedit';
		else
				$data['message'] ='';
		$data['no'] = 1+$off;
            
            $this->load->view('templates/pra_seminar', $data);
        }
        
        function revisi_skripsi_mahasiswa($nim, $status_dosen, $pesan = null)
        {
            $data['active'] = 'revisi_skripsi';
            $data['status_dosen'] = $status_dosen;
            $data['nim'] = $nim;
            //error_reporting(0);
            
             if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            $data['perbaikan'] = $this->Skripsi_model->get_all_perbaikan_skripsi($nim)->result();
            
            foreach($data['perbaikan'] as $p)
            {
                $data['id_pengajuan'] = $p->id_pengajuan;
                $data['id_jadwal_seminar'] = $p->id_jadwal_seminar;
            }
                
            
            $query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1,b.NIP as nip1, a.pembimbing2,
c.Nama_dosen as dopim2 , c.NIP as nip2
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";
            
            $data['dopim'] = $this->db->query($query)->result();
            $data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
		    $data['nama'] = $this->Upload_model->get_nama($nim)->result();
            
            $query = "SELECT a.pembanding1,b.Nama_dosen as dopem1,b.NIP as nip3, a.pembanding2,
c.Nama_dosen as dopem2 , c.NIP as nip4
FROM (pembanding a join dosen b)join dosen c 
WHERE (a.pembanding1 = b.Kode_dosen) AND (a.pembanding2 = c.Kode_dosen) AND (a.nim = '$nim')";
            
            $data['pembanding'] = $this->db->query($query)->result();
            
            //GET KODE
            $kd_dsn = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
            
            $data['kd_dsn'] = $kd_dsn->kd_dsn;
            
            if($pesan == 'berhasil_membersihkan_reminder')
            {
                $data['message'] = 'Berhasil Membersihkan Reminder';
            }
            else
            {
                $data['message'] = '';
            }
            
            //CONVERT STATUS
            if($status_dosen == 'penguji1')
            {
                $status_dosen = 'pembanding1';
            }
            
            if($status_dosen == 'penguji2')
            {
                $status_dosen = 'pembanding2';
            }
            
            if($data['perbaikan'] != null) {
            $data['cek_verifikasi'] = $this->Skripsi_model->get_all_catatan_perbaikan($data['kd_dsn'], $nim, $status_dosen, $data['id_pengajuan'], $data['id_jadwal_seminar'],'status_perbaikan')->num_rows();
            
            $data['cek_luluskan'] = $this->Skripsi_model->get_all_catatan_perbaikan($data['kd_dsn'], $nim, $status_dosen, $data['id_pengajuan'], $data['id_jadwal_seminar'],'both')->num_rows();
            
            $data['pembandingnya'] =  $this->Skripsi_model->get_all_catatan_perbaikan($data['kd_dsn'], $nim, $status_dosen, $data['id_pengajuan'], $data['id_jadwal_seminar'], null)->num_rows();
                
            $data['pembanding_lulus'] =  $this->Skripsi_model->get_all_catatan_perbaikan($data['kd_dsn'], $nim, $status_dosen, $data['id_pengajuan'], $data['id_jadwal_seminar'], 'all')->num_rows();
                
            $data['cek_verified'] =  $this->Skripsi_model->get_all_catatan_perbaikan($data['kd_dsn'], $nim, $status_dosen, $data['id_pengajuan'], $data['id_jadwal_seminar'], 'cek_verified')->num_rows();
                
//                var_dump($data['cek_verifikasi'], $data['cek_luluskan'], $data['pembandingnya'], $data['pembanding_lulus']);die;
            }
            
            $cek_status_mhs = $this->db->where('nim', $nim)
                ->get('mahasiswa')
                ->row();
            
            $data['status'] = $cek_status_mhs->status;
            
//            var_dump($data['cek_verifikasi'], $data['cek_luluskan'], $data['pembandingnya']);die;
            //kalau $cek_verifikasi == $pembandingnya muncul, kalau $cek_luluskan == $pembandingnya muncul, kalau sudah diverifikasi tdk bisa lagi ngeverifikasi tapi masih bisa edit reminder, kalau sudah luluskan tdk bisa lagi ngedit reminder, status berubah jadi lulus!
        
            $this->load->view('templates/revisi_skripsi_mahasiswa', $data);
        }
        
        function bersihkan_catatan($dosen, $nim, $id_pengajuan, $id_jadwal_seminar, $status_dosen)
        {
            $data = array(
                'keterangan_catatan' => ''
            );
            
            if($status_dosen == 'penguji1')
            {
                $status_dosen = 'pembanding1';
            }
            else if($status_dosen == 'penguji2')
            {
                $status_dosen == 'pembanding2';
            }
            
            $this->db->where('dosen', $dosen)->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->where('id_jadwal_seminar', $id_jadwal_seminar)->where('status_dosen', $status_dosen)->update('catatan_perbaikan_sidang', $data);
            
            redirect('Tugas/revisi_skripsi_mahasiswa/'. $nim.'/'. $status_dosen.'/berhasil_membersihkan_reminder');
        }
      
        function simpan_catatan($kd_dsn, $nim,$id_pengajuan,$id_jadwal_seminar,$status_dosen)
        {
            $ids = $this->input->post('id');
            $status_perbaikan = $this->input->post('status_perbaikan');
            $checkAll = $this->input->post('checkAll');
//            $keterangans = $this->input->post('keterangan');
            
            $cek = $this->db->where('dosen', $kd_dsn)->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->where('id_jadwal_seminar', $id_jadwal_seminar)->where('status_dosen', $status_dosen)->where('kunci', 'unlocked')->get('catatan_perbaikan_sidang')->row();
            
            if(count($cek)){
             $bersihkan = array(
                'status_perbaikan' => 'belum'
            );
              $this->db->where('dosen', $kd_dsn)->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->where('id_jadwal_seminar', $id_jadwal_seminar)->where('status_dosen', $status_dosen)->update('catatan_perbaikan_sidang', $bersihkan);
            }
            
            foreach($ids as $key=>$value)
            {
                $id = $_POST['id'][$key];
                $keterangans = $_POST['keterangan'][$key];
                
                $query = "UPDATE catatan_perbaikan_sidang  SET keterangan_catatan = '$keterangans' WHERE id='$id'";
                
                $this->db->query($query);
            }
            
       
           
            
            $data = array(
                'status_perbaikan' => 'sudah'
            );
            
            foreach($status_perbaikan as $i)
            {
                $this->db->where('id', $i)->update('catatan_perbaikan_sidang', $data);
            }
            
           
            redirect('Tugas/revisi_skripsi_mahasiswa/'. $nim.'/'. $status_dosen.'/berhasil_mengubah_status');
        }
        
        function update_catatan_perbaikan($nim, $status_dosen, $jenis_seminar)
        {
            $ids = $this->input->post('id');
            $status_perbaikan = $this->input->post('status_perbaikan');
            $checkAll = $this->input->post('checkAll');
            
//            $keterangans = $this->input->post('keterangan');
            
            $cek = $this->db->where('nim', $nim)->where('kunci', 'unlocked')->get('catatan_perbaikan_semhas')->row();
            
            if(count($cek)){
             $bersihkan = array(
                'status_perbaikan' => 'belum'
            );
              $this->db->where('nim', $nim)->where('kunci', 'unlocked')->update('catatan_perbaikan_semhas', $bersihkan);
            }
            
       
           
            
            $data = array(
                'status_perbaikan' => 'sudah'
            );
            
            foreach($status_perbaikan as $i)
            {
                $this->db->where('id', $i)->update('catatan_perbaikan_semhas', $data);
            }
            
           
            redirect('Tugas/riwayat_bimbingan/'. $jenis_seminar .'/'. $nim.'/'. $status_dosen.'/berhasil_mengubah_status');
        }
        
        function aksi_perbaikan($status, $kd_dsn, $nim, $id_pengajuan, $id_jadwal_seminar, $status_dosen)
        {
            $kunci = array(
                'kunci' => 'locked'
            );
            
            //CONVERT STATUS
            if($status_dosen == 'penguji1')
            {
                $status_dosen = 'pembanding1';
            }
            
            if($status_dosen == 'penguji2')
            {
                $status_dosen = 'pembanding2';
            }
            
            $this->db->where('dosen', $kd_dsn)->where('nim', $nim)->where('id_pengajuan', $id_pengajuan)->where('id_jadwal_seminar', $id_jadwal_seminar)->where('status_dosen', $status_dosen)->update('catatan_perbaikan_sidang', $kunci);
            
            if($status == 'luluskan')
            {
                 $datum = array(
                                'status' => 'lulus'
                            );
                                
                            $status = array(
                                'upload_validasi' => '0',
                                'status' => 'lulus'
                            );
                            
                            
                            $this->db->where('nim',$nim)->update('mahasiswa',$status);
                            $this->db->where('nim',$nim)->update('skripsi',$datum);
                
                 redirect('Tugas/revisi_skripsi_mahasiswa/'.$nim.'/'. $status_dosen.'/berhasil_meluluskan');
            }
            
            redirect('Tugas/revisi_skripsi_mahasiswa/'.$nim.'/'. $status_dosen.'/berhasil_memverifikasi');
        }
        
        function aplikasi_mahasiswa()
        {
            $data['active'] = 'aplikasi_mahasiswa';
            
            $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
            $data['kd_dsn'] = $cek_kd->kd_dsn;
            
            $data['data'] = $this->Semhas_model->get_aplikasi_mahasiswanya($data['kd_dsn'])->result();
            
            if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            $this->load->view('templates/validasi_aplikasi_mahasiswa', $data);
        }
    
        function notifikasi_dosen()
        {
            $data['active'] = 'notifikasi';
            
            $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
            $data['kd_dsn'] = $cek_kd->kd_dsn;
            
            $data['data'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'])->result();
            
            $update = array(
                'status_dilihat' => 'sudah'
            );
            
            $this->db->where('kd_dsn', $data['kd_dsn'])->update('notifikasi_dosen', $update);
            
             if($_SESSION['level'] == '2')
            {
                $cek_kd = $this->db->where('username', $_SESSION['username'])
                ->where('password', $_SESSION['password'])
                ->get('user')
                ->row();
        
                $data['kd_dsn'] = $cek_kd->kd_dsn;
            
                $data['notifikasi_dsn'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->num_rows();
                $data['notifikasi_dsn_detail'] = $this->Sempro_model->get_notifikasi_dosen($data['kd_dsn'], 'belum')->result();
            }
            
            
            $this->load->view('templates/notifikasi_dosen', $data);
        }
        
        
        // February 14th 2020
        function validasi_plagiarisme($page = null)
        {
            $data['status'] =  $this->input->post('status');
            
            
            if($data['status'] == '')
            {
                $status = 'all';
            }
            $data['data'] = $this->Semhas_model->get_mahasiswa_validasi($data['status'])->result();
            $data['jumlah'] = $this->Semhas_model->get_mahasiswa_validasi($data['status'])->num_rows();
            
//            var_dump($data); die();
            $off = $page;
//            var_dump($data['judul']);die();
            $config['base_url'] = base_url().'Tugas/validasi_plagiarisme';
				$config['total_rows'] = $data['jumlah'];
				$config['per_page'] = 20;
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] ="</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] ="</li>";
				$config['next_link'] = "Next";
				$config['prev_link'] = "Prev";
				$config['first_link'] = false;
				$config['last_link'] = false;
				$config['display_pages'] = true;
				$config['uri_segment'] = 3;
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = '<li class="active"><a href="#">';
				$config['cur_tag_close'] = '<span class="sr-only"></span></a></li>';
				// $config['page_query_string'] = TRUE; 

				
				$this->pagination->initialize($config);

				$data['pagination'] = $this->pagination->create_links();
			if($this->uri->segment(3) == 'delete_success')
				$data['message'] = 'Data berhasil dihapus';
		else if($this->uri->segment(3) == 'add_success')
				$data['message'] = 'Data berhasil ditambah';
		else if($this->uri->segment(3) == 'update_success')
				$data['message'] = 'Data berhasil diedit';
		else
				$data['message'] ='';
		$data['no'] = 1+$off;
		$data['active'] = 'validasi_plagiarisme';
            
            
		$this->load->view('templates/validasi_plagiarisme',$data);
        }
        
        function status_plagiarisme($status_plagiarisme, $id_pengajuan)
        {
            $data = array(
				'status_plagiarisme' => $status_plagiarisme
				);
			
		

			$this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul',$data);

			redirect('tugas/validasi_plagiarisme/update_success');
        }
    }
