<ul class="nav nav-sidebar">
<li id="output"></li>
   <?php
   		if (isset($_SESSION['pb'])) {
   			$link=array("","absenmentor","absensimentor","mente","absen","absensi","req_catatan","catatan", "katasandi&id=$_SESSION[id]","keluar");
			$name=array("","Absen","Absensiku","Daftar Mente","Absen Mente","Lihat Absensi Mente","Catatan","Lihat Catatan","Ubah Katasandi", "Keluar");

			for ($i=1; $i <= count($link)-1 ; $i++) {
				if (strcmp($page, "$link[$i]")==0) {
			        $status = "class='active'";
			      } else {
			      	$status = "";
			      }
			    /*if (mysql_num_rows($query_tday)==0 && $link[$i]==="absen") {
					$warning = "<img src='./lib/img/warning.png' width='20' />";
				} else {
					$warning = "";
				} */
				echo "<li $status><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		} elseif (isset($_SESSION['sw'])) {
   			$this_day = date("d");
			$sql = "SELECT
			       tblabsensi_mente.idabsenmente ,tblabsensi_mente.mente,tblabsensi_mente.keterangan 
				  ,tblabsensi_mente.id_bln,tblabsensi_mente.id_hari,tblabsensi_mente.id_tgl,tblabsensi_mente.jam_msk,
				  tanggal.id_tgl,tanggal.nama_tgl
			FROM 
				  tblabsensi_mente
			INNER JOIN tanggal ON tanggal.id_tgl = tblabsensi_mente.id_tgl 
			WHERE nama_tgl='$this_day' AND tblabsensi_mente.mente='$_SESSION[idmente]'";
			$query = $conn->query($sql);

			$query_tday = $query->fetch_assoc();


			$link=array("","absen","absensi","tambah_catatan","catatan","keluar");
			$name=array("","Absen","Absensiku","Tambah Catatan","Catatan","Keluar");
			
			for ($i=1; $i <= count($link)-1 ; $i++) {
				if (strcmp($page, "$link[$i]")==0) {
			        $status = "class='active'";
			      } else {
			      	$status = "";
			      }
			    if ($query->num_rows==0 && $link[$i]==="absen") {
					$warning = "<img src='./lib/img/warning.png' width='20' />";
				} else {
					$warning = "";
				}
				echo "<li $status><a href='$link[$i]'>$name[$i] $warning</a></li>";
			}
   		}
	?>
</ul>