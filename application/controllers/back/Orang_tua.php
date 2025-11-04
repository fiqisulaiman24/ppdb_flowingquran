<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orang_tua extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','Akses Login Gagal, Silahkan masukan username dan password !');
			redirect('back/masuk');
		};
		$this->load->model('Orangtua_model','orang_tua');
	}

	public function index()
	{
		$data['title'] = 'Orang Tua Siswa - PPDB MIT Flowing Quran';
		$data['orang_tua'] = $this->orang_tua->get_all_orangtua();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_data_orangtua', $data);
		$this->load->view('back/layout/content_footer');
	}

	public function cetak_laporan_orangtua()
	{
		$data['title'] = 'Cetak Laporan Orang Tua Siswa - PPDB MIT Flowing Quran';
		$data['orang_tua'] = $this->orang_tua->get_all_orangtua();

		$this->load->view('back/content_cetak_orangtua', $data);
	}

}

/* End of file Orang_tua.php */
/* Location: ./application/controllers/back/Orang_tua.php */