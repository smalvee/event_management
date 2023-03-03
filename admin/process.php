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

 $table_id = $_GET['id'];

 $query5 = "select * from confirmorder where id = '$table_id'";
  $get_order_id = $crud->getData($query5);
  foreach($get_order_id as $key=>$get)
  {$cus_order_id = $get['cus_order_id'];}

 

//----------Edit Information------------------
  
    

    if(isset($_POST['update']))
    {
      
      $table_id = $_GET['id'];
      $event_name         = $_POST['eventname'];
      $date         = $_POST['date'];
      $shift         = $_POST['shift'];
      $address         = $_POST['address'];
      $stage_cat         = $_POST['stage'];
      $sday         = $_POST['sday'];
      $photo_cat         = $_POST['photocata'];
      $pday           = $_POST['pday'];
      $cine_cat           = $_POST['cinecata'];
      $cineday          = $_POST['cineday'];
      $t_number         = $_POST['t_number'];
      $f_number           = $_POST['f_number'];
      $delivery_option  = $_POST['delivery_option'];
      $sedit         = $_POST['sedit'];
      $nedit         = $_POST['nedit'];
      $r4         = $_POST['4r'];
      $l5         = $_POST['5l'];
      $l12         = $_POST['12l'];
      $l16         = $_POST['16l'];
      $l20         = $_POST['20l'];
      $mbook         = $_POST['mbook'];
     


      $update = $crud->execute("UPDATE confirmorder SET
      
      event_name = '$event_name',
      event_date = '$date',
      event_shift = '$shift',
      event_address = '$address',
      stage_catagory = '$stage_cat',
      stage_days = '$sday',
      photo_catagory = '$photo_cat',
      photo_person = '$pday',
      cine_catagory = '$cine_cat',
      cine_person = '$cineday',
      trailer_nember = '$t_number',
      f_v_number = '$f_number',
      delivery_by = '$delivery_option',
      sp_edit = '$sedit',
      n_edit = '$nedit',
      4r_print = '$r4',
      5l_print = '$l5',
      12l_print = '$l12',
      16l_print = '$l16',
      20l_print = '$l20',
      memory_book = '$mbook' where id = '$table_id'
      ");

      if ($update) {
        echo '<script>alert("Updated")</script>';
        header("location: editconfirmorder.php?idl=$cus_order_id");
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
        Edit Services
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
    <form action="process.php?id=<?php echo $table_id?>" method="post"> 
<!-- -----------------------------for Stage Section------------------------------ -->




      <hr style="width: 80%;">
      <h3 style="text-align: center; width: 80%;">Service List</h3>
      <hr style="width: 80%;">



      <?php 
            $conn = mysqli_connect("localhost","root","","wedding");
                        $sql3 = "SELECT * FROM confirmorder where id = '$table_id'";
                        
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
            <td>
              <select name="eventname" style="height: 30px; width: 100%; border-radius: 5px;" >
                            <option value="<?php echo $row['event_name'];?>"><?php echo $row['event_name'];?></option>
                            <option value="Engengment Program">Engengment Program</option>
                            <option value="Mehedi Program">Mehedi Program</option>
                            <option value="Holdi Program">Holdi Program</option>
                            <option value="Wedding Program">Wedding Program</option>
                            <option value="Wedding Program">Wedding Program</option>
                        </select>
            </td>
            <td><input style="height: 30px; width: 100%; border-radius: 5px;" type="date" name="date" value="<?php echo $row['event_date'];?>"></td>
            <td>
              <select style="height: 30px; width: 100%; border-radius: 5px;" name="shift" >
                            <option value="<?php echo $row['event_shift'];?>"><?php echo $row['event_shift'];?></option>
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
          <td><textarea style="height:30px; width: 100%; border-radius: 5px;"placeholder="Max 30 characters" name="address" ><?php echo $row['event_address'];?></textarea></td>
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
                <option value="<?php echo $row['stage_catagory'];?>"><?php echo $row['stage_catagory'];?></option>
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
            <td><input style="height: 30px; width: 100%; border-radius: 5px;text-align: center;" type="number" name="sday" value="<?php echo $row['stage_days'];?>"></td>         
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
                <option value="<?php echo $row['photo_catagory'];?>"><?php echo $row['photo_catagory'];?></option>
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
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="pday" value="<?php echo $row['photo_person'];?>"></td>          
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
              <option value="<?php echo $row['cine_catagory'];?>"><?php echo $row['cine_catagory'];?></option>
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
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="cineday" value="<?php echo $row['cine_person'];?>"></td>          
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
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="t_number" value="<?php echo $row['trailer_nember'];?>"></td>
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="f_number" value="<?php echo $row['f_v_number'];?>"></td>
            <td>
              <select style="height: 30px; width: 100%; border-radius: 5px;" name="delivery_option">
                <option value="<?php echo $row['delivery_by'];?>"><?php echo $row['delivery_by'];?></option>
                <option value="">Select One</option>
                <option value="CD">CD</option>
                <option value="Pen Drive">Pen Drive</option>
              </select>
            </td>
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="sedit" value="<?php echo $row['sp_edit'];?>"></td>
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="nedit" value="<?php echo $row['n_edit'];?>"></td>       
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
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="4r" value="<?php echo $row['4r_print'];?>"></td>
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="5l" value="<?php echo $row['5l_print'];?>"></td>
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="12l" value="<?php echo $row['12l_print'];?>"></td>
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="16l" value="<?php echo $row['16l_print'];?>"></td>  
            <td><input style="height: 30px; width: 100%; border-radius: 5px; text-align: center;" type="number" name="20l" value="<?php echo $row['20l_print'];?>"></td>  
            <td>
              <select style="height: 30px; width: 100%; border-radius: 5px;" name="mbook">
                            <option value="<?php echo $row['memory_book'];?>"><?php echo $row['memory_book'];?></option>
                            <option value="">Select One</option>
                            <option value="Large">Large</option>
                            <option value="Normal">Normal</option>
                            <option value="Small">Small</option>
                        </select>
            </td> 
          </tr>         
        </tbody>

        <!-- Test purpose print start -->
        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
        <!-- Test purpose print End -->


      </table>
      <button style="height: 30px; width: 39.9%; background-color: #fff;" type="submit" name="update">Update</button>
      <button style="height: 30px; width: 39.9%; background-color: #fff;"><a href="editconfirmorder.php?idl=<?php echo $cus_order_id?>">Back</a></button>
      
  
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