<?php 
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../lib/db/dbconfig.php';

if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = sha1(mysqli_escape_string($conn, $_POST['pwd']));

	//$sql = "SELECT * FROM user WHERE email_user='$email' AND pwd_user='$pwd'";
	//$query = $conn->query($sql);
	//$hitung = $query->num_rows;
	
	//mentor
	$sqlmentor = "SELECT * FROM tblmentor WHERE user='$email' AND password='$pwd'";
	$querymentor = $conn -> query($sqlmentor);
	$htmentor = $querymentor -> num_rows;
	
	//mente
	$sqlmente = "SELECT * FROM tblmente WHERE username='$email' AND pass='$pwd'";
	$querymente = $conn -> query($sqlmente);
	$htmente = $querymente -> num_rows;
	
	if ($htmentor!==0) {
		$ambil = $querymentor->fetch_assoc();
		extract($ambil);
		$idmentor = $ambil['idmentor'];
		if ($status==='1') {
			$_SESSION['pb']=$email;
			$_SESSION['id']=$idmentor;
			$_SESSION['namamentor'] = $namamentor;
			//echo $_SESSION['id'];
			header("Location:../index.php");
		} 
	}else{
		header("location:../index.php?log=2");
	}
	if ($htmente!==0) {
		$am = $querymente->fetch_assoc();
		extract($am);
		
		if ($status==='1') {
			$_SESSION['sw']=$email;
			$_SESSION['idmente']=$idmente;
			$_SESSION['namamente'] = $nama;
			header("Location:../index.php");
		}
	}else{
		header("location:../index.php?log=2");
	}
}
elseif (isset($_GET['logout'])) {
	//session_destroy();
	if($_SESSION['pb']){
		unset($_SESSION['pb']);
		unset($_SESSION['id']);
	}else if($_SESSION['sw']){
		unset($_SESSION['sw']);
		unset($_SESSION['id']);
	}
}
/**********************************************************/
//
//				Proses untuk User mente
//
/**********************************************************/
elseif (isset($_GET['absen'])) {
	if($_GET['absen']==1){
		$month = date("m");
		$day_tgl = date("d");
		$day = date("N");
		$hour = date("H.i")." WIB";
		$status = "Menunggu";
		$mente = $conn -> query("SELECT * FROM tblmente WHERE idmente='".$_SESSION['idmente']."'");
		$qmente = $mente -> fetch_assoc();
		$mentornya = $qmente['mentor'];

		$sql = "INSERT INTO tblabsensi_mente
		SET mente = '".$_SESSION['idmente']."',darimentor='".$mentornya."',
		keterangan = '".$status."',id_bln = '".$month."',id_hari = '".$day."',
		id_tgl = '".$day_tgl."',jam_msk = '".$hour."'
		";
		$res = $conn -> query($sql);
		//var_dump($res);
		if($res){
			header("location:../absen&ab=1");
		}else{
			header("location:../absen&ab=2");
		}
		
	} 
}

// Simpan Catatan
elseif (isset($_POST['simpan_note'])) {
	
	if ($note !== "") {
		$id_user = $_SESSION['idmente'];
		$note = htmlspecialchars($_POST['note']);
		$month = date("m");
		$day_tgl = date("d");
		$day = date("N");
		$id_note = "NULL";
		$status = "Menunggu";
		$mente = $conn -> query("SELECT * FROM tblmente WHERE idmente='".$_SESSION['idmente']."'");
		$qmente = $mente -> fetch_assoc();
		$mentornya = $qmente['mentor'];

		$sql= "INSERT INTO tblcatatan SET id_mente='".$id_user."',
		id_mentor = '".$mentornya."',id_bln = '".$month."',
		id_hari = '".$day."',id_tgl = '".$day_tgl."',isi='".$note."',
		status='".$status."'
		";
		$statement = $conn->query($sql);
		//var_dump($statement);
		if ($statement) {
			header("location:../catatan&st=1");
		}else {
			header("location:../catatan&st=2");
		}
	} else {
		header("location:../catatan&st=2");
	}
}

