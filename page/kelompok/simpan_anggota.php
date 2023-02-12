<?php 
include '../../koneksi.php';

$id_kelompok = $_POST['id'];
$siswa = $_POST['siswa'];

$cek = mysqli_query($koneksi,"SELECT * FROM anggota_kelompok WHERE nis_siswa='$siswa'");
$data = mysqli_fetch_array($cek);

if($data==true){
    echo "<script>alert('Gagal! siswa sudah ada kelompok ');window.location='../index.php?p=anggota&id=$id_kelompok'</script>";
}else{
    

$simpan = mysqli_query($koneksi,"INSERT INTO anggota_kelompok VALUES (NULL,'$id_kelompok','$siswa')"); 

if ($simpan == true) {
	echo "<script>alert('Berhasil Menambahkan');window.location='../index.php?p=anggota&id=$id_kelompok'</script>";
}else{
	echo "<script>alert('Gagal! siswa sudah ada kelompok ');window.location='../index.php?p=anggota&id=$id_kelompok'</script>";
}
}



 ?>