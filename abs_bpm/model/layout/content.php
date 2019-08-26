<?php
    if (strcmp($page, "absen")==0) {
        if (isset($_SESSION['sw'])) {
          include './view/absen.php';
        } elseif (isset($_SESSION['pb'])) {
          include './view/adm/absen.php';
        }
      }elseif (strcmp($page, "absensi")==0) {
        
        if (isset($_SESSION['sw'])) {
          include './view/detail_absen.php';
          } elseif (isset($_SESSION['pb'])) {
            include './view/adm/detail_absen.php';
          }
      }elseif (strcmp($page, "catatan")==0) {
        
        if (isset($_SESSION['sw'])) {
          include './view/note.php';
          } elseif (isset($_SESSION['pb'])) {
            include './view/adm/catatan.php';
          }
      }elseif (strcmp($page, "tambah_catatan")==0) {
        include './view/add_note.php';
      }elseif (strcmp($page, "req_catatan")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/req_catatan.php';
        }
      } elseif (strcmp($page, "add_siswa")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/add_siswa.php';
        }
      } elseif (strcmp($page, "mente")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/mente.php';
        }
      } elseif (strcmp($page, "katasandi")==0) {
        if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/katasandi.php';
        }
      } elseif (strcmp($page, "absenmentor")==0) {
         if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/absenmentor.php';
        }
      }elseif (strcmp($page, "absensimentor")==0) {
         if (!isset($_SESSION['pb'])) {
            header("location:home");
        }else {
            include './view/adm/detail_absenmentor.php';
        }
      }elseif (strcmp($page, "keluar")==0) {
        header("location:view/logout.php");
      } 
      else {
        header("location:absen");
      }
?>