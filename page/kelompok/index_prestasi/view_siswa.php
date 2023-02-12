 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Siswa</h3>
 	</div>
 	<div class="box-header">
 		<a href="index.php?p=index-prestasi-pilih-kelas" class="btn btn-danger">Kembali</a>
 	</div>
 	<div class="box-header">
 		<p>Data Siswa Kelas: <b><?= $_GET['kelas'] ?></b></p>
 	</div>
 	<!-- /.box-header -->
 	<div class="box-body">
 		<table id="example1" class="table table-bordered table-striped">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>NIS Siswa</th>
 					<th>Nama Siswa</th>
 					<th>Nilai</th>
 					<th>Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
 			$no=1;
 			$sql = mysqli_query($koneksi,"SELECT siswa.*,index_prestasi.nilai FROM siswa LEFT JOIN index_prestasi ON siswa.nis_siswa=index_prestasi.nis_siswa WHERE siswa.kelas='$_GET[kelas]'");
 			foreach ($sql as $data) {
 				
 			 ?>
 			<tr>
 				<td><?= $no++; ?></td>
 				<td><?= $data['nis_siswa'] ?></td>
 				<td><?= $data['nm_siswa'] ?></td>
 				<?php if ($data['nilai']==false): ?>
 				<td>0</td>
 				<?php else: ?>
 				<td><?= $data['nilai'] ?></td>
 				<?php endif ?>
 				<td>
 					<a href="" data-toggle="modal" data-target="#input_nilai<?= $data['nis_siswa'] ?>" class="btn btn-primary">Input Nilai</a>
 				</td>
 			</tr>
 			<!-- input nilai -->
 			<div class="modal fade" id="input_nilai<?= $data['nis_siswa'] ?>">
				  <div class="modal-dialog">
				     <div class="modal-content">
				        <div class="modal-header">
				           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				              <h4 class="modal-title">Input Nilai</h4>
				          </div>
				          <form action="" method="POST" enctype="multipart/form-data">
				          	<input type="" name="nis_siswa" hidden value="<?= $data['nis_siswa'] ?>">
				              <div class="modal-body">

				                 <div class="form-group">
				                   <div class="form-group">
				                    <label>Masukan Nilai</label>
				                    <input type="" name="nilai" class="form-control" placeholder="EX: 80.5">
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

<?php 

if (isset($_POST['nilai'])) {
	$nilai= $_POST['nilai'];
	$nis = $_POST['nis_siswa'];

	$cek = mysqli_query($koneksi,"SELECT * FROM index_prestasi WHERE nis_siswa='$nis'");
	$hasil = mysqli_fetch_array($cek);

	if ($hasil==true) {
		$update = mysqli_query($koneksi,"UPDATE index_prestasi SET nilai='$nilai' WHERE nis_siswa='$nis'");

		echo "<script>alert('Berhasil');window.location='index.php?p=index-prestasi-view-siswa&kelas=$_GET[kelas]'</script>";
	}else{
		$insert = mysqli_query($koneksi,"INSERT INTO index_prestasi VALUES ('$nis','$nilai')");
		echo "<script>alert('Berhasil');window.location='index.php?p=index-prestasi-view-siswa&kelas=$_GET[kelas]'</script>";
	}
}


 ?>


	