<section class="page-header">
				<div class="container">

					<h1>Berita Terbaru</h1>

					
				</div>
			</section>
<!-- -->
			<section>
				<div class="container">

					<div class="row">
						<?php
							  $berita = $conn -> query("SELECT tblberita.idberita,tblberita.judul,tblberita.isi,tblberita.iduser,tblberita.gambar,tblberita.kategori_id,tblberita.in_tgl,tblberita.edit_tgl,tblberita.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblberita INNER JOIN tblkategori ON tblkategori.idkategori=tblberita.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblberita.iduser
   WHERE tblberita.idberita=".$_GET['id']."");
							while ($in = $berita -> fetch_assoc()) {
								
						?>
						<!-- LEFT -->
						<div class="col-md-9 col-sm-9">

							<h1 class="blog-post-title"><?php echo $in['judul']?></h1>
							<ul class="blog-post-info list-inline">
								<li>
									<a href="#">
										<i class="fa fa-clock-o"></i> 
										<span class="font-lato"><?php echo $in['in_tgl']?></span>
									</a>
								</li>
								
								<li>
									<a href="#">
										<i class="fa fa-user"></i> 
										<span class="font-lato"><?php echo $in['nama']?></span>
									</a>
								</li>
							</ul>

							
							<figure class="margin-bottom-20">
								<img class="img-responsive" src="./gamb/<?php echo $in['gambar']; ?>" alt="img" />
							</figure>
							
							<!-- /IMAGE -->

							
							<p class="dropcap">
								<?php 
									echo $in['isi'];
								?>
							</p>
							


							<div class="divider divider-dotted"><!-- divider --></div>



							<div class="divider"><!-- divider --></div>

						


						</div>

						<?php
							}
          						include './mdl/layout/sidebar.php';
          				

						?>
					</div>


				</div>
			</section>
			