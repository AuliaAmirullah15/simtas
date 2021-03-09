<?php

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper(['url','form']);
        $this->load->helper('download');
        $this->load->library('pagination');
		$this->load->model('Profil_model','', TRUE); 
		$this->load->model('Dosen_model','',TRUE);
		$this->load->model('Upload_model','',TRUE);
		$this->load->model('Pembimbing_model','',TRUE);
		$this->load->model('Sempro_model','',TRUE);
		$this->load->model('Semhas_model','',TRUE);
        $this->load->model('Skripsi_model','',TRUE);
        $this->load->model('Jadwal_model','',TRUE);
		$this->load->model('Login_model','',true);
	}

function index()
	{
		$data['form'] = 0;
		if($this->uri->segment(3) == 'belum_bisa_sempro')
				$data['pesan'] = 'Anda belum bisa sempro';
		else if($this->uri->segment(3) == 'belum_bisa_uji_program')
				$data['pesan'] = 'Anda belum bisa uji program';
		else if($this->uri->segment(3) == 'belum_bisa_semhas')
				$data['pesan'] = 'Anda belum bisa semhas';
		else if($this->uri->segment(3) == 'belum_bisa_sidang')
				$data['pesan'] = 'Anda belum bisa sidang';
        else if($this->uri->segment(3) == 'belum_bisa_kirim_aplikasi')
				$data['pesan'] = 'Anda belum bisa kirim aplikasi';
		else if($this->uri->segment(3) == 'belum_bisa_validasi')
				$data['pesan'] = 'Anda belum bisa validasi aplikasi';
		else if($this->uri->segment(3) == 'berhasil_diapply')
				$data['pesan'] = 'Berhasil Apply Judul, silahkan selalu cek status pengajuan judul di menu "LIST JUDUL"';
		else if($this->uri->segment(3) == 'berhasil_menyimpan')
				$data['pesan'] = 'Berhasil Menyimpan Pengajuan Judul';
        else if($this->uri->segment(3) == 'sks_belum_mencukupi')
                $data['pesan'] = 'Anda Belum Bisa Mengerjakan Tugas Akhir, SKS Lulus Anda Belum Mencukupi';
		else
				$data['pesan'] ='';
    
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
    
		$this->load->view('templates/mahasiswa/index', $data);
	}

		function profil()
		{
			$data['data'] = $this->Upload_model->get_profil()->result();

            $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
			if($this->uri->segment(3) == 'update_berhasil')
				$data['message'] = 'Data Telah Diupdate';
			else
				$data['message'] = '';

			$this->load->view('templates/mahasiswa/profil',$data);
		}

		function update_profil($username)
		{
			$user = $this->input->post('username');
			$password = $this->input->post('password');
			$pass = md5($password);
			
			if($password != '')
			{
				$data = array(
					'password' => $pass,
					);

				$this->db->where('username',$username)->update('user',$data);
				$this->session->set_userdata($data);
				redirect('Mahasiswa/profil/update_berhasil',$data);
			}
			else
			{
				redirect('Mahasiswa/profil/',$data);
			}

		}

function pengajuan_judul()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 1;
    
//        $cek_bisa_TA = $this->Sempro_model->available_bisa($nim)->result();
//        
//        foreach($cek_bisa_TA as $cek_bisa_TA)
//        {
//        $id_ps = $cek_bisa_TA->id_PS;
//        $sks = $cek_bisa_TA->sks;
//        }
//    
//        $syarat_sks = $this->Sempro_model->syarat_sks($id_ps)->result();
//    
//        foreach($syarat_sks as $syarat_sks)
//        {
//        $syarat =  $syarat_sks->syarat_sks;
//        }
//            
//        if($sks < $syarat)
//        {
//            redirect('Mahasiswa/index/sks_belum_mencukupi');
//        }
        
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		if($this->uri->segment(3) == 'belum_memilih_file')
				$data['warning'] = 'Anda belum mengupload dokumen pengajuan judul';
		else if($this->uri->segment(3) == 'ukuran_foto_berlebih')
			$data['warning'] = 'Ukuran foto tidak boleh melebihi 400 x 600';
        else if($this->uri->segment(3) == 'judul_kosong')
			$data['warning'] = 'Judul tidak boleh kosong';
        else if($this->uri->segment(3) == 'ringkasan_kosong')
			$data['warning'] = 'Ringkasan tidak boleh kosong';
		else if($this->uri->segment(3) == 'berhasil_diedit')
			$data['warning'] = 'Data Pengajuan Judul Berhasil Diedit';
		else if($this->uri->segment(3) == 'gagal_diedit')
			$data['warning'] = 'Data Pengajuan Judul Gagal Diedit';
		else if($this->uri->segment(3) == 'berhasil_diapply')
			$data['warning'] = 'Anda Berhasil Mengapply Pengajuan Judul';
		else if($this->uri->segment(3) == 'tipe_file_notallowed')
			$data['warning'] = 'Tipe File Yang Diperbolehkan Hanya PDF';
        else if($this->uri->segment(3) == 'file_oversized')
			$data['warning'] = 'Ukuran File Tidak Boleh Lebih Dari 2 MB (2048 KB)';
		else
			$data['warning'] ='';

		//cek sudah pernah daftar atau belum
		$cek = $this->Upload_model->get($nim)->num_rows();
    
        $query = "SELECT bidang_ilmu FROM bidang_ilmu WHERE status='on' AND prodi=(SELECT id_PS FROM mahasiswa WHERE nim='$nim')";
	   $data['bidang_ilmu'] = $this->db->query($query)->result();
        $data['bidang_ilmu2'] = $this->db->query($query)->result();
    
    
		if($cek > 0)
		{
			$judul = $this->Upload_model->get($nim)->result();
			foreach($judul as $judul)
			{
				$status = $judul->status;
				$status_kelayakan = $judul->status_kelayakan;
			}
				
				//kalau status simpan sementara
				if($status == 'simpan sementara')
				{
					$data['pengajuan'] = $this->Upload_model->get_data($nim,$status)->result();
					$data['profil'] = $this->Profil_model->get_profil($nim)->result();
					$data['dopim'] = $this->Dosen_model->get_paged_list()->result();
					$data['dopim2'] = $this->Dosen_model->get_paged_list()->result();

					$this->load->view('templates/mahasiswa/edit_pengajuan_judul', $data);
				}

				//kalau status applied belum dikonfimasi

				else if($status == 'applied' AND  $status_kelayakan == 'belum dikonfirmasi')
				{
					$data['status_kelayakan'] = $status_kelayakan;
					$this->load->view('templates/mahasiswa/ajuan_judul_applied', $data);
				}

				//kalau status applied diterima
				else if($status == 'applied' AND $status_kelayakan == 'diterima')
				{
					$data['status_kelayakan'] = $status_kelayakan; 
					$this->load->view('templates/mahasiswa/ajuan_judul_applied',$data);
				}
				//kalau status applied ditolak
				else
				{
					$data['profil'] = $this->Profil_model->get_profil($nim)->result();
					$data['dopim'] = $this->Dosen_model->get_paged_list()->result();
					$data['dopim2'] = $this->Dosen_model->get_paged_list()->result();

		$query = "SELECT a.pembimbing1,b.Nama_dosen as pemb1, a.pembimbing2,
c.Nama_dosen as pemb2 
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";

		$data['pembimbing'] = $this->db->query($query)->result();

//					$this->load->view('templates/mahasiswa/pengajuan_judul',$data);
                    $this->load->view('templates/mahasiswa/pengajuan_judul2',$data);
				}
			}


			//redirect ke halaman edit dan cek status apakah 'simpan sementara'

		//pendaftaran baru
		else
		{
		$data['profil'] = $this->Profil_model->get_profil($nim)->result();
		$data['dopim'] = $this->Dosen_model->get_paged_list()->result();
		$data['dopim2'] = $this->Dosen_model->get_paged_list()->result();

//		$this->load->view('templates/mahasiswa/pengajuan_judul',$data);
            $this->load->view('templates/mahasiswa/pengajuan_judul2',$data);
		}
	}
    

