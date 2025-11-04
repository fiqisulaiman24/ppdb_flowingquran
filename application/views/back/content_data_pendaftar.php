<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Pendaftar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Pendaftar</li>
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
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($pendaftar as $result_pendaftar) {
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_pendaftar['nama_lengkap'] ?></td>
                      <td><?= $result_pendaftar['username']?></td>
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
                      <td>
                        <a href="#modal_detail_pendaftar<?=$result_pendaftar['id_pendaftar']?>" class="btn btn-success btn-sm" data-toggle="modal">
                          <i class="fas fa-search"></i>
                          Detail
                        </a>

                        <a href="<?= site_url('back/pendaftar/hapus_pendaftar/'.$result_pendaftar['id_pendaftar']) ?>" class="btn btn-danger btn-sm" onclick="alert('apakah anda yakin ingin menghapus akun pendaftar ini ?')">
                          <i class="fas fa-trash"></i>
                          Hapus
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

<?php foreach ($pendaftar as $row){ ?>
<div class="modal fade" id="modal_detail_pendaftar<?= $row['id_pendaftar'] ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Pendaftar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input class="form-control" value="<?= $row['nama_lengkap']?>" readonly>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input class="form-control" value="<?= $row['username'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>No HP / Ponsel</label>
              <input class="form-control" value="<?= $row['no_ponsel'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" rows="2" readonly><?= $row['alamat']?></textarea>
            </div>

            <div class="form-group">
              <label>Status Pendaftar</label><br>
              <?php if($row['status_pendaftar'] == 'aktif'){ ?>
                <button type="button" class="btn btn-success btn-sm">
                  <i class="fa fa-check"></i> <?= ucfirst($row['status_pendaftar']) ?>
                </button>
              <?php }else{ ?>
                <button type="button" class="btn btn-danger btn-sm">
                  <i class="fa fa-times"></i> <?= ucfirst($row['status_pendaftar']) ?>
                </button>
              <?php } ?>
            </div>

            <div class="text-center">
              <?php if($row['status_pendaftar'] == 'aktif'){ ?>
                <a href="<?= site_url('back/pendaftar/nonaktif_pendaftar/'.$row['id_pendaftar'])?>" class="btn btn-danger btn-block" onclick="confirm('Apakah anda yakin ingin menonaktifkan akun pendaftar ini ?')">
                  <i class="fa fa-times"></i> Nonaktifkan Akun Pendaftar
                </a>
              <?php }else{ ?>
                <a href="<?= site_url('back/pendaftar/aktif_pendaftar/'.$row['id_pendaftar'])?>" class="btn btn-success btn-block" onclick="confirm('Apakah anda yakin ingin mengaktifkan kembali akun pendaftar ini ?')">
                  <i class="fa fa-times"></i> Aktifkan Akun Pendaftar
                </a>
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