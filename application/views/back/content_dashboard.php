
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="notif text-center text-bold">
            <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
          </div>
        </div>
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $total_siswa ?></h3>
              <p>Total Siswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-users text-white"></i>
            </div>
            <a href="<?= site_url('back/siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3><?= $total_pendaftar ?></h3>

              <p>Total Pendaftar</p>
            </div>
            <div class="icon">
              <i class="fa fa-users text-white"></i>
            </div>
            <a href="<?= site_url('back/pendaftar') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $total_siswa_lulus ?></h3>
              <p>Total Siswa Lulus</p>
            </div>
            <div class="icon">
              <i class="fa fa-check text-white"></i>
            </div>
            <a href="<?= site_url('back/siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $total_siswa_tidak_lulus ?></h3>
              <p>Total Siswa Tidak Lulus</p>
            </div>
            <div class="icon">
              <i class="fa fa-times text-white"></i>
            </div>
            <a href="<?= site_url('back/siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-12">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>
                <?= 'Rp '.number_format($total_pembayaran,0) ?>
              </h3>

              <p>Total Pembayaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-money-check-alt text-white"></i>
            </div>
            <a href="<?= site_url('back/pembayaran') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Data Siswa Terbaru</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK Siswa</th>
                      <th>Nama Siswa</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <?php
                    $no = 1;
                    foreach ($siswa as $result_siswa) {
                  ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_siswa['nik_siswa'] ?></td>
                      <td><?= $result_siswa['nama_siswa'] ?></td>
                      <td>
                        <span class="badge badge-warning">
                          <?= ucfirst($result_siswa['status']) ?>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Data Pendaftar Terbaru</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data_1" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <?php
                    $no = 1;
                    foreach ($pendaftar as $result_pendaftar) {
                  ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_pendaftar['nama_lengkap'] ?></td>
                      <td><?= $result_pendaftar['username'] ?></td>
                      <td>
                        <?php if($result_pendaftar['status_pendaftar'] == 'aktif'){ ?>
                        <span class="badge badge-success">
                          <?= ucfirst($result_pendaftar['status_pendaftar']) ?>
                        </span>
                        <?php }else{ ?>
                        <span class="badge badge-danger">
                          <?= ucfirst($result_pendaftar['status_pendaftar']) ?>
                        </span>
                        <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->