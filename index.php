<?php
    include './lib/sv/save.php';
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
    include 'viw/index.php';
?>