<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html> <!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		<title>UKKI PENS | Kabinet Akselerasi</title>
		<meta name="keywords" content="ukki pens,ukki,unit kerohanian islam" />
		<meta name="description" content="" />
		<meta name="Author" content="ukki" />

		<!-- mobile settings -->
		<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- WEB FONTS : use %7C instead of | (pipe) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400%7CRaleway:300,400,500,600,700%7CLato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />

		<!-- CORE CSS -->
		<link href="./lib/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

		<!-- THEME CSS -->
		<link href="./lib/assets/css/essentials.css" rel="stylesheet" type="text/css" />
		<link href="./lib/assets/css/layout.css" rel="stylesheet" type="text/css" />

		<!-- PAGE LEVEL SCRIPTS -->
		<link href="./lib/assets/css/header-1.css" rel="stylesheet" type="text/css" />
		<link href="./lib/assets/css/color_scheme/pink.css" rel="stylesheet" type="text/css" id="color_scheme" />

        <!-- SWIPER SLIDER -->
        <link href="./lib/assets/plugins/slider.swiper/dist/css/swiper.min.css" rel="stylesheet" type="text/css" />
    </head>

	<!--
		AVAILABLE BODY CLASSES:
		
		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background
		
		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click
		
		BACKGROUND IMAGE [together with .boxed class]
		data-background="assets/images/boxed_background/1.jpg"
	-->
	<body class="smoothscroll enable-animation">

		<!-- SLIDE TOP -->
		<div id="slidetop">

			<div class="container">
				
				<div class="row">

					<div class="col-md-4">
						<h6><i class="icon-heart"></i> UKKI PENS</h6>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas metus nulla, commodo a sodales sed, dignissim pretium nunc. Nam et lacus neque. Ut enim massa, sodales tempor convallis et, iaculis ac massa. </p>
					</div>

					<div class="col-md-4">
						<h6><i class="icon-group"></i>Kabinet Akselerasi</h6>
					</div>

					<div class="col-md-4">
						<h6><i class="icon-envelope"></i> CONTACT INFO</h6>
						<ul class="list-unstyled">
							<li><b>Sekretariat :</b> Musholla An-Nahl Lt 2 <br /> PENS </li>
							<li><b>Phone:</b> 1-800-565-2390</li>
							<li><b>Alamat :</b>Jl.Raya ITS ,Kampus PENS . 60111</li>
							<li><b>Email:</b> <a href="mailto:admin@ukki.pens.ac.id">admin@ukki.pens.ac.id</a></li>
						</ul>
					</div>

				</div>

			</div>

			<a class="slidetop-toggle" href="#"><!-- toggle button --></a>

		</div>
		<!-- /SLIDE TOP -->


		<!-- wrapper -->
		<div id="wrapper">
			<!-- navbar -->
			 <?php 
             	include './mdl/layout/navbar.php';
        	  ?>

			<!-- /navbar -->
          	<?php
          		include './mdl/layout/content.php';
          	?>

			<?php
				include './mdl/layout/footer.php';
			?>	

		</div>
		<!-- /wrapper -->


		<!-- SCROLL TO TOP -->
		<a href="#" id="toTop"></a>


		<!-- 
		<div id="preloader">
			<div class="inner">
				<span class="loader"></span>
			</div>
		</div> -->


		<!-- JAVASCRIPT FILES -->
		<script type="text/javascript">var plugin_path = './lib/assets/plugins/';</script>
		<script type="text/javascript" src="./lib/assets/plugins/jquery/jquery-2.1.4.min.js"></script>

		<script type="text/javascript" src="./lib/assets/js/scripts.js"></script>
		
		<!-- STYLESWITCHER - REMOVE -->
	

        <!-- SWIPER SLIDER -->
        <script type="text/javascript" src="./lib/assets/plugins/slider.swiper/dist/js/swiper.min.js"></script>
        <script type="text/javascript" src="./lib/assets/js/view/demo.swiper_slider.js"></script>
    </body>
</html>