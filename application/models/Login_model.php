<?php
	
class Login_model extends CI_Model
{
	public $table='user';

	public function getDefaultValues()
	{
		return[
			'username' => '',
			'password' => ''
		];
	}

	public function getValidationRules()
	{
		return [
		[
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required'
		],
		[
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required'
		],
		];

	}

	public function validate()
	{
		$this->load->library('form_validation');
		$rules = $this->getValidationRules();
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_error_delimiters('<span class="form-error">', '</span>');
		return $this->form_validation->run();
	}

	public function run($input)
	{
        
        $username = $input->username;
        $psswd = $input->password;
        
        $pw = md5($psswd);
        //cek sudah ada di database belum
        $tes = $this->db->where('username',$username)
                        ->get('user')
                        ->num_rows();
        
        if($tes > 0)
        {
            
            $cek = $this->db->where('username',$username)
                        ->where('password', $pw)
                        ->get('user')
                        ->row();
    
            if(count($cek)) {
					$sess_data = [
						'login' =>true,
						'username' => $cek->username,
						'level' => $cek->level,
                        'prodi' => $cek->prodi,
						'password' => $cek->password,
                        'batas' => 5,
                        'def' => 5,
                        'pengajuan' => 'belum',
                        'judul' => 'all',
                        'dosen' => 'all',
						];

					$this->session->set_userdata($sess_data);
					return true; 
                
        }
            return false;
        }
        
        
        
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
        $input->password = md5($input->password);

		$user = $this->db->where('username', $input->username)
						->where('password', $input->password)
						->get($this->table)
						->row();
        
				if(count($user)) {
					$sess_data = [
						'login' =>true,
						'username' => $user->username,
						'level' => $user->level,
						'password' => $user->password,
                        'batas' => 5,
                        'def' => 5
						];

					$this->session->set_userdata($sess_data);
					return true;
				}

			return false;
    }
    //var_dump(psswd);die;

    curl_setopt($curl, CURLOPT_URL, $url['khs']);
    $html = curl_exec($curl);

    preg_match_all('/\<option.+?\"(.+)\".+?\<\/option\>/', $html, $semester);

    $data = http_build_query(['semester' => $semester[1][count($semester[1]) - 2]]);
    
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    $html = curl_exec($curl);
      
     // var_dump($html);die;
    preg_match_all('/\<td.+width="10%".?(.+)?<\/td>/', $html, $matkul);
    preg_match_all('/\<td.+width="22%".?(.+)?<\/td>/', $html, $kom);
    
    curl_setopt($curl, CURLOPT_URL, $url['transkrip']);
      $html = curl_exec($curl);
      
     preg_match_all('/\<td.+width="206".?(.+)?<\/td>/', $html, $sks);
      
      //jumlah sks
     // var_dump($sks[1][1]);die;
        $string = $sks[1][1];
        $sks_lulus = str_replace(' ', '', $string);
        $sks_lulus = str_replace('<spanclass="style3style7">', '', $sks_lulus);
        $sks_lulus = str_replace('</span>', '', $sks_lulus);
//        var_dump($sks_lulus);die;
      
//      curl_setopt($curl, CURLOPT_URL, $url['profil']);
//      $html = curl_exec($curl);
//      
//      var_dump($html);die;
//       preg_match_all('/\<td>:.?(.+)?<\/td>/', $html, $biodata);
//      var_dump($biodata);die;
      
    if(session_status() == PHP_SESSION_NONE)
      session_start();
      //login[1] = Nama Capital Letter
      //login[2] = NIM
       //login[3] = Jurusan  
       
    //var_dump($login[2]);die;
    $input->password = md5($input->password);
    $login[1] = strtolower($login[1]);
    $login[1] = ucwords($login[1]);
            
            $user = $this->db->where('username', $input->username)
						->where('password', $input->password)
						->get($this->table)
						->num_rows();
            
           // var_dump($user);die;
            
        if($user == 0)
        {
            if($login[3] == 'Teknologi Informasi')
            {  $id_PS = 'TIF'; }
            else if($login[3] == 'Ilmu Komputer')
            {   $id_PS = 'ILK'; }
            
           // var_dump($id_PS);die();
           	$level = '3';
		    $status = 'pengajuan judul';

		$simpan = array(
			'nim' => $login[2],
			'nama' => $login[1],
			'id_PS' => $id_PS,
			'status' => $status,
            'sks' => $sks_lulus
			);
        
        $tes = array(
            'nim' => $login[2],
			'nama' => $login[1],
			'id_PS' => $id_PS,
            'sks' => $sks_lulus
        );
		$cek = $this->db->where('nim',$login[2])
                        ->get('mahasiswa')
                        ->num_rows();

//        var_dump($cek);die;
		if($cek == 0)
		{
		$saved = $this->db->insert('mahasiswa',$simpan);
		}
        else
        {
            $upd = $this->db->where('nim',$login[2])->update('mahasiswa',$tes);
        }
            
		$data = array(
			'username' => $username,
			'password' => $input->password,
			'level' => $level
			);

		$saved = $this->db->insert('user',$data);
        }
            
        else
        {
            if($login[3] == 'Teknologi Informasi')
            {  $id_PS = 'TIF'; }
            else if($login[3] == 'Ilmu Komputer')
            {   $id_PS = 'ILK'; }
            
           // var_dump($id_PS);die();
           	$level = '3';
		    $status = 'pengajuan judul';

		$simpan = array(
			'nim' => $login[2],
			'nama' => $login[1],
			'id_PS' => $id_PS,
			'status' => $status,
            'sks' => $sks_lulus
			);
        
        $tes = array(
            'nim' => $login[2],
			'nama' => $login[1],
			'id_PS' => $id_PS,
            'sks' => $sks_lulus
        );
		$cek = $this->db->where('nim',$login[2])
                        ->get('mahasiswa')
                        ->num_rows();

//        var_dump($cek);die;
		if($cek == 0)
		{
		$saved = $this->db->insert('mahasiswa',$simpan);
		}
        else
        {
            $upd = $this->db->where('nim',$login[2])->update('mahasiswa',$tes);
        }
            
//            $data = array(
//                'username' => $username,
//                'password' => $input->password
//            );
//            $update_datanya = $this->db->where('username',$username)->where('password',$input->password)->update('user',$data);
        }
            
        $user = $this->db->where('username', $input->username)
						->where('password', $input->password)
						->get($this->table)
						->row();

				if(count($user)) {
					$sess_data = [
						'login' =>true,
						'username' => $user->username,
						'level' => $user->level,
						'password' => $user->password,
                        'batas' => 5,
                        'def' => 5
						];

					$this->session->set_userdata($sess_data);
					return true;
				}
            
            return false;
        }
        
        else
        {
		$input->password = md5($input->password);

		$user = $this->db->where('username', $input->username)
						->where('password', $input->password)
						->get($this->table)
						->row();

				if(count($user)) {
					$sess_data = [
						'login' =>true,
						'username' => $user->username,
						'level' => $user->level,
						'password' => $user->password,
                        'batas' => 5,
                        'def' => 5
						];

					$this->session->set_userdata($sess_data);
					return true;
				}

			return false;
        }
	}

    public function verif_user($username)
    {
        $this->db->select('*')->from('user')->where('username',$username);
        return $this->db->get();
    }
    
    public function verif_akun($username,$password)
    {
        $this->db->select('*')->from('user')->where('username',$username)->where('password',$password);
        return $this->db->get();
    }
    
	public function logout()
	{
		$sess_data = ['login', 'username'];
		$this->session->unset_userdata($sess_data);
		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
	}
}










