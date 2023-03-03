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
    $price = $bookinfo['price'];
    $details = $bookinfo['details'];
   
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

if(isset($_POST['add']))
{
	$event_name         = $_POST['event_name'];
	$date         = $_POST['date'];
	$shift         = $_POST['shift'];
	$address         = $_POST['address'];
	$stage_cat         = $_POST['stage'];
	$sday         = $_POST['sday'];
	$photo_cat         = $_POST['photocata'];
	$pday         = $_POST['pday'];
	$cine_cat         = $_POST['cinecata'];
	$cineday         = $_POST['cineday'];
	$t_number         = $_POST['t_number'];
	$f_number         = $_POST['f_number'];
	$delivery_option         = $_POST['delivery_option'];
	$sedit         = $_POST['sedit'];
	$nedit         = $_POST['nedit'];
	$r4         = $_POST['4r'];
	$l5         = $_POST['5l'];
	$l12         = $_POST['12l'];
	$l16         = $_POST['16l'];
	$l20         = $_POST['20l'];
	$mbook         = $_POST['mbook'];
	$status         = $_POST['status'];

	
	$result = $crud->execute("INSERT into confirmorder (
		
		customer_id,
		cus_order_id,
		event_name,
		package_name,
		price,
		details,
		event_date,
		event_shift,
		event_address,
		stage_catagory,
		stage_days,
		photo_catagory,
		photo_person,
		cine_catagory,
		cine_person,
		trailer_nember,
		f_v_number,
		delivery_by,
		sp_edit,
		n_edit,
		4r_print,
		5l_print,
		12l_print,
		16l_print,
		20l_print,
		memory_book,
		status)
		VALUES (
		'$customer_id',
		'$order_id',
		'$event_name',
		'$package_name',
		'$price',
		'$details',
		'$date',
		'$shift',
		'$address',
		'$stage_cat',
		'$sday',
		'$photo_cat',
		'$pday',
		'$cine_cat',
		'$cineday',
		'$t_number',
		'$f_number',
		'$delivery_option',
		'$sedit',
		'$nedit',
		'$r4',
		'$l5',
		'$l12',
		'$l16',
		'$l20',
		'$mbook',
		'$status')");

	if($result)
    {
    	
      	echo "<script>alert('Service Added Successfully')</script>";
      	
    }
    else
    {
      echo '<script>alert("Failed")</script>';
    }
}



