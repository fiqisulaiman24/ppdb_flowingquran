<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
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
		$this->load->model('Siswa_model','siswa');
		$this->load->model('Orangtua_model','orangtua');
		$this->load->model('Berkas_model','berkas');
		$this->load->model('Pendaftar_model','pendaftar');
	}

	public function index()
	{
		$data['title'] = 'Detail Siswa - PPDB MIT Flowing Quran';
		$data['detail_siswa'] = $this->siswa->get_siswa_by_pendaftar();
		$data['detail_ortu'] = $this->orangtua->get_orangtua_by_pendaftar();
		$data['detail_berkas'] = $this->berkas->get_berkas_by_siswa();
		$data['get_berkas'] = $this->berkas->get_berkas_siswa();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/layout/content_header');
		$this->load->view('front/content_detail_siswa',$data);
		$this->load->view('front/layout/content_footer');
	}

	public function edit_siswa($id_siswa)
	{
		$data['title'] = 'Edit Siswa - PPDB MIT Flowing Quran';
		$data['detail_siswa'] = $this->siswa->get_siswa_by_id();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/layout/content_header');
		$this->load->view('front/content_edit_siswa',$data);
		$this->load->view('front/layout/content_footer');
	}

	public function proses_edit_siswa()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');
		$post = $this->input->post();

		$id_siswa = $post['id_siswa'];
		$nama_siswa = $post['nama_siswa'];
		$nik_siswa = $post['nik_siswa'];
		$jenis_kelamin = $post['jenis_kelamin'];
		$tempat_lahir = $post['tempat_lahir'];
		$tanggal_lahir = $post['tanggal_lahir'];
		$no_telepon = $post['no_telepon'];
		$anak_ke = $post['anak_ke'];
		$tk_asal = $post['tk_asal'];
		$alamat = $post['alamat_lengkap'];

		$data = array(
			'id_siswa' => $id_siswa,
			'id_pendaftar' => $id_pendaftar,
			'nama_siswa' => $nama_siswa,
			'nik_siswa' => $nik_siswa,
			'jenis_kelamin' => $jenis_kelamin,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'no_telepon' => $no_telepon,
			'anak_ke' => $anak_ke,
			'tk_asal' => $tk_asal,
			'alamat_lengkap' => $alamat
		);
		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('siswa', $data);
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Biodata Siswa berhasil diedit
        </div>');
		redirect('siswa','refresh');
	}

	public function edit_orangtua($id_orangtua)
	{
		$data['title'] = 'Edit Orang Tua - PPDB MIT Flowing Quran';
		$data['detail_ortu'] = $this->orangtua->get_ortu_by_id();
		$data['get_siswa'] = $this->siswa->get_siswa_by_pendaftar();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/layout/content_header');
		$this->load->view('front/content_edit_orangtua',$data);
		$this->load->view('front/layout/content_footer');
	}

	public function proses_edit_orangtua()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');
		$post = $this->input->post();

		$id_orangtua = $post['id_orangtua'];
		$id_siswa = $post['id_siswa'];
		$nama_ayah = $post['nama_ayah'];
		$nama_ibu = $post['nama_ibu'];
		$pendidikan_ayah = $post['pendidikan_ayah'];
		$pendidikan_ibu = $post['pendidikan_ibu'];
		$pekerjaan_ayah = $post['pekerjaan_ayah'];
		$pekerjaan_ibu = $post['pekerjaan_ibu'];
		$tempat_kerja_ayah = $post['tempat_kerja_ayah'];
		$tempat_kerja_ibu = $post['tempat_kerja_ibu'];
		$no_ponsel_ayah = $post['no_ponsel_ayah'];
		$no_ponsel_ibu = $post['no_ponsel_ibu'];
		$penghasilan_ayah_bulan = $post['penghasilan_ayah_bulan'];
		$penghasilan_ibu_bulan = $post['penghasilan_ibu_bulan'];

		$data = array(
			'id_orangtua' => $id_orangtua,
			'id_siswa' => $id_siswa,
			'nama_ayah' => $nama_ayah,
			'nama_ibu' => $nama_ibu,
			'pendidikan_ayah' => $pendidikan_ayah,
			'pendidikan_ibu' => $pendidikan_ibu,
			'pekerjaan_ayah' => $pekerjaan_ayah,
			'pekerjaan_ibu' => $pekerjaan_ibu,
			'tempat_kerja_ayah' => $tempat_kerja_ayah,
			'tempat_kerja_ibu' => $tempat_kerja_ibu,
			'no_ponsel_ayah' => $no_ponsel_ayah,
			'no_ponsel_ibu' => $no_ponsel_ibu,
			'penghasilan_ayah_bulan' => $penghasilan_ayah_bulan,
			'penghasilan_ibu_bulan' => $penghasilan_ibu_bulan
		);
		$this->db->where('id_orangtua', $id_orangtua);
		$this->db->update('orang_tua', $data);
		$this->session->set_flashdata('info',
		'<div class="alert alert-success">
            Biodata Orang Tua berhasil diedit
        </div>');
        redirect('siswa','refresh');
	}

	public function berkas()
	{
		$data['title'] = 'Berkas - PPDB MIT Flowing Quran';
		$data['get_siswa'] = $this->siswa->get_siswa_by_pendaftar();
		$data['get_berkas'] = $this->berkas->get_berkas_siswa();

		$this->load->view('front/layout/content_head', $data);
		$this->load->view('front/layout/content_header');
		$this->load->view('front/content_berkas',$data);
		$this->load->view('front/layout/content_footer');
	}

	public function proses_nisn()
	{
		$id_pendaftar = $this->session->userdata('id_pendaftar');
		$post = $this->input->post();

		$id_siswa = $post['id_siswa'];
		$nisn_siswa = $post['nisn_siswa'];

		$data = array(
			'id_siswa' => $id_siswa,
			'id_pendaftar' => $id_pendaftar,
			'nisn_siswa' => $nisn_siswa
		);

		$cek_nisn = $this->db->query("SELECT nisn_siswa FROM berkas WHERE id_pendaftar='$id_pendaftar'")->row_array();
		$verifikasi_nisn = $cek_nisn['nisn_siswa'];
		if(empty($verifikasi_nisn)){
			$this->db->insert('berkas', $data);
			$this->session->set_flashdata('info',
			'<div class="alert alert-success">
	            NISN Siswa berhasil ditambahkan
	        </div>');
			redirect('siswa/berkas','refresh');
		}else{
			$this->db->where('id_siswa', $id_siswa);
			$this->db->update('berkas', $data);
			$this->session->set_flashdata('info',
			'<div class="alert alert-success">
	            NISN Siswa berhasil diedit
	        </div>');
	        redirect('siswa/berkas','refresh');
		}
	}

	public function proses_upload_rapor_terakhir()
	{
		$post = $this->input->post();
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$id_siswa = $post['id_siswa'];
		$foto_rapor_terakhir = $_FILES['foto_rapor_terakhir']['name'];

		$config['upload_path'] = 'assets/back/berkas_siswa/foto_rapor_terakhir';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']  = '5000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('foto_rapor_terakhir'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
                '.$error['error'].'
            </div>');
            redirect('siswa/berkas','refresh');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'id_siswa' => $id_siswa,
				'id_pendaftar' => $id_pendaftar,
				'foto_rapor_terakhir' => $foto_rapor_terakhir
			);

			$cek_foto_rapor_terakhir = $this->db->query("SELECT foto_rapor_terakhir FROM berkas")->row_array();
			$verifikasi_foto_rapor_terakhir = $cek_foto_rapor_terakhir['foto_rapor_terakhir'];
			if(empty($verifikasi_foto_rapor_terakhir)){
				$this->db->where('id_siswa', $id_siswa);
				$this->db->update('berkas', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
		            Foto Raport Terakhir berhasil diupload
		        </div>');
		        redirect('siswa/berkas','refresh');
			}else{
				$rapor_terakhir = $this->db->query("SELECT foto_rapor_terakhir FROM berkas")->row_array();
		        $foto_rapor_terakhir = $rapor_terakhir['foto_rapor_terakhir'];
		        $path = 'assets/back/berkas_siswa/foto_rapor_terakhir/'.$foto_rapor_terakhir;
		        unlink($path);
				$this->db->where('id_siswa', $id_siswa);
				$this->db->update('berkas', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
		            Foto Raport Terakhir berhasil diganti
		        </div>');
		        redirect('siswa/berkas','refresh');
			}
		}
	}

	public function proses_upload_surat_kk()
	{
		$post = $this->input->post();
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$id_siswa = $post['id_siswa'];
		$surat_kk = $_FILES['surat_kk']['name'];

		$config['upload_path'] = 'assets/back/berkas_siswa/surat_kk';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']  = '5000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('surat_kk'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
                '.$error['error'].'
            </div>');
            redirect('siswa/berkas','refresh');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'id_siswa' => $id_siswa,
				'id_pendaftar' => $id_pendaftar,
				'surat_kk' => $surat_kk
			);

			$cek_surat_kk = $this->db->query("SELECT surat_kk FROM berkas")->row_array();
			$verifikasi_surat_kk = $cek_surat_kk['surat_kk'];
			if(empty($verifikasi_surat_kk)){
				$this->db->where('id_siswa', $id_siswa);
				$this->db->update('berkas', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
		            Foto Surat KK berhasil diupload
		        </div>');
		        redirect('siswa/berkas','refresh');
			}else{
				$surat_kk = $this->db->query("SELECT foto_rapor_terakhir FROM berkas")->row_array();
		        $foto_surat_kk = $surat_kk['foto_rapor_terakhir'];
		        $path = 'assets/back/berkas_siswa/surat_kk/'.$foto_surat_kk;
		        unlink($path);
				$this->db->where('id_siswa', $id_siswa);
				$this->db->update('berkas', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
		            Foto Surat KK berhasil diganti
		        </div>');
		        redirect('siswa/berkas','refresh');
			}
		}
	}

	public function proses_upload_foto_siswa()
	{
		$post = $this->input->post();
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$id_siswa = $post['id_siswa'];
		$foto_siswa = $_FILES['foto_siswa']['name'];

		$config['upload_path'] = 'assets/back/berkas_siswa/foto_siswa';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']  = '5000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('foto_siswa'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
                '.$error['error'].'
            </div>');
            redirect('siswa/berkas','refresh');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'id_siswa' => $id_siswa,
				'id_pendaftar' => $id_pendaftar,
				'foto_siswa' => $foto_siswa
			);

			$cek_foto_siswa = $this->db->query("SELECT foto_siswa FROM berkas")->row_array();
			$verifikasi_foto_siswa = $cek_foto_siswa['foto_siswa'];
			if(empty($verifikasi_surat_kk)){
				$this->db->where('id_siswa', $id_siswa);
				$this->db->update('berkas', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
		            Foto Siswa berhasil diupload
		        </div>');
		        redirect('siswa/berkas','refresh');
			}else{
				$foto_siswa = $this->db->query("SELECT foto_siswa FROM berkas")->row_array();
		        $valid_foto_siswa = $foto_siswa['foto_siswa'];
		        $path = 'assets/back/berkas_siswa/foto_siswa/'.$valid_foto_siswa;
		        unlink($path);
				$this->db->where('id_siswa', $id_siswa);
				$this->db->update('berkas', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
		            Foto Siswa berhasil diganti
		        </div>');
		        redirect('siswa/berkas','refresh');
			}
		}
	}

	public function proses_upload_akte_lahir()
	{
		$post = $this->input->post();
		$id_pendaftar = $this->session->userdata('id_pendaftar');

		$id_siswa = $post['id_siswa'];
		$surat_akte_lahir = $_FILES['surat_akte_lahir']['name'];

		$config['upload_path'] = 'assets/back/berkas_siswa/surat_akte_lahir';
		$config['allowed_types'] = 'jpg|jpeg';
		$config['max_size']  = '5000';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( ! $this->upload->do_upload('surat_akte_lahir'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('info',
			'<div class="alert alert-danger">
                '.$error['error'].'
            </div>');
            redirect('siswa/berkas','refresh');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$data = array(
				'id_siswa' => $id_siswa,
				'id_pendaftar' => $id_pendaftar,
				'surat_akte_lahir' => $surat_akte_lahir
			);

			$cek_surat_akte_lahir = $this->db->query("SELECT surat_akte_lahir FROM berkas")->row_array();
			$verifikasi_surat_akte_lahir = $cek_surat_akte_lahir['surat_akte_lahir'];
			if(empty($verifikasi_surat_akte_lahir)){
				$this->db->where('id_siswa', $id_siswa);
				$this->db->update('berkas', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
		            Foto Surat Akte Lahir berhasil diupload
		        </div>');
		        redirect('siswa/berkas','refresh');
			}else{
				$surat_akte_lahir = $this->db->query("SELECT surat_akte_lahir FROM berkas")->row_array();
		        $foto_surat_akte_lahir = $surat_akte_lahir['surat_akte_lahir'];
		        $path = 'assets/back/berkas_siswa/surat_akte_lahir/'.$foto_surat_akte_lahir;
		        unlink($path);
				$this->db->where('id_siswa', $id_siswa);
				$this->db->update('berkas', $data);
				$this->session->set_flashdata('info',
				'<div class="alert alert-success">
		            Foto Surat Akte Lahir berhasil diganti
		        </div>');
		        redirect('siswa/berkas','refresh');
			}
		}
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */