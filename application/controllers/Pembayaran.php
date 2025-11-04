<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
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
		$this->load->model('Pembayaran_model','pembayaran');
		$this->load->model('Siswa_model','siswa');
	}

	public function index()
	{
		$data['title'] = 'Pembayaran - PPDB MIT Flowing Quran';
		$data['pembayaran_by_pendaftar'] = $this->pembayaran->get_pembayaran_by_pendaftar();
		$data['detail_pembayaran_pendaftar'] = $this->pembayaran->get_id_cetak_pembayaran();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/layout/content_header');
		$this->load->view('front/content_pembayaran',$data);
		$this->load->view('front/layout/content_footer');
	}

	public function tambah_pembayaran()
	{
		$data['title'] = 'Tambah Pembayaran - PPDB MIT Flowing Quran';
		$data['siswa_by_pendaftar'] = $this->siswa->get_siswa_by_pendaftar();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/layout/content_header');
		$this->load->view('front/content_tambah_pembayaran');
		$this->load->view('front/layout/content_footer');
	}

	public function proses_pembayaran()
	{
		$post = $this->input->post();
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$id_siswa = $post['id_siswa'];
		$no_rekening = $post['no_rekening'];
		$atas_nama = $post['atas_nama'];
		$nama_bank = $post['nama_bank'];
		$jumlah_bayar = $post['jumlah_bayar'];
		$keterangan = $post['keterangan'];
		$bukti = $_FILES['bukti']['name'];

		$this->form_validation->set_rules('no_rekening', 'No Rekening', 'trim|required',
			array(
				'required' => 'No Rekening wajib diisi',
			));
		$this->form_validation->set_rules('atas_nama', 'Atas Nama Rekening', 'trim|required',
			array(
				'required' => 'Atas Nama Rekening wajib diisi',
			));
		$this->form_validation->set_rules('nama_bank', 'Nama Bank', 'trim|required',
			array(
				'required' => 'Nama Bank wajib diisi',
			));
		$this->form_validation->set_rules('jumlah_bayar', 'Jumlah Pembayaran', 'trim|required',
			array(
				'required' => 'Jumlah Pembayaran wajib diisi',
			));
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required',
			array(
				'required' => 'Keterangan Pembayaran wajib diisi',
			));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
                '.validation_errors().'
            </div>');
			$this->tambah_pembayaran();
		} else {
			$config['upload_path'] = 'assets/back/pembayaran';
			$config['allowed_types'] = 'jpg|jpeg';
			$config['max_size']  = '5000';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('bukti')){
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('info',
				'<div class="alert alert-danger">
	                '.$error['error'].'
	            </div>');
	            redirect('pembayaran/tambah_pembayaran','refresh');
			}else{
				$data = array('upload_data' => $this->upload->data());
				$data = array(
					'id_pendaftar' => $id_pendaftar,
					'id_siswa' => $id_siswa,
					'no_rekening' => $no_rekening,
					'atas_nama' => $atas_nama,
					'nama_bank' => $nama_bank,
					'jumlah_bayar' => $jumlah_bayar,
					'keterangan' => $keterangan,
					'bukti' => $bukti,
					'status_bayar' => 'pending',
				);
				$this->db->insert('pembayaran', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
	                Pembayaran Berhasil ditambahkan, silahkan tunggu admin untuk memverifikasi pembayaran
	            </div>');
	            redirect('pembayaran','refresh');
			}
		}
	}

	public function detail_pembayaran($id_pembayaran)
	{
		$data['title'] = 'Pembayaran - PPDB MIT Flowing Quran';
		$data['detail'] = $this->pembayaran->get_id_detail_pembayaran();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/layout/content_header');
		$this->load->view('front/content_detail_pembayaran',$data);
		$this->load->view('front/layout/content_footer');
	}

	public function cetak_pembayaran()
	{
		$data['title'] = 'Cetak Pembayaran - PPDB MIT Flowing Quran';
		$data['detail_pembayaran'] = $this->pembayaran->get_id_detail_pembayaran();
		$data['data_pembayaran'] = $this->pembayaran->get_id_cetak_pembayaran();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/content_cetak_pembayaran',$data);
		// $this->load->view('front/layout/content_footer');
	}

}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Pembayaran.php */