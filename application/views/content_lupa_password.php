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
<body class="hold-transition login-page bg-light">
<div class="login-box">
  <div class="notif text-center">
    <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
  </div>

  <div class="text-center">
    <img class="rounded" src="<?= base_url('assets/front/images/logo-fq.jpeg') ?>" width="64">
  </div>

  <div class="login-logo">
    <a href="<?= site_url('masuk')?>"><b class="text-success" style="font-size: 32px;">PPDB MIT Flowing Quran</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Lupa password?<br>pastikan anda ingat username nya</p>
      <form action="<?= site_url('masuk/proses_lupa_password')?>" method="POST">
        <div class="form-group mb-3">
          <label class="text-success">Username</label>
          <input type="text" name="username" class="form-control" placeholder="e.g. sarahst" required>
          <small class="text-danger"><?php echo form_error('username') ?></small>
        </div>

        <div class="form-group mb-3">
          <label class="text-success">Password Baru</label>
          <input type="password" name="password" class="form-control" placeholder="password" required>
          <small class="text-danger"><?php echo form_error('password') ?></small>
        </div>

        <button type="submit" class="btn btn-success btn-block">Minta password baru</button>
      </form>

      <p class="mt-3 mb-1">
        <a href="<?= site_url('masuk') ?>" class="text-success">Masuk</a>
      </p>
      <p class="mb-0">
        <a href="<?= site_url('daftar')?>" class="text-success">Daftar</a>
      </p>
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
  $(document).ready(function() {
    // show the alert
    $(".notif").fadeTo(2000, 500).slideUp(500, function() {
      $(".notif").slideUp(1000);
    });
  });
</script>
</body>
</html>