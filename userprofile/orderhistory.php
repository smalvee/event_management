<?php
 session_start();
  if(!isset($_SESSION['email']))
  {
    header("location:../login.php");
  }
  include_once '../db/Crud.php';
  $crud = new Crud();

  $email = $_SESSION['email'];

  $query = "Select * from user where email ='$email'";
    
  $result = $crud->getData($query);

  foreach($result as $key=>$res)
  {
    $name = $res['username'];
    $email = $res['email'];
    $cus_id = $res['id'];
  }



  $booking = "Select * from customerbooking where customer_id ='$cus_id' order by id DESC limit 1";
    
  $book_history = $crud->getData($booking);

  $previousbooking = "Select * from customerbooking where customer_id ='$cus_id'";
    
  $previous_book_history = $crud->getData($previousbooking);

  


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maxium-scale=1,minimum-scale=1">
	<title>Customer Profile</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

	<input type="checkbox" name="" id="sidebar-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
			<div class="brand-flex">
				<a href="index.php"><img src="CustomerImage/logo.png" width="120px" alt=""></a>

				<div class="brand-icon">
					<span class="las la-bell"></span>
					<span class="las la-user-circle"></span>					
				</div>				
			</div>			
		</div>

		<div class="sidebar-main">
			<div class="sidebar-user">
				<img src="CustomerImage/alvee.jpg" alt="">
				<div>
					<h3><?php echo $name?></h3>
					<span><?php echo $email?></span>
				</div>				
			</div>

			<div class="sidebar-menu">
				<div class="menu-head">
					<span>Dashboard</span>
				</div>
				<ul>
					<li>
						<a href="">
							<span class="las la-balance-scale"></span>
							Edit Profile
						</a>
					</li>
					<li>
						<a href="orderhistory.php">
							<span class="las la-chart-pie"></span>
							Order History
						</a>
					</li>
				</ul>

				<div class="menu-head">
					<span>Applications</span>
				</div>
				<ul>
					<li>
						<a href="prebooking.php">
							<span class="las la-calendar"></span>
							Make A Booking
						</a>
					</li>
					<li>
						<a href="">
							<span class="las la-users"></span>
							Booking Status
						</a>
					</li>
					<li>
						<a href="">
							<span class="las la-file-export"></span>
							Log out
						</a>
					</li>
				</ul>				
			</div>
		</div>
	</div>

	<div class="main-content">
		<header>
			<div class="menu-toggle">
				<label for="sidebar-toggle">
					<span class="las la-bars"></span>
				</label>
			</div>

			<div class="header-icons">
				<span class="las la-search"></span>
				<span class="las la-bookmark"></span>
				<span class="las la-sms"></span>
			</div>
		</header>

		<main>

		<!-- recenr order history -->
			<div class="table-responsive">
				<h2>Recent Order Details</h2>
				<hr>
				<hr>
				<table width="100%">
					
					<thead style="font-size: 1.2rem; text-align: center;">
						<tr>
							<td><strong>Order Id</strong></td>
							<td><strong>Package Name</strong></td>
							<td><strong>Order Status</strong></td>
							
						</tr>
					</thead>

					<tbody>
						<?php
					foreach($book_history as $key=>$info)
						  {
						    $id = $info['id'];
						    $package_name = $info['package_name'];
						    $status = $info['status'];
						  
						?>
						<tr style="text-align: center;">		
							<td><?php echo $id?></td>
							<td><?php echo $package_name?></td>
							<td><button style="background-color: #ccc; border-radius: 5px;"><?php echo $status?></button></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>

			<!-- complete order history -->

			<div class="table-responsive">
				<h2 style="padding-top: 3rem">Previous Order History</h2>
				<hr>
				<hr>
				<table width="100%">
					
					<thead style="font-size: 1.2rem; text-align: center;">
						<tr>
							<td><strong>Order Id</strong></td>
							<td><strong>Package Name</strong></td>
							<td><strong>Order Status</strong></td>
							
						</tr>
					</thead>

					<tbody>
						<?php
					foreach($previous_book_history as $key=>$preinfo)
						  {
						    $id = $preinfo['id'];
						    $package_name = $preinfo['package_name'];
						    $status = $preinfo['status'];
						  
						?>
						<tr style="text-align: center;">		
							<td><?php echo $id?></td>
							<td><?php echo $package_name?></td>
							<td><button><?php echo $status?></button></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</main>		
	</div>

	<label for="sidebar-toggle" class="body-label"></label>
</body>
</html>