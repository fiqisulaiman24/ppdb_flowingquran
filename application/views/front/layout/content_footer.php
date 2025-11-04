 <!-- Main Footer -->
  <footer class="main-footer">
    <div class="container-fluid">
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
<script src="<?= base_url('assets/front/inc/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/front/inc/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- Datatables -->
<script src="<?= base_url('assets/back/inc/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/back/inc/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/front/inc/js/adminlte.min.js')?>"></script>
<script type="text/javascript">
  $(function () {
    $("#tabel_data").DataTable();
    $("#tabel_data_1").DataTable();
  });

  $(document).ready(function() {
    // show the alert
    $(".notif").fadeTo(3000, 500).slideUp(500, function() {
      $(".notif").slideUp(5000);
    });
  });
</script>
</body>
</html>