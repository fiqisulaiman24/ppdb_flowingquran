<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD SALAH !');
			redirect('back/masuk');
		};
		$this->load->model('Pendaftar_model','pendaftar');
	}

	public function index()
	{
		$data['title'] = 'Akun Pendaftar- PPDB MIT Flowing Quran';
		$data['pendaftar'] = $this->pendaftar->get_all_pendaftar();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_data_pendaftar',$data);
		$this->load->view('back/layout/content_footer');
	}

	public function nonaktif_pendaftar($id_pendaftar){
		$this->db->query("UPDATE pendaftar set status_pendaftar='nonaktif' WHERE id_pendaftar=$id_pendaftar");
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Akun Pendaftar berhasil dinonaktifkan
        </div>');
		redirect('back/pendaftar');
	}

	public function aktif_pendaftar($id_pendaftar){
		$this->db->query("UPDATE pendaftar set status_pendaftar='aktif' WHERE id_pendaftar=$id_pendaftar");
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Akun Pendaftar berhasil diaktifkan
        </div>');
		redirect('back/pendaftar');
	}

	public function hapus_pendaftar($id_pendaftar)
	{
		$this->db->delete('pendaftar',array('id_pendaftar' => $id_pendaftar));
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Akun Pendaftar berhasil dihapus
        </div>');
		redirect('back/pendaftar');
	}

}

/* End of file Pendaftar.php */
/* Location: ./application/controllers/back/Pendaftar.php */