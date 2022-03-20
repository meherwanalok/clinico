<?php


require('db.php');
$pid=$_REQUEST['pid'];
$query = "DELETE FROM courier_details WHERE pid='$pid'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error(1));
header("Location: view_courier_info.php"); 
?>