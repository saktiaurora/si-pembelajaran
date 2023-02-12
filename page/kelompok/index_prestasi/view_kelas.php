 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Kelas</h3>
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
 						<a href="index.php?p=index-prestasi-view-siswa&kelas=<?= $data['nm_kelas'] ?>" class="btn btn-primary"><i class="fa fa-search"></i></a>
 					</td>
 				</tr>
 			<?php } ?>
 			</tbody>
 		</table>
 	</div>
 </div>