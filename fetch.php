<?php
//fetch.php
$connect = mysqli_connect("www.dramarsrivastav.com","dramarsr_clinic1","clinic","dramarsr_clinic1");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM new_patient_record 
  WHERE fname LIKE '".$search."%'
  OR lname LIKE '".$search."%' 
  OR pid LIKE '".$search."%'
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
<table class="table table-striped table-responsive w-auto">  
<thead class="blue-grey lighten-4"> 
    <tr>
	 <th scope="col">Visited On</th>	
	<th scope="col">Patient ID</th>
     <th scope="col">First Name</th>
     <th scope="col">Last Name</th>
     <th scope="col">Address</th>
     <th scope="col">Phone</th>
	
	 <th scope="col">Edit Patient Record</th>
    </tr>
	</thead>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
  <tbody>
   <tr class="table-info">
	<td>'.$row["visit_date"].'</td>
   <th scope="row">'.$row["pid"].'</td>
    <td>'.$row["fname"].'</td>
    <td>'.$row["lname"].'</td>
    <td>'.$row["address"].'</td>
    <td>'.$row["phone"].'</td>
	
	<td><a href="edit.php?id='.$row["id"].'">Edit</a></td>
   </tr>
   </tbody>
  ';
 }
 
 echo $output;

}
else
{
 echo 'Data Not Found';
}

?>