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

    
 

  $info = "select * from customerbooking where (status = 'Confirm' or status = 'Delivery on process')";
  $getinfo = $crud->getData($info);



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maxium-scale=1">
	<title>packages</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

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
					<a href="package.php" ><span class="las la-users"></span><span>Item Price</span></a>
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
					<a href="confirmorder.php" class="active"><span class="las la-shopping-bag"></span><span>Confirm Order</span></a>
				</li>
				<li>
					<a href="addphotopackage.php" ><span class="las la-shopping-bag"></span><span>Photography Package</span></a>
				</li>
				<li>
					<a href="addcinepackage.php" ><span class="las la-shopping-bag"></span><span>Cinematography Package</span></a>
				</li>
				<li>
					<a href="addcombopackage.php" ><span class="las la-shopping-bag"></span><span>Combo Package</span></a>
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
				Confirm Order List
			</h2>

			<div class="search-wrapper">
				<span class="las la-search"></span>
				<input type="search" placeholder="search here" name="">
			</div>

			<div class="user-wrapper">
				<img src="UserImage/2.jpg" width="40px" height="40px" alt="">
				<div>
					<h4><?php echo $name; ?></h4>
					<small>Super Admin</small>
				</div>
			</div>
		</header>

		<main>		
<!-- -----------------------------for Stage Section------------------------------ -->
		
		<div class="table-responsive">
			<table width="100%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td>Order ID</td>
						<td>Customer Name</td>
						<td>Package Name</td>
						<td>Status</td>
						<td>Action</td>
						
						
					</tr>
				</thead>
				<tbody>
					<?php foreach($getinfo as $key=>$order) {

						$id = $order['id'];
						$cus_id = $order['customer_id'];
						$package_name = $order['package_name'];
						$status = $order['status'];

						$info1 = "select username from user where id = '$cus_id'";
  						$getinfo1 = $crud->getData($info1);
  						foreach($getinfo1 as $key=>$order1) {
  							$cus_name = $order1['username'];
						
					?>

					<tr>
						<td><?php echo $id?></td>
						<td><?php echo $cus_name?></td>
						<td><?php echo $package_name?></td>
						<?php
							$red = "color: red;";
							$green = "color: #20A611;";
							$yellow = "color: #D1B40F;";
							$running = "color: #1182A6;";
							if ($status == 'Complete')
								{$color = $green;}
							elseif
								($status == 'Pending')
								{$color = $red;}
							elseif
								($status == 'Confirm')
								{$color = $running;}
							elseif
								($status == 'Delivery on process')
								{$color = $yellow;}
						?>
						<td style="<?php echo $color?>"><strong><?php echo $status?></strong></td>
						<td style="color: blue; text-decoration: none;"><a href="editconfirmorder.php?idl=<?php echo $id?>">View</a></td>	
							
					</tr>
					<?php }?>
					<?php }?>
				</tbody>
			</table>
		</div>
		



		</main>
		<footer class="footer">
            <h4>Designed by <a href="https://www.facebook.com/raisuddin.alvee.56/" target="blanck" style="color: black;">SM Alvee</a></h4>
        </footer>
	</div>
</body>
</html>