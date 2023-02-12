<?php 

$hapus = mysqli_query($koneksi,"DELETE FROM materi WHERE id_materi='$_GET[id]'");

if ($hapus == true) {
	echo "<script>alert('Berhasil Menghapus');window.location='index.php?p=data-materi'</script>";
}else{
	echo "<script>alert('Gagal Menghapus');window.location='index.php?p=data-materi'</script>";
}

?>