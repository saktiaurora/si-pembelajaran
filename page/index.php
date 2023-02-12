<?php date_default_timezone_set('Asia/Jakarta');
 session_start(); include'../koneksi.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMPEL | SISTEM INFORMASI PEMBELAJARAN SMAN 1 LEMBAH GUMANTI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>I</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SISTEM INFORMASI PEMBELAJARAN</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/avatar-1.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $_SESSION['nama'] ?> as <?= $_SESSION['level'] ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/avatar-1.png" class="img-circle" alt="User Image">

                <p>
                  <?= $_SESSION['nama'] ?>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../keluar.php" class="btn btn-danger btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="index.php?p=home"><i class="fa fa-home"></i>Home</a></li>
        <?php include 'menu.php' ?>
        <li class="header">PENGATURAN</li>
         <li><a href="index.php?p=profil"><i class="fa fa-user"></i>Profil</a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sistem Informasi Pembelajaran SMAN 1 Lembah Gumanti
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <?php include 'route.php'; ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     <!-- <b>Version</b> 2.4.18-->
    </div>
    <strong>Copyright &copy; 2023, Green School</a>.</strong> All rights
    reserved.
  </footer>

 </div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
     $('#example1').DataTable()
  })
</script>
<script type="text/javascript">

    $("#kirim-pesan").click(function(e) {
        e.preventDefault();
        

        var nis_siswa = $("input[name=nis_siswa]").val();
        var id_kelompok = $("input[name=id_kelompok]").val();
        var id_pertemuan = $("input[name=id_pertemuan]").val();
        var type = $("input[name=type]").val();
      
          var isi_pesan = $("#isi-pesan").val();
        

        $.ajax({
            url:'kelompok/diskusi/simpan.php',
            method:'POST',
            data:{
               
                nis_siswa:nis_siswa,
                id_kelompok:id_kelompok,
                id_pertemuan:id_pertemuan,
                type:type,
                isi_pesan:isi_pesan,
             
            },
            success: function(data){
                $("#isi-pesan").val('');
                loadDataChat();
                
            }
        });
    });

loadDataChat();
    function loadDataChat() {
     $.ajax({
      url:'kelompok/diskusi/show.php',
      type:'GET',
      data:{
        id_user:"<?= $_SESSION['id_user']; ?>",
        id_kelompok:"<?= $_GET['id_kelompok']; ?>",
        id_pertemuan:"<?= $_GET['id_pertemuan']; ?>",

      },
      success: function (data) {
        $("#view_chat").html(data);
      }
    });
   }
</script>

<script type="text/javascript">
  $("#link").click(function () {
      $("#type_materi").html('<input type="text" name="link" placeholder="Masukan Link" class="form-control" >')
  })
</script>
<script type="text/javascript">
  $("#file").click(function () {
      $("#type_materi").html('<input type="file" name="file" placeholder="" class="form-control" >')
  })
</script>
</body>
</html>
