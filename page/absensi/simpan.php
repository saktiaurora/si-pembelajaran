<?php 

include '../../koneksi.php';

$kelas = $_POST['kelas'];
$hari = $_POST['hari'];
$jam_masuk = $_POST['jam_masuk'];
$jam_pulang = $_POST['jam_pulang'];


$simpan = mysqli_query($koneksi,"INSERT INTO jadwal_absen VALUES (NULL,'$kelas','$hari','$jam_masuk','$jam_pulang')");

if ($simpan == true) {
	echo "<script>alert('Berhasil Menyimpan');window.location='../index.php?p=data-absensi'</script>";
}else{
	echo "<script>alert('Gagal Menyimpan');window.location='../index.php?p=data-absensi'</script>";
}

 ?>