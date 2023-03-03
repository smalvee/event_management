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
			

if(isset($_POST['print']))
{
	header("location:invoice.php?idl=$order_id");
	
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maxium-scale=1">
	<title>packages</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>


<body style="padding-top: 165px;">
	<div class="container">
		<div class="input_field">
			<h5><strong>Bill No.: </strong>ww/2021/<?php echo $order_id ?></h5>
			<h5><strong>Printing Date: </strong><?php echo date("d.m.y");?></h5>
			<h4 style="text-align: center;">Customer Copy</h4>
			<h5><strong>Client Name: </strong><?php echo $cusname;?></h5>
			<h5><strong>Mobile Number: </strong><?php echo $mobile;?></h5>
			<!-- <h5><strong>Address: </strong><?php echo $address;?></h5> -->
			<hr>

			<div class="input_field">
				<table class="table table-border" style="text-align: center; font-size: 19px;">
					<tr>
						<th>Date</th>
						<th>Package Name</th>
						<!-- <th>Details</th> -->
						<th></th>
						<th></th>
						<th>Price</th>
					</tr>
					<?php
						$sql3 = "SELECT * FROM confirmorder where cus_order_id = '$order_id'";                   
	                        $query3 = mysqli_query($conn,$sql3);
							while($row = mysqli_fetch_assoc($query3))
	                        	{
						?>
					<tr>
						<td style="width: 2in;"><?php echo $row['event_date'];?></td>
						<td><?php echo $row['package_name'];?></td>
						<!-- <td style="width: 3.5in;"><?php echo $row['details'];?></td> -->
						<td></td>
						<td></td>
						<td><?php echo number_format($row['price']);?></td>
					</tr>
					<?php }?>
					<?php 
							$qr1 = ("SELECT * from accounts where order_id = '$order_id'");
							$get_info = mysqli_query($conn,$qr1);
							while($accounts_info = mysqli_fetch_assoc($get_info)){
						?>

					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th>Total</th>
						<th><?php echo $accounts_info['total'];?></th>
					</tr>
					<tr style="border: hidden;">
						<th></th>
						<th></th>
						<th></th>
						<th>Discount</th>
						<th><input class="form-control" style="text-align: center;" type="number" name="discount" value="<?php echo $accounts_info['discount'];?>"></th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th>Advance</th>
						<th><input class="form-control" style="text-align: center;" type="number" name="advance" value="<?php echo $accounts_info['advance'];?>"></th>
					</tr>
					<tr style="border: hidden;">
						<th></th>
						<th></th>
						<th></th>
						<th style="color: red;">Due</th>
						<th><input sclass="form-control" style="text-align: center;" type="number" name="due" value="<?php echo $accounts_info['due'];?>"></th>
					</tr>
					<tr>
						<th></th>
						<th></th>
						<th></th>
						<th>Next Payment</th>
						<th><input class="form-control" style="text-align: center;" type="number" name="nx_pay" value="<?php echo $accounts_info['next_payment'];?>"></th>
					</tr>
					
					
					<?php }?>

					
				</table>

				<h3>Details:</h3>
				<?php
						$sql3 = "SELECT * FROM confirmorder where cus_order_id = '$order_id'";                   
	                        $query3 = mysqli_query($conn,$sql3);
							while($row = mysqli_fetch_assoc($query3))
	                        	{
						?>
				<p style="text-align: justify;"><?php echo $row['details'];?></p>

			<?php }?>

			</div>
			
		</div>
		
	</div>


	
		
</body>
</html>