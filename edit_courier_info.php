<?php

 
require('db.php');
include("auth.php");
$pid=$_REQUEST['pid'];
$query = "SELECT * from courier_details where pid='".$pid."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/style_form.css" />
<link rel="stylesheet" href="css_1/style.css" />
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<style type="text/css">
input, textarea{
    color: red;
}

textarea:focus, input:focus {
    color: blue;
}
</style>
</head>
<body>
<div class="form">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Record</a> | <a href="logout.php">Logout</a> | <a href="lookup.php">Lookup Patients</a></p>

<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$pid=$_REQUEST['pid'];
$fname =$_POST['fname'];
$lname =$_POST['lname'];
$phone =$_POST['phone'];
$address =$_POST['address'];

$med_amnt = $_POST['med_amnt'];
$track_id =$_POST['track_id'];
$dest_mob =$_POST['dest_mob'];
$courier_amnt =$_POST['courier_amnt'];
$courier_status =$_POST['courier_status'];
$courier_date =$_POST['courier_date'];
$payment_status =$_POST['payment_status'];


$update="update courier_details set pid='".$pid."', fname='".$fname."', lname='".$lname."', phone='".$phone."',address='".$address."', med_amnt='".$med_amnt."', track_id='".$track_id."', dest_mob='".$dest_mob."', courier_amnt='".$courier_amnt."', courier_status='".$courier_status."', courier_date='".$courier_date."', payment_status='".$payment_status."' where pid='".$pid."'";

mysqli_query($con, $update) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view_courier_info.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
 
<div class="form-style-3">
<section class="register">
<h1>Update Courier Information</h1>
<form name="form" method="post" action=""> 
<fieldset>
<legend><span class="number"></span>Courier Information</legend>
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="pid" value="<?php echo $row['pid'];?>" readonly /></p>
	<p><input type="text" name="fname" placeholder="First Name" required value="<?php echo $row['fname'];?>" readonly /></p>
	<p><input type="text" name="lname" placeholder="Last Name" required value="<?php echo $row['lname'];?>" readonly /></p>
	<p><input type="text" name="phone" placeholder="Phone" required value="<?php echo $row['phone'];?>" /></p>
	<p><textarea rows=5 cols=29 name="address" placeholder="Address" required><?php echo $row['address'];?></textarea></p>
	<p><input type="text" name="med_amnt" placeholder="Amount of medicine" required value="<?php echo $row['med_amnt'];?>" /></p>
	<p><input type="text" name="track_id" placeholder="Courier Track ID" required value="<?php echo $row['track_id'];?>" /></p>
	<p><input type="text" name="dest_mob" placeholder="Mobile number of destination address" required value="<?php echo $row['dest_mob'];?>" /></p>
	<p><input type="text" name="courier_amnt" placeholder="Courier Amount (Fee)" required value="<?php echo $row['courier_amnt'];?>" /></p>
	<p><input type="text" name="courier_status" placeholder="Courier Status (In Transit or Delivered)" required value="<?php echo $row['courier_status'];?>" /></p>
	<p><input type="date" name="courier_date" placeholder="Date when item was shipped" required value="<?php echo $row['courier_date'];?>"  /></p>
	<p><input type="text" name="payment_status" placeholder="Payment Status (Paid or Unpaid)" required value="<?php echo $row['payment_status'];?>" /></p>
	
		
</fieldset>
	  
<p><input class="submit" name="submit" type="submit" value="Update Courier Record" /></p>
</form>
<?php } ?>
</section>
</div>
</div>
</body>
</html>
