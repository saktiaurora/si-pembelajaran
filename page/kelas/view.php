 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Kelas</h3>
 	</div>
 	<div class="box-header">
 		<a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kelas</a>
 	</div>
 	<!-- /.box-header -->
 	<div class="box-body">
 		<table id="example1" class="table table-bordered table-striped">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Nama Kelas</th>
 					<th>Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
 			$no=1;
 			$sql = mysqli_query($koneksi,"SELECT * FROM kelas");
 			foreach ($sql as $data) {
 				
 			 ?>
 				<tr>
 					<td><?= $no++; ?></td>
 					<td><?= $data['nm_kelas'] ?></td>
 					<td>
 						<a onclick="return confirm('Yakin untuk menghapus?')" href="index.php?p=hapus-kelas&id=<?= $data['id_kelas'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
 					<h4 class="modal-title">Tambah Kelas</h4>
 				</div>
 				<form action="kelas/simpan.php" method="POST">
 					<div class="modal-body">
 						
 						<div class="form-group">
 							<label>Nama Kelas</label>
 							<input type="" name="nm_kelas" class="form-control" placeholder="Masukan Nama Kelas">
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