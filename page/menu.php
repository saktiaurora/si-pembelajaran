<?php if (isset($_SESSION['level'])): ?>
  <?php if ($_SESSION['level']=='admin'): ?>  
    <li class="treeview">
      <a href="#">
        <i class="fa fa-table"></i> <span>Data</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="index.php?p=data-admin"><i class="fa fa-circle-o"></i> Admin</a></li>
        <li><a href="index.php?p=data-siswa"><i class="fa fa-circle-o"></i> Siswa</a></li>
        <li><a href="index.php?p=data-guru"><i class="fa fa-circle-o"></i> Guru</a></li>
        <li><a href="index.php?p=data-kelas"><i class="fa fa-circle-o"></i> Kelas</a></li>
      </ul>
    </li>
  <?php endif ?>

  <?php if ($_SESSION['level']=='guru'): ?>
    <li><a href="index.php?p=data-absensi"><i class="fa fa-check"></i> Data Absensi</a></li>
    <li><a href="index.php?p=data-materi"><i class="fa fa-book"></i> Data Materi</a></li>
    <li><a href="index.php?p=data-kelompok"><i class="fa fa-users"></i> Data Diskusi</a></li>
    <li><a href="index.php?p=data-tugas"><i class="fa fa-book"></i> Data Tugas</a></li>
    <li><a href="index.php?p=data-nilai"><i class="fa fa-list"></i> Data Nilai</a></li>
  <?php endif ?>

  <?php if ($_SESSION['level']=='siswa'): ?>
    <li><a href="index.php?p=data-absensi"><i class="fa fa-check"></i> Data Absensi</a></li>
    <li><a href="index.php?p=data-materi"><i class="fa fa-book"></i> Data Materi</a></li>
    <li><a href="index.php?p=data-kelompok"><i class="fa fa-users"></i> Forum Diskusi</a></li>
    <li><a href="index.php?p=data-tugas"><i class="fa fa-book"></i> Data Tugas</a></li>
    <li><a href="index.php?p=data-nilai"><i class="fa fa-list"></i> Data Nilai</a></li>
  <?php endif ?>
<?php endif ?>


