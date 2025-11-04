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
		$data['title'] = 'Masuk - PPDB MIT Flowing Quran';
		$this->load->view('content_masuk', $data);
	}

	public function proses_masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$result = $this->login->get_pendaftar($username, $password);
		$check_pendaftar = $this->db->query("SELECT * FROM pendaftar WHERE username='$username'")->row_array();
		if($check_pendaftar['status_pendaftar'] == 'nonaktif'){
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
                Mohon Maaf, saat ini akun anda dinonaktifkan
            </div>');
			redirect('masuk','refresh');
		}
		if($result){
			$sess_array = array();
			foreach ($result as $row){
				$sess_array = array(
					'id_pendaftar' => $row->id_pendaftar,
					'username' => $row->username,
					'nama_lengkap' => $row->nama_lengkap,
					'alamat' => $row->alamat,
					'no_ponsel' => $row->no_ponsel,
					'login_status' => true
				);
				$this->session->set_userdata($sess_array);
				$this->session->set_flashdata('info',
					'<div class="alert alert-danger">
		                Selamat Datang
	                </div>');
				redirect('starter','refresh');
			}
			return TRUE;
		} else {
			$this->session->set_flashdata('info',
				'<div class="alert alert-danger">
	                Login gagal, Username atau Password Salah
                </div>');
			redirect('masuk','refresh');
			return FALSE;
		}
	}

	public function lupa_password()
	{
		$data['title'] = 'Lupa Password - PPDB MIT Flowing Quran';
		$this->load->view('content_lupa_password', $data);
	}

	public function proses_lupa_password()
	{
		$post = $this->input->post();

		$username = $post['username'];
		$password = md5($post['password']);

		$this->form_validation->set_rules('username', 'username', 'trim|required',array(
				'required' => 'Masukan username',
			));
		$this->form_validation->set_rules('password', 'password', 'trim|required',array(
				'required' => 'Masukan password',
			));
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'username' => $username,
				'password' => $password
			);
			$this->db->where('username', $username);
			$this->db->update('pendaftar', $data);
			$this->session->set_flashdata('info',
				'<div class="alert alert-success">
	                Ganti Password akun berhasil, silahkan masuk
	            </div>');
			redirect('masuk','refresh');
		} else {
			$this->session->set_flashdata('info',
				'<div class="alert alert-success">
	                Ganti Password akun gagal, silahkan coba lagi
	            </div>');
			redirect('masuk/lupa_password','refresh');
		}
	}

	public function proses_keluar()
	{
		$this->session->unset_userdata('id_pendaftar');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama_lengkap');
		$this->session->unset_userdata('alamat');
		$this->session->unset_userdata('no_ponsel');
		$this->session->unset_userdata('login_status');
		$this->session->sess_destroy();
		redirect('beranda','refresh');
	}
}

/* End of file Masuk.php */
/* Location: ./application/controllers/Masuk.php */