<div class="box">
	<div class="box-header">
		Daftar Pertemuan
	</div>

	<div class="box-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Pertemuan Ke</th>
					<th>Tanggal</th>
					<th>Buka</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					$no=1;
					$pertemuan = mysqli_query($koneksi,"SELECT * FROM pertemuan WHERE id_kelas='$_GET[id_kelas]'");
					foreach ($pertemuan as $data_p) {
						
					

				 ?>
				 <tr>
				 	<td><?= $no; ?></td>
				 	<td>Pertemuan <?= $no ?></td>
				 	<td><?= $data_p['tgl'] ?></td>
				 	<td>
				 		 <a href="index.php?p=buka-forum-diskusi&id_pertemuan=<?= $data_p['id_pertemuan'] ?>&id_kelompok=<?= $_GET['id_kelompok'] ?>" class="btn btn-danger">Buka</a>
				 	</td>
				 </tr>
				<?php $no++; } ?>
			</tbody>
		</table>
	</div>
</div>