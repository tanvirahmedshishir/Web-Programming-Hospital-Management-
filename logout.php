<?php

	session_start();
	session_destroy();

	if(isset($_COOKIE['email']) and isset($_COOKIE['password'])){
		$email=$_COOKIE['email'];
		$password=$_COOKIE['password'];
		setcookie('email',$email,time()-1);
		setcookie('password',$password,time()-1);

	}

	unset($_SESSION['email']);
	session_start();
	$_SESSION['message'] = "You are now logged out";
	header("location: Login.php");

?>