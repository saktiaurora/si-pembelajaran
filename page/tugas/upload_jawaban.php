<?php 
include '../../koneksi.php';

$id = $_POST['id_kelompok'];
$id_tugas = $_POST['id_tugas'];
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['file']['name'];
$ukuran = $_FILES['file']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$xx = $rand.'_'.$filename;
move_uploaded_file($_FILES['file']['tmp_name'], '../../dist/'.$rand.'_'.$filename);

$tgl = date('Y-m-d H:i:s');

$simpan = mysqli_query($koneksi,"INSERT INTO jawaban_tugas VALUES ('$id_tugas','$id','$xx','$tgl','0')");

if ($simpan == true) {
	echo "<script>alert('Berhasil Menyimpan Jawaban Tugas');window.location='../index.php?p=jawaban&id_tugas=$id_tugas'</script>";
}else{
	echo "<script>alert('Gagal! Jawban Tugas sudah ditambahkan');window.location='../index.php?p=jawaban&id_tugas=$id_tugas'</script>";
}


?>