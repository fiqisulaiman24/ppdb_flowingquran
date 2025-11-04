<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Siswa</li>
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
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title mt-1">List Data Siswa</h3>
              <div class="card-tools">
                <a href="<?= site_url('back/siswa/cetak_laporan_siswa')?>" target="_blank" class="btn btn-danger btn-sm">
                  <i class="fa fa-print"></i> Cetak Data Siswa
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK Siswa</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($siswa as $result_siswa) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_siswa['nik_siswa'] ?></td>
                      <td><?= $result_siswa['nama_siswa'] ?></td>
                      <td>
                        <?php if ($result_siswa['jenis_kelamin'] == 'L'){
                            echo "Laki-laki";
                          }else{
                            echo "Perempuan";
                          }
                        ?>
                      </td>
                      <td>
                        <?php if($result_siswa['status'] == 'pending'){ ?>
                          <span class="badge badge-warning">Pending</span>
                        <?php }else if($result_siswa['status'] == 'lulus'){ ?>
                          <span class="badge badge-success">Lulus</span>
                        <?php }else{ ?>
                          <span class="badge badge-danger">Tidak Lulus</span>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="#modal_detail_siswa<?= $result_siswa['id_siswa']?>" class="btn btn-success btn-sm" data-toggle="modal">
                          <i class="fas fa-search"></i>
                          Detail
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title mt-1">
                Data Siswa Lulus
              </h3>
              <div class="card-tools">
                <a href="<?= site_url('back/siswa/cetak_laporan_siswa_lulus')?>" target="_blank" class="btn btn-danger btn-sm">
                  <i class="fa fa-print"></i> Cetak Data Siswa Lulus
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data_1" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK Siswa</th>
                      <th>Nama Siswa</th>
                      <th>Jenis Kelamin</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <?php
                    $no = 1;
                    foreach ($siswa_lulus as $result_siswa_lulus) {
                  ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_siswa_lulus['nik_siswa'] ?></td>
                      <td><?= $result_siswa_lulus['nama_siswa'] ?></td>
                      <td>
                        <?php if ($result_siswa_lulus['jenis_kelamin'] == 'L'){
                            echo "Laki-laki";
                          }else{
                            echo "Perempuan";
                          }
                        ?>
                      </td>
                      <td>
                        <span class="badge badge-success">
                          <?= ucfirst($result_siswa_lulus['status']) ?>
                        </span>
                      </td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php foreach ($siswa as $row) { ?>
<div class="modal fade" id="modal_detail_siswa<?= $row['id_siswa'] ?>">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title">Detail Data Siswa : <?= $row['nama_siswa'] ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label>Pendaftar Siswa</label>
              <input class="form-control" value="<?= $row['nama_lengkap']?>" readonly>
            </div>

            <div class="form-group">
              <label>Nama Siswa</label>
              <input class="form-control" value="<?= $row['nama_siswa']?>" readonly>
            </div>

            <div class="form-group">
              <label>NIK Siswa</label>
              <input class="form-control" value="<?= $row['nik_siswa']?>" readonly>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <?php if($row['jenis_kelamin'] == 'L'){ ?>
                <input class="form-control" value="Laki-Laki" readonly>
              <?php }else{ ?>
                <input class="form-control" value="Perempuan" readonly>
              <?php } ?>
            </div>

            <div class="form-group">
              <label>Tempat Lahir</label>
              <input class="form-control" value="<?= $row['tempat_lahir'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input class="form-control" value="<?= date('d M Y',strtotime($row['tanggal_lahir'])) ?>" readonly>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label>No Telepon</label>
              <?php if($row['no_telepon'] == '-'){ ?>
                <input class="form-control" value="TIDAK ADA" readonly>
              <?php }else{ ?>
                <input class="form-control" value="<?= $row['no_telepon'] ?>" readonly>
              <?php } ?>
            </div>

            <div class="form-group">
              <label>Asal TK</label>
              <?php if($row['tk_asal'] == '-'){ ?>
                <input class="form-control" value="TIDAK ADA" readonly>
              <?php }else{ ?>
                <input class="form-control" value="<?= $row['tk_asal'] ?>" readonly>
              <?php } ?>
            </div>

            <div class="form-group">
              <label>Anak ke ... dari ... bersaudara</label>
              <input class="form-control" value="<?= $row['anak_ke'] ?>" readonly>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <label>Tanggal & Jam dibuat</label>
              <input class="form-control" value="<?= date('d M Y H:i',strtotime($row['timecreated_siswa'])) ?>" readonly>
            </div>

            <div class="form-group">
              <label>Status Siswa</label><br>
              <?php if($row['status'] == 'pending'){ ?>
                <button type="button" class="btn btn-warning btn-block">
                  <i class="fa fa-clock"></i> Pending
                </button>
              <?php }else if($row['status'] == 'lulus'){ ?>
                <button type="button" class="btn btn-success btn-block">
                  <i class="fa fa-check"></i> Lulus
                </button>
              <?php }else{ ?>
                <button type="button" class="btn btn-danger btn-block">
                  <i class="fa fa-times"></i> Tidak Lulus
                </button>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php } ?>