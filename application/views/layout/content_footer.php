  <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <p class="mb-4"><img src="<?= base_url('assets/front/images/logo-fq.jpeg')?>" width="64" alt="Image" class="img-fluid rounded"></p>
            <p>
              MIT Flowing Quran adalah Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Beatae nemo minima qui dolor, iusto iure.
            </p>
          </div>

          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Menu</span></h3>
            <ul class="list-unstyled">
              <li><a href="<?= site_url('beranda')?>">Home</a></li>
              <li><a href="<?= site_url('profil')?>">Profil Sekolah</a></li>
              <li><a href="<?= site_url('informasi')?>">Informasi</a></li>
            </ul>
          </div>

          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Social Media</span></h3>
            <ul class="list-unstyled">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Instagram</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Linkedin</a></li>
            </ul>
          </div>

          <div class="col-lg-3">
            <h3 class="footer-heading"><span>Kontak</span></h3>
            <ul class="list-unstyled">
              <li><a href="#">+62 838 5691 9090</a></li>
              <li><a href="#">021 5674 4655</a></li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#51be78"/></svg></div>

  <script src="<?= base_url('assets/front/js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/jquery-migrate-3.0.1.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/jquery-ui.js')?>"></script>
  <script src="<?= base_url('assets/front/js/popper.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/bootstrap.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/owl.carousel.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/jquery.stellar.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/jquery.countdown.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/jquery.easing.1.3.js')?>"></script>
  <script src="<?= base_url('assets/front/js/aos.js')?>"></script>
  <script src="<?= base_url('assets/front/js/jquery.fancybox.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/jquery.sticky.js')?>"></script>
  <script src="<?= base_url('assets/front/js/jquery.mb.YTPlayer.min.js')?>"></script>
  <script src="<?= base_url('assets/front/js/main.js')?>"></script>
  <!-- Datatables -->
  <script src="<?= base_url('assets/back/inc/plugins/datatables/jquery.dataTables.min.js')?>"></script>
  <script src="<?= base_url('assets/back/inc/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $("#tabel_informasi").DataTable();
      $(".notif").fadeTo(2000, 500).slideUp(500, function() {
        $(".notif").slideUp(1000);
      });
    });
  </script>
</body>
</html>