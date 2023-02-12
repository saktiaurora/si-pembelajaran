<?php 
$cek_siswa = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis_siswa='$_SESSION[id_user]'");
$data_siswa = mysqli_fetch_array($cek_siswa);
?>
<div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Materi</h3>
 	</div>
 	<?php
 	    if($_SESSION['level']!=='siswa'){
 	        
 	    
 	?>
 	<div class="box-header">
 		<a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Materi</a>
 	</div>
 	<?php } ?>
 	<!-- /.box-header -->
 	<div class="box-body">
 		<table id="example1" class="table table-bordered table-striped">
 			<thead>
 				<tr>
 					<th>No</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Tanggal</th>
 					<th>Judul Materi</th>
 					<th>Deskripsi</th>
 					<th>File</th>
                    <th>Link</th>
                    <th>Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
 			$no=1;
            if ($_SESSION['level']=='siswa') {
                $sql = mysqli_query($koneksi,"SELECT * FROM materi WHERE kelas='$data_siswa[kelas]'");
            }else{
                $sql = mysqli_query($koneksi,"SELECT * FROM materi");
            }
 			
 			foreach ($sql as $data) {
 				
 			 ?>
 				<tr>
 					<td><?= $no++; ?></td>
 					<td><?= $data['kelas'] ?></td>
                    <td><?= $data['pertemuan'] ?></td>
                    <td><?= $data['tgl_materi'] ?></td>
 					<td><?= $data['judul'] ?></td>
 					<td><?= $data['deskripsi'] ?></td>
                    <td><a download="" href="../dist/<?= $data['file'] ?>">File Materi</a></td>
                    <td><a href="<?= $data['link'] ?>">Buka Link</a></td>
 					<td>
                        <?php if ($_SESSION['level']!== 'siswa'): ?>
                            
 						<a onclick="return confirm('Yakin untuk menghapus?')" href="index.php?p=hapus-materi&id=<?= $data['id_materi'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        <?php endif ?>

                        <?php if ($_SESSION['level']=='siswa'): ?>
                        <a  download="" href="../dist/<?= $data['file'] ?>" class="btn btn-primary"><i class="fa fa-download"></i></a>
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
 					<h4 class="modal-title">Tambah Materi</h4>
 				</div>
 				<form action="materi/simpan.php" method="POST" enctype="multipart/form-data">
 					<div class="modal-body">
 						
 						<div class="form-group">
 							<label>Pertemuan</label>
 							<input type="" name="pertemuan" value="Pertemuan Ke " class="form-control" placeholder="Pertemuan Ke">
 						</div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tgl" value="<?= date('Y-m-d') ?>" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="" name="judul" class="form-control" placeholder="Masukan Judul Materi">
                        </div>
 						<div class="form-group">
 							<label>Kelas</label>
 							<select name="kelas" id="" class="form-control">
                               <?php
                               $kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
                               foreach ($kelas as $data) {
                               
                               ?>
                                <option value="<?= $data['nm_kelas'] ?>"><?= $data['nm_kelas'] ?></option>
                               <?php } ?>
                            </select>
 						</div>
                        <div class="form-group">
                            <label>File</label>
                                <input type="file" name="file" class="form-control" >
                           
                        </div> 
                        <div class="form-group">
                            <label>Link</label>
                                <input type="text" name="link" placeholder="Masukan Link" class="form-control" >
                        </div>
						<div class="form-group">
                            <label>Deskripsi</label>
                                <input type="text" name="deskripsi" placeholder="Masukan Deskripsi" class="form-control" >
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