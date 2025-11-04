<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-12">
          <!-- Harus nya teks -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="notif text-center text-bold">
            <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
          </div>
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Langkah Terakhir<br>Upload berkas Siswa</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <form method="POST" action="<?= site_url('pendaftaran/proses_nisn')?>">
                    <div class="form-group d-none">
                      <label>Orang Tua dari Siswa</label>
                      <select class="form-control" name="id_siswa" style="cursor: pointer;" readonly>
                        <?php
                          $id_pendaftar = $this->session->userdata('id_pendaftar');
                          foreach ($siswa_by_pendaftar as $row) {
                        ?>
                        <option value="<?= $row['id_siswa']?>">
                          <?= $row['nama_siswa'] ?>
                        </option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>
                        NISN Siswa<br>
                        <small class="text-danger text-bold">
                          *ketik - jika tidak ada
                        </small>
                      </label>
                      <?php if(empty($get_berkas['nisn_siswa'])){ ?>
                        <input type="text" class="form-control" max="12" name="nisn_siswa" placeholder="e.g. 175999444" required>
                      <?php }else{ ?>
                        <input type="text" class="form-control" name="nisn_siswa" placeholder="e.g. 175999444" value="<?= $get_berkas['nisn_siswa'] ?>" readonly>
                      <?php } ?>
                    </div>

                    <?php if(empty($get_berkas['nisn_siswa'])){ ?>
                      <button type="submit" class="btn btn-success btn-block" onclick="confirm('apakah sudah benar? anda bisa mengedit nya lagi nanti')">
                        Submit
                      </button>
                    <?php }else{ ?>
                      <span class="text-success text-center text-bold">
                        <i class="fa fa-check"></i> NISN sudah ditambahkan
                      </span>
                    <?php } ?>
                  </form>
                </div>

                <div class="col-md-3">
                  <!-- Upload Foto Rapor Terakhir -->
                  <form method="POST" action="<?= site_url('pendaftaran/proses_upload_rapor_terakhir') ?>" enctype="multipart/form-data">
                    <div class="card">
                      <?php foreach ($siswa_by_pendaftar as $row){ ?>
                        <input type="hidden" name="id_siswa" value="<?= $row['id_siswa'] ?>">
                      <?php } ?>
                      <div class="card-body">
                        <?php if(empty($get_berkas['foto_rapor_terakhir'])){ ?>
                        <img width="100%" height="450" id="foto_rapor_terakhir" alt="Foto Surat Pengantar" src="<?= base_url('assets/front/img/blank_rapor_terakhir.jpg') ?>">
                        <?php }else{ ?>
                          <img width="100%" height="450" id="foto_rapor_terakhir" alt="Foto Surat Pengantar" src="<?= base_url('assets/back/berkas_siswa/foto_rapor_terakhir/'.$get_berkas['foto_rapor_terakhir']) ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="d-block m-auto text-center text-bold">
                      Foto Rapor Terakhir<br>
                    </div>
                    <?php if(empty($get_berkas['foto_rapor_terakhir'])){ ?>
                    <input type="file" name="foto_rapor_terakhir" id="input_rapor_terakhir"><br>
                    <small class="text-danger text-bold">* Foto raport maksimal 5mb</small><br>
                    <small class="text-danger text-bold">* Foto harus berformat jpg/jpeg</small>
                    <button type="submit" class="btn btn-block btn-success mt-2" onclick="confirm('apakah sudah benar? anda bisa mengedit nya lagi nanti')">
                      Upload
                    </button>
                    <?php }else{ ?>
                      <span class="text-success text-bold text-center d-block m-auto">
                        <i class="fa fa-check"></i> Sudah ditambahkan
                      </span>
                    <?php } ?>
                  </form>
                </div>

                <div class="col-md-3">
                  <!-- Upload Foto Surat KK -->
                  <form method="POST" action="<?= site_url('pendaftaran/proses_upload_surat_kk')?>" enctype="multipart/form-data">
                    <div class="card">
                      <?php foreach ($siswa_by_pendaftar as $result){ ?>
                        <input type="hidden" name="id_siswa" value="<?= $result['id_siswa'] ?>">
                      <?php } ?>
                      <div class="card-body">
                        <?php if(empty($get_berkas['surat_kk'])){ ?>
                        <img width="100%" height="450" id="foto_surat_kk" alt="Foto Surat KK" src="<?= base_url('assets/front/img/blank_surat_kk.jpg') ?>">
                        <?php }else{ ?>
                          <img width="100%" height="450" id="foto_surat_kk" alt="Foto Surat KK" src="<?= base_url('assets/back/berkas_siswa/surat_kk/'.$get_berkas['surat_kk']) ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="d-block m-auto text-center text-bold">
                      Foto Surat KK<br>
                    </div>
                    <?php if(empty($get_berkas['surat_kk'])){ ?>
                      <input type="file" name="surat_kk" id="input_surat_kk"><br>
                      <small class="text-danger text-bold">* Foto Surat KK maksimal 5mb</small><br>
                    <small class="text-danger text-bold">* Foto harus berformat jpg/jpeg</small>
                      <button type="submit" class="btn btn-block btn-success mt-2" onclick="confirm('apakah sudah benar? anda bisa mengedit nya lagi nanti')">
                        Upload
                      </button>
                    <?php }else{ ?>
                      <span class="text-success text-bold text-center d-block m-auto">
                        <i class="fa fa-check"></i> Sudah ditambahkan
                      </span>
                    <?php } ?>
                  </form>
                </div>

                <div class="col-md-3">
                  <form method="POST" action="<?= site_url('pendaftaran/proses_upload_foto_siswa')?>" enctype="multipart/form-data">
                    <div class="card">
                      <?php foreach ($siswa_by_pendaftar as $result){ ?>
                        <input type="hidden" name="id_siswa" value="<?= $result['id_siswa'] ?>">
                      <?php } ?>
                      <div class="card-body">
                        <?php if(empty($get_berkas['foto_siswa'])){ ?>
                        <img width="100%" height="450" id="foto_siswa" alt="Foto Siswa" src="<?= base_url('assets/front/img/blank_foto_siswa.jpg') ?>">
                        <?php }else{ ?>
                          <img width="100%" height="450" id="foto_siswa" alt="Foto Siswa" src="<?= base_url('assets/back/berkas_siswa/foto_siswa/'.$get_berkas['foto_siswa']) ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="d-block m-auto text-center text-bold">
                      Foto Siswa<br>
                    </div>
                    <?php if(empty($get_berkas['foto_siswa'])){ ?>
                      <input type="file" name="foto_siswa" id="input_foto_siswa"><br>
                      <small class="text-danger text-bold">* Foto Siswa maksimal 5mb</small><br>
                    <small class="text-danger text-bold">* Foto harus berformat jpg/jpeg</small>
                      <button type="submit" class="btn btn-block btn-success mt-2" onclick="confirm('apakah sudah benar? anda bisa mengedit nya lagi nanti')">
                        Upload
                      </button>
                    <?php }else{ ?>
                      <span class="text-success text-bold text-center d-block m-auto">
                        <i class="fa fa-check"></i> Sudah ditambahkan
                      </span>
                    <?php } ?>
                  </form>
                </div>

                <div class="col-md-3">
                  <form method="POST" action="<?= site_url('pendaftaran/proses_upload_akte_lahir')?>" enctype="multipart/form-data">
                    <div class="card">
                      <?php foreach ($siswa_by_pendaftar as $result){ ?>
                        <input type="hidden" name="id_siswa" value="<?= $result['id_siswa'] ?>">
                      <?php } ?>
                      <div class="card-body">
                        <?php if(empty($get_berkas['surat_akte_lahir'])){ ?>
                        <img width="100%" height="450" id="foto_surat_akte_lahir" alt="Foto Surat Akte Lahir" src="<?= base_url('assets/front/img/blank_surat_akte_lahir.jpg') ?>">
                        <?php }else{ ?>
                          <img width="100%" height="450" id="foto_surat_akte_lahir" alt="Foto Surat Akte Lahir" src="<?= base_url('assets/back/berkas_siswa/surat_akte_lahir/'.$get_berkas['surat_akte_lahir']) ?>">
                        <?php } ?>
                      </div>
                    </div>
                    <div class="d-block m-auto text-center text-bold">
                      Foto Akte Lahir<br>
                    </div>
                    <?php if(empty($get_berkas['surat_akte_lahir'])){ ?>
                      <input type="file" name="surat_akte_lahir" id="input_surat_akte_lahir"><br>
                      <small class="text-danger text-bold">* Foto Akte Lahir maksimal 5mb</small><br>
                    <small class="text-danger text-bold">* Foto harus berformat jpg/jpeg</small>
                      <button type="submit" class="btn btn-block btn-success mt-2" onclick="confirm('apakah sudah benar? anda bisa mengedit nya lagi nanti')">
                        Upload
                      </button>
                    <?php }else{ ?>
                      <span class="text-success text-bold text-center d-block m-auto">
                        <i class="fa fa-check"></i> Sudah ditambahkan
                      </span>
                    <?php } ?>
                  </form>
                </div>

                <?php
                  if(!empty($get_berkas['nisn_siswa'] && $get_berkas['foto_rapor_terakhir'] && $get_berkas['surat_kk'] && $get_berkas['foto_siswa'] && $get_berkas['surat_akte_lahir'])){
                ?>
                  <div class="text-center d-block m-auto">
                    <a href="<?= site_url('dashboard')?>" class="btn btn-success btn-md">
                      <i class="fa fa-sign-in-alt"></i>&nbsp;&nbsp;Menuju Ke Dashboard
                    </a>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
</div>
<!-- /.content-wrapper -->
<script src="<?= base_url('assets/front/lib/jquery.min.js') ?>"></script>
<script type="text/javascript">
  function readURL_foto_rapor_terakhir(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#foto_rapor_terakhir').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#input_rapor_terakhir").change(function() {
    readURL_foto_rapor_terakhir(this);
  });

  function readURL_foto_surat_kk(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#foto_surat_kk').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#input_surat_kk").change(function() {
    readURL_foto_surat_kk(this);
  });

  // Upload foto siswa
  function readURL_foto_siswa(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#foto_siswa').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#input_foto_siswa").change(function() {
    readURL_foto_siswa(this);
  });

  // Upload surat akte lahir
  function readURL_surat_akte_lahir(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#foto_surat_akte_lahir').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#input_surat_akte_lahir").change(function() {
    readURL_surat_akte_lahir(this);
  });
</script>