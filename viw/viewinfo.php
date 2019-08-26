<section class="page-header">
				<div class="container">

					<h1>Info Terbaru</h1>

					
				</div>
			</section>
<!-- -->
			<section>
				<div class="container">

					<div class="row">
						<?php
							$i = $conn -> query("SELECT tblinfo.idinfo,tblinfo.judul,tblinfo.isi,tblinfo.iduser,tblinfo.gambar,tblinfo.kategori_id,tblinfo.in_tgl,tblinfo.edit_tgl,tblinfo.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblinfo INNER JOIN tblkategori ON tblkategori.idkategori=tblinfo.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblinfo.iduser
WHERE tblinfo.idinfo=".$_GET['id']."");
							while ($in = $i -> fetch_assoc()) {
								
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
			