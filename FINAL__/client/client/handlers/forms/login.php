<?php
	require_once('../dependencies.php');

	if(isset($_POST['submit'])){
		
		$name = Filters::str($_POST['user']);
		$password = md5($_POST['password']);

		$sql = "SELECT id FROM tbl_accs WHERE username = '$name' AND password = '$password'";
		$result = $con->query($sql);
		$count = $result->num_rows;

		if($count >= 1){
			echo 'login success';
		}else{
			echo 'login failed';
		}
	}
?>