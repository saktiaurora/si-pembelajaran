<?php 

$hapus = mysqli_query($koneksi,"DELETE FROM nilai WHERE id_nilai='$_GET[id]'");

if ($hapus == true) {
	echo "<script>alert('Berhasil Menghapus');window.location='index.php?p=data-nilai'</script>";
}else{
	echo "<script>alert('Gagal Menghapus');window.location='index.php?p=data-nilai'</script>";
}

?>