<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">
            Edit Data Orang Tua
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
            <li class="breadcrumb-item">Edit Orang Tua</li>
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
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card card-success card-outline">
            <div class="card-body">
              <form method="POST" action="<?= site_url('siswa/proses_edit_orangtua')?>">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Nama Ayah</label>
                      <input type="hidden" name="id_orangtua" value="<?=$detail_ortu['id_orangtua']?>">
                      <?php foreach ($get_siswa as $row_siswa) { ?>
                        <input type="hidden" name="id_siswa" value="<?= $row_siswa['id_siswa'] ?>">
                      <?php } ?>
                      <input type="text" class="form-control" name="nama_ayah" value="<?= $detail_ortu['nama_ayah']?>" required>
                    </div>

                    <div class="form-group">
                      <label>Pendidikan Ayah</label>
                      <select style="cursor: pointer;" class="form-control" name="pendidikan_ayah" required>
                        <?php if(empty($detail_ortu['pendidikan_ayah'])){ ?>
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
                        <?php }else{ ?>
                          <option value="<?= $detail_ortu['pendidikan_ayah'] ?>" selected>
                            <?= $detail_ortu['pendidikan_ayah'] ?>
                          </option>
                          <option value="0">Tidak Sekolah</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="SMK">SMK</option>
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Pekerjaan Ayah</label>
                      <input type="text" class="form-control" placeholder="e.g. PNS" name="pekerjaan_ayah" value="<?= $detail_ortu['pekerjaan_ayah']?>" required>
                    </div>

                    <div class="form-group">
                      <label>Tempat Bekerja Ayah</label>
                      <input type="text" class="form-control" placeholder="e.g. Kementrian Kesehatan" name="tempat_kerja_ayah" value="<?= $detail_ortu['tempat_kerja_ayah']?>" required>
                    </div>

                    <div class="form-group">
                      <label>No Ponsel / Hp Ayah</label>
                      <input type="text" class="form-control" placeholder="e.g. 08389200900" name="no_ponsel_ayah" value="<?= $detail_ortu['no_ponsel_ayah']?>" required>
                    </div>

                    <div class="form-group">
                      <label>Penghasilan Ayah Per bulan</label>
                      <input type="text" class="form-control" placeholder="e.g. Rp 5,000.000" name="penghasilan_ayah_bulan" value="<?= $detail_ortu['penghasilan_ayah_bulan']?>" required>
                    </div>
                  </div>
                  <!-- Divider -->
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Nama Ibu</label>
                      <input type="text" class="form-control" name="nama_ibu" placeholder="e.g. Sarmilah" value="<?= $detail_ortu['nama_ibu']?>" required>
                    </div>

                    <div class="form-group">
                      <label>Pendidikan Ibu</label>
                      <select style="cursor: pointer;" class="form-control" name="pendidikan_ibu" required>
                        <?php if(empty($detail_ortu['pendidikan_ibu'])){ ?>
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
                        <?php }else{ ?>
                          <option value="<?= $detail_ortu['pendidikan_ayah'] ?>" selected>
                            <?= $detail_ortu['pendidikan_ayah'] ?>
                          </option>
                          <option value="0">Tidak Sekolah</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="SMK">SMK</option>
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Pekerjaan Ibu</label>
                      <input type="text" class="form-control" placeholder="e.g. Ibu Rumah Tanggal" name="pekerjaan_ibu" value="<?= $detail_ortu['pekerjaan_ibu'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label>Tempat Bekerja Ibu</label>
                      <input type="text" class="form-control" placeholder="e.g. Kementrian Kesehatan" name="tempat_kerja_ibu" value="<?= $detail_ortu['tempat_kerja_ibu'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label>No Ponsel / Hp Ibu</label>
                      <input type="text" class="form-control" placeholder="e.g. 08389200900" name="no_ponsel_ibu" value="<?= $detail_ortu['no_ponsel_ibu'] ?>" required>
                    </div>

                    <div class="form-group">
                      <label>Penghasilan Ibu Per bulan</label>
                      <input type="text" class="form-control" placeholder="e.g. Rp 1,000.000" name="penghasilan_ibu_bulan" value="<?= $detail_ortu['penghasilan_ibu_bulan'] ?>" required>
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