<?php
    if (isset($_SESSION['pb'])) {
        $id_mente=mysqli_real_escape_string($conn, $_GET['id_mente']);
		$query = $conn->query("SELECT*FROM tblmente WHERE idmente='$id_mente'");
	    $get_user=$query->fetch_assoc();
	    $name = $get_user['nama'];
	    $id_user = $get_user['idmente'];
	    if (isset($_GET['st'])) {
	      if ($_GET['st']==1) {
	        echo "<div class='alert alert-warning'><strong>Berhasil disimpan.</strong></div>";
	      } else {
	        echo "<div class='alert alert-danger'><strong>Gagal menyimpan.</strong></div>";
	      }
	    }
	        if ($conn->query("SELECT*FROM tblcatatan WHERE id_mente='$id_user'")->num_rows!==0) {
	            $no=0;
	            $query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
	            while ($get_month=$query_month->fetch_assoc()) {
	              $month=$get_month['nama_bln'];
	              $id_month=$get_month['id_bln'];
	              
	              $query_note=$conn->query("SELECT
	              tblcatatan.id_cat ,tblcatatan.id_mente,tblcatatan.id_bln,tblcatatan.id_hari,
				  tblcatatan.id_tgl,tblcatatan.isi,tblcatatan.status,
				  bulan.id_bln,bulan.nama_bln,
				  hari.id_hri,hari.nama_hri,
				  tanggal.id_tgl,tanggal.nama_tgl
				   FROM tblcatatan
				  INNER JOIN bulan ON bulan.id_bln=tblcatatan.id_bln 
				  INNER JOIN hari ON hari.id_hri = tblcatatan.id_hari 
				  INNER JOIN tanggal ON tanggal.id_tgl = tblcatatan.id_tgl 
	              WHERE tblcatatan.id_mente='$id_user' 
	              AND tblcatatan.id_bln ='$id_month' ORDER BY id_cat ASC");
	              $cek = $query_note->num_rows;
	              if ($cek!==0) {
	                echo "<h4 class='sub-header'><strong>Catatan:</strong> $get_user[nama] - <i>$month</i> </h4>";
	                echo "<div class='table-responsive'>
	                   <table class='table table-striped'>
	                    <thead>
	                       <tr>
	                         <th>No</th>
	                         <th>Hari, Tanggal</th>
	                         <th>Catatan</th>
	                         <th>Status</th>
	                       </tr>
	                    </thead>
	                    <tbody>";
	                  $no=0;
	                  while ($get_note=$query_note->fetch_assoc()) {
	                    $no++;
	                    $date = "$get_note[nama_hri], $get_note[nama_tgl] $get_note[nama_bln] ".date("Y");
	                    $note = nl2br(htmlentities($get_note['isi']));
	                    $status = $get_note['status'];
	                    echo "<tr>
	                        <td>$no</td>
	                        <td>$date</td>
	                        <td width='60%'>$note</td>
	                        <td><strong>$status</strong></td>
	                    </tr>";
	                  }
	                  echo "</table></div>";
	                }
	            }
	            $conn->close();
	        } else {
	            echo "<div class='alert alert-warning'><strong>Tidak ada Cataan untuk ditampilkan.</strong></div>";
	        }
    }elseif (isset($_SESSION['sw'])) {
        echo "<h3 class='sub-header'>Catatanku <button type='button' onclick=\"window.location.href='tambah_catatan';\" class='btn btn-success'>Tambah</button> </h3>";
        $query = $conn->query("SELECT*FROM tblmente WHERE idmente='$_SESSION[idmente]'");
	    $get_user=$query->fetch_assoc();
	    $name = $get_user['nama'];
	    $id_user = $get_user['idmente'];
	    if (isset($_GET['st'])) {
	      if ($_GET['st']==1) {
	        echo "<div class='alert alert-warning'><strong>Berhasil disimpan.</strong></div>";
	      } else {
	        echo "<div class='alert alert-danger'><strong>Gagal menyimpan.</strong></div>";
	      }
	    }
	        if ($conn->query("SELECT*FROM tblcatatan WHERE id_mente='$id_user'")->num_rows!==0) {
	            $no=0;

	            $query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
	            while ($get_month=$query_month->fetch_assoc()) {
	              $month=$get_month['nama_bln'];
	              $id_month=$get_month['id_bln'];
	              
	            $query_note=$conn->query("SELECT
	              tblcatatan.id_cat ,tblcatatan.id_mente,tblcatatan.id_bln,tblcatatan.id_hari,
				  tblcatatan.id_tgl,tblcatatan.isi,tblcatatan.status,
				  bulan.id_bln,bulan.nama_bln,
				  hari.id_hri,hari.nama_hri,
				  tanggal.id_tgl,tanggal.nama_tgl
				   FROM tblcatatan
				  INNER JOIN bulan ON bulan.id_bln=tblcatatan.id_bln 
				  INNER JOIN hari ON hari.id_hri = tblcatatan.id_hari 
				  INNER JOIN tanggal ON tanggal.id_tgl = tblcatatan.id_tgl 
	              WHERE tblcatatan.id_mente='$id_user' 
	              AND tblcatatan.id_bln ='$id_month' ORDER BY id_cat ASC");
	              
	              $cek = $query_note->num_rows;
	              if ($cek!==0) {
	                echo "<h4 class='sub-header'>Catatan - $month </h4>";
	                echo "<div class='table-responsive'>
	                   <table class='table table-striped'>
	                    <thead>
	                       <tr>
	                         <th>No</th>
	                         <th>Hari, Tanggal</th>
	                         <th>Catatan</th>
	                         <th>Status</th>
	                       </tr>
	                    </thead>
	                    <tbody>";
	                  $no=0;
	                  while ($get_note=$query_note->fetch_assoc()) {
	                    $no++;
	                    $date = "$get_note[nama_hri], $get_note[nama_tgl] $get_note[nama_bln] ".date("Y");
	                    $note = nl2br(htmlentities($get_note['isi']));
	                    $status = $get_note['status'];
	                    echo "<tr>
	                        <td>$no</td>
	                        <td>$date</td>
	                        <td width='60%'>$note</td>
	                        <td><strong>$status</strong></td>
	                    </tr>";
	                  }
	                  echo "</table></div>";
	                }
	            }
	            
	            $conn->close();
	        } else {
	            echo "<div class='alert alert-warning'><strong>Tidak ada Cataan untuk ditampilkan.</strong></div>";
	        }
    }
?>