/**********************************************************/
//
//				Proses untuk User Mentor
//
/**********************************************************/
elseif (isset($_GET['accx_absen'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_absen=$_GET['accx_absen'];
		$type = $_GET['type'];
		if ($type==="in") {
			$query = "UPDATE tblabsensi_mente SET keterangan=? WHERE idabsenmente='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					echo "Sukses";
				}else{
					//gagal update
					echo "Gagal";
				}
				$conn->close();
			} else {
				echo "Ga siap";
			}
			
		} else {
			$query = "UPDATE tblabsensi_mente SET keterangan=? WHERE idabsenmente='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					echo "Sukses";
				}else{
					//gagal update
					echo "Gagal";
				}
				$conn->close();
			} else {
				echo "Ga siap";
			}
		}
	}
}
// Aksi pembimbing buat konfirmasi absen
elseif (isset($_GET['acc_absen'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_absen=$_GET['acc_absen'];
		$type = $_GET['type'];
		if ($type==="in") {
			$query = "UPDATE tblabsensi_mente SET keterangan=? WHERE idabsenmente='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../absen&ab=1");
				}else{
					//gagal update
					header("location:../absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../absen&ab=2");
			}
			
		} /*else {
			$query = "UPDATE tblabsensi_mente SET st_jam_klr=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Dikonfirmasi";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../absen&ab=1");
				}else{
					//gagal update
					header("location:../absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../absen&ab=2");
			}
		}*/
	}
}
// Acc absen V2
elseif (isset($_POST['acc_absen2'])) {
	
	if (!empty($_POST['id_absen'])) {
		$count_id = count($_POST["id_absen"]);
		for($i=0; $i < $count_id; $i++) 
		{
		    $item=explode(",", $_POST["id_absen"][$i]);
		    $id_absen = "$item[0]";
		    $type = "$item[1]";
		    
		    if ($type==="in") {
				$query = "UPDATE tblabsensi_mente SET keterangan=? WHERE idabsenmente='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Dikonfirmasi";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../absen&ab=1");
					}else{
						//gagal update
						header("location:../absen&ab=2");
					}
					
				} else {
					header("location:../absen&ab=6");
				}
				
			} /*else {
				$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Dikonfirmasi";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../absen&ab=1");
					}else{
						//gagal update
						header("location:../absen&ab=2");
					}
					
				} else {
					header("location:../absen&ab=2");
				}
			}*/
		}
		$conn->close();
	} else {
		header("location:../absen&ab=2");
	}

}
// Aksi pembimbing buat declie absen
elseif (isset($_GET['dec_absen'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_absen=$_GET['dec_absen'];
		$type = $_GET['type'];
		if ($type==="in") {
			$query = "UPDATE tblabsensi_mente SET keterangan=? WHERE idabsenmente='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Ditolak";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../absen&ab=3");
				}else{
					//gagal update
					header("location:../absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../absen&ab=2");
			}
			
		}/* else {
			$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
			if ($statement = $conn->prepare($query)) {
				$status = "Ditolak";
				$statement->bind_param(
					"s", $status);
				if ($statement->execute()) {
					// sukses update
					header("location:../absen&ab=3");
				}else{
					//gagal update
					header("location:../absen&ab=2");
				}
				$conn->close();
			} else {
				header("location:../absen&ab=2");
			}
		}*/
	}
}
// Decline absen v2
elseif (isset($_POST['dec_absen2'])) {
	
	if (!empty($_POST['id_absen'])) {
		$count_id = count($_POST["id_absen"]);
		for($i=0; $i < $count_id; $i++) 
		{
		    $item=explode(",", $_POST["id_absen"][$i]);
		    $id_absen = "$item[0]";
		    $type = "$item[1]";
		    
		    if ($type==="in") {
				$query = "UPDATE tblabsensi_mente SET keterangan=? WHERE idabsenmente='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Ditolak";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../absen&ab=3");
					}else{
						//gagal update
						header("location:../absen&ab=2");
					}
					
				} else {
					header("location:../absen&ab=2");
				}
				
			}/* else {
				$query = "UPDATE data_absen SET st_jam_klr=? WHERE id_absen='$id_absen'";
				if ($statement = $conn->prepare($query)) {
					$status = "Ditolak";
					$statement->bind_param(
						"s", $status);
					if ($statement->execute()) {
						// sukses update
						header("location:../absen&ab=3");
					}else{
						//gagal update
						header("location:../absen&ab=2");
					}
					
				} else {
					header("location:../absen&ab=2");
				}
			}*/
		}
		$conn->close();
	} else {
		header("location:../absen&ab=2");
	}
}
//absen untuk mentor
elseif (isset($_GET['absenmentor'])) {
	if($_GET['absenmentor']==1){
		$month = date("m");
		$day_tgl = date("d");
		$day = date("N");
		$hour = date("H.i")." WIB";
		$status = 1;
		
		$sqm = "INSERT INTO tblabsensi_mentor SET
		mentor='".$_SESSION['id']."',idbln = '".$month."',
		idtgl = '".$day_tgl."',idhari = '".$day."',jam_msk='".$hour."',
		keterangan='".$status."'
		";
		$resm = $conn -> query($sqm);
		var_dump($resm);

		if($resm){
			header("location:../absenmentor&ab=1");
		}else{
			header("location:../absenmentor&ab=2");
		}
		
	} 
}
// acc Note
elseif (isset($_GET['acc_note'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:home");
	}else{
		$id_note=$_GET['acc_note'];
		$sql = "UPDATE tblcatatan SET status=? WHERE id_cat='$id_note'";
		if ($statement = $conn->prepare($sql)) {
			$status= "Dikonfirmasi";
			$statement->bind_param(
				"s", $status
				);
			if ($statement->execute()) {
				header("location:../req_catatan&ab=1");
			}else{
				//gagal update
				header("location:../req_catatan&ab=2");
			}
			$conn->close();
		} else {
			header("location:../req_catatan&ab=2");
		}
		
	}
}
// Decline Note
elseif (isset($_GET['dec_note'])) {
	if (!isset($_SESSION['pb'])) {
		header("location:../home");
	}else{
		$id_note=$_GET['dec_note'];
		$sql = "UPDATE tblcatatan SET status=? WHERE id_cat='$id_note'";
		if ($statement = $conn->prepare($sql)) {
			$status= "Dibatalkan";
			$statement->bind_param(
				"s", $status
				);
			if ($statement->execute()) {
				header("location:../req_catatan&ab=3");
			}else{
				//gagal update
				header("location:../req_catatan&ab=2");
			}
			$conn->close();
		} else {
			header("location:../req_catatan&ab=2");
		}
		
	}
}

// Ganti password
elseif (isset($_POST['change-pwd'])) {
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$old = sha1(mysqli_real_escape_string($conn, $_POST['old-pwd']));
	$new = sha1(mysqli_real_escape_string($conn, $_POST['new-pwd']));
	$cek = sha1(mysqli_real_escape_string($conn, $_POST['new-pwd-cek']));
	if (!empty($old) || !empty($new) || !empty($cek) || !empty($id)) {
			if ($new !== $cek) {
				header("location:../katasandi&id=$id&st=5");
			} else {
				$sqlc = "UPDATE tblmentor SET password=? WHERE idmentor='$id'";
				if ($update= $conn->prepare($sqlc)) {
					$update->bind_param("s", $new);
					if ($update->execute()) {
						header("location:../katasandi&id=$id&st=1");
					} else {
						header("location:../katasandi&id=$id&st=2");
					}
				} else {
					header("location:../katasandi&id=$id&st=2");
				}
			}
	} else {
		header("location:../katasandi&id=$id&st=4");
	}
}
/**********************************************************/
//
//				Proses Untuk Orang bandel!
//
/**********************************************************/
else {
	echo "<script>window.alert('Istigfar dulu !! ');window.location=('../home');</script>";
}
?>