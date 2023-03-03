<?php
 session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:../adminlogin.php");
  }
  include_once '../db/Crud.php';
  $crud = new Crud();

  $email = $_SESSION['email'];

  $query = "Select * from admin where email ='$email'";
    
  $result = $crud->getData($query);

  foreach($result as $key=>$res)
  {
    $name = $res['username'];
    // $user_id = $res['id'];
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maxium-scale=1">
	<title>Admin</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- 	<link rel="stylesheet" type="text/css" href="css/font.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.min.css"> -->

</head>
<body>

	<input type="checkbox" id="nav-toggle">

	<div class="sidebar">
		<div class="sidebar-brand">
			<h2><span class="lab la-accusoft"></span> <span>Admin</span></h2>
		</div>

		<div class="sidebar-menu">
			<ul>
				<li>
					<a href="dashboard.php" ><span class="las la-igloo"></span><span>Dashboard</span></a>
				</li>
				<li>
					<a href="editprofile.php" class="active"><span class="las la-igloo"></span><span>Edit Profile</span></a>
				</li>
				<li>
					<a href="package.php"><span class="las la-users"></span><span>Item Price</span></a>
				</li>
				<li>
					<a href="addcustomer.php"><span class="las la-clipboard-list"></span><span>Add Customer</span></a>
				</li>
				<li>
					<a href="customerhistory.php" ><span class="las la-users"></span><span>Customer History</span></a>
				</li>
				<li>
					<a href=""><span class="las la-shopping-bag"></span><span>Employee</span></a>
				</li>
				<li>
					<a href=""><span class="las la-shopping-bag"></span><span>Delivery History</span></a>
				</li>
				<li>
					<a href="allorderhistory.php"><span class="las la-shopping-bag"></span><span>All Order History</span></a>
				</li>
				<li>
					<a href="orderrequest.php" ><span class="las la-shopping-bag"></span><span>Pending Order</span></a>
				</li>
				<li>
					<a href="confirmorder.php"><span class="las la-shopping-bag"></span><span>Confirm Order</span></a>
				</li>
				<li>
					<a href="addphotopackage.php"><span class="las la-shopping-bag"></span><span>Photography Package</span></a>
				</li>
				<li>
					<a href="addcinepackage.php"><span class="las la-shopping-bag"></span><span>Cinematography Package</span></a>
				</li>
				<li>
					<a href="addcombopackage.php"><span class="las la-shopping-bag"></span><span>Combo Package</span></a>
				</li>

			</ul>
		</div>
	</div>

	<div class="main-content">
		<header>
			<h2>
				<label for="nav-toggle">
					<span class="las la-bars"></span>
				</label>
				Edit Profile
			</h2>

			<div class="search-wrapper">
				<span class="las la-search"></span>
				<input type="search" placeholder="search here" name="">
			</div>

			<div class="user-wrapper">
				<img src="UserImage/2.jpg" width="40px" height="40px" alt="">
				<div>
					<h4><?php echo $name; ?></h4>
					<small><a style="text-decoration: none;" href="adminlogout.php">Logout</a></small>
				</div>
			</div>
		</header>

		<main>
			<div>
				<div>
					<label><h3>Old Password</h3></label>
				</div>
				<div>
					<input type="text" name="" style="width: 250px; height: 25px; border-radius: 5px; background-color: #F3F3F3;">
				</div>
				<div>
					<label><h3>New Password</h3></label>
				</div>
				<div>
					<input type="text" name="" style ="width: 250px; height: 25px; border-radius: 5px; background-color: #F3F3F3;">
				</div>
				<div style="padding-top: .5rem">
					<button style="width: 123px; height: 25px; border-radius: 10px; background-color: #1697F1; color: white;">Reset</button>
					<button style="width: 123px; height: 25px; border-radius: 10px; background-color: #1697F1;"><a style="color: white;" href="dashboard.php">Back to Dashboard</a></button>
				</div>
			</div>

		</main>
		<footer class="footer">
            <h4>Designed by <a href="https://www.facebook.com/raisuddin.alvee.56/" target="blanck" style="color: black;">SM Alvee</a></h4>
        </footer>
	</div>
</body>
</html>