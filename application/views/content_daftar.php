  <div class="site-section ftco-subscribe-1 site-blocks-cover" style="background-image: url('images/bg_1.jpg')">
    <div class="container">
      <div class="row align-items-end justify-content-center text-center">
        <div class="col-lg-7">
          <h2 class="mb-0 mt-2">Pendaftaran Akun</h2>
          <p class="mb-0">Buat akun terlebih dahulu untuk memulai pendaftaran</p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="notif">
            <?php if($this->session->flashdata('info')){ echo $this->session->flashdata('info');} ?>
          </div>
          <form method="POST" action="<?= site_url('daftar/proses_daftar')?>">
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="username">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" class="form-control form-control-lg" placeholder="e.g. Lewis Hamilton" required autofocus>
                <small class="text-danger"><?php echo form_error('nama_lengkap') ?></small>
              </div>

              <div class="col-md-12 form-group">
                <label for="email">Username</label>
                <input type="username" name="username" value="<?= set_value('username') ?>" placeholder="e.g. hamilton44" class="form-control form-control-lg" required>
                <small class="text-danger"><?php echo form_error('username') ?></small>
              </div>

              <div class="col-md-12 form-group">
                <label for="pword">Password</label>
                <input type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password" class="form-control form-control-lg" required>
                <small class="text-danger"><?php echo form_error('password') ?></small>
              </div>

              <div class="col-md-12 form-group">
                <label for="pword2">No Ponsel / HP</label>
                <input type="text" name="no_ponsel" min="12" max="13" value="<?= set_value('no_ponsel') ?>" placeholder="e.g. 089663112386" class="form-control form-control-lg" required>
              </div>

              <div class="col-md-12 form-group">
                <label for="pword2">Alamat Lengkap</label>
                <input type="text" name="alamat" value="<?= set_value('alamat') ?>" placeholder="e.g. Jalan Hockenheim, Jerman" class="form-control form-control-lg" required>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-lg px-5">
                  Daftar
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>