function post_pengajuan($pesannya = null)
	{
		$nim = $_SESSION['username'];
        $id = $this->input->post('id');
		$nama = $this->input->post('nama');
        $nama_hidden = $this->input->post('nama_hidden');
		$diajukan1 = $this->input->post('diajukan1');
		$diajukan2 = $this->input->post('diajukan2');
		$ilmu1 = $this->input->post('ilmu1');
		$ilmu2 = $this->input->post('ilmu2');
		$dopim1 = $this->input->post('dopim1');
		$dopim2 = $this->input->post('dopim2');
		$judul = $this->input->post('judul');
        $ringkasan = $this->input->post('ringkasan');
        var_dump($ringkasan);
        $keywords = $this->input->post('keywords');
        var_dump($keywords);
		$jenis_ta = 'skripsi';
//		$latar_belakang = $this->input->post('latar_belakang');
//		$rumusan_masalah = $this->input->post('rumusan_masalah');
//		$metodologi = $this->input->post('metodologi');
//		$referensi = $this->input->post('referensi');
		$tgl = date('Y-m-d');
		$nim = (string)$nim;
		$tombol = $this->input->post('tombol');
		$berkas = $this->input->post('berkas');
        $nama_berkas_lama = $_FILES['berkas']['name'];
    
        
        if($dopim1 == '' OR $dopim1 == NULL)
        {
            $dopim1 = 'NO';
        }
    
        else if(strlen($dopim1) > 3)
        {
            
            //GENERATE RANDOM STRING 
            
             $j = 0;
            $length = 3;
        
        while($j == 0) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $kode_dosen .= $characters[rand(0, $charactersLength - 1)];
            }
            
            $cek = $this->db->where('Kode_dosen',$kode_dosen)
                        ->get('dosen')
                        ->row();
    
            if(count($cek) == 0) {
                $j += 1;
                var_dump($kode_dosen);
            }
            else
            {
                var_dump($kode_dosen);
                echo "unavailable";
            }
        }
            
            // END GENERATE RANDOM STRING
            $data_dosen = array(
              'Kode_dosen' => $kode_dosen,
              'Nama_dosen' => $dopim1,
              'Kode_PS' => $_SESSION['prodi'],
              'status_bimbingan' => 'sementara'
            );
            
            $this->Pembimbing_model->simpan_dosen_baru($data_dosen);
            $dopim1 = $kode_dosen;
        }
    
         if($dopim2 == '' OR $dopim2 == NULL)
        {
            $dopim2 = 'NO';
        }
    
        
    
        
        if($pesannya != null AND $nama_berkas_lama != null)
        {
            //hapus file
            $file_older = $this->input->post('file_older');
            $this->load->helper("file");
            $path = PUBPATH.'berkas_mahasiswa/'. $file_older;
            
                if(!unlink($path))
                {
                   log_message('debug', $result['error']);
                        $errors = $result['error'];
                        var_dump($errors);die;
                }
        }
        

        //Jika judul kosong, tampilkan pesan kesalahan
        if($judul == ''){
            redirect("mahasiswa/pengajuan_judul/judul_kosong");
        }
    
        //Jika judul kosong, tampilkan pesan kesalahan
        if($ringkasan == ''){
            redirect("mahasiswa/pengajuan_judul/ringkasan_kosong");
        }
       
        $nama_hidden_proses = str_replace(" ","",$nama_hidden);
        $new_name = 'PengajuanJudul_'. $nim.'_'. $nama_hidden_proses;
        $config['file_name'] = $new_name;
    
    
		//konfigurasi upload
		$config['upload_path'] = './berkas_mahasiswa/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 2048;
        $config['max_width']     = 4000;
        $config['max_height']    = 6000;
        $config['overwrite']  = FALSE;

        var_dump($config['upload_path']);

                $this->load->library('upload', $config);


                if ( ! $this->upload->do_upload('berkas'))
                {

                	$cek_available = $this->Upload_model->get_data_available($nim)->num_rows();

                	if($cek_available > 0)
						{

							$id_pengajuan = $this->input->post('id_pengajuan');
							 if($tombol == 'simpan sementara')
                        {
                        	$status_kelayakan = 'simpan sementara';
                                 
                                 $array = array(
                        	'nim' => $nim,
                        	'judul_diajukan' => $diajukan1,
                        	'judul_diajukan_mahasiswa' => $diajukan2,
                        	'ilmu1' => $ilmu1,
                        	'ilmu2' => $ilmu2,
                        	'calon_dopim1' => $dopim1,
                        	'calon_dopim2' => $dopim2,
                        	'tgl_pengajuan' => $tgl,
                        	'judul' => $judul,
//                        	'latar_belakang' => $latar_belakang,
//                        	'rumusan_masalah' => $rumusan_masalah,
//                        	'metodologi' => $metodologi,
//                        	'referensi' => $referensi,
                        	'status' => $tombol,
                        	'status_kelayakan' => $status_kelayakan,
                        	'hasil_uji_kelayakan' => '',
                        	'jenis_TA' => $jenis_ta,
                            'ringkasan' => $ringkasan,
                            'keywords' => $keywords
                        
                        );
                        }

                        else
                        {
                        	$status_kelayakan = 'belum dikonfirmasi';
                            
                            $array = array(
                        	'nim' => $nim,
                        	'judul_diajukan' => $diajukan1,
                        	'judul_diajukan_mahasiswa' => $diajukan2,
                        	'ilmu1' => $ilmu1,
                        	'ilmu2' => $ilmu2,
                        	'calon_dopim1' => $dopim1,
                        	'calon_dopim2' => $dopim2,
                        	'tgl_pengajuan' => $tgl,
                        	'judul' => $judul,
//                        	'latar_belakang' => $latar_belakang,
//                        	'rumusan_masalah' => $rumusan_masalah,
//                        	'metodologi' => $metodologi,
//                        	'referensi' => $referensi,
                        	'status' => $tombol,
                        	'status_kelayakan' => $status_kelayakan,
                        	'hasil_uji_kelayakan' => '',
                        	'jenis_TA' => $jenis_ta,
                            'status_validasi' => 'sudah',
                            'catatan_validasi' => '',
                            'ringkasan' => $ringkasan,
                            'keywords' => $keywords
                        
                        );
                        }

                        
                        

							$data['tes'] = $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul',$array);
							if($data['tes'])
							{
								

									$input = array(
                        			'pembimbing1' => $dopim1,
                        			'pembimbing2' => $dopim2
                        			);
                        		$data['pembimbing'] = $this->db->where('nim',$nim)->update('pembimbing',$input);
                        		
                        		if($tombol == 'simpan sementara'){
                        		$message = 'berhasil_diedit';
                        		redirect("mahasiswa/pengajuan_judul/".$message);
                        		}
                        		else{
                        			$message = 'berhasil_diapply';
                        		redirect("mahasiswa/pengajuan_judul/".$message);
                        		}
							}
							else
							{
								$message = 'gagal_diedit';
								redirect("mahasiswa/pengajuan_judul/".$message);
							}
						}

					else
					{

                        $error = $this->upload->display_errors();


						if($error == "<p>You did not select a file to upload.</p>")
						{
							$error_convert = "belum_memilih_file";
						}
						else if($error == "<p>The image you are attempting to upload doesn't fit into the allowed dimensions.</p>")
						{
							$error_convert = "ukuran_foto_berlebih";
						}
						else if($error == "<p>The filetype you are attempting to upload is not allowed.</p>")
						{
							$error_convert = "tipe_file_notallowed";
						}
                        else if($error == "<p>The file you are attempting to upload is larger than the permitted size.</p>")
                        {
                            $error_convert = "file_oversized";
                        }
						else
						{
							$error_convert = $error;
						}
                        redirect('mahasiswa/pengajuan_judul/'.$error_convert);
                    }
                }

                else
                {
                        $data_gambar = array('upload_data' => $this->upload->data());

                        foreach($data_gambar as $dg)
                        {
                        	$nama_file = $dg['file_name'];
                        }
                    
                        if($tombol == 'simpan sementara')
                        {
                        	$status_kelayakan = 'simpan sementara';
                            
                             $array = array(
                        	'nim' => $nim,
                        	'judul_diajukan' => $diajukan1,
                        	'judul_diajukan_mahasiswa' => $diajukan2,
                        	'ilmu1' => $ilmu1,
                        	'ilmu2' => $ilmu2,
                        	'calon_dopim1' => $dopim1,
                        	'calon_dopim2' => $dopim2,
                        	'tgl_pengajuan' => $tgl,
                        	'judul' => $judul,
//                        	'latar_belakang' => $latar_belakang,
//                        	'rumusan_masalah' => $rumusan_masalah,
//                        	'metodologi' => $metodologi,
//                        	'referensi' => $referensi,
//                        	'upload' => $nama_file,
                        	'status' => $tombol,
                        	'status_kelayakan' => $status_kelayakan,
                        	'hasil_uji_kelayakan' => '',
                        	'jenis_TA' => $jenis_ta,
                            'file' => $nama_file,
                            'ringkasan' => $ringkasan,
                            'keywords' => $keywords
                            
                        );

                        }

                        else
                        {
                        	$status_kelayakan = 'belum dikonfirmasi';
                            
                             $array = array(
                        	'nim' => $nim,
                        	'judul_diajukan' => $diajukan1,
                        	'judul_diajukan_mahasiswa' => $diajukan2,
                        	'ilmu1' => $ilmu1,
                        	'ilmu2' => $ilmu2,
                        	'calon_dopim1' => $dopim1,
                        	'calon_dopim2' => $dopim2,
                        	'tgl_pengajuan' => $tgl,
                        	'judul' => $judul,
//                        	'latar_belakang' => $latar_belakang,
//                        	'rumusan_masalah' => $rumusan_masalah,
//                        	'metodologi' => $metodologi,
//                        	'referensi' => $referensi,
//                        	'upload' => $nama_file,
                        	'status' => $tombol,
                        	'status_kelayakan' => $status_kelayakan,
                        	'hasil_uji_kelayakan' => '',
                        	'jenis_TA' => $jenis_ta,
                            'file' => $nama_file,
                            'status_validasi' => 'sudah',
                            'catatan_validasi' => '',
                            'ringkasan' => $ringkasan,
                            'keywords' => $keywords
                        );

                        }

                        

             

                        $cek_available = $this->Upload_model->get_data_available($nim)->num_rows();

						if($cek_available > 0)
						{

							$id_pengajuan = $this->input->post('id_pengajuan');

							$data['tes'] = $this->db->where('id_pengajuan', $id_pengajuan)->update('pengajuan_judul',$array);
							if($data['tes'])
							{
								$data['message'] = 'berhasil diedit'; 

							
                        			$input = array(
                        			'pembimbing1' => $dopim1,
                        			'pembimbing2' => $dopim2
                        			);
                        		$data['pembimbing'] = $this->Pembimbing_model->update($nim,$input);

                                if($tombol == 'simpan sementara')
                        	{
                        	redirect("mahasiswa/index/berhasil_menyimpan");
                        	}
                        	else {
                        		redirect("mahasiswa/index/berhasil_diapply");
                        	}    
							}
							else
							{
								echo "gagal diedit";
							}
						}

						else
						{

                        $query = "INSERT INTO pengajuan_judul(nim,judul_diajukan,judul_diajukan_mahasiswa,ilmu1,ilmu2,calon_dopim1,calon_dopim2,tgl_pengajuan,judul,latar_belakang,rumusan_masalah,metodologi,referensi,status_kelayakan,hasil_uji_kelayakan,upload,status,jenis_TA,file, ringkasan, keywords) VALUES('$nim','$diajukan1','$diajukan2','$ilmu1','$ilmu2','$dopim1','$dopim2','$tgl','$judul','','','','','$status_kelayakan','','','$tombol','$jenis_ta','$nama_file', '$ringkasan', '$keywords')";

                        var_dump($query);
                        $data['coba'] = $this->db->query($query);
                   		

                        if($data['coba'])
                        {
                        	$data['message'] = 'berhasil disimpan';

                        	//cek available dopim1 dan 2
                        	$data['dopim'] = $this->Pembimbing_model->cek($nim)->num_rows();

                        	if($data['dopim'] == 0)
                        	{
                        		$input = array(
                        			'nim' => $nim,
                        			'pembimbing1' => $dopim1,
                        			'pembimbing2' => $dopim2

                        			);

                        		$person = array(
                        			'nim' => $nim
                        			);
                        		$nilai = array(
                        			'nim' => $nim
                        			);
                        		$data['pembimbing'] = $this->Pembimbing_model->insert($input);
                        		$data['pembanding'] = $this->Pembimbing_model->insert_pembanding($person);
                        		$data['nilai'] = $this->Pembimbing_model->insert_nilai($nilai);
                        	}

                        	if($tombol == 'simpan sementara')
                        	{
                        	redirect("mahasiswa/index/berhasil_menyimpan");
                        	}
                        	else {
                        		redirect("mahasiswa/index/berhasil_diapply");
                        	}
                        }

                        else
                        {
                        	echo "salahh";
                       	}
                       }
                       
                }
	}
    
     function download_berkas($file)
    {
         $data['file'] = $file;
        $this->load->view('templates/mahasiswa/form_jurnal',$data);
    }
    
     function download_berkass($file)
    {
        $path = base_url().'assets/'.$file;
        
        //var_dump($path);die;
        //var_dump($file);die;
       $data['file'] = file_get_contents($path);
        $name = $this->uri->segment(3);
        
        force_download($name,$data);
    }

	function list_judul()
	{
		$data['form'] = 7;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		$nim = $_SESSION['username'];
		$data['output'] = $this->Upload_model->get_list_judul($nim)->result();
		$this->load->view('templates/mahasiswa/list_judul', $data);
	}

	function form_pengajuan_judul()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 1;
		$data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
        
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();

		$query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1, a.pembimbing2,
