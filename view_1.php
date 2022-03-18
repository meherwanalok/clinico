<?php
 
require('db.php');
include("auth.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style_login.css">
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<style>
body {
 font-family: "Open Sans", helvetica, arial;
 }
table{
 width: 500px; /* For Responsive design set 100% */
 border-collapse: collapse;
 margin: 30px 0px 30px;
 background-color: #fff;
 font-size: 14px;
 }
table tr {
 height: 40px;
 }
table th {
 background: #F0B27A;
 color: #CD5C5C;
 font-weight: bold;
 font-size: 18px;
}
table td, th {
 padding: 6px 6px 6px 10px;
 border: 1px solid #ccc;
 text-align:center;
}
 
/* CSS3 Zebra Striping */
table tr:nth-of-type(odd) {
 background: #eee;
}
 
/* Automatic Serial Number Row */
.css-serial {
 counter-reset: serial-number; /* Set the serial number counter to 0 */
}
.css-serial td:first-child:before {
 counter-increment: serial-number; /* Increment the serial number counter */
 content: counter(serial-number); /* Display the counter */
}
</style>
<style>

.btn {
  background: #34d9c3;
  background-image: -webkit-linear-gradient(top, #34d9c3, #b8842b);
  background-image: -moz-linear-gradient(top, #34d9c3, #b8842b);
  background-image: -ms-linear-gradient(top, #34d9c3, #b8842b);
  background-image: -o-linear-gradient(top, #34d9c3, #b8842b);
  background-image: linear-gradient(to bottom, #34d9c3, #b8842b);
  -webkit-border-radius: 27;
  -moz-border-radius: 27;
  border-radius: 27px;
  text-shadow: 0px 1px 6px #666666;
  font-family: Arial;
  color: #aee00b;
  font-size: 20px;
  padding: 10px 21px 12px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #fa3c3c;
  background-image: -webkit-linear-gradient(top, #fa3c3c, #d93497);
  background-image: -moz-linear-gradient(top, #fa3c3c, #d93497);
  background-image: -ms-linear-gradient(top, #fa3c3c, #d93497);
  background-image: -o-linear-gradient(top, #fa3c3c, #d93497);
  background-image: linear-gradient(to bottom, #fa3c3c, #d93497);
  text-decoration: none;
}

table {
    border-collapse: collapse;
    width: 95%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

</head>
<body>
<form action="export.php" method="post" name="export_excel">
 
	<div class="control-group">
		<div class="controls">
			<button type="submit" id="export" name="export" class="btn btn-hover" data-loading-text="Loading...">Download Patient data to Excel File</button>
		</div>
	</div>
</form>
<p></p>
<div style="overflow-x:auto;width:max-content;display:inline-block;>

<p style="width:max-content;display:inline-block;"><a href="dashboard.php">Dashboard</a> | <a href="insert.php">Insert New Patient Record</a> | <a href="logout.php">Logout</a> | <a href="lookup.php">Lookup Patients</a></p>
<h2>View Records</h2>
<table class="css-serial">
<thead>
<tr>
	<th><strong>S.No</strong></th>
	<th><strong>Patient ID</strong></th>
	<th><strong>First Name</strong></th>
	<th><strong>Last Name</strong></th>
	<th><strong>Phone</strong></th>
	<th><strong>Diagonosis</strong></th>
	<th><strong>Medicine</strong></th>
	<th><strong>Patient Visit Date</strong></th>
	<th><strong>Age</strong></th>
	<th><strong>Address</strong></th>
	<th><strong>Edit</strong>
	<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=0;
$sel_query="Select * from new_patient_record ORDER BY pid asc;";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ++$count; ?>
<tr>
	<td><?php echo $count; ?></td>
	<td><?php echo $row["pid"]; ?></td>
	<td><?php echo $row["fname"]; ?></td>
	<td><?php echo $row["lname"]; ?></td>
	<td><?php echo $row["phone"]; ?></td>
	<td style="width: 190px; word-wrap: break-word"><?php echo $row["diagonosis"]; ?></td>
	<td style="width: 180px; word-wrap: break-word"><?php echo $row["medicine"]; ?></td>
	<td><?php echo $row["visit_date"]; ?></td>
	<td><?php echo $row["age"]; ?></td>
	<td style="width: 190px; word-wrap: break-word"><?php echo $row["address"]; ?></td>
	<td><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
	<td><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
</tr>
<?php  } ?>
</tbody>
</table>
</div>
</body>
</html>
