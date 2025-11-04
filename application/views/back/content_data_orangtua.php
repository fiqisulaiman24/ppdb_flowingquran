<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Orang Tua Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Orang Tua Siswa</li>
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
              <h3 class="card-title mt-2">List Data Orang Tua Siswa</h3>
              <div class="card-tools">
                <a href="<?= site_url('back/orang_tua/cetak_laporan_orangtua')?>" target="_blank" class="btn btn-danger btn-sm">
                  <i class="fa fa-print"></i> Cetak Data Orang Tua Siswa
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pendaftar</th>
                      <th>Siswa</th>
                      <th>Nama Ayah</th>
                      <th>Nama Ibu</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($orang_tua as $result_orangtua) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_orangtua['nama_lengkap'] ?></td>
                      <td><?= $result_orangtua['nama_siswa'] ?></td>
                      <td><?= $result_orangtua['nama_ayah'] ?></td>
                      <td><?= $result_orangtua['nama_ibu'] ?></td>
                      <td>
                        <a href="#modal_detail_orangtua<?=$result_orangtua['id_orangtua']?>" class="btn btn-success btn-sm" data-toggle="modal">
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
      </div>
    </div>
  </div>
</div>
<?php foreach ($orang_tua as $row){ ?>
<div class="modal fade" id="modal_detail_orangtua<?= $row['id_orangtua'] ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">Detail Orang Tua Siswa : <?= $row['nama_siswa']?></h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Nama Ayah</label>
              <input class="form-control" value="<?= $row['nama_ayah']?>" readonly>
            </div>

            <div class="form-group">
              <label>Pendidikan Ayah</label>
              <input class="form-control" value="<?= $row['pendidikan_ayah'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Pekerjaan Ayah</label>
              <input class="form-control" value="<?= $row['pekerjaan_ayah'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Tempat Kerja Ayah</label>
              <input class="form-control" value="<?= $row['tempat_kerja_ayah'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>No Ponsel Ayah</label>
              <input class="form-control" value="<?= $row['no_ponsel_ayah'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Penghasilan Ayah / Bulan</label>
              <input class="form-control" value="<?= 'Rp '.number_format($row['penghasilan_ayah_bulan'],0) ?>" readonly>
            </div>
          </div>
          <!-- Divider -->
          <div class="col-lg-6">
            <div class="form-group">
              <label>Nama Ibu</label>
              <input class="form-control" value="<?= $row['nama_ibu']?>" readonly>
            </div>

            <div class="form-group">
              <label>Pendidikan Ibu</label>
              <input class="form-control" value="<?= $row['pendidikan_ibu'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Pekerjaan Ibu</label>
              <input class="form-control" value="<?= $row['pekerjaan_ibu'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Tempat Kerja Ibu</label>
              <input class="form-control" value="<?= $row['tempat_kerja_ibu'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>No Ponsel Ibu</label>
              <input class="form-control" value="<?= $row['no_ponsel_ibu'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Penghasilan Ibu / Bulan</label>
              <input class="form-control" value="<?= 'Rp '.number_format($row['penghasilan_ibu_bulan'],0) ?>" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>