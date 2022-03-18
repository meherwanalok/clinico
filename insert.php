<?php

 
require('db.php');
include("auth.php");

$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$trn_date = date("Y-m-d H:i:s");
$pid =$_REQUEST['pid'];
$fname =$_REQUEST['fname'];
$lname =$_REQUEST['lname'];
$phone =$_REQUEST['phone'];
$visit_date =$_REQUEST['visit_date'];
$age = $_REQUEST['age'];
$address =$_REQUEST['address'];
$submittedby = $_SESSION["username"];

$checkid= mysqli_query($con,"SELECT * FROM new_patient_record WHERE pid= '".$pid."'  ");
$match  = mysqli_num_rows($checkid);

if ($match > 0){
    echo "<script>
        alert('Patient ID already exist!');		
    </script>";
}else{

$ins_query="insert into new_patient_record (`trn_date`,`pid`,`fname`,`lname`,`phone`,`visit_date`,`age`,`address`,`submittedby`) values ('$trn_date','$pid','$fname','$lname',
'$phone','$visit_date','$age','$address','$submittedby')";
mysqli_query($con,$ins_query) or die(mysql_error());
$status = "New Record Inserted Successfully.</br></br><a href='view.php'>View Inserted Record</a>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>New Patient Record</title>
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css_1/style.css">
<link rel="stylesheet" href="css/style_form.css" />

</head>
<body>


<p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a> | <a href="lookup.php">Lookup Patients</a> |  <a href="sendsms.php">Send SMS</a></p>

<div class="form-style-3">
<section class="register">
<h1>Register New Patient</h1>
<form class="pure-form-aligned" name="form" method="post" action=""> 
<fieldset>
<legend><span class="number"></span>Patient Personal Info</legend>
<input type="hidden" name="new" value="1" />
<p><input type="text" name="pid" placeholder="Patient ID" required /></p>
<p><input type="text" name="fname" placeholder="First Name" required /></p>
<p><input type="text" name="lname" placeholder="Last Name" required /></p>
<p><input type="text" name="phone" placeholder="Phone Number" /></p>
<p><input type="date" name="visit_date" placeholder="Date visited" max="31-01-3001" required /></p>
<p><input type="text" name="age" placeholder="Enter Age" required /></p>

</fieldset>	  
<fieldset>
<legend><span class="number"></span>Patient Address</legend>
<p><textarea rows=5 cols=29 name="address" placeholder="Address" required /></textarea></p>
</fieldset>
<p><input class="submit" name="submit" type="submit" value="Save Patient Record" /></p>
</form>
<p style="color:#FF0000;"><?php echo $status; ?></p>
</section>

</div>

</body>
</html>