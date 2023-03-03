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

 $order_id = $_GET['idl'];
 $conn = mysqli_connect("localhost","root","","wedding");
    
 $bookinginfo = "select * from customerbooking where id = '$order_id'";
  $getbookinfo = $crud->getData($bookinginfo);

  foreach($getbookinfo as $key=>$bookinfo)
  {
    $package_name = $bookinfo['package_name'];
    $order_id = $bookinfo['id'];
    $status = $bookinfo['status'];
    $customer_id = $bookinfo['customer_id'];
   
  }

  $userinfo = "select * from user where id = '$customer_id'";
  $getinfo = $crud->getData($userinfo);

  foreach($getinfo as $key=>$info)
  {
    $cusname = $info['username'];
    $mobile = $info['mobile'];
   
  }

  $confirmtable = "select * from confirmorder where cus_order_id = '$order_id'";
  $gettabledata = $crud->getData($confirmtable);

  foreach($gettabledata as $key=>$tabledata)
  {
    $event_date 	= $tabledata['event_date'];
    $event_shift 	= $tabledata['event_shift'];
    $event_address 	= $tabledata['event_address'];
    $stage_catagory 	= $tabledata['stage_catagory'];
    $stage_days 	= $tabledata['stage_days'];
    $photo_catagory 	= $tabledata['photo_catagory'];
    $photo_person 	= $tabledata['photo_person'];
    $cine_catagory 	= $tabledata['cine_catagory'];
    $cine_person 	= $tabledata['cine_person'];
    $trailer_nember 	= $tabledata['trailer_nember'];
    $f_v_number 	= $tabledata['f_v_number'];
    $delivery_by 	= $tabledata['delivery_by'];
    $sp_edit 	= $tabledata['sp_edit'];
    $n_edit 	= $tabledata['n_edit'];
    $r4 	= $tabledata['4r_print'];
    $l5 	= $tabledata['5l_print'];
    $l12 	= $tabledata['12l_print'];
    $l16 	= $tabledata['16l_print'];
    $l20 	= $tabledata['20l_print'];
    $memory_book 	= $tabledata['memory_book'];
       
  }

if(isset($_POST['update_accounts']))
{
	$advance         = $_POST['advance'];
	$discount         = $_POST['discount'];
	$next_pay         = $_POST['nx_pay'];
	$due         = $_POST['due'];
	
	$qr1 = ("SELECT * from accounts where order_id = '$order_id'");
	$get_info = mysqli_query($conn,$qr1);
	while($accounts_info = mysqli_fetch_assoc($get_info)){
	$total = $accounts_info['total'];
	$pre_due = $accounts_info['due'];

	$due = $total - $discount - $advance - $next_pay;
	
	$save = $crud->execute("UPDATE accounts SET advance='$advance', discount='$discount', next_payment='$next_pay', due= '$due' where order_id='$order_id' ");


	if($save)
	{
		echo "<script>alert('Updated')</script>";
		
	}
	else
	{
		echo "<script>alert('Failed')</script>";
	}
}
}






if(isset($_POST['c_invoice']))
{
	$total         = $_POST['price'];
	$id =0;

	$confirmtable = "select * from accounts where order_id = '$order_id'";
    $gettabledata = $crud->getData($confirmtable);

  	foreach($gettabledata as $key=>$tabledata)
  	{
  		$id 	= $tabledata['order_id'];
  	}


	if ($order_id == $id) {
		echo "<script>alert('Already Created')</script>";
	}
	else
	{
		$result = $crud->execute("INSERT INTO accounts (order_id, total, advance, discount, next_payment, due) VALUES ('$order_id', '$total', 0, 0, 0, '$total')");
		if ($result) {
		echo "<script>alert('Envoice Created')</script>";
	}
	else
	{
		echo '<script>alert("Failed")</script>';
	}
	}	
}




if(isset($_POST['confirm']))
{
	$status         = $_POST['status'];

	$result = $crud->execute("UPDATE customerbooking SET status = '$status' where id = '$order_id'");
	$result1 = $crud->execute("UPDATE confirmorder SET status = '$status' where cus_order_id = '$order_id'");

	if ($result1) {
		echo "<script>alert('confirmed order')</script>";
		header("location:allorderhistory.php");
	}
	else
	{
		echo '<script>alert("Failed")</script>';
	}
}
			

// if(isset($_POST['print']))
// {
// 	header("location:invoice.php?idl=$order_id");
	
// }





?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maxium-scale=1">
	<title>packages</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
		.btn {
			height: 30px; width: 10rem; background-color:#F5F5F5; color: #0A6483; border-radius: 10px;
		}
	</style>

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
					<a href="allorderhistory.php" class="active"><span class="las la-shopping-bag"></span><span>All Order History</span></a>
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
				Order Confirmation
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
		<form action="orderdetails.php?idl=<?php echo $order_id?>" method="post">	