if(isset($_POST['confirm']))
{
	$status         = $_POST['status'];

	$result = $crud->execute("UPDATE customerbooking SET status = '$status' where id = '$order_id'");
	$result1 = $crud->execute("UPDATE confirmorder SET status = '$status' where cus_order_id = '$order_id'");

	if ($result1) {
		echo "<script>alert('confirmed order')</script>";
		header("location:orderrequest.php");
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
					<a href="orderrequest.php" class="active"><span class="las la-shopping-bag"></span><span>Pending Order</span></a>
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
		<form action="makeconfirm.php?idl=<?php echo $order_id?>" method="post">	
<!-- -----------------------------for Stage Section------------------------------ -->
		
		<div class="table-responsive">
			<p><strong>Customer Name: </strong><?php echo $cusname?></p>
			<p><strong>Mobile: </strong><?php echo $mobile?></p>
			<p><strong>Order Id: </strong><?php echo $order_id ?></p>
			<p><strong>Package Name: </strong><?php echo $package_name ?></p>
			<p style="padding-bottom: 1rem;"><strong>Status: </strong><?php echo $status ?></p>

			
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
						<select style="height: 30px; width: 100%; border-radius: 5px;" name="status">
                      			<option value="">Select One</option>
                      			<option value="Pending">Pending</option>
                      			<option value="Confirm">Confirm</option>
                      			<option value="Cenceled">Cenceled</option>
                  		</select>
                  	</td>
				</tbody>
			</table>
			<button type="submit" name="confirm" style="background-color:#5BC9F6; color: black; border-radius: 5px;" class="btn"><strong>Confirm Order</strong></button>
			<br>
			<br>



			<hr style="width: 80%;">
			<h3 style="text-align: center; width: 80%;">Add Service</h3>
			<hr style="width: 80%;">
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
						<td>
							<select style="height: 30px; width: 100%; border-radius: 5px;" name="event_name" >
                      			<option value="">Select One</option>
                      			<option value="Engengment Program">Engengment Program</option>
                      			<option value="Mehedi Program">Mehedi Program</option>
                      			<option value="Holdi Program">Holdi Program</option>
                      			<option value="Wedding Program">Wedding Program</option>
                      			<option value="Wedding Program">Wedding Program</option>
                  			</select>
						</td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px;" type="date" name="date" ></td>
						<td>
							<select style="height: 30px; width: 100%; border-radius: 5px;" name="shift" >
                      			<option value="">Select One</option>
                      			<option value="11 AM to 5.30 PM">11 AM to 5.30 PM</option>
                      			<option value="6.00 PM to 11.59 PM">6.00 PM to 11.59 PM</option>
                  			</select>
                  		</td>
						
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
					<td><textarea style="height:30px; width: 100%; border-radius: 5px;"placeholder="Max 30 characters" name="address" ></textarea></td>
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
						<td>
							<select style="height: 30px; width: 100%; border-radius: 5px;" name="stage">
								
								<option value="">Select one</option>
	                              <?php 
	                                 $stageinfo = "select * from stage";
									  $getstageinfo = $crud->getData($stageinfo);

									  foreach($getstageinfo as $key=>$stage){
	                                 ?>
	                              <option value="<?php echo $stage['catagory']; ?>" >
	                                 <?php echo $stage['catagory']; ?>
	                              </option>
	                              <?php  }?>   
                           </select>
                       </td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px;text-align: center;" type="number" name="sday" value=""></td>					
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
						<td>
							<select style="height: 30px; width: 100%; border-radius: 5px;" name="photocata">
								
								<option value="">Select one</option>
	                              <?php 
	                                 $photoinfo = "select * from photography";
									  $getphotoeinfo = $crud->getData($photoinfo);

									  foreach($getphotoeinfo as $key=>$photo){
	                                 ?>
	                              <option value="<?php echo $photo['catagory']; ?>" >
	                                 <?php echo $photo['catagory']; ?>
	                              </option>
	                              <?php  }?>   
                           </select>
                       </td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="pday" value=""></td>					
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
						<td>
							<select style="height: 30px; width: 100%; border-radius: 5px;" name="cinecata">
							<option value="">Select one</option>
                              <?php 
                                 $cineinfo = "select * from cinematography";
								  $getcineinfo = $crud->getData($cineinfo);

								  foreach($getcineinfo as $key=>$cine){
                                 ?>
                              <option value="<?php echo $cine['catagory']; ?>" >
                                 <?php echo $cine['catagory']; ?>
                              </option>
                              <?php  }?>   
                           </select>
                       </td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="cineday" value="2"></td>					
					</tr>
					
				</tbody>
			</table>

			<!-- Delivery Item -->
			<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td>Trailer Number</td>
						<td>Full Video Number</td>
						<td>Delivery By</td>
						<td>Special Edit</td>
						<td>Normal Edit</td>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="t_number" value="2"></td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="f_number" value="2"></td>
						<td>
							<select style="height: 30px; width: 100%; border-radius: 5px;" name="delivery_option">
								<option value="">Select One</option>
								<option value="CD">CD</option>
								<option value="Pen Drive">Pen Drive</option>
							</select>
						</td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="sedit" value="2"></td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="nedit" value="2"></td>				
					</tr>
					
				</tbody>
			</table>

			<!-- Print Item -->
			<table width="80%" style="background: #fff; border-radius: 5px;">
				<thead>
					<tr>
						<td>4R Print</td>
						<td>5L Print</td>
						<td>12L Print</td>
						<td>16L Print</td>
						<td>20L Print</td>
						<td>Memory Book</td>
					</tr>
				</thead>
				<tbody>
					
					<tr>
						<td><input style="height: 30px; width: 100%; border-radius: 5px;" type="number" name="4r"></td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px;" type="number" name="5l"></td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px;" type="number" name="12l"></td>
						<td><input style="height: 30px; width: 100%; border-radius: 5px;" type="number" name="16l"></td>		
						<td><input style="height: 30px; width: 100%; border-radius: 5px;" type="number" name="20l"></td>	
						<td>
							<select style="height: 30px; width: 100%; border-radius: 5px;" name="mbook">
                      			<option value="">Select One</option>
                      			<option value="Large">Large</option>
                      			<option value="Normal">Normal</option>
                      			<option value="Small">Small</option>
                  			</select>
						</td>	
					</tr>
					
				</tbody>
			</table>

			

			<button type="submit" name="add" style="background-color:#5BC9F6; color: black; border-radius: 5px;" class="btn"><strong>Add Service</strong></button>
		</div>
		


		</form>
		</main>
		<footer class="footer">
            <h4>Designed by <a href="https://www.facebook.com/raisuddin.alvee.56/" target="blanck" style="color: black;">SM Alvee</a></h4>
        </footer>
	</div>
</body>
</html>