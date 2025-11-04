<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              Pembayaran
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">
                <a href="#">Dashboard</a>
              </li>
              <li class="breadcrumb-item">Pembayaran</li>
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

          <div class="col-lg-12">
            <a href="<?= site_url('pembayaran/tambah_pembayaran')?>" class="btn btn-success mb-3">Tambah Pembayaran</a>
            <div class="callout callout-success">
              <b class="text-uppercase">
                Harap melakukan pembayaran formulir ke rekening mandiri syariah &mdash; <span class="text-primary">1657384792</span>
                atas nama <span class="text-primary">Madrasah islam terpadu flowing quran</span> sejumlah Rp. 400.000 <br>kemudian upload bukti pembayaran pada tabel di bawah ini.
              </b>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="tabel_data" class="table table-bordered table-striped text-center">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Rekening</th>
                        <th>Atas Nama</th>
                        <th>Nama Bank</th>
                        <th>Jumlah Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $no = 1;
                      foreach ($pembayaran_by_pendaftar as $result) {
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $result['no_rekening'] ?></td>
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
                        <td>
                          <a href="#modal_detail_pembayaran<?= $result['id_pembayaran'] ?>" class="btn btn-success" data-toggle="modal">Detail</a>
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
<!-- /.content-wrapper -->

<?php foreach ($detail_pembayaran_pendaftar as $row){ ?>
<div class="modal fade" id="modal_detail_pembayaran<?= $row['id_pembayaran'] ?>" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">Detail Pembayaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Pembayar</label>
              <input class="form-control" value="<?= $row['nama_lengkap']?>" readonly>
            </div>

            <div class="form-group">
              <label>Pembayaran untuk siswa</label>
              <input class="form-control" value="<?= $row['nama_siswa'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Nomor Rekening</label>
              <input class="form-control" value="<?= $row['no_rekening'] ?>" readonly>
            </div>

            <div class="form-group">
              <label>Pembayaran Atas Nama</label>
              <input class="form-control" value="<?= strtoupper($row['atas_nama']) ?>" readonly>
            </div>

            <div class="form-group">
              <label>Jumlah Pembayaran</label>
              <input class="form-control" value="<?= 'Rp '.number_format($row['jumlah_bayar'],0) ?>" readonly>
            </div>

            <div class="form-group">
              <label>Nama Bank</label>
              <input class="form-control" value="<?= $row['nama_bank'] ?>" readonly>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-group">
              <label>Bukti Transfer</label>
              <img class="img-fluid" src="<?= base_url('assets/back/pembayaran/'.$row['bukti']) ?>">
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <label>Keterangan Pembayaran</label>
              <textarea class="form-control" rows="2" readonly><?= $row['keterangan']?></textarea>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-group">
              <label>Status Pembayaran</label><br>
              <?php if($row['status_bayar'] == 'pending'){ ?>
                <button class="btn btn-warning btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-clock"></i> Pending
                </button>
              <?php }else if($row['status_bayar'] == 'diterima'){ ?>
                <button class="btn btn-success btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-check"></i> Pembayaran Diterima
                </button>
              <?php }else{ ?>
                <button class="btn btn-danger btn-block btn-sm" style="cursor:auto;">
                  <i class="fa fa-times"></i> Pembayaran Ditolak
                </button>
              <?php } ?>
            </div>

            <div class="form-group">
              <?php if($row['status_bayar'] == 'diterima'){ ?>
                <a href="<?= site_url('pembayaran/cetak_pembayaran/'.$row['id_pembayaran'])?>" target="_blank" class="btn btn-success btn-block pl-2 pr-2">
                  <i class="fa fa-print"></i>
                  Cetak Bukti Pembayaran
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