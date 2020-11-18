<?php

	session_start();
	$_SESSION = [];
	session_unset();
	session_destroy();
	
	//remove cookie
	setcookie('id', '', -3600);
	setcookie('key', '', -3600);
	
	header('Location: login.php');
	exit;
?>
