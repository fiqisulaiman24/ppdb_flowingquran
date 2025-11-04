<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/front/css/bootstrap.min.css')?>">
</head>
<body>
	<div class="container">
		<header>
			<div class="row">
				<div class="col-lg-12">
					<h2 class="text-center">Madrasah Islam Flowing Quran</h2>
					<p class="text-center p-0 m-0">Jalan Raya Condet, Pangeran Balekambang Kramat Jati 13530</p>
				</div>
			</div>
		</header>
		<hr style="background: #000;">
		<p class="lead text-center text-uppercase">List Data Siswa Lulus</p>
		<table border="1" class="table table-bordered">
			<thead>
				<tr class="text-center">
					<th>No</th>
          <th>NIK Siswa</th>
          <th>Nama Siswa</th>
          <th>Jenis Kelamin</th>
          <th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
	        $no = 1;
	        foreach ($siswa_lulus as $result_siswa_lulus) {
	      ?>
				<tr class="text-center">
					<td><?= $no++ ?></td>
          <td><?= $result_siswa_lulus['nik_siswa'] ?></td>
          <td><?= $result_siswa_lulus['nama_siswa'] ?></td>
          <td>
            <?php if ($result_siswa_lulus['jenis_kelamin'] == 'L'){
                echo "Laki-laki";
              }else{
                echo "Perempuan";
              }
            ?>
          </td>
          <td>
            <?= ucfirst($result_siswa_lulus['status']) ?>
          </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
</html>
<!-- <script type="text/javascript">
	window.print();
</script> -->