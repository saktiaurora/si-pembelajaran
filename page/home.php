

<div class="box text-center">  
  <img  src="../dist/img/l.png">
  <h4 class="text-center" style="color:black;">Selamat Datang di Sistem Informasi Pembelajaran Bahasa Inggris SMAN 1 Lembah Gumanti</h4><br>
  
</div>
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>
      <?php 

      $sql = mysqli_query($koneksi,"SELECT count(nis_siswa) as jumlah FROM siswa");
      $data = mysqli_fetch_array($sql);

       ?>
      <div class="info-box-content">
        <span class="info-box-text">Data Siswa</span>
        <span class="info-box-number"><?= $data['jumlah'] ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red"><i class="fa fa-book"></i></span>
      <?php 

      $sql = mysqli_query($koneksi,"SELECT count(id_materi) as jumlah FROM materi");
      $data = mysqli_fetch_array($sql);

       ?>
      <div class="info-box-content">
        <span class="info-box-text">Materi Pelajaran</span>
        <span class="info-box-number"><?= $data['jumlah'] ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
      <?php 

      $sql = mysqli_query($koneksi,"SELECT count(id_kelompok) as jumlah FROM kelompok");
      $data = mysqli_fetch_array($sql);

       ?>
      <div class="info-box-content">
        <span class="info-box-text">Jumlah Kelompok</span>
        <span class="info-box-number"><?= $data['jumlah'] ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>
      <?php 

      $sql = mysqli_query($koneksi,"SELECT count(id_tugas) as jumlah FROM tugas");
      $data = mysqli_fetch_array($sql);

       ?>
      <div class="info-box-content">
        <span class="info-box-text">Tugas</span>
        <span class="info-box-number"><?= $data['jumlah'] ?></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
