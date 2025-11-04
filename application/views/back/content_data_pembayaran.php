<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Data Pembayaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Pembayaran</li>
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
          <div class="card card-outline card-success">
            <div class="card-header">
              <h3 class="card-title mt-2">List Data Pembayaran</h3>
              <div class="card-tools">
                <a href="<?= site_url('back/pembayaran/cetak_laporan_pembayaran')?>" target="_blank" class="btn btn-danger btn-sm">
                  <i class="fa fa-print"></i> Cetak Data Pembayaran
                </a>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Pembayar</th>
                      <th>No Rekening</th>
                      <th>Atas Nama</th>
                      <th>Nama Bank</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($pembayaran as $result_pembayaran) {
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $result_pembayaran['nama_lengkap'] ?></td>
                      <td><?= $result_pembayaran['no_rekening'] ?></td>
                      <td><?= $result_pembayaran['atas_nama'] ?></td>
                      <td><?= $result_pembayaran['nama_bank'] ?></td>
                      <td>
                        <?php if($result_pembayaran['status_bayar'] == 'pending'){ ?>
                          <span class="badge badge-warning">
                            <?= ucfirst($result_pembayaran['status_bayar']) ?>
                          </span>
                        <?php }else if($result_pembayaran['status_bayar'] == 'diterima'){ ?>
                          <span class="badge badge-success">
                            <?= ucfirst($result_pembayaran['status_bayar']) ?>
                          </span>
                        <?php }else{ ?>
                          <span class="badge badge-danger">
                            <?= ucfirst($result_pembayaran['status_bayar']) ?>
                          </span>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="#modal_detail_pembayaran<?= $result_pembayaran['id_pembayaran'] ?>" class="btn btn-sm btn-success" data-toggle="modal">
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
<!-- Modal Detail Pembayaran -->
<?php foreach ($pembayaran as $result_pembayaran){ ?>
<div class="modal fade" id="modal_detail_pembayaran<?= $result_pembayaran['id_pembayaran'] ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">Detail Pembayaran</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Pembayar</label>
              <input class="form-control" value="<?= $result_pembayaran['nama_lengkap']?>" readonly>
            </div>

            <div class="form-group">
              <label>Pembayaran untuk siswa</label>
              <input class="form-control" value="<?= $result_pembayaran['nama_siswa'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Nomor Rekening</label>
              <input class="form-control" value="<?= $result_pembayaran['no_rekening'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Pembayaran Atas Nama</label>
              <input class="form-control" value="<?= strtoupper($result_pembayaran['atas_nama']) ?>" readonly>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label>Bukti Transfer</label>
              <img class="img-fluid d-block m-auto" src="<?= base_url('assets/back/pembayaran/'.$result_pembayaran['bukti']) ?>">
            </div>

            <div class="form-group">
              <label>Keterangan Pembayaran</label>
              <textarea class="form-control" rows="2" style="height: 70px;" readonly><?= $result_pembayaran['keterangan']?></textarea>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <label>Jumlah Pembayaran</label>
              <input class="form-control" value="<?= 'Rp '.number_format($result_pembayaran['jumlah_bayar'],0) ?>" readonly>
            </div>

            <div class="form-group">
              <label>Nama Bank</label>
              <input class="form-control" value="<?= $result_pembayaran['nama_bank'] ?>" readonly>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <label>Status Pembayaran</label><br>
              <?php if($result_pembayaran['status_bayar'] == 'pending'){ ?>
                <button class="btn btn-warning btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-clock"></i> Pending
                </button>
              <?php }else if($result_pembayaran['status_bayar'] == 'diterima'){ ?>
                <button class="btn btn-success btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-check"></i> Pembayaran Diterima
                </button>
              <?php }else{ ?>
                <button class="btn btn-danger btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-times"></i> Pembayaran Ditolak
                </button>
              <?php } ?>
            </div>
          </div>

          <div class="col-lg-12 text-center">
            <?php if($result_pembayaran['status_bayar'] == 'pending'){ ?>
              <a href="<?= site_url('back/pembayaran/setuju_pembayaran/'.$result_pembayaran['id_pembayaran'])?>" class="btn btn-success" onclick="confirm('apakah yakin ingin menyetujui pembayaran ini ?')">
                <i class="fa fa-check"></i> Konfirmasi Pembayaran
              </a>

              <a href="<?= site_url('back/pembayaran/tolak_pembayaran/'.$result_pembayaran['id_pembayaran'])?>" class="btn btn-danger" onclick="confirm('apakah yakin ingin tolak pembayaran ini ?')">
                <i class="fa fa-times"></i> Tolak Pembayaran
              </a>
            <?php }else if($result_pembayaran['status_bayar'] == 'ditolak'){ ?>
            <?php } ?>
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
<script type="text/javascript">
  $('#modal_detail_pembayaran').modal('show')
</script>