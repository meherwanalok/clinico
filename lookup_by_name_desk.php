<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Shakti Herbal Clinic - Patients Lookup</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="icon" type="image/png" href="assets/img/favicon.ico">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style_form.css">
  <link rel="stylesheet" href="css/style_json.css" />
  		<script>
		(function (w, doc,co) {
			// http://stackoverflow.com/questions/901115/get-query-string-values-in-javascript
			var u = {},
				e,
				a = /\+/g,  // Regex for replacing addition symbol with a space
				r = /([^&=]+)=?([^&]*)/g,
				d = function (s) { return decodeURIComponent(s.replace(a, " ")); },
				q = w.location.search.substring(1),
				v = '2.0.3';

			while (e = r.exec(q)) {
				u[d(e[1])] = d(e[2]);
			}
			
			if (!!u.jquery) {
				v = u.jquery;
			}	

			doc.write('<script src="https://ajax.googleapis.com/ajax/libs/jquery/'+v+'/jquery.min.js">' + "<" + '/' + 'script>');
			co.log('\nLoading jQuery v' + v + '\n');
		})(window, document, console);
		</script>
		
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script-->
		<script src="js/jquery.quicksearch.js"></script>
		<script>
			$(function () {
				/*
				Example 1
				*/ 
				$('input#id_search').quicksearch('table#table_example tbody tr');
				
			});
		</script>
 </head>
 <body>
  <div class="container">
  <h4><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a></h4>
   <br />
   <h1 align="center">Shakti Herbal Clinic - Patients Lookup By Name</h1>
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
	 <input type="text" name="search" value="" id="id_search" placeholder="Search by Patient Name" class="form-control" size="60 px"autofocus />
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
   url:"fetch_by_name.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#id_search').keyup(function(){
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