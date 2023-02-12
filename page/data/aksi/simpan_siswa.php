<?php 
include '../../../koneksi.php';
$id = $_POST['id'];
$nm = $_POST['nm'];
$jk = $_POST['jk'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];
$simpan = mysqli_query($koneksi,"INSERT INTO user VALUES ('$id','$nm','$jk','$_POST[kelas]','$telp','$alamat','$username','$password','siswa')");

if ($simpan == true) {
	echo "<script>alert('Berhasil Menyimpan');window.location='../../index.php?p=data-siswa'</script>";
}else{
	echo "<script>alert('Gagal Menyimpan');window.location='../../index.php?p=data-siswa'</script>";
}

 ?>