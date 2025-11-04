<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-12">
          <!-- Harus nya teks -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="notif text-center text-bold">
            <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
          </div>
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Langkah Ke 2<br>Mengisi biodata Orang Tua</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="<?= site_url('pendaftaran/proses_daftar_orangtua')?>">
                <input type="hidden" name="id_pendaftar" value="<?= $this->session->userdata('id_pendaftar'); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <label>Orang Tua dari Siswa</label>
                    <select class="form-control" name="id_siswa" style="cursor: pointer;" readonly>
                      <?php
                        $id_pendaftar = $this->session->userdata('id_pendaftar');
                        foreach ($siswa_by_pendaftar as $row) {
                      ?>
                      <option value="<?= $row['id_siswa']?>">
                        <?= $row['nama_siswa'] ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- Divider -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        Nama Ayah
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" name="nama_ayah" placeholder="e.g. Jos Verstappen" required>
                    </div>

                    <div class="form-group">
                      <label>
                        Pendidikan Ayah
                        <span class="text-danger">*wajib</span>
                      </label>
                      <select style="cursor: pointer;" class="form-control" name="pendidikan_ayah">
                        <option value="">-Pilih-</option>
                        <option value="0">Tidak Sekolah</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>
                        Pekerjaan Ayah
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" placeholder="e.g. PNS" name="pekerjaan_ayah">
                    </div>

                    <div class="form-group">
                      <label>
                        Tempat Bekerja Ayah
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" placeholder="e.g. Kementrian Kesehatan" name="tempat_kerja_ayah">
                    </div>

                    <div class="form-group">
                      <label>
                        No Ponsel / Hp Ayah
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" placeholder="e.g. 08389200900" name="no_ponsel_ayah">
                    </div>

                    <div class="form-group">
                      <label>
                        Penghasilan Ayah Per bulan
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" placeholder="e.g. Rp 5,000.000" name="penghasilan_ayah_bulan" required>
                    </div>
                  </div>
                  <!-- Divider -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                        Nama Ibu
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" name="nama_ibu" placeholder="e.g. Jos Verstappen" required>
                    </div>

                    <div class="form-group">
                      <label>
                        Pendidikan Ibu
                        <span class="text-danger">*wajib</span>
                      </label>
                      <select style="cursor: pointer;" class="form-control" name="pendidikan_ibu" required>
                        <option value="">-Pilih-</option>
                        <option value="0">Tidak Sekolah</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="SMK">SMK</option>
                        <option value="D3">D3</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>
                        Pekerjaan Ibu
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" placeholder="e.g. Ibu Rumah Tangga" name="pekerjaan_ibu" required>
                    </div>

                    <div class="form-group">
                      <label>
                        Tempat Bekerja Ibu
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" placeholder="e.g. Rumah" name="tempat_kerja_ibu" required>
                    </div>

                    <div class="form-group">
                      <label>
                        No Ponsel / Hp Ibu
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" placeholder="e.g. 08389200900" name="no_ponsel_ibu" required>
                    </div>

                    <div class="form-group">
                      <label>
                        Penghasilan Ibu Per bulan
                        <span class="text-danger">*wajib</span>
                      </label>
                      <input type="text" class="form-control" placeholder="e.g. Rp 5,000.000" name="penghasilan_ibu_bulan" required>
                    </div>
                  </div>
                </div>

                <div class="text-center">
                  <button type="reset" class="btn btn-danger">Reset</button>
                  <button type="submit" onclick="confirm('Apakah data sudah benar? anda bisa mengubah nya nanti')" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </div>
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">

</script>