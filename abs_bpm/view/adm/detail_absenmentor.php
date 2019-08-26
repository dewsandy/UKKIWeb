<?php
	if(isset($_SESSION['id'])){
		$sql = "SELECT*FROM tblmentor WHERE idmentor='$_SESSION[id]'";
	    $query = $conn->query($sql);
		$get_user=$query->fetch_assoc();
		$name = $get_user['namamentor'];
		$id_user = $get_user['idmentor'];

		echo "<h1 class='page-header'>Assalamualaikum , $name</h1>";
		
			if ($conn->query("SELECT*FROM tblabsensi_mentor WHERE mentor='$id_user'")->num_rows!==0) {
				$no=0;
			 	$query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
			 	while ($get_month=$query_month->fetch_assoc()) {
			      $month=$get_month['nama_bln'];
			      $id_month=$get_month['id_bln'];
			      
			      $query_absen=$conn->query("SELECT
			       tblabsensi_mentor.idabsenmentor ,tblabsensi_mentor.mentor,tblabsensi_mentor.keterangan 
				  ,tblabsensi_mentor.idbln,tblabsensi_mentor.idhari,tblabsensi_mentor.idtgl,tblabsensi_mentor.jam_msk,
				   bulan.id_bln,bulan.nama_bln,
				  hari.id_hri,hari.nama_hri,
				  tanggal.id_tgl,tanggal.nama_tgl,
				  tblmentor.idmentor,tblmentor.namamentor
				  FROM 
				  tblabsensi_mentor
				  INNER JOIN bulan ON bulan.id_bln=tblabsensi_mentor.idbln 
				  INNER JOIN hari ON hari.id_hri = tblabsensi_mentor.idhari 
				  INNER JOIN tanggal ON tanggal.id_tgl = tblabsensi_mentor.idtgl 
				  INNER JOIN tblmentor ON tblmentor.idmentor = tblabsensi_mentor.mentor
			      WHERE tblabsensi_mentor.idbln='$id_month' AND tblabsensi_mentor.mentor='$id_user'
			      ");
			      
			      $cek = $query_absen->num_rows;
			      if ($cek!==0) {
			        echo "<h3 class='sub-header'>Absensiku - $month </h3>";
			        echo "<div class='table-responsive'>
			           <table class='table table-striped'>
			            <thead>
			               <tr>
			               	<th>No</th>
			                <th>Hari, Tanggal</th>
			                <th>Jam Masuk</th>
			                <th>Status</th>
			               </tr>
			            </thead>
			            <tbody>";
			          $no=0;
			          while ($get_absen=$query_absen->fetch_assoc()) {
			            $no++;
			          	$date = "$get_absen[nama_hri], $get_absen[nama_tgl] $get_absen[nama_bln] ".date("Y");
			            $time_in = "$get_absen[jam_msk]";
			            /* if ($get_absen['jam_klr']==="") {
			             	$time_out = "<strong>Belum Absen</strong>";
			             } else {
			             	$time_out = "$get_absen[jam_klr]";
			             }*/

			            $keterangan = "$get_absen[keterangan]";
			            if($keterangan == 1){
			            	$ket = 'Masuk';
			            }
			            echo "<tr>
			                <td>$no</td>
			                <td>$date</td>
			                <td>$time_in</td>
			                <td><strong>$ket</strong></td>
			              </tr>";
			          }
			          echo "</table></div>";
			      	}
				}
			$conn->close();
			} else {
				echo "<div class='alert alert-warning'><strong>Tidak ada Absensi untuk ditampilkan.</strong></div>";
			}
	}
?>