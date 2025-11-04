<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD SALAH !');
			redirect('back/masuk');
		};
		$this->load->model('Pembayaran_model','pembayaran');
	}

	public function index()
	{
		$data['title'] = 'Pembayaran - PPDB MIT Flowing Quran';
		$data['pembayaran'] = $this->pembayaran->get_all_pembayaran();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_data_pembayaran', $data);
		$this->load->view('back/layout/content_footer');
	}

	public function setuju_pembayaran($id_pembayaran){
		$this->db->query("UPDATE pembayaran set status_bayar='diterima' WHERE id_pembayaran=$id_pembayaran");
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Pembayaran diterima
        </div>');
		redirect('back/pembayaran');
	}

	public function tolak_pembayaran($id_pembayaran){
		$this->db->query("UPDATE pembayaran set status_bayar='ditolak' WHERE id_pembayaran=$id_pembayaran");
		$this->session->set_flashdata('info',
		'<div class="alert alert-danger">
            Pembayaran ditolak
        </div>');
		redirect('back/pembayaran');
	}

	public function cetak_laporan_pembayaran()
	{
		$data['title'] = 'Cetak Laporan Pembayaran - PPDB MIT Flowing Quran';
		$data['pembayaran'] = $this->pembayaran->get_all_pembayaran();

		$this->load->view('back/content_cetak_pembayaran',$data);
	}
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/back/Pembayaran.php */