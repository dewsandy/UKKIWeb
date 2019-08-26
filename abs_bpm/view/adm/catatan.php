<h3 class='page-header'>Catatan Kegiatan Mentoring Wajib</h3>
	<div class='table-responsive'>
	<?php 
		
		if (isset($_GET['id_mente'])) {
			if ($_GET['id_mente']!=="") {
				$id_user=$_GET['id_mente'];
				include './view/note.php';
			} else {
				header("location:catatan");
			}
		} else {
			$sql = "SELECT tblmente.idmente,tblmente.mentor,tblmente.nama,tblmente.idjurusan,tblmente.alamat,tblmente.idjenjang
	,tblmente.no_telp,tblmente.status,tbljenjang.jenjang,tbljurusan.jurusan,tblmentor.idmentor,
	tblmentor.namamentor
	FROM tblmente INNER JOIN tblmentor ON tblmentor.idmentor = tblmente.mentor 
	INNER JOIN tbljurusan ON tbljurusan.idjurusan = tblmente.idjurusan
	INNER JOIN tbljenjang ON tbljenjang.idjenjang = tblmente.idjenjang
	WHERE tblmentor.namamentor ='".$_SESSION['namamentor']."'
	";
			if ($conn->query($sql)->num_rows!==0) {
				echo "<table class='table table-striped' style='width:50%'>
					<thead>
						<tr>
							<th>No</th>
                            <th>Nama</th>
							<th>Jurusan</th>
							<th>Mentor</th>
							<th>Alamat</th>
							<th>No Telpon</th>
							<th>Catatan</th>
						</tr>
					</thead>
					<tbody>";
				$query_mente = $conn->query($sql);
				$no=0;
				while ($get_mente = $query_mente->fetch_assoc()) {
					 $idmente = $get_mente['idmente'];
                        $nama = $get_mente['nama'];
                        $jurusan = $get_mente['jurusan'];
						$jenjang = $get_mente['jenjang'];
						$mentor = $get_mente['namamentor'];
						$alamat = $get_mente['alamat'];
						$notelpon = $get_mente['no_telp'];
					$no++;
					echo "<tr>
								<td>$no</td>
                                <td>$nama</td>
                                <td><strong>$jenjang $jurusan</strong></td>
								<td><strong>$mentor</strong></td>
                                <td>$alamat</td>
								<td>$notelpon</td>
							<td><a href='catatan&id_mente=$idmente' title='Catatan $nama'>Lihat Catatan</a></td>
						</tr>";
				}
				$conn->close();
				echo "</tbody></table>";
			} else {
				echo "<div class='alert alert-danger'><strong>Tidak ada Siswa untuk ditampilkan</strong></div>";
			}
		}
	 ?>
</div>