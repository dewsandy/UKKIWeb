<h1 class="page-header">Absen</h1>
<?php
$this_day = date("d");
$sql = "SELECT
             tblabsensi_mente.idabsenmente ,tblabsensi_mente.mente,tblabsensi_mente.keterangan 
          ,tblabsensi_mente.id_bln,tblabsensi_mente.id_hari,tblabsensi_mente.id_tgl,tblabsensi_mente.jam_msk,
          tanggal.id_tgl,tanggal.nama_tgl
      FROM 
          tblabsensi_mente
      INNER JOIN tanggal ON tanggal.id_tgl = tblabsensi_mente.id_tgl 
      WHERE nama_tgl='$this_day' AND tblabsensi_mente.mente='$_SESSION[idmente]'";
$query_tday = $conn->query($sql);

// Notifikasi Absen
	if (isset($_GET['ab'])) {
		if ($_GET['ab']==1) {
			echo "<div class='alert alert-warning'><strong>Terimakasih, Absen berhasil.</strong></div>";
		} elseif($_GET['ab']==2) {
			echo "<div class='alert alert-danger'><strong>Maaf, Absen Gagal. Silahkan Coba Kembali!</strong></div>";
		}
	}
echo "<div class='table-responsive'>
           <table class='table table-striped'>
            <thead>
               <tr>
                <th>Status</th>
                <th>Keterangan</th>
                <th>Absen Mentoring</th>
               </tr>
            </thead>
            <tbody>";

if ($query_tday->num_rows==0) {
       $status='./lib/img/warning.png';
       $message = "Anda Belum Mengisi Absen Hari Ini";
       $disable_in = "";
       $disable_out = " disabled='disabled'";
} else {
	   
       $disable_in = " disabled='disabled'";
       
       $get_day= $query_tday->fetch_assoc();
       $conn->close();
       
       if ($get_day['keterangan']=="Menunggu") {
       		$status='./lib/img/complete.png';
       		$message = "Absen Masuk Selesai. Selamat Bertemu di Pertemuan Selanjutnya :) ,</br>Semoga Allah SWT selalu 
          memberi umur kita panjang, Aamiin";
       		$disable_out = " disabled='disable'";
       } else {
       		$status='./lib/img/minus.png';
       		$message = "Absen Masuk Selesai. Selamat Bertemu di Pertemuan Selanjutnya :) ,</br>Semoga Allah SWT selalu 
          memberi umur kita panjang, Aamiin";
       		$disable_out = "";
       }
}
echo 	"<tr>
        <td><img src='$status' width='30px'/></td>
        <td><h5>$message</h5></td>
        <td><button type='button' class='btn btn-warning' onclick=\"window.location.href='./model/proses.php?absen=1';\" $disable_in>Absen Masuk</button></td>
        </tr>";
echo "</table></div>";
?>