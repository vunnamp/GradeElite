<?php include('connection/connection.php'); ?>
<?php include_once('main/header.php'); ?>
<?php include_once('main/login_form.php'); ?>
<?php include_once('main/footer.php'); ?>
<?php
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password = hash('sha512', $_POST['password']);
		$query = "select * from login where email= '$email' and password = '$password'";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result)==1){
			$row = $result->fetch_assoc();
			$role = $row['role'];
			$name = $row['fullname'];
			$_SESSION['user'] = $name;
			$_SESSION['logged_user'] = $name;
			$_SESSION['role'] = $role;
			$_SESSION['id'] = $row['id'];
			if($role == 'admin'){
				header('location:admin_dashboard/admin.php');
			}elseif ($role == 'instructor') {
				header('location:instructor_dashboard.php');
			}elseif ($role == 'student') {
				header('location:studentdashboard/pages/index.php');
			}
		}else {
			header("location:login.php?error3=wrong credintials please contact to admin");
		}
	}
?>	
