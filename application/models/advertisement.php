<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advertisement extends CI_Model {

	public function add()
	{
		//$upload_path = realpath(APPPATH . '../images');


		$config = array(
			'allowed_types'=>'jpg|jpeg|png|gif',
			'upload_path'=> './images/'
			);
		
		$this->load->library('upload',$config);
		$this->upload->do_upload('main_img');
		$main_img = $this->upload->data();

		if (!empty($_FILES['img2']['name']))
		{
			$this->upload->do_upload('img2');
			$img2 = $this->upload->data();
		}
		else
		{
			$img2['file_name'] = "0";
		}

		if (!empty($_FILES['img3']['name']))
		{
			$this->upload->do_upload('img2');
			$img3 = $this->upload->data();
		}
		else
		{
			$img3['file_name'] = "0";
		}

		$this->load->library('encrypt');
		$username = $this->session->userdata('username');
		$key = $this->encrypt->sha1($username.time());

		$data =  array(
			'title'=>$this->input->post('title'),
			'category'=>$this->input->post('category'),
			'description'=>$this->input->post('desc'),
			'date'=>date('Y-m-d'),
			'img1'=>$main_img['file_name'],
			'img2'=>$img2['file_name'],
			'img3'=>$img3['file_name'],
			'key'=>$key,
			'username'=>$username
			);

		$insert = $this->db->insert('advertisements',$data);
		return $insert;
	}

	public function get_records()
	{
		$this->db->order_by('id','desc');
		$query = $this->db->get('advertisements');
		return $query->result();

	}

	public function view($id)
	{
		$this->db->where('id',$id);
		$query =  $this->db->get('advertisements');
		return $query->row(0);
	}

	public function by_user()
	{
		$username = $this->session->userdata('username');
		$this->db->order_by('id','desc');
		$this->db->where('username',$username);
		$query = $this->db->get('advertisements');
		return $query->result();
	}

	public function remove($id)
	{
		$username = $this->session->userdata('username');
		$this->db->where('id',$id);
		$this->db->where('username',$username);
		$query = $this->db->delete('advertisements');

		// if($query)
		// {
		// 	return true;
		// }
		// else
		// {
		// 	return false;
		// }
		
	}

	public function update($id)
	{
		$username = $this->session->userdata('username');
		$data =  array(
			'title'=>$this->input->post('title'),
			'category'=>$this->input->post('category'),
			'description'=>$this->input->post('desc'),
			'date'=>date('Y-m-d')
			);

		$this->db->where('id',$id);
		$this->db->where('username',$username);
		return $this->db->update('advertisements',$data);
	}
}