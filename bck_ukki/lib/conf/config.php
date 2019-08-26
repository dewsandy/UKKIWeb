<?php
	$server = "hima.pens.ac.id";
	$pass = "caCBoDjO@6";
	$user = "c9ukkipens";
	$database = "c9aps1";

	$conn = new mysqli($server,$user,$pass,$database);

	if($conn){
		//echo 'konek';
	} else{
		echo '<script>alert("gagal menyambung dengan database");window.location="www.pens.ac.id"</script>';
	}
?>