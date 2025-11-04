<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function get_all_berkas()
	{
		$this->db->select('*');
		$this->db->from('berkas','siswa');
		$this->db->join('siswa', 'siswa.id_siswa = berkas.id_berkas');
		$this->db->join('pendaftar', 'pendaftar.id_pendaftar = berkas.id_berkas');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_berkas_by_siswa()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('berkas');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_berkas_siswa()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('berkas');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->row_array();
	}

}

/* End of file Berkas_model.php */
/* Location: ./application/models/Berkas_model.php */