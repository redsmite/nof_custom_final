<?php
    require_once('includes/sources/head.php');
?>
</head>

<body>
	<form action="handlers/forms/register.php" method="POST" enctype="multipart/form-data">
		<p>
			Username: <input type="text" name="username" required>
		</p>
		<p>
			Email: <input type="email" name="email" required>
		</p>
		<p>
			Password: <input type="password" name="password" required>
		</p>
		<p>
			Confirm: <input type="password" name="confirm" required>
		</p>
		<p>
			First Name: <input type="text" name="fname" required>
		</p>
		<p>
			Last Name: <input type="text" name="lname" required>
		</p>
		<p>
			Male:<input type="radio" value="m" name="gender" checked> 
			Female:<input type="radio" value="f" name="gender">
		</p>
		<p>
			Contact: <input type="text" name="contact" required>
		</p>
		<p>
			Address: <textarea name="address" required></textarea>
		</p>
		<p>
			Profile Picture: <input type="file" name="img" required>
		</p>
		<input type="submit" value="Register" name="submit">
	</form>
</body>
</html>