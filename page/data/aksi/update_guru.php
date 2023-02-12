<?php 
include '../../../koneksi.php';
$id = $_POST['id'];
$nm = $_POST['nm'];
$jk = $_POST['jk'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = $_POST['password'];
$update = mysqli_query($koneksi,"UPDATE user SET nm_user='$nm',jk='$jk',telepon='$telp',alamat='$alamat',username='$username',password='$password' WHERE id_user='$id'");

if ($update == true) {
	echo "<script>alert('Berhasil Menyimpan');window.location='../../index.php?p=data-guru'</script>";
}else{
	echo "<script>alert('Gagal Menyimpan');window.location='../../index.php?p=data-guru'</script>";
}

 ?>