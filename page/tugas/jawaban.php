<?php 
$sql = mysqli_query($koneksi,"SELECT * FROM tugas JOIN kelas ON tugas.id_kelas=kelas.nm_kelas WHERE id_tugas='$_GET[id_tugas]'");
$data=mysqli_fetch_array($sql);

?>
<div class="box">
  <div class="box-header">
     <h3 class="box-title">Jawaban Tugas <b><?= $data['judul'] ?></b> Kelas <b><?= $data['nm_kelas'] ?></b></h3>
 </div>
 <div class="box-header">
     <a href="index.php?p=data-tugas" class="btn btn-danger">Kembali</a>
     <?php if ($_SESSION['level']=='siswa'): ?>
        <a href="" data-toggle="modal" data-target="#upload" class="btn btn-primary"> Upload Jawaban</a>
     <?php endif ?>
 </div>
 <!-- /.box-header -->
 <div class="box-body">
     <table id="example1" class="table table-bordered table-striped">
        <thead>
           <tr>
              <th>No</th>
              <th>Nama Kelompok</th>
              <th>File Jawaban</th>
              <th>Tanggal Upload</th>
              <th>Nilai</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
        <?php 
        $no=1;
        $sql = mysqli_query($koneksi,"SELECT * FROM jawaban_tugas JOIN kelompok ON jawaban_tugas.id_kelompok=kelompok.id_kelompok WHERE id_tugas='$_GET[id_tugas]'");
        foreach ($sql as $data) {

           ?>
           <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['nm_kelompok'] ?></td>
              <td>
                <a href="../dist/<?= $data['file_jawaban'] ?>">Lihat Jawaban</a>
            </td>
            <td><?= $data['tgl_upload'] ?></td>
            <td><?= $data['nilai'] ?></td>
            <td>

                <?php if ($_SESSION['level']!=='siswa'): ?>
                   <a onclick="return confirm('Hapus Tugas?')" href="index.php?p=hapus-tugas&id=<?= $data['id_tugas'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>   
                   <a href="" data-toggle="modal" data-target="#nilai<?= $data['id_kelompok'] ?>" class="btn btn-success"><i class="fa fa-check"></i> Nilai</a>   
               <?php endif ?> 

           </td>
       </tr>
       <div class="modal fade" id="nilai<?= $data['id_kelompok'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tambah Nilai</h4>
                    </div>
                    <form action="tugas/nilai.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="form-group">
                                <label>Input Nilai</label>
                                <input type="" name="id_kl" value="<?= $data['id_kelompok'] ?>" hidden>
                                <input type="" name="id_tugas" value="<?= $data['id_tugas'] ?>" hidden>
                                <input type="" name="nilai" class="form-control">
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
        <?php } ?>
    </tbody>
</table>
</div>
</div>

<div class="modal fade" id="upload">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Upload Jawaban</h4>
                </div>
                <form action="tugas/upload_jawaban.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kelompok Asal</label>
                            <input hidden type="" name="id_tugas" value="<?= $_GET['id_tugas'] ?>">
                            <select class="form-control" name="id_kelompok">
                                <?php 
                                  $sql = mysqli_query($koneksi,"SELECT * FROM kelompok JOIN kelas JOIN klpk ON kelompok.id_kelas=kelas.id_kelas AND kelompok.id_kelompok=klpk.id_kelompok WHERE klpk.nis_siswa='$_SESSION[id_user]'");
                                  foreach ($sql as $data) {
                                      

                                 ?>
                                <option value="<?= $data['id_kelompok'] ?>"><?= $data['nm_kelompok'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Upload Jawaban</label>
                            <input type="file" name="file" class="form-control">
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