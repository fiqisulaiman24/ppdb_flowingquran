<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            Edit Siswa : <?= $detail_siswa['nama_siswa'] ?>
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
              <a href="#">Siswa</a>
            </li>
            <li class="breadcrumb-item">Edit Siswa</li>
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
          <div class="card card-success card-outline">
            <div class="card-body">
              <form method="POST" action="<?= site_url('siswa/proses_edit_siswa')?>">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Nama Lengkap :</label>
                      <input type="hidden" name="id_siswa" value="<?= $detail_siswa['id_siswa'] ?>">
                      <input class="form-control" name="nama_siswa" value="<?= $detail_siswa['nama_siswa'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jenis_kelamin" required>
                        <?php if($detail_siswa['jenis_kelamin'] == 'L'){ ?>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        <?php }else if($detail_siswa['jenis_kelamin'] == 'P'){ ?>
                          <option value="P">Perempuan</option>
                          <option value="L">Laki-Laki</option>
                        <?php }else{ ?>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input class="form-control" name="tempat_lahir" value="<?= $detail_siswa['tempat_lahir'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date" class="form-control" name="tanggal_lahir" value="<?= $detail_siswa['tanggal_lahir'] ?>" required>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>NIK Siswa</label>
                      <input type="text" class="form-control" name="nik_siswa" value="<?= $detail_siswa['nik_siswa'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label>No Telepon</label>
                      <?php if($detail_siswa['no_telepon'] == '-'){ ?>
                        <input type="text" class="form-control" name="no_telepon" name="no_telepon" value="-">
                      <?php }else{ ?>
                        <input type="text" class="form-control" name="no_telepon" value="<?= $detail_siswa['no_telepon'] ?>" required>
                      <?php } ?>
                    </div>

                    <div class="form-group">
                      <label>Anak Ke ... dari</label>
                      <input class="form-control" name="anak_ke" value="<?= $detail_siswa['anak_ke'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label>TK Asal</label>
                      <?php if($detail_siswa['tk_asal'] == '-'){ ?>
                        <input type="text" class="form-control" name="tk_asal" value="-">
                      <?php }else{ ?>
                        <input type="text" class="form-control" name="tk_asal" value="<?= $detail_siswa['tk_asal'] ?>" required>
                      <?php } ?>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat_lengkap" rows="2" required><?= $detail_siswa['alamat_lengkap'] ?></textarea>
                    </div>
                  </div>
                </div>

                <button type="submit" class="btn btn-success btn-block" onclick="confirm('apakah sudah yakin ?')">
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->