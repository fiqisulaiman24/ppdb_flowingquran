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
		<p class="lead text-center text-uppercase">List Data Siswa</p>
		<table border="1" class="table table-bordered">
			<thead>
				<tr class="text-center">
					<th>No</th>
          <th>NIK Siswa</th>
          <th>Nama Siswa</th>
          <th>Jenis Kelamin</th>
          <th>Asal TK</th>
          <th>No Telepon</th>
				</tr>
			</thead>
			<tbody>
				<?php
	        $no = 1;
	        foreach ($siswa as $result_siswa) {
	      ?>
				<tr class="text-center">
					<td><?= $no++ ?></td>
          <td><?= $result_siswa['nik_siswa'] ?></td>
          <td><?= $result_siswa['nama_siswa'] ?></td>
          <td>
            <?php if ($result_siswa['jenis_kelamin'] == 'L'){
                echo "Laki-laki";
              }else{
                echo "Perempuan";
              }
            ?>
          </td>
          <td>
          	<?php if ($result_siswa['tk_asal'] == '-'){
                echo "-";
              }else{
                echo $result_siswa['tk_asal'];
              }
            ?>
          </td>
          <td>
          	<?php if ($result_siswa['no_telepon'] == '-'){
                echo "-";
              }else{
                echo $result_siswa['no_telepon'];
              }
            ?>
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