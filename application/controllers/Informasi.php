<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Informasi_model','informasi');
	}

	public function index()
	{
		$data['title'] = 'Informasi - PPDB MIT Flowing Quran';
		$data['informasi'] = $this->informasi->get_all_informasi();

		$this->load->view('layout/content_head', $data);
		$this->load->view('layout/content_nav');
		$this->load->view('content_informasi',$data);
		$this->load->view('layout/content_footer');
	}

}

/* End of file Informasi.php */
/* Location: ./application/controllers/Informasi.php */