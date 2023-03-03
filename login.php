<?php
session_start();

include_once "db/Crud.php";
$crud = new Crud();

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query1 = "select * from user where password='$password' AND mobile ='$email'";
	$query2 = "select * from user where password='$password' AND email = '$email'";
	
	$result1 = $crud->getData($query1);
	$result2 = $crud->getData($query2);
	
	foreach($result1 as $res1)
	{
		$username= $res1['email'];		 
	}
	foreach($result2 as $res2)
	{
		$username= $res2['email'];		 
	}

	if($result1 || $result2)
	{
		$_SESSION['email']=$email;
		//echo $_SESSION['username'];
		header("location:userprofile/index.php");
		exit(0);
	}
	else
	{
		echo "<script>alert('Username or Password is Wrong')</script>";
	}
}



?>


<!DOCTYPE html>
<html lang="eng">
<head>
	<title>user Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="css/loginstyle.css">

</head>
<body>
	<div class="container">
		<form action="login.php" method="POST">
			<h2>Log in Here</h2>
			<div class="form-group">
				<label for="">Email or mobile number</label>
				<input type="text" name="email" class="form-control" placeholder="Enter your email or mobile number" required="">
			</div>
			<div class="form-group">
				<label for="">Password<label>
				<input type="password" name="password" class="form-control" placeholder="Enter your password" required="" id="Show">
				<input type="checkbox" name="" onclick="myFunction()">
				<label class="show-password">Show Password</label>
			</div>
			<input type="submit" class="btn" name="submit" value="Login">
			<div class="have-account">Don't have an account? <a href="registration.php">Create Account</a></div>
			<div class="have-account">Forgot your password? <a href="reset.php">Reset password</a></div>
		</form>
	</div>
	<script type="text/javascript">
		function myFunction(){
			var show = document.getElementById('Show')
			if (show.type=='password') {
				show.type='text';
			}
			else {
				show.type='password';
			}
		}
	</script>
  
</body>

</html>