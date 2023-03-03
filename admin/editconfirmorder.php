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
  	// $event_name 	= $tabledata['event_name'];
   //  $event_date 	= $tabledata['event_date'];
   //  $event_shift 	= $tabledata['event_shift'];
   //  $event_address 	= $tabledata['event_address'];
   //  $stage_catagory 	= $tabledata['stage_catagory'];
   //  $stage_days 	= $tabledata['stage_days'];
   //  $photo_catagory 	= $tabledata['photo_catagory'];
   //  $photo_person 	= $tabledata['photo_person'];
   //  $cine_catagory 	= $tabledata['cine_catagory'];
   //  $cine_person 	= $tabledata['cine_person'];
   //  $trailer_nember 	= $tabledata['trailer_nember'];
   //  $f_v_number 	= $tabledata['f_v_number'];
   //  $delivery_by 	= $tabledata['delivery_by'];
   //  $sp_edit 	= $tabledata['sp_edit'];
   //  $n_edit 	= $tabledata['n_edit'];
   //  $r4 	= $tabledata['4r_print'];
   //  $l5 	= $tabledata['5l_print'];
   //  $l12 	= $tabledata['12l_print'];
   //  $l16 	= $tabledata['16l_print'];
   //  $l20 	= $tabledata['20l_print'];
   //  $memory_book 	= $tabledata['memory_book'];
    $event_status 	= $tabledata['status'];
       
  }
	

	


//----------DELETE Information------------------
	if (isset($_GET['delet'])) {
  	$id = $_GET['delet'];
  	$orderinfo = "select cus_order_id from confirmorder where id = '$id'";  	
  	$getinfo = $crud->getData($orderinfo);

  	foreach($getinfo as $key=>$info)
  	{
    	$order_id = $info['cus_order_id'];
  	}
  		header("location: editconfirmorder.php?idl=$order_id");


  		$result = $crud->execute("DELETE from confirmorder where id = $id");
  		if ($result) {
  			echo '<script>alert("Delet")</script>';
  		}
	}


