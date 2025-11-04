<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD SALAH !');
			redirect('back/masuk');
		};
		$this->load->model('Siswa_model','siswa');
		$this->load->model('Orangtua_model','orang_tua');
	}

	public function index()
	{
		$data['title'] = 'Data Siswa - PPDB MIT Flowing Quran';
		$data['siswa'] = $this->siswa->get_all_siswa();
		$data['siswa_lulus'] = $this->siswa->get_all_siswa_lulus();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_data_siswa',$data);
		$this->load->view('back/layout/content_footer');
	}

	public function cetak_laporan_siswa()
	{
		$data['title'] = 'Cetak Laporan Siswa - PPDB MIT Flowing Quran';
		$data['siswa'] = $this->siswa->get_all_siswa();

		$this->load->view('back/content_cetak_siswa',$data);
	}

	public function cetak_laporan_siswa_lulus()
	{
		$data['title'] = 'Cetak Laporan Siswa Lulus - PPDB MIT Flowing Quran';
		$data['siswa_lulus'] = $this->siswa->get_all_siswa_lulus();

		$this->load->view('back/content_cetak_siswa_lulus',$data);
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/back/Siswa.php */