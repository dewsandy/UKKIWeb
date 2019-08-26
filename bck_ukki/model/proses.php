<?php 
	session_start();
	date_default_timezone_set('Asia/Jakarta');
	include '../lib/conf/config.php';

	//Login dan logout
	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = sha1(mysqli_escape_string($conn, $_POST['pwd']));

		$sql = "SELECT * FROM tbladmin WHERE user='$email' AND password='$pwd'";
		$query = $conn -> query($sql);
		$ht = $query -> num_rows;
	
		if ($ht!==0) {
			$ambil = $query->fetch_assoc();
			extract($ambil);
			$id = $ambil['idadmin'];
			if ($status==='1') {
				$_SESSION['idadmin'] = $id;
				$_SESSION['nama_admin'] = $nama;
				$_SESSION['useradmin'] = $user;
				$_SESSION['hak'] = $hak_akses;
				header("Location:../index.php");
			} 
		}else{
			header("location:../index.php?log=2");
		}
		
	}
	elseif (isset($_GET['logout'])) {
		unset($_SESSION['idadmin']);
		unset($_SESSION['nama_admin']);
		unset($_SESSION['useradmin']);
		unset($_SESSION['hak']);
	}

	//kategori
	elseif (isset($_POST['skategori'])) {
		$kategori =htmlspecialchars($_POST['kategori']);
		$idkategori = $_POST['idkategori'];

		$inkat = $conn -> query("UPDATE tblkategori SET kategori='$kategori' WHERE idkategori=$idkategori");
		if ($inkat) {
			header("location:../kategori&ab=1");
		}else {
			header("location:../kategori&ab=2");
		}
	}
	elseif (isset($_POST['cancel_kategori'])) {
		header("location:../kategori&ab=3");
	}
	elseif (isset($_POST['hapuskategori'])) {
		$idkategori = $_POST['hapuskategori'];

		$hkat = $conn -> query("DELETE FROM tblkategori WHERE idkategori=$idkategori");
		if ($hkat) {
			header("location:../kategori&ab=4");
		}
	}elseif (isset($_POST['hapuskat'])) {
		if(!empty($_POST['idkategori'])){
			$count_id = count($_POST["idkategori"]);
			for($i=0; $i < $count_id; $i++) 
			{
			    $item=explode(",", $_POST["idkategori"][$i]);
			    $id_kategori = "$item[0]";
			 	$hkat = $conn -> query("DELETE FROM tblkategori WHERE idkategori=$id_kategori");
				if ($hkat) {
					header("location:../kategori&ab=4");
				} 
			}
			$conn->close();
		}
	}
	
	//berita
	elseif (isset($_POST['tambahberita'])) {
		$selkat = $conn -> query("SELECT * FROM tblkategori WHERE kategori='Berita'");
		$qrow = $selkat -> fetch_assoc();

		$idkategori = $qrow['idkategori'];

		$judul = htmlentities($_POST['judul']);
		$isi = htmlentities($_POST['isi']);
		$intgl = date("d-m-y H:i:s");
		$uptgl = date("d-m-y H:i:s");
		$status = 1;
		$user = $_SESSION['idadmin'];

		$imgFile = $_FILES['gambar']['name'];
		$tmp_dir = $_FILES['gambar']['tmp_name'];
		$imgSize = $_FILES['gambar']['size'];

		$upload_dir = '../../gamb/'; // upload directory
	
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
		// valid image extensions
		$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
		
		// rename uploading image
		$userpic = rand(1000,1000000).".".$imgExt;

			// allow valid image file formats
		if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
			if($imgSize < 5000000)				{
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				$berita = $conn -> query("INSERT INTO tblberita SET judul='$judul',
					kategori_id=$idkategori,isi='$isi',iduser=$user,gambar='$userpic'
					,in_tgl='$intgl',status=$status,edit_tgl='$uptgl'");
				var_dump($berita);
				if($berita){
					header("location:../berita&ab=5");
				}else{
					header("location:../berita&ab=2");
				}
			}
			else{
				header("location:../inberita&ab=4");
			}
		}
		else{
			header("location:../inberita&ab=5");
		}
	}
	elseif (isset($_POST['updateberita'])) {
		if(isset($_POST['idberita'])){
			$id = $_POST['idberita'];
			$selkat = $conn -> query("SELECT * FROM tblkategori WHERE kategori='Berita'");
			$qrow = $selkat -> fetch_assoc();
			$sel = $conn -> query("SELECT * FROM tblberita WHERE idberita=$id");
			$qsel = $sel -> fetch_assoc();
			extract($qsel);

			$idkategori = $qrow['idkategori'];

			$judul = htmlentities($_POST['judul']);
			$isi = htmlentities($_POST['isi']);
			$uptgl = date("d-m-y H:i:s");
			$status = 1;
			$user = $_SESSION['idadmin'];


			$imgFile = $_FILES['gambar']['name'];
			$tmp_dir = $_FILES['gambar']['tmp_name'];
			$imgSize = $_FILES['gambar']['size'];

			if($imgFile){
				$upload_dir = '../../gamb/'; // upload directory
		
				$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
				
				// valid image extensions
				$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
				
				// rename uploading image
				$userpic = rand(1000,1000000).".".$imgExt;

					// allow valid image file formats
				if(in_array($imgExt, $valid_extensions)){			
						// Check file size '5MB'
					if($imgSize < 5000000){
						unlink($upload_dir.$qsel['gambar']);
						move_uploaded_file($tmp_dir,$upload_dir.$userpic);
						$berita = $conn -> query("UPDATE tblberita SET judul='$judul',kategori_id=$idkategori,isi='$isi',iduser=$user,gambar='$userpic',status=$status,edit_tgl='$uptgl' WHERE idberita=$id");
						//var_dump($berita);
						if($berita){
							header("location:../berita&ab=5");
						}else{
							header("location:../berita&ab=2");
						}
					}
					else{
						header("location:../inberita&ab=4");
					}
				}
				else{
					header("location:../inberita&ab=5");
				}

			}else{
				$userpic = $qsel['gambar'];
				$berita = $conn -> query("UPDATE tblberita SET judul='$judul',kategori_id=$idkategori,isi='$isi',iduser=$user,gambar='$userpic',status=$status,edit_tgl='$uptgl' WHERE idberita=$id");
					//var_dump($berita);
					if($berita){
						header("location:../berita&ab=5");
					}else{
						header("location:../berita&ab=2");
					}
			}
			
		}
	}
	elseif (isset($_POST['hapusberita'])) {
		$id = $_POST['hapusberita'];
		$sel = $conn -> query("SELECT gambar FROM tblberita WHERE idberita=$id");
		$qsel = $sel -> fetch_assoc();
		unlink("../../gamb/".$qsel['gambar']);

		$hsel = $conn -> query("DELETE FROM tblberita WHERE idberita=$id");
		if($hsel){
			header("location:../berita&ab=4");
		}else{
			header("location:../berita&ab=2");
		}
	}

	//slider
	elseif (isset($_POST['tslide'])) {
		$deskripsi = htmlentities($_POST['deskripsi']);
		$imgFile = $_FILES['gambar']['name'];
		$tmp_dir = $_FILES['gambar']['tmp_name'];
		$imgSize = $_FILES['gambar']['size'];

		$upload_dir = '../../sl/'; // upload directory
	
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
		// valid image extensions
		$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
		
		// rename uploading image
		$userpic = rand(1000,1000000).".".$imgExt;

			// allow valid image file formats
		if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
			if($imgSize < 5000000)				{
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				$berita = $conn -> query("INSERT INTO tblslide SET slide='$userpic' ,deskripsi='$deskripsi' ");
				var_dump($berita);
				if($berita){
					header("location:../slider&ab=5");
				}else{
					header("location:../slider&ab=2");
				}
			}
			else{
				header("location:../inslide&ab=4");
			}
		}
		else{
			header("location:../inslide&ab=5");
		}
	}
	elseif (isset($_POST['uslide'])) {
		$id = $_POST['idslide'];
		 $s = $conn -> query("SELECT * FROM tblslide WHERE idslide=$id");
 		 $srow = $s -> fetch_assoc();
 		 extract($srow);

 		$deskripsi = htmlentities($_POST['deskripsi']);
 		$imgFile = $_FILES['gambar']['name'];
		$tmp_dir = $_FILES['gambar']['tmp_name'];
		$imgSize = $_FILES['gambar']['size'];

		if($imgFile){
			$upload_dir = '../../sl/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
			
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;

				// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
					// Check file size '5MB'
				if($imgSize < 5000000){
					unlink($upload_dir.$srow['slide']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
					echo $userpic; 
					$i = $conn -> query("UPDATE tblslide SET slide='$userpic' WHERE idslide=$id ");
					var_dump($i);
					if($i){
						header("location:../slider&ab=5");
					}else{
						header("location:../slider&ab=2");
					}
				}
				else{
					header("location:../inslide&ab=4");
				}
			}
		}
		else{
			$userpic = $srow['slide'];
			$i = $conn -> query("UPDATE tblslide SET slide='$userpic' WHERE idslide=$id");
					//var_dump($i);
				if($i){
						header("location:../slider&ab=5");
					}else{
						header("location:../slider&ab=2");
				}
		}
	}elseif (isset($_POST['hapusslide'])) {
		$id = $_POST['hapusslide'];
		$sel = $conn -> query("SELECT slide FROM tblslide WHERE idslide=$id");
		$qsel = $sel -> fetch_assoc();
		$d = unlink("../../sl/".$qsel['slide']);
		if($d){
			$hsel = $conn -> query("DELETE FROM tblslide WHERE idslide=$id");
			if($hsel){
				header("location:../slider&ab=4");
			}else{
				header("location:../slider&ab=2");
			}

		}else{
				header("location:../slider&ab=2");
		}
		
	}

	//Infor

	elseif (isset($_POST['tambahinfo'])) {
		$kategori = $_POST['kategori'];
		$judul = htmlentities($_POST['judul']);
		$isi = htmlentities($_POST['isi']);
		$intgl = date("d-m-y H:i:s");
		$uptgl = date("d-m-y H:i:s");
		$status = 1;
		$user = $_SESSION['idadmin'];

		$imgFile = $_FILES['gambar']['name'];
		$tmp_dir = $_FILES['gambar']['tmp_name'];
		$imgSize = $_FILES['gambar']['size'];

		$upload_dir = '../../gamb/'; // upload directory
	
		$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
		// valid image extensions
		$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
		
		// rename uploading image
		$userpic = rand(1000,1000000).".".$imgExt;

			// allow valid image file formats
		if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
			if($imgSize < 5000000)				{
				move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				$berita = $conn -> query("INSERT INTO tblinfo SET judul='$judul',kategori_id=$kategori,isi='$isi',iduser=$user,gambar='$userpic',in_tgl='$intgl',status=$status,edit_tgl='$uptgl'");
				var_dump($berita);
				if($berita){
					header("location:../info&ab=5");
				}else{
					header("location:../info&ab=2");
				}
			}
			else{
				header("location:../ininfo&ab=4");
			}
		}
		else{
			header("location:../ininfo&ab=5");
		}
	}
	elseif (isset($_POST['updateinfo'])) {
		if(isset($_POST['idinfo'])){
			$id = $_POST['idinfo'];
			
			$sel = $conn -> query("SELECT * FROM tblinfo WHERE idinfo=$id");
			$qsel = $sel -> fetch_assoc();
			extract($qsel);

			$idkategori = $_POST['kategori'];

			$judul = htmlentities($_POST['judul']);
			$isi = htmlentities($_POST['isi']);
			$uptgl = date("d-m-y H:i:s");
			$status = 1;
			$user = $_SESSION['idadmin'];


			$imgFile = $_FILES['gambar']['name'];
			$tmp_dir = $_FILES['gambar']['tmp_name'];
			$imgSize = $_FILES['gambar']['size'];

			if($imgFile){
				$upload_dir = '../../gamb/'; // upload directory
		
				$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
				
				// valid image extensions
				$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
				
				// rename uploading image
				$userpic = rand(1000,1000000).".".$imgExt;

					// allow valid image file formats
				if(in_array($imgExt, $valid_extensions)){			
						// Check file size '5MB'
					if($imgSize < 5000000){
						unlink($upload_dir.$qsel['gambar']);
						move_uploaded_file($tmp_dir,$upload_dir.$userpic);
						$berita = $conn -> query("UPDATE tblinfo SET judul='$judul',kategori_id=$idkategori,isi='$isi',iduser=$user,gambar='$userpic',status=$status,edit_tgl='$uptgl' WHERE idinfo=$id");
						//var_dump($berita);
						if($berita){
							header("location:../info&ab=5");
						}else{
							header("location:../info&ab=2");
						}
					}
					else{
						header("location:../upinfo&ab=4");
					}
				}
				else{
					header("location:../upinfo&ab=5");
				}

			}else{
				$userpic = $qsel['gambar'];
				$berita = $conn -> query("UPDATE tblinfo SET judul='$judul',kategori_id=$idkategori,isi='$isi',iduser=$user,gambar='$userpic',status=$status,edit_tgl='$uptgl' WHERE idinfo=$id");
					//var_dump($berita);
					if($berita){
						header("location:../info&ab=5");
					}else{
						header("location:../info&ab=2");
					}
			}
			
		}
	}
	elseif (isset($_POST['hapusinfo'])) {
		$id = $_POST['hapusinfo'];
		$sel = $conn -> query("SELECT gambar FROM tblinfo WHERE idinfo=$id");
		$qsel = $sel -> fetch_assoc();
		if(unlink("../../gamb/".$qsel['gambar'])){

			$hsel = $conn -> query("DELETE FROM tblinfo WHERE idinfo=$id");
			if($hsel){
				header("location:../info&ab=4");
			}else{
				header("location:../info&ab=2");
			}
		}
	}

	//event
	elseif (isset($_POST['tambahevent'])) {
		$kategori = htmlentities($_POST['kat']);
		$event = htmlentities($_POST['event']);
		$des = htmlentities($_POST['desc']);
		$day = htmlentities($_POST['harih']);

		$event = $conn -> query("INSERT INTO tblupcomingevent SET event='$event',deskripsi='$des',id_kategori=$kategori,tgl='$day'");

		var_dump($event);
		if($event){
			header("location:../event&ab=5");
		}else{
			header("location:../event&ab=2");
		}
	}elseif (isset($_POST['ubahevent'])) {
		$id = $_POST['idevent'];
		if($id){
			$kategori = htmlentities($_POST['kat']);
			$event = htmlentities($_POST['event']);
			$des = htmlentities($_POST['desc']);
			$day = htmlentities($_POST['harih']);

			$event = $conn -> query("UPDATE tblupcomingevent SET event='$event',deskripsi='$des',id_kategori=$kategori,tgl='$day' WHERE idevent=$id");
			//var_dump($event);
			if($event){
				header("location:../event&ab=1");
			}else{
				header("location:../event&ab=2");
			}
		}
	}elseif (isset($_POST['hapusevent'])) {
		$id =htmlentities($_POST['hapusevent']);

		$hapusevent = $conn -> query("DELETE FROM tblupcomingevent WHERE idevent=$id");
		if($event){
			header("location:../event&ab=5");
		}else{
			header("location:../event&ab=2");
		}
	}
?>