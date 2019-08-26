<?php
	if(isset($_POST['s'])){
		$s = $_POST['s'];
		if($s != ''){
			header("location:../cari&ab=".$s."");
		}
	}
?>