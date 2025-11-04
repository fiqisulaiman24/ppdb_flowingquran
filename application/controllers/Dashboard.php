<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != TRUE){
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
	            Akses Masuk Gagal, Silahkan masukan Username dan Password
	        </div>');
			redirect('masuk','refresh');
		};
		$this->load->model('Pendaftar_model','pendaftar');
		$this->load->model('Pembayaran_model','pembayaran');
		$this->load->model('Siswa_model','siswa');
	}

	public function index()
	{
		$data['title'] = 'Dashboard - PPDB MIT Flowing Quran';
		$data['siswa'] = $this->siswa->get_siswa_by_pendaftar();
		$data['pembayaran_by_pendaftar'] = $this->pembayaran->get_pembayaran_by_pendaftar();
		$data['check_no_bayar'] = $this->pembayaran->check_done_bayar();
		$data['status_siswa'] = $this->siswa->get_status_siswa();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/layout/content_header');
		$this->load->view('front/content_dashboard',$data);
		$this->load->view('front/layout/content_footer');
	}

	public function cetak_kelulusan()
	{
		$data['title'] = 'Cetak Kelulusan - PPDB MIT Flowing Quran';
		$data['status_siswa'] = $this->siswa->get_status_siswa();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/content_cetak_kelulusan',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */