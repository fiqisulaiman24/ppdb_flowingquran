 <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url('assets/front/images/logo-fq.jpeg')?>" width="32" class="brand-image img-rounded">
    <span class="brand-text font-weight-light" style="font-size: 18px;">MIT FLOWING QURAN</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block text-center">Administrator</a>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= site_url('back/dashboard') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview menu-open">
          <a href="#" class="nav-link active bg-success">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Master Data Siswa
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('back/siswa') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Siswa</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= site_url('back/orang_tua') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Orang Tua Siswa</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= site_url('back/berkas') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Berkas Siswa</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="<?= site_url('back/nilai') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Nilai Siswa</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('back/pembayaran') ?>" class="nav-link">
            <i class="nav-icon fas fa-money-check-alt"></i>
            <p>
              Pembayaran
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('back/pendaftar') ?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Akun Pendaftar
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('back/informasi') ?>" class="nav-link">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
              Posting Informasi
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('back/konfigurasi') ?>" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Konfigurasi
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('back/masuk/proses_keluar')?>" class="nav-link">
            <i class="nav-icon fas fa-power-off text-danger"></i>
            <p>
              Keluar
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>