<style type="text/css">
  .navbar-toggler{
    border: 0;
  }
</style>
<nav class="main-header navbar navbar-expand-md navbar-light navbar-success">
  <div class="container-fluid">
    <a href="<?= site_url('front/dashboard')?>" class="navbar-brand">
      <img class="rounded" src="<?= base_url('assets/front/images/logo-fq.jpeg')?>" width="32">
      <span class="text-white">PPDB MIT Flowing Quran</span>
    </a>

    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
      <!-- Left navbar links -->
      <ul class="navbar-nav p-1">
        <?php
          $check_siswa = $this->pendaftar->check_pendaftar_done_siswa();
          $check_orang_tua = $this->pendaftar->check_pendaftar_done_orangtua();
          $check_berkas = $this->pendaftar->check_pendaftar_done_berkas();

          if($check_siswa && $check_orang_tua && $check_berkas){
        ?>
        <li class="nav-item">
          <a href="<?= site_url('dashboard') ?>" class="nav-link text-white">
            <i class="fa fa-tachometer-alt"></i> Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('siswa') ?>" class="nav-link text-white">
            <i class="fa fa-user"></i> Master Data Siswa
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('pembayaran') ?>" class="nav-link text-white">
            <i class="fa fa-money-check-alt"></i> Pembayaran
          </a>
        </li>
        <?php }else{ ?>
        <?php } ?>
      </ul>
    </div>

    <!-- Right navbar links -->
    <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <li class="nav-item">
        <a href="<?= site_url('masuk/proses_keluar')?>" class="nav-link text-white">
          <i class="fa fa-sign-out-alt"></i> Keluar
        </a>
      </li>
    </ul>
  </div>
</nav>