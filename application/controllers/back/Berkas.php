<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','Akses Login Gagal, silahkan masukan username & password !');
			redirect('back/masuk');
		};
		$this->load->model('Pendaftar_model','pendaftar');
		$this->load->model('Berkas_model','berkas');
	}

	public function index()
	{
		$data['title'] = 'Berkas Siswa - PPDB MIT Flowing Quran';
		$data['berkas'] = $this->berkas->get_all_berkas();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_data_berkas', $data);
		$this->load->view('back/layout/content_footer');
	}

}

/* End of file Berkas.php */
/* Location: ./application/controllers/back/Berkas.php */