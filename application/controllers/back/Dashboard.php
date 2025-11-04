<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','Akses Login Gagal, Silahkan username atau password !');
			redirect('back/masuk');
		};
		$this->load->model('Pendaftar_model','pendaftar');
		$this->load->model('Pembayaran_model','pembayaran');
		$this->load->model('Siswa_model','siswa');
	}

	public function index()
	{
		$data['title'] = 'Dashboard - PPDB MIT Flowing Quran';
		$data['pendaftar'] = $this->pendaftar->get_newest_pendaftar();
		$data['total_pendaftar'] = $this->pendaftar->get_total_pendaftar();
		$data['siswa'] = $this->siswa->get_newest_siswa();
		$data['total_siswa'] = $this->siswa->get_total_siswa();
		$data['total_siswa_lulus'] = $this->siswa->get_count_siswa_lulus();
		$data['total_siswa_tidak_lulus'] = $this->siswa->get_count_siswa_tidak_lulus();
		$data['total_pembayaran'] = $this->pembayaran->get_total_pembayaran();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_dashboard',$data);
		$this->load->view('back/layout/content_footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/back/Dashboard.php */