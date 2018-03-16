<?php 

session_start();

if (isset($_SESSION['user_id'])) {
	$_SESSION['user_id'] = null;
	unset($_SESSION['user_id']);

}

header('Location: /');
exit();
