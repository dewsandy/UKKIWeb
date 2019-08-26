<?php
    if (isset($_SESSION['idadmin'])) {
        if (strcmp($page, "home")==0) {
            include './view/index.php';
         }
        if (strcmp($page, "kategori")==0) {
              include './view/kategori.php';
         }
        if (strcmp($page, "ubahkategori")==0) {
              include './view/ukategori.php';
         }
          //event
         if (strcmp($page, "tevent")==0) {
              include './view/tevent.php';
         }
         if (strcmp($page, "event")==0) {
              include './view/event.php';
         }
         if (strcmp($page, "uevent")==0) {
              include './view/uevent.php';
         }
        //berita
        if (strcmp($page, "berita")==0) {
              include './view/berita.php';
         }
        if (strcmp($page, "inberita")==0) {
              include './view/inberita.php';
         }
        if (strcmp($page, "upberita")==0) {
              include './view/upberita.php';
         }

        //slide
        if (strcmp($page, "slider")==0) {
              include './view/slider.php';
         }
         if (strcmp($page, "inslide")==0) {
              include './view/inslide.php';
         }
          if (strcmp($page, "uslide")==0) {
              include './view/uslide.php';
         }
         //info
         if (strcmp($page, "info")==0) {
              include './view/info.php';
         }
         if (strcmp($page, "ininfo")==0) {
              include './view/ininfo.php';
         }
         if (strcmp($page, "upinfo")==0) {
              include './view/upinfo.php';
         }
          if (strcmp($page, "kabinet")==0) {
              include './view/kabinet.php';
         }
        //logout
        if (strcmp($page, "keluar")==0) {
         
              include './view/logout.php';
           
         }
    }
?>