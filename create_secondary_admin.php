<?php
include_once 'db/Crud.php';
$crud = new Crud();

	if(isset($_POST['submit']))
	{
        $name = $_POST['username'];
        $mobile_number = $_POST['mobile'];
		$email = $_POST['email'];
		$token = bin2hex(random_bytes(50));
		$password = $_POST['password'];
		$password = $_POST['password'];



		$check = $crud->getData("select mobile, email from user where mobile = '$mobile_number' OR email = '$email'");

			if($check)
			{
				echo "<p><script>alert('Please choose a Different Email or Phone This Email or Phone number is already Registered')</script></p>";
			}
			else
			{
				$result = $crud->execute("INSERT into user(username, email, mobile, password, token) VALUES('$name', '$email', '$mobile_number', '$password', '$token')");
				
				if($result)
				{
					echo "<h3><script>alert('Saved');</script></h3>";
					header("location:login.php");
				}
				else
				{
					echo "<h3><script>alert('Insertion Problem');</script></h3>";
				}
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
		<form action="registration.php" method="POST">
			<h2>Create secondary admin</h2>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name="username" class="form-control" placeholder="Enter your name" required="">
			</div>
			<div class="form-group">
				<label for="">Email<label>
				<input type="email" name="email" class="form-control" placeholder="Enter your email" required="">
			</div>
			<div class="form-group">
				<label for="">Mobile Number (+88)<label>
				<input type="tel" name="mobile" class="form-control" placeholder="Enter a valid mobile number" required="">
			</div>
			<div class="form-group">
				<label for="">Password<label>
				<input type="password" name="password" class="password" placeholder="Enter a password" required="" id="Show1">
				<input type="checkbox" name="" onclick="myFunction1()">
				<label class="show-password">Show Password</label>
			</div>
			<div class="form-group">
				<label for="">Confirm Password<label>
				<input type="password" name="password" class="confirmpassword" placeholder="Enter a password" required="" id="Show2">
				<input type="checkbox" name="" onclick="myFunction2()">
				<label class="show-password">Show Password</label>
			</div>
			<input type="submit" class="btn" name="submit" value="Submit">
			<div class="have-account">already have an account? <a href="login.php">Login here</a></div>
			
		</form>
	</div>
	<script type="text/javascript">
		document.querySelector('.btn').onclick = function(){
			var password = document.querySelector('.password').value,
				confirmpassword = document.querySelector('.confirmpassword').value; 

				if (password == "") {
					alert("Field cannot be empty");
				}
				else if (password != confirmpassword) {
					alert("Password didn't match");
					return false
				}
				else if (password == confirmpassword) {
					return true
				}
		}



		function myFunction1(){
			var show = document.getElementById('Show1')
			if (show.type=='password') {
				show.type='text';
			}
			else {
				show.type='password';
			}
		}

		function myFunction2(){
			var show = document.getElementById('Show2')
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