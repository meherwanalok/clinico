
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "register");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM new_patient_record 
  WHERE fname LIKE '%".$search."%'
  OR lname LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM new_patient_record ORDER BY visit_date asc
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   		<table id="table_example">
			<thead>
				<tr>
					<th width="30%">Visited On</th>
					<th width="30%">Patient ID</th>
					 <th width="30%">First Name</th>
					 <th width="30%">Last Name</th>
					 <th width="30%">Address</th>
					 <th width="30%">Phone</th>
					 <th width="30%">Diagonosis</th>
					 <th width="30%">Medicine</th>	
					 <th width="30%">Edit Patient Record</th>
				</tr>
				
	
				
			</thead>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   	<td>'.$row["visit_date"].'</td>
   <td>'.$row["pid"].'</td>
    <td>'.$row["fname"].'</td>
    <td>'.$row["lname"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["phone"].'</td>
    <td>'.$row["diagonosis"].'</td>
	<td>'.$row["medicine"].'</td>

	<td><a href="edit.php?id='.$row["id"].'">Edit</a></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>