 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Kelompok</h3>
 	</div>
   <?php if ($_SESSION['level']!=='siswa'): ?>
      
 	<div class="box-header">
 		<a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kelompok</a>

       <a href="" data-toggle="modal" data-target="#tambah-pertemuan" class="btn btn-success">Tambah Pertemuan</a>

       <a href="index.php?p=index-prestasi-pilih-kelas" class="btn btn-warning"><i class="fa fa-search"></i> Rata-Rata Nilai Siswa</a>

 	</div>
   <?php endif ?>
 	<!-- /.box-header -->
 	<div class="box-body">
 		<table id="example1" class="table table-bordered table-striped">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Kelas</th>
 					<th>Nama Kelompok</th>
               <th>Anggota</th>
             
               <th>Ruang diskusi</th>
               </tr>
            </thead>
            <tbody>
                <?php 
                $no=1;
                if ($_SESSION['level']=='siswa') {
                   $sql = mysqli_query($koneksi,"SELECT * FROM kelompok JOIN kelas JOIN klpk ON kelompok.id_kelas=kelas.id_kelas AND kelompok.id_kelompok=klpk.id_kelompok WHERE klpk.nis_siswa='$_SESSION[id_user]'");
                }else{
                  $sql = mysqli_query($koneksi,"SELECT * FROM kelompok JOIN kelas ON kelompok.id_kelas=kelas.id_kelas");
                }
                foreach ($sql as $data) {

                   ?>
                   <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $data['nm_kelas'] ?></td>
                      <td><?= $data['nm_kelompok'] ?></td>
                      <td>
                        <a href="index.php?p=anggota&id=<?= $data['id_kelompok'] ?>" class="btn btn-primary">Lihat</a>
                    </td>
                   
                    <td>
                        <a href="index.php?p=forum-diskusi&id_kelas=<?= $data['id_kelas'] ?>&id_kelompok=<?= $data['id_kelompok'] ?>" class="btn btn-danger">Buka</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
<!-- tambah pertemuan -->

<div class="modal fade" id="tambah-pertemuan">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Pertemuan</h4>
          </div>
          <form action="kelompok/tambah_pertemuan.php" method="POST">
               <div class="modal-body">
                  <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="kelas">
                        <?php 
                        $sql = mysqli_query($koneksi,"SELECT * FROM kelas");
                        foreach ($sql as $data) {
                           ?>
                        <option value="<?= $data['id_kelas'] ?>"><?= $data['nm_kelas'] ?></option>
                        <?php } ?>
                       </select>
                   </div>
                  <div class="form-group">
                     <label>Tanggal</label>
                     <input type="date" name="tgl" class="form-control">
                  </div>  
               </div>
                <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
         </form>
     </div>
     <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>


<div class="modal fade" id="tambah">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Kelompok</h4>
          </div>
          <form action="kelompok/simpan.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">

                 <div class="form-group">
                    <label>Kelas</label>
                    <select class="form-control" name="kelas">
                        <?php 
                        $sql = mysqli_query($koneksi,"SELECT * FROM kelas");
                        foreach ($sql as $data) {
                           ?>
                        <option value="<?= $data['id_kelas'] ?>"><?= $data['nm_kelas'] ?></option>
                        <?php } ?>
                       </select>
                   </div>
                   <div class="form-group">
                    <label>Nama Kelompok</label>
                    <input type="text" name="nm_kelompok" class="form-control" >
                </div>

                <div class="modal-footer">
                 <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
         </form>
     </div>
     <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>

