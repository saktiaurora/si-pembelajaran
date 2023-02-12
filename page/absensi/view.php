<?php 
    
    $cek_guru = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$_SESSION[id_user]'");
    $data_guru = mysqli_fetch_array($cek_guru);
    $cek_kelas = mysqli_query($koneksi,"SELECT * FROM kelas WHERE nm_kelas='$data_guru[kelas]'");
    $data_kelas = mysqli_fetch_array($cek_kelas);

 ?>
 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Abensi</h3>
 	</div>
    <?php if ($_SESSION['level'] !== 'siswa'): ?>
        
 	<div class="box-header">
 		<a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
 	</div>
    <?php endif ?>
 	<!-- /.box-header -->
 	<div class="box-body">
 		<table id="example1" class="table table-bordered table-striped">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Nama Kelas</th>
                    <th>Hari</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                    <th>Lihat Absensi</th>
 					<th>Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
 			$no=1;
            if($_SESSION['level']=='siswa'){
                $sql = mysqli_query($koneksi,"SELECT  jadwal_absen.*,kelas.nm_kelas FROM jadwal_absen JOIN kelas ON jadwal_absen.id_kelas=kelas.id_kelas WHERE jadwal_absen.id_kelas='$data_kelas[id_kelas]'");
            }else{
                $sql = mysqli_query($koneksi,"SELECT  jadwal_absen.*,kelas.nm_kelas FROM jadwal_absen JOIN kelas ON jadwal_absen.id_kelas=kelas.id_kelas");
            }
 			
 			foreach ($sql as $data) {
 				
 			 ?>
 				<tr>
 					<td><?= $no++; ?></td>
 					<td><?= $data['nm_kelas'] ?></td>
                    <td><?= $data['hari'] ?></td>
                    <td><?= $data['jam_masuk'] ?></td>
                    <td><?= $data['jam_pulang'] ?></td>
                    <td>
                        <a href="index.php?p=show&id=<?= $data['id_jadwal'] ?>" class="btn btn-primary">Lihat</a>
                    </td>
 					<td>
                    <?php if ($_SESSION['level'] !== 'siswa'): ?>
        
 						<a onclick="return confirm('Yakin untuk menghapus?')" href="index.php?p=hapus-absensi&id=<?= $data['id_jadwal'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
 					<h4 class="modal-title">Tambah Jadwal Absen</h4>
 				</div>
 				<form action="absensi/simpan.php" method="POST">
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
                            <label>Hari</label>
                            <input type="" name="hari" class="form-control" placeholder="Ex: Senin">
                        </div>
                        <div class="form-group">
                            <label>Jam Masuk</label>
                            <input type="time" name="jam_masuk" class="form-control" placeholder="">
                        </div>
                        <div class="form-group">
                            <label>Jam Pulang</label>
                            <input type="time" name="jam_pulang" class="form-control" placeholder="">
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