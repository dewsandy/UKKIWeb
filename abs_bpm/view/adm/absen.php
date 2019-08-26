<h3 class="page-header">Konfirmasi Absensi Mente dari <?php echo $_SESSION['namamentor'];?></h3>
<?php
  $sql = "SELECT tblabsensi_mente.idabsenmente ,tblabsensi_mente.mente,tblabsensi_mente.keterangan 
  ,tblabsensi_mente.id_bln,tblabsensi_mente.id_hari,tblabsensi_mente.id_tgl,tblabsensi_mente.jam_msk,
   bulan.id_bln,bulan.nama_bln,
  hari.id_hri,hari.nama_hri,
  tanggal.id_tgl,tanggal.nama_tgl,
  tblmente.idmente,tblmente.nama,
  tblmentor.idmentor,tblmentor.namamentor
  FROM 
  tblabsensi_mente
  INNER JOIN bulan ON bulan.id_bln=tblabsensi_mente.id_bln 
  INNER JOIN hari ON hari.id_hri = tblabsensi_mente.id_hari 
  INNER JOIN tanggal ON tanggal.id_tgl = tblabsensi_mente.id_tgl 
  INNER JOIN tblmente ON tblmente.idmente = tblabsensi_mente.mente
  INNER JOIN tblmentor ON tblmentor.idmentor = tblabsensi_mente.darimentor
  WHERE tblabsensi_mente.keterangan='Menunggu' AND tblmentor.namamentor ='".$_SESSION['namamentor']."'  
   ";
  $query = $conn->query($sql);
  // Notifikasi Absen
  	if (isset($_GET['ab'])) {
  		if ($_GET['ab']==1) {
  			echo "<div class='alert alert-warning'><strong>Absen telah dikonfirmasi.</strong></div>";
  		} elseif($_GET['ab']==2) {
  			echo "<div class='alert alert-danger'><strong>Gagal, Silahkan Coba Kembali!</strong></div>";
  		} elseif($_GET['ab']==3) {
        echo "<div class='alert alert-warning'><strong>Absen berhasil ditolak.</strong></div>";
      } 
  	} 

    if ($query->num_rows!==0) {
          echo "<form method='post' action='./model/proses.php'>";
          echo "<tr><th colspan='6'>Yang ditandai :
          <button type='submit' class='btn btn-warning' name='acc_absen2'>Konfirmasi</button>&nbsp;
                  <button type='submit' class='btn btn-danger' name='dec_absen2'/>Tolak</button>
           </th></tr>";
          echo "<div class='table-responsive'>
                 <table class='table table-striped'>
                  <thead>
                     <tr>
                      <th>No</th>
                      <th>Nama Mente</th>
                      <th>Keterangan</th>
                      <th>Hari, Tanggal</th>
                      <th>Pukul</th>
                      <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>";
          $no=0;
          while ($get_absen=$query->fetch_assoc()) {
            $id_absen = $get_absen['idabsenmente'];
            $id_user = $get_absen['mente'];
            $name = $get_absen['nama'];
            
            $date = "$get_absen[nama_hri], $get_absen[nama_tgl] $get_absen[nama_bln] ".date("Y");
            if ($get_absen['keterangan']==="Menunggu") {
             $type = "in";
              $status = "Absen masuk";
              $time = $get_absen['jam_msk'];
           
            $no++; 

              echo  "<tr>
                  <td>
                    <input type='checkbox' name='id_absen[]' value='$id_absen,$type'/> <b>$no</b>
                    
                  </td>
                  <td>$name</td>
                  <td><strong><i>$status</i></strong></td>
                  <td>$date</td>
                  <td>$time</td>
                  <td>
                  <button type='button' class='btn btn-warning' onclick=\"window.location.href='./model/proses.php?acc_absen=$id_absen&type=$type';\">Konfirmasi</button>&nbsp;
                  <button type='button' class='btn btn-danger' onclick=\"window.location.href='./model/proses.php?dec_absen=$id_absen&type=$type';\">Tolak</button>
                  </td>
                  </tr>";
          }
          
          echo "</form></tbody></table></div>";
        }
          $conn->close();
    } else {
        echo "<div class='alert alert-danger'><strong>Tidak ada permintaan Absen.</strong></div>";
    }
?>