<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Berkas Siswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Berkas Siswa</li>
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
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pendaftar</th>
                      <th>NISN</th>
                      <th>Nama Siswa</th>
                      <th>Foto</th>
                      <th>Akte Lahir</th>
                      <th>Surat KK</th>
                      <th>Rapor Terakhir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no = 1;
                      foreach ($berkas as $result_berkas) {
                    ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_berkas['nama_lengkap'] ?></td>
                      <td><?= $result_berkas['nisn_siswa'] ?></td>
                      <td><?= $result_berkas['nama_siswa'] ?></td>
                      <td nowrap="nowrap">
                        <?php if($result_berkas['foto_siswa'] == NULL){ ?>
                          <span class="badge badge-danger p-2">
                            <i class="fa fa-times"></i>&nbsp;&nbsp;Tidak ada
                          </span>
                        <?php }else{ ?>
                          <span class="badge badge-success p-2">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Selesai
                          </span>
                          <a href="#modal_foto_siswa<?=$result_berkas['id_berkas']?>" data-toggle="modal" class="btn btn-info btn-xs p-1">
                            <i class="fa fa-eye"></i> Lihat
                          </a>
                        <?php } ?>
                      </td>
                      <td nowrap="nowrap">
                        <?php if($result_berkas['surat_akte_lahir'] == NULL){ ?>
                          <span class="badge badge-danger p-2">
                            <i class="fa fa-times"></i>&nbsp;&nbsp;Tidak ada
                          </span>
                        <?php }else{ ?>
                          <span class="badge badge-success p-2">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Selesai
                          </span>
                          <a href="#modal_akte_lahir<?=$result_berkas['id_berkas']?>" class="btn btn-info btn-xs p-1" data-toggle="modal">
                            <i class="fa fa-eye"></i> Lihat
                          </a>
                        <?php } ?>
                      </td>
                      <td nowrap="nowrap">
                        <?php if($result_berkas['surat_kk'] == NULL){ ?>
                          <span class="badge badge-danger p-2">
                            <i class="fa fa-times"></i>&nbsp;&nbsp;Tidak ada
                          </span>
                        <?php }else{ ?>
                          <span class="badge badge-success p-2">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Selesai
                          </span>
                          <a href="#modal_surat_kk<?=$result_berkas['id_berkas']?>" class="btn btn-info btn-xs p-1" data-toggle="modal">
                            <i class="fa fa-eye"></i> Lihat
                          </a>
                        <?php } ?>
                      </td>
                      <td nowrap="nowrap">
                        <?php if($result_berkas['foto_rapor_terakhir'] == NULL){ ?>
                          <span class="badge badge-danger p-2">
                            <i class="fa fa-times"></i>&nbsp;&nbsp;Tidak ada
                          </span>
                        <?php }else{ ?>
                          <span class="badge badge-success p-2">
                            <i class="fa fa-check"></i>&nbsp;&nbsp;Selesai
                          </span>
                          <a href="#modal_rapor_terakhir<?=$result_berkas['id_berkas']?>" class="btn btn-info btn-xs p-1" data-toggle="modal">
                            <i class="fa fa-eye"></i> Lihat
                          </a>
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

<?php foreach ($berkas as $row) { ?>
<div class="modal fade" id="modal_foto_siswa<?= $row['id_berkas'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title">Foto Siswa : <?= $row['nama_siswa'] ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/back/berkas_siswa/foto_siswa/'.$row['foto_siswa'])?>" class="img-fluid d-block m-auto">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_akte_lahir<?= $row['id_berkas'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title">Surat Akte Lahir : <?= $row['nama_siswa'] ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/back/berkas_siswa/surat_akte_lahir/'.$row['surat_akte_lahir'])?>" class="img-fluid d-block m-auto">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_surat_kk<?= $row['id_berkas'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title">Surat KK : <?= $row['nama_siswa'] ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/back/berkas_siswa/surat_kk/'.$row['surat_kk'])?>" class="img-fluid d-block m-auto">
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_rapor_terakhir<?= $row['id_berkas'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title">Rapor Terakhir : <?= $row['nama_siswa'] ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?= base_url('assets/back/berkas_siswa/foto_rapor_terakhir/'.$row['foto_rapor_terakhir'])?>" class="img-fluid d-block m-auto">
      </div>
    </div>
  </div>
</div>
<?php } ?>