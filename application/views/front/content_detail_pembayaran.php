<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            Detail Pembayaran
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="#">Pembayaran</a>
            </li>
            <li class="breadcrumb-item">Detail Pembayaran</li>
          </ol>
        </div>
      </div>
    </div>
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

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Pembayar</label>
                    <input type="hidden" name="id_pembayaran" value="<?= $detail['id_pembayaran'] ?>">
                    <input class="form-control" value="<?= $detail['nama_lengkap'] ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label>Pembayaran untuk siswa</label>
                    <input class="form-control" value="<?= $detail['nama_siswa'] ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label>Nomor Rekening</label>
                    <input class="form-control" value="<?= $detail['no_rekening']?>" readonly>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="form-group">
                    <label>Pembayaran Atas Nama</label>
                    <input class="form-control" value="<?= strtoupper($detail['atas_nama'])?>" readonly>
                  </div>

                  <div class="form-group">
                    <label>Jumlah Pembayaran</label>
                    <input class="form-control" value="<?= 'Rp '.number_format($detail['jumlah_bayar'],0) ?>" readonly>
                  </div>

                  <div class="form-group">
                    <label>Keterangan Pembayaran</label>
                    <textarea class="form-control" rows="1" readonly><?= $detail['keterangan'] ?></textarea>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Bukti Transfer</label>
                    <img class="img-fluid d-block m-auto" src="<?= base_url('assets/back/pembayaran/'.$detail['bukti']) ?>">
                  </div>

                  <div class="form-group">
                    <label>Status Pembayaran</label><br>
                    <?php if($detail['status_bayar'] == 'pending'){ ?>
                      <span class="badge badge-warning">
                        Pembayaran dipending
                      </span>
                    <?php }else if($detail['status_bayar'] == 'diterima'){ ?>
                      <span class="badge badge-success">
                       Pembayaran diterima
                      </span>
                    <?php }else{ ?>
                      <span class="badge badge-danger">
                        Pembayaran ditolak
                      </span>
                    <?php } ?>
                  </div>
                </div>

                <div class="col-lg-12">
                  <?php if($detail['status_bayar'] == 'diterima'){ ?>
                    <a href="<?= site_url('pembayaran/cetak_pembayaran/'.$detail['id_pembayaran'])?>" class="btn btn-success btn-block pl-2 pr-2">
                      <i class="fa fa-print"></i>
                      Cetak Bukti Pembayaran
                    </a>
                  <?php }else{ ?>
                  <?php } ?>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->