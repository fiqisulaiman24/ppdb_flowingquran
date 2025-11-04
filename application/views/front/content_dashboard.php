<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            Halo, <?= $this->session->userdata('nama_lengkap'); ?>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
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

        <div class="col-md-6 offset-md-3">
          <?php if($status_siswa['status'] == 'pending'){ ?>
          <?php }else if($status_siswa['status'] == 'lulus'){ ?>
            <div class="card">
            <div class="card-body">
              <div class="text-center text-uppercase">
                <h4>Selamat Putra/Putri Anda atas Nama</h3>
                <br>
                <h2><?= $status_siswa['nama_siswa']?></h4>
                <br>
                <h4>Dinyatakan <b><?= strtoupper($status_siswa['status'])?></b> Seleksi</h3>
                <br>
                <p class="text-left">
                  <span>Catatan :</span><br>
                  Kartu Wajib dicetak dan dibawah saat daftar ulang beserta dokumen asli akta kelahiran, kartu keluarga, print out nisn tk dan rapor terakhir.<br>
                </p>
                <h5>Daftar ulang dilaksanakan pada</h5>
                <h5><b>01 Juli 2022</b></h5>
                <a href="<?= site_url('dashboard/cetak_kelulusan')?>" target="_blank" class="btn btn-success btn-block btn-sm">
                  <i class="fa fa-print"></i> Cetak Kelulusan
                </a>
              </div>
            </div>
          </div>
          <?php }else{ ?>
            <div class="card">
            <div class="card-body">
              <div class="text-center text-uppercase">
                <h4>Mohon Maaf Putra/Putri Anda atas Nama</h3>
                <br>
                <h2><?= $status_siswa['nama_siswa']?></h4>
                <br>
                <h4>Dinyatakan <b><?= str_replace($status_siswa['status'], '_', 'Tidak Lulus') ?></b> Seleksi</h3>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>

        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Data Siswa</h3>
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
                    foreach ($siswa as $det_siswa) {
                  ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $det_siswa['nik_siswa'] ?></td>
                      <td><?= $det_siswa['nama_siswa'] ?></td>
                      <td>
                        <?php if($det_siswa['status'] == 'pending'){ ?>
                          <span class="badge badge-warning">Pending</span>
                        <?php }else if($det_siswa['status'] == 'lulus'){ ?>
                          <span class="badge badge-success">Lulus</span>
                        <?php }else{ ?>
                          <span class="badge badge-danger">Tidak Lulus</span>
                        <?php } ?>
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Data Pembayaran</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data_1" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Atas Nama</th>
                      <th>Nama Bank</th>
                      <th>Jumlah Pembayaran</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($pembayaran_by_pendaftar as $result) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result['atas_nama'] ?></td>
                      <td><?= $result['nama_bank'] ?></td>
                      <td><?= 'Rp '.number_format($result['jumlah_bayar'],0) ?></td>
                      <td>
                        <?php if($result['status_bayar'] == 'pending'){ ?>
                          <span class="badge badge-warning">
                            <?= ucfirst($result['status_bayar']) ?>
                          </span>
                        <?php }else if($result['status_bayar'] == 'diterima'){ ?>
                          <span class="badge badge-success">
                            <?= ucfirst($result['status_bayar']) ?>
                          </span>
                        <?php }else{ ?>
                          <span class="badge badge-danger">
                            <?= ucfirst($result['status_bayar']) ?>
                          </span>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>