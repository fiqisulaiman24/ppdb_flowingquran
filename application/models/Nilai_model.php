<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function get_all_nilai_siswa()
	{
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa', 'siswa.id_siswa = nilai.id_nilai');
		$this->db->order_by('timecreated_nilai', 'desc');

		$query = $this->db->get();
		return $query->result_array();
	}

}

/* End of file Nilai_model.php */
/* Location: ./application/models/Nilai_model.php */