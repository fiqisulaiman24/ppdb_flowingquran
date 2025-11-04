<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Posting Informasi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Posting Informasi</li>
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
          <a href="#modal_tambah_informasi" class="btn btn-success btn-sm mb-4" data-toggle="modal">
            <i class="fa fa-plus"></i> Tambah
          </a>
          <div class="notif text-center text-bold">
            <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="tabel_data" class="table table-bordered table-striped text-center">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kegiatan</th>
                      <th>Jadwal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach ($informasi as $result_informasi){
                  ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $result_informasi['kegiatan'] ?></td>
                      <td>
                        <?=
                          date('d M',strtotime($result_informasi['tanggal_mulai'])).' s/d '.date('d M',strtotime($result_informasi['tanggal_akhir']))
                        ?>
                      </td>
                      <td nowrap="nowrap">
                        <a href="#modal_edit_informasi<?= $result_informasi['id_informasi'] ?>" class="btn btn-info btn-sm" data-toggle="modal">
                          <i class="fa fa-edit"></i> Edit
                        </a>

                        <a href="<?= site_url('back/informasi/proses_hapus_informasi/'.$result_informasi['id_informasi'])?>" class="btn btn-danger btn-sm" onclick="confirm('apakah anda yakin ingin menghapus informasi ini ?')">
                          <i class="fa fa-trash"></i> Hapus
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

<!-- Tambah Informasi -->
<div class="modal fade" id="modal_tambah_informasi">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">Tambah Informasi</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= site_url('back/informasi/proses_tambah_informasi') ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="text" name="kegiatan" class="form-control" placeholder="e.g. Pembukaan penerimaan peserta didik baru" required>
              </div>

              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" class="form-control" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between pb-0">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" onclick="confirm('apakah sudah yakin dengan informasi ini ?')">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Informasi -->
<?php foreach ($informasi as $row) { ?>
<div class="modal fade" id="modal_edit_informasi<?= $row['id_informasi']?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title text-white">Edit Informasi</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?= site_url('back/informasi/proses_edit_informasi') ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label>Nama Kegiatan</label>
                <input type="hidden" name="id_informasi" value="<?= $row['id_informasi'] ?>">
                <input type="text" name="kegiatan" class="form-control" placeholder="e.g. Pembukaan penerimaan peserta didik baru" value="<?= $row['kegiatan'] ?>" required>
              </div>

              <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" value="<?= $row['tanggal_mulai'] ?>" class="form-control" required>
              </div>

              <div class="form-group">
                <label>Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" value="<?= $row['tanggal_akhir'] ?>" class="form-control" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between pb-0">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" onclick="confirm('apakah sudah yakin dengan informasi ini ?')">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>