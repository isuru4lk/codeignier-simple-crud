<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	public function create()
	{
		$data = array (
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password'))
			);
			
		$insert = $this->db->insert('users',$data);
		return $insert;
	}

	public function validate()
	{ 
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));

		$query = $this->db->get('users');

		if($query->num_rows() == 1)
		{
			return true;
		}
	}

	public function get_user()
	{
		$username = $this->session->userdata('username');
		$this->db->where('username',$username);
		$query =  $this->db->get('users');
		return $query->row(0);
	}

	public function update()
	{
		$data = array (
			'name' => $this->input->post('name'),
			'password' => md5($this->input->post('password'))
			);

		$username = $this->session->userdata('username');
		$this->db->where('username',$username);
		return $this->db->update('users',$data);
	}
}