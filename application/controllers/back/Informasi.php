<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','Akses Login Gagal, Silahkan masukan username dan password !');
			redirect('back/masuk');
		};
		$this->load->model('Informasi_model','informasi');
	}

	public function index()
	{
		$data['title'] = 'Post Informasi - PPDB MIT Flowing Quran';
		$data['informasi'] = $this->informasi->get_all_informasi();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_data_informasi', $data);
		$this->load->view('back/layout/content_footer');
	}

	public function proses_tambah_informasi()
	{
		$post = $this->input->post();

		$kegiatan = $post['kegiatan'];
		$tanggal_mulai = $post['tanggal_mulai'];
		$tanggal_akhir = $post['tanggal_akhir'];

		$data = array(
			'kegiatan' => $kegiatan,
			'tanggal_mulai' => $tanggal_mulai,
			'tanggal_akhir' => $tanggal_akhir
		);
		$this->db->insert('informasi', $data);
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Informasi berhasil ditambahkan
        </div>');
        redirect('back/informasi','refresh');
	}

	public function proses_edit_informasi()
	{
		$post = $this->input->post();

		$id_informasi = $post['id_informasi'];
		$kegiatan = $post['kegiatan'];
		$tanggal_mulai = $post['tanggal_mulai'];
		$tanggal_akhir = $post['tanggal_akhir'];

		$data = array(
			'id_informasi' => $id_informasi,
			'kegiatan' => $kegiatan,
			'tanggal_mulai' => $tanggal_mulai,
			'tanggal_akhir' => $tanggal_akhir
		);
		$this->db->where('id_informasi', $id_informasi);
		$this->db->update('informasi', $data);
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Informasi berhasil diiedit
        </div>');
        redirect('back/informasi','refresh');
	}

	public function proses_hapus_informasi($id_informasi)
	{
		$this->informasi->delete_informasi($id_informasi);
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Informasi berhasil dihapus
        </div>');
        redirect('back/informasi','refresh');
	}

}

/* End of file Informasi.php */
/* Location: ./application/controllers/back/Informasi.php */