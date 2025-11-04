<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Konfigurasi_model','konfigurasi');
	}

	public function index()
	{
		$data['title'] = 'PPDB - MIT Flowing Quran';
		$data['konfigurasi'] = $this->konfigurasi->get_slider_konfigurasi();

		$this->load->view('layout/content_head', $data);
		$this->load->view('layout/content_nav');
		$this->load->view('content_beranda',$data);
		$this->load->view('layout/content_footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */