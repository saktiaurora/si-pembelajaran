<?php 

include '../../koneksi.php';

$nm = $_POST['nm_kelas'];

$simpan = mysqli_query($koneksi,"INSERT INTO kelas VALUES (NULL,'$nm')");

if ($simpan == true) {
	echo "<script>alert('Berhasil Menyimpan');window.location='../index.php?p=data-kelas'</script>";
}else{
	echo "<script>alert('Gagal Menyimpan');window.location='../index.php?p=data-kelas'</script>";
}

 ?>