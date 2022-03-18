<!DOCTYPE html>
<?php
require('textlocal.class.php');
if(isset($_POST['send'])){
$username = 'anshuman_red@yahoo.co.in'; // change this to your email address
$hashcode = '1e98d3d48aae1a205be8c11ea90c61e8ead9a477ed13cee6a795ddd6f7f51dbc'; // change this to yours
$pid = $_POST['pid'];
$from = 'dramarsrivastav@gmail.com';
$phoneno = $_POST['phoneno'];

$textlocal = new Textlocal($username, $hashcode);
$numbers = array($phoneno); // separate multiple numbers by comma
$sender = 'TXTLCL';
$message = $_POST['message'];
#$message = 'Wish you a very happy new year 2020!!! Shakti Herbal Research Institute';

echo " From : " . $from . " Phone ". $phoneno . " sender : " . $sender; 
try {
    $result = $textlocal->sendSms($numbers, $message, $sender);
    $data = json_decode(json_encode($result), true);
    if($data['status'] == 'success'){
        echo 'Shakti SMS sent successfully!';
    }
} catch(Exception $e) {
    die('Error: ' . $e->getMessage());
}
}
?>
<html>
<head>
<meta charset="utf-8">
<title>SMS to Patient</title>
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css_1/style.css">
<link rel="stylesheet" href="css/style_form.css" />

</head>
<body>


<p><a href="dashboard.php">Dashboard</a> | <a href="view.php">View Records</a> | <a href="logout.php">Logout</a> | <a href="lookup.php">Lookup Patients</a></p>

<div class="form-style-3">
<section class="register">
<h1>Send SMS to the Patient</h1>
<form class="pure-form-aligned" name="form" method="post" action="sendsms.php"> 
<fieldset>
<legend><span class="number"></span>Patient Info</legend>

<p><input type="text" name="pid" placeholder="Patient ID" required /></p>
<p><input type="text" name="phoneno" placeholder="To Phone Number" /></p>
</fieldset>	  

<fieldset>
<legend><span class="number"></span>SMS to patient</legend>
<p><textarea rows=5 cols=29 name="message" placeholder="Message" required /></textarea></p>
</fieldset>
<p><input class="submit" name="send" type="submit" value="Send SMS" /></p>
</form>
</section>

</div>

</body>
</html>