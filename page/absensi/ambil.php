<?php 
date_default_timezone_set('Asia/Jakarta');
include '../../koneksi.php';

$nis = $_POST['nis'];
$tgl = $_POST['tgl'];
$id = $_POST['id'];
$jam = date('H:i:s');
$ket = $_POST['ket'];

$simpan = mysqli_query($koneksi,"INSERT INTO absen_siswa VALUES ('$nis','$tgl','$id','$jam','$ket')");

if ($simpan == true) {
	echo "<script>alert('Absen berhasil disimpan');window.location='../index.php?p=show&id=$id'</script>";
}else{
	echo "<script>alert('Gagal! anda sudah mengambil absensi hari ini!');window.location='../index.php?p=show&id=$id'</script>";
}


 ?>