<?php
	require_once('../dependencies.php');
	$name = Filters::str($_POST['name']);
	$desc = Filters::str($_POST['desc']);
	$price = $_POST['price'];

	$sql = "INSERT INTO tbl_services (name, description, price) VALUES ('$name','$desc',$price)";
	$result = $con->query($sql);
	if($result){
		$msg = 'Post successful';
		echo '<script type="text/javascript">alert("' . $msg . '")</script>';
		echo '<script type="text/javascript">setTimeout(function(){ window.location.replace("../../index.php"); }, 1)</script>';
	}
?>