<!-- -----------------------------for Stage Section------------------------------ -->
		
		<div class="table-responsive">
			<p><strong>Customer Name: </strong><?php echo $cusname?></p>
			<p><strong>Mobile: </strong><?php echo $mobile?></p>
			<p><strong>Order Id: </strong><?php echo $order_id ?></p>
			<p><strong>Package Name: </strong><?php echo $package_name ?></p>
			<p style="padding-bottom: 1rem;"><strong>Status: </strong><?php echo $status ?></p>

			<div style="padding-bottom: 5px;">
				<button class="btn" type="submit" name="c_invoice"><strong>Create Envoice</strong></button>
				
				<button class="btn"><a href="invoice.php?idl=<?php echo $order_id?>" target="blank">Print Envoice</a></button>
			</div>
			<hr>
			<h3 style="text-align: center;">Display Order Information</h3>
			<hr>
			
				<table width="100%" style="background: #fff; border-radius: 5px; padding-bottom: 10px;">
					<tr style="text-align: center;">
						<th>Event Date</th>
						<th>Stage</th>
						<th>Quantity</th>
						<th>Photographer</th>
						<th>Person</th>
						<th>Chinematographer</th>
						<th>person</th>
					</tr>

					<?php 
						$conn = mysqli_connect("localhost","root","","wedding");
                        $sql3 = "SELECT * FROM confirmorder where cus_order_id = '$order_id'";
                        
                        $query3 = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query3))
                        	{
                        	?>
				
					<tr style="text-align: center;">
						<td><?php echo $row['event_date'];?></td>
						<td><?php echo $row['stage_catagory'];?></td>
						<td><?php echo $row['stage_days'];?></td>
						<td><?php echo $row['photo_catagory'];?></td>
						<td><?php echo $row['photo_person'];?></td>
						<td><?php echo $row['cine_catagory'];?></td>
						<td><?php echo $row['cine_person'];?></td>
					</tr>
					<?php } ?>
					
				</table>
				
				<!-- Status update -->
			<table width="25%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td style="color: red;">Event Status</td>
					</tr>
				</thead>
				<tbody>
					<td>
						<select style="height: 30px; width: 100%;  border-radius: 5px;" name="status">
                      			<option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                      			<option value="">Select One</option>
                      			<option value="Pending">Pending</option>
                      			<option value="Confirm">Confirm</option>
                      			<option value="Delivery on process">Delivery on process</option>
                      			<option value="Complete">Complete</option>
                  		</select>
                  	</td>
				</tbody>
			</table>
			<button type="submit" name="confirm" style="height: 30px; width: 10rem; background-color:#F5F5F5; color: #CB13BD; border-radius: 10px;"><strong>Update Status</strong></button>
			<br>
			<br>


			<table width="100%" style="background: #fff; border-radius: 5px; text-align: center;">
				
					<tr>
						<th>Date</th>
						<th>Package Name</th>
						<th>Package Details</th>
						<th>Price</th>

						
						
					</tr>
				
				
						<?php
						$sql3 = "SELECT * FROM confirmorder where cus_order_id = '$order_id'";                   
	                        $query3 = mysqli_query($conn,$sql3);
							while($row = mysqli_fetch_assoc($query3))
	                        	{
						?>
					<tr>
						<td style="width: 10%;"><?php echo $row['event_date'];?></td>
						<td><?php echo $row['package_name'];?></td>
						<td><?php echo $row['details'];?></td>
						<td><?php echo number_format($row['price']);?></td>	
						<input type="hidden" name="price" value="<?php echo $row['price'];?>">
							
					</tr>
					<?php }?>
					
					<tr>
						<th><hr style="width: 100%;"><hr style="width: 100%;"></th>
						<th><hr style="width: 100%;"><hr style="width: 100%;"></th>
						<th><hr style="width: 100%;"><hr style="width: 100%;"></th>
						<th><hr style="width: 100%;"><hr style="width: 100%;"></th>
					</tr>
						
						

						<?php 
							$qr1 = ("SELECT * from accounts where order_id = '$order_id'");
							$get_info = mysqli_query($conn,$qr1);
							while($accounts_info = mysqli_fetch_assoc($get_info)){
						?>

					<tr>
						<th></th>
						<th></th>
						<th>Total</th>
						<th><?php echo $accounts_info['total'];?></th>
					</tr>
					<tr>
						<th> </th>
						<th> </th>
						<th>Discount</th>
						<th><input style="height: 30px; border-radius: 5px; text-align: center;" type="number" name="discount" value="<?php echo $accounts_info['discount'];?>"></th>
					</tr>
					<tr>
						<th> </th>
						<th> </th>
						<th>Advance</th>
						<th><input style="height: 30px; border-radius: 5px; text-align: center;" type="number" name="advance" value="<?php echo $accounts_info['advance'];?>"></th>
					</tr>
					<tr>
						<th> </th>
						<th> </th>
						<th style="color: red;">Due</th>
						<th><input style="height: 30px; border-radius: 5px; text-align: center;" type="number" name="due" value="<?php echo $accounts_info['due'];?>"></th>
					</tr>
					<tr>
						<th> </th>
						<th> </th>
						<th>Next Payment</th>
						<th><input style="height: 30px; border-radius: 5px; text-align: center;" type="number" name="nx_pay" value="<?php echo $accounts_info['next_payment'];?>"></th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th><button type="submit" name="update_accounts" class="btn">Update</button></th>
					</tr>
					<?php }?>

			</table>
					


					








				


			
		</div>
		


		</form>
		</main>
		<footer class="footer">
            <h4>Designed by <a href="https://www.facebook.com/raisuddin.alvee.56/" target="blanck" style="color: black;">SM Alvee</a></h4>
        </footer>
	</div>
</body>
</html>