c.Nama_dosen as dopim2 
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";

		$data['dosen'] = $this->db->query($query)->result();
		$this->load->view('templates/mahasiswa/form_pengajuan_judul', $data);
	}

	function lembar_kendali_prasempro()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 1;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();


		$query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1,b.NIP as nip1, a.pembimbing2,
c.Nama_dosen as dopim2 , c.NIP as nip2
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";

		$data['dosen'] = $this->db->query($query)->result();
		$data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
		$this->load->view('templates/mahasiswa/form_kendali_prasempro', $data);
	}

	function form_validasi_berkas_sempro($id_validasi_sempro)
	{

		$nim = $_SESSION['username'];
		$data['form'] = 3;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
        
        $query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasempro FROM validasi_sempro b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim') AND (b.id = '$id_validasi_sempro')";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/form_validasi_berkas', $data);
	}

	function status_validasi_berkas_sempro()
	{
		//tampilkan portal status validasi berkas sempro mahasiswa, apakah sudah diperiksa petugas atau belum
		//ambil data dari database

		$nim = $_SESSION['username'];

		$data['form'] = 3;
		$data['detail'] = 1;
		$data['berkas'] = 1;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasempro FROM validasi_sempro b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim')";

		$data['data'] = $this->db->query($query)->result();

		//var_dump($data['data']);die();
		$this->load->view('templates/mahasiswa/status_validasi_berkas_sempro', $data);
	}

	function show_validasi_berkas_sempro($id)
	{
		$nim = $_SESSION['username'];

		$data['form'] = 9;
		$data['detail'] = 2;
		$data['berkas'] = 1;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasempro FROM validasi_sempro b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim')";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/status_validasi_berkas_sempro', $data);

	}

	function sempro()
	{
		$data['form'] = 3;
		$nim = $_SESSION['username'];
        
        if($this->uri->segment(3) == 'ekstensi_file_anda_salah')
			$data['error'] = 'File yang diterima hanya berekstensi <b>RAR atau ZIP</b>';
        else if($this->uri->segment(3) == 'upload_berhasil')
            $data['error'] = 'berhasil upload';
        else if($this->uri->segment(3) == '%3Cp%3EYou%20did%20not%20select%20a%20file%20to%20upload.%3C')
            $data['error'] = 'Anda Belum Memilih Berkas Yang Hendak Diupload';
        else if($this->uri->segment(3) == 'simpan_sementara_berhasil')
            $data['error'] = "Simpan Sementara Berhasil";
		else
			$data['error'] = '';
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		//Cek judul terakhir diterima atau ditolak
		$cek = $this->Sempro_model->cek($nim)->num_rows();
        $data['berkas'] = $this->Upload_model->dapat_berkas($nim,'sempro','submit')->result();
        $data['sementara'] = $this->Upload_model->dapat_berkas($nim,'sempro','simpan_sementara')->result();
        
		//cek sudah pernah daftar atau belum
		$cek = $this->Upload_model->get_sempro_allowed($nim)->num_rows();
		$judul = $this->Upload_model->get($nim)->result();
			foreach($judul as $judul)
			{
				$status = $judul->status;
				$status_kelayakan = $judul->status_kelayakan;
			}

		if($cek > 0)
		{
			$data['status_kelayakan'] = $status_kelayakan; 
            $data['mahasiswa'] = $this->Semhas_model->get_statusnya($nim)->result();
            
             $pengajuan = $this->db->where('nim',$nim)
                        ->where('status_kelayakan', 'diterima')
                        ->get('pengajuan_judul')
                        ->row();
        
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;
        $data['judul'] = $pengajuan->judul;
        $data['hasil_uji_kelayakan'] = $pengajuan->hasil_uji_kelayakan;
            
            $data['izin'] = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'sempro')->result();
            $data['jlh_izin'] = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'sempro')->num_rows();
            
            //LIHAT BERAPA BANYAK PEMBIMBINGNYA
            $data['jlh_penguji'] = 0;
            $pembimbing1 = $this->db->where('nim', $nim)
                ->where('pembimbing1 !=', 'NO')
                ->get('pembimbing')
                ->row();
            
            if(count($pembimbing1))
            {
                $data['jlh_penguji'] += 1;
            }
            
              $pembimbing2 = $this->db->where('nim', $nim)
                ->where('pembimbing2 !=', 'NO')
                ->get('pembimbing')
                ->row();
            
             if(count($pembimbing2))
            {
                $data['jlh_penguji'] += 1;
            }
            
           // var_dump($data['jlh_izin'], $data['jlh_penguji']);
            
            
            //HITUNG IZIN
            $data['jumlah_izin_new'] = 0;
            $izin_pemb1 = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'sempro', 'pembimbing1')->num_rows();
            $izin_pemb2 = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'sempro', 'pembimbing2')->num_rows();
            $data['jumlah_izin_new'] += ($izin_pemb1 + $izin_pemb2);
            
           // var_dump($data['jumlah_izin_new']);
			//redirect ke nampilan view sempro
			$this->load->view('templates/mahasiswa/sempro',$data);
		}

		else
		{
			redirect('mahasiswa/index/belum_bisa_sempro');
		}


	}

	function uji_program()
	{
		$data['form'] = 2;
		$nim = $_SESSION['username'];
		//$cek = $this->Sempro_model->cek_uji_program($nim)->result();
$data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		if($this->uri->segment(3) == 'berhasil_upload')
			$data['error'] = 'berhasil upload';
		else if($this->uri->segment(3) == 'belum_confirm')
			$data['error'] = "Anda belum bisa upload berkas sampai dikonfirmasi terlebih dahulu";
		else if($this->uri->segment(3) == 'sudah_diterima')
			$data['error'] = "Anda tidak bisa upload lagi karena status semhas anda sudah diterima";
        else if($this->uri->segment(3) == 'ekstensi_file_anda_salah')
			$data['error'] = "File yang diterima hanya berekstensi <b>RAR atau ZIP</b>";
         else if($this->uri->segment(3) == 'upload_berhasil')
            $data['error'] = 'berhasil upload';
         else if($this->uri->segment(3) == '%3Cp%3EYou%20did%20not%20select%20a%20file%20to%20upload.%3C')
            $data['error'] = 'Anda Belum Memilih Berkas Yang Hendak Diupload';
        else if($this->uri->segment(3) == 'simpan_sementara_berhasil')
            $data['error'] = "Simpan Sementara Berhasil";
		else
			$data['error'] = '';

        
        $data['berkas'] = $this->Upload_model->dapat_berkas($nim,'uji_program','submit')->result();
        $data['sementara'] = $this->Upload_model->dapat_berkas($nim,'uji_program','simpan_sementara')->result();
        $cek_status = $this->Semhas_model->cek_status_mahasiswa_semhas($nim)->num_rows();
        
		if($cek_status > 0)
		{
            $data['jumlah_bimbingan'] = $this->Sempro_model->get_lembar_kendali_counting('semhas')->num_rows();
            
            $pengajuan = $this->db->where('nim',$nim)
                        ->where('status_kelayakan', 'diterima')
                        ->get('pengajuan_judul')
                        ->row();
        
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;
        $data['judul'] = $pengajuan->judul;
        $data['hasil_uji_kelayakan'] = $pengajuan->hasil_uji_kelayakan;
            
            $data['izin'] = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'semhas')->result();
            $data['jlh_izin'] = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'semhas')->num_rows();
            
            $data['mahasiswa'] = $this->Semhas_model->get_statusnya($nim)->result();
			$this->load->view('templates/mahasiswa/uji_programs', $data);
		}
		else
		{
			redirect('mahasiswa/index/belum_bisa_uji_program');
		}
	}

	function form_penilaian_uji_program()
	{
		$nim = $_SESSION['username'];
		$query = "SELECT a.nama,b.nim,b.calon_dopim1,c.Nama_dosen as pembimbing1,
b.calon_dopim2,d.Nama_dosen as pembimbing2,c.NIP as NIP1,d.NIP
as NIP2,b.ilmu1,b.ilmu2,b.judul FROM (((pengajuan_judul b join mahasiswa a)
join dosen c)join dosen d) WHERE b.nim = a.nim AND b.calon_dopim1 =
c.Kode_dosen AND b.calon_dopim2 = d.Kode_dosen AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1
";
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		$data['data'] = $this->db->query($query)->result();
		$data['form'] = 2;
        
        $data['penilaian_uji_program'] = $this->Semhas_model->get_nilai_uji_programs($nim)->result();
		
		$this->load->view('templates/mahasiswa/form_penilaian_uji_program',$data);
	}

	function form_persetujuan_semhas()
	{
		$nim = $_SESSION['username'];
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		$query = "SELECT a.nama,b.nim,a.id_PS,e.nama_PS,b.calon_dopim1,c.Nama_dosen as pembimbing1,
b.calon_dopim2,d.Nama_dosen as pembimbing2,c.NIP as NIP1,d.NIP
as NIP2,b.ilmu1,b.ilmu2,b.judul FROM ((((pengajuan_judul b join mahasiswa a)join program_studi e)
join dosen c)join dosen d) WHERE b.nim = a.nim AND b.calon_dopim1 =
c.Kode_dosen AND b.calon_dopim2 = d.Kode_dosen AND b.nim = '$nim' AND b.status_kelayakan='diterima' AND a.id_PS = e. id_PS ORDER BY b.nim DESC LIMIT 1
";
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        
		$data['data'] = $this->db->query($query)->result();
		$data['form'] = 2;
        
        $data['izin_seminar'] = $this->Semhas_model->get_izin_seminar($nim, 'semhas')->result();
        $data['ttd_pembimbing'] = $this->Semhas_model->get_ttd_dopim($nim)->result();
        
		$this->load->view('templates/mahasiswa/form_persetujuan_semhas', $data);
	}
    
    function post_berkas($jenis_berkas)
    {
        $nim = $_SESSION['username'];
        $tgl = date('Y-m-d');
        
        $simpan = $this->input->post('simpan');
        $submit = $this->input->post('submit');
        $status_upload = "";
        
        if($simpan != null)
        {
            $status_upload = $simpan;
        }
        
        if($submit != null)
        {
            $status_upload = $submit;
        }
        
        //PROSES MEN-DELETE BERKAS SIMPAN LAMA JIKA ADA BERKAS BARU YANG DIUPLOAD
        $nama_berkas_baru = $_FILES['berkas']['name'];
        $file_older = $this->input->post('berkas_old');
        
        if($nama_berkas_baru != null AND $file_older != null)
        {
            //hapus
            $this->load->helper("file");
            $path = PUBPATH.'berkas_mahasiswa/'. $file_older;
            
                if(!unlink($path))
                {
                   log_message('debug', $result['error']);
                        $errors = $result['error'];
                        var_dump($errors);die;
                }
        }
        
        //PROSES MENGUBAH NAMA FILE
        $mahasiswa_detail = $this->db->where('nim', $_SESSION['username'])
            ->get('mahasiswa')
            ->row();
        
        $nama = $mahasiswa_detail->nama;
        
        $nama_proses = str_replace(" ","",$nama);
        
        if($jenis_berkas == 'sempro')
        {
             $new_name = 'SeminarProposal_'. $nim.'_'. $nama_proses;
        }
        else if($jenis_berkas == 'uji_program')
        {
             $new_name = 'UjiProgram_'. $nim.'_'. $nama_proses;
        }
        else if($jenis_berkas == 'semhas')
        {
             $new_name = 'SeminarHasil_'. $nim.'_'. $nama_proses;
        }
        else if($jenis_berkas == 'sidang')
        {
             $new_name = 'Sidang_'. $nim.'_'. $nama_proses;
        }
         else if($jenis_berkas == 'validasi')
        {
             $new_name = 'ValidasiAplikasi_'. $nim.'_'. $nama_proses;
        }
       
        $config['file_name'] = $new_name;
        
		$config['upload_path']          = './berkas_mahasiswa/';
        $config['allowed_types']        = 'rar|zip';
        $config['max_size']             = 99900000000000000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = FALSE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('berkas'))
                {
                        $data['error'] = $this->upload->display_errors();
                        
                       // $this->load->view('templates/mahasiswa/uji_program', $error);
                        var_dump($data['error']);
                        
                        if($data['error'] == '<p>The filetype you are attempting to upload is not allowed.</p>')
                        {
                        	$error = 'ekstensi_file_anda_salah';
                        }
                        else
                        {
                            $error = $data['error'];
                        }
                        
                        $cek = $this->Upload_model->dapat_berkas($nim,$jenis_berkas,'simpan_sementara')->result();
                    
                    if($cek) {
                        foreach($cek as $cek)
                        {
                            $id = $cek->id;
                        }
                        
                        
                        $datanya = array(
                            'status_submit' => $status_upload,
                            'tgl_upload' => $tgl
                        );
                    
                        $update = $this->db->where('id',$id)->update('berkas_validasi',$datanya);
                    
                        if($update)
                        {
                             //$saved = $this->Upload_model->simpan_berkas($simpan);
                    
                        if($jenis_berkas == 'sempro')
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'upload_sempro' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/sempro/simpan_sementara_berhasil');
                            }
                            else {
                            $datum = array(
                                'upload_sempro' => '0'
                            );
                                
                            $validasi_ubah = array(
                                'fotokopi_krs' => 'belum dikonfirmasi',
                                'fotokopi_kelunasan_spp' => 'belum dikonfirmasi',
                                'lembar_kendali_prasempro' => 'belum dikonfirmasi'
                            );
                                
                            $this->db->where('nim', $nim)->update('validasi_sempro', $validasi_ubah);
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                           
                            redirect('mahasiswa/sempro/upload_berhasil');
                            }
                        }
                        else if($jenis_berkas == 'uji_program')
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'uji_program' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/uji_program/simpan_sementara_berhasil');
                            }
                            else {
                            $datum = array(
                                'uji_program' => '0'
                            );
                            
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/uji_program/upload_berhasil');
                            }
                        }
                        else if($jenis_berkas == 'semhas')
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'upload_semhas' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/semhas/simpan_sementara_berhasil');
                            }
                            else {
                            $datum = array(
                                'upload_semhas' => '0'
                            );
                              $validasi_ubah = array(
                                'fotokopi_krs' => 'belum dikonfirmasi',
                                'fotokopi_sk_dopim' => 'belum dikonfirmasi',
                                'fotokopi_kelunasan_spp' => 'belum dikonfirmasi',
                                'lembar_kendali_prasemhas' => 'belum dikonfirmasi'
                            );
                                
                            $this->db->where('nim', $nim)->update('validasi_semhas', $validasi_ubah);
                                
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/semhas/upload_berhasil');
                            }
                        }
                        else if($jenis_berkas == 'sidang')
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'upload_sidang' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/sidang/simpan_sementara_berhasil');
                            }
                            else {
                            
                            $datum = array(
                                'upload_sidang' => '0'
                            );
                                 $validasi_ubah = array(
                                'buku_bimbingan' => 'belum dikonfirmasi',
                                'kartu_kemajuan_mahasiswa' => 'belum dikonfirmasi',
                                'lembar_kendali_prasidang' => 'belum dikonfirmasi',
                                'draf_jurnal' => 'belum dikonfirmasi',
                                'fotokopi_krs' => 'belum dikonfirmasi',
                                'fotokopi_slip_spp' => 'belum dikonfirmasi',
                                'sk_dopim' => 'belum dikonfirmasi',
                            );
                                
                            $this->db->where('nim', $nim)->update('validasi_sidang', $validasi_ubah);
                                
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/sidang/upload_berhasil');
                            }
                        }
                        else
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'upload_validasi' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/validasi/simpan_sementara_berhasil');
                            }
                            else {
                            $status = array(
                                'upload_validasi' => '0'
//                                'status' => 'lulus'
                            );
                               $validasi_ubah = array(
                                'cd_kode_jurnal' => 'belum dikonfirmasi',
                                'form_persetujuan' => 'belum dikonfirmasi',
                                'fotokopi_bebas' => 'belum dikonfirmasi'
                            );
                                
                            $this->db->where('nim', $nim)->update('validasi_penggandaan', $validasi_ubah);
                            
                            $this->db->where('nim',$nim)->update('mahasiswa',$status);
//                            $this->db->where('nim',$nim)->update('skripsi',$status);
                            
                            redirect('mahasiswa/validasi/upload_berhasil');
                            }
                        }
                            
                        }
                    }
                    
                        if($jenis_berkas == 'sempro')
                        {
                            redirect('mahasiswa/sempro/'.$error);
                        }
                        else if($jenis_berkas == 'semhas')
                        {
                            redirect('mahasiswa/semhas/'.$error);
                        }
                        else if($jenis_berkas == 'sidang')
                        {
                            redirect('mahasiswa/sidang/'.$error);
                        }
                        else
                        {
                            redirect('mahasiswa/validasi/'.$error);
                        }
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                          foreach($data as $d)
                        {
                        	$nama_file = $d['file_name'];
                            $orig_file = $d['orig_name'];
                        }
                 
                        $simpan = array(
                            'nim' => $nim,
                            'jenis_berkas' => $jenis_berkas,
                            'nama_file' => $nama_file,
                            'orig_name' => $orig_file,
                            'tgl_upload' => $tgl,
                            'status_submit' => $status_upload
                        );
                            
                         $cek = $this->Upload_model->dapat_berkas($nim,$jenis_berkas,'simpan_sementara')->result();
                        
                        if($cek)
                        {
                            foreach($cek as $c)
                            {
                                $id = $c->id;
                            }
                            $this->db->where('id',$id)->update('berkas_validasi',$simpan);
                        }
                        else
                        {
                        $saved = $this->Upload_model->simpan_berkas($simpan);
                        }
                    
                       if($jenis_berkas == 'sempro')
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'upload_sempro' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/sempro/simpan_sementara_berhasil');
                            }
                            else {
                            $datum = array(
                                'upload_sempro' => '0'
                            );
                                
                                $validasi_ubah = array(
                                'fotokopi_krs' => 'belum dikonfirmasi',
                                'fotokopi_kelunasan_spp' => 'belum dikonfirmasi',
                                'lembar_kendali_prasempro' => 'belum dikonfirmasi'
                            );
                                
                            $this->db->where('nim', $nim)->update('validasi_sempro', $validasi_ubah);
                                
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/sempro/upload_berhasil');
                            }
                        }
                        else if($jenis_berkas == 'uji_program')
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'uji_program' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/uji_program/simpan_sementara_berhasil');
                            }
                            else {
                            $datum = array(
                                'uji_program' => '0'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/uji_program/upload_berhasil');
                            }
                        }
                        else if($jenis_berkas == 'semhas')
                        {
                            //PENGECEKAN SUDAH ADA BELUM DI TABEL
                            $cek = $this->db->where('nim', $nim)
                                ->get('validasi_semhas')
                                ->row();
                            
                            if(count($cek))
                            {
                                //UPDATE
                            }
                            else{
                                //Tambah ke validasi berkas Semhas
                                $id_pengajuan_judul = $this->db->where('nim', $nim)
                                    ->where('status_kelayakan', 'diterima')
                                    ->get('pengajuan_judul')
                                    ->row();
                                
                                $id_pengajuan = $id_pengajuan_judul->id_pengajuan;
                                
                                $validasi_berkas_semhas = array(
                                    'nim' => $nim,
                                    'id_pengajuan_judul' => $id_pengajuan,
                                    'fotokopi_krs' => 'belum dikonfirmasi',
                                    'fotokopi_sk_dopim' => 'belum dikonfirmasi',
                                    'fotokopi_kelunasan_spp' => 'belum dikonfirmasi',
                                    'lembar_kendali_prasemhas' => 'belum dikonfirmasi'
                                );
                                
                                $this->Semhas_model->simpan_berkas_semhas($validasi_berkas_semhas);
                            
                            }
                            
                            
                            
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'upload_semhas' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/semhas/simpan_sementara_berhasil');
                            }
                            else {
                            $datum = array(
                                'upload_semhas' => '0'
                            );
                                  $validasi_ubah = array(
                                'fotokopi_krs' => 'belum dikonfirmasi',
                                'fotokopi_sk_dopim' => 'belum dikonfirmasi',
                                'fotokopi_kelunasan_spp' => 'belum dikonfirmasi',
                                'lembar_kendali_prasemhas' => 'belum dikonfirmasi'
                            );
                                
                            $this->db->where('nim', $nim)->update('validasi_semhas', $validasi_ubah);
                                
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                                
                                
                            
                                
                            redirect('mahasiswa/semhas/upload_berhasil');
                            }
                        }
                        else if($jenis_berkas == 'sidang')
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'upload_sidang' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/sidang/simpan_sementara_berhasil');
                            }
                            else {
                            
                            $datum = array(
                                'upload_sidang' => '0'
                            );
                                
                                  $validasi_ubah = array(
                                'buku_bimbingan' => 'belum dikonfirmasi',
                                'kartu_kemajuan_mahasiswa' => 'belum dikonfirmasi',
                                'lembar_kendali_prasidang' => 'belum dikonfirmasi',
                                'draf_jurnal' => 'belum dikonfirmasi',
                                'fotokopi_krs' => 'belum dikonfirmasi',
                                'fotokopi_slip_spp' => 'belum dikonfirmasi',
                                'sk_dopim' => 'belum dikonfirmasi',
                            );
                                
                            $this->db->where('nim', $nim)->update('validasi_sidang', $validasi_ubah);
                                
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/sidang/upload_berhasil');
                            }
                        }
                        else
                        {
                            if($status_upload == 'simpan_sementara') {
                                 $datum = array(
                                'upload_validasi' => '1'
                            );
                            $this->db->where('nim',$nim)->update('mahasiswa',$datum);
                            redirect('mahasiswa/validasi/simpan_sementara_berhasil');
                            }
                            
                            else {
//                              $datum = array(
//                                'status' => 'lulus'
//                            );
                                
                            $status = array(
                                'upload_validasi' => '0',
//                                'status' => 'lulus'
                            );
                                
                                  $validasi_ubah = array(
                                'cd_kode_jurnal' => 'belum dikonfirmasi',
                                'form_persetujuan' => 'belum dikonfirmasi',
                                'fotokopi_bebas' => 'belum dikonfirmasi'
                            );
                                
                            $this->db->where('nim', $nim)->update('validasi_penggandaan', $validasi_ubah);
                            
                            
                            $this->db->where('nim',$nim)->update('mahasiswa',$status);
//                            $this->db->where('nim',$nim)->update('skripsi',$datum);
                            
                            redirect('mahasiswa/validasi/upload_berhasil');
                            }
                        }
                }
                    
    }

	function post_persetujuan_semhas()
	{
		$nim = $_SESSION['username'];

		$config['upload_path']          = './persetujuan_semhas/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 99900000000000000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('berkas'))
                {
                        $data['error'] = $this->upload->display_errors();

                       // $this->load->view('templates/mahasiswa/uji_program', $error);
                        var_dump($data['error']);

                        if($data['error'] == '<p>The filetype you are attempting to upload is not allowed.</p>')
                        {
                        	$error = 'ekstensi_file_anda_salah';
                        }
                        redirect('mahasiswa/uji_program/'.$error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                          foreach($data as $d)
                        {
                        	$nama_file = $d['file_name'];
                        }


                        //cek sudah ada atau belum di tabel 
                        $check = $this->Upload_model->cek_semhas($nim)->num_rows();

                        if($check == 0)
                        {
                        	$input = $this->Upload_model->save_uji_program($nim,$nama_file);
                        }
                        else
                        {
                        $cek_data = $this->Upload_model->cek_semhas($nim)->result();

                        foreach($cek_data as $cd)
                        {
                        	$status = $cd->status;
                            $ulang = $cd->ulang;
                        }
                        
                 
                    		if($status == 'belum dikonfirmasi')
                    		{
                    			redirect('mahasiswa/uji_program/belum_confirm');
                    		}
                    		else if($status == 'ditolak')
                    		{
                    			$input = $this->Upload_model->save_uji_program($nim,$nama_file);
                    		} 
                            else if($status == 'diterima' AND $ulang=='1')
                            {
                                $input = $this->Upload_model->save_uji_program($nim,$nama_file);
                            }
                    		else
                    		{
                    			redirect('mahasiswa/uji_program/sudah_diterima');
                    		}
                    	}
                   		}

                        redirect('mahasiswa/uji_program/berhasil_upload');
        }


	function semhas()
	{
		$data['form'] = 4;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        if($this->uri->segment(3) == 'ekstensi_file_anda_salah')
			$data['error'] = "File yang diterima hanya berekstensi <b>RAR atau ZIP</b>";
         else if($this->uri->segment(3) == 'upload_berhasil')
            $data['error'] = 'berhasil upload';
         else if($this->uri->segment(3) == '%3Cp%3EYou%20did%20not%20select%20a%20file%20to%20upload.%3C')
            $data['error'] = 'Anda Belum Memilih Berkas Yang Hendak Diupload';
        else if($this->uri->segment(3) == 'simpan_sementara_berhasil')
            $data['error'] = "Simpan Sementara Berhasil";
		else
			$data['error'] = '';
        
		$nim = $_SESSION['username'];
		$cek = $this->Semhas_model->cek_diterima($nim)->num_rows();
        $data['berkas'] = $this->Upload_model->dapat_berkas($nim,'semhas','submit')->result();
        $data['sementara'] = $this->Upload_model->dapat_berkas($nim,'semhas','simpan_sementara')->result();
        $cek_status = $this->Semhas_model->cek_status_mahasiswa_semhas($nim)->num_rows();
        
		if($cek_status > 0)
		{
             $data['jumlah_bimbingan'] = $this->Sempro_model->get_lembar_kendali_counting('semhas')->num_rows();
            $pengajuan = $this->db->where('nim',$nim)
                        ->where('status_kelayakan', 'diterima')
                        ->get('pengajuan_judul')
                        ->row();
        
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;
        $data['judul'] = $pengajuan->judul;
        $data['hasil_uji_kelayakan'] = $pengajuan->hasil_uji_kelayakan;
            
            $data['izin'] = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'semhas')->result();
            $data['jlh_izin'] = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'semhas')->num_rows();
            
            //LIHAT BERAPA BANYAK PEMBIMBINGNYA
            $data['jlh_penguji'] = 0;
            $pembimbing1 = $this->db->where('nim', $nim)
                ->where('pembimbing1 !=', 'NO')
                ->get('pembimbing')
                ->row();
            
            if(count($pembimbing1))
            {
                $data['jlh_penguji'] += 1;
            }
            
              $pembimbing2 = $this->db->where('nim', $nim)
                ->where('pembimbing2 !=', 'NO')
                ->get('pembimbing')
                ->row();
            
             if(count($pembimbing2))
            {
                $data['jlh_penguji'] += 1;
            }
            
           // var_dump($data['jlh_izin'], $data['jlh_penguji']);
            
            
            //HITUNG IZIN
            $data['jumlah_izin_new'] = 0;
            $izin_pemb1 = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'semhas', 'pembimbing1')->num_rows();
            $izin_pemb2 = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'semhas', 'pembimbing2')->num_rows();
            $data['jumlah_izin_new'] += ($izin_pemb1 + $izin_pemb2);
            
            $data['mahasiswa'] = $this->Semhas_model->get_statusnya($nim)->result();
			$this->load->view('templates/mahasiswa/semhas', $data);
		}
		else
		{
			redirect('mahasiswa/index/belum_bisa_semhas');
		}
	}

	function status_validasi_berkas_semhas()
	{
		//tampilkan portal status validasi berkas sempro mahasiswa, apakah sudah diperiksa petugas atau belum
		//ambil data dari database

		$nim = $_SESSION['username'];
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

		$data['form'] = 4;
		$data['detail'] = 1;
		$data['berkas'] = 2;

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasemhas, b.fotokopi_sk_dopim FROM validasi_semhas b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim')";

		$data['data'] = $this->db->query($query)->result();

		//var_dump($data['data']);die();
		$this->load->view('templates/mahasiswa/status_validasi_berkas_sempro', $data);
	}

	function show_validasi_berkas_semhas($id)
	{
		$nim = $_SESSION['username'];

		$data['form'] = 10;
		$data['detail'] = 2;
		$data['berkas'] = 2;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasemhas, b.fotokopi_sk_dopim FROM validasi_semhas b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim')";


		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/status_validasi_berkas_sempro', $data);

	}

	function validasi_berkas_semhas()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 4;
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();

		$this->load->view('templates/mahasiswa/validasi_berkas_semhas', $data);
	}

	function lembar_kendali_prasemhas()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 4;


		$query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1,b.NIP as nip1, a.pembimbing2,
