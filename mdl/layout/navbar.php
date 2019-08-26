
			<!-- 
				AVAILABLE HEADER CLASSES

				Default nav height: 96px
				.header-md 		= 70px nav height
				.header-sm 		= 60px nav height

				.noborder 		= remove bottom border (only with transparent use)
				.transparent	= transparent header
				.translucent	= translucent header
				.sticky			= sticky header
				.static			= static header
				.dark			= dark header
				.bottom			= header on bottom
				
				shadow-before-1 = shadow 1 header top
				shadow-after-1 	= shadow 1 header bottom
				shadow-before-2 = shadow 2 header top
				shadow-after-2 	= shadow 2 header bottom
				shadow-before-3 = shadow 3 header top
				shadow-after-3 	= shadow 3 header bottom

				.clearfix		= required for mobile menu, do not remove!

				Example Usage:  class="clearfix sticky header-sm transparent noborder"
			-->
			<div id="header" class="sticky clearfix shadow-after-3">

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- BUTTONS -->
						<ul class="pull-right nav nav-pills nav-second-main">

							<!-- SEARCH -->
							<li class="search">
								<a href="javascript:;">
									<i class="fa fa-search"></i>
								</a>
								<div class="search-box">
									<form action="./mdl/proses.php" enctype="multipart/form-data" method="post" >
										<div class="input-group">
											<input type="text" name="s" id='s' placeholder="Cari" class="form-control" />
											<span class="input-group-btn">
												<button class="btn btn-primary" type="submit">Search</button>
											</span>
										</div>
									</form>
								</div> 
							</li>
							<!-- /SEARCH -->

							
						</ul>
						<!-- /BUTTONS -->


						<!-- Logo -->
						<a class="logo pull-left" href="#">
							<img src="./lib/assets/images/corp-logo.png" alt="" /> <!-- dark logo -->
						</a>

						<!-- 
							Top Nav 
							
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
						-->
						<div class="navbar-collapse pull-right nav-main-collapse collapse">
							<nav class="nav-main">

								<!--
									NOTE
									
									For a regular link, remove "dropdown" class from LI tag and "dropdown-toggle" class from the href.
									Direct Link Example: 

									<li>
										<a href="#">HOME</a>
									</li>
								-->
								<ul id="topMain" class="nav nav-pills nav-main">
									<li class="dropdown active"><!-- HOME -->
										<a class="" href="home">
											BERANDA
										</a>
										
									</li>
									<li class="dropdown"><!-- BLOG -->
										<a class="dropdown-toggle" href="#">
											UKKI PENS
										</a>
										<ul class="dropdown-menu">
											 <?php
                                    
		                                        $blog=array("","sejarah","strukturkabinet");
		                                        $nBlog=array("","Sejarah","Struktur Kabinet");

		                                        for ($i=1; $i <= count($blog)-1 ; $i++) {
		                                                echo "<li class='dropdown'><a href='$blog[$i]'>$nBlog[$i]</a></li>";
		                                            }
                                    
                                			?>
											
										</ul>
									</li>
									
									<li class="dropdown"><!-- BLOG -->
										<a class="dropdown-toggle" href="#">
											INFO
										</a>
										<ul class="dropdown-menu">
											<?php
                                    
		                                        $blog=array("","infointernal","infoeks");
		                                        $nBlog=array("","Info Internal","Info Eksternal");

		                                        for ($i=1; $i <= count($blog)-1 ; $i++) {
		                                                echo "<li class='dropdown'><a href='$blog[$i]'>$nBlog[$i]</a></li>";
		                                            }
                                    
                                			?>
										</ul>
									</li>
									
									<li class="dropdown"><!-- BLOG -->
										<a class="" href="berita">
											BERITA
										</a>
										
									</li>
									<li class="dropdown"><!-- BLOG -->
										<a class="" href="annahl">
											AN-NAHL STUDIO
										</a>
										
									</li>
								</ul>

							</nav>
						</div>

					</div>
				</header>
				<!-- /Top Nav -->

			</div>