<?php

 
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View patient Records</title>

<link rel="icon" type="image/png" href="assets/img/favicon.ico">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>
<body>
<pre>

</pre>
<div align="right" style="text-decoration:underline;" ><a href="https://www.madhurcouriers.in/(S(zvpcwpudjencawnblbdrtlka))/CNoteTracking" target="_blank"> TRACK YOUR COURIER</div>

<div  style="width:1500px; margin:0 auto;">
<p><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Patient Record</a> | <a href="logout.php">Logout</a> | <a href="lookup.php">Lookup Patients</a> | <a href="view_courier_info.php">View Courier Info</a></p>
<h2><center>View Courier Records</center></h2>

<table id="vpatient" class="table table-striped table-hover table-bordered">
<thead>
<tr>
	<th><strong>S.No</strong></th>
	<th><strong>Patient ID</strong></th>
	<th><strong>First Name</strong></th>
	<th><strong>Last Name</strong></th>
	<th><strong>Phone #</strong></th>
	<th><strong>Address</strong></th>
	<th><strong>Amount of medicine</strong></th>
	<th><strong>Courier Track ID</strong></th>
	<th><strong>Phone number of destination address</strong></th>
	<th><strong>Courier Amount (Fee)</strong></th>
	<th><strong>Courier Status (In Transit or Delivered)</strong></th>
	<th><strong>Date when item was shipped</strong></th>
	<th><strong>Payment Status (Paid or Unpaid)</strong></th>	
	<th><strong>Total Amount</strong></th>
	
	<th><strong>Edit</strong></th>
	<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>

<?php
$count=0;
$sel_query="Select * from courier_details ORDER BY courier_date desc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ++$count; ?>

<tr>
	<td><?php echo $count ?></td>
	<td><?php echo $row["pid"]; ?></td>
	<td><?php echo $row["fname"]; ?></td>
	<td><?php echo $row["lname"]; ?></td>
	<td><?php echo $row["phone"]; ?></td>
	<td><?php echo $row["address"]; ?></td>
	<td><?php echo $row["med_amnt"]; ?></td>
	<td><?php echo $row["track_id"]; ?></td>
	<td><?php echo $row["dest_mob"]; ?></td>
	<td><?php echo $row["courier_amnt"]; ?></td>
	<td><?php echo $row["courier_status"]; ?></td>
<td><?php echo $row["courier_date"]; ?></td>	
	<td><?php echo $row["payment_status"]; ?></td>
	<td><?php echo (intval($row["med_amnt"]) + intval( $row["courier_amnt"]))  
			
	?>
	</td>
<td><a href="edit_courier_info.php?pid=<?php echo $row["pid"]; ?>">Edit</a></td>
<td><a href="delete_courier_info.php?pid=<?php echo $row["pid"]; ?>" onclick="return confirm('Are you sure, you wish to delete this info?')">Delete</a></td>

</tr>
<?php } ?>
</tbody>
</table>

</div>

</body>
<script>
$(document).ready(function(){
    $('#vpatient').dataTable();
});
</script>
</html>
