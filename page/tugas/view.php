<?php

$cek_siswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis_siswa='$_SESSION[id_user]'");
$data_siswa = mysqli_fetch_array($cek_siswa);

$cek_guru = mysqli_query($koneksi,"SELECT * FROM guru WHERE nip_guru='$_SESSION[id_user]'");
$data_guru = mysqli_fetch_array($cek_guru);

?>
 
 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Tugas</h3>
 	</div>
    <?php if ($_SESSION['level'] !== 'siswa'): ?>
        
 	<div class="box-header">
 		<a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Tugas</a>
 	</div>
    <?php endif ?>
 	<!-- /.box-header -->
 	<div class="box-body">
 		<table id="example1" class="table table-bordered table-striped">
 			<thead>
 				<tr>
 					<th>No</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Tanggal</th>
 					<th>Judul Tugas</th>
                    <th>Keterangan</th>
                    <th>Deadline</th>
                    <th>File Soal</th>
                    <th>Aksi</th>
 					<th></th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
 			$no=1;
 			if ($_SESSION['level']=='siswa') {
                $sql = mysqli_query($koneksi,"SELECT * FROM tugas WHERE id_kelas='$data_siswa[kelas]'");
            }else{
                $sql = mysqli_query($koneksi,"SELECT * FROM tugas");
            }
 			foreach ($sql as $data) {
 				
 			 ?>
 				<tr>
 					<td><?= $no++; ?></td>
 					<td><?= $data['id_kelas'] ?></td>
                    <td><?= $data['pertemuan'] ?></td>
                    <td><?= $data['tgl_tugas'] ?></td>
                    <td><?= $data['judul'] ?></td>
                    <td><?= $data['ket'] ?></td>
                    <td><?= $data['deadline'] ?></td>
                    <td>
                        <a download="" href="../dist/<?= $data['file_tugas'] ?>">Lihat Soal</a>
                    </td>
                    <td>
                        <a  href="index.php?p=jawaban&id_tugas=<?= $data['id_tugas'] ?>" class="btn btn-primary">Check</a>
                    </td>
 					<td>
                      
                        <?php if ($_SESSION['level']!=='siswa'): ?>
                         <a onclick="return confirm('Hapus Tugas?')" href="index.php?p=hapus-tugas&id=<?= $data['id_tugas'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>   
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
 					<h4 class="modal-title">Tambah Tugas</h4>
 				</div>
 				<form action="tugas/simpan.php" method="POST" enctype="multipart/form-data">
 					<div class="modal-body">
                        <div class="form-group">
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
 					
                        <div class="form-group">
                            <label>Pertemuan</label>
                            <input type="" name="pertemuan" value="Pertemuan Ke " class="form-control" placeholder="Pertemuan Ke">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" placeholder="Pertemuan Ke">
                        </div>
 						<div class="form-group">
 							<label>Judul Tugas</label>
 							<input type="text" name="judul" class="form-control">
 						</div>
                        <div class="form-group">
                            <label>Keterangan Soal</label>
                            <textarea class="form-control" name="ket"></textarea>
                        </div> 
                        <div class="form-group">
                            <label>Tanggal Deadline</label>
                            <input type="datetime-local" name="tgl_deadline" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>File Soal</label>
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