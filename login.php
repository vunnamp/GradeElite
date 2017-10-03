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
				//echo $role;

				if($role == 'admin'){

				header('location:admin_dashboard.php');
				exit0;

			}else{if ($role == 'instructor') {

				header('location:instructor_dashboard.php');
				
				}

				else{if ($role == 'student') {

				header('location:studentdashboard/pages/index.php');
			}
		}
	}
}

			else{
				header("location:login.php?error3=wrong credintials please contact to admin");
			}



			







		

		//if( $role == 'Admin'){

			//echo "this is admin login";
			
			//$query = "select * from admin where email= '$email' and password = '$password'";

			/*$result = $conn->query("SELECT * FROM admin WHERE `email`= $email");*/


			//$result = mysqli_query($conn, $query);

			//print_r($result);

			/*if($result==true){

				echo "good";
			}

			else{

				echo "bad";
			}*/

			//if(mysqli_num_rows($result)==1){

				//header('location:admin_dashboard.php');

			//}

			//else{
				//header("location:login.php?error1=wrong credintials please contact to admin");
			//}



		//}
		//elseif ($role == 'Instructure') {
		 	//echo "this is instructure login";

		 	//$query1 = "select * from instructor where email= '$email' and password = '$password'";
		 	//$result1 = mysqli_query($conn, $query1);
		 	//if(mysqli_num_rows($result1)==1){

				//header('location:instructor_dashboard.php');

			//}

			//else{
				//header("location:login.php?error2=wrong credintials please contact to admin");
			//}
		 //} 
		//elseif ($role == 'Student') {
		 	//echo "this is Student login";
		 	//$query2 = "select * from student where email= '$email' and password = '$password'";
		 	//$result2 = mysqli_query($conn, $query2);
		 	//if(mysqli_num_rows($result2)==1){

				//header('location:student_dashboard.php');

			//}

			//else{
				//header("location:login.php?error3=wrong credintials please contact to admin");
			//}
		 //} 





}