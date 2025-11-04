<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login_status') != true){
			$this->session->set_flashdata('notif','Akses Login Gagal, Silahkan username atau password !');
			redirect('back/masuk');
		};
		$this->load->model('Konfigurasi_model','konfigurasi');
	}

	public function index()
	{
		$data['title'] = 'Konfigurasi Website - PPDB MIT Flowing Quran';
		$data['konfigurasi'] = $this->konfigurasi->get_all_konfigurasi();

		$this->load->view('back/layout/content_head', $data);
		$this->load->view('back/layout/content_header');
		$this->load->view('back/layout/content_nav');
		$this->load->view('back/content_data_konfigurasi', $data);
		$this->load->view('back/layout/content_footer');
	}

	public function proses_upload_slider_1()
	{
		$post = $this->input->post();

		$id_konfigurasi = $post['id_konfigurasi'];
		$slider_1 = $_FILES['slider_1']['name'];

		$config['upload_path'] = 'assets/front/images/slider/';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']  = '5000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('slider_1'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
          '.$error['error'].'
         </div>');
         // redirect('back/konfigurasi','refresh');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'id_konfigurasi' => $id_konfigurasi,
				'slider_1' => $slider_1
			);

			$this->db->where('id_konfigurasi', $id_konfigurasi);
			$this->db->update('konfigurasi', $data);
			$this->session->set_flashdata('info',
			'<div class="alert alert-success">
	         Slider 1 berhasil diganti
	      </div>');
         redirect('back/konfigurasi','refresh');
		}
	}

	public function proses_upload_slider_2()
	{
		$post = $this->input->post();

		$id_konfigurasi = $post['id_konfigurasi'];
		$slider_2 = $_FILES['slider_2']['name'];

		$config['upload_path'] = 'assets/front/images/slider/';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']  = '5000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('slider_2'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
          '.$error['error'].'
         </div>');
         // redirect('back/konfigurasi','refresh');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'id_konfigurasi' => $id_konfigurasi,
				'slider_2' => $slider_2
			);

			$this->db->where('id_konfigurasi', $id_konfigurasi);
			$this->db->update('konfigurasi', $data);
			$this->session->set_flashdata('info',
			'<div class="alert alert-success">
	         Slider 2 berhasil diganti
	      </div>');
         redirect('back/konfigurasi','refresh');
		}
	}

	public function proses_upload_slider_3()
	{
		$post = $this->input->post();

		$id_konfigurasi = $post['id_konfigurasi'];
		$slider_3 = $_FILES['slider_3']['name'];

		$config['upload_path'] = 'assets/front/images/slider/';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']  = '5000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('slider_3'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
          '.$error['error'].'
         </div>');
         // redirect('back/konfigurasi','refresh');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'id_konfigurasi' => $id_konfigurasi,
				'slider_3' => $slider_1
			);

			$this->db->where('id_konfigurasi', $id_konfigurasi);
			$this->db->update('konfigurasi', $data);
			$this->session->set_flashdata('info',
			'<div class="alert alert-success">
	         Slider 3 berhasil diganti
	      </div>');
         redirect('back/konfigurasi','refresh');
		}
	}
}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/back/Konfigurasi.php */