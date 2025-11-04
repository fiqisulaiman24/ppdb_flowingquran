<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              Tambah Pembayaran
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
              <li class="breadcrumb-item">Tambah Pembayaran</li>
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
        </div>

        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <form method="POST" action="<?= site_url('pembayaran/proses_pembayaran')?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Pembayaran Untuk Siswa</label>
                    <select class="form-control" name="id_siswa" style="cursor: pointer;" readonly>
                      <?php
                        foreach ($siswa_by_pendaftar as $row) {
                      ?>
                      <option value="<?= $row['id_siswa']?>">
                        <?= $row['nama_siswa'] ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label>No Rekening</label>
                  <input type="text" class="form-control" name="no_rekening" placeholder="e.g. 15348573" required>
                  <span class="text-danger"><?= form_error('no_rekening') ?></span>
                </div>

                <div class="form-group">
                  <label>Nama Bank</label>
                  <input type="text" class="form-control" name="nama_bank" placeholder="e.g. BCA" required>
                  <span class="text-danger"><?= form_error('nama_bank') ?></span>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Atas Nama</label>
                  <input type="text" class="form-control" name="atas_nama" placeholder="e.g. FIQI SULAIMAN" required>
                  <span class="text-danger"><?= form_error('atas_nama') ?></span>
                </div>

                <div class="form-group">
                  <label>Jumlah Bayar</label>
                  <input type="text" class="form-control" name="jumlah_bayar" placeholder="e.g. Rp 1,000.000" required>
                  <span class="text-danger"><?= form_error('jumlah_bayar') ?></span>
                </div>
              </div>

              <div class="col-lg-4">
                <div class="form-group">
                  <label>Keterangan Pembayaran</label>
                  <textarea class="form-control" name="keterangan" style="height: 125px;" placeholder="e.g. Pembayaran pendaftaran baru"></textarea>
                  <span class="text-danger"><?= form_error('keterangan') ?></span>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="form-group">
                  <label>Upload Bukti :</label><br>
                  <input type="file" name="bukti" id="imgInp">
                </div>
              </div>
              <div class="col-lg-4">
                <div class="form-group">
                  <label>Gambar :</label>
                  <img width="100%" id="blah" alt="Foto Surat Pengantar" src="<?= base_url('assets/front/img/blank_bukti_pembayaran.jpg') ?>">
                </div>
              </div>

              <button type="submit" class="btn btn-success" onclick="confirm('apakah anda yakin? anda tidak bisa lagi mengedit pembayaran ini')">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.content-wrapper -->
<script src="<?= base_url('assets/front/lib/jquery.min.js') ?>"></script>
<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#imgInp").change(function() {
    readURL(this);
  });
</script>