 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Siswa</h3>
 	</div>
 	<div class="box-header">
 		<a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Siswa</a>
 	</div>
 	<!-- /.box-header -->
 	<div class="box-body">
 		<table id="example1" class="table table-bordered table-striped">
 			<thead>
 				<tr>
 					<th>No</th>
                     <th>Kelas</th>
 					<th>NIS Siswa</th>
 					<th>Nama Siswa</th>
 					<th>Telepon</th>
                    <th>Jenis Kelamin</th>
                    
 					<th>Alamat</th>
 					<th>Username</th>
 					<th>Password</th>
 					<th>Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
 			$no=1;
 			$sql = mysqli_query($koneksi,"SELECT * FROM siswa order by kelas");
 			foreach ($sql as $data) {
 				
 			 ?>
 				<tr>
 					<td><?= $no++; ?></td>
                     <td><?= $data['kelas'] ?></td>
 					<td><?= $data['nis_siswa'] ?></td>
 					<td><?= $data['nm_siswa'] ?></td>
 					<td><?= $data['telepon'] ?></td>
                    <td><?= $data['jk'] ?></td>
                    
 					<td><?= $data['alamat'] ?></td>
 					<td><?= $data['username'] ?></td>
 					<td><?= $data['password'] ?></td>
 					<td>
 						<a onclick="return confirm('Yakin untuk menghapus?')" href="index.php?p=hapus-siswa&id=<?= $data['nis_siswa'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
 						<a href="" data-toggle="modal" data-target="#edit<?= $data['nis_siswa'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
 					</td>
 				</tr>
                <div class="modal fade" id="edit<?= $data['nis_siswa']?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Siswa</h4>
                            </div>
                            <form action="data/aksi/update_siswa.php" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input type="" readonly value="<?= $data['nis_siswa'] ?>" name="id" class="form-control" placeholder="Masukan Nis">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="" value="<?= $data['nm_siswa'] ?>" name="nm" class="form-control" placeholder="Masukan Nama Siswa">
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="" value="<?= $data['telepon'] ?>" name="telp" class="form-control" placeholder="Masukan No Telepon">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jk">
                                            <option><?= $data['jk'] ?></option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat"><?= $data['alamat'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="" value="<?= $data['username'] ?>" name="username" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="" value="<?= $data['password'] ?>" name="password" class="form-control" placeholder="">
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
 					<h4 class="modal-title">Tambah Siswa</h4>
 				</div>
 				<form action="data/aksi/simpan_siswa.php" method="POST">
 					<div class="modal-body">
 						<div class="form-group">
 							<label>NIS</label>
 							<input type="" name="id" class="form-control" placeholder="Masukan Nis">
 						</div>
 						<div class="form-group">
 							<label>Nama</label>
 							<input type="" name="nm" class="form-control" placeholder="Masukan Nama Siswa">
 						</div>
 						<div class="form-group">
 							<label>Telepon</label>
 							<input type="" name="telp" class="form-control" placeholder="Masukan No Telepon">
 						</div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jk">
                                <option>Laki-laki</option>
                                <option>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="kelas">
                                <?php 
                                    $kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
                                    foreach ($kelas as $data) {
                                        
                                 ?>
                                 <option value="<?= $data['nm_kelas'] ?>"><?= $data['nm_kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
 						<div class="form-group">
 							<label>Alamat</label>
 							<textarea class="form-control" name="alamat"></textarea>
 						</div>
 						<div class="form-group">
 							<label>Username</label>
 							<input type="" name="username" class="form-control" placeholder="">
 						</div>
 						<div class="form-group">
 							<label>Password</label>
 							<input type="" name="password" class="form-control" placeholder="">
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