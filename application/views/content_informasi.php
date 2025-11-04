<div class="site-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 mt-3 pt-5">
      	<h2 class="section-title-underline style-2 text-center text-black mb-3 pb-5">
          <span>Informasi</span>
        </h2>
        <div class="table-responsive">
	        <table id="tabel_informasi" class="table table-bordered table-striped">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Kegiatan</th>
	              <th>Jadwal</th>
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
	            </tr>
	          <?php } ?>
	          </tbody>
	        </table>
	      </div>
      </div>
    </div>
  </div>
</div>