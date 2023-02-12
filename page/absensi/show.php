 <?php 
 $sql = mysqli_query($koneksi,"SELECT  jadwal_absen.*,kelas.nm_kelas FROM jadwal_absen JOIN kelas ON jadwal_absen.id_kelas=kelas.id_kelas WHERE id_jadwal='$_GET[id]'");
 $data = mysqli_fetch_array($sql);

 ?>
 <div class="box">
 	<div class="box-header">
 		<h3 class="box-title">Data Abensi</h3>
 	</div>
    <div class="box-header">
        <p><b>KELAS: <?= $data['nm_kelas']; ?></b></p>
    </div>
    <?php if ($_SESSION['level'] !== 'siswa'): ?>
        <div class="box-header">
            <form action="absensi/cetak.php" method="POST">
                <div class="form-group row col-lg-6">
                    <label>Cetak Laporan</label>
                    <input type="" value="<?= $_GET['id'] ?>" name='id' hidden>
                    <select class="form-control" name="bulan">
                        <option value="1">Jan</option>
                        <option value="2">Feb</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group row col-lg-8">
                    <a href="index.php?p=data-absensi" class="btn btn-primary">Kembali</a>
                    <button type="submit" class="btn btn-danger">Cetak</button>
                </div>
            </form>
        </div>
    <?php endif ?>
    
    <?php if ($_SESSION['level']=='siswa'): ?>
        <div class="box-header">
            <a href="" data-toggle="modal" data-target="#ambil" class="btn btn-primary">Ambil Absensi</a>
        </div>
    <?php endif ?>

    <!-- /.box-header -->
    <div class="box-body">
       <table id="example1" class="table table-bordered table-striped">
        <thead>
         <tr>
          <th>No</th>
          <th>NIS Siswa</th>
          <th>Nama Siswa</th>
          <th>Tanggal</th>
          <th>Jam</th>
          <th>Keterangan</th>

      </tr>
  </thead>
  <tbody>
    <?php 
    $no=1;
    if ($_SESSION['level']=='siswa') {
     $sql = mysqli_query($koneksi,"SELECT  * FROM lap_absen WHERE id_jadwal ='$_GET[id]' AND nis_siswa='$_SESSION[id_user]'");

 }else{
    $sql = mysqli_query($koneksi,"SELECT  * FROM lap_absen WHERE id_jadwal ='$_GET[id]' ORDER BY tanggal DESC");
}
foreach ($sql as $data) {

 ?>
 <tr>
  <td><?= $no++; ?></td>
  <td><?= $data['nis_siswa'] ?></td>
  <td><?= $data['nm_siswa'] ?></td>
  <td><?= $data['tanggal'] ?></td>
  <td><?= $data['jam'] ?></td>
  <td><?= $data['ket'] ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>


<div class="modal fade" id="ambil">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ambil Absen</h4>
                </div>
                <form action="absensi/ambil.php" method="POST">
                    <div class="modal-body">
                        <input type="" name="id" value="<?= $_GET['id'] ?>" hidden>
                        <input type="" name="nis" value="<?= $_SESSION['id_user'] ?>" hidden>
                        <div class="form-group">
                            <label>Tanggal Absen</label>
                            <input readonly type="" name="tgl" class="form-control" value="<?= date('Y-m-d') ?>">
                        </div> 
                        <div class="form-group">
                            <label>Jam</label>
                            <input readonly type="" class="form-control" value="<?= date('H:i') ?>">
                        </div>
                        <div class="form-group">
                            <label>
                              <input type="radio" value="H" name="ket" class="minimal" checked>
                              Hadir
                          </label>
                          <label>
                              <input type="radio" value="I" name="ket" class="minimal">
                              Izin
                          </label>
                          <label>
                              <input type="radio" value="S" name="ket" class="minimal">
                              Sakit
                          </label>
                          <label>
                              <input type="radio" value="A" name="ket" class="minimal">
                              Alfa
                          </label>
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