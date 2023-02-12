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
  	<title>Laporan Absensi</title>
  </head>
  <body style="background-color:#bbb;">
  	 <?php 
  	 include '../../koneksi.php';
  	 if (isset($_POST['bulan'])) {
		
  	 	
  	 }else{
  	 	echo "<script>window.location='../index.php?p=data-absensi'</script>";
  	 }
	
	

	$sql = mysqli_query($koneksi,"SELECT  jadwal_absen.*,kelas.nm_kelas FROM jadwal_absen JOIN kelas ON jadwal_absen.id_kelas=kelas.id_kelas WHERE id_jadwal='$_POST[id]'");
	$data = mysqli_fetch_array($sql);

	if ($_POST['bulan']==1) {
		$bulan= "Januari";
	}elseif ($_POST['bulan']==2) {
		$bulan= "Februari";
	}elseif ($_POST['bulan']==3) {
		$bulan= "Maret";
	}elseif ($_POST['bulan']==4) {
		$bulan= "April";
	}elseif ($_POST['bulan']==5) {
		$bulan= "Mei";
	}elseif ($_POST['bulan']==6) {
		$bulan= "Juni";
	}elseif ($_POST['bulan']==7) {
		$bulan= "Juli";
	}elseif ($_POST['bulan']==8) {
		$bulan= "Agustus";
	}elseif ($_POST['bulan']==9) {
		$bulan= "September";
	}elseif ($_POST['bulan']==10) {
		$bulan= "Oktober";
	}elseif ($_POST['bulan']==11) {
		echo "November";
	}elseif ($_POST['bulan']==12) {
		$bulan= "Desember";
	}

  ?>
  	<div style="background-color:#fff; width: 95%;margin: 0 auto;">
  		<div class="box">
  			<div class="box-header text-center">
  				<div class="col-lg-2">
  					<img src="../../dist/img/l.png" width="120px">
  				</div>
  				<div class="col-lg-8">
  					<h4><b>SMAN 1 LEMBAH GUMANTI</b></h4>
  				<p>Jl. Muaro Danau Diatas, Alahan Panjang Kec. Lembah Gumanti Kab. Solok Prov. Sumatera Barat</p>
  				<hr>

  				<h5><b>LAPORAN ABSENSI SISWA <br> SEMESTER Genap/2023-2024</b></h5>
  				</div>
  			</div>
  			<div class="box-header">
  				<h4><b>KELAS: <?= $data['nm_kelas'] ?></b></h4>
  			</div>

  			<table align="center" style="width:98%;" class="table table-bordered">
  				<tr>
  					<th rowspan="2">No</th>
  					<th rowspan="2">NIS</th>
  					<th rowspan="2">Nama Siswa</th>
  					<th colspan="31" class="text-center"><?= $bulan ?></th>
  					<th colspan="4">Rekap</th>
  				</tr>
  				<tr>
  					
  					<?php 

  						for ($i=1; $i <= 31 ; $i++) { 
  							
  					 ?>
  					<th><?= $i; ?></th>
  					<?php } ?>
  					<th>H</th>
  					<th>I</th>
  					<th>S</th>
  					<th>A</th>
  				</tr>
  				<?php
  				include '../../koneksi.php';
  				$no=1; 
  				
  				$sql = mysqli_query($koneksi,"SELECT  sum(ket='H') as jm_h,sum(ket='I') as jm_i,sum(ket='S') as jm_s, sum(ket='A') as jm_a,nis_siswa,nm_siswa,tgl,ket FROM lap_absen WHERE id_jadwal='$_POST[id]' AND bulan='$_POST[bulan]' GROUP BY nis_siswa ");
 				foreach ($sql as $data) {

  				 ?>
  				<tr>
  					<td><?= $no++; ?></td>
  					<td><?= $data['nis_siswa'] ?></td>
  					<td><?= $data['nm_siswa'] ?></td>
  					
  					<?php 
  					for ($i=1; $i <= 31 ; $i++) { 
  						
  					$sql = mysqli_query($koneksi,"SELECT * FROM lap_absen WHERE nis_siswa='$data[nis_siswa]' AND tgl=$i");
  					$dt= mysqli_fetch_array($sql);

  					if ($dt==true) {
  						echo "<td>".$dt['ket']."</td>";
  					}else{
  						echo "<td style='color:red'>0</td>";
  					}
  					}
  					 ?>
  					
  					<td style="color:blue"><?= $data['jm_h'] ?></td>
  					<td style="color:blue"><?= $data['jm_i'] ?></td>
  					<td style="color:blue"><?= $data['jm_s'] ?></td>
  					<td style="color:blue"><?= $data['jm_a'] ?></td>
  					
  					
  				</tr>
  				<?php } ?>
  				<tr>
  					<th style="text-align:right;" colspan="38">Alahan Panjang, <?= date('d/m/Y') ?> <br><br><br><br> (..................................)</th>
  				</tr>
  			</table>
  			<br><br>
  			<br><br>
  			<br><br>
  		</div>
  	</div>

  </body>
  </html>