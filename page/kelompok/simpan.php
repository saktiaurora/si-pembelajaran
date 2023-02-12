<?php 
include '../../koneksi.php';


$kelas = $_POST['kelas'];
$nm = $_POST['nm_kelompok'];


$simpan = mysqli_query($koneksi,"INSERT INTO kelompok VALUES (NULL,'$kelas','$nm')"); 

if ($simpan == true) {
	echo "<script>alert('Berhasil Menambahkan');window.location='../index.php?p=data-kelompok'</script>";
}else{
	echo "<script>alert('Gagal! siswa sudah ada kelompok ');window.location='../index.php?p=data-kelompok'</script>";
}



 ?>