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
		$input->password = md5($input->password);

		$user = $this->db->where('username', $input->username)
						->where('password', $input->password)
						->get($this->table)
						->row();

				if(count($user)) {
					$sess_data = [
						'login' =>true,
						'username' => $user->username,
						'level' => $user->level
						];

					$this->session->set_userdata($sess_data);
					return true;
				}

			return false;
	}

	public function logout()
	{
		$sess_data = ['login', 'username'];
		$this->session->unset_userdata($sess_data);
		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
	}
}










