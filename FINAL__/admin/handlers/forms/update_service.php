<?php
	require_once('../dependencies.php');

	if(isset($_POST['update'])){
		$id = $_POST['id'];
		$name = Filters::str($_POST['name']);
		$desc = Filters::str($_POST['desc']);
		$price = Filters::str($_POST['price']);

		$sql = "UPDATE tbl_services SET name = '$name', description = '$desc', price = '$price' WHERE id = $id";
		$result = $con->query($sql);
		if($result){
		$msg = 'Update successful';
			echo '<script type="text/javascript">alert("' . $msg . '")</script>';
			echo '<script type="text/javascript">setTimeout(function(){ window.location.replace("../../index.php"); }, 1)</script>';
		}
	}
?>