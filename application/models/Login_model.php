<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		// kosongin dulu
	}

	public function get_pendaftar($username, $password){
		$this->db->select('*');
		$this->db->from('pendaftar');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));

		$query = $this->db->get();
		return $query->result();
	}

	public function get_admin($username, $password){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));

		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */