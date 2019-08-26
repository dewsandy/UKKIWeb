	<!-- CALLOUT -->
			<div class="alert alert-transparent bordered-bottom nomargin">
				<div class="container">
					<div class="text-center">
						<blockquote class="quote">
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc.</p>
							<cite>NN</cite>
						</blockquote>
					</div>
				</div>
			</div>
			<!-- /CALLOUT -->
			<!-- FOOTER -->
			<footer id="footer">
				<div class="container">

					<div class="row">
						
						<div class="col-md-3 col-xs-4">
							<!-- Footer Logo -->
							<img class="footer-logo" src="assets/images/logo-footer.png" alt="" />
							<address>
								<ul class="list-unstyled">
									<li class="footer-sprite address">
										Sekretariat : Musholla An-Nahl Lt 2 ,Kampus PENS<br>
										Jl.Raya ITS ,Kampus PENS .60111<br>
										Surabaya,Indonesia<br>
									</li>
									
									<li class="footer-sprite email">
										<a href="mailto:support@yourname.com">support@yourname.com</a>
									</li>
								</ul>
							</address>
							<!-- /Contact Address -->

						</div>

						<div class="col-md-3 col-xs-4">

							<!-- Latest Blog Post -->
							<h4 class="letter-spacing-1">INFO TERBARU</h4>
							<ul class="footer-posts list-unstyled">
								<?php
									$sinfo =  $conn -> query("SELECT tblinfo.idinfo,tblinfo.judul,tblinfo.isi,tblinfo.iduser,tblinfo.gambar,tblinfo.kategori_id,tblinfo.in_tgl,tblinfo.edit_tgl,tblinfo.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblinfo INNER JOIN tblkategori ON tblkategori.idkategori=tblinfo.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblinfo.iduser
   ORDER BY tblinfo.in_tgl ASC LIMIT 0,3");
									while($rinfo = $sinfo -> fetch_assoc()){
								?>
								<li>
									<a href="viewinfo&id=<?php echo $rinfo['idinfo']?>"><?php echo $rinfo['judul']; ?></a>
									<small><?php echo $rinfo['in_tgl']; ?></small>
								</li>
								<?php } ?>
							</ul>
							<!-- /Latest Blog Post -->

						</div>
						<div class="col-md-3 col-xs-12">

							<!-- Newsletter Form -->
							<h4 class="letter-spacing-1">TEMUKAN KAMI</h4>
							
							<!-- /Newsletter Form -->

							<!-- Social Icons -->
							<div class="margin-top-20">
                            
								<a href="#" class="social-icon social-facebook" data-toggle="tooltip" data-placement="top" title="Facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>

                            
                                <a href="#" class="social-icon social-twitter" data-toggle="tooltip" data-placement="top" title="Twitter">
                                    <i class="icon-twitter"></i>
                                    <i class="icon-twitter"></i>
                                </a>

                                <a href="#" class="social-icon social-instagram" data-toggle="tooltip" data-placement="top" title="Instagram">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>
								
							</div>
							<!-- /Social Icons -->

						</div>
						<div class="col-md-3 col-xs-4">

							<!-- Links -->
							<h4 class="letter-spacing-1">LINK LUAR</h4>
							<ul class="footer-links list-unstyled">
								<li><a href="">Politeknik Elektronika Negeri Surabaya (PENS)</a></li>
								<li><a href="#">DIKTI</a></li>
								
							</ul>
							<!-- /Links -->

						</div>

						

					</div>

				</div>

				<div class="copyright">
					<div class="container">
						
						&copy; All Rights Reserved, UKKI PENS (Departemen Media Informasi)
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->