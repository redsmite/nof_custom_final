<?php
	require_once('../dependencies.php');
	$title = Filters::str($_POST['title']);
	$content = Filters::str($_POST['content']);

	$sql = "INSERT INTO tbl_news (title, content, datecreated) VALUES ('$title','$content',NOW())";
	$result = $con->query($sql);

		
	if($result){
		$msg = 'Post successful';
		echo '<script type="text/javascript">alert("' . $msg . '")</script>';
		echo '<script type="text/javascript">setTimeout(function(){ window.location.replace("../../index.php"); }, 1)</script>';
	}
?>