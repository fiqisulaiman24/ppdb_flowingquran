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
          <div class="card">
            <div class="card-header bg-success">
              <h3 class="card-title">Langkah 1<br>Mengisi biodata Siswa</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="<?= site_url('pendaftaran/proses_daftar_siswa') ?>">
                <input type="hidden" name="id_pendaftar" value="<?= $this->session->userdata('id_pendaftar'); ?>">
                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      Nama Lengkap
                      <span class="text-danger">*wajib</span>
                    </label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_siswa" placeholder="e.g. Sebastian Vettel" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      Jenis Kelamin
                      <span class="text-danger">*wajib</span>
                    </label>
                  </div>
                  <div class="col-sm-2">
                    <select style="cursor: pointer;" class="form-control" name="jenis_kelamin" required>
                      <option value="">-Pilih-</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      Tempat Lahir
                      <span class="text-danger">*wajib</span>
                    </label>
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="tempat_lahir" placeholder="e.g. Jakarta Timur" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      Tanggal Lahir
                      <span class="text-danger">*wajib</span>
                    </label>
                  </div>
                  <div class="col-sm-5">
                    <input type="date" class="form-control" name="tanggal_lahir" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      Alamat Lengkap
                      <span class="text-danger">*wajib</span>
                    </label>
                  </div>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="2" name="alamat_lengkap" placeholder="e.g. Jalan Raya Condet, Gg.Pangeran Balekambang, Kramat Jati"></textarea>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      Anak ke ...
                      <span class="text-danger">*wajib</span>
                    </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" name="anak_ke" placeholder="e.g. 1" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      Dari ... Saudara
                      <span class="text-danger">*wajib</span>
                    </label>
                  </div>
                  <div class="col-sm-3">
                    <input type="number" class="form-control" name="dari_bersaudara" placeholder="e.g. 5" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      NIK Siswa
                      <span class="text-danger">*wajib</span>
                    </label>
                  </div>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" name="nik_siswa" placeholder="NIK Siswa berdasarkan kartu keluarga" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      No Telepon
                      <span class="text-danger">*jika tidak ada ketik - (strip)</span>
                    </label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="no_telepon" placeholder="e.g. 089663112386" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-2">
                    <label>
                      Asal TK
                      <span class="text-danger">*jika tidak ada ketik - (strip)</span>
                    </label>
                  </div>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tk_asal" placeholder="e.g. TK Ratna Kusuma" required>
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