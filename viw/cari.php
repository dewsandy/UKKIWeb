<section class="page-header">
				<div class="container">
					<h1>Hasil Pencarian Dari <?php
						if(isset($_GET['ab'])){
							echo $_GET['ab'];
						}
					?></h1>
				</div>
</section>
			<section>
				<div class="container">
					<div class="row">

						<!-- LEFT COLUMNS -->
						<?php
							if(isset($_GET['ab'])){
								$w = $_GET['ab'];
							$s = $conn -> query('SELECT tblinfo.idinfo,tblinfo.judul,
								tblinfo.isi,tblinfo.iduser,tblinfo.gambar,
								tblinfo.kategori_id,tblinfo.in_tgl,tblinfo.edit_tgl,
								tblinfo.status,tblkategori.idkategori,tblkategori.kategori,
								tbladmin.idadmin,tbladmin.nama FROM
								tblinfo INNER JOIN tblkategori ON tblkategori.idkategori=tblinfo.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblinfo.iduser
								WHERE tblinfo.judul LIKE "%'.$w.'%"');
							

						?>
						<div class="col-md-9 col-sm-9">
							<?php
							if($s -> num_rows != 0){
								while($d = $s -> fetch_assoc()){
							?>
							<!-- SEARCH RESULTS -->
							<div class="clearfix search-result"><!-- item -->
							
								<h4 class="margin-bottom-0"><a href="viewinfo&id=<?php  echo $d['idinfo'] ?>"><?php echo $d['judul']?></a></h4>
								<small class="text-success">/</small>
								<p>
									<?php
										if(strlen($d['isi']) >= 100){
											$a = substr($d['isi'], 0,100);
											echo $a;
										}else{
											echo $d['judul'];
										}
									?>	
								</p>
							</div><!-- /item -->
							<?php
								}
							}else{
							?>

							<h4 class="margin-bottom-0"><a href="#">Hasil Pencarian dari <?php echo $_GET['ab']?> Tidak Ditemukan</a></h4>

							<?php }
							?>

							
							<!-- PAGINATION -->
							<div class="text-center margin-top-60">
								<ul class="pagination">
									<li class="disabled"><a href="#">Previous</a></li>
									<li class="active"><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
							<!-- /PAGINATION -->

						</div>
						<?php } ?>
						<!-- /LEFT COLUMNS -->

						<?php
							include('./mdl/layout/sidebar.php');
						?>

						</div>
						<!-- /RIGHT COLUMNS -->
						
				</div>
			</section>
			<!-- / -->