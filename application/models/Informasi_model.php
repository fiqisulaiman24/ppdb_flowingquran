<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function get_all_informasi()
	{
		$this->db->select('*');
		$this->db->from('informasi');
		$this->db->order_by('timecreated_informasi', 'asc');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_informasi($id_informasi)
    {
        $this->db->delete('informasi', array('id_informasi' => $id_informasi ));
    }

}

/* End of file Informasi_model.php */
/* Location: ./application/models/Informasi_model.php */