<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_all_siswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('pendaftar', 'pendaftar.id_pendaftar = siswa.id_siswa');
		$this->db->order_by('id_siswa', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_newest_siswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->order_by('timecreated_siswa', 'asc');
		$this->db->limit(10);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_total_siswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_count_siswa_lulus()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('status','lulus');

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_count_siswa_tidak_lulus()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('status','tidak_lulus');

		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_siswa_lulus()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('status', 'lulus');
		$this->db->limit(25);
		$this->db->order_by('nama_siswa', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}


	// ============ Model Untuk User ===============
	public function get_siswa_by_pendaftar()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');
		// $query = $this->db->query("SELECT * FROM siswa WHERE id_siswa AND id_pendaftar='$id_pendaftar'");
		// return $query->result_array();
		$this->db->select('*');
		$this->db->from('siswa');
		// $this->db->where('id_siswa', true);
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->result_array();
	}

	function get_siswa_by_id($id_siswa = 0)
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('siswa');
		// $this->db->where('id_siswa', true);
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_status_siswa()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('nama_siswa, status');
		$this->db->from('siswa');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->row_array();
	}
}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */