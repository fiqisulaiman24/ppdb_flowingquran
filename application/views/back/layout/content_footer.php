 <!-- Main Footer -->
  <footer class="main-footer">
    <div class="container">
    	<!-- To the right -->
	    <div class="float-right d-none d-sm-inline">
	      
	    </div>
	    <!-- Default to the left -->
	    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/back/inc/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/back/inc/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Datatables -->
<script src="<?= base_url('assets/back/inc/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/back/inc/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<!-- Select2 -->
<script src="<?= base_url('assets/back/inc/plugins/select2/js/select2.full.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/back/inc/js/adminlte.min.js')?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    // show the alert
    $(".notif").fadeTo(2000, 500).slideUp(500, function() {
      $(".notif").slideUp(1000);
    });

    $("#tabel_data").DataTable();
    $("#tabel_data_1").DataTable();

    $('.select2').select2()
  });
</script>
</body>
</html>