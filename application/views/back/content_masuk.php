<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $title ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/back/inc/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/back/inc/css/adminlte.min.css')?>">
  <!-- Datatables -->
  <link rel="stylesheet" href="<?= base_url('assets/back/inc/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page bg-success">
<div class="login-box">
  <div class="notif text-center">
    <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
  </div>

  <div class="text-center">
    <img src="<?= base_url('assets/front/images/logo-fq.jpeg') ?>" width="64" style="border-radius: 18px;">
  </div>

  <div class="login-logo">
    <a href="<?= site_url('back/masuk')?>"><b class="text-white">PPDB MIT Flowing Quran</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body" style="border-radius: 50px;">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?= base_url('back/masuk/proses_masuk') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="e.g. administrator">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('assets/back/inc/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/back/inc/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Datatables -->
<script src="<?= base_url('assets/back/inc/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/back/inc/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/back/inc/js/adminlte.min.js')?>"></script>
<script type="text/javascript">
  $(function () {
    $("#tabel_data").DataTable();
    $("#tabel_data_1").DataTable();
  });

  $(document).ready(function() {
    // show the alert
    $(".notif").fadeTo(2000, 500).slideUp(500, function() {
      $(".notif").slideUp(1000);
    });
  });
</script>
</body>
</html>