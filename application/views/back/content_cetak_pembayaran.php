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
		<p class="lead text-center text-uppercase">List Data Pembayaran</p>
		<table border="1" class="table table-bordered">
			<thead>
				<tr class="text-center">
					<th>No</th>
					<th>Pembayar</th>
					<th>No Rekening</th>
					<th>Atas Nama</th>
					<th>Nama Bank</th>
					<th>Jumlah Bayar</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach ($pembayaran as $result_pembayaran) {
				?>
				<tr class="text-center">
					<td><?= $no++ ?></td>
					<td><?= $result_pembayaran['nama_lengkap'] ?></td>
					<td><?= $result_pembayaran['no_rekening'] ?></td>
					<td><?= $result_pembayaran['atas_nama'] ?></td>
					<td><?= $result_pembayaran['nama_bank'] ?></td>
					<td><?= 'Rp '.number_format($result_pembayaran['jumlah_bayar'],0) ?></td>
					<td>
	          <?php if($result_pembayaran['status_bayar'] == 'pending'){ ?>
	            <?= ucfirst($result_pembayaran['status_bayar']) ?>
	          <?php }else if($result_pembayaran['status_bayar'] == 'diterima'){ ?>
	            <?= ucfirst($result_pembayaran['status_bayar']) ?>
	          <?php }else{ ?>
	            <?= ucfirst($result_pembayaran['status_bayar']) ?>
	          <?php } ?>
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