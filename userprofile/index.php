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
  }



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
			<div class="page-header">
				<div>
					<h1>Analytics Dashboard</h1>
					<small>The simpliest way to connect with us</small>
				</div>
				<!-- <div class="header-actions">
					<button>
						<span class="las la-file-export"></span>
						Export
					</button>
					<button>
						<span class="las la-tools"></span>
						Settings
					</button>
				</div> -->
			</div>

			<div class="cards">
				<div class="card-single">
					<div class="card-flex">
						<div class="card-info">
							<div class="card-head">
								<span>Purchases</span>
								<small>Total Amount</small>
							</div>

							<h2 style="color: blue;">Tk: 17,663/=</h2>

						</div>
						<div class="card-chart danger">
							<span class="las la-chart-line"></span>
						</div>
					</div>					
				</div>
				
				<div class="card-single">
					<div class="card-flex">
						<div class="card-info">
							<div class="card-head">
								<span>Due</span>
								<small>Total Due</small>
							</div>

							<h2 style="color: red;">Tk: 5,663/=</h2>
						</div>
						<div class="card-chart success">
							<span class="las la-chart-line"></span>
						</div>
					</div>					
				</div>
				<div class="card-single">
					<div class="card-flex">
						<div class="card-info">
							<div class="card-head">
								<span>Discount</span>
								<small>Total Discount you enjoyed</small>
							</div>

							<h2 style="color: #CD8E12">9.8%</h2>
						</div>
						<div class="card-chart yellow">
							<span class="las la-chart-line"></span>
						</div>
					</div>					
				</div>

			</div>

			<div class="jobs-grid">
				


				<div class="jobs">
					<h2>Jobs <small>See all Jobs <span class="las la-arrow-right"></span></small></h2>
					<div class="table-responsive">
						<table width: 100%>
							<thead>
								<tr>
									<td style="width: 100%;">Name</td>
									<td style="width: 100%;">Address</td>
									<td style="width: 100%;">Mobile</td>
									<td style="width: 100%;">Teliphone</td>
									<td style="width: 100%;">Fax</td>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="width: 100%;">SM Alvee</td>
									<td style="width: 100%;">SM Alvee</td>
									<td style="width: 100%;">SM Alvee</td>
									<td style="width: 100%;">SM Alvee</td>
									<td style="width: 100%;">SM Alvee</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>				
			</div>
		</main>		
	</div>

	<label for="sidebar-toggle" class="body-label"></label>
</body>
</html>