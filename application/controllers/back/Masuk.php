<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model','login');
	}

	public function index()
	{
		$data['title'] = 'Masuk - PPDB Flowing Quran';
		$this->load->view('back/content_masuk', $data);
	}

	public function proses_masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->login->get_admin($username, $password);
		if($result){
			$sess_array = array();
			foreach ($result as $row){
				$sess_array = array(
					'id_admin' => $row->id_admin,
					'username' => $row->username,
					'nama_lengkap' => $row->nama_lengkap,
					'no_ponsel' => $row->no_ponsel,
					'login_status' => true
				);
				$this->session->set_userdata($sess_array);
				$this->session->set_flashdata('info',
					'<div class="alert alert-success">
	                  Selamat Datang
	                </div>');
				redirect('back/dashboard','refresh');
			}
			return TRUE;
		} else {
			$this->session->set_flashdata('info',
				'<div class="alert alert-danger">
	                Login gagal, Username atau Password Salah
                </div>');
			redirect('back/masuk','refresh');
			return FALSE;
		}
	}

	public function proses_keluar()
	{
		$this->session->unset_userdata('id_admin');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_lengkap');
		$this->session->unset_userdata('no_ponsel');
		$this->session->unset_userdata('login-status');
		$this->session->sess_destroy();
		redirect('beranda','refresh');
	}

}

/* End of file Masuk.php */
/* Location: ./application/controllers/back/Masuk.php */