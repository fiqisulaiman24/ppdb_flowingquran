<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','Akses Login Gagal, Silahkan masukan username dan password !');
			redirect('back/masuk');
		};
		$this->load->model('Nilai_model','nilai');
		$this->load->model('Siswa_model','siswa');
	}

	public function index()
	{
		$data['title'] = 'Nilai Siswa - PPDB MIT Flowing Quran';
		$data['nilai'] = $this->nilai->get_all_nilai_siswa();
		$data['siswa'] = $this->siswa->get_all_siswa();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_data_nilai', $data);
		$this->load->view('back/layout/content_footer');
	}

	public function proses_tambah_nilai()
	{
		$post = $this->input->post();
		$id_siswa = $post['id_siswa'];
		$skor_iq = $post['skor_iq'];

		$data = array(
			'id_siswa' => $id_siswa,
			'skor_iq' => $skor_iq,
			'status_nilai_siswa' => 'pending'
		);

		$this->db->insert('nilai', $data);
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Nilai Siswa berhasil ditambahkan
        </div>');
        redirect('back/nilai','refresh');
	}

	public function update_lolos_nilai_siswa($id_nilai){
		$hitung_siswa_lulus = $this->db->query("SELECT COUNT(status) FROM siswa WHERE status='lulus'")->num_rows();
        if($hitung_siswa_lulus > 25){
        	$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
	            Sudah mencapai batas maksimal siswa yg lulus
	        </div>');
			redirect('back/nilai');
        } else {
			$this->db->query("UPDATE nilai set status_nilai_siswa='lulus' WHERE id_nilai=$id_nilai");
			$this->db->query("UPDATE siswa set status='lulus' WHERE id_siswa='$id_nilai'");
			$this->session->set_flashdata('info',
			'<div class="alert alert-success">
	            Siswa lulus
	        </div>');
			redirect('back/nilai');
		}
	}

	public function update_tidak_lolos_nilai_siswa($id_nilai){
		$this->db->query("UPDATE nilai set status_nilai_siswa='tidak_lulus' WHERE id_nilai=$id_nilai");
		$this->db->query("UPDATE siswa set status='tidak_lulus' WHERE id_siswa='$id_nilai'");
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Siswa tidak lulus
        </div>');
		redirect('back/nilai');
	}
}

/* End of file Nilai.php */
/* Location: ./application/controllers/back/Nilai.php */