c.Nama_dosen as dopim2 , c.nip as nip2
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";

		$data['dosen'] = $this->db->query($query)->result();
		$data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
		$this->load->view('templates/mahasiswa/lembar_kendali_prasemhas', $data);
	}

	function sidang()
	{
		$data['form'] = 5;
		$nim = $_SESSION['username'];
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        
        $data['berkas'] = $this->Upload_model->get_berkas($nim,'sidang')->result();
        
        if($this->uri->segment(3) == 'ekstensi_file_anda_salah')
			$data['error'] = "File yang diterima hanya berekstensi <b>RAR atau ZIP</b>";	
        else if($this->uri->segment(3) == 'upload_berhasil')
            $data['error'] = 'berhasil upload';
         else if($this->uri->segment(3) == '%3Cp%3EYou%20did%20not%20select%20a%20file%20to%20upload.%3C')
            $data['error'] = 'Anda Belum Memilih Berkas Yang Hendak Diupload';
        else if($this->uri->segment(3) == 'simpan_sementara_berhasil')
            $data['error'] = "Simpan Sementara Berhasil";
		else
			$data['error'] = '';

		$cek = $this->Sempro_model->cek_sidang($nim)->result();
         $data['berkas'] = $this->Upload_model->dapat_berkas($nim,'sidang','submit')->result();
        $data['sementara'] = $this->Upload_model->dapat_berkas($nim,'sidang','simpan_sementara')->result();

		if($cek)
		{ 
            $data['mahasiswa'] = $this->Semhas_model->get_statusnya($nim)->result();
            
             $pengajuan = $this->db->where('nim',$nim)
                        ->where('status_kelayakan', 'diterima')
                        ->get('pengajuan_judul')
                        ->row();
        
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;
        $data['judul'] = $pengajuan->judul;
        $data['hasil_uji_kelayakan'] = $pengajuan->hasil_uji_kelayakan;
            
            $data['izin'] = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'sidang')->result();
            $data['jlh_izin'] = $this->Sempro_model->get_izin_seminar($nim, $data['id_pengajuan'], 'sidang')->num_rows();
            
            $data['mahasiswa'] = $this->Semhas_model->get_statusnya($nim)->result();
			$this->load->view('templates/mahasiswa/sidang',$data);
		}
		else
		{
			redirect('mahasiswa/index/belum_bisa_sidang');
		}
	}

	function status_validasi_berkas_sidang()
	{
		//tampilkan portal status validasi berkas sempro mahasiswa, apakah sudah diperiksa petugas atau belum
		//ambil data dari database

		$nim = $_SESSION['username'];
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

		$data['form'] = 5;
		$data['detail'] = 1;
		$data['berkas'] = 3;

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_slip_spp, b.lembar_kendali_prasidang, b.sk_dopim, b.buku_bimbingan, b.kartu_kemajuan_mahasiswa,b.draf_jurnal FROM validasi_sidang b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim')";

		$data['data'] = $this->db->query($query)->result();

		//var_dump($data['data']);die();
		$this->load->view('templates/mahasiswa/status_validasi_berkas_sempro', $data);
	}

	function show_validasi_berkas_sidang($id)
	{
		$nim = $_SESSION['username'];
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

		$data['form'] = 11;
		$data['detail'] = 2;
		$data['berkas'] = 3;

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_slip_spp, b.lembar_kendali_prasidang, b.sk_dopim, b.buku_bimbingan, b.kartu_kemajuan_mahasiswa,b.draf_jurnal FROM validasi_sidang b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim') AND(b.id = '$id')";
	

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/status_validasi_berkas_sempro', $data);

	}

	function form_persetujuan_sidang()
	{
			$nim = $_SESSION['username'];
		$query = "SELECT a.nama,b.nim,a.id_PS,e.nama_PS,b.calon_dopim1,c.Nama_dosen as pembimbing1,
b.calon_dopim2,d.Nama_dosen as pembimbing2,c.NIP as NIP1,d.NIP
as NIP2,b.ilmu1,b.ilmu2,b.judul,g.Nama_dosen as pembanding1,g.NIP as NIP3,h.Nama_dosen as pembanding2, h.NIP as NIP4 FROM (((((((pengajuan_judul b join mahasiswa a)join program_studi e)
join dosen c)join dosen d) join pembanding f) join dosen g)join dosen h) WHERE b.nim = a.nim AND b.calon_dopim1 =
c.Kode_dosen AND b.calon_dopim2 = d.Kode_dosen AND a.nim = f.nim AND f.pembanding1 = g.Kode_dosen AND f.pembanding2 = h.Kode_dosen AND b.nim = '$nim' AND b.status_kelayakan='diterima' AND a.id_PS = e. id_PS ORDER BY b.nim DESC LIMIT 1
";


		$data['data'] = $this->db->query($query)->result();
		$data['form'] = 5;
        
         $data['izin_seminar'] = $this->Semhas_model->get_izin_seminar($nim, 'sidang')->result();
        $data['ttd_pembimbing'] = $this->Semhas_model->get_ttd_dopim($nim)->result();
        $data['ttd_pembanding'] = $this->Semhas_model->get_ttd_dopem($nim)->result();
//        var_dump($data['izin_seminar'], $data['ttd_pembimbing'], $data['ttd_pembanding']);
        
		$this->load->view('templates/mahasiswa/form_persetujuan_sidang', $data);
	}

	function validasi_berkas_sidang()
	{

		$nim = $_SESSION['username'];
		$data['form'] = 5;
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();

		$this->load->view('templates/mahasiswa/validasi_berkas_sidang', $data);
	}

	function status_validasi_berkas_penggandaan()
	{
		//tampilkan portal status validasi berkas penggandaan skripsi mahasiswa, apakah sudah diperiksa petugas atau belum
		//ambil data dari database

		$nim = $_SESSION['username'];
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        
		$data['form'] = 6;
		$data['detail'] = 1;
		$data['berkas'] = 4;

		$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.cd_kode_jurnal, b.form_persetujuan, b.fotokopi_bebas FROM validasi_penggandaan b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim')";

		$data['data'] = $this->db->query($query)->result();

		//var_dump($data['data']);die();
		$this->load->view('templates/mahasiswa/status_validasi_berkas_sempro', $data);
	}

	function show_validasi_berkas_penggandaan($id)
	{
		$nim = $_SESSION['username'];

		$data['form'] = 12;
		$data['detail'] = 2;
		$data['berkas'] = 4;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

			$query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.cd_kode_jurnal, b.form_persetujuan, b.fotokopi_bebas FROM validasi_penggandaan b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim')";
	

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/status_validasi_berkas_sempro', $data);

	}

	function lembar_kendali_prasidang()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 5;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

		$query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1, a.pembimbing2,
