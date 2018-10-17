<?php
    require_once('includes/sources/head.php');
?>
</head>

<body>
	<form action="handlers/forms/login.php" method="POST">
		<p>Username: <input type="text" name="user"></p>
		<p>Password: <input type="password" name="password"></p>
		<input type="submit" value="Login" name="submit">
	</form>
</body>
</html>