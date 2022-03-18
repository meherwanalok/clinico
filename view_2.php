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

<div  style="width:1500px; margin:0 auto;">

<p><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Patient Record</a> | <a href="logout.php">Logout</a> | <a href="lookup.php">Lookup Patients</a></p>
<h2><center>View patient Records</center></h2>
<table id="vpatient" class="table table-striped table-hover table-bordered">
<thead>
<tr>
	<th><strong>S.No</strong></th>
	<th><strong>Patient Visit Date</strong></th>	
	<th><strong>Patient ID</strong></th>
	<th><strong>First Name</strong></th>
	<th><strong>Last Name</strong></th>
	<th><strong>Phone</strong></th>
	<th><strong>Diagonosis</strong></th>
	<th><strong>Medicine</strong></th>	
	<th><strong>Age</strong></th>
	<th><strong>Address</strong></th>
	<th><strong>Edit</strong>
	<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=0;
$sel_query="Select * from new_patient_record ORDER BY visit_date asc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ++$count; ?>

<tr>
	<td><?php $count ?></td>
	<td><?php echo $row["visit_date"]; ?></td>
	<td><?php echo $row["pid"]; ?></td>
	<td><?php echo $row["fname"]; ?></td>
	<td><?php echo $row["lname"]; ?></td>
	<td><?php echo $row["phone"]; ?></td>
	<td><?php echo $row["diagonosis"]; ?></td>
	<td><?php echo $row["medicine"]; ?></td>
	<td><?php echo $row["age"]; ?></td>
	<td><?php echo $row["address"]; ?></td>
	<td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
	<td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>

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
