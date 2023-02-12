<?php 
include '../../../koneksi.php';

$nis = $_POST['nis_siswa'];
$id_kelompok = $_POST['id_kelompok'];

$tgl = date('Y-m-d H:i:s');
$id_pertemuan = $_POST['id_pertemuan'];
$type = $_POST['type'];

if ($_POST['type']=='file') {
$rand = rand();
$filename = $_FILES['isi_pesan']['name'];
$xx = $rand.'_'.$filename;
move_uploaded_file($_FILES['isi_pesan']['tmp_name'], '../../../dist/'.$rand.'_'.$filename);
$simpan = mysqli_query($koneksi,"INSERT INTO chat VALUES (NOT NULL,'$id_kelompok','$nis','$tgl','$xx','$id_pertemuan','$type')");
echo "<script>window.location='../../index.php?p=buka-forum-diskusi&id_pertemuan=$id_pertemuan&id_kelompok=$id_kelompok'</script>";
}else{
    $isi = $_POST['isi_pesan'];
    $simpan = mysqli_query($koneksi,"INSERT INTO chat VALUES (NOT NULL,'$id_kelompok','$nis','$tgl','$isi','$id_pertemuan','$type')");
}




 ?>