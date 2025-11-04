<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orangtua_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	function get_all_orangtua()
	{
		$this->db->select('*');
		$this->db->from('orang_tua as ot');
		$this->db->join('pendaftar as pd', 'pd.id_pendaftar = ot.id_orangtua');
		$this->db->join('siswa as sw', 'sw.id_siswa = ot.id_orangtua');
		$this->db->order_by('sw.id_siswa', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}

	function get_orangtua()
	{
		$this->db->select('*');
		$this->db->from('orang_tua as ot');
		$this->db->join('siswa as sw', 'sw.id_siswa = ot.id_orangtua');
		$this->db->where('sw.id_siswa');

		$query = $this->db->get();
		return $query->row_array();
	}

	function get_orangtua_by_pendaftar()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('orang_tua');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->result_array();
	}

	function get_ortu_by_id($id_orangtua = 0)
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('orang_tua');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->row_array();
	}

}

/* End of file Orangtua_model.php */
/* Location: ./application/models/Orangtua_model.php */