<?php 
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password' AND level='$level'");
$hasil = mysqli_num_rows($cek);

if ($hasil > 0) {
   
   $data = mysqli_fetch_array($cek);

   $_SESSION['id_user'] = $data['id_user'];
   $_SESSION['level'] = $data['level'];
   $_SESSION['nama'] = $data['nm_user'];

       echo "<script>
        window.location=('page/index.php?p=home');
    </script>";

}else{
       echo "<script>
        alert('Gagal Login! Email/password salah!');window.location=('index.php');
    </script>";
}


 ?>