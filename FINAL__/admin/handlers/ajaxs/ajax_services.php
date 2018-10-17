<?php
	require_once('../dependencies.php');

	if(isset($_POST['update'])){
		$id = $_POST['update'];
		$sql = "SELECT name, description, price FROM tbl_services WHERE id = $id";
		$result = $con->query($sql);
		$fetch = $result->fetch_object();
		$name = $fetch->name;
		$desc = $fetch->description;
		$price = $fetch->price;

		echo '
		<form action = "handlers/forms/update_service.php" method = "post">
			<p>Service Name:</p>
			<p><input type="text" required name="name" value="'.$name.'""></p>
			<p>description:</p>
			<p><textarea required name="desc">'.$desc.'</textarea></p>
			<p>Price:</p>
            <p><input type="price" name="price" value = "'.$price.'"></p>
            <p><input type="submit" value="Update" name = "update" required min=0></p>
            <input type="hidden" value = "'.$id.'" name="id">
		</form>
		';


	}
?>