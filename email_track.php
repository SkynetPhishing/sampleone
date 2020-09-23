<?php

//email_track.php

//$connect = new PDO("mysql:host=localhost;dbname=phishing", "root","");
include_once 'config.php';
echo$_GET["code"];
if(isset($_GET["code"]))
{
	$query = "
	UPDATE email_data 
	SET email_status = 'yes', email_open_datetime = '".date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')))."' 
	WHERE email_track_code = '".$_GET["code"]."' 
	AND email_status = 'no'
	";
	/*$statement = $connect->prepare($query);
	$statement->execute();*/
	$r=mysqli_query($db,$query);
	
}

?>