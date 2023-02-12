<?php 
include '../../koneksi.php';

$judul = $_POST['judul'];
$ket = $_POST['ket'];
$kelas = $_POST['kelas'];
$tgl = $_POST['tgl_deadline'];
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['file']['name'];
$ukuran = $_FILES['file']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$xx = $rand.'_'.$filename;
move_uploaded_file($_FILES['file']['tmp_name'], '../../dist/'.$rand.'_'.$filename);

$simpan = mysqli_query($koneksi,"INSERT INTO tugas VALUES (NULL,'$kelas','$judul','$ket','$xx','$tgl','$_POST[pertemuan]','$_POST[tgl]')");

if ($simpan == true) {
	echo "<script>alert('Berhasil Menyimpan');window.location='../index.php?p=data-tugas'</script>";
}else{
	echo "<script>alert('Gagal Menyimpan');window.location='../index.php?p=data-tugas'</script>";
}

?>