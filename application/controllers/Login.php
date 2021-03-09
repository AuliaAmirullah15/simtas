<?php

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('session');
		$this->load->helper(['url','form']);
		$this->load->model('Login_model','',true);
	}

function index()
	{
		if(!$_POST)
		{

			$input = (object) $this->Login_model->getDefaultValues();

		}
		else
		{

			$input = (object) $this->input->post();
		}

		if(!$this->login->validate()) {
			$this->load->view(('templates/login'), compact('input'));
			return;
		}

		if(!$this->login->run($input)) {
			redirect('login');
		}
		else
		{
			redirect('admin');
		}
	}

	function logout()
	{
		$this->login->logout();
		redirect('tamu');
	} 
}