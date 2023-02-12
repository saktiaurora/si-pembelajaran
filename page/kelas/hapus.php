<?php 

$hapus = mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='$_GET[id]'");

if ($hapus == true) {
	echo "<script>alert('Berhasil Menghapus');window.location='index.php?p=data-kelas'</script>";
}else{
	echo "<script>alert('Gagal Menghapus');window.location='index.php?p=data-kelas'</script>";
}

?>