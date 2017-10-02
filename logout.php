<?php
session_start();
session_destroy();
unset($_SESSION['user']);

$_SESSION['message'] = "Thanks for being with us";

header('location:login.php?logout=You are successfully logged out!!!');
?>