//----------Update Status------------------
	if(isset($_POST['statusbtn']))
	{
		$status         = $_POST['status'];

		$result = $crud->execute("UPDATE customerbooking SET status = '$status' where id = '$order_id'");
		$result1 = $crud->execute("UPDATE confirmorder SET status = '$status' where cus_order_id = '$order_id'");

		if ($result1) 
			{
				echo "<script>alert('Status updated')</script>";
				header("location: confirmorder.php");
			}
		else
			{
				echo '<script>alert("Failed")</script>';
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
				Edit Order
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
		<form action="editconfirmorder.php?idl=<?php echo $order_id?>" method="post">	
<!-- -----------------------------for Stage Section------------------------------ -->
		
		<div class="table-responsive">
			<p><strong>Customer Name: </strong><?php echo $cusname?></p>
			<p><strong>Mobile: </strong><?php echo $mobile?></p>
			<p><strong>Order Id: </strong><?php echo $order_id ?></p>
			<p><strong>Package Name: </strong><?php echo $package_name ?></p>
			<p style="padding-bottom: 1rem;"><strong>Status: </strong><?php echo $status ?></p>

			
		
				
				<!-- Status update -->
			<table width="25%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td style="color: red;">Event Status</td>
					</tr>
				</thead>
				<tbody>
					<td>
						<select style="height: 30px; width: 100%; border-radius: 5px;" name="status" >
                      			<option value="<?php echo $event_status;?>"><?php echo $event_status;?></option>
                      			<option value="">Select One</option>
                      			<option value="Pending">Pending</option>
                      			<option value="Confirm">Confirm</option>
                      			<option value="Delivery on process">Delivery on process</option>
                      			<option value="Complete">Complete</option>
                  		</select>
                  	</td>
				</tbody>
			</table>
			<button type="submit" name="statusbtn" style="background-color:#5BC9F6; color: black; border-radius: 5px;" class="btn"><strong>Update Status</strong></button>
			<br>
			<br>



			<hr style="width: 80%;">
			<h3 style="text-align: center; width: 80%;">Service List</h3>
			<hr style="width: 80%;">



			<?php 
						$conn = mysqli_connect("localhost","root","","wedding");
                        $sql3 = "SELECT * FROM confirmorder where cus_order_id = '$order_id'";
                        
                        $query3 = mysqli_query($conn,$sql3);
                        while($row = mysqli_fetch_assoc($query3))
                        	{
                        	?>
                        		<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td>Event Name</td>
						<td>Event Date</td>
						<td>Event Shift</td>
						
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td><?php echo $row['event_name'];?></td>
						<td><?php echo $row['event_date'];?></td>
						<td><?php echo $row['event_shift'];?></td>
						
					</tr>
					
				</tbody>
			</table>

			<!-- address -->
			<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td>Event Address</td>
					</tr>
				</thead>
				<tbody>
					<td style="height:30px; width: 100%;"><?php echo $row['event_address'];?></td>
				</tbody>
			</table>
			<!-- Stage Booking -->
			<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td>Stage Catagory</td>
						<td>Day's</td>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td><?php echo $row['stage_catagory'];?></td>
						<td><?php echo $row['stage_days'];?></td>					
					</tr>
					
				</tbody>
			</table>

			<!-- Photo Booking -->
			<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td>Photographer</td>
						<td>Person</td>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td><?php echo $row['photo_catagory'];?></td>
						<td><p style="text-align: center;"><?php echo $row['photo_person'];?></p></td>					
					</tr>
					
				</tbody>

				<!-- Cine Booking -->
			<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td>Cinematographer</td>
						<td>Person</td>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td><?php echo $row['cine_catagory'];?></td>
						<td><?php echo $row['cine_person'];?></td>					
					</tr>
					
				</tbody>
			</table>

			<!-- Delivery Item -->
			<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr style="height: 30px; width: 100%; text-align: center;">
						<td>Trailer Number</td>
						<td>Full Video Number</td>
						<td>Delivery By</td>
						<td>Special Edit</td>
						<td>Normal Edit</td>
					</tr>
				</thead>
				<tbody>
					
					<tr style="height: 30px; width: 100%; text-align: center;">
						<td><?php echo $row['trailer_nember'];?></td>
						<td><?php echo $row['f_v_number'];?></td>
						<td><?php echo $row['delivery_by'];?></td>
						<td><?php echo $row['sp_edit'];?></td>
						<td><?php echo $row['n_edit'];?></td>				
					</tr>
					
				</tbody>
			</table>

			<!-- Print Item -->
			<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr style="height: 30px; width: 100%; text-align: center;">
						<td>4R Print</td>
						<td>5L Print</td>
						<td>12L Print</td>
						<td>16L Print</td>
						<td>20L Print</td>
						<td>Memory Book</td>
					</tr>
				</thead>
				<tbody>
					
					<tr style="height: 30px; width: 100%; text-align: center;">
						<td><?php echo $row['4r_print'];?></td>
						<td><?php echo $row['5l_print'];?></td>
						<td><?php echo $row['12l_print'];?></td>
						<td><?php echo $row['16l_print'];?></td>	
						<td><?php echo $row['20l_print'];?></td>	
						<td><?php echo $row['memory_book'];?></td>	
					</tr>					
				</tbody>
				<input type="hidden" name="id" value="<?php echo $row['id'];?>">
			</table>

			<button style="height: 30px; width: 39.9%; background-color: #fff;" type="submit"><a href="process.php?id=<?php echo $row['id'];?>">Edit</a></button>
			<button style="height: 30px; width: 39.9%; background-color: #fff;"><a href="editconfirmorder.php?delet=<?php echo $row['id'];?>">Delet</a></button>
			
			<br>
			<br>
			<hr style="width: 80%;">
			<br>
                        <?php }?>
			
		</div>
		


		</form>
		</main>
		<footer class="footer">
            <h4>Designed by <a href="https://www.facebook.com/raisuddin.alvee.56/" target="blanck" style="color: black;">SM Alvee</a></h4>
        </footer>
	</div>
</body>
</html>