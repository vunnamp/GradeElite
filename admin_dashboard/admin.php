<?php include('../connection/connection.php'); ?>

<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>GradeElite</title>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="admin.php">GradeElite</a>
    </div>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="../logout.php">Logout</a></li>
        
      </ul>
    </div>
  </div>
</nav>
<form class="form-horizontal" method="post">
  <fieldset>
    <center><legend>Admin Mode</legend></center>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Add User</label>
      <div class="col-lg-5">
      
        <input type="text" class="form-control" id="inputEmail" placeholder="Email"  name="addU">
      </div>
      <div class="col-lg-2">
        <button type="submit" class="btn btn-primary" name="add">Add User</button>
      </div>
      <h5><span style="color:red;"><?php echo @$_GET['addu']; ?></span></h5>
      <h5><span style="color:red;"><?php echo @$_GET['addUE']; ?></span></h5>
      <h5><span style="color:green;"><?php echo @$_GET['successaddu']; ?></span></h5>
    </div>
    </fieldset>    
</form>

<form class="form-horizontal" method="post">
  <fieldset>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Block User</label>
      <div class="col-lg-5">
      
        <input type="text" class="form-control"  placeholder="Email"  name="blockU">
      </div>
      <div class="col-lg-2">
        <button type="submit" class="btn btn-primary" name="block">Block User</button>
      </div>
      <h5><span style="color:red;"><?php echo @$_GET['blocku']; ?></span></h5>
      <h5><span style="color:red;"><?php echo @$_GET['blockus']; ?></span></h5>
      </div>
    </fieldset>    
</form>


<form class="form-horizontal" method="post">
  <fieldset>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">UnBlock User</label>
      <div class="col-lg-5">
      
        <input type="text" class="form-control"  placeholder="Email"  name="ublockU">
      </div>
      <div class="col-lg-2">
        <button type="submit" class="btn btn-primary" name="ublock">UnBlock User</button>
      </div>
      <h5><span style="color:red;"><?php echo @$_GET['ublocku']; ?></span></h5>
      <h5><span style="color:green;"><?php echo @$_GET['ublockus']; ?></span></h5>
      </div>
    </fieldset>    
</form>


<form class="form-horizontal" method="post">
  <fieldset>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Delete User</label>
      <div class="col-lg-5">
      
        <input type="text" class="form-control"  placeholder="Email"  name="delete">
      </div>
      <div class="col-lg-2">
        <button type="submit" class="btn btn-primary" name="udelete">Delete User</button>
      </div>
      <h5><span style="color:red;"><?php echo @$_GET['d1']; ?></span></h5>
      <h5><span style="color:green;"><?php echo @$_GET['d2']; ?></span></h5>
      
      </div>
    </fieldset>    
</form>







</body>
</html>

<?php
if(isset($_POST['add'])){
   $email1 = $_POST['addU'];

    if( $email1==""){
		
		header('location:admin.php?addu=Please Give an Email');
		
	}
    else{
		$query = "select * from login where email = '$email1'";

			$result = mysqli_query($conn, $query);

			if(mysqli_num_rows($result)==1){

				header('location:admin.php?addUE=This e-mail is already registered. please try another!!!!!!!!!');

			}
			else{
				$name="";
				$role = "student";
				$pass = strtoupper(hash('sha512', 12345));

				$query1 = "insert into login (fullname, email, password, role) VALUES ('$name','$email1','$pass','$role')";

				$result1 = mysqli_query($conn, $query1);

				if($result1){
					header('location:admin.php?successaddu=Registration Completed. Please Login');
				}
			}
		}
	}


	if(isset($_POST['block'])){
		$email2 = $_POST['blockU'];

		if( $email2==""){

			header('location:admin.php?blocku=Please Give an Email');
		}
		else{

			$query2 = "select * from login where email= '$email2'";
			$result2 = mysqli_query($conn, $query2);
			$row = mysqli_fetch_assoc($result2);

			$name2 = $row['fullname'];
			$email2b = $row['email'];
			$pas2 = $row['password'];
			$role2 = $row['role'];

			$query2b = "insert into block (fullname, email, password, role) VALUES ('$name2','$email2b','$pas2','$role2')";
			$result2b = mysqli_query($conn, $query2b);

			if($result2b){

				$query2bd = "delete from login where email='$email2b'";
				$result2bd = mysqli_query($conn, $query2bd);

				if($result2bd){

					header('location:admin.php?blockus=User has been blocked');
				}
			}  
		}
	}



	if(isset($_POST['ublock'])){
		$email3 = $_POST['ublockU'];

		if( $email3==""){

			header('location:admin.php?ublocku=Please Give an Email');
		}
		else{

			$query3 = "select * from block where email= '$email3'";
			$result3 = mysqli_query($conn, $query3);
			$row = mysqli_fetch_assoc($result3);

			echo $name3 = $row['fullname'];
			echo $email3b = $row['email'];
			echo $pas3 = $row['password'];
			echo $role3 = $row['role'];

			$query3b = "insert into login (fullname, email, password, role) VALUES ('$name3','$email3b','$pas3','$role3')";
			$result3b = mysqli_query($conn, $query3b);

			if($result3b){

				$query3bd = "delete from block where email='$email3b'";
				$result3bd = mysqli_query($conn, $query3bd);

				if($result3bd){

					header('location:admin.php?ublockus=User has been Unblocked');
				}
			} 
		}
	}
   

	if(isset($_POST['udelete'])) {
		$email4 = $_POST['delete'];

		if( $email4==""){

			header('location:admin.php?d1=Please Give an Email');
		}
		else{

			$query4 = "delete from login where email='$email4'";
			$result4 = mysqli_query($conn, $query4);

			if($result4){

				header('location:admin.php?d2=User has been deleted successfully');
			}
		}
	}
?>