 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data admin</h3>
 	</div>
 	<!-- /.box-header -->
 	<div class="box-body">
 		<table id="example1" class="table table-bordered table-striped">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>ID Admin</th>
 					<th>Nama</th>
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
 			$sql = mysqli_query($koneksi,"SELECT * FROM admin");
 			foreach ($sql as $data) {
 				
 			 ?>
 				<tr>
 					<td><?= $no++; ?></td>
 					<td><?= $data['id_admin'] ?></td>
 					<td><?= $data['nm_admin'] ?></td>
 					<td><?= $data['telepon'] ?></td>
                    <td><?= $data['jk'] ?></td>
 					<td><?= $data['alamat'] ?></td>
 					<td><?= $data['username'] ?></td>
 					<td><?= $data['password'] ?></td>
 					<td>

 						<a href="" data-toggle="modal" data-target="#edit<?= $data['id_admin'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
 					</td>
 				</tr>
                <div class="modal fade" id="edit<?= $data['id_admin']?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Edit Admin</h4>
                            </div>
                            <form action="data/aksi/update_admin.php" method="POST">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="" readonly value="<?= $data['id_admin'] ?>" name="id" class="form-control" placeholder="Masukan Nip">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="" value="<?= $data['nm_admin'] ?>" name="nm" class="form-control" placeholder="Masukan Nama Siswa">
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