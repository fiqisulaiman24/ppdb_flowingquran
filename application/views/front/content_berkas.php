<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            Berkas
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="#">Siswa</a>
            </li>
            <li class="breadcrumb-item">Berkas</li>
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
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card card-success card-outline">
            <div class="card-body">
              <form method="POST" action="<?= site_url('siswa/proses_nisn')?>">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>NISN Siswa</label>
                      <?php foreach ($get_siswa as $result){ ?>
                      <input type="hidden" name="id_siswa" value="<?= $result['id_siswa'] ?>">
                      <?php } ?>
                      <input type="text" class="form-control" name="nisn_siswa" placeholder="e.g. 312314115151" value="<?= $get_berkas['nisn_siswa'] ?>" required>
                    </div>

                    <button type="submit" class="btn btn-block btn-success" onclick="confirm('apakah sudah yakin ?')">
                      Submit
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card card-success card-outline">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <!-- Upload Foto Rapor Terakhir -->
                  <form method="POST" action="<?= site_url('siswa/proses_upload_rapor_terakhir') ?>" enctype="multipart/form-data">
                    <div class="card">
                      <?php foreach ($get_siswa as $result){ ?>
                        <input type="hidden" name="id_siswa" value="<?= $result['id_siswa'] ?>">
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
                    <input type="file" name="foto_rapor_terakhir" id="input_rapor_terakhir"><br>
                    <small class="text-danger text-bold">* Foto raport maksimal 5mb</small><br>
                    <small class="text-danger text-bold">* Foto harus berformat jpg/jpeg</small>
                    <button type="submit" class="btn btn-block btn-success mt-2" onclick="confirm('apakah sudah benar ?')">
                      Upload
                    </button>
                  </form>
                </div>

                <div class="col-md-3">
                  <!-- Upload Foto Surat KK -->
                  <form method="POST" action="<?= site_url('siswa/proses_upload_surat_kk')?>" enctype="multipart/form-data">
                    <div class="card">
                      <?php foreach ($get_siswa as $result){ ?>
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
                    <input type="file" name="surat_kk" id="input_surat_kk"><br>
                    <small class="text-danger text-bold">* Foto Surat KK maksimal 5mb</small><br>
                    <small class="text-danger text-bold">* Foto harus berformat jpg/jpeg</small>
                    <button type="submit" class="btn btn-block btn-success mt-2" onclick="confirm('apakah sudah benar ?')">
                      Upload
                    </button>
                  </form>
                </div>

                <div class="col-md-3">
                  <form method="POST" action="<?= site_url('siswa/proses_upload_foto_siswa')?>" enctype="multipart/form-data">
                    <div class="card">
                      <?php foreach ($get_siswa as $result){ ?>
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
                    <input type="file" name="foto_siswa" id="input_foto_siswa"><br>
                    <small class="text-danger text-bold">* Foto Siswa maksimal 5mb</small><br>
                    <small class="text-danger text-bold">* Foto harus berformat jpg/jpeg</small>
                    <button type="submit" class="btn btn-block btn-success mt-2" onclick="confirm('apakah foto raport sudah benar ?')">
                      Upload
                    </button>
                  </form>
                </div>

                <div class="col-md-3">
                  <form method="POST" action="<?= site_url('siswa/proses_upload_akte_lahir')?>" enctype="multipart/form-data">
                    <div class="card">
                      <?php foreach ($get_siswa as $result){ ?>
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
                    <input type="file" name="surat_akte_lahir" id="input_surat_akte_lahir"><br>
                    <small class="text-danger text-bold">* Foto Akte Lahir maksimal 5mb</small><br>
                    <small class="text-danger text-bold">* Foto harus berformat jpg/jpeg</small>
                    <button type="submit" class="btn btn-block btn-success mt-2" onclick="confirm('apakah surat akte lahir sudah benar ?')">
                      Upload
                    </button>
                  </form>
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