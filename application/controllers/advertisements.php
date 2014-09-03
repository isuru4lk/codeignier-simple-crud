<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertisements extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('advertisement');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();

		if($query = $this->advertisement->get_records())
		{
			$data['records'] = $query;
		}

		$this->load->view('view_advertisements',$data);
	}

	public function add()
	{
		if($this->session->userdata('is_logged_in')!= true)
		{
			redirect('users/login');
		}
		else
		{
			$data = array(); 
			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('desc','Description','required');
			
			if (empty($_FILES['main_img']['name']))
			{
				$this->form_validation->set_rules('main_img','Main Image','required');
			}

			if($this->form_validation->run())
			{
				if($this->advertisement->add())
				{
					$data['msg'] = "Advertisement Added <a href='../advertisements'>View All</a>";
				}
				else
				{
					$data['msg'] = "Error Adding data";
				}
			}

			$this->load->view('add_advertisement',$data);
		}
	}

	public function view()
	{
		$id = $this->uri->segment(3);

		if(empty($id))
		{
			show_404();
		}
		else
		{
			if($data['advertisement'] = $this->advertisement->view($id))
			{
				$this->load->view('single_advertisemet',$data);
			}
			else
			{
				show_404();
			}
			
		}
	}

	public function remove()
	{
		$id = $this->uri->segment(3);

		if(empty($id))
		{
			show_404();
		}
		else
		{
			$this->advertisement->remove($id);
			redirect('users/dashboard');			
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
			$id = $this->uri->segment(3);

			if(empty($id))
			{
				show_404();
			}
			else
			{

				$this->form_validation->set_rules('title','Title','required');
				$this->form_validation->set_rules('desc','Description','required');

				if($this->form_validation->run())
				{
					$update = $this->advertisement->update($id);

					if($update)
					{
						$data['msg'] = "Advertisement Updated";
					}
					else
					{
						$data['msg'] = "Database Error";
					}
				}
				else
				{

				}

				$data['advertisement'] = $this->advertisement->view($id);
				$this->load->view('advertisement_update',$data);
			}
		}
	}
}