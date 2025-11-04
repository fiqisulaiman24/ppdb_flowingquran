<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Konfigurasi Website</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Konfigurasi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card card-outline card-success">
        <div class="card-header">
          <h3 class="card-title">Konfigurasi Slider</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4">
              <form method="POST" action="<?= site_url('back/konfigurasi/proses_upload_slider_1')?>" enctype="multipart/form-data">
                <input type="hidden" value="<?= $konfigurasi['id_konfigurasi'] ?>" name="id_konfigurasi">
                <div class="card">
                  <div class="card-body p-0">
                    <img class="img-fluid" id="slider_1" src="<?= base_url('assets/front/images/slider/'.$konfigurasi['slider_1'])?>">
                  </div>
                </div>
                <p class="lead">Slider 1</p>
                <input type="file" name="slider_1" id="input_slider_1">
                <button type="submit" class="btn btn-success btn-block mt-2">
                  Submit
                </button>
              </form>
            </div>

            <div class="col-lg-4">
              <form method="POST" action="<?= site_url('back/konfigurasi/proses_upload_slider_2')?>" enctype="multipart/form-data">
                <input type="hidden" value="<?= $konfigurasi['id_konfigurasi'] ?>" name="id_konfigurasi">
                <div class="card">
                  <div class="card-body p-0">
                    <img class="img-fluid" id="slider_2" src="<?= base_url('assets/front/images/slider/'.$konfigurasi['slider_2'])?>">
                  </div>
                </div>
                <p class="lead">Slider 2</p>
                <input type="file" name="slider_2" id="input_slider_2">
                <button type="submit" class="btn btn-success btn-block mt-2">
                  Submit
                </button>
              </form>
            </div>

            <div class="col-lg-4">
              <form method="POST" action="<?= site_url('back/konfigurasi/proses_upload_slider_3')?>" enctype="multipart/form-data">
                <input type="hidden" value="<?= $konfigurasi['id_konfigurasi'] ?>" name="id_konfigurasi">
                <div class="card">
                  <div class="card-body p-0">
                    <img class="img-fluid" id="slider_3" src="<?= base_url('assets/front/images/slider/'.$konfigurasi['slider_3'])?>">
                  </div>
                </div>
                <p class="lead">Slider 3</p>
                <input type="file" name="slider_3" id="input_slider_3">
                <button type="submit" class="btn btn-success btn-block mt-2">
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/front/lib/jquery.min.js') ?>"></script>
<script type="text/javascript">
  function readURL_slider_1(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#slider_1').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#input_slider_1").change(function() {
    readURL_slider_1(this);
  });

  function readURL_slider_2(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#slider_2').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#input_slider_2").change(function() {
    readURL_slider_2(this);
  });

  function readURL_slider_3(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#slider_3').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $("#input_slider_3").change(function() {
    readURL_slider_3(this);
  });
</script>