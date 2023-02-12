<?php 
include '../../koneksi.php';


	$rand = rand();
	$ekstensi =  array('png','jpg','jpeg','gif');
	$filename = $_FILES['file']['name'];
	$ukuran = $_FILES['file']['size'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);

	$xx = $rand.'_'.$filename;
	move_uploaded_file($_FILES['file']['tmp_name'], '../../dist/'.$rand.'_'.$filename);

	$link = $_POST['link'];


$judul = $_POST['judul'];


$simpan = mysqli_query($koneksi,"INSERT INTO materi values (NULL,'$judul','$xx','$link','$_POST[kelas]','$_POST[pertemuan]','$_POST[tgl]','$_POST[deskripsi]')");

if ($simpan == true) {
	echo "<script>alert('Berhasil Menyimpan');window.location='../index.php?p=data-materi'</script>";
}else{
	echo "<script>alert('Gagal Menyimpan');window.location='../index.php?p=data-materi'</script>";
}

?>