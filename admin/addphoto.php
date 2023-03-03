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
    
  }

  // $getpackage = $crud->getData("select * from photography");
  $query2 = "select * from photography";
  $getpackage = $crud->getData($query2);



if(isset($_POST['submit'])){

	$catagory = $_POST['package'];
    $price = $_POST['price'];



    $result = $crud->execute("INSERT into photography (catagory, price) VALUES('$catagory', '$price')");

    if($result)
				{
					echo "<h3><script>alert('Done');</script></h3>";
					header("location:addphoto.php");
				}
				else
				{
					echo "<h3><script>alert('Insertion Problem');</script></h3>";
				}

}

    




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
					<a href="package.php" class="active"><span class="las la-users"></span><span>Item Price</span></a>
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
			<div><h3 style="text-align: center; margin-bottom: 20px;">Add Photographer Catagory</h3></div>
			<form action="addphoto.php" method="post">
				<table width="100%" style="background: #fff;">
				<thead>
					<tr>
						<td><h3>Catagory</h3></td>
						<td><h3>Price</h3></td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input style="width: 100%; height: 35px; border-radius: 4px;" type="text" name="package" required=""></td>
						<td><input style="width: 100%; height: 35px; border-radius: 4px;" type="number" name="price" required=""></td>
						<td>
							<input style=
										"color:#FFFFFF;
										background-color:#ccc;
										border-color:#fff;
										padding: .5rem;
										width: 100%"
									type="submit" name="submit" value="ADD">
						</td>
					</tr>
				</tbody>
			</table>
			


<!-- -----------------------------Photography Display Section------------------------------ -->
			<div class="recent-grid">
					<div class="projects">
						<div class="card">
							<div class="card-header">
								<h2>Photographer</h2>
							</div>

							<div class="card-body">
								<div class="table-responsive">
									<table width="100%">
										<thead>
											<tr>
												<td>Catagory</td>
												<td>Price</td>
											</tr>
										</thead>
										<tbody>

											<?php foreach($getpackage as $key=>$package) {?>

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
				</div>
			</form>
		</main>
		<footer class="footer">
            <h4>Designed by <a href="https://www.facebook.com/raisuddin.alvee.56/" target="blanck" style="color: black;">SM Alvee</a></h4>
        </footer>
	</div>
</body>
</html>