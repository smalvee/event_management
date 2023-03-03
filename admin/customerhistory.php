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

  $info = "select * from user";
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
					<a href="customerhistory.php" class="active"><span class="las la-users"></span><span>Customer History</span></a>
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
				Package List & Price
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
						<td>Name</td>
						<td>Address</td>
						<td>Mobile</td>
						<td>Delivery Status</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($getinfo as $key=>$customer) {?>

					<tr>
						<td><?php echo $customer['username'];?></td>
						<td></td>	
						<td><?php echo $customer['mobile'];?></td>
						<td></td>
						<td><strong><a href="">Order History</a></strong></td>							
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
		














				<!-- <div class="recent-grid">
					<div class="projects">
						<div class="card">
							<div class="card-header">
								<h2>Customer History</h2>

								<button><a href="addstage.php"><  ADD  ></a></button>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table width="100%">
										<thead>
											<tr>
												<td>Name</td>
												<td>Address</td>
											</tr>
										</thead>
										<tbody>
											<?php foreach($getstage as $key=>$package) {?>

											<tr>
												<td><?php echo $package['catagory'];?></td>
												<td><?php echo $package['price']; ?></td>								
											</tr>
											<?php }?>
										</tbody>
									</table>
								</div>
							</div>								
						</div>
					</div>					
				</div> -->

		</main>
		<footer class="footer">
            <h4>Designed by <a href="https://www.facebook.com/raisuddin.alvee.56/" target="blanck" style="color: black;">SM Alvee</a></h4>
        </footer>
	</div>
</body>
</html>