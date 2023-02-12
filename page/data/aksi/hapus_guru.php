<?php 

$hapus = mysqli_query($koneksi,"DELETE FROM user WHERE id_user='$_GET[id]'");

if ($hapus == true) {
	echo "<script>alert('Berhasil Menghapus');window.location='index.php?p=data-guru'</script>";
}else{
	echo "<script>alert('Gagal Menghapus');window.location='index.php?p=data-guru'</script>";
}

?>