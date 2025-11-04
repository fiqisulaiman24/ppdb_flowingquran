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
		<p class="lead text-center text-uppercase">List Data Orang Tua Siswa</p>
		<table border="1" class="table table-bordered">
			<thead>
				<tr class="text-center">
					<th>No</th>
          <th>Pendaftar</th>
          <th>Siswa</th>
          <th>Nama Ayah</th>
          <th>Nama Ibu</th>
          <th>No Ponsel Ayah</th>
          <th>No Ponsel Ibu</th>
				</tr>
			</thead>
			<tbody>
				<?php
	        $no = 1;
	        foreach ($orang_tua as $result_orangtua) {
	      ?>
				<tr class="text-center">
					<td><?= $no++ ?></td>
          <td><?= $result_orangtua['nama_lengkap'] ?></td>
          <td><?= $result_orangtua['nama_siswa'] ?></td>
          <td><?= $result_orangtua['nama_ayah'] ?></td>
          <td><?= $result_orangtua['nama_ibu'] ?></td>
          <td><?= $result_orangtua['no_ponsel_ayah'] ?></td>
          <td><?= $result_orangtua['no_ponsel_ibu'] ?></td>
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