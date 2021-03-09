<?php
	
class Akun_Model extends CI_Model
{
	public $table='account';

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
                        'keychain' => $user->id
						];

					$this->session->set_userdata($sess_data);
					return true;
				}

			return false;
    }

    public function verif_user($username)
    {
        $this->db->select('*')->from('account')->where('username',$username);
        return $this->db->get();
    }
    
    public function verif_akun($username,$password)
    {
        $this->db->select('*')->from('account')->where('username',$username)->where('password',$password);
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










