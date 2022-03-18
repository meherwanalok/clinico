<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Shakti Herbal Clinic - Patients Lookup</title>
  	<link href="css/bootstrap.min.css" rel="stylesheet" />

	<link href="css/bootstrap.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style_form.css">
  
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
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: center;
    padding: 8px;
}

tr:nth-child(even){background-color: #cccfff}
</style>
 </head>
 <body>
 <script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
  <div class="container">
  <p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> |<a href="lookup_by_name.php">Lookup Patients by Name</a> | <a href="logout.php">Logout</a></p>
   <br />
   <h2 align="center">Shakti Herbal Clinic - Patients Lookup</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Patient Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>