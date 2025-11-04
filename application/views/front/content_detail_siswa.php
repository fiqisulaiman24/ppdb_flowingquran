<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            Detail Siswa :
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">Detail Siswa</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="notif text-center text-bold">
            <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
          </div>
        </div>

        <div class="col-md-12">
          <?php foreach ($detail_siswa as $result) { ?>
          <div class="card card-success card-outline">
            <div class="card-body box-profile">
              <div class="row">
                <div class="col-md-4">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item border-0 mb-2">
                      NIK Siswa :
                      <a class="float-right text-bold">
                        <?= $result['nik_siswa'] ?>
                      </a>
                    </li>

                    <li class="list-group-item border-0 mb-2">
                      Nama Lengkap :
                      <a class="float-right text-bold">
                        <?= $result['nama_siswa'] ?>
                      </a>
                    </li>

                    <li class="list-group-item border-0 mb-2">
                      Jenis Kelamin :
                      <?php if($result['jenis_kelamin'] == 'L'){ ?>
                        <a class="float-right text-bold">
                          Laki-Laki
                        </a>
                      <?php }else{ ?>
                        <a class="float-right text-bold">
                          Perempuan
                        </a>
                      <?php } ?>
                    </li>

                    <li class="list-group-item border-0 mb-2">
                      Tempat Lahir :
                      <a class="float-right text-bold">
                        <?= $result['tempat_lahir']?>
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="col-md-4">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item border-0">
                      Tanggal Lahir :
                      <a class="float-right text-bold">
                        <?= date('d M Y',strtotime($result['tanggal_lahir'])) ?>
                      </a>
                    </li>

                    <li class="list-group-item border-0 pt-3">
                      Anak ke :
                      <a class="float-right text-bold">
                        <?= 'Anak ke '.$result['anak_ke'] ?>
                      </a>
                    </li>

                    <li class="list-group-item border-0">
                      Alamat :
                      <a class="float-right text-bold">
                        <?= $result['alamat_lengkap'] ?>
                      </a>
                    </li>

                    <li class="list-group-item border-0">
                      No Telepon :
                      <?php if($result['no_telepon'] == '-'){ ?>
                      <a class="float-right text-bold">
                        -
                      </a>
                      <?php }else{ ?>
                      <a class="float-right text-bold">
                        <?= $result['no_telepon']; ?>
                      </a>
                      <?php } ?>
                    </li>
                  </ul>
                </div>

                <div class="col-md-4">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item border-0">
                      Asal TK :
                      <?php if($result['tk_asal'] == '-'){ ?>
                        <a class="float-right text-bold">
                          -
                        </a>
                      <?php }else{ ?>
                        <a class="float-right text-bold">
                          <?= $result['tk_asal']; ?>
                        </a>
                      <?php } ?>
                    </li>

                    <li class="list-group-item border-0">
                      Status Siswa :
                      <a class="float-right">
                        <?php if($result['status'] == 'pending'){ ?>
                          <span class="badge badge-warning">
                            Pending
                          </span>
                        <?php }else if($result['status'] == 'lulus'){ ?>
                          <span class="badge badge-success">
                            Lulus
                          </span>
                        <?php }else{ ?>
                          <span class="badge badge-danger">
                            Tidak Lulus
                          </span>
                        <?php } ?>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <a href="<?= site_url('siswa/edit_siswa/'.$result['id_siswa'])?>" class="btn btn-success btn-block">
                <i class="fa fa-edit"></i> Edit Siswa
              </a>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="col-lg-12">
          <?php foreach ($detail_ortu as $result) {?>
          <div class="card card-success card-outline">
            <div class="card-header">
              <div class="card-title">
                Biodata Orang Tua
              </div>
            </div>
            <div class="card-body box-profile">
              <div class="row">
                <div class="col-md-6">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      Nama Ayah :
                      <a class="float-right text-bold">
                        <?= $result['nama_ayah'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                      Pendidikan Ayah :
                      <a class="float-right text-bold">
                        <?= $result['pendidikan_ayah'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                      Pekerjaan Ayah :
                      <a class="float-right text-bold">
                        <?= $result['pekerjaan_ayah'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                      Tempat Bekerja Ayah :
                      <a class="float-right text-bold">
                        <?= $result['tempat_kerja_ayah'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                      No Ponsel/HP Ayah :
                      <a class="float-right text-bold">
                        <?= $result['no_ponsel_ayah'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                     Penghasilan Ayah per bulan :
                     <a class="float-right text-bold">
                       <?= 'Rp '.number_format($result['penghasilan_ayah_bulan'],0) ?>
                     </a>
                    </li>
                  </ul>
                </div>

                <div class="col-md-6">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      Nama Ibu :
                      <a class="float-right text-bold">
                        <?= $result['nama_ibu'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                      Pendidikan Ibu :
                      <a class="float-right text-bold">
                        <?= $result['pendidikan_ibu'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                      Pekerjaan Ibu :
                      <a class="float-right text-bold">
                        <?= $result['pekerjaan_ibu'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                      Tempat Bekerja Ibu :
                      <a class="float-right text-bold">
                        <?= $result['tempat_kerja_ibu'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                      No Ponsel/HP Ibu :
                      <a class="float-right text-bold">
                        <?= $result['no_ponsel_ibu'] ?>
                      </a>
                    </li>

                    <li class="list-group-item">
                     Penghasilan Ibu per bulan :
                     <a class="float-right text-bold">
                       <?= 'Rp '.number_format($result['penghasilan_ibu_bulan'],0) ?>
                     </a>
                    </li>
                  </ul>
                </div>

                <a href="<?= site_url('siswa/edit_orangtua/'.$result['id_orangtua'])?>" class="btn btn-success btn-block">
                  <i class="fa fa-edit"></i> Edit Orang Tua
                </a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="col-lg-12">
          <div class="card card-success card-outline">
            <div class="card-header">
              <div class="card-title">
                Berkas Siswa
              </div>
            </div>
            <div class="card-body box-profile">
              <div class="row">
                <div class="col-md-12">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item border-0">
                      NISN Siswa :
                      <?php if(empty($get_berkas['nisn_siswa'])){ ?>
                        <a class="float-right text-bold">
                          belum diinput
                        </a>
                      <?php }else{ ?>
                        <a class="float-right text-bold">
                          <?= $get_berkas['nisn_siswa'] ?>
                        </a>
                      <?php } ?>
                    </li>
                  </ul>
                </div>

                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body bg-light">
                      <?php if(empty($get_berkas['foto_siswa'])){ ?>
                      <div class="d-block m-auto text-center">
                        Gambar Foto Siswa<br>
                        <b>Tidak ada</b>
                      </div>
                        <?php }else{ ?>
                      <img width="100%" height="450" alt="Foto Siswa" src="<?= base_url('assets/back/berkas_siswa/foto_siswa/'.$get_berkas['foto_siswa']) ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="d-block m-auto text-center text-bold">
                    Gambar Foto Siswa<br>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body bg-light">
                      <?php if(empty($get_berkas['surat_akte_lahir'])){ ?>
                      <div class="d-block m-auto text-center">
                        Foto Surat Akte Lahir<br>
                        <b>Belum diupload</b>
                      </div>
                        <?php }else{ ?>
                      <img width="100%" height="450" alt="Foto Akte Lahir" src="<?= base_url('assets/back/berkas_siswa/surat_akte_lahir/'.$get_berkas['surat_akte_lahir']) ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="d-block m-auto text-center text-bold">
                    Surat Akte Lahir<br>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body bg-light">
                      <?php if(empty($get_berkas['surat_kk'])){ ?>
                      <div class="d-block m-auto text-center">
                        Foto Surat KK<br>
                        <b>Belum diupload</b>
                      </div>
                        <?php }else{ ?>
                      <img width="100%" height="450" height="450" alt="Foto Surat KK" src="<?= base_url('assets/back/berkas_siswa/surat_kk/'.$get_berkas['surat_kk']) ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="d-block m-auto text-center text-bold">
                    Surat KK<br>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="card">
                    <div class="card-body bg-light">
                      <?php if(empty($get_berkas['foto_rapor_terakhir'])){ ?>
                      <div class="d-block m-auto text-center">
                        Foto Raport Terakhir<br>
                        <b>Belum diupload</b>
                      </div>
                        <?php }else{ ?>
                      <img width="100%" height="450" alt="Foto Rapor Terakhir" src="<?= base_url('assets/back/berkas_siswa/foto_rapor_terakhir/'.$get_berkas['foto_rapor_terakhir']) ?>">
                      <?php } ?>
                    </div>
                  </div>
                  <div class="d-block m-auto text-center text-bold">
                    Surat Rapor Terakhir<br>
                  </div>
                </div>

                <div class="col-md-12 mt-4">
                  <a href="<?= site_url('siswa/berkas')?>" class="btn btn-success btn-block">
                    <i class="fa fa-edit"></i> Sunting Berkas
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->