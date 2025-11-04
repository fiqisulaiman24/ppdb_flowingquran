<style type="text/css">
  .select2-container .select2-selection--single {
    height: 40px;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 8px;
    right: 5px;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Nilai Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Nilai Siswa</li>
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
          <a href="#modal_tambah_nilai" class="btn btn-success btn-sm mb-4" data-toggle="modal">
            <i class="fa fa-plus"></i> Tambah
          </a>
          <div class="notif text-center text-bold">
            <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIK Siswa</th>
                      <th>Nama Siswa</th>
                      <th>Skor IQ</th>
                      <th>Status Nilai</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($nilai as $result_nilai) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_nilai['nik_siswa'] ?></td>
                      <td><?= $result_nilai['nama_siswa'] ?></td>
                      <td><?= $result_nilai['skor_iq'] ?></td>
                      <td>
                        <?php if($result_nilai['status_nilai_siswa'] == 'pending'){ ?>
                          <span class="badge badge-warning">
                            Pending
                          </span>
                        <?php }else if($result_nilai['status_nilai_siswa'] == 'lulus'){ ?>
                          <span class="badge badge-success">
                            Lulus
                          </span>
                        <?php }else{ ?>
                          <span class="badge badge-danger">
                            Tidak Lulus
                          </span>
                        <?php } ?>
                      </td>
                      <td nowrap="nowrap">
                        <a href="#modal_detail_nilai<?=$result_nilai['id_nilai']?>" class="btn btn-success btn-sm" data-toggle="modal">
                          <i class="fas fa-search"></i>
                          Detail
                        </a>

                        <div class="btn-group">
                          <?php if($result_nilai['status_nilai_siswa'] == 'pending'){ ?>
                            <a class="btn btn-success btn-sm" href="<?= site_url('back/nilai/update_lolos_nilai_siswa/'.$result_nilai['id_nilai'])?>" onclick="confirm('apakah anda yakin dengan pilihan ini ?')">
                              <i class="fa fa-check"></i> Lulus
                            </a>

                            <a class="btn btn-danger btn-sm" href="<?= site_url('back/nilai/update_tidak_lolos_nilai_siswa/'.$result_nilai['id_nilai'])?>" onclick="confirm('apakah anda yakin dengan pilihan ini ?')">
                              <i class="fa fa-times"></i> Tidak Lulus
                            </a>
                          <?php }else{ ?>

                          <?php } ?>
                        </div>
                      </td>
                    <?php } ?>
                    </tr>
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

<!-- Tambah Nilai -->
<div class="modal fade" id="modal_tambah_nilai">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">Tambah Nilai Siswa</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= site_url('back/nilai/proses_tambah_nilai') ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label>Siswa</label>
                <select class="form-control select2" name="id_siswa" style="width:100%;">
                  <option selected="selected" disabled>-Cari Siswa-</option>
                  <?php foreach ($siswa as $row_siswa) { ?>
                  <option value="<?= $row_siswa['id_siswa']?>">
                    <?= $row_siswa['nama_siswa'] ?>
                  </option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Skor IQ</label>
                <input type="text" class="form-control" name="skor_iq" placeholder="e.g. 60" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between pb-0">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" onclick="confirm('apakah sudah yakin dengan data nilai ini ?')">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Detail Nilai -->
<?php foreach ($nilai as $row){ ?>
<div class="modal fade" id="modal_detail_nilai<?= $row['id_nilai'] ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">Detail Nilai Siswa : <?= $row['nama_siswa']?></h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label>NIK Siswa</label>
              <input class="form-control" value="<?= $row['nik_siswa']?>" readonly>
            </div>

            <div class="form-group">
              <label>Nama Siswa</label>
              <input class="form-control" value="<?= $row['nama_siswa'] ?>" readonly>
            </div>

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
              <input class="form-control" value="<?= $row['tanggal_lahir'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Skor IQ</label>
              <input class="form-control" value="<?= $row['skor_iq'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Status</label>
              <?php if($row['status_nilai_siswa'] == 'pending'){ ?>
                <button class="btn btn-warning btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-clock"></i> Pending
                </button>
              <?php }else if($row['status_nilai_siswa'] == 'lulus'){ ?>
                <button class="btn btn-success btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-check"></i> Lulus
                </button>
              <?php }else{ ?>
                <button class="btn btn-danger btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-times"></i> Tidak Lulus
                </button>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>