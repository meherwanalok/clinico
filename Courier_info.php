<?php

 
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{

$pid =$_REQUEST['pid'];
$fname =$_REQUEST['fname'];
$lname =$_REQUEST['lname'];
$phone =$_REQUEST['phone'];
$address =$_REQUEST['address'];
$med_amnt = $_REQUEST['med_amnt'];
$track_id =$_REQUEST['track_id'];
$dest_mob =$_REQUEST['dest_mob'];
$courier_amnt =$_REQUEST['courier_amnt'];
$courier_status =$_REQUEST['courier_status'];
$courier_date =$_REQUEST['courier_date'];
$payment_status =$_REQUEST['payment_status'];


$checkid= mysqli_query($con,"SELECT * FROM new_patient_record WHERE pid= '".$pid."'  ");
$match  = mysqli_num_rows($checkid);

/* if ($match > 0){
    echo "<script>
        alert('Patient ID already exist!');		
    </script>";
}else{ */

$ins_query="insert into courier_details (`pid`,`fname`,`lname`,`phone`,`address`,`med_amnt`,`track_id`,`dest_mob`,`courier_amnt`,`courier_status`,`courier_date`,`payment_status`) values ('$pid','$fname','$lname','$phone','$address','$med_amnt','$track_id','$dest_mob','$courier_amnt','$courier_status','$courier_date','$payment_status')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Courier Record Inserted Successfully.</br></br><a href='view_courier_info.php'>View Inserted Record</a>";
//}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Courier Record</title>
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css_1/style.css">
<link rel="stylesheet" href="css/style_form.css" />

</head>
<body>


<p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a> | <a href="lookup.php">Lookup Patients</a> |  <a href="sendsms.php">Send SMS</a> |  <a href="view_courier_info.php">View Courier Info</a></p>

<div class="form-style-3">
<section class="register">
<h1>Courier Record for Patients</h1>
<form class="pure-form-aligned" name="form" method="post" action=""> 
<fieldset>
<legend><span class="number"></span>Patient Personal Info</legend>
<input type="hidden" name="new" value="1" />
<p><input type="text" name="pid" placeholder="Patient ID" required /></p>
<p><input type="text" name="fname" placeholder="First Name" required /></p>
<p><input type="text" name="lname" placeholder="Last Name" required /></p>
<p><input type="text" name="phone" placeholder="Phone Number" /></p>
<p><input type="text" name="address" placeholder="Patient Address" /></p>
<p><input type="text" name="med_amnt" placeholder="Amount of medicine" /></p>
<p><input type="text" name="track_id" placeholder="Courier Track ID" /></p>
<p><input type="text" name="dest_mob" placeholder="Mobile number of destination address" /></p>
<p><input type="text" name="courier_amnt" placeholder="Courier Amount (Fee)" /></p>
<p><input type="text" name="courier_status" placeholder="Courier Status (In Transit or Delivered)" /></p>
<p><input type="date" name="courier_date" placeholder="Date when the item was shipped" /></p>
<p><input type="text" name="payment_status" placeholder="Payment Status (Paid or Unpaid)" /></p>



</fieldset>	  

<p><input class="submit" name="submit" type="submit" value="Save Courier Info" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</section>

</div>

</body>
</html>