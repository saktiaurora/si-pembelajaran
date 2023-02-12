<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  	<title>Laporan Nilai Siswa</title>
  </head>
  <body style="background-color:#bbb;">
  	<?php 
  	include '../../koneksi.php';
  	if (isset($_POST['kelas'])) {


  	}else{
  		echo "<script>window.location='../index.php?p=data-nilai'</script>";
  	}
  	$sql = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas='$_POST[kelas]'");
  	$data = mysqli_fetch_array($sql);
  	?>
  	<div style="background-color:#fff;width: 80%; margin: 0 auto;">
  		<div class="box">
  			<div class="box-header text-center">
  				<div class="row">
  					
  				<div class="col-lg-2">
  					<img src="../../dist/img/l.png" width="120px">
  				</div>
  				<div class="col-lg-8">
  					<h4><b>SMAN 1 LEMBAH GUMANTI</b></h4>
  				<p>Jl. Muaro Danau Diatas, Alahan Panjang Kec. Lembah Gumanti Kab. Solok Prov. Sumatera Barat</p>
  				<hr>

  				<h5><b>LAPORAN NILAI SISWA <br> SEMESTER Genap/2023-2024</b></h5>
  				</div>
  			</div>
  		</div>
  			<div class="box-header">
  				<h4><b>KELAS: <?= $_POST['kelas'] ?></b></h4>
  			</div>

  			<div class="box-body">
  				<table class="table table-bordered">
  					<thead>
  						<tr>
  							<th>No</th>
  							<th>Nis Siswa</th>
  							<th>Nama Siswa</th>
  							<th>Jenis Kelamin</th>
  							<th>KKM</th>
  							<th>Nilai</th>
  							<th>Huruf</th>
  						</tr>
  					</thead>
  					<tbody>
  						<?php 
  						$no=1;
  						$sql = mysqli_query($koneksi,"SELECT * FROM nilai_siswa WHERE kelas='$_POST[kelas]'");
  						foreach ($sql as $data) {

  							?>
  							<tr>
  								<td><?= $no++; ?></td>
  								<td><?= $data['nis_siswa'] ?></td>
  								<td><?= $data['nm_siswa'] ?></td>
  								<td><?= $data['jk'] ?></td>
  								<td><?= $data['kkm'] ?></td>
  								<td><?= $data['nilai'] ?></td>
  								<td><?= $data['huruf'] ?></td>
  							</tr>

  							<?php } ?>

  							<tr>
  								<th style="text-align:right;" colspan="7">Alahan Panjang, <?= date('d/m/Y') ?> <br><br><br><br> (..................................)</th>
  							</tr>
  						</tbody>
  					</table>
  				</div>
  			</div>
  		</div>
  	</div>


  	</body>
  	</html>