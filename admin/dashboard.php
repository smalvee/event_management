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
					<a href="dashboard.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
				</li>
				<li>
					<a href="editprofile.php"><span class="las la-igloo"></span><span>Edit Profile</span></a>
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
				<li>
					<a href="itemcost.php"><span class="las la-shopping-bag"></span><span>Item Cost</span></a>
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
				Dashboard
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
			<div class="cards">

				<div class="card-single">
					<div>
					<h1>54</h1>
					<span>Total Client</span>	
					</div>

					<div>
						<span class="las la-users"></span>
					</div>
				</div>
				
			
				<div class="card-single">
					<div>
					<h1>54</h1>
					<span>Event Complete</span>	
					</div>

					<div>
						<span class="las la-clipboard-list"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>54</h1>
					<span>Event Booking</span>	
					</div>

					<div>
						<span class="las la-shopping-bag"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>2</h1>
					<span>Delivery On Process</span>	
					</div>

					<div>
						<span class="las la-hourglass-half"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>Tk 219,500</h1>
					<span>Net Income</span>	
					</div>

					<div>
						<span class="lab la-google-wallet"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>Tk 22,000</h1>
					<span>Offered Discount</span>	
					</div>

					<div>
						<span class="lab la-google-wallet"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>10.02 %</h1>
					<span>Discount Rate</span>	
					</div>

					<div>
						<span class="lab la-google-wallet"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>Tk 13,500</h1>
					<span>Total Due</span>	
					</div>

					<div>
						<span class="lab la-google-wallet"></span>
					</div>
				</div>	

				<div class="card-single">
					<div>
					<h1>Tk </h1>
					<span>Total Due</span>	
					</div>

					<div>
						<span class="lab la-google-wallet"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>Tk </h1>
					<span>Total Due</span>	
					</div>

					<div>
						<span class="lab la-google-wallet"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>Tk </h1>
					<span>Total Due</span>	
					</div>

					<div>
						<span class="lab la-google-wallet"></span>
					</div>
				</div>

				<div class="card-single">
					<div>
					<h1>Tk 184,500</h1>
					<span>Total Income</span>	
					</div>

					<div>
						<span class="lab la-google-wallet"></span>
					</div>
				</div>		

			</div>
			<div class="recent-grid">
					<div class="projects">
						<div class="card">
							<div class="card-header">
								<h2>Recent Event History</h2>

								<button>See all<span class="las la-arrow-right"></span></button>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table width="100%">
										<thead>
											<tr>
												<td>Event Date</td>
												<td>Client Name</td>
												<td>Status</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>UI/UX design</td>
												<td>UI team</td>
												<td>
													<span class="status purple"></span>
													review
												</td>
											</tr>
											<tr>
												<td>Web development</td>
												<td>Frontend</td>
												<td>
													<span class="status pink"></span>
													in progress
												</td>											
											</tr>
											<tr>
												<td>Ushop app</td>
												<td>Mobile team</td>
												<td>
													<span class="status orange"></span>
													pending
												</td>
											</tr>
											<tr>
												<td>UI/UX design</td>
												<td>UI team</td>
												<td>
													<span class="status purple"></span>
													review
												</td>
											</tr>
											<tr>
												<td>Web development</td>
												<td>Frontend</td>
												<td>
													<span class="status pink"></span>
													in progress
												</td>											
											</tr>
											<tr>
												<td>Ushop app</td>
												<td>Mobile team</td>
												<td>
													<span class="status orange"></span>
													pending
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							
						</div>
					</div>

					<div class="customers">
						<div class="card">
							<div class="card-header">
								<h3>New Customer</h3>

								<button>See all <span class="las la-arrow-right"></span></button>
							</div>
							<div class="card-body">
								

								<div class="customer">
									<div class="info">
										<img src="UserImage/2.jpg" width="40px" height="40px" alt="">
										<div>
											<h4>Customer 1</h4>
											<small>CEo expart</small>
										</div>
									</div>
									<div class="contact">
										<span class="las la-user-circle"></span>
										<span class="las la-comment"></span>
										<span class="las la-phone"></span>
									</div>
								</div>
								<div class="customer">
									<div class="info">
										<img src="UserImage/2.jpg" width="40px" height="40px" alt="">
										<div>
											<h4>Customer 2</h4>
											<small>CEo expart</small>
										</div>
									</div>
									<div class="contact">
										<span class="las la-user-circle"></span>
										<span class="las la-comment"></span>
										<span class="las la-phone"></span>
									</div>
								</div>
								<div class="customer">
									<div class="info">
										<img src="UserImage/2.jpg" width="40px" height="40px" alt="">
										<div>
											<h4>Customer 3</h4>
											<small>CEo expart</small>
										</div>
									</div>
									<div class="contact">
										<span class="las la-user-circle"></span>
										<span class="las la-comment"></span>
										<span class="las la-phone"></span>
									</div>
								</div>
								<div class="customer">
									<div class="info">
										<img src="UserImage/2.jpg" width="40px" height="40px" alt="">
										<div>
											<h4>Customer 4</h4>
											<small>CEo expart</small>
										</div>
									</div>
									<div class="contact">
										<span class="las la-user-circle"></span>
										<span class="las la-comment"></span>
										<span class="las la-phone"></span>
									</div>
								</div>
								<div class="customer">
									<div class="info">
										<img src="UserImage/2.jpg" width="40px" height="40px" alt="">
										<div>
											<h4>Customer 5</h4>
											<small>CEo expart</small>
										</div>
									</div>
									<div class="contact">
										<span class="las la-user-circle"></span>
										<span class="las la-comment"></span>
										<span class="las la-phone"></span>
									</div>
								</div>
								
								
							</div>
						</div>
						
					</div>
					
				</div>

		</main>
		<footer class="footer">
            <h4>Designed by <a href="https://www.facebook.com/raisuddin.alvee.56/" target="blanck" style="color: black;">SM Alvee</a></h4>
        </footer>
	</div>
</body>
</html>