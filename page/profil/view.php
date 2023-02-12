<?php 

$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$_SESSION[id_user]'");
$data = mysqli_fetch_array($sql);
 ?>
<div class="row">
	<div class="col-lg-3">
		
	</div>
	<div class="col-lg-6">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Profil</h3>
			</div>
			<div class="box-body">
				<form action="profil/update.php" method="POST">
					<div class="form-group">
						<label>Nama</label>
						<input type="" name="id" value="<?= $_SESSION['id_user'] ?>" hidden>
						<input type="" name="nm" value="<?= $data['nm_user'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Telepon</label>
						<input type="" name="telp" value="<?= $data['telepon'] ?>" class="form-control">
					</div>
					<?php if ($_SESSION['level']=='siswa'): ?>
						
					<div class="form-group">
						<label>Kelas</label>
						<input type="" name="telp" value="<?= $data['kelas'] ?>" readonly class="form-control">
					</div>
					<?php endif ?>
					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat"><?= $data['alamat'] ?></textarea>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="" name="username" value="<?= $data['username'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="" name="password" value="<?= $data['password'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<button class="btn btn-primary pull-right" type="submit">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>