<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function get_all_pendaftar()
	{
		$this->db->select('*');
		$this->db->from('pendaftar');
		$this->db->order_by('id_pendaftar', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_newest_pendaftar()
	{
		$this->db->select('*');
		$this->db->from('pendaftar');
		$this->db->order_by('timecreated_pendaftar', 'desc');
		$this->db->limit(10);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_total_pendaftar()
	{
		$this->db->select('*');
		$this->db->from('pendaftar');

		$query = $this->db->get();
		return $query->num_rows();
	}

	function check_pendaftar_done_siswa()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function check_pendaftar_done_orangtua()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');
		$this->db->select('*');
		$this->db->from('orang_tua');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	function check_pendaftar_done_berkas()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('berkas');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}

/* End of file Pendaftar_model.php */
/* Location: ./application/models/Pendaftar_model.php */