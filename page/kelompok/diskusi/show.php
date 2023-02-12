<?php 
  	include '../../../koneksi.php';
      $sql = mysqli_query($koneksi,"SELECT * FROM chat JOIN siswa ON chat.nis_siswa=siswa.nis_siswa WHERE id_kelompok='$_GET[id_kelompok]' AND id_pertemuan='$_GET[id_pertemuan]' ORDER BY id_chat ASC");
      foreach ($sql as $data) {

        if ($data['nis_siswa']==$_GET['id_user']) {
         if ($data['type']=='file') {
           echo ' <div class="direct-chat-msg right">
         <div class="direct-chat-info clearfix">
         <span class="direct-chat-name pull-right">'.$data['nm_siswa'].' ('.$data['nis_siswa'].')</span>
         <span class="direct-chat-timestamp pull-left">'.date("D M Y  h:i", strtotime($data['tgl'])).'</span>
         </div>
         <!-- /.direct-chat-info -->
         <img class="direct-chat-img" src="../dist/img/avatar-1.png" alt="Message User Image"><!-- /.direct-chat-img -->
         <div class="direct-chat-text col-lg-10 pull-right">
         <a style="color:#fff" href="../dist/'.$data['isi_pesan'].'">Download File</a>
         </div>
         <!-- /.direct-chat-text -->
         </div>
         <!-- /.direct-chat-msg -->';
         }else{
          echo ' <div class="direct-chat-msg right">
         <div class="direct-chat-info clearfix">
         <span class="direct-chat-name pull-right">'.$data['nm_siswa'].' ('.$data['nis_siswa'].')</span>
         <span class="direct-chat-timestamp pull-left">'.date("D M Y  h:i", strtotime($data['tgl'])).'</span>
         </div>
         <!-- /.direct-chat-info -->
         <img class="direct-chat-img" src="../dist/img/avatar-1.png" alt="Message User Image"><!-- /.direct-chat-img -->
         <div class="direct-chat-text col-lg-10 pull-right">
         '.$data['isi_pesan'].'
         </div>
         <!-- /.direct-chat-text -->
         </div>
         <!-- /.direct-chat-msg -->';
         }
       }else{

        if ($data['type']=='file') {
          echo ' <div class="direct-chat-msg">
         <div class="direct-chat-info clearfix">
         <span class="direct-chat-name pull-left">'.$data['nm_siswa'].' ('.$data['nis_siswa'].')</span>
         <span class="direct-chat-timestamp pull-right">'.date("D M Y  h:i", strtotime($data['tgl'])).'</span>
         </div>
         <!-- /.direct-chat-info -->
         <img class="direct-chat-img" src="../dist/img/avatar-2.png" alt="Message User Image"><!-- /.direct-chat-img -->
         <div class="direct-chat-text col-lg-10 pull-left">
        <a style="color:#fff" href="../dist/'.$data['isi_pesan'].'">Download File</a>
         </div>
         <!-- /.direct-chat-text -->
         </div>
         <!-- /.direct-chat-msg -->';
        }else{
           echo ' <div class="direct-chat-msg">
         <div class="direct-chat-info clearfix">
         <span class="direct-chat-name pull-left">'.$data['nm_siswa'].' ('.$data['nis_siswa'].')</span>
         <span class="direct-chat-timestamp pull-right">'.date("D M Y  h:i", strtotime($data['tgl'])).'</span>
         </div>
         <!-- /.direct-chat-info -->
         <img class="direct-chat-img" src="../dist/img/avatar-2.png" alt="Message User Image"><!-- /.direct-chat-img -->
         <div class="direct-chat-text col-lg-10 pull-left">
         '.$data['isi_pesan'].'
         </div>
         <!-- /.direct-chat-text -->
         </div>
         <!-- /.direct-chat-msg -->';
        }
        

       }
       }
       ?>
