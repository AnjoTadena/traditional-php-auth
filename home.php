<?php
	session_start();

	if (! isset($_SESSION['user_id'])) {

		$_SESSION['errors'][] = 'Please login.';

		header('Location: /');

		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP AUTH</title>
</head>
<body>
	<h1>Welcome home!</h1>
	<p><a href="/logout.php">Logout</a></p>
</body>
</html>