<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="./lib/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="./lib/css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="./lib/css/lines.css" rel='stylesheet' type='text/css' />
<link href="./lib/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="./lib/js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="./lib/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="./lib/js/metisMenu.min.js"></script>
<script src="./lib/js/custom.js"></script>
<!--
<script src="./lib/js/d3.v3.js"></script>
<script src="./lib/js/rickshaw.js"></script>-->
<script type="text/javascript" src="./lib/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./lib/js/ajax.js"></script>
<script type="text/javascript" src="./js/jquery-1.11.3.min.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        <?php 
             include './model/layout/navbar.php';
        ?>
        <div id="page-wrapper" style="min-height:700px;">
        
     	 <?php 
          include './model/layout/content.php';
        ?>
  	
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="./lib/js/bootstrap.min.js"></script>
    <script src="./lib/js/jquery-1.11.3.min.js"></script>
</body>
</html>
