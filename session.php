<?php
if(!isset($_SESSION)) {
	session_start();
}

if(isset($_SESSION['logged_user'])){
	$role = $_SESSION['role'];
	if($role == 'admin'){
		header('location:admin_dashboard/admin.php');
	}elseif($role == 'instructor') {
		header('location:instructor_dashboard.php');
	}elseif($role == 'student') {
		header('location:studentdashboard/pages/index.php');
	}
}
?>
