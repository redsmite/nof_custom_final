<?php
	require_once('../dependencies.php');
	$file = new FileUpload();

	$errors = array();
	if(isset($_POST['submit'])){
		
		$name = Filters::str($_POST['username']);
		$email = Filters::email($_POST['email']);
		$password = md5($_POST['password']);
		$confirm = md5($_POST['confirm']);
		$first = Filters::str($_POST['fname']);
		$last = Filters::str($_POST['lname']);
		$gender = Filters::str($_POST['gender']);
		$contact = Filters::str($_POST['contact']);
		$address = Filters::str($_POST['address']);

		$image = $file->image('img');

		$file_errors = $file->errors();

		if(!empty($file_errors)) {

			foreach($geterrors as $error) {
				$errors [] = $error;
			}

			echo "MAY ERROR";
			exit();
		}

		$img = $file->newName();

		$sql = "INSERT INTO tbl_accs (type, fname, lname, gender, email, contact, address, username, password, profile_pic) VALUES (1,'$first','$last','$gender','$email','$contact','$address','$name','$password','$img')";
		$query = $con->query($sql);
		if($query){
			echo 'Query Success';
		}else{
			echo 'Failed';
		}
	}
?>