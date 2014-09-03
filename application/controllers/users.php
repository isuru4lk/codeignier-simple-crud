<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('is_logged_in')!= true)
		{
			$this->load->view('user_register');
		}
		else
		{
			redirect('users/dashboard');
		}
	}

	public function register()
	{
		//$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == false)
		{
			$this->load->view("user_register");
		}
		else
		{
			//$this->load->model('user');
			if($this->user->create())
			{
				$this->load->view('register_successfull');
			}
			else
			{
				$this->load->view("user_register");
			}
		}
	}

	public function update()
	{
		if($this->session->userdata('is_logged_in')!= true)
		{
			redirect('users/login');
		}
		else
		{

			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('password','Password','required');

			if($this->form_validation->run())
			{
				$update = $this->user->update();

				if($update)
				{
					$data['msg'] = "User Updated";
				}
				else
				{
					$data['msg'] = "Database Error";
				}
			}
			else
			{

			}

			$data['user'] = $this->user->get_user();
			$this->load->view('user_update',$data);
			
		}

	}

	public function login()
	{
		if($this->session->userdata('is_logged_in')!= true)
		{
			$this->load->view('user_login');
		}
		else
		{
			redirect('users/dashboard');
		}
		
		//$this->load->library('encrypt'); 
		//echo $this->encrypt->sha1('Some string'); 

	}

	public function validate_login()
	{
		$this->load->model('user');

		if($this->user->validate())
		{
			$data = array (
				'username'=>$this->input->post('username'),
				'is_logged_in'=> true
				);

			$this->session->set_userdata($data);
			redirect('users/dashboard');


		}
		else
		{
			$this->login();
		}
	}

	public function logout()
	{
		$data = array (
				'username'=>'',
				'is_logged_in'=> false
				);

		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		$this->login();
	}

	public function dashboard()
	{
		if($this->session->userdata('is_logged_in')!= true)
		{
			redirect('users/login');
		}
		else
		{
			$data['username'] = $this->session->userdata('username');
			$this->load->model('advertisement');
			if ($query = $this->advertisement->by_user()) 
			{
				$data['records'] = $query;
			}
			$this->load->view('user_dashboard',$data);
			
		}
	}
}
