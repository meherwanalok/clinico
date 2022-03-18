<?php

 
require('db.php');
include("auth.php");
$id=$_REQUEST['id'];
$query = "SELECT * from new_patient_record where id='".$id."'"; 
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
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$pid =$_POST['pid'];
$fname =$_POST['fname'];
$lname =$_POST['lname'];
$phone =$_POST['phone'];
$visit_date =$_POST['visit_date'];
$age =$_POST['age'];
$address =$_POST['address'];
$submittedby = $_SESSION["username"];

$update="update new_patient_record set trn_date='".$trn_date."', fname='".$fname."', lname='".$lname."', phone='".$phone."', age='".$age."',address='".$address."', submittedby='".$submittedby."' where id='".$id."'";
$ins_query="insert into new_patient_record (`trn_date`,`pid`,`fname`,`lname`,`phone`,`visit_date`,`age`,`address`,`submittedby`) values ('$trn_date','$pid','$fname','$lname','$phone','$visit_date','$age','$address','$submittedby')";
mysqli_query($con, $update) or die(mysqli_error());
mysqli_query($con, $ins_query) or die(mysqli_error());
$status = "Record Updated Successfully. </br></br><a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
 
<div class="form-style-3">
<section class="register">
<h1>Update Patient Record</h1>
<form name="form" method="post" action=""> 
<fieldset>
<legend><span class="number"></span>Patient Personal Info</legend>
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="pid" value="<?php echo $row['pid'];?>" readonly /></p>
	<p><input type="text" name="fname" placeholder="First Name" required value="<?php echo $row['fname'];?>" readonly /></p>
	<p><input type="text" name="lname" placeholder="Last Name" required value="<?php echo $row['lname'];?>" readonly /></p>
	<p><input type="text" name="phone" placeholder="Phone" required value="<?php echo $row['phone'];?>" /></p>
	<p><input type="date" name="visit_date" placeholder="Patient Visit Date" required value="<?php echo $row['visit_date'];?>" readonly /></p>
	<p><input type="text" name="age" placeholder="Enter Age" required value="<?php echo $row['age'];?>" /></p>
	
</fieldset>
	<fieldset>
<legend><span class="number"></span>Patient Address</legend>
   
	  <p><textarea rows=5 cols=29 name="address" placeholder="Address" required><?php echo $row['address'];?></textarea></p>
	  </fieldset>
<p><input class="submit" name="submit" type="submit" value="Update Patient Record" /></p>
</form>
<?php } ?>
</section>
</div>
</div>
</body>
</html>
