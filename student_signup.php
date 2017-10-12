<?php include('connection/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="assets/css/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>SignUp</title>
	</head>
	<body>

<center><div class="jumbotron" style="width:70%; align:center;">
  



<form class="form-horizontal" role="form" method="post">
	<fieldset>

	<span style="color:red;"> <?php echo @$_GET['fill']; ?> </span>
    <legend>GradeElite SignUp</legend>

	<div class="form-group">
		<label for="inputEmail" class="col-lg-2 control-label">Name</label>
			<div class="col-lg-10">
				<input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" required="required" >
			</div>
    </div>

	<div class="form-group">
		<label for="inputEmail" class="col-lg-2 control-label">Email</label>
		<div class="col-lg-10">
			<input type="email" class="form-control" id="inputEmail" placeholder="Enter your Email" name="email" required="required" >
		</div>
		<span style="color:red;"> <?php echo @$_GET['email']; ?> </span>
    </div>
    <div class="form-group">
		<label for="inputPassword" class="col-lg-2 control-label">Password</label>
		<div class="col-lg-10">
			<input type="password" class="form-control" id="inputPassword" placeholder="Enter your Password" name="password"  required="required">
        </div>
    </div>
	<div class="form-group">
		<label for="inputPassword" class="col-lg-2 control-label">Re-Enter Password</label>
		<div class="col-lg-10">
			<input type="password" class="form-control" id="inputPassword" placeholder="Re-Enter your Password" name="repassword"  required="required">
        </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
		<button type="button" class="btn btn-default" onClick="window.location='http://localhost/GradeElite/index.php';">Cancel</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </fieldset>
 
</form>
</div>
</center>
</body>
</html>

<?php

if(isset($_POST['submit'])){
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $password = strtoupper(hash('sha512', $_POST['password']));
		 $repassword = strtoupper(hash('sha512', $_POST['repassword']));

		 if($name=="" || $email=="" || $password==""){

		 	header('location:student_signup.php?fill=PLEASE FILL ALL THE FIELDS correctly');
		 }else if($password!=$repassword){
			header('location:student_signup.php?fill=Password fields must match'); 
		 }

		 else{
		 	$query = "select * from login where email = '$email'";

		 	$result = mysqli_query($conn, $query);

		 	if(mysqli_num_rows($result)==1){

		 		header('location:student_signup.php?email=This e-mail is already registered. please try another!!!!!!!!!');


		 	}
		 	else{
		 		$role = "student";

		 		$query1 = "insert into login (fullname, email, password, role) VALUES ('$name','$email','$password','$role')";

		 		$result1 = mysqli_query($conn, $query1);

		 		if($result1){
		 			header('location:login.php?success=Registration Completed. Please Login');
				}
				else{

					echo "nahi gaya";
				}




		 	}





		 }



	}

