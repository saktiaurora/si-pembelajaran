<?php 
    
    $cek_guru = mysqli_query($koneksi,"SELECT * FROM guru WHERE nip_guru='$_SESSION[id_user]'");
    $data_guru = mysqli_fetch_array($cek_guru);
   

 ?>
 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Nilai Siswa</h3>
 	</div>
 	

  <?php if ($_SESSION['level']!=='siswa'): ?>
   <div class="box-header">
      <a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Nilai</a>
   </div>
       <div class="box-header">
        <div class="form-group">
        <form action="nilai/cetak.php" method="POST">
            <div class="form-group row col-lg-6">
                <label>Kelas</label>
                <select class="form-control" name="kelas">
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT * FROM kelas");
                    foreach ($sql as $data) {
                     ?>    
                     <option value="<?= $data['nm_kelas'] ?>"><?= $data['nm_kelas'] ?></option>
                 <?php } ?>                
             </select>
            </div>
            <div class="form-group row col-lg-8">
                <button type="submit" class="btn btn-danger">Cetak</button>
            </div>
        </form>
    </div>
    </div>
  <?php endif ?>
<!-- /.box-header -->
<div class="box-body">
 <table id="example1" class="table table-bordered table-striped">
    <thead>
       <tr>
          <th>No</th>
          <th>Kelas</th>
          <th>Nis Siswa</th>
          <th>Nama Siswa</th>
          <th>KKM</th>
          <th>Nilai</th>
          <th>Huruf</th>
          <th>Komentar</th>
          <th></th>
      </tr>
  </thead>
  <tbody>
    <?php 
    $no=1;
    if ($_SESSION['level']=='siswa') {
       $sql = mysqli_query($koneksi,"SELECT * FROM nilai_siswa WHERE nis_siswa='$_SESSION[id_user]'");
    }else{
      $sql = mysqli_query($koneksi,"SELECT * FROM nilai_siswa ORDER BY kelas");
    }
    foreach ($sql as $data) {

       ?>
       <tr>
          <td><?= $no++; ?></td>
          <td><?= $data['kelas'] ?></td>
          <td><?= $data['nis_siswa'] ?></td>
          <td><?= $data['nm_siswa'] ?></td>
          <td><?= $data['kkm'] ?></td>
          <td><?= $data['nilai'] ?></td>
          <td><?= $data['huruf'] ?></td>
          <td><?= $data['komentar'] ?></td>
          <td>
            <?php if ($_SESSION['level']!=='siswa'): ?>
               
             <a onclick="return confirm('Yakin untuk menghapus?')" href="index.php?p=hapus-nilai&id=<?= $data['id_nilai'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
            <?php endif ?>
         </td>
     </tr>
 <?php } ?>
</tbody>
</table>
</div>
</div>


<div class="modal fade" id="tambah">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Nilai</h4>
          </div>
          <form action="nilai/simpan.php" method="POST">
              <div class="modal-body">
               <div class="form-group">
                <label>Siswa</label>
                <select class="form-control" name="siswa">
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT * FROM siswa");
                    foreach ($sql as $data) {
                       ?>    
                       <option value="<?= $data['nis_siswa'] ?>"><?= $data['nm_siswa'] ?></option>
                   <?php } ?>                
               </select>
           </div>
           <div class="form-group">
            <label>KKM</label>
            <input type="" name="kkm" value="75" class="form-control">
        </div>
        <div class="form-group">
            <label>NILAI</label>
            <input type="" name="nilai" value=""  class="form-control">
        </div>
        <div class="form-group">
            <label>KOMENTAR</label>
            <input type="" name="komentar" value=""  class="form-control">
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