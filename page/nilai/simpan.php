<?php 
include '../../koneksi.php';
$siswa = $_POST['siswa'];

$kkm = $_POST['kkm'];
$nilai = $_POST['nilai'];
$komentar = $_POST['komentar'];

if ($nilai >= 90 AND $nilai <= 100) {
	$h = "A";
}elseif ($nilai >= 80 AND $nilai <= 89) {
	$h = "B";
}elseif ($nilai >= 75 AND $nilai <= 79 ) {
	$h = "C";
}elseif ($nilai < 75) {
	$h = "D";
}
$cek = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis_siswa='$siswa'");
$data=mysqli_fetch_array($cek);

$cek_2 = mysqli_query($koneksi,"SELECT * FROM nilai WHERE nis_siswa='$siswa'");
$data_2=mysqli_fetch_array($cek_2);

if($data_2==true){
    	echo "<script>alert('Gagal! Nilai sudah di inputkan');window.location='../index.php?p=data-nilai'</script>";
}else{

$simpan = mysqli_query($koneksi,"INSERT INTO nilai values (NULL,'$siswa','$data[kelas]','$kkm','$nilai','$h','$komentar')");

if ($simpan == true) {
	echo "<script>alert('Berhasil Menyimpan Nilai');window.location='../index.php?p=data-nilai'</script>";
}
}

 ?>