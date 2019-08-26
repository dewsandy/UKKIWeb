<h3 class='page-header'>Detail Absensi Mente</h3>
	<div class='table-responsive'>
	<?php 
		if (isset($_GET['id_mente'])) {
			if ($_GET['id_mente']!=="") {
				$id_mente=$_GET['id_mente'];
				include './view/detail_absen.php';
			} else {
				header("location:absensi");
			}
		} else {
			$sql = "SELECT tblmente.idmente,tblmente.mentor,tblmente.nama,tblmente.idjurusan,tblmente.alamat,tblmente.idjenjang
					,tblmente.no_telp,tblmente.status,tbljenjang.jenjang,tbljurusan.jurusan,tblmentor.idmentor,
					tblmentor.namamentor
					FROM tblmente INNER JOIN tblmentor ON tblmentor.idmentor = tblmente.mentor 
					INNER JOIN tbljurusan ON tbljurusan.idjurusan = tblmente.idjurusan
					INNER JOIN tbljenjang ON tbljenjang.idjenjang = tblmente.idjenjang
  					 WHERE tblmentor.namamentor ='".$_SESSION['namamentor']."'";
			$query = $conn->query($sql);
			if ($query->num_rows!==0) {
				echo "<table class='table table-striped' style='width:50%'>
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Mente</th>
							<th>Jurusan</th>
							<th>Alamat</th>
							<th>No Telpon</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>";
				$no=0;
				while ($get_mente = $query->fetch_assoc()) {
					$id_mente = $get_mente['idmente'];
					$nama = $get_mente['nama'];
					$jurusan = $get_mente['jurusan'];
					$jenjang = $get_mente['jenjang'];
					$mentor = $get_mente['namamentor'];
					$no_telp = $get_mente['no_telp'];
					$alamat = $get_mente['alamat'];
					$no++;
					echo "<tr>
							<td>$no</td>
							<td>$nama</td>
							<td>$jenjang $jurusan</td>
							<td>$alamat</td>
							<td>$no_telp</td>
							<td><a href='absensi&id_mente=$id_mente' title='Absensi $nama'>Lihat Absensi</a></td>
						</tr>";
				}
				echo "</tbody></table>";
				$conn->close();
			} else {
				echo "<div class='alert alert-danger'><strong>Tidak ada Siswa untuk ditampilkan</strong></div>";
			}
		}
	 ?>
</div>