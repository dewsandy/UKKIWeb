<?php
	if (isset($_SESSION['sw'])) {
		$sql = "SELECT*FROM tblmente WHERE idmente='$_SESSION[idmente]'";
	    $query = $conn->query($sql);
		$get_user=$query->fetch_assoc();
		$name = $get_user['nama'];
		$id_user = $get_user['idmente'];

		echo "<h1 class='page-header'>Assalamualaikum , $name</h1>";
		
			if ($conn->query("SELECT*FROM tblabsensi_mente WHERE mente='$id_user'")->num_rows!==0) {
				$no=0;
			 	$query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
			 	while ($get_month=$query_month->fetch_assoc()) {
			      $month=$get_month['nama_bln'];
			      $id_month=$get_month['id_bln'];
			      
			      $query_absen=$conn->query("SELECT
			       tblabsensi_mente.idabsenmente ,tblabsensi_mente.mente,tblabsensi_mente.keterangan 
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
			      WHERE tblabsensi_mente.id_bln='$id_month' AND tblabsensi_mente.mente='$id_user'

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
			            
			            echo "<tr>
			                <td>$no</td>
			                <td>$date</td>
			                <td>$time_in</td>
			                <td><strong>$keterangan</strong></td>
			              </tr>";
			          }
			          echo "</table></div>";
			      	}
				}
			$conn->close();
			} else {
				echo "<div class='alert alert-warning'><strong>Tidak ada Absensi untuk ditampilkan.</strong></div>";
			}
	} else {
	    $id_siswa = mysqli_real_escape_string($conn, $_GET['id_mente']);
		$query = $conn->query("SELECT*FROM tblmente WHERE idmente='$id_mente'");
		$get_user=$query->fetch_assoc();
		$name = $get_user['nama'];
		$id_user = $get_user['idmente'];
			if ($conn->query("SELECT*FROM tblabsensi_mente WHERE mente='$id_user'")->num_rows!==0) {
				$no=0;
			 	$query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
			 	while ($get_month=$query_month->fetch_assoc()) {
			      $month = $get_month['nama_bln'];
			      $year = date("Y");
			      $id_month=$get_month['id_bln'];
			      
			      $query_absen=$conn->query("SELECT
			       tblabsensi_mente.idabsenmente ,tblabsensi_mente.mente,tblabsensi_mente.keterangan 
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
			      WHERE tblabsensi_mente.id_bln='$id_month' AND tblabsensi_mente.mente='$id_user'
			      AND tblmentor.namamentor='".$_SESSION['namamentor']."'
			      ");
			      
			      $cek = $query_absen->num_rows;
			      if ($cek!==0) {
			        echo "<h4 class='sub-header'><strong>Absensi:</strong> $name<br><strong>Bulan:</strong> $month $year </h4>";
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
			            
			            echo "<tr>
			                <td>$no</td>
			                <td>$date</td>
			                <td>$time_in</td>
			                <td><strong>$keterangan</strong></td>
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