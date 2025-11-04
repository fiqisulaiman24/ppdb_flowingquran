<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function get_all_konfigurasi()
	{
		$this->db->select('*');
		$this->db->from('konfigurasi');

		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_slider_konfigurasi()
	{
		$this->db->select('slider_1, slider_2, slider_3');
		$this->db->from('konfigurasi');
		$this->db->order_by('id_konfigurasi', 'desc');

		$query = $this->db->get();
		return $query->row_array();
	}

}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */