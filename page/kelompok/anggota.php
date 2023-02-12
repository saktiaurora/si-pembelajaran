 <?php 
 $sql = mysqli_query($koneksi,"SELECT * FROM kelompok JOIN kelas ON kelompok.id_kelas=kelas.id_kelas WHERE id_kelompok='$_GET[id]'");
 $data= mysqli_fetch_array($sql);

 ?>
 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Anggota</h3>
 	</div>
      
    <div class="box-header">
        <p><b>Kelas: </b><?= $data['nm_kelas'] ?></p>
        <p><b>Nama Kelompok: </b><?= $data['nm_kelompok'] ?></p>
    </div>
    <div class="box-header">
      <a href="index.php?p=data-kelompok" class="btn btn-danger">Kembali</a>
   <?php if ($_SESSION['level']!=='siswa'): ?>
     <a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Anggota</a>
   <?php endif ?>
    </div> 
 
 <!-- /.box-header -->
 <div class="box-body">
     <table id="example1" class="table table-bordered table-striped">
        <thead>
           <tr>
              <th>No</th>
              <th>NIS</th>
              <th>Nama Siswa</th>
              <th></th>
          </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $sql = mysqli_query($koneksi,"SELECT * FROM klpk WHERE id_kelompok='$_GET[id]'");
        foreach ($sql as $data) {

           ?>
           <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['nis_siswa'] ?></td>
              <td><?= $data['nm_siswa'] ?></td>
              <td>
               <?php if ($_SESSION['level'] !== 'siswa'): ?>
                  
                <a href="index.php?p=hapus-anggota&id=<?= $data['id_angg'] ?>&id_kl=<?= $_GET['id'] ?>" class="btn btn-danger">Hapus</a>
               <?php endif ?>
            </td>

        </tr>
    <?php } ?>
</tbody>
</table>
</div>
</div>
 <?php 
 $sql = mysqli_query($koneksi,"SELECT * FROM kelompok JOIN kelas ON kelompok.id_kelas=kelas.id_kelas WHERE id_kelompok='$_GET[id]'");
 $data_k= mysqli_fetch_array($sql);

 ?>

<div class="modal fade" id="tambah">
  <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambah Materi</h4>
          </div>
          <form action="kelompok/simpan_anggota.php" method="POST" enctype="multipart/form-data">
              <div class="modal-body">

                 <div class="form-group">
                    <label>Pilih Siswa</label>  
                    <input type="" name="id" value="<?= $_GET['id'] ?>" hidden> 
                    <select class="form-control" name="siswa">
                        
                    <?php 
                    $sql = mysqli_query($koneksi,"SELECT siswa.*,index_prestasi.nilai FROM siswa LEFT JOIN index_prestasi ON siswa.nis_siswa=index_prestasi.nis_siswa WHERE siswa.kelas='$data_k[nm_kelas]'");
                    foreach ($sql as $data) {
                       ?>
                    <option value="<?= $data['nis_siswa'] ?>"><?= $data['nm_siswa'] ?> |
                     <?php if ($data['nilai']==false): ?>
                         <span class="text-right"> <b>Rata-Rata Nilai: 0</b></span>
                     <?php else: ?>
                         <span class="text-right"> <b>Rata-Rata Nilai: <?= $data['nilai'] ?></b></span>
                     <?php endif ?>
                    
                     </option>
                    <?php } ?>
                    </select>
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