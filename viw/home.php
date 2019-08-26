
			<section id="slider" class="fullheight">

				<!--
					SWIPPER SLIDER PARAMS
					
					data-effect="slide|fade|coverflow"
					data-autoplay="4000|false"
				-->
                  
				<div class="swiper-container" data-effect="slide" data-autoplay="4000">
					<div class="swiper-wrapper">
                        <?php
                        $slider = $conn -> query("SELECT * FROM tblslide");
                        while ($rslide = $slider -> fetch_assoc()) {
                            # code...
                    ?>
						<!-- SLIDE 1 -->
						<div class="swiper-slide" style="background-image: url('./sl/<?php echo $rslide['slide'];?>');">
							<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>
							
							<div class="display-table">
								<div class="display-table-cell vertical-align-middle">
									<div class="container">

										<div class="row">
											<div class="text-center col-md-8 col-xs-12 col-md-offset-2">

												<!--<h1 class="bold font-raleway wow fadeInUp" data-wow-delay="0.4s">WELCOME TO FURTIVE</h1>
												<p class="lead font-lato weight-300 hidden-xs wow fadeInUp" data-wow-delay="0.6s">Porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
												<a class="btn btn-default btn-lg wow fadeIn" data-wow-delay="1.5s" href="#">PURCHASE NOW</a>
-->
											</div>
										</div>
							
									</div>
								</div>
							</div>
							
						</div>
						<!-- /SLIDE 1 -->
                        <?php } ?>

					</div>

					<!-- Swiper Pagination -->
					<div class="swiper-pagination"></div>

					<!-- Swiper Arrows -->
					<div class="swiper-button-next"><i class="fa fa-angle-right"></i></div>
					<div class="swiper-button-prev"><i class="fa fa-angle-left"></i></div>
				</div>
					
			</section>
			<!-- /SLIDER -->





			<!-- Welcome -->
			<section>
				<div class="container">

					<div class="text-center">
						<h1>Ahlan wa Sahlan<span> UKKI PENS</span>.</h1>
						<blockquote class="quote">
							
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc.</p>
							<cite>NN</cite>
						</blockquote>
					</div>

				</div>
			</section>
			<!-- Welcome -->



            <!-- -->
            <section>
                <div class="container">

                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <figure class="margin-bottom-20">
                                <img class="img-responsive" src="./gamb/corp-logo.png" alt="service" />
                            </figure>

                            <h4 class="nomargin-bottom">UKKI PENS</h4>
                            <small class="font-lato size-18 margin-bottom-30 block">Because we are the best</small>
                            <p class="text-muted size-14">Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.</p>

                            <a href="#">
                                Read&nbsp;
                                <!-- /word rotator -->
								<span class="word-rotator" data-delay="2000">
									<span class="items">
										<span>more</span>
										<span>now</span>
									</span>
								</span><!-- /word rotator -->
                                <i class="glyphicon glyphicon-menu-right size-12"></i>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <figure class="margin-bottom-20">
                                <img class="img-responsive" src="./gamb/corp-logo.png" alt="service" />
                            </figure>

                            <h4 class="nomargin-bottom">KABINET AKSELERASI</h4>
                            <small class="font-lato size-18 margin-bottom-30 block">To be best of the best</small>
                            <p class="text-muted size-14">Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.</p>

                            <a href="#">
                                Read&nbsp;
                                <!-- /word rotator -->
								<span class="word-rotator" data-delay="2000">
									<span class="items">
										<span>more</span>
										<span>now</span>
									</span>
								</span><!-- /word rotator -->
                                <i class="glyphicon glyphicon-menu-right size-12"></i>
                            </a>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <figure class="margin-bottom-20">
                                <img class="img-responsive" src="./gamb/corp-logo.png" alt="service" />
                            </figure>

                            <h4 class="nomargin-bottom">BSO & DEPARTEMEN </h4>
                            <small class="font-lato size-18 margin-bottom-30 block">It's very simple but powerful</small>
                            <p class="text-muted size-14">Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro.</p>

                            <a href="#">
                                Read&nbsp;
                                <!-- /word rotator -->
								<span class="word-rotator" data-delay="2000">
									<span class="items">
										<span>more</span>
										<span>now</span>
									</span>
								</span><!-- /word rotator -->
                                <i class="glyphicon glyphicon-menu-right size-12"></i>
                            </a>
                        </div>

                    </div>

                </div>
            </section>
            <!-- / -->



            <!--  -->
            <section class="alternate">
                  <div class="container">
					<header class="text-center margin-bottom-60">
						<h3>UPCOMING EVENT</h3>
						<hr>
					</header>
                    <div class="box-inner">

                        <div class="timeline"><!-- .timeline-inverse = right position [left on RTL] -->
                                              <!-- ITEM -->
                            <?php
                                $date = date("Y-m-d");
                                $event = $conn -> query("SELECT * FROM tblupcomingevent WHERE tgl > '".$date."' ORDER BY tgl DESC LIMIT 0,4");
                                while ($revent = $event -> fetch_assoc()) {
                                if(strlen($revent['tgl']) >= 10){
                                    $isi = substr($revent['tgl'],8,10);
                                    $bulan = substr($revent['tgl'],0,7);
                                    if(strlen($bulan) >= 7){
                                        $b = substr($bulan,6,1);
                                        switch ($b) {
                                            case '1':
                                                    $dayCode = "Jan";
                                                break;
                                            case '2':
                                                    $dayCode = "Feb";
                                                break;
                                            case '3':
                                                    $dayCode = "Mar";
                                                break;
                                            case '4':
                                                    $dayCode = "Apr";
                                                break;
                                            case '5':
                                                    $dayCode = "Mei";
                                                break;
                                            case '6':
                                                    $dayCode = "Jun";
                                                break;
                                            case '7':
                                                    $dayCode = "Jul";
                                                break;
                                            case '8':
                                                    $dayCode = "Agt";
                                                break;
                                            case '9':
                                                    $dayCode = "Sep";
                                                break;
                                            case '10':
                                                    $dayCode = "Okt";
                                                break;
                                            case '11':
                                                    $dayCode = "Nov";
                                                break;
                                            case '12':
                                                    $dayCode = "Des";
                                                break;
                                            default:
                                                    echo "Hari Tidak Valid";
                                                break;
                                        }
                                    }   
                                }
                                else{
                                    $isi = $revent['tgl'];
                                }
                                if(strlen($revent['deskripsi']) > 300){
                                    $desc = substr($revent['deskripsi'],0,300);
                                }else{
                                    $desc = $revent['deskripsi'];
                                }
                            ?>
                            <div class="timeline-item timeline-item-bordered">
                                <!-- timeline entry -->
                                <div class="timeline-entry rounded"><!-- .rounded = entry -->
                                                                    <?php echo $isi;?><span><?php echo $dayCode;?></span>
                                    <div class="timeline-vline"><!-- vertical line --></div>
                                </div>
                                <!-- /timeline entry -->

                                <h2 class="uppercase bold size-17"><?php echo $revent['event']?></h2>
                                <p><?php echo $desc;?></p>

                            </div>
                                              <!-- /ITEM -->
                            <?php } ?>
                        </div>

                    </div>

                </div>
            </section>
            <!-- / -->

            

            <!-- RECENT NEWS -->
            <section>
                <div class="container">

                    <header class="text-center margin-bottom-60">
						<h3>INFO & BERITA TERBARU</h3>
						<hr>
					</header>

        
                    <div class="owl-carousel owl-padding-10 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items":"4", "autoPlay": 4000, "navigation": true, "pagination": false}'>
                        <?php
                            $info = $conn -> query("SELECT tblinfo.idinfo,tblinfo.judul,tblinfo.isi,tblinfo.iduser,tblinfo.gambar,tblinfo.kategori_id,tblinfo.in_tgl,tblinfo.edit_tgl,tblinfo.status,tblkategori.idkategori,tblkategori.kategori,tbladmin.idadmin,tbladmin.nama FROM
tblinfo INNER JOIN tblkategori ON tblkategori.idkategori=tblinfo.kategori_id INNER JOIN tbladmin ON tbladmin.idadmin = tblinfo.iduser
   ORDER BY tblinfo.edit_tgl ASC LIMIT 0,10");
                            $n = $info->num_rows;
                            while ($rinfo = $info -> fetch_assoc()) {
                                # code...
                            
                        ?>
                        <div class="img-hover">
                            <a href="viewinfo&id=<?php echo $rinfo['idinfo']?>">
                                <img class="img-responsive" src="./gamb/<?php echo $rinfo['gambar']?>" alt="">
                            </a>

                            <h4 class="text-left margin-top-20"><a href="viewinfo&id=<?php echo $rinfo['idinfo']?>"><?php echo $rinfo['judul']?></a></h4>
                            <p class="text-left">
                                <?php
                                    if(strlen($rinfo['isi']) > 300){
                                        $d = substr($rinfo['isi'],0,300);
                                        echo $d;
                                    }else{
                                        $d = $rinfo['isi'];
                                        echo $d;
                                    }
                                ?>
                            </p>
                            <ul class="text-left size-12 list-inline list-separator">
                                <li>
                                    <i class="fa fa-calendar"></i>
                                    <?php echo $rinfo['edit_tgl']?>
                                </li>
                                <li>
                                    <a href="blog-single-default.html#comments">
                                        <i class="fa fa-user"></i>
                                        <?php 
                                            echo $rinfo['nama'];
                                        ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                       <?php } ?>
                    </div>

                </div>
            </section>
            <!-- /RECENT NEWS -->


			<!-- Info -->
			<section class="alternate">
				<div class="container">

					<div class="row">

						<div class="col-md-6 col-sm-6">
							<img class="img-responsive wow fadeIn" data-wow-delay="0.6s" src="./gamb/corp-logo.png"
							alt="" />
						</div>

						<div class="col-md-6 col-sm-6">
							<header class="margin-bottom-60">
								<h2> Sambutan Ketua UKKI PENS</h2>
								
							</header>

							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus deserunt, nobis quae eos provident quidem. Quaerat expedita dignissimos perferendis, nihil quo distinctio eius architecto reprehenderit maiores.</p>
							<p>Similique excepturi voluptates placeat ducimus delectus magnam tempore dolore dolorem quisquam porro modi voluptatum eum saepe dolorum ratione officia sint eos minus.</p>

							
						</div>

					</div>

				</div>
			</section>
			<!-- /Info -->