c.Nama_dosen as dopim2 
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";

		$data['dosen'] = $this->db->query($query)->result();
		$data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
		$this->load->view('templates/mahasiswa/lembar_kendali_prasidang', $data);
	}
    
    
	function upload_berkas_validasi()
	{
		$data['form'] = 16;
		$nim = $_SESSION['username'];
        
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        
        if($this->uri->segment(3) == 'ekstensi_file_anda_salah')
			$data['error'] = "File yang diterima hanya berekstensi <b>RAR atau ZIP</b>";	
        else if($this->uri->segment(3) == 'upload_berhasil')
            $data['error'] = 'berhasil upload';
         else if($this->uri->segment(3) == '%3Cp%3EYou%20did%20not%20select%20a%20file%20to%20upload.%3C')
            $data['error'] = 'Anda Belum Memilih Berkas Yang Hendak Diupload';
        else if($this->uri->segment(3) == 'simpan_sementara_berhasil')
            $data['error'] = "Simpan Sementara Berhasil";
		else
			$data['error'] = '';
        
        
        
		$cek = $this->Upload_model->cek_sidang($nim)->num_rows();

		if($cek > 0)
		{
         $data['mahasiswa'] = $this->Semhas_model->get_statusnya($nim)->result();
        $data['berkas'] = $this->Semhas_model->get_berkas_penguji($nim)->result();
    
		$this->load->view('templates/mahasiswa/upload_berkas_validasi',$data);
		}
		else
		{
		redirect('mahasiswa/index/belum_bisa_validasi');
		}
	}
    
    function berkas_validasi_penguji()
    {
        $nim = $_SESSION['username'];
        $tgl = date('Y-m-d');
        
        $jenis_berkas = $this->input->post('jenis_berkas');
        $status_upload = "";
        
    
        
        //PROSES MENGUBAH NAMA FILE
        $mahasiswa_detail = $this->db->where('nim', $_SESSION['username'])
            ->get('mahasiswa')
            ->row();
        
        $nama = $mahasiswa_detail->nama;
        
        $nama_proses = str_replace(" ","",$nama);
        
        if($jenis_berkas == 'cd')
        {
             $new_name = 'CdSkripsi_'. $nim.'_'. $nama_proses;
            
            $cek = $this->db->where('nim', $nim)
                            ->where('cd !=','')
                            ->get('berkas_validasi_penguji')
                            ->row();
                    
        if(count($cek))
        {
        //PROSES MEN-DELETE BERKAS SIMPAN LAMA JIKA ADA BERKAS BARU YANG DIUPLOAD
            $this->load->helper("file");
            $path = PUBPATH.'berkas_mahasiswa/'. $cek->cd;
            
                if(!unlink($path))
                {
                   log_message('debug', $result['error']);
                        $errors = $result['error'];
                        var_dump($errors);die;
                }
        }
            
        }
        else if($jenis_berkas == 'kode')
        {
             $new_name = 'KodeAplikasi_'. $nim.'_'. $nama_proses;
            
            $cek = $this->db->where('nim', $nim)
                            ->where('kode !=', '')
                            ->get('berkas_validasi_penguji')
                            ->row();
                    
        if(count($cek))
        {
        //PROSES MEN-DELETE BERKAS SIMPAN LAMA JIKA ADA BERKAS BARU YANG DIUPLOAD
            $this->load->helper("file");
            $path = PUBPATH.'berkas_mahasiswa/'. $cek->kode;
            
                if(!unlink($path))
                {
                   log_message('debug', $result['error']);
                        $errors = $result['error'];
                        var_dump($errors);die;
                }
        }
        }
        else if($jenis_berkas == 'jurnal')
        {
             $new_name = 'Jurnal_'. $nim.'_'. $nama_proses;
            
            $cek = $this->db->where('nim', $nim)
                            ->where('jurnal !=', '')
                            ->get('berkas_validasi_penguji')
                            ->row();
                    
        if(count($cek))
        {
        //PROSES MEN-DELETE BERKAS SIMPAN LAMA JIKA ADA BERKAS BARU YANG DIUPLOAD
            $this->load->helper("file");
            $path = PUBPATH.'berkas_mahasiswa/'. $cek->jurnal;
            
                if(!unlink($path))
                {
                   log_message('debug', $result['error']);
                        $errors = $result['error'];
                        var_dump($errors);die;
                }
        }
        }
        else if($jenis_berkas == 'program')
        {
             $new_name = 'ProgramExe_'. $nim.'_'. $nama_proses;
            
            $cek = $this->db->where('nim', $nim)
                            ->where('program !=','')
                            ->get('berkas_validasi_penguji')
                            ->row();
                    
        if(count($cek))
        {
        //PROSES MEN-DELETE BERKAS SIMPAN LAMA JIKA ADA BERKAS BARU YANG DIUPLOAD
            $this->load->helper("file");
            $path = PUBPATH.'berkas_mahasiswa/'. $cek->program;
            
                if(!unlink($path))
                {
                   log_message('debug', $result['error']);
                        $errors = $result['error'];
                        var_dump($errors);die;
                }
        }
        }
       
        $config['file_name'] = $new_name;
        
		$config['upload_path']          = './berkas_mahasiswa/';
        $config['allowed_types']        = 'rar|zip';
        $config['max_size']             = 99900000000000000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $config['overwrite']            = FALSE;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('berkas'))
                {
                        $data['error'] = $this->upload->display_errors();
                        
                       // $this->load->view('templates/mahasiswa/uji_program', $error);
                        var_dump($data['error']);
                        
                        if($data['error'] == '<p>The filetype you are attempting to upload is not allowed.</p>')
                        {
                        	$error = 'ekstensi_file_anda_salah';
                        }
                        else
                        {
                            $error = $data['error'];
                        }
                    
                            redirect('mahasiswa/upload_berkas_validasi/'.$error);
                      
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                          foreach($data as $d)
                        {
                        	$nama_file = $d['file_name'];
                            $orig_file = $d['orig_name'];
                        }
                    
//                         if($jenis_berkas == 'cd')
//        {
//             $save = array(
//                'nim' => $nim,
//                 'cd' => $nama_file
//             );
//        }
//        else if($jenis_berkas == 'kode')
//        {
//              $save = array(
//                'nim' => $nim,
//                 'kode' => $nama_file
//             );
//        }
//        else if($jenis_berkas == 'jurnal')
//        {
//             $save = array(
//                'nim' => $nim,
//                 'jurnal' => $nama_file
//             );
//        }
//        else if($jenis_berkas == 'program')
//        {
//              $save = array(
//                'nim' => $nim,
//                 'cd' => $nama_file
//             );
//        }
                    
                     $save = array(
                        'nim' => $nim,
                        $jenis_berkas => $nama_file
                     );
                        
                        $cek = $this->db->where('nim', $nim)
                            ->get('berkas_validasi_penguji')
                            ->row();
                    
                        if(count($cek))
                        {
                            //UPDATE
                            $this->db->where('nim', $nim)->update('berkas_validasi_penguji', $save);
                        }
                        else
                        {
                            //INSERT
                            $this->Sempro_model->simpan_upload_validasi_penguji($save);
                        }
                    
                    redirect('Mahasiswa/upload_berkas_validasi/upload_berhasil');
                }
    }

	function validasi()
	{
		$data['form'] = 6;
		$nim = $_SESSION['username'];
        
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        
        if($this->uri->segment(3) == 'ekstensi_file_anda_salah')
			$data['error'] = "File yang diterima hanya berekstensi <b>RAR atau ZIP</b>";	
        else if($this->uri->segment(3) == 'upload_berhasil')
            $data['error'] = 'berhasil upload';
         else if($this->uri->segment(3) == '%3Cp%3EYou%20did%20not%20select%20a%20file%20to%20upload.%3C')
            $data['error'] = 'Anda Belum Memilih Berkas Yang Hendak Diupload';
        else if($this->uri->segment(3) == 'simpan_sementara_berhasil')
            $data['error'] = "Simpan Sementara Berhasil";
		else
			$data['error'] = '';
        
        $data['berkas'] = $this->Upload_model->dapat_berkas($nim,'validasi_aplikasi','submit')->result();
        $data['sementara'] = $this->Upload_model->dapat_berkas($nim,'validasi_aplikasi','simpan_sementara')->result();
        
		$cek = $this->Upload_model->cek_sidang($nim)->num_rows();

		if($cek > 0)
		{
         $data['mahasiswa'] = $this->Semhas_model->get_statusnya($nim)->result();
		$this->load->view('templates/mahasiswa/validasi_aplikasi',$data);
		}
		else
		{
		redirect('mahasiswa/index/belum_bisa_validasi');
		}
	}

	function form_persetujuan_penggandaan()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 6;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

		$query = "SELECT a.nama,a.nim,a.judul_skripsi,b.nama_PS FROM skripsi a, program_studi b where a.kode_PS = b.id_PS AND a.nim = '$nim'";

		$data['data'] = $this->db->query($query)->result();

        $data['pembimbing'] = $this->Semhas_model->get_ttd_dopim($nim)->result();
        $data['pembanding'] = $this->Semhas_model->get_ttd_dopem($nim)->result();
        
		$this->load->view('templates/mahasiswa/form_persetujuan_penggandaan',$data);
	}
    
    function sk_lulus()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 6;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();

		$query = "SELECT a.nama,a.nim,a.judul_skripsi,b.nama_PS,c.tanggal_sidang FROM skripsi a, program_studi b, skripsi_nim c where a.kode_PS = b.id_PS AND a.nim = '$nim' AND a.nim = c.nim";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/sk_lulus',$data);
	}

	function validasi_berkas_penggandaan()
	{
		$nim = $_SESSION['username'];
		$data['form'] = 6;
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();

		$this->load->view('templates/mahasiswa/validasi_berkas_penggandaan', $data);
	}

	function form_jurnal()
	{
		$this->load->view('templates/form_jurnal');
	}
    
    function pendaftaran_wisuda()
	{
		$this->load->view('templates/pendaftaran_wisuda');
	}
    
    function riwayat_bimbingan_filter($jenis_seminar)
    {
        $judul = $this->input->post('judul');
        $dosen = $this->input->post('dosen');
        
        $sess_data = [
						'judul' => $judul,
                        'dosen' => $dosen
						];

					$this->session->set_userdata($sess_data);
        
        redirect('mahasiswa/riwayat_bimbingan/'. $jenis_seminar);
    }
    
    function riwayat_bimbingan($jenis_seminar, $pesan = null, $page = null)
    {
        switch($jenis_seminar)
        {
            case 'sempro' :  $data['form'] = '3'; break;
            case 'semhas' :  $data['form'] = '2'; break;
            case 'sidang' :  $data['form'] = '5'; break;
            
        }
        
        $nim = $_SESSION['username'];
        $data['jenis_seminar'] = $jenis_seminar;
        
        $pengajuan = $this->db->where('nim',$nim)
                        ->where('status_kelayakan', 'diterima')
                        ->get('pengajuan_judul')
                        ->row();
        
        $data['id_pengajuan'] = $pengajuan->id_pengajuan;
        $data['judul'] = $pengajuan->judul;
        $data['hasil_uji_kelayakan'] = $pengajuan->hasil_uji_kelayakan;
        
        //PAGINATION
        $this->load->database();
        $this->load->library('pagination');
        
        $halaman = 30;
        $off = $page;  
        
        $data['data'] = $this->Sempro_model->get_lembar_kendali($jenis_seminar,$page,$off)->result();
        $data['jumlah'] = $this->Sempro_model->get_lembar_kendali_count($jenis_seminar)->num_rows();
        
        $config['base_url'] = base_url().'Mahasiswa/riwayat_bimbingan';
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
        
        $data['judul'] = $this->Sempro_model->get_judul_by_nim($nim)->result();
        
        $this->load->view('templates/mahasiswa/riwayat_bimbingan', $data);
    }
    
    function edit_riwayat_bimbingan($id, $jenis_seminar)
    {
         switch($jenis_seminar)
        {
            case 'sempro' :  $data['form'] = '3'; break;
            case 'semhas' :  $data['form'] = '4'; break;
            case 'sidang' :  $data['form'] = '5'; break;   
        }
        
        $data['jenis_seminar'] = $jenis_seminar;
        
        $data['data'] = $this->Sempro_model->get_data_riwayat_bimbingan($id)->result();
        
        $this->load->view('templates/mahasiswa/tambah_riwayat_bimbingan', $data);
    }
    
    function proses_tambah_riwayat_bimbingan($id_pengajuan, $jenis_seminar)
    {
        $tgl_penyerahan = $this->input->post('tgl_penyerahan');
        $tgl_selesai_diperiksa = $this->input->post('tgl_selesai_diperiksa');
        $tgl_terima_kembali = $this->input->post('tgl_terima_kembali');
        $catatan = $this->input->post('catatan');
        $pembimbing = $this->input->post('pembimbing');
        $nim = $_SESSION['username'];
        
        $data = array(
            'nim' => $nim,
            'id_pengajuan' => $id_pengajuan,
            'tgl_penyerahan' => $tgl_penyerahan,
            'tgl_selesai_diperiksa' => $tgl_selesai_diperiksa,
            'tgl_terima_kembali' => $tgl_terima_kembali,
            'catatan' => $catatan,
            'pembimbing' => $pembimbing,
            'jenis_seminar' => $jenis_seminar
        );
        
        $this->Sempro_model->save_riwayat_bimbingan($data);
        
        redirect('mahasiswa/riwayat_bimbingan/'. $jenis_seminar.'/berhasil_menambahkan_riwayat_bimbingan');
    }
    
    function update_riwayat_bimbingan($id, $jenis_seminar)
    {
        $tgl_penyerahan = $this->input->post('tgl_penyerahan');
        $tgl_selesai_diperiksa = $this->input->post('tgl_selesai_diperiksa');
        $tgl_terima_kembali = $this->input->post('tgl_terima_kembali');
        $catatan = $this->input->post('catatan');
        $pembimbing = $this->input->post('pembimbing');
        $nim = $_SESSION['username'];
        
        $data = array(
            'tgl_penyerahan' => $tgl_penyerahan,
            'tgl_selesai_diperiksa' => $tgl_selesai_diperiksa,
            'tgl_terima_kembali' => $tgl_terima_kembali,
            'catatan' => $catatan,
            'pembimbing' => $pembimbing
        );
        
        $this->db->where('id', $id)->update('lembar_kendali_bimbingan', $data);
        
        redirect('mahasiswa/riwayat_bimbingan/'. $jenis_seminar.'/update_success');
    }
    
    function delete_riwayat_bimbingan($id, $jenis_seminar)
    {
        $this->db->where('id', $id)->delete('lembar_kendali_bimbingan');
        
        redirect('mahasiswa/riwayat_bimbingan/'. $jenis_seminar. '/delete_success');
    }
    
    function cetak_lembar_kendali_bimbingan($jenis_seminar)
    {
     
		$nim = $_SESSION['username'];
		 switch($jenis_seminar)
        {
            case 'sempro' :  $data['form'] = '3'; $data['seminars'] = 'Seminar Proposal'; break;
            case 'semhas' :  $data['form'] = '2'; $data['seminars'] = 'Seminar Hasil'; break;
            case 'sidang' :  $data['form'] = '5'; $data['seminars'] = 'Sidang Meja Hijau'; break;
            
        }

        if($_SESSION['dosen'] == 'pembimbing1' OR $_SESSION['dosen'] == 'pembimbing2') {
		$query = "SELECT a.pembimbing1,b.Nama_dosen as dopim1,b.NIP as nip1, a.pembimbing2,
c.Nama_dosen as dopim2 , c.NIP as nip2
FROM (pembimbing a join dosen b)join dosen c 
WHERE (a.pembimbing1 = b.Kode_dosen) AND (a.pembimbing2 = c.Kode_dosen) AND (a.nim = '$nim')";
        }
        else {
            $query = "SELECT a.pembanding1,b.Nama_dosen as dopim1,b.NIP as nip1, a.pembanding2,
c.Nama_dosen as dopim2 , c.NIP as nip2
FROM (pembanding a join dosen b)join dosen c 
WHERE (a.pambanding1 = b.Kode_dosen) AND (a.pembanding2 = c.Kode_dosen) AND (a.nim = '$nim')";
        }

		$data['dosen'] = $this->db->query($query)->result();
		$data['data'] = $this->Upload_model->get_data_pengajuan($nim)->result();
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
        $data['riwayat'] = $this->Sempro_model->get_riwayat($jenis_seminar)->result();
        $data['izin'] = $this->Upload_model->get_izinnya($jenis_seminar, $nim, $_SESSION['dosen'])->result();
        
        $data['jenis_seminar'] = $jenis_seminar;
		$this->load->view('templates/mahasiswa/form_kendali_seminar', $data);
    }
    
    function catatan_perbaikan()
    {
        $nim = $_SESSION['username'];
        $data['form'] = '13';
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        $data['sempro'] = $this->Skripsi_model->get_penilaian_seminar($nim, 'sempro')->result();
        $data['semhas'] = $this->Skripsi_model->get_penilaian_seminar($nim, 'semhas')->result();
        $data['sidang'] = $this->Skripsi_model->get_penilaian_seminar($nim, 'sidang')->result();
//        $data['catatan_perbaikan_sidang'] = $this->Skripsi_model->get_perbaikan_sidang($nim,'group')->result();
//        
//        var_dump($data['catatan_perbaikan_sidang']);die;
        
        $this->load->view('templates/mahasiswa/catatan_perbaikan', $data);
    }
    
    function catatan_semhas($nim, $id_pengajuan, $id_jadwal_seminar)
    {
        $data['form'] = '13';
        
        $data['data'] = $this->Sempro_model->get_catatan_semhas($nim, $id_pengajuan, $id_jadwal_seminar)->result();
        
        $this->load->view('templates/mahasiswa/catatan_perbaikan_semhas', $data);
    }
    
    function penilaian_sempro($nim, $id_pengajuan, $id_jadwal_seminar)
    {
        $data['form'] = '13';
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        $query = "SELECT a.nama,b.nim,b.calon_dopim1,c.Nama_dosen as pembimbing1,
b.calon_dopim2,d.Nama_dosen as pembimbing2,c.NIP as NIP1,d.NIP
as NIP2,b.ilmu1,b.ilmu2,b.judul FROM (((pengajuan_judul b join mahasiswa a)
join dosen c)join dosen d) WHERE b.nim = a.nim AND b.calon_dopim1 =
c.Kode_dosen AND b.calon_dopim2 = d.Kode_dosen AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1
";

		$data['data'] = $this->db->query($query)->result();
        

		$data['tanggal'] = $this->Jadwal_model->tampil_jadwal($id_jadwal_seminar)->result();
            
        $judul = $this->db->where('id_pengajuan', $id_pengajuan)
            ->get('pengajuan_judul')
            ->row();
        
        $data['judul_diseminarkan'] = $judul->judul;
            
           
           
        $data['penilaian_sempro'] = $this->Sempro_model->gets_penilaian_sempro($nim, $id_jadwal_seminar, $id_pengajuan)->result();
          
        $this->load->view('templates/mahasiswa/penilaian_sempro', $data);
    }
    
    function penilaian_semhas($nim, $id_pengajuan, $id_jadwal_seminar)
    {
        $data['form'] = '13';
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
       $query = "SELECT a.nama,b.nim,b.judul FROM (pengajuan_judul b join mahasiswa a) WHERE b.nim = a.nim AND b.nim = '$nim' AND b.status_kelayakan='diterima' ORDER BY b.nim DESC LIMIT 1";

        $data['data'] = $this->db->query($query)->result();
            $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        $data['penilaian_semhas'] = $this->Semhas_model->get_penilaian_semhas_mahasiswa($nim, $id_jadwal_seminar, $id_pengajuan, 'all')->result();
        

		$data['tanggal'] = $this->Jadwal_model->tampil_jadwal($id_jadwal_seminar)->result();
            
        $judul = $this->db->where('id_pengajuan', $id_pengajuan)
            ->get('pengajuan_judul')
            ->row();
        
        $data['judul_diseminarkan'] = $judul->judul;
          
        $this->load->view('templates/mahasiswa/penilaian_semhas', $data);
    }
    
    function form_validasi_berkas_semhas($id_validasi_semhas)
	{

		$nim = $_SESSION['username'];
		$data['form'] = 4;
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        
        $query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.fotokopi_krs, b.fotokopi_kelunasan_spp, b.lembar_kendali_prasemhas, b.fotokopi_sk_dopim FROM validasi_semhas b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim') AND (b.id = '$id_validasi_semhas')";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/form_validasi_berkas', $data);
	}
    
     function form_validasi_berkas_sidang($id_validasi_sidang)
	{

		$nim = $_SESSION['username'];
		$data['form'] = 5;
         
         $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
        
        $query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.buku_bimbingan, b.kartu_kemajuan_mahasiswa, b.lembar_kendali_prasidang, b.draf_jurnal, b.fotokopi_krs, b.fotokopi_slip_spp, b.sk_dopim FROM validasi_sidang b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim') AND (b.id = '$id_validasi_sidang')";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/form_validasi_berkas', $data);
	}
    
     function form_validasi_berkas_penggandaan($id_validasi_penggandaan)
	{

		$nim = $_SESSION['username'];
		$data['form'] = 6;
         $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
		$data['nama'] = $this->Upload_model->get_nama($nim)->result();
        
        $query = "SELECT a.judul, a.tgl_pengajuan,b.nim, b.id, b.id_pengajuan_judul, b.cd_kode_jurnal, b.form_persetujuan, b.fotokopi_bebas FROM validasi_penggandaan b, pengajuan_judul a WHERE (b.id_pengajuan_judul = a.id_pengajuan) AND (b.nim = '$nim') AND (b.id = '$id_validasi_penggandaan')";

		$data['data'] = $this->db->query($query)->result();

		$this->load->view('templates/mahasiswa/form_validasi_berkas', $data);
	}
    
      function catatan_perbaikan_sidang($nim, $id_pengajuan, $id_seminar, $status_kelayakan)
        {
            $data['form'] = '13';
          $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
            
          if($status_kelayakan == 'layak') {
            $data['data'] = $this->Skripsi_model->get_perbaikan_sidang($nim, $id_pengajuan, $id_seminar)->result();
          }
          else
          {
              $data['data'] = $this->Sempro_model->get_catatan_semhas($nim, $id_pengajuan, $id_seminar)->result();
          }
        
            $this->load->view('templates/mahasiswa/catatan_perbaikan_sidang', $data);
        }
    
    function kirim_aplikasi()
	{
		$data['form'] = 14;
		$nim = $_SESSION['username'];
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        
        if($this->uri->segment(3) == 'ekstensi_file_anda_salah')
			$data['error'] = "File yang diterima hanya berekstensi <b>RAR atau ZIP</b>";	
        else if($this->uri->segment(3) == 'upload_berhasil')
            $data['error'] = 'berhasil upload';
         else if($this->uri->segment(3) == '%3Cp%3EYou%20did%20not%20select%20a%20file%20to%20upload.%3C')
            $data['error'] = 'Anda Belum Memilih Berkas Yang Hendak Diupload';
        else if($this->uri->segment(3) == 'simpan_sementara_berhasil')
            $data['error'] = "Simpan Sementara Berhasil";
		else
			$data['error'] = '';
        
       
        
		$cek = $this->Upload_model->cek_sidang($nim)->num_rows();

		if($cek > 0)
		{
         $data['data'] = $this->Semhas_model->get_kirim_aplikasi($nim)->result();
            
         $data['mahasiswa'] = $this->Semhas_model->get_statusnya($nim)->result();
		$this->load->view('templates/mahasiswa/kirim_aplikasi',$data);
		}
		else
		{
		redirect('mahasiswa/index/belum_bisa_kirim_aplikasi');
		}
	}
    
    function proses_kirim_aplikasi()
    {
        $dosen = $this->input->post('dosen');
        $tgl = date('Y-m-d');
        
        
        //konfigurasi upload
		$config['upload_path'] = './aplikasi_mahasiswa/';
        $config['allowed_types'] = 'zip|rar';
        $config['max_size']      = 9999990000000;
        $config['max_width']     = 4000;
        $config['max_height']    = 6000;
        $config['overwrite']  = FALSE;

        var_dump($config['upload_path']);

                $this->load->library('upload', $config);


                if ( ! $this->upload->do_upload('berkas'))
                {
                        $error = $this->upload->display_errors();


						if($error == "<p>You did not select a file to upload.</p>")
						{
							$error_convert = "belum_memilih_file";
						}
						else if($error == "<p>The image you are attempting to upload doesn't fit into the allowed dimensions.</p>")
						{
							$error_convert = "ukuran_foto_berlebih";
						}
						else if($error == "<p>The filetype you are attempting to upload is not allowed.</p>")
						{
							$error_convert = "tipe_file_notallowed";
						}
                        else if($error == "<p>The file you are attempting to upload is larger than the permitted size.</p>")
                        {
                            $error_convert = "file_oversized";
                        }
						else
						{
							$error_convert = $error;
						}
                        redirect('mahasiswa/kirim_aplikasi/'.$error_convert);
                }

                else
                {
                        $data_gambar = array('upload_data' => $this->upload->data());

                        foreach($data_gambar as $dg)
                        {
                        	$nama_file = $dg['file_name'];
                            $orig_file = $dg['orig_name'];
                        }
                    
                       if($dosen == 'all')
                       {
                           $dosen = array("pembimbing1","pembimbing2","pembanding1","pembanding2");
                           
                           $index = 0;
                           
                           while($index < 4) {
                            $data = array(
                        'nim' => $_SESSION['username'],
                        'nama_file' => $nama_file,
                        'orig_name' => $orig_file,
                        'tgl_upload' => $tgl,
                        'dosen' => $dosen[$index]
                            
                    );
                           
                           
                    
                    $this->Semhas_model->simpan_aplikasi($data);
                            $index++;   
                           }
                       }
                    
                    else {
                    $data = array(
                        'nim' => $_SESSION['username'],
                        'nama_file' => $nama_file,
                        'orig_name' => $orig_file,
                        'tgl_upload' => $tgl,
                        'dosen' => $dosen
                    );
                    
                    $this->Semhas_model->simpan_aplikasi($data);
                    }
                    
                     redirect('mahasiswa/kirim_aplikasi/berhasil_kirim_aplikasi');   
                }
    }
    
    function pengumuman()
    {
        $data['form'] = '15';
        
        $data['data'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'])->result();
        $data['jlh_pengumuman'] = $this->Skripsi_model->get_pengumuman_seminar($_SESSION['username'], 'belum')->num_rows();
        
        $array = array(
            'status_dilihat' => 'sudah'
        );
        
        $this->db->where('nim', $_SESSION['username'])->update('mahasiswa_sidang', $array);
        
        $this->load->view('templates/mahasiswa/pengumuman', $data);
    }
}