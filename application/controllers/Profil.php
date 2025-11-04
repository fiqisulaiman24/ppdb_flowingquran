<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['title'] = 'Profil Sekolah - PPDB MIT Flowing Quran';

		$this->load->view('layout/content_head', $data);
		$this->load->view('layout/content_nav');
		$this->load->view('content_profil');
		$this->load->view('layout/content_footer');
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/Profil.php */