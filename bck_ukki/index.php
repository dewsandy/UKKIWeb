<?php
    session_start();
    include './lib/conf/config.php';
    date_default_timezone_set('Asia/Jakarta');

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    } else {
      $page = "home";
    }
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      $id = "id";
    }
    if (!isset($_SESSION['idadmin'])) {
      include 'view/login.php';
    } else {
      include 'view/media.php';
    }
?>