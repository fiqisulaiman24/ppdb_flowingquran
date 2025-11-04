<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	// Admin Function
	public function get_all_pembayaran()
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('pendaftar', 'pendaftar.id_pendaftar = pembayaran.id_pembayaran');
		$this->db->join('siswa', 'siswa.id_siswa = pembayaran.id_pembayaran');
		$this->db->order_by('id_pembayaran', 'asc');

		$query = $this->db->get();
		return $query->result_array();
	}

	// Admin Function
	public function get_total_pembayaran()
	{
		$this->db->select('SUM(jumlah_bayar) as total_pembayaran');
		$this->db->where('status_bayar', 'diterima');
		$query = $this->db->get('pembayaran');
	    if($query->num_rows() > 0){
	    	return $query->row()->total_pembayaran;
	    }else{
	    	return 0;
	   }
	}

	public function get_pembayaran_by_pendaftar()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->where('id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function check_done_bayar()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('pembayaran');
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

	public function get_id_detail_pembayaran($id_pembayaran = 0)
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('pembayaran as pb');
		$this->db->join('siswa as s', 's.id_siswa = pb.id_pembayaran');
		$this->db->join('pendaftar as pd', 'pd.id_pendaftar = pb.id_pembayaran');
		// $this->db->where('pb.id_pembayaran');
		$this->db->where('pd.id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_id_cetak_pembayaran($id_pembayaran = 0)
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$this->db->select('*');
		$this->db->from('pembayaran as pb');
		$this->db->join('siswa as s', 's.id_siswa = pb.id_pembayaran');
		$this->db->join('pendaftar as pd', 'pd.id_pendaftar = pb.id_pembayaran');
		// $this->db->where('id_pembayaran', true);
		$this->db->where('pd.id_pendaftar', $id_pendaftar);

		$query = $this->db->get();
		return $query->result_array();
	}
}

/* End of file Pembayaran_model.php */
/* Location: ./application/models/Pembayaran_model.php */