<?php
	$server = "localhost";
	$pass = "";
	$user = "root";
	$database = "dbukki";

	$conn = new mysqli($server,$user,$pass,$database);

	if($conn){
		//echo 'konek';
	} else{
		echo '<script>alert("gagal menyambung dengan database");window.location="www.pens.ac.id"</script>';
	}
?>