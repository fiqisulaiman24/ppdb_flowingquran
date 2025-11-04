<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['title'] = 'Daftar - PPDB MIT Flowing Quran';
		$this->load->view('layout/content_head', $data);
		$this->load->view('layout/content_nav');
		$this->load->view('content_daftar',$data);
		$this->load->view('layout/content_footer');
	}

	public function proses_daftar()
	{
		$post = $this->input->post();
		$nama_lengkap = $post['nama_lengkap'];
		$username = $post['username'];
		$password = md5($post['password']);
		$no_ponsel = $post['no_ponsel'];
		$alamat = $post['alamat'];
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required',
			array(
				'required' => 'Nama Lengkap wajib diisi',
				'is_unique' => '%s sudah terdaftar'
			));
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[pendaftar.username]',
			array(
				'required' => 'Username wajib diisi',
				'is_unique' => 'Username %s sudah terdaftar'
			));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
			array('required' => 'Password wajib diisi'));
		$this->form_validation->set_rules('no_ponsel', 'No Handphone', 'trim|required|min_length[12]|max_length[13]',
			array(
				'required' => 'No Handphone wajib diisi',
				'min_length' => 'No Handphone minimal 12 digit',
				'max_length' => 'No Handphone maksimal 13 digit'
			));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',
			array('required' => 'Alamat wajib diisi'));
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nama_lengkap' => $nama_lengkap,
				'username' => $username,
				'password' => $password,
				'no_ponsel' => $no_ponsel,
				'alamat' => $alamat,
				'status_pendaftar' => 'aktif'
			);
			$this->db->insert('pendaftar', $data);
			$this->session->set_flashdata('info',
				'<div class="alert alert-success">
	                Pendaftaran akun berhasil, silahkan login
	            </div>');
			redirect('masuk');
		} else {
			$this->session->set_flashdata('info',
				'<div class="alert alert-success">
	                Pendaftaran akun gagal, silahkan coba lagi
	            </div>');
			$this->index();
		}
	}

}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */