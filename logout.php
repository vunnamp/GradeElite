<?php
if(!isset($_SESSION)) { 
	session_start(); 
}
if(session_destroy()) {
	$_SESSION['message'] = "Thanks for being with us";
	header('location:login.php?logout=You are successfully logged out!!!');
}
?>