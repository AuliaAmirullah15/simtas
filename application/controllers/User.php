<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller {

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
		$this->load->model('Akun_Model','',TRUE);
        $this->load->model('Folder_Model','', TRUE);
	}
        
        

		function index($page = null)
		{
            $halaman = 10;
            $data['bar'] = 0;

			$off = $page;
            
            $data['arsip'] = "Semua File";
            
            $queri = "SELECT a.id, a.nama_folder, COUNT(b.id) AS jumlah_file FROM (folder a join file b) WHERE b.folder = a.id ORDER BY a.nama_folder";
            
//            $data['direktori'] = $this->db->query($queri)->result();
           
            //var_dump($data['direktori']);die;
            
            
            
            if(isset($_SESSION['username'])) {
            $data['all'] = $this->Folder_Model->count_all_files_all()->num_rows();
             $data['direktori'] = $this->Folder_Model->get_folder_jumlah_all()->result();
            $data['file'] = $this->Folder_Model->get_files($halaman, $off)->result();
            $data['jumlah'] = $this->Folder_Model->get_files_count()->num_rows();
            }
            else
            {
            $data['all'] = $this->Folder_Model->count_all_files()->num_rows();
            $data['direktori'] = $this->Folder_Model->get_folder_jumlah()->result();
            $data['file'] = $this->Folder_Model->get_files_public($halaman, $off)->result();
            $data['jumlah'] = $this->Folder_Model->get_files_public_count()->num_rows();
            }
            //var_dump($data['jumlah']);die;
            
                $config['base_url'] = base_url().'User/index';
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
              //Setting Tampilan 
            $data['title'] = 'Repositori';
            $this->load->view('content/user/index', $data);
        }
        
        function download_file($id_direktori, $id_file)
        {
            //get nama_direktori
            $direktori = $this->Folder_Model->get_folders_by_id($id_direktori)->result();
            
            foreach($direktori as $dir)
            {
                $nama_direktori = $dir->nama_folder;
            }
            
            //get nama_file
            $file = $this->Folder_Model->get_files_by_id($id_file)->result();
            
            foreach($file as $dir)
            {
                $nama_file = $dir->nama_file;
                $jumlah_download = $dir->jumlah_download;
            }
            
            var_dump($nama_direktori, $nama_file,$jumlah_download);
            
            $jumlah_download += 1;
                
                $data = array(
                    'jumlah_download' => $jumlah_download
                );
                
                $update = $this->db->where('id',$id_file)->update('file',$data);
            
              //load download helper
            $this->load->helper('download');
        
            //download file from directory
            force_download('sharing_folder/'.$nama_direktori.'/'.$nama_file, NULL);
            
        }
        
        function populer($page = null)
        {
            $halaman = 10;
            $data['bar'] = 0;


            
			$off = $page;
            $data['arsip'] = 'populer';
            
            
            
             if(isset($_SESSION['username']))
            {
            $data['all'] = $this->Folder_Model->count_all_files_all()->num_rows();
            $data['direktori'] = $this->Folder_Model->get_folder_jumlah_all()->result();
            $data['file'] = $this->Folder_Model->get_files_populer($halaman, $off)->result();
            $data['jumlah'] = $this->Folder_Model->get_files_populer_count()->num_rows();
            }
            else
            {
            $data['all'] = $this->Folder_Model->count_all_files()->num_rows();
            $data['direktori'] = $this->Folder_Model->get_folder_jumlah()->result();
            $data['file'] = $this->Folder_Model->get_files_public_populer($halaman, $off)->result();
            $data['jumlah'] = $this->Folder_Model->get_files_public_populer_count()->num_rows();
            }
            //var_dump($data['jumlah']);die;
            
                $config['base_url'] = base_url().'User/populer';
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
              //Setting Tampilan 
            $data['title'] = 'Repositori';
            $this->load->view('content/user/index', $data);
            
            
        }
        
        function arsip_file($folder,$nama_folder,$page = null)
		{
            $halaman = 10;
            $data['bar'] = 0;
            
           

			$off = $page;
            $data['arsip'] = $nama_folder;
            
            $queri = "SELECT a.id, a.nama_folder, COUNT(b.id) AS jumlah_file FROM (folder a join file b) WHERE b.folder = a.id ORDER BY a.nama_folder";
            
//            $data['direktori'] = $this->Folder_Model->get_folders()->result();
            
            if(isset($_SESSION['username']))
            {
            $data['all'] = $this->Folder_Model->count_all_files_all()->num_rows();
             $data['direktori'] = $this->Folder_Model->get_folder_jumlah_all()->result();
            $data['file'] = $this->Folder_Model->get_files_id($folder,$halaman, $off)->result();
            $data['jumlah'] = $this->Folder_Model->get_files_id_count($folder)->num_rows();
            }
            else
            {
            $data['all'] = $this->Folder_Model->count_all_files()->num_rows();
            $data['direktori'] = $this->Folder_Model->get_folder_jumlah()->result();
            $data['file'] = $this->Folder_Model->get_files_public_id($folder,$halaman, $off)->result();
            $data['jumlah'] = $this->Folder_Model->get_files_public_id_count($folder)->num_rows();
            }
            //var_dump($data['jumlah']);die;
            
                $config['base_url'] = base_url().'User/arsip_file';
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
              //Setting Tampilan 
            $data['title'] = 'Repositori';
            $this->load->view('content/user/index', $data);
        }
        
        function search($page = null)
        {
            $key = $this->input->post('cari');
            
            $halaman = 10;
            $data['bar'] = 0;
            
              $queri = "SELECT a.id, a.nama_folder, COUNT(b.id) AS jumlah_file FROM (folder a join file b) WHERE b.folder = a.id ORDER BY a.nama_folder";
            
//            $data['direktori'] = $this->Folder_Model->get_folders()->result();
            

			$off = $page;
            
            $data['arsip'] = "Hasil Pencarian";
            
            if(isset($_SESSION['username']))
            {
            $data['all'] = $this->Folder_Model->count_all_files_all()->num_rows();
             $data['direktori'] = $this->Folder_Model->get_folder_jumlah_all()->result();
            $data['file'] = $this->Folder_Model->get_files_cari($key,$halaman,$off)->result();
            $data['jumlah'] = $this->Folder_Model->get_files_cari_count($key)->num_rows();
            }
            else
            {
            $data['all'] = $this->Folder_Model->count_all_files()->num_rows();
             $data['direktori'] = $this->Folder_Model->get_folder_jumlah()->result();
            $data['file'] = $this->Folder_Model->get_files_cari_public($key,$halaman, $off)->result();
            $data['jumlah'] = $this->Folder_Model->get_files_cari_public_count($key)->num_rows();
            }
            
            $config['base_url'] = base_url().'User/search';
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
            
              //Setting Tampilan 
            $data['title'] = 'Repositori';
            $this->load->view('content/user/index', $data);
            
            
        }
}