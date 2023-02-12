<?php 

$hapus = mysqli_query($koneksi,"DELETE FROM tugas WHERE id_tugas='$_GET[id]'");

if ($hapus == true) {
	echo "<script>alert('Berhasil Menghapus');window.location='index.php?p=data-tugas'</script>";
}else{
	echo "<script>alert('Gagal Menghapus');window.location='index.php?p=data-tugas'</script>";
}

?>