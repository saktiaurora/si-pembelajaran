<?php 
include '../../koneksi.php';


$kelas = $_POST['kelas'];
$tgl = $_POST['tgl'];


$simpan = mysqli_query($koneksi,"INSERT INTO pertemuan VALUES (NULL,'$kelas','$tgl')"); 

if ($simpan == true) {
	echo "<script>alert('Berhasil Menambahkan');window.location='../index.php?p=data-kelompok'</script>";
}else{
	echo "<script>alert('Gagal! siswa sudah ada kelompok ');window.location='../index.php?p=data-kelompok'</script>";
}



 ?>