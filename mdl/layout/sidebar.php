									<?php
										$d = $conn -> query("SELECT * FROM tblkategori");
										?>
						<div class="col-md-3 col-sm-3">

							<!-- INLINE SEARCH -->
							<div class="inline-search clearfix margin-bottom-30">
								<form action="./mdl/proses.php" enctype="multipart/form-data" method="post" class="widget_search">
									<input type="search" placeholder="Cari" id="s" name="s" class="serch-input">
									<button type="submit">
										<i class="fa fa-search"></i>
									</button>
								</form>
							</div>
							<!-- /INLINE SEARCH -->

							<hr />

							<!-- side navigation -->
							<div class="side-nav margin-bottom-60 margin-top-30">

								<div class="side-nav-head">
									<button class="fa fa-bars"></button>
									<h4>KATEGORI</h4>
								</div>
								<ul class="list-group list-group-bordered list-group-noicon uppercase">
									<?php
										while ($u = $d -> fetch_assoc()) {
											
									?>
									<li class="list-group-item">
										<?php
											if($u['idkategori'] == 1){
												echo "
												<a href='infointernal'><!--<span class='size-11 text-muted pull-right'>(12)</span> -->
													 ".$u['kategori']."	
												</a>
												";
											}elseif($u['idkategori'] == 2){
												echo "
												<a href='infoeks'><!--<span class='size-11 text-muted pull-right'>(12)</span> -->
													 ".$u['kategori']."	
												</a>
												";
											}
											elseif($u['idkategori'] == 3){
												echo "
												<a href='berita'><!--<span class='size-11 text-muted pull-right'>(12)</span> -->
													 ".$u['kategori']."	
												</a>
												";
											}
										?>
									</li>
									<?php
										}
									?>
								</ul>
								<!-- /side navigation -->

							
							</div>


							<!-- JUSTIFIED TAB -->
							<div class="tabs nomargin-top hidden-xs margin-bottom-60">

								<!-- tabs -->
								<ul class="nav nav-tabs nav-bottom-border nav-justified">
									<li class="active">
										<a href="#tab_1" data-toggle="tab">
											Terbaru
										</a>
									</li>
									<li>
										<a href="#tab_2" data-toggle="tab">
											Random Pos
										</a>
									</li>
								</ul>

								<!-- tabs content -->
								<div class="tab-content margin-bottom-60 margin-top-30">

									<!-- POPULAR -->
									<div id="tab_1" class="tab-pane active">

										<?php
											 $info = $conn -> query("SELECT tblinfo.idinfo,tblinfo.judul,tblinfo.isi,tblinfo.iduser,tblinfo.gambar,tblinfo.kategori_id,tblinfo.in_tgl,tblinfo.edit_tgl,tblinfo.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblinfo INNER JOIN tblkategori ON tblkategori.idkategori=tblinfo.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblinfo.iduser
   ORDER BY tblinfo.in_tgl ASC LIMIT 0,3");
										while ($ad =$info -> fetch_assoc()) {
										?>										
										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="viewinfo&id=<?php echo $ad['idinfo'];?>">
													<img src="./gamb/<?php echo $ad['gambar']?>" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="viewinfo&id=<?php echo $ad['idinfo'];?>" class="tab-post-link"><?php echo $ad['judul']?></a>
												<small><?php echo $ad['in_tgl']?></small>
											</div>
										</div><!-- /post -->
										<?php }?>
									</div>
									<!-- /POPULAR -->


									<!-- RECENT -->
									<div id="tab_2" class="tab-pane">
										<?php
											 $info = $conn -> query("SELECT tblinfo.idinfo,tblinfo.judul,tblinfo.isi,tblinfo.iduser,tblinfo.gambar,tblinfo.kategori_id,tblinfo.in_tgl,tblinfo.edit_tgl,tblinfo.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblinfo INNER JOIN tblkategori ON tblkategori.idkategori=tblinfo.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblinfo.iduser
   ORDER BY rand() ASC LIMIT 0,3");
										while ($ad =$info -> fetch_assoc()) {
										?>										
										<div class="row tab-post"><!-- post -->
											<div class="col-md-3 col-sm-3 col-xs-3">
												<a href="viewinfo&id=<?php echo $ad['idinfo'];?>">
													<img src="./gamb/<?php echo $ad['gambar']?>" width="50" alt="" />
												</a>
											</div>
											<div class="col-md-9 col-sm-9 col-xs-9">
												<a href="viewinfo&id=<?php echo $ad['idinfo'];?>" class="tab-post-link"><?php echo $ad['judul']?></a>
												<small><?php echo $ad['in_tgl']?></small>
											</div>
										</div><!-- /post -->
										<?php }?>
									</div>
									<!-- /RECENT -->

								</div>

							</div>
							<!-- JUSTIFIED TAB -->

							<h3 class="hidden-xs size-16 margin-bottom-20">SOSIAL MEDIA</h3>
							<!-- TAGS -->
							<hr />


							<!-- SOCIAL ICONS -->
							<div class="hidden-xs margin-top-30 margin-bottom-60">
								<a href="#" class="social-icon social-icon-border social-facebook pull-left" data-toggle="tooltip" data-placement="top" title="Facebook">
									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-twitter pull-left" data-toggle="tooltip" data-placement="top" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="#" class="social-icon social-icon-border social-instagram pull-left" data-toggle="tooltip" data-placement="top" title="Instagram">
									<i class="icon-instagram"></i>
									<i class="icon-instagram"></i>
								</a>

								
							</div>

						</div>