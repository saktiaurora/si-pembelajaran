<?php 
include '../../koneksi.php';
$id = $_POST['id_kl'];
$id_tugas = $_POST['id_tugas'];
$nilai = $_POST['nilai'];

$simpan = mysqli_query($koneksi,"UPDATE jawaban_tugas SET nilai='$nilai' WHERE id_tugas='$id_tugas' AND id_kelompok='$id'");

if ($simpan == true) {
	echo "<script>alert('Berhasil Menyimpan');window.location='../index.php?p=jawaban&id_tugas=$id_tugas'</script>";
}else{
	echo "<script>alert('Gagal Menyimpan');window.location='../index.php?p=jawaban&id_tugas=$id_tugas'</script>";
}


 ?>