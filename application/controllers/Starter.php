<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Starter extends CI_Controller {
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
	}

	public function index()
	{
		$check_siswa = $this->pendaftar->check_pendaftar_done_siswa();
		$check_orang_tua = $this->pendaftar->check_pendaftar_done_orangtua();

		if($check_siswa && $check_orang_tua){
			redirect('dashboard');
		}else{
			$data['title'] = 'Starter - PPDB MIT Flowing Quran';
			$this->load->view('front/layout/content_head', $data);
			$this->load->view('front/layout/content_header');
			$this->load->view('front/content_starter');
			$this->load->view('front/layout/content_footer');
		}
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/front/Dashboard.php */