<?php 

$sql = mysqli_query($koneksi,"SELECT * FROM kelompok JOIN kelas ON kelompok.id_kelas=kelas.id_kelas WHERE id_kelompok='$_GET[id_kelompok]'");
$data= mysqli_fetch_array($sql);

?>
<div  class="box box-primary direct-chat direct-chat-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Forum Diskusi Kelompok <b><?= $data['nm_kelompok'] ?></b></h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <!-- Conversations are loaded here -->
    <div style="height:400px;" id="view_chat" class="direct-chat-messages">
      <!-- Message. Default to the left -->

    </div>
    <!--/.direct-chat-messages-->
    <!-- /.direct-chat-pane -->
  </div>
  <!-- /.box-body -->
  <div class="box-footer">

    <form id="simpan-chat" enctype="multipart/form-data" method="POST">
      <div class="input-group">
        <input type="" name="nis_siswa" value="<?= $_SESSION['id_user'] ?>" hidden>
        <input type="" name="id_kelompok" value="<?= $_GET['id_kelompok'] ?>" hidden>
        <input type="" name="id_pertemuan" value="<?= $_GET['id_pertemuan'] ?>" hidden>

        <input type="" name="type" value="text" hidden>
        <input type="" name="isi_pesan" id="isi_pesan" placeholder="Type Message ..." class="form-control">

        <span class="input-group-btn">
          <button type="submit" id="#simpan-chat" class="btn btn-primary btn-flat">Send</button>
          <a href="" data-toggle="modal" data-target="#kirim-file" class="btn btn-success">Kirim File</a>
        </span>
      </div>
    </form>

  </div>
  <!-- /.box-footer-->
</div>
<!--/.direct-chat -->


<div class="modal fade" id="kirim-file">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Kirim File</h4>
    </div>
    <form action="kelompok/diskusi/simpan.php" enctype="multipart/form-data" method="POST">
     <div class="modal-body">
       <input type="" name="nis_siswa" value="<?= $_SESSION['id_user'] ?>" hidden>
       <input type="" name="id_kelompok" value="<?= $_GET['id_kelompok'] ?>" hidden>
       <input type="" name="id_pertemuan" value="<?= $_GET['id_pertemuan'] ?>" hidden>
       <input type="" name="type" value="file" hidden>
       <input type="file" name="isi_pesan" class="form-control">
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

