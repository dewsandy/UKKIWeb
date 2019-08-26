<h3 class="page-header">Konfirmasi Catatan Kegiatan Mente</h3>
<?php
  
  $sql = "SELECT tblcatatan.id_cat ,tblcatatan.id_mente,tblcatatan.id_bln,tblcatatan.id_hari,
  tblcatatan.id_tgl,tblcatatan.isi,tblcatatan.status,
  bulan.id_bln,bulan.nama_bln,
  hari.id_hri,hari.nama_hri,
  tanggal.id_tgl,tanggal.nama_tgl,
  tblmente.idmente,tblmente.nama,
  tblmentor.idmentor,tblmentor.namamentor
  FROM tblcatatan
  INNER JOIN bulan ON bulan.id_bln=tblcatatan.id_bln 
  INNER JOIN hari ON hari.id_hri = tblcatatan.id_hari 
  INNER JOIN tanggal ON tanggal.id_tgl = tblcatatan.id_tgl 
  INNER JOIN tblmente ON tblmente.idmente = tblcatatan.id_mente
  INNER JOIN tblmentor ON tblmentor.idmentor = tblcatatan.id_mentor
  WHERE tblcatatan.status='Menunggu' AND tblmentor.namamentor ='".$_SESSION['namamentor']."' ";
  $query = $conn->query($sql);
  // Notifikasi Absen
  	if (isset($_GET['ab'])) {
  		if ($_GET['ab']==1) {
  			echo "<div class='alert alert-warning'><strong>Catatan telah dikonfirmasi.</strong></div>";
  		} elseif($_GET['ab']==2) {
  			echo "<div class='alert alert-danger'><strong>Gagal, Silahkan Coba Kembali!</strong></div>";
  		} elseif($_GET['ab']==3) {
        echo "<div class='alert alert-warning'><strong>Catatan berhasil ditolak.</strong></div>";
      } 
  	} 

  if ($query->num_rows!==0) {
          echo "<div class='table-responsive'>
                 <table class='table table-striped'>
                  <thead>
                     <tr>
                      <th>No</th>
                      <th>Nama Mente</th>
                      <th>Hari, Tanggal</th>
                      <th width='40%'>Kegiatan</th>
                      <th>Nama Mentor</th>
                      <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>";
          $no=0;
          while ($get_note=$query->fetch_assoc()) {
            $id_note = $get_note['id_cat'];
            $id_user = $get_note['id_mente'];
            $nama = $get_note['nama'];
            $namamentor = $get_note['namamentor'];
            $note = nl2br(htmlentities($get_note['isi']));
            $date = "$get_note[nama_hri], $get_note[nama_tgl] $get_note[nama_bln] ".date("Y");
           
            $no++; 
              echo  "<tr>
                  <td>$no</td>
                  <td>$nama</td>  
                  <td>$date</td>
                  <td>$note</td>
                  <td>$namamentor</td>
                  <td>
                  <button type='button' class='btn btn-warning' onclick=\"window.location.href='./model/proses.php?acc_note=$id_note';\">Konfirmasi</button>&nbsp;
                  <button type='button' class='btn btn-danger' onclick=\"window.location.href='./model/proses.php?dec_note=$id_note';\">Tolak</button>
                  </td>
                  </tr>";
          }
          echo "</tbody></table></div>";
          $conn->close();
    } else {
        echo "<div class='alert alert-danger'><strong>Tidak ada permintaan Catatan.</strong></div>";
    }
?>