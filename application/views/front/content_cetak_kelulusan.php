<div class="col-md-6 offset-md-3" style="margin-top: 140px;">
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
<script type="text/javascript">
  window.print();
</script>