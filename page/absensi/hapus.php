<?php 

$hapus = mysqli_query($koneksi,"DELETE FROM jadwal_absen WHERE id_jadwal='$_GET[id]'");

if ($hapus == true) {
	echo "<script>alert('Berhasil Menghapus');window.location='index.php?p=data-absensi'</script>";
}else{
	echo "<script>alert('Gagal Menghapus');window.location='index.php?p=data-absensi'</script>";
}

?>