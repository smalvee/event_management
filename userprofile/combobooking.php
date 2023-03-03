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
    $id = $res['id'];
  }


  $combo = "Select * from combopackage";
    
  $getcombopackage = $crud->getData($combo);

  



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maxium-scale=1,minimum-scale=1">
	<title>Customer Profile</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
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
						<a href="">
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
							<span class="las la-shopping-cart"></span>
							Order History
						</a>
					</li>
					<li>
						<a href="">
							<span class="las la-envelope"></span>
							Mailbox
						</a>
					</li>
					<li>
						<a href="">
							<span class="las la-check-circle"></span>
							Tasks
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

			<!-- <div class="header-icons">
				<span class="las la-search"></span>
				<span class="las la-bookmark"></span>
				<span class="las la-sms"></span>
			</div> -->
		</header>

		<main>

			<form action="photobooking.php" method="POST">
				<div class="cards" style="text-align: center;">

						<div class="card-flex">
							<button><a style="text-decoration: none;" href="photobooking.php">Photography</a></button>
						</div>
						<div class="card-flex">
							<button><a style="text-decoration: none;" href="cinebooking.php">Cinematography</a></button>
						</div>
						<div class="card-flex">
							<button><a style="text-decoration: none;" href="combobooking.php">Combo</a></button>
						</div>
						<div class="card-flex">
							<button><a style="text-decoration: none;" href="">Mehedi Stage</a></button>
						</div>
						<div class="card-flex">
							<button><a style="text-decoration: none;" href="">Holdi Stage</a></button>
						</div>
						<div class="card-flex">
							<button><a style="text-decoration: none;" href="">Wedding Stage</a></button>
						</div>
				</div>

				<div class="page-header">
				<div>
					<h2 style="padding-top: 2rem;">Combo Packages</h2>
				</div>
				
			</div>


				<div class="cards">

					<?php
						foreach($getcombopackage as $key=>$pack)
							  {
							  	
					?>

					<div class="card-single">
						<div class="card-flex">
							<div class="card-info">
								<h3><?php echo $pack['package_name'];?></h3>
								<h4>Tk. <?php echo number_format($pack['price']);?>/=</h4>
								<h6>Detaols: </h6>
								<p><?php echo $pack['details'];?></p>								
							</div>
						</div>
						<div><button><a href="combopreelook.php?idl=<?php echo $pack['package_name'] ?>">Book Now</a></button></div>					
					</div>

				<?php } ?>




				</div>

			</form>	
		</main>		
	</div>

	<label for="sidebar-toggle" class="body-label"></label>
</body>
</html>