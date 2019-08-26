<?php
	if (strcmp($page, "home")==0) {
        include './viw/home.php';
    }
 	if (strcmp($page, "berita")==0) {
        include './viw/blog.php';
    }
    if (strcmp($page, "viewberita")==0) {
        include './viw/viewberita.php';
    }
    if (strcmp($page, "viewinfo")==0) {
        include './viw/viewinfo.php';
    }
    if (strcmp($page, "infointernal")==0) {
        include './viw/infointernal.php';
    }
    if (strcmp($page, "infoeks")==0) {
        include './viw/infoeksternal.php';
    }
   if (strcmp($page, "cari")==0) {
        include './viw/cari.php';
    }
?>	