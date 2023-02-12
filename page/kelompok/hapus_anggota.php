<?php 

$hapus = mysqli_query($koneksi,"DELETE FROM anggota_kelompok WHERE id_angg='$_GET[id]'");

if ($hapus == true) {
	echo "<script>alert('Berhasil Menghapus');window.location='index.php?p=anggota&id=$_GET[id_kl]'</script>";
}else{
	echo "<script>alert('Gagal Menghapus');window.location='index.php?p=p=anggota&id=$_GET[id_kl]'</script>";
}

?>