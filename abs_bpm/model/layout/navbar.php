<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">         <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
  <a class="navbar-brand" href="home">Absensi Mentoring Wajib</a>
  </div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right visible-xs visible-sm">
<li id="output_m"></li>
<?php
	if (isset($_SESSION['pb'])) {
   			$link=array("","absenmentor","absensimentor","mente","absen","absensi","req_catatan","catatan", "katasandi&id=$_SESSION[id]","keluar");
			$name=array("","Absen","Absensiku","Daftar Mente","Absen Mente","Lihat Absensi Mente","Catatan","Lihat Catatan","Ubah Katasandi", "Keluar");

			for ($i=1; $i <= count($link)-1 ; $i++) {
				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		} elseif (isset($_SESSION['sw'])) {
			$link=array("","absen","absensi","tambah_catatan","catatan","keluar");
			$name=array("","Absen","Absensiku","Tambah Catatan","Catatan","Keluar");
			
			for ($i=1; $i <= count($link)-1 ; $i++) {
				
				echo "<li><a href='$link[$i]'>$name[$i]</a></li>";
			}
   		}
 ?>
</ul>
</div>