<section class="content" style="margin-top: 135px;">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!-- Main content -->
        <div class="invoice p-3 mb-3" style="border:1px solid #000;">
          <!-- title row -->
          <div class="row">
            <div class="col-12">
              <h4>
                <img src="<?= base_url('assets/front/images/logo-fq.jpeg')?>" width="32" style="margin-bottom: 13px;">
                <span class="text-success">MIT Flowing Quran</span>
                <small class="float-right">Tanggal : <?= date('d/m/Y')?></small>
              </h4>
            </div>
            <!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info mb-3">
            <div class="col-sm-6 invoice-col">
              Pembayaran untuk Siswa :
              <address>
                <strong>
                  <?= $detail_pembayaran['nama_siswa']?>
                </strong><br>
              </address>
            </div>

            <div class="col-sm-6 invoice-col">
              <b>Invoice : <?= '# '.$detail_pembayaran['id_pembayaran'] ?></b><br>
              <b>Tanggal Pembayaran :</b> <?= date('d/m/Y',strtotime($detail_pembayaran['timecreated_pembayaran'])) ?><br>
              <b>Pendaftar :</b> <?= $detail_pembayaran['nama_lengkap'] ?>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Atas Nama</th>
                  <th>No Rekening</th>
                  <th>Bank</th>
                  <th>Keterangan</th>
                  <th>Jumlah Bayar</th>
                </tr>
                </thead>
                <?php
                  $no = 1;
                  foreach ($data_pembayaran as $result) {
                ?>
                <tbody>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= strtoupper($result['atas_nama']) ?></td>
                  <td><?= $result['no_rekening'] ?></td>
                  <td><?= $result['nama_bank'] ?></td>
                  <td><?= $result['keterangan'] ?></td>
                  <td><?= 'Rp '.number_format($result['jumlah_bayar'],0) ?></td>
                </tr>
                </tbody>
                <?php } ?>
              </table>
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              <p class="lead">Status Pembayaran :</p>
              <p class="text-muted well well-sm shadow-none">
                <span class="text-success">
                  <i class="fa fa-check"></i>
                  &nbsp; Pembayaran Diterima
                </span>
              </p>
            </div>
            <div class="col-6">
              <p class="lead">Catatan :</p>
              <p class="text-muted well well-sm shadow-none">
                Harap dicetak dan disimpan bukti pembayaran ini untuk meminimalisir apabila terjadi kesalahan dalam pembayaran. Terima kasih
              </p>
            </div>
          </div>
          <!-- /.row -->
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script type="text/javascript">
  window.print